@extends('front.layouts.master')
@section('title')
  تسجيل الدخول
@endsection

@section('content')
  <section class="container">
    <div class="auth-wrapper">
      <section class="auth-block">
        <div class="auth-head">
          <span>{{ __('frontstaticword.Welcome') }}</span>
          {{ __('frontstaticword.LogIn') }}
        </div>
        <div class="auth-body">
          <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
              <label for="email" class="form-label">{{ __('frontstaticword.EnterYourEMail') }}</label>
              <div class="form-group-icon">
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                  class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                  placeholder="{{ __('frontstaticword.EnterYourEMail') }}" required autofocus>
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
              <label for="password" class="form-label">{{ __('frontstaticword.EnterYourPassword') }}</label>
              <div class="form-group-icon">
                <input type="password" name="password" id="password"
                  class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                  placeholder="{{ __('frontstaticword.EnterYourPassword') }}" required>
                <svg class="svg-default form-control-icon">
                  <use xlink:href="{{ asset('/front/svg/sprite.svg#lock') }}" />
                </svg>
                <button type="button" class="form-control-icon bg-transparent border-0" onclick="showPassword(this)">
                  <svg class="svg-default ">
                    <use xlink:href="{{ asset('/front/svg/sprite.svg#eye') }}" />
                  </svg>
                </button>
              </div>
              @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
              @endif
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                  {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label text-accent" for="remember">
                  {{ __('frontstaticword.RememberMe') }}
                </label>
              </div>
              <a href="{{ 'password/reset' }}" class=" text-accent">{{ __('frontstaticword.ForgotPassword') }}</a>
            </div>
            <button type="submit" class="btn btn-accent w-100 mt-5">{{ __('frontstaticword.Login') }}</button>

            <div class="mt-4 text-center">
              {{-- <div class="fw-bold"> --}}
              {{-- {{ __('frontstaticword.Donothaveanaccount') }}? --}}
              <a href="{{ route('register') }}" class="btn btn-accent2 w-100">{{ __('frontstaticword.NewAccount') }}</a>
              {{-- </div> --}}
              <div class="mt-4 pt-3">
                {{ __('frontstaticword.Bysigningup') }}
                <a href="{{ url('terms_condition') }}"
                  class="text-accent-2 fw-medium">{{ __('frontstaticword.Terms&Condition') }}</a>
                <a href="{{ url('privacy_policy') }}"
                  class="text-accent-2 fw-medium">{{ __('frontstaticword.PrivacyPolicy') }}</a>
              </div>
            </div>
          </form>
        </div>
      </section>
    </div>
  </section>
@endsection
@section('js')
@endsection
