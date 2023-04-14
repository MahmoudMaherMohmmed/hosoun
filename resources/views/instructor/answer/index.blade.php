@extends('admin/layouts.master')
@section('title', __('adminstaticword.Answer') . ' - ' . __('adminstaticword.Instructor'))
@section('body')

<section class="content">
    @include('admin.message')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"> {{ __('adminstaticword.Answer') }}</h3>
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">

                            <thead>

                                <th>#</th>
                                <th>{{ __('adminstaticword.Answer') }}</th>
                                <th>{{ __('adminstaticword.Question') }}</th>
                                <th>{{ __('adminstaticword.Course') }}</th>
                                <th>{{ __('adminstaticword.Status') }}</th>
                                <th>{{ __('adminstaticword.Edit') }}</th>
                                <th>{{ __('adminstaticword.Delete') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=0;?>
                                @foreach($answers as $ans)
                                <tr>
                                    <?php $i++;?>
                                    <td><?php echo $i;?></td>
                                    <td>{{ strip_tags($ans->answer)}}</td>
                                    <td>{{strip_tags($ans->question->question)}}</td>
                                    <td>{{$ans->courses->title}}</td>
                                    <td>
                                        @if($ans->status==1)
                                        <span class="table-status status-approved">
                                            {{ __('adminstaticword.Active') }}
                                        </span>
                                        @else
                                        <span class="table-status status-rejected">
                                            {{ __('adminstaticword.Deactive') }}
                                        </span>
                                        @endif
                                    </td>

                                    <td>
                                        <a class="table-edit"
                                            href="{{url('instructoranswer/'.$ans->id)}}"><i class='bx bx-edit'></i></a>
                                    </td>

                                    <td>
                                        <form method="post" action="{{url('instructoranswer/'.$ans->id)}}
              " data-parsley-validate class="form-horizontal form-label-left">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn-null table-delete"><i class='bx bx-trash'></i></button>
                                        </form>
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