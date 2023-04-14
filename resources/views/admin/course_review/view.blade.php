@extends('admin.layouts.master')
@section('title', __('adminstaticword.View') . ' ' . __('adminstaticword.CourseReview') . ' - ' . __('adminstaticword.Admin'))
@section('body')

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('adminstaticword.CourseReview') }} -> {{ $course->title }}</h3>
                    <a href="{{url('coursereview')}}" class="btn btn-success pull-right owtbtn">
                        {{ __('adminstaticword.Back') }}
                    </a>
                </div>
                <div class="panel-body">

                    <div class="view-instructor">
                        <div class="instructor-detail">
                            <ul>
                                <li>

                                    @if($course->preview_image != null || $course->preview_image !='')
                                    <img src="{{ asset('images/course/'.$course->preview_image) }}"
                                        class="img-circle" />
                                    @else
                                    <img src="{{ Avatar::create($course->title)->toBase64() }}" alt="course"
                                        class="img-responsive">
                                    @endif
                                </li>
                                <li><b>{{ __('adminstaticword.Course') }}</b>: {{ $course->title }}</li>
                                <li><b>{{ __('adminstaticword.User') }}</b>: {{ $course->user->fname }}
                                    {{ $course->user->lname }}</li>

                                <li><b>{{ __('adminstaticword.Title') }}</b>: {{ $course->title }}</li>
                                <li><b>{{ __('adminstaticword.Detail') }}</b>: {!! $course->detail !!}</li>

                            </ul>
                        </div>
                    </div>


                    <form action="{{url('coursereview/'.$course->id)}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <input type="hidden" value="{{ $course->course_id }}" name="course_id" class="form-control">

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>{{ __('adminstaticword.Accept') }}:</label>
                                    <div class="toggler">
                                        <input hidden id="appoint_accept" type="checkbox" name="status" {{ $course->status == 1 ? 'checked' : '' }}>
                                        <label class="main-toggle {{ $course->status == 1 ? 'on' : '' }}" for="appoint_accept"><span></span></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                        <div class="row" style="{{ $course->status == '0' ? '' : 'display:none' }}" id="sec1_one">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="detail">{{ __('adminstaticword.ReasonforRejection') }}:</label>
                                    <textarea id="detail" name="reject_txt" rows="1" class="form-control" placeholder="Enter class detail">{{ $course['reject_txt'] }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-8"></div>
                            <div class="col-xs-4">
                                <button value="" type="submit" class="btn btn-md col-xs-12 btn-primary">{{ __('adminstaticword.Save') }}</button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
</section>
@endsection


@section('script')


<script>
    (function ($) {
        "use strict";

        $(function () {

            $('#appoint_accept').change(function () {
                if ($('#appoint_accept').is(':checked')) {
                    $('#sec_one').show('fast');
                    $('#sec1_one').hide('fast');
                } else {
                    $('#sec_one').hide('fast');
                    $('#sec1_one').show('fast');
                }

            });

        });
    })(jQuery);
</script>

@endsection