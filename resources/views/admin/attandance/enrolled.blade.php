@extends('admin/layouts.master')
@section('title', __('adminstaticword.UsersEnrolled') . ' - ' . __('adminstaticword.Admin'))
@section('body')

<section class="content">
    @include('admin.message')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('adminstaticword.UsersEnrolled') }}</h3>
                    <a href="{{url('attandance')}}" class="btn btn-success pull-right owtbtn">
                        {{ __('adminstaticword.Back') }}
                    </a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped table-responsive">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('adminstaticword.Users') }}</th>
                                    <th>{{ __('adminstaticword.Attandance') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=0;?>
                                @foreach($enrolled as $enroll)
                                <?php $i++;?>
                                <tr>
                                    <td><?php echo $i;?></td>
                                    <td>
                                        <p><b>{{ __('adminstaticword.User') }}:</b> {{ $enroll->user->fname }}
                                            {{ $enroll->user->lname }}</p>
                                        <p><b>{{ __('adminstaticword.Email') }}:</b> {{ $enroll->user->email }} </p>
                                    </td>
                                    <td>
                                        <a href="{{ route('user.attandance', ['id' => $enroll->user_id, 'course' => $enroll->course_id]) }}"
                                            class="btn btn-primary">{{ __('adminstaticword.Attandance') }}</a>
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