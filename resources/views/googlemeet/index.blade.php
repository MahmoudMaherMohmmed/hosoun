@extends('admin/layouts.master')
@section('title', __('adminstaticword.GoogleMeetings'))
@section('body')
<section class="content">
    @include('admin.message')
    <div class="box">
        <div class="row">
            <div class="col-xs-12">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        {{ __('adminstaticword.GoogleMeetings') }}
                    </h3>
        
                    <a title="Create a new meeting" href="{{ route('googlemeet.meeting.create') }}"
                        class="pull-right btn btn-md btn-info">
                        <i class="fa fa-plus"></i> 
                        {{ __('adminstaticword.Createanewmeeting') }}
                    </a>
                </div>

                <div class="box-body">
        
                    <!-- <div class="panel panel-default">
                     <div class="panel-heading">Your Google Meet Profile</div>
                      <div class="panel-body">
                        <div class="col-md-2">
                       
                        </div>
        
                        <div class="col-md-4">
                            <p><b>First Name:</b></p>
                            <p><b>Last Name:</b> </p>
                            <p><b>Timezone:</b> </p> 
                        </div>
        
                        <div class="col-md-4">
                            <p><b>Status:</b> </p>
                            <p><b>Google Meet ID:</b></p>
                            <p><b>Langauge:</b> </p> 
                        </div>
        
                      </div>
                    </div> -->
                    
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('adminstaticword.MeetingID') }}</th>
                                    <th>{{ __('adminstaticword.MeetingURL') }}</th>
                                    <th>{{ __('adminstaticword.Action') }}</th>
                                </tr>
                            </thead>
            
                            <tbody>
            
                                @php
                                $i = 0;
                                @endphp
            
                                @foreach($allgooglemeet as $key => $meeting)
            
                                @php
                                $i++;
                                @endphp
                                <tr>
                                    <td> {{ $i }} </td>
            
                                    <td>
                                        <p><b>{{ __('adminstaticword.MeetingID') }}:</b>{{ $meeting['meeting_id'] }} </p>
                                        <p><b>{{ __('adminstaticword.MeetingTopic') }}:</b>{{ $meeting['meeting_title'] }} </p>
                                        <p><b>{{ __('adminstaticword.MeetingAgenda') }}:</b>{{ $meeting['agenda'] }}</p>
                                        <p><b>{{ __('adminstaticword.StartTime') }}:</b>{{ $meeting['start_time'] }}</p>
                                        <p><b>{{ __('adminstaticword.EndTime') }}:</b>{{ $meeting['end_time'] }}</p>
                                        <p><b>{{ __('adminstaticword.Duration') }}:</b>{{ $meeting['duration'] }}</p>
                                    </td>
            
                                    <td>
                                        <a title="Join Meeting" target="_blank" href="{{ $meeting['meet_url'] }}">
                                            {{ $meeting['meet_url'] }}
                                        </a>
                                        </a>
                                    </td>
            
                                    <td>
            
                                        <a title="Edit Meeting" href="{{ route('googlemeet.edit',$meeting['meeting_id']) }}"
                                            class="table-edit">
                                            <i class='bx bx-edit'></i>
                                        </a>
            
                                        <a title="Delete Meeting" data-toggle="modal"
                                            data-target="#delete{{ $meeting['meeting_id'] }}" class="table-delete">
                                            <i class='bx bx-trash'></i>
                                        </a>
            
                                        <!-- <a title="View Meeting" href="#" class="btn btn-sm btn-default">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a> -->
            
            
                                        <a title="Start Meeting" href="{{ $meeting['meet_url'] }}" class="btn btn-sm btn-info">
                                            <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                        </a>
                                    </td>  
            
            
                                    {{-- Delete Modal --}}
                                    <div id="delete{{ $meeting['meeting_id'] }}" class="delete-modal modal fade" role="dialog">
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
                                                    <p>{{ __('adminstaticword.DeleteMeeing') }}.</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <form method="post"
                                                        action="{{ route('googlemeet.delete',$meeting['meeting_id']) }}"
                                                        class="pull-right">
                                                        {{csrf_field()}}
                                                        {{method_field("DELETE")}}
                                                        <button type="reset" class="btn btn-gray translate-y-3"
                                                            data-dismiss="modal">{{ __('adminstaticword.No') }}</button>
                                                        <button type="submit" class="btn btn-danger">{{ __('adminstaticword.Yes') }}</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
        
                    <div class="text-center">
        
                    </div>
        
                </div>
            </div>
        </div>

    </div>
</section>
@endsection