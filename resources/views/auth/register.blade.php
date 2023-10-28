@extends('front.layouts.master')
@section('title')
  حساب جديد
@endsection

@section('content')
  <section class="container">
    <div class="auth-wrapper">
      <section class="auth-block">
        <div class="auth-head">
          <span>{{ __('frontstaticword.Welcome') }}</span>
          {{ __('frontstaticword.StartLearning') }}
        </div>
        <div class="auth-body">
          <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
              <label for="fname" class="form-label">{{ __('frontstaticword.FirstName') }}</label>
              <div class="form-group-icon">
                <input type="text" name="fname" id="fname"
                  class="form-control {{ $errors->has('fname') ? ' is-invalid' : '' }}" value="{{ old('fname') }}"
                  placeholder="{{ __('frontstaticword.FirstName') }}">
                <svg class="svg-default form-control-icon">
                  <use xlink:href="{{ asset('/front/svg/sprite.svg#profile') }}" />
                </svg>
                @if ($errors->has('fname'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('fname') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label for="lname" class="form-label">{{ __('frontstaticword.LastName') }}</label>
              <div class="form-group-icon">
                <input type="text" name="lname" id="lname"
                  class="form-control {{ $errors->has('lname') ? ' is-invalid' : '' }}"
                  placeholder="{{ __('frontstaticword.LastName') }}" value="{{ old('lname') }}">
                <svg class="svg-default form-control-icon">
                  <use xlink:href="{{ asset('/front/svg/sprite.svg#profile') }}" />
                </svg>
                @if ($errors->has('lname'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('lname') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label for="email" class="form-label">{{ __('frontstaticword.Email') }}</label>
              <div class="form-group-icon">
                <input type="email" name="email" id="email"
                  class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                  placeholder="{{ __('frontstaticword.Email') }}" value="{{ old('email') }}">
                <svg class="svg-default form-control-icon">
                  <use xlink:href="{{ asset('/front/svg/sprite.svg#sms') }}" />
                </svg>
                @if ($errors->has('email'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            @if ($gsetting->mobile_enable == 1)
              <div class="form-group">
                <label for="mobile" class="form-label">{{ __('frontstaticword.Mobile') }}</label>
                <input type="tel" name="mobile" id="mobile"
                  class="form-control {{ $errors->has('mobile') ? ' is-invalid' : '' }}"
                  placeholder="{{ __('frontstaticword.Mobile') }}" value="{{ old('mobile') }}">
                @if ($errors->has('mobile'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('mobile') }}</strong>
                  </span>
                @endif
              </div>
            @endif
            <div class="form-group">
              <label for="country_id" class="form-label">{{ __('frontstaticword.Country') }}</label>
              <div class="form-group-icon">
                <select name="country_id" id="country_id"
                  class="select2-search-enable {{ $errors->has('country_id') ? ' is-invalid' : '' }}"
                  data-placeholder="{{ __('frontstaticword.Country') }}">
                  <option></option>
                  @foreach (App\Country::all() as $country)
                    <option value="{{ $country->country_id }}">
                      {{ $country->nicename }}
                    </option>
                  @endforeach
                </select>
                <svg class="svg-default form-control-icon">
                  <use xlink:href="{{ asset('/front/svg/sprite.svg#location') }}" />
                </svg>
                @if ($errors->has('country_id'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('country_id') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label for="academic_qualification"
                class="form-label">{{ __('frontstaticword.AcademicQualification') }}</label>
              <div class="form-group-icon">
                <select name="academic_qualification" id="academic_qualification"
                  class="select2-search-enable {{ $errors->has('academic_qualification') ? ' is-invalid' : '' }}"
                  data-placeholder="{{ __('frontstaticword.AcademicQualification') }}">
                  <option></option>
                  <option value="0"> {{ __('frontstaticword.IntermediateEducation') }} </option>
                  <option value="1"> {{ __('frontstaticword.Diploma') }} </option>
                  <option value="2"> {{ __('frontstaticword.HighSchoolEducation') }} </option>
                  <option value="3"> {{ __('frontstaticword.UniversityEducation') }} </option>
                  <option value="4"> {{ __('frontstaticword.BA') }} </option>
                  <option value="5"> {{ __('frontstaticword.Master') }} </option>
                  <option value="6"> {{ __('frontstaticword.PhD') }} </option>
                  <option value="7"> {{ __('frontstaticword.OtherAcademicQualification') }} </option>
                </select>
                <svg class="svg-default form-control-icon">
                  <use xlink:href="{{ asset('/front/svg/sprite.svg#teacher') }}" />
                </svg>
                @if ($errors->has('academic_qualification'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('academic_qualification') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label for="password" class="form-label">{{ __('frontstaticword.Password') }}</label>
              <div class="form-group-icon">
                <input type="password" name="password" id="password"
                  class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                  placeholder="{{ __('frontstaticword.Password') }}">
                <svg class="svg-default form-control-icon">
                  <use xlink:href="{{ asset('/front/svg/sprite.svg#lock') }}" />
                </svg>
                @if ($errors->has('password'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                  </span>
                @endif
                <button type="button" class="form-control-icon bg-transparent border-0" onclick="showPassword(this)">
                  <svg class="svg-default ">
                    <use xlink:href="{{ asset('/front/svg/sprite.svg#eye') }}" />
                  </svg>
                </button>
              </div>
            </div>
            <div class="form-group">
              <label for="password_confirmation" class="form-label">{{ __('frontstaticword.ConfirmPassword') }}</label>
              <div class="form-group-icon">
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                  placeholder="{{ __('frontstaticword.ConfirmPassword') }}">
                <svg class="svg-default form-control-icon">
                  <use xlink:href="{{ asset('/front/svg/sprite.svg#lock') }}" />
                </svg>
                <button type="button" class="form-control-icon bg-transparent border-0" onclick="showPassword(this)">
                  <svg class="svg-default ">
                    <use xlink:href="{{ asset('/front/svg/sprite.svg#eye') }}" />
                  </svg>
                </button>
              </div>
            </div>
            <div class="form-check form-group">
              <input type="checkbox" name="term" id="term" class="form-check-input">
              <label for="term" class="form-check-label">
                {{ __('frontstaticword.IAgreeTo') }}
                <a href="{{ url('terms_condition') }}"
                  class="text-accent fw-light">{{ __('frontstaticword.Terms&Condition') }}</a>
                <a href="{{ url('privacy_policy') }}"
                  class="text-accent fw-light">{{ __('frontstaticword.PrivacyPolicy') }}</a>
              </label>
            </div>
            <button type="submit" class="btn btn-accent w-100 mt-5">{{ __('frontstaticword.NewAccount') }}</button>

            <div class="mt-4 text-center">
              {{-- <div class="fw-bold"> --}}
              {{-- {{ __('frontstaticword.Alreadyhaveanaccount') }}? --}}
              <a href="{{ route('login') }}" class="btn btn-accent2 w-100">{{ __('frontstaticword.Login') }}</a>
              {{-- </div> --}}
            </div>
          </form>
        </div>
      </section>
    </div>
  </section>
@endsection
@section('js')
@endsection
