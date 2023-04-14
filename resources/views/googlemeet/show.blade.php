@extends('admin/layouts.master')
@section('title', __('adminstaticword.View') . ' ' . __('adminstaticword.Meeting') . ':' . .$response['id'])
@section('body')
<section class="content">
    <div class="box">

        <div class="box-header with-border">
            <div class="box-title">
                {{ __('adminstaticword.View') }} {{ __('adminstaticword.Meeting') }} : {{ $response['id'] }}
            </div>

            <div class="pull-right tools">
                <a title="Back" href="{{ route('zoom.index') }}" class="btn btn-sm btn-default">
                    <i class="fa fa-reply"></i>
                </a>

                <a title="Edit Meeting" href="{{ route('zoom.edit',$response['id']) }}" class="btn btn-sm btn-success">
                    <i class='bx bx-edit'></i>
                </a>

                <a title="Delete Meeting" data-toggle="modal" data-target="#delete{{ $response['id'] }}"
                    class="btn btn-sm btn-primary">
                    <i class='bx bx-trash'></i>
                </a>

                <a title="Start Meeting" target="_blank" href="{{ $response['start_url'] }}"
                    class="btn btn-sm btn-success">
                    <i class='bx bx-camera'></i>
                </a>
            </div>

            <div id="delete{{ $response['id'] }}" class="delete-modal modal fade" role="dialog">
                <div class="modal-dialog modal-sm">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <div class="delete-icon"></div>
                        </div>
                        <div class="modal-body text-center">
                            <i class='bx bx-trash'></i>
                            <h4 class="modal-heading">{{ __('adminstaticword.AreYouSure') }}</h4>
                            <p>{{ __('adminstaticword.DeleteMeeting') }}.</p>
                        </div>
                        <div class="modal-footer">
                            <form method="post" action="{{ route('zoom.delete',$response['id']) }}" class="pull-right">
                                {{csrf_field()}}
                                {{method_field("DELETE")}}


                                <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal">{{ __('adminstaticword.No') }}</button>
                                <button type="submit" class="btn btn-danger">{{ __('adminstaticword.Yes') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="box-body">
            <h3>{{ __('adminstaticword.MeetingID') }}: {{ $response['id'] }}</h3>
            <hr>
            <h3>{{ __('adminstaticword.MeetingType') }}:@if($response['type'] == '2') {{ __('adminstaticword.ScheduledMeeting') }} @elseif($response['type'] == '3')
                Recurring Meeting with no fixed time @else Recurring Meeting with fixed time @endif</h3>
            <hr>
            <h3>{{ __('adminstaticword.MeetingTopic') }}: {{ $response['topic'] }}</h3>
            <hr>
            <h3>{{ __('adminstaticword.MeetingAgenda') }}:{{ isset($response['agenda']) ? $response['agenda'] : "" }}</h3>
            <hr>
            <h3>{{ __('adminstaticword.StartTime') }}:{{ isset($response['start_time']) ? date('d-m-Y | h:i:s A',strtotime($response['start_time'])) : "" }}
            </h3>
            <hr>
            <h3>Meeting Contact Name :
                {{ isset($response['settings']['contact_name']) ? $response['settings']['contact_name'] : $response['host_email'] }}
            </h3>
            <hr>
            <h3>Invite URL : <a href="{{ isset($response['join_url']) }}">{{ $response['join_url'] }}</a></h3>
            <hr>
            <h3>{{ __('adminstaticword.Duration') }}: {{ isset($response['duration']) ? $response['duration'] : "" }} min.</h3>
            <hr>
            <h3>Other Meeting Settings :</h3>
            <hr>
            <h5><i class="fa fa-microphone" aria-hidden="true"></i> {{ __('adminstaticword.Audio') }}:
                {{ isset($response['settings']['audio']) == 'both' ? "Computer and Internet call" : isset($response['settings']['audio']) }}
            </h5>
            <h5><i class="fa fa-camera" aria-hidden="true"></i> Host Video :
                {{ isset($response['settings']['host_video']) == true ? "{{ __('adminstaticword.Enable') }}" : "{{ __('adminstaticword.Disable') }}"}}</h5>
            <h5><i class="fa fa-group" aria-hidden="true"></i> Join before Host :
                {{ isset($response['settings']['join_before_host']) == true ? "{{ __('adminstaticword.Yes') }}" : "{{ __('adminstaticword.No') }}"}}</h5>
            <h5><i class="fa fa-group" aria-hidden="true"></i> Join before Host :
                {{ isset($response['settings']['join_before_host']) == true ? "{{ __('adminstaticword.Yes') }}" : "{{ __('adminstaticword.No') }}"}}</h5>
            <h5><i class="fa fa-group" aria-hidden="true"></i> Participant Video :
                {{ isset($response['settings']['participant_video']['join_before_host']) == true ? "{{ __('adminstaticword.Enable') }}" : "{{ __('adminstaticword.Disable') }}"}}
            </h5>
        </div>


    </div>
</section>
@endsection