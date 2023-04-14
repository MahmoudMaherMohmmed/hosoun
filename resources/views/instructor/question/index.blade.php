@extends('admin/layouts.master')
@section('title', __('adminstaticword.CourseQuestions') . ' - ' . __('adminstaticword.Instructor'))
@section('body')

<section class="content">
    @include('admin.message')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('adminstaticword.CourseQuestions') }}</h3>
                    <a class="btn btn-info btn-sm" href="{{ url('instructorquestion/create') }}">+ {{ __('adminstaticword.Add') }} {{ __('adminstaticword.NewQuestion') }}</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>{{ __('adminstaticword.Course') }}</th>
                                    <th>{{ __('adminstaticword.Question') }}</th>
                                    <th>{{ __('adminstaticword.Status') }}</th>
                                    <th>{{ __('adminstaticword.Edit') }}</th>
                                    <th>{{ __('adminstaticword.Delete') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($questions as $que)
                                <tr>
                                    <td>{{$que->courses->title}}</td>
                                    <td>{{$que->question}}</td>
                                    <td>
                                        <form action="{{ route('ansr.quick',$que->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            <button type="Submit"
                                                class="btn btn-xs table-status {{ $que->status ==1 ? 'btn-success' : 'btn-danger' }}">
                                                @if($que->status ==1)
                                                {{ __('adminstaticword.Active') }}
                                                @else
                                                {{ __('adminstaticword.Deactive') }}
                                                @endif
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <a class="table-edit"
                                            href="{{url('instructorquestion/'.$que->id)}}"><i class='bx bx-edit'></i></a>
                                    </td>
                                    <td>
                                        <form method="post" action="{{url('instructorquestion/'.$que->id)}}"
                                            data-parsley-validate class="form-horizontal form-label-left">
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