@extends('admin/layouts.master')
@section('title', 'Update Google Meet Setting')
@section('body')
<section class="content">
    @include('admin.message')

    <div class="box">
        <div class="box-header with-border">
            <div class="box-title">
                Upload Google Meet clientsecret.json file :
            </div>
        </div>

        <div class="box-body">
            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <form action="{{ route('googlemeet.updatefile') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="eyeCy">
                                <label for="file">Chose Json File (clientsecret.json):</label>
                                <div>
                                    <input id="file" type="file" name="file" value="" class="inputfile inputfile-1">
                                    <label for="file"><svg xmlns="http://www.w3.org/2000/svg" width="10"
                                            height="7" viewBox="0 0 20 17">
                                            <path
                                                d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
                                        </svg> <span>{{ __('adminstaticword.Chooseafile') }}&hellip;</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-md btn-primary">
                                <i class="fa fa-save"></i> {{ __('adminstaticword.Save') }}
                            </button>
                        </div>
                    </form>
                </div>

                <div class="col-xs-12 col-md-6">
                    <h4 style="color: black"><i class="fa fa-question-circle"></i> How to get Google Meet
                        clientsecret.json file : </h4>
                    <hr>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <ul>
                                <li class="bullet-point">Use the link to create or select a project in the google developers console and
                                    automatically turn on the APi. Click continue then <b>go to credential</b>. : <a
                                        href="https://console.cloud.google.com/flows/enableapi?apiid=calendar"
                                        target="_blank">Google Cloud Platform</a></li>
                                <li class="bullet-point">On the <b>Add credentials to your project</b>click the <b>Cancel</b> button.</li>
                                <li class="bullet-point">At the top of the page, select the <b>Oauth consent screen</b>tab. Select an
                                    <b>Email Address</b>, Enter product name if not already set and click the
                                    <b>Save</b> button.</li>
                                <li class="bullet-point">Select the <b>Credentials</b> tab, click the <b>Create Credentials</b> button and
                                    select <b>Oauth client id</b>.</li>
                                <li class="bullet-point">Select the application type <b>Other</b>, enter the name 'googlemeet'. and click
                                    the <b>Create</b> button.</li>
                                <li class="bullet-point">Click <b>Ok</b> to dismiss the resulting dialog.</li>
                                <li class="bullet-point">Click the <b>download json</b> button to the right of the client id.</li>
                                <li class="bullet-point">Upload your <b>(Downloaded json)</b>file.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
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
@endsection