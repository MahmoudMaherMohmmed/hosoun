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
                    <h3 class="box-title"> {{ __('adminstaticword.MakeCertificate') }} {{ $selectedUser->fname }} {{ $selectedUser->lname }}</h3>
                    @else
                    <h3 class="box-title"> {{ __('adminstaticword.MakeCertificate') }} {{ __('adminstaticword.User') }}</h3>
                    @endif
                    
                    
                    <a href="{{url('order')}}" class="btn btn-success pull-right owtbtn">
                        {{ __('adminstaticword.Back') }}
                    </a>
                </div>
                
                
                <div class="box-body">
                    <div class="form-group">
                        <form id="demo-form2" method="post" action="{{ route('certificates.store') }}" data-parsley-validate
                            class="form-label-left" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-xs-12 col-md-4">
                                    <div class="form-group">
                                        <label for="user_id">{{ __('adminstaticword.User') }}<span class="redstar">*</span></label>
                                        <input type="hidden" id="enrollUserViewRoute"
                                            value="{{ route('certificates.makecertificate', '') }}">
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
                                        <label for="course_id">{{ __('adminstaticword.course') }} </label>
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

                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <div class="form-group">
                                        <label for="title">{{ __('adminstaticword.CertificateTitle') }}:<sup class="redstar">*</sup></label>
                                        <input type="text" class="form-control" name="title" id="title"  value="{{old('title')}}">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-md-6">
                                    <div class="form-group">
                                        <label>{{ __('adminstaticword.Status') }}:</label>
                                        <div class="toggler">
                                            <input hidden id="status" type="checkbox" name="status" {{ isset($bookSubCategory) && $bookSubCategory->status == '1' ? 'checked' : '' }}>
                                            <label class="main-toggle toggle-lg {{ isset($bookSubCategory) && $bookSubCategory->status == '1' ? 'on' : '' }}" for="status">
                                                <span data-on="{{ __('adminstaticword.Enable') }}" data-off="{{ __('adminstaticword.Disable') }}"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-md-12">
                                    <div class="form-group">
                                        <label for="description">{{ __('adminstaticword.CertificateDescription') }}: <sup class="redstar"></sup></label>
                                        <textarea id="description" name="description" rows="3" class="form-control"
                                                  placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.ShortDetail') }}"
                                                  required>{{ (old('description')) }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <label for="image">{{ __('adminstaticword.CertificateImage') }}:</label>
                                    <div>
                                        <input type="file" name="image" id="image" class="inputfile inputfile-1" />
                                        <label for="image"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17"
                                                                viewBox="0 0 20 17">
                                                <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
                                            </svg> <span>{{ __('adminstaticword.Chooseafile') }}&hellip;</span></label>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-md-6">
                                    <label for="file">{{ __('adminstaticword.File') }}:</label>
                                    <div>
                                        <input type="file" name="file" id="file" class="inputfile inputfile-1" />
                                        <label for="file"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17">
                                                <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
                                            </svg> <span>{{ __('adminstaticword.Chooseafile') }}&hellip;</span></label>
                                    </div>
                                </div>
                            </div>

                            <div class="box-footer">
                                <div class="row">
                                    <div class="col-xs-6 col-md-10"></div>
                                    <button type="submit" value="Add Slider" class="btn btn-md col-xs-6 col-md-2 btn-primary">{{ __('adminstaticword.MakeCertificate') }} {{ __('adminstaticword.User') }}</button>
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