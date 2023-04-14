@extends('admin.layouts.master')
@section('title',__('adminstaticword.PushNotificationManager') . ' - ' . __('adminstaticword.Admin'))
@section('body')
<section class="content">
    <div class="row">
        <div class="col-xs-12 col-md-8">
            <div class="box">
                <div class="box-header">
                    <div class="box-title">
                        {{__("adminstaticword.PushNotificationManager")}}
                    </div>
                </div>

                <div class="box-body">
                    <form action="{{ route('admin.push.notif') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="user_group">{{ __('adminstaticword.SelectUserGroup') }}: <span
                                    class="text-danger">*</span> </label>

                            <select required data-placeholder="{{ __('adminstaticword.PleaseSelect') }}" name="user_group" id="user_group"
                                class="select2 form-control">
                                <option value="">{{ __('adminstaticword.SelectUserGroup') }}</option>
                                <option {{ old('user_group') == 'all_users' ? "selected" : "" }} value="all_customers">
                                    {{ __('adminstaticword.All') }} {{ __('adminstaticword.Users') }} </option>
                                <option {{ old('user_group') == 'all_instructors' ? "selected" : "" }}
                                    value="all_sellers">{{ __('adminstaticword.All') }}
                                    {{ __('adminstaticword.Instructors') }} </option>
                                <option {{ old('user_group') == 'all_admins' ? "selected" : "" }} value="all_admins">
                                    {{ __('adminstaticword.All') }} {{ __('adminstaticword.Admin') }} </option>
                                <option {{ old('user_group') == 'all' ? "selected" : "" }} value="all">
                                    {{ __('adminstaticword.All') }} ({{ __('adminstaticword.Users') }} +
                                    {{ __('adminstaticword.Instructors') }} + {{ __('adminstaticword.Admin') }})
                                </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="subject">{{ __('adminstaticword.Subject') }}: <span class="text-red">*</span></label>
                            <input id="subject" placeholder="" type="text" class="form-control" required name="subject"
                                value="{{ old('subject') }}">
                        </div>

                        <div class="form-group">
                            <label for="message">{{ __('adminstaticword.NotificationBody') }} : <span class="text-red">*</span>
                            </label>
                            <textarea required placeholder="" class="form-control" name="message" id="message" cols="3"
                                rows="5">{{ old('message') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="target_url">{{ __('adminstaticword.TargetURL') }} : </label>
                            <input id="target_url" value="{{ old('target_url') }}" class="form-control" name="target_url" type="url"
                                placeholder="{{ url('/') }}">
                            <small class="text-muted">
                                <i class="fa fa-question-circle"></i> {{ __('adminstaticword.notificationLinkNote') }}
                            </small>
                        </div>

                        <div class="form-group">
                            <label for="icon">{{ __('adminstaticword.NotificationIcon') }} : </label>
                            <input id="icon" value="{{ old('icon') }}" name="icon" class="form-control" type="url"
                                placeholder="https://someurl/icon.png">
                            <small class="text-muted">
                                <i class="fa fa-question-circle"></i> {{ __('adminstaticword.notificationIconNote') }}
                            </small>
                        </div>

                        <div class="form-group">
                            <label for="image">{{ __('adminstaticword.Image') }}: </label>
                            <input id="image" value="{{ old('image') }}" class="form-control" name="image" type="url"
                                placeholder="https://someurl/image.png">
                            <small class="text-muted">
                                <i class="fa fa-question-circle"></i> <b>{{ __('adminstaticword.RecommnadedSize') }}:
                                    450x228 px.</b>
                            </small>
                        </div>

                        <div class="form-group item-flex">
                            <label>{{ __('adminstaticword.ShowButton') }}: </label>
                            <div class="toggler">
                                <input hidden {{ old('show_button') ? "checked" : "" }} id="show_button" class="show_button" type="checkbox" name="show_button">
                                <label for="show_button" class="main-toggle {{ old('show_button') ? "on" : "" }}">
                                    <span data-on="{{ __('adminstaticword.Yes') }}" data-off="{{ __('adminstaticword.No') }}"></span>
                                </label>
                            </div>
                        </div>

                        <div style="display: {{ old('show_button') ? 'block' : 'none' }};" id="buttonBox">
                            <div class="form-group">
                                <label for="btn_text">{{ __('adminstaticword.ButtonText') }}: <span
                                        class="text-danger">*</span></label>
                                <input id="btn_text" value="{{ old('btn_text') }}" class="form-control" name="btn_text" type="text"
                                    placeholder="Grab Now !">
                            </div>

                            <div class="form-group">
                                <label for="btn_url">{{ __('adminstaticword.ButtonTargetURL') }} : </label>
                                <input id="btn_url" value="{{ old('btn_url') }}" class="form-control" name="btn_url" type="url"
                                    placeholder="https://someurl/image.png">
                                <small class="text-muted">
                                    <i class="fa fa-question-circle"></i> {{ __('adminstaticword.notificationButtonNote') }}
                                </small>
                            </div>
                        </div>

                        <div class="from-group">
                            <button type="submit" class="btn btn-block btn-md btn-primary">
                                <i class="fa fa-location-arrow"></i> {{ __('adminstaticword.Send') }}
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-md-4">
            <div class="box">
                <div class="box-header">
                    <div class="box-title">
                        {{ __('adminstaticword.OnesignalKeys') }}
                    </div>

                    <a title="Get one signal keys" href="https://onesignal.com/" class="pull-right" target="__blank">
                        <i class="fa fa-key"></i> {{ __('adminstaticword.Getyourkeysfromhere') }}
                    </a>
                </div>

                <div class="box-body">

                    <form action="{{ route('onesignal.update') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="eyeCy">

                                <label for="ONESIGNAL_APP_ID">{{ __('adminstaticword.ONESIGNALAPPID') }}: <span
                                        class="text-danger">*</span></label>
                                <input type="password" value="{{ env('ONESIGNAL_APP_ID') }}" name="ONESIGNAL_APP_ID"
                                    placeholder="Enter ONESIGNAL APP ID " id="ONESIGNAL_APP_ID" type="password"
                                    class="form-control">
                                <span toggle="#ONESIGNAL_APP_ID"
                                    class="fa fa-fw fa-eye field-icon toggle-password"></span>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="eyeCy">

                                <label for="ONESIGNAL_REST_API_KEY"> {{ __('adminstaticword.ONESIGNALRESTAPIKEY') }}:
                                    <span class="text-danger">*</span></label>
                                <input type="password" value="{{ env('ONESIGNAL_REST_API_KEY') }}"
                                    name="ONESIGNAL_REST_API_KEY" placeholder="Enter ONESIGNAL REST API KEY "
                                    id="ONESIGNAL_REST_API_KEY" type="password" class="form-control">
                                <span toggle="#ONESIGNAL_REST_API_KEY"
                                    class="fa fa-fw fa-eye field-icon toggle-password"></span>

                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-md">
                                <i class="fa fa-save"></i> {{ __('adminstaticword.Save') }}
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')
<script>
    $('.show_button').on('change', function () {

        if ($(this).is(":checked")) {
            $('input[name=btn_text]').attr('required', 'required');
            $('#buttonBox').show('fast');
        } else {
            $('input[name=btn_text]').removeAttr('required');
            $('#buttonBox').hide('fast');
        }

    });
</script>


<script>
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
@endsection