@extends('admin/layouts.master')
@section('title', __('adminstaticword.UpdateZoomTokenandemail'))
@section('body')
<section class="content">
  @include('admin.message')

  <div class="box">
    <div class="box-header with-border">
      <h2 class="box-title">{{ __('adminstaticword.UpdateZoomTokenandemail') }}:</h2>
    </div>

    <div class="box-body">
      <div class="row">
        <div class="col-xs-12 col-md-6">
          <form action="{{ route('updateToken') }}" method="POST">
            @csrf
            

            <div class="form-group">
              <div class="eyeCy">
                <label for="password">{{ __('adminstaticword.ZoomEmail') }}:</label>
                <input id="password" value="{{ Auth::user()->zoom_email }}" type="password" name="zoom_email" class="form-control" placeholder="user@example.com">
                <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>

                
              </div>
            </div>

            <div class="form-group">
              <label for="jwt_token">{{ __('adminstaticword.ZoomJWTToken') }}:</label>
              <textarea id="jwt_token" name="jwt_token" class="form-control" rows="5" cols="30" placeholder="Enter your JWT Token here">{{ Auth::user()->jwt_token }}</textarea>
            </div>

            <div class="form-group">
              <button class="btn btn-md btn-primary">
                <i class="fa fa-save"></i> {{ __('adminstaticword.Save') }}
              </button>
            </div>
          </form>
        </div>

        <div class="col-xs-12 col-md-6">
          <h4 style="color: black"><i class="fa fa-question-circle"></i> {{ __('adminstaticword.howtojwt') }}: </h4>
          <hr>
          <div class="panel panel-default">
            <div class="panel-body">
              <ul>
                <li class="bullet-point">{{ __('adminstaticword.step1') }}: <a href="https://marketplace.zoom.us/" target="_blank">Zoom Market Place Portal</a></li>
                <li class="bullet-point">{{ __('adminstaticword.step2') }} : <a href="https://marketplace.zoom.us/develop/create" target="_blank">Create app</a></li>
                <li class="bullet-point">{{ __('adminstaticword.step3') }}...</li>
                <li class="bullet-point">{{ __('adminstaticword.step4a') }} <b>{{ __('adminstaticword.jwttoken') }}</b> {{ __('adminstaticword.step4b') }}</li>
                <li class="bullet-point">{{ __('adminstaticword.step5') }}</li>
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

     $(".toggle-password").on('click', function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if(input.attr("type") == "password") {
          input.attr("type", "text");
        } else {
          input.attr("type", "password");
        }
      });
  </script>
@endsection