@extends('admin/layouts.master')
@section('title', __('adminstaticword.Edit') . ' ' __('adminstaticword.FeaturedCourses') . ' - ' . __('adminstaticword.Instructor'))
@section('body')


<section class="content">
    @include('admin.message')
    <div class="row">
        <div class="col-xs-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"> {{ __('adminstaticword.FeaturedCourses') }}</h3>
                </div>
                <div class="box-body">
                    <form id="demo-form2" method="post" action="{{route('featurecourse.store')}}"
                        data-parsley-validate enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="course_id">{{ __('adminstaticword.SelectCourse') }}: <span
                                            class="redstar">*</span></label>
                                    <select name="course_id" id="course_id" class="form-control js-example-basic-single"
                                        required>
                                        <option value="">{{ __('adminstaticword.SelectanOption') }}</option>
                                        @foreach($courses as $course)
                                        <option value="{{$course->id}}">{{$course->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="user_id">{{ __('adminstaticword.User') }}</label>
                                    <select id="user_id" name="user_id" class="form-control js-example-basic-single">
                                        <option value="{{Auth::user()->id}}">{{Auth::user()->fname}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 display-none">
                                <div class="form-group">

                                    <label for="total_amount">{{ __('adminstaticword.AmountFeatureCourse') }}:</sup></label>
                                    <input value="{{ $gsetting->feature_amount }}" type="hidden" name="total_amount"
                                        class="form-control" readonly="">
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    @php
                                    $currency = App\Currency::first();
                                    @endphp
        
                                    <label for="total_amount">{{ __('adminstaticword.AmountFeatureCourse') }}:</sup></label>&nbsp;
                                    <i class="{{ $currency->icon }}"></i>&nbsp;{{ $gsetting->feature_amount }}
                                </div>
                            </div>
                        </div>

                        <div class="box-footer">
                            <div class="row">
                                <div class="col-xs-8"></div>
                                <button type="submit" value="Add Slider" class="btn btn-md col-xs-4 btn-primary">{{ __('adminstaticword.PayToFeature') }}</button>
                            </div>
                        </div>

                    </form>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.box -->
        </div>
        <!--/.col (right) -->
    </div>
    <!-- /.row -->
</section>
@endsection