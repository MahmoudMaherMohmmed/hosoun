@extends('front.layouts.master')
@section('title')
  كلمة المرور الجديدة
@endsection

@section('content')
  <section class="container">
    <div class="auth-wrapper">
      <section class="auth-block reset">
        <div class="auth-head">
          {{ __('frontstaticword.ResetPassword') }}
        </div>
        <div class="auth-body">
          <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group">
              <label for="email" class="form-label">{{ __('frontstaticword.E-MailAddress') }}</label>
              <div class="form-group-icon">
                <input type="email" name="email" id="email"
                  class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                  placeholder="{{ __('frontstaticword.E-MailAddress') }}" value="{{ old('email') }}" required>
                <svg class="svg-default form-control-icon">
                  <use xlink:href="{{ asset('/front/svg/sprite.svg#sms') }}" />
                </svg>
              </div>
              @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
              @endif
            </div>

            <div class="form-group">
              <label for="password" class="form-label">{{ __('frontstaticword.Password') }}</label>
              <div class="form-group-icon">
                <input type="password" name="password" id="password"
                  class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                  placeholder="{{ __('frontstaticword.Password') }}" required>
                <svg class="svg-default form-control-icon">
                  <use xlink:href="{{ asset('/front/svg/sprite.svg#lock') }}" />
                </svg>
              </div>
              @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group">
              <label for="confirm_password" class="form-label">{{ __('frontstaticword.ConfirmPassword') }}</label>
              <div class="form-group-icon">
                <input type="password" name="password_confirmation" id="confirm_password" class="form-control"
                  placeholder="{{ __('frontstaticword.ConfirmPassword') }}">
                <svg class="svg-default form-control-icon">
                  <use xlink:href="{{ asset('/front/svg/sprite.svg#lock') }}" />
                </svg>
              </div>
            </div>
            <button type="submit" class="btn btn-accent w-100 mt-5">
              {{ __('frontstaticword.ResetPassword') }}
            </button>
          </form>
        </div>
      </section>
    </div>
  </section>
@endsection
@section('js')
@endsection
