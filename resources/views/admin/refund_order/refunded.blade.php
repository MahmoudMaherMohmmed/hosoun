<!-- /.box-header -->
<div class="box-body">

    <div class="table-responsive">
        <table id="example2" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>{{ __('adminstaticword.User') }}</th>
                    <th>{{ __('adminstaticword.Course') }}</th>
                    <th>{{ __('adminstaticword.OrderId') }}</th>
                    <th>{{ __('adminstaticword.PaymentMethod') }}</th>
                    <th>{{ __('adminstaticword.Status') }}</th>
                    <th>{{ __('adminstaticword.View') }}</th>
                    <th>{{ __('adminstaticword.Delete') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($refunds as $key=>$refund)

                @if($refund->status == 1)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $refund->user['fname'] }}</td>
                    <td>{{ $refund->courses->title }}</td>
                    <td>{{ $refund->order->order_id }}</td>
                    <td>{{ $refund->payment_method }}</td>
                    <td>

                        @if($refund->status ==1)
                        <span class="table-status status-approved">
                            {{ __('adminstaticword.Refunded') }}
                        </span>
                        @else

                        <span class="table-status status-pending">
                            {{ __('adminstaticword.Pending') }}
                        </span>
                        @endif

                    </td>

                    <td><a class="btn btn-success btn-sm" href="{{url('refundorder/'.$refund->id.'/edit')}}">
                            {{ __('adminstaticword.View') }}</a>
                    </td>

                    <td>
                        <form method="post" action="{{url('refundorder/'.$refund->id)}}" data-parsley-validate class="form-horizontal form-label-left">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn-null table-delete"><i class='bx bx-trash'></i></button>
                        </form>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- /.box-body -->