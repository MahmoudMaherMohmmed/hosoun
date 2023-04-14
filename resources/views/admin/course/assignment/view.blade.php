@extends('admin.layouts.master')
@section('title', __('adminstaticword.View') . ' ' . __('adminstaticword.Assignment'))
@section('body')

<section class="content">
    @include('admin.message')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('adminstaticword.Assignment') }}</h3>
                    <a href="{{ url()->previous() }}" class="btn btn-success pull-right owtbtn">
                        {{ __('adminstaticword.Back') }}
                    </a>
                </div>
                <div class="panel-body">

                    <div class="view-instructor">
                        <div class="instructor-detail">
                            <ul>
                                <li>
                                    @if($assign->user->user_img != null || $assign->user->user_img !='')
                                    <img src="{{ asset('images/user_img/'.$assign->user->user_img) }}"
                                        class="img-circle" /></li>
                                @else
                                <img src="{{ asset('images/default/user.jpg')}}" class="img-circle" alt="User Image">
                                @endif
                                <li>{{ __('adminstaticword.User') }}: {{ $assign->user->fname }}
                                    {{ $assign->user->lname }}</li>
                                <li>{{ __('adminstaticword.Course') }}: {{ $assign->courses->title }}</li>
                                <li>{{ __('adminstaticword.CourseChapter') }}: {{ $assign->chapter->chapter_name }}</li>
                                <li>{{ __('adminstaticword.AssignmentTitle') }}: {{ $assign->title }}</li>
                                <li>{{ __('adminstaticword.Assignment') }}: <a
                                        href="{{ asset('files/assignment/'.$assign->assignment) }}"
                                        download="{{$assign->assignment}}">{{ __('adminstaticword.Download') }} <i
                                            class="fa fa-download"></i></a></li>

                            </ul>
                        </div>
                    </div>


                    <form action="{{route('assignment.update',$assign->id)}}" method="POST"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <input type="hidden" value="{{ $assign->user_id }}" name="user_id" class="form-control">

                        <input type="hidden" value="{{ $assign->course_id }}" name="course_id" class="form-control">

                        <div class="row">
                            <div class="col-xs-12">
                                <label>{{ __('adminstaticword.ReviewAssignment') }}:</label>
                                {{-- unchecked --}}
                                <div class="toggler">
                                    <input hidden id="assign_accept" type="checkbox" name="type" {{ $assign->type == 1 ? 'checked' : '' }}>
                                    <label class="main-toggle deactive {{ $assign->type == 1 ? 'on' : '' }}" for="assign_accept"><span></span></label>
                                </div>
                            </div>
                        </div>

                        <div class="row" style="{{ $assign['type'] == '1' ? '' : 'display:none' }}" id="sec1_one">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="rating">Give scores to assignment (1 to 10):</label>
                                    <input min="1" max="10" class="form-control" name="rating" type="number" id="rating" value="{{ $assign->rating }}" placeholder="Enter Duration in months">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-8"></div>
                            <button value="" type="submit" class="btn btn-md col-xs-4 btn-primary">{{ __('adminstaticword.Save') }}</button>
                        </div>



                    </form>



                </div>
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

            $('#assign_accept').change(function () {
                if ($('#assign_accept').is(':checked')) {
                    $('#sec1_one').show('fast');
                    $('#sec_one').hide('fast');
                } else {
                    $('#sec1_one').hide('fast');
                    $('#sec_one').show('fast');
                }

            });

        });
    })(jQuery);
</script>



@endsection