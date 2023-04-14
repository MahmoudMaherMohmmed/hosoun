@extends('admin.layouts.master')
@section('title', __('adminstaticword.View') . ' ' . __('adminstaticword.Appointment'))
@section('body')

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('adminstaticword.Appointment') }}</h3>
                    <a href="{{ url()->previous() }}" class="btn btn-success pull-right owtbtn">
                        {{ __('adminstaticword.Back') }}
                    </a>
                </div>
                <div class="panel-body">

                    <div class="view-instructor">
                        <div class="instructor-detail">
                            <ul>
                                <li>

                                    @if($appoint->user->user_img != null || $appoint->user->user_img !='')
                                    <img src="{{ asset('images/user_img/'.$appoint->user->user_img) }}"
                                        class="img-circle" />
                                    @else
                                    <img src="{{ asset('images/default/user.jpg')}}" class="img-circle"
                                        alt="User Image">
                                    @endif
                                </li>
                                <li>{{ __('adminstaticword.User') }}: {{ $appoint->user->fname }}
                                    {{ $appoint->user->lname }}</li>
                                <li>{{ __('adminstaticword.Course') }}: {{ $appoint->courses->title }}</li>
                                <li>{{ __('adminstaticword.Title') }}: {{ $appoint->title }}</li>
                                <li>{{ __('adminstaticword.Detail') }}: {!! $appoint->detail !!}</li>

                            </ul>
                        </div>
                    </div>


                    <form action="{{route('appointment.update',$appoint->id)}}" method="POST"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <input type="hidden" value="{{ $appoint->user_id }}" name="user_id" class="form-control">

                        <input type="hidden" value="{{ $appoint->course_id }}" name="course_id" class="form-control">

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="from-group">
                                    <label>{{ __('adminstaticword.Accept') }}:</label>
                                    <div class="toggler">
                                        <input hidden id="appoint_accept" type="checkbox" name="accept"
                                            {{ $appoint->accept == 1 ? 'checked' : '' }}>
                                        <label class="main-toggle toggle-lg {{ $appoint->accept == 1 ? 'on' : '' }}"
                                            for="appoint_accept">
                                            <span data-tg-off="{{ __('adminstaticword.Disable') }}" data-tg-on="{{ __('adminstaticword.Enable') }}"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row" style="{{ $appoint['accept'] == '1' ? '' : 'display:none' }}" id="sec1_one">
                            <div class="col-xs-12">
                                <label for="reply">{{ __('adminstaticword.Reply') }}:</label>
                                <textarea id="reply" name="reply" rows="1" class="form-control"
                                    placeholder="Enter class detail">{{ $appoint['reply'] }}</textarea>
                            </div>
                        </div>
                        
                        
                        <div class="row">
                            <div class="col-xs-9"></div>
                            <div class="col-xs-3">
                                <button value="" type="submit" class="btn btn-lg col-xs-12 btn-primary">{{ __('adminstaticword.Save') }}</button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
</section>
@endsection


@section('script')
<!--courseclass.js is included -->

<script>
    tinymce.init({
        selector: 'textarea#reply'
    });
</script>


<script>
    (function ($) {
        "use strict";

        $(function () {

            $('#appoint_accept').change(function () {
                if ($('#appoint_accept').is(':checked')) {
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