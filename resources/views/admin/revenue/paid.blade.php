@extends('admin/layouts.master')
@section('title', __('adminstaticword.PaidPayout') . ' - ' . __('adminstaticword.Instructor'))
@section('body')

<section class="content">
    @include('admin.message')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"> {{ __('adminstaticword.PaidPayout') }}</h3>
                    <a href="{{route('admin.instructor')}}" class="btn btn-success pull-right owtbtn">
                        {{ __('adminstaticword.Back') }}
                    </a>
                </div>


                <div id="bulk_delete" class="delete-modal modal fade" role="dialog">
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
                            </div>
                            <div class="modal-footer text-center">
                                <form method="post" action="" class="pull-right">
                                    <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal">{{ __('adminstaticword.No') }}</button>
                                    <button type="submit" class="btn btn-danger">{{ __('adminstaticword.Yes') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">

                            <thead>
                                <th>#</th>
                                <th>{{ __('adminstaticword.User') }}</th>
                                <th>{{ __('adminstaticword.Course') }}</th>
                                <th>{{ __('adminstaticword.OrderId') }}</th>
                                <th>{{ __('adminstaticword.PayoutDeatil') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=0;?>
                                @foreach($payout as $pay)
                                <tr>
                                    <?php $i++;?>
                                    <td>
                                        <?php echo $i;?>
                                    </td>
                                    <td>@if(isset($pay->user)){{$pay->user->fname}}@endif</td>
                                    <td>@if(isset($pay->courses)){{$pay->courses->title}}@endif</td>
                                    <td>>@if(isset($pay->order)){{$pay->order->order_id}}@endif</td>
                                    <td>
                                        <b>{{ __('adminstaticword.TotalAmount') }}</b>: <i
                                            class="fa {{$pay->currency_icon}}"></i>{{$pay->total_amount}}
                                        <br>

                                        <b>{{ __('adminstaticword.InstructorRevenue') }}</b>: <i
                                            class="fa {{$pay->currency_icon}}"></i> {{$pay->instructor_revenue}}
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


@section('scripts')
<script>
    $(function () {
        $('#checkboxAll').on('change', function () {
            if ($(this).prop("checked") == true) {
                $('.material-checkbox-input').attr('checked', true);
            } else if ($(this).prop("checked") == false) {
                $('.material-checkbox-input').attr('checked', false);
            }
        });
    });
</script>

<script>
    $(function () {
        $('#cb3').change(function () {
            $('#status').val(+$(this).prop('checked'))
        })
    })
</script>


@endsection