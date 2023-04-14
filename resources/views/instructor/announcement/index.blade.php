@extends('admin/layouts.master')
@section('title', __('adminstaticword.CoursesAnnouncement') . ' - ' . __('adminstaticword.Instructor'))
@section('body')

<section class="content">
    @include('admin.message')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('adminstaticword.CoursesAnnouncement') }}
                    </h3>
                    <a class="btn btn-info btn-sm" href="{{ url('instructor/announcement/create') }}">+
                        {{ __('adminstaticword.Add') }} {{ __('adminstaticword.Announcement') }}</a>
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <th>#</th>
                                <th>{{ __('adminstaticword.Announcement') }}</th>
                                <th>{{ __('adminstaticword.Course') }}</th>
                                <th>{{ __('adminstaticword.Status') }}</th>
                                <th>{{ __('adminstaticword.Edit') }}</th>
                                <th>{{ __('adminstaticword.Delete') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=0;?>
                                @foreach($announs as $announ)
                                <tr>
                                    <?php $i++;?>
                                    <td><?php echo $i;?></td>
                                    <td>{{$announ->announsment}}</td>
                                    <td>{{$announ->courses->title}}</td>
                                    <td>
                                        @if($announ->status==1)
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
                                        <a class="table-edit" href="{{url('instructor/announcement/'.$announ->id)}}">
                                            <i class='bx bx-edit'></i>
                                        </a>
                                    </td>

                                    <td>
                                        <form method="post" action="{{url('instructor/announcement/'.$announ->id)}}" data-parsley-validate class="form-horizontal form-label-left">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn-null table-delete">
                                                <i class='bx bx-trash'></i>
                                            </button>
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