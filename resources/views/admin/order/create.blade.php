@extends('admin/layouts.master')
@section('title', __('adminstaticword.Enroll') . ' ' . __('adminstaticword.User') . ' - ' . __('adminstaticword.Admin'))
@section('body')


<section class="content">
    @include('admin.message')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    @if (isset($selectedUser))
                    <h3 class="box-title"> {{ __('adminstaticword.Enroll') }} {{ $selectedUser->fname }} {{ $selectedUser->lname }}</h3>
                    @else
                    <h3 class="box-title"> {{ __('adminstaticword.Enroll') }} {{ __('adminstaticword.User') }}</h3>
                    @endif
                    
                    
                    <a href="{{url('order')}}" class="btn btn-success pull-right owtbtn">
                        {{ __('adminstaticword.Back') }}
                    </a>
                </div>
                
                
                <div class="box-body">
                    <div class="form-group">
                        <form id="demo-form2" method="post" action="{{ route('order.store') }}" data-parsley-validate
                            class="form-label-left" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-xs-12 col-md-4">
                                    <div class="form-group">
                                        <label for="user_id">{{ __('adminstaticword.User') }}<span class="redstar">*</span></label>
                                        <input type="hidden" id="enrollUserViewRoute"
                                            value="{{ route('order.enrolluserview', '') }}">
                                        <select name="user_id" id="user_id" class="form-control js-example-basic-single"
                                            required>
                                            <option value="">{{ __('adminstaticword.SelectanOption') }}</option>
                                            @foreach ($users as $user)
                                            <option
                                                {{ isset($selectedUser) && $user->id === $selectedUser->id ? 'selected' : '' }}
                                                value="{{ $user->id }}">{{ $user->fname }} {{ $user->lname }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-4">
                                    <div class="form-group">
                                        <label for="course_id">{{ __('adminstaticword.Enroll') }} </label>
                                        <select name="course_id" id="course_id"
                                            class="form-control js-example-basic-single">
                                            <option value="">{{ __('adminstaticword.SelectanOption') }}</option>
                                            @foreach ($courses as $course)
                                            <option value="{{ $course->id }}">{{ $course->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-4">
                                    <div class="form-group">
                                        <label for="bundle_id">{{ __('adminstaticword.Bundles') }}</label>
                                        <select name="bundle_id" id="bundle_id"
                                            class="form-control js-example-basic-single">
                                            <option value="">{{ __('adminstaticword.SelectanOption') }}</option>
                                            @foreach ($bundles as $bundle)
                                            <option value="{{ $bundle->id }}">{{ $bundle->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="box-footer">
                                <div class="row">
                                    <div class="col-xs-6 col-md-10"></div>
                                    <button type="submit" value="Add Slider" class="btn btn-md col-xs-6 col-md-2 btn-primary">{{ __('adminstaticword.Enroll') }} {{ __('adminstaticword.User') }}</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.box -->
        </div>
        <!--/.col (right) -->
    </div>
    <!-- /.row -->
    @if (isset($enrolledCourses) )
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"> Enrolled courses</h3>
                </div>
                <div class="box-body">

                    @foreach ($enrolledCourses as $enrolledCourse)

                    <div class="row">
                        <div class="col-md-6">

                            {{ $enrolledCourse['title'] }}
                        </div>

                    </div>
                    
                    @endforeach
                </div>

            </div>

        </div>
    </div>
    @endif

    @if (isset($enrolledBundles) )
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"> Enrolled bundles</h3>
                </div>
                <div class="box-body">

                    @foreach ($enrolledBundles as $enrolledBundle)

                    <div class="row">
                        <div class="col-md-6">
                            {{ $enrolledBundle->title }}
                        </div>

                    </div>
                    
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endif
</section>
@endsection


@section('scripts')

<script>
    $(function () {
        $('#user_id').on('change', function (e) {
            var userId = this.value;
            var link = $('#enrollUserViewRoute').val() + '/' + userId;

            top.location.href = link;
        });
    })
</script>
@endsection