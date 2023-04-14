@extends('admin/layouts.master')
@section('title', __('adminstaticword.Edit') . ' ' . __('adminstaticword.ZoomMeeting') . ': '.$response['id'])
@section('body')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<section class="content">
    <div class="box">

        <div class="box-header with-border">
            <div class="box-title">
                {{ __('adminstaticword.Edit') }} {{ __('adminstaticword.ZoomMeeting') }} : <b>{{ $response['id'] }}</b>
                <h5>{{ __('adminstaticword.MeetingType') }} : @if($response['type'] == '2') {{ __('adminstaticword.MeetingType') }} @elseif($response['type'] == '3')
                    Recurring Meeting with no fixed time @else Recurring Meeting with fixed time @endif </h5>
            </div>
        </div>

        <div class="box-body">
            <form autocomplete="off" action="{{ route('zoom.update',$response['id']) }}" method="POST"
                enctype="multipart/form-data">

                @csrf

                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="image">{{ __('adminstaticword.Image') }}:</label>
                            <div>
                                <input type="file" name="image" id="image" class="inputfile inputfile-1">
                                <label for="image"><svg xmlns="http://www.w3.org/2000/svg" width="50"
                                        height="30" viewBox="0 0 20 17">
                                        <path
                                            d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
                                    </svg> <span>{{ __('adminstaticword.Chooseafile') }}</span>
                                </label>
                            </div>
                            @if(isset($meeting->image))
                            <img src="{{ url('/images/zoom/'.$meeting->image) }}" />
                            @endif
                        </div>

                        <div class="form-group">
                            <label>{{ __('adminstaticword.LinkByCourse') }}:</label>
                            <div class="toggler">
                                <input hidden id="link_by" type="checkbox" name="link_by"
                                    {{ isset($meeting['link_by']) == 'course' ? 'checked' : '' }}>
                                <label class="main-toggle toggle-lg {{ isset($meeting['link_by']) == 'course' ? 'on' : '' }}" for="link_by">
                                    <span data-off="{{ __('adminstaticword.Disable') }}" data-on="{{ __('adminstaticword.Enable') }}"></span>
                                </label>
                            </div>
                            <input type="hidden" name="free" value="0" for="opp" id="link_by">
                        </div>

                        <div class="form-group" style="{{ isset($meeting['link_by']) == 'course' ? '' : 'display:none' }}"
                            id="sec1_one">
                            <label for="course_id">{{ __('adminstaticword.Courses') }}:</label>
                            <select name="course_id" id="course_id" class="form-control js-example-basic-single">
                                @foreach($course as $caat)
                                <option {{ isset($meeting['course_id']) == $caat->id ? 'selected' : "" }}
                                    value="{{ $caat->id }}">{{ $caat->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="topic">{{ __('adminstaticword.MeetingTopic') }}:<sup class="redstar">*</sup></label>
                            <input id="topic" value="{{ $response['topic'] }}" type="text" name="topic" placeholder="Ex. My Meeting"
                                class="form-control" required>
                        </div>
        
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input name="recurring" type="checkbox" class="custom-control-input" id="recurring_meeting"
                                    @if($response['type']=='3' ) checked @endif>
                                <label class="custom-control-label" for="recurring_meeting"
                                    value="{{ $response['topic'] }}">Recurring Metting (with no fixed time) </label>
                                <br>
                            </div>
                        </div>

                        @if($response['type'] == '2' && $response['type'] == '8')
                        <div class="form-group">
                            <label for="start_time">{{ __('adminstaticword.StartTime') }}:<sup class="redstar">*</sup></label>
                            <div class='input-group date' id='datetimepicker1'>
                                <input id="start_time"
                                    value="{{ isset($response['start_time']) ? date('d-m-Y | h:i:s A',strtotime($response['start_time'])) : "" }}"
                                    name="start_time" type='text' class="form-control" required />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                        @endif
                        

                        <div class="form-group">
                            <input type="hidden" name="timezone" value="{{ $response['timezone'] }}">
                        </div>
        
        
                        @if($response['type'] == '2' && $response['type'] == '8')
                        <div class="form-group">
                            <label for="duration">{{ __('adminstaticword.Duration') }}:<sup class="redstar">*</sup></label>
                            <input id="duration" value="{{ $response['duration'] }}" placeholder="enter in mins eg 60" type="number" min="1"
                                name="duration" class="form-control" required>
                        </div>
                        @endif
        
                        <div class="form-group">
                            <div class="eyeCy">
                                <label for="password">{{ __('adminstaticword.Password') }}: ({{ __('adminstaticword.Optional') }})</label>
                                <input value="{{ isset($response['password']) ? $response['password'] : "" }}" id="password"
                                    type="password" name="password" class="form-control">
                                <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                        </div>
        
                        <div class="form-group">
                            <label for="agenda">{{ __('adminstaticword.Meeting') }} {{ __('adminstaticword.Agenda') }}:<sup class="redstar">*</sup></label>
                            {{-- <input value="{{ $response['agenda'] }}" type="text" name="agenda" placeholder="Meeting Agenda"
                            class="form-control" required> --}}
                            <textarea id="agenda" name="agenda" class="form-control" rows="3" required placeholder="Meeting Agenda"
                                value="{{ $response['agenda'] }}">{{ $response['agenda'] }}</textarea>
                        </div> 
                    </div>
                    

                    <div class="col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h5 class="panel-title">{{ __('adminstaticword.Meeting') }} {{ __('adminstaticword.Setting') }}:</h5>
                                <hr>
                                <div class="custom-control custom-checkbox">
                                    <input {{ $response['settings']['host_video'] == true ? "checked" : "" }} name="host_video"
                                        type="checkbox" class="custom-control-input" id="host_video">
                                    <label class="custom-control-label" for="host_video">Enable Host Video</label>
                                </div>
        
                                <div class="custom-control custom-checkbox">
                                    <input {{ $response['settings']['participant_video'] == true ? "checked" : "" }}
                                        name="participant_video" type="checkbox" class="custom-control-input"
                                        id="participant_video">
                                    <label class="custom-control-label" for="participant_video">Enable Participant Video</label>
                                </div>
        
                                <div class="custom-control custom-checkbox">
                                    <input {{ $response['settings']['join_before_host'] == true ? "checked" : "" }}
                                        name="join_before_host" type="checkbox" class="custom-control-input"
                                        id="join_before_host">
                                    <label class="custom-control-label" for="join_before_host">Join before host?</label>
                                </div>
        
                                <div class="custom-control custom-checkbox">
                                    <input {{ $response['settings']['mute_upon_entry'] == true ? "checked" : "" }}
                                        name="mute_upon_entry" type="checkbox" class="custom-control-input"
                                        id="mute_upon_entry">
                                    <label class="custom-control-label" for="mute_upon_entry">Mute Upon Entry?</label>
                                </div>
        
                                <div class="custom-control custom-checkbox">
                                    <input
                                        {{ $response['settings']['registrants_email_notification'] == true ? "checked" : "" }}
                                        name="registrants_email_notification" type="checkbox" class="custom-control-input"
                                        id="registrants_email_notification">
                                    <label class="custom-control-label" for="registrants_email_notification">Registrants email
                                        notification?</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>
                
                <div class="row">
                    <div class="col-xs-6 col-sm-9 col-md-10"></div>
                    <div class="m-1 form-group col-xs-6 col-sm-3 col-md-2">
                        <button class="btn btn-success btn-md col-xs-12">{{ __('adminstaticword.Update') }} {{ __('adminstaticword.Meeting') }}</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</section>
@endsection
@section('script')
<script>
    $('#datetimepicker1').datetimepicker({
        format: 'YYYY-MM-DD HH:mm:ss',
    });

    $(".toggle-password").on('click', function () {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
</script>

<script>
    (function ($) {
        "use strict";

        $(function () {

            $('#link_by').change(function () {
                if ($('#link_by').is(':checked')) {
                    $('#sec1_one').show('fast');
                } else {
                    $('#sec1_one').hide('fast');
                }

            });

        });
    })(jQuery);
</script>
@endsection