@extends("admin/layouts.master")
@section('title', __('adminstaticword.Coupon') . ' - ' . __('adminstaticword.Admin'))

@section('body')
<section class="content">
  @include('admin.message')
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">{{ __('adminstaticword.Coupon') }}</h3>
          <a title="Create new Coupon" href="{{ route('coupon.create') }}" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> {{ __('adminstaticword.Add') }} {{ __('adminstaticword.Coupon') }}</a>
        </div>

        <div class="box-body">
          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
              <thead>

                <th>{{ __('adminstaticword.ID') }}</th>
                <th>{{ __('adminstaticword.CODE') }}</th>
                <th>{{ __('adminstaticword.Amount') }}</th>
                <th>{{ __('adminstaticword.MaxUsage') }}</th>
                <th>{{ __('adminstaticword.Detail') }}</th>
                <th>{{ __('adminstaticword.Edit') }}</th>
                <th>{{ __('adminstaticword.Delete') }}</th>
              </thead>

              <tbody>
                @foreach($coupans as $key=> $cpn)
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $cpn->code }}</td>
                    @php
                        $currency = App\Currency::first();
                    @endphp
                    <td>@if($cpn->distype == 'fix') <i class="fa {{ $currency->icon }}"></i> @endif {{ $cpn->amount }}@if($cpn->distype == 'per')% @endif </td>
                    <td>{{ $cpn->maxusage }}</td>
                    <td>
                      <p>{{ __('adminstaticword.Linkedto') }}: <b>{{ ucfirst($cpn->link_by) }}</b></p>
                      <p>{{ __('adminstaticword.ExpiryDate') }}: <b>{{ date('d-M-Y',strtotime($cpn->expirydate)) }}</b></p>
                      <p>{{ __('adminstaticword.DiscountType') }}: <b>{{ $cpn->distype == 'per' ? "Percentage" : "Fixed Amount" }}</b></p>
                       <p>{{ __('Coupon Code display on front') }}: <b> 
                         @if($cpn->show_to_users == '1')
                            Yes
                          @else
                            No
                          @endif

                       </b></p>
                    </td>
                    <td>
                        @if (isset($cpn->stripe_coupon_id))
                        -
                    @else
                      <a title="Edit coupon" href="{{ route('coupon.edit',$cpn->id) }}" class="table-edit">
                        <i class='bx bx-edit' ></i>
                      </a>
                      @endif
                    </td>
                    <td>
                      <a title="Delete coupon" data-toggle="modal" data-target="#coupon{{ $cpn->id }}" class="table-delete">
                        <i class='bx bx-trash' ></i>
                      </a>
                    </td>

                    <div id="coupon{{ $cpn->id }}" class="delete-modal modal fade" role="dialog">
                    	<div class="modal-dialog modal-sm">
                    		<!-- Modal content-->
                    		<div class="modal-content">
                    			<div class="modal-header">
                    				<button type="button" class="close" data-dismiss="modal">&times;</button>
                    				<div class="delete-icon"></div>
                    			</div>
                    			<div class="modal-body text-center">
                    				<i class='bx bx-trash'></i>
                    				<h4 class="modal-heading">{{ __('adminstaticword.AreYouSure') }}</h4>
                    				<p>{{ __('adminstaticword.DeleteCoupon') }}</p>
                    			</div>
                    			<div class="modal-footer">
                    				<form method="post" action="{{route('coupon.destroy',$cpn->id)}}" class="pull-right">
                    					{{csrf_field()}}
                    					{{method_field("DELETE")}}
                    
                    					<button type="reset" class="btn btn-gray translate-y-3"
                    						data-dismiss="modal">{{ __('adminstaticword.No') }}</button>
                    					<button type="submit" class="btn btn-danger">{{ __('adminstaticword.Yes') }}</button>
                    				</form>
                    			</div>
                    		</div>
                    	</div>
                    </div>
                  </tr>
                @endforeach
              </tbody>

            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
