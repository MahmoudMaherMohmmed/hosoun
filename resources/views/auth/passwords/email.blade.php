@extends('front.layouts.master')
@section('title')
  إعادة تعيين كلمة المرور
@endsection


@section('content')
  <section class="container">
    <div class="auth-wrapper">
      <section class="auth-block email">
        <div class="auth-head">
          {{ __('frontstaticword.ResetPassword') }}
        </div>
        <div class="auth-body">
          @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
          @endif
          <form method="POST" action="{{ route('password.email') }}">
            @csrf
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
            <button type="submit" class="btn btn-accent w-100 mt-5">
              {{ __('frontstaticword.SendPasswordResetLink') }}
            </button>
          </form>
        </div>
      </section>
    </div>
  </section>
@endsection
@section('js')
@endsection
