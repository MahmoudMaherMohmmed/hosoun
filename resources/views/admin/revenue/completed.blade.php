@extends('admin/layouts.master')
@section('title', __('adminstaticword.CompletedPayout') . ' - ' . __('adminstaticword.Instructor'))
@section('body')

<section class="content">
    @include('admin.message')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"> {{ __('adminstaticword.CompletedPayout') }}</h3>
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">

                            <thead>
                                <th>#</th>
                                <th>{{ __('adminstaticword.User') }}</th>
                                <th>{{ __('adminstaticword.Payer') }}</th>
                                <th>{{ __('adminstaticword.PayTotal') }}</th>
                                <th>{{ __('adminstaticword.OrderId') }}</th>
                                <th>{{ __('adminstaticword.PayStatus') }}</th>
                                <th>{{ __('adminstaticword.View') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=0;?>
                                @foreach($payout as $pay)
                                <tr>
                                    <?php $i++;?>
                                    <td><?php echo $i;?></td>
                                    <td>{{$pay->user->fname}}</td>
                                    <td>{{$pay->payer_id}}</td>
                                    <td><i class="fa {{$pay->currency_icon}}"></i> {{$pay->pay_total}}</td>
                                    <td>
                                        @foreach($pay->order_id as $order)
                                        @php
                                        $id= App\Order::find($order);
                                        @endphp
                                        @if(isset($id->order_id)){{ $id['order_id'] }} @endif,

                                        @endforeach
                                    <td>
                                        <span class="table-status {{($pay->pay_status ==1)? 'status-approved' : 'status-pending' }}">
                                            @if($pay->pay_status ==1)
                                            {{ __('adminstaticword.Recieved') }}
                                            @else
                                            {{ __('adminstaticword.Pending') }}
                                            @endif
                                        </span>
                                    </td>

                                    <td>
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('completed.view', $pay->id) }}">{{ __('adminstaticword.View') }}</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
@endsection