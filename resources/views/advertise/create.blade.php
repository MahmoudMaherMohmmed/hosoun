@extends('admin.layouts.master')
@section('title', __('adminstaticword.CreateAd'))

@section('body')

<section class="content">
    @include('admin.message')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('adminstaticword.CreateAd') }}</h3>
                </div>
                <div class="panel-body">

                    <form style="margin-top:-15px;" enctype="multipart/form-data" method="POST"
                        action="{{ route('ad.store') }} ">
                        
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="ad_location">{{ __('adminstaticword.AdLocation') }}:</label>
                                    <select name="ad_location" id="ad_location" class="form-control">
                                        <option value="popup">Popup</option>
                                        <option value="onpause">Onpause</option>
                                        <option id="skipad" value="skip">SkipAd</option>
                                    </select>
                                </div>
        
        
                                <div id="s_img" class="form-group">
                                    <div class="form-group {{ $errors->has('ad_image') ? ' has-error' : '' }}">
                                        <label for="ad_image">{{ __('adminstaticword.AdImage') }}</label>
                                        <div>
                                            <input type="file" name="ad_image" id="ad_image" class="inputfile inputfile-1" />
                                            <label for="ad_image"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17"
                                                    viewBox="0 0 20 17">
                                                    <path
                                                        d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
                                                    </svg> <span>{{ __('adminstaticword.Chooseafile') }}&hellip;</span>
                                        </div>
                                        <span class="help-block">
                                            <strong>{{ $errors->first('ad_image') }}</strong>
                                        </span>
                                    </div>
                                </div>
                                
                                <div class="form-group" style="display: none;" id="type">
                                    <input type="radio" value="upload" checked name="checkType" id="ch1"> {{ __('adminstaticword.Upload') }}
                                    <input type="radio" value="url" name="checkType" id="ch2"> {{ __('adminstaticword.URL') }}
                                </div>
        
                                <div class="form-group" style="display: none;">
                                    <input class="form-control" placeholder="http://" type="text" name="ad_url" id="ad_url">
                                </div>
        
        
                                <div id="s_video" style="display: none;" class="form-group">
                                    <div class="form-group {{ $errors->has('ad_video') ? ' has-error' : '' }}">
                                        <label for="ad_image">{{ __('adminstaticword.AdVideo') }}</label>
                                        <input type="file" name="ad_video" class="form-control">
                                        <span class="help-block">
                                            <strong>{{ $errors->first('ad_video') }}</strong>
                                        </span>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="ad_target">{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.AdTarget') }}
                                        :<sup class="redstar">*</sup></label>
                                    <input id="ad_target" type="text" class="form-control"
                                        placeholder="Enter Ad Target URL: http://" name="ad_target" required>
                                </div>
        
                                <div id="forpopup1" class="form-group">
                                    <label for="time">{{ __('adminstaticword.Enter') }}
                                        {{ __('adminstaticword.StartTime') }}:</label>
                                    <input id="time" type="text" class="form-control" placeholder="ex. 00:00:10" name="time">
                                </div>
        
                                <div class="form-group" style="display: none;" id="ad_hold_time">
                                    <label for="ad_hold">{{ __('adminstaticword.AdHoldTime') }}:</label>
                                    <input type="text" id="ad_hold" class="form-control" placeholder="eg. 5" name="ad_hold">
                                </div>
        
                                <div id="forpopup" class="form-group">
                                    <label for="end_time">{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.EndTime') }}
                                        :</label>
                                    <input id="end_time" type="text" class="form-control" placeholder="ex. 00:00:20"
                                        name="end_time">
                                </div>
                            </div>


                            <div class="box-footer">
                                <input type="submit" class="btn btn-primary" value="{{ __('adminstaticword.Submit') }}">
                                <a href="{{ route('ads') }}" class="btn btn-md btn-default"><i class="fa fa-reply"></i>
                                    {{ __('adminstaticword.Back') }} </a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script type="text/javascript">
    $('#test').change(function () {
        if ($(this).val() == 'skip') {
            $('#s_video').show();
            $('#s_img').hide();
            $('#type').show();
            $('#forpopup1').show();
            $('#forpopup').hide();
            $('#ad_hold_time').show();
        } else {
            $('#s_video').hide();
            $('#s_img').show();
            $('#type').hide();
            $('#ad_hold_time').hide();

        }

        if ($(this).val() == 'popup') {
            $('#s_video').hide();
            $('#s_img').show();
            $('#forpopup1').show();
            $('#forpopup').show();
            $('#type').hide();
            $('#ad_hold_time').hide();
        }

        if ($(this).val() == 'onpause') {
            $('#s_video').hide();
            $('#s_img').show();
            $('#forpopup').hide();
            $('#forpopup1').hide();
            $('#type').hide();
            $('#ad_hold_time').hide();
        }

    });

    $('#ch2').click(function () {
        $('#s_video').hide();
        $('#ad_url').show();
    });

    $('#ch1').click(function () {
        $('#s_video').show();
        $('#ad_url').hide();
    });
</script>

<script>
    $(function () {
        $('#toggle-event').change(function () {
            $('#url').val(+$(this).prop('checked'))
        })
    })
</script>
@endsection