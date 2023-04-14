@extends('front.layouts.master')
@section('custom-css')
  <style>
      /* Chrome, Safari, Edge, Opera */
      input::-webkit-outer-spin-button,
      input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
      }

      /* Firefox */
      input[type=number] {
        -moz-appearance: textfield;
      }
  </style>
@endsection
@section('title')
  {{ __('frontstaticword.UserProfile') }}
@endsection

@section('content')
  @include('front.layouts.page_header', ['title' => __('frontstaticword.UserProfile')])
  <section class="block-sec">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 offset-lg-1">
          @include('admin.message')
          <form action="{{ route('user.profile', $user->id) }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}

            {{-- Personal Information --}}
            <h4 class="title-25 mb-4 pb-3">{{ __('frontstaticword.PersonalInfo') }}</h4>
            <fieldset class="main-block mb-5">
              <div class="row">
                <div class="col-12 mb-5 pb-3">
                  <div class="profile-pic position-relative mx-auto">
                    <input type="file" name="user_img" id="upload-pic" class="position-absolute d-none"
                      onchange="previewPic(this)">
                    @if(Auth::User()->user_img != null || Auth::User()->user_img !='')
                      <img src="{{ asset('/images/user_img/'.Auth::User()->user_img) }}" alt="profile-pic">
                    @else
                      <img src="{{ asset('front/img/user.jpg') }}" alt="profile-pic">
                    @endif
                    <label for="upload-pic" class="m-0">
                      <svg class="svg-resize-28 svg-fill-white">
                        <use xlink:href="{{ asset('front/svg/sprite.svg#camera') }}" />
                      </svg>
                    </label>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="fname" class="form-label">{{ __('frontstaticword.FirstName') }}</label>
                    <div class="form-group-icon {{ $errors->has('fname') ? ' is-invalid' : '' }}">
                      <input type="text" name="fname" id="fname" class="form-control"
                        placeholder="{{ __('frontstaticword.EnterFirstName') }}" value="{{ $user->fname }}" required>
                      <svg class="svg-default form-control-icon">
                        <use xlink:href="{{ asset('front/svg/sprite.svg#profile') }}" />
                      </svg>
                    </div>
                    @if ($errors->has('fname'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('fname') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="lname" class="form-label">{{ __('frontstaticword.LastName') }}</label>
                    <div class="form-group-icon {{ $errors->has('lname') ? ' is-invalid' : '' }}">
                      <input type="text" name="lname" id="lname" class="form-control"
                        placeholder="{{ __('frontstaticword.EnterLastName') }}" value="{{ $user->lname }}" required>
                      <svg class="svg-default form-control-icon">
                        <use xlink:href="{{ asset('front/svg/sprite.svg#profile') }}" />
                      </svg>
                    </div>
                    @if ($errors->has('lname'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('lname') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="email" class="form-label">{{ __('frontstaticword.Email') }}</label>
                    <div class="form-group-icon {{ $errors->has('email') ? ' is-invalid' : '' }}">
                      <input type="email" name="email" id="email" class="form-control"
                        placeholder="{{ __('frontstaticword.EnterEmail') }}" value="{{ $user->email }}" required>
                      <svg class="svg-default form-control-icon">
                        <use xlink:href="{{ asset('front/svg/sprite.svg#sms') }}" />
                      </svg>
                    </div>
                    @if ($errors->has('email'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="mobile" class="form-label">{{ __('frontstaticword.Mobile') }}</label>
                    <input type="text" name="mobile" id="mobile"
                      class="form-control {{ $errors->has('mobile') ? ' is-invalid' : '' }}"
                      placeholder="{{ __('frontstaticword.EnterMobileNo') }}" value="{{ $user->mobile }}" required>
                    @if ($errors->has('mobile'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('mobile') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="country_id" class="form-label">{{ __('frontstaticword.Country') }}</label>
                    <div class="form-group-icon {{ $errors->has('country_id') ? ' is-invalid' : '' }}">
                      <select data-placeholder="{{ __('frontstaticword.SelectanOption') }}" name="country_id"
                        id="country_id">
                        {{-- a must for placehoder --}}
                        <option></option>
                        {{-- /a must for placehoder --}}
                        @foreach ($countries as $country)
                          <option value="{{ $country->country_id }}"
                            {{ $user->country_id == $country->country_id ? 'selected' : '' }}>{{ $country->nicename }}
                          </option>
                        @endforeach
                      </select>
                      <svg class="svg-default form-control-icon">
                        <use xlink:href="{{ asset('front/svg/sprite.svg#location') }}" />
                      </svg>
                    </div>
                    @if ($errors->has('country_id'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('country_id') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="state_id" class="form-label">{{ __('frontstaticword.State') }}</label>
                    <div class="form-group-icon {{ $errors->has('state_id') ? ' is-invalid' : '' }}">
                      <select data-placeholder="{{ __('frontstaticword.SelectanOption') }}" name="state_id"
                        id="state_id">
                        {{-- a must for placehoder --}}
                        <option></option>
                        {{-- /a must for placehoder --}}
                        @foreach ($states as $state)
                          <option value="{{ $state->id }}" {{ $user->state_id == $state->id ? 'selected' : '' }}>
                            {{ $state->name }}</option>
                        @endforeach
                      </select>
                      <svg class="svg-default form-control-icon">
                        <use xlink:href="{{ asset('front/svg/sprite.svg#location') }}" />
                      </svg>
                    </div>
                    @if ($errors->has('state_id'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('state_id') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="city_id" class="form-label">{{ __('frontstaticword.City') }}</label>
                    <div class="form-group-icon {{ $errors->has('city_id') ? ' is-invalid' : '' }}">
                      <select data-placeholder="{{ __('frontstaticword.SelectanOption') }}" name="city_id"
                        id="city_id">
                        {{-- a must for placehoder --}}
                        <option></option>
                        {{-- /a must for placehoder --}}
                        @foreach ($cities as $city)
                          <option value="{{ $city->id }}" {{ $user->city_id == $city->id ? 'selected' : '' }}>
                            {{ $city->name }}</option>
                        @endforeach
                      </select>
                      <svg class="svg-default form-control-icon">
                        <use xlink:href="{{ asset('front/svg/sprite.svg#location') }}" />
                      </svg>
                    </div>
                    @if ($errors->has('city_id'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('city_id') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="nationality" class="form-label">{{ __('frontstaticword.Nationality') }}</label>
                    <div class="form-group-icon {{ $errors->has('nationality') ? ' is-invalid' : '' }}">
                      <select data-placeholder="{{ __('frontstaticword.SelectanOption') }}" name="nationality"
                        id="nationality">
                        {{-- a must for placehoder --}}
                        <option></option>
                        {{-- /a must for placehoder --}}
                        <option value="0" {{ $user->nationality == '0' ? 'selected' : '' }}>
                          {{ __('frontstaticword.SaudiArabia') }}
                        </option>
                        <option value="1" {{ $user->nationality == '1' ? 'selected' : '' }}>
                          {{ __('frontstaticword.GulfCountries') }}
                        </option>
                        <option value="2" {{ $user->nationality == '2' ? 'selected' : '' }}>
                          {{ __('frontstaticword.ArabCountries') }}
                        </option>
                        <option value="3" {{ $user->nationality == '3' ? 'selected' : '' }}>
                          {{ __('frontstaticword.ForeignerWithASaudiPassport') }}
                        </option>
                        <option value="4" {{ $user->nationality == '4' ? 'selected' : '' }}>
                          {{ __('frontstaticword.DisplacedTribesmen') }}
                        </option>
                        <option value="5" {{ $user->nationality == '5' ? 'selected' : '' }}>
                          {{ __('frontstaticword.OtherNationality') }}  
                        </option>
                      </select>
                      <svg class="svg-default form-control-icon">
                        <use xlink:href="{{ asset('front/svg/sprite.svg#calendar') }}" />
                      </svg>
                    </div>
                    @if ($errors->has('nationality'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('nationality') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="work" class="form-label">{{ __('frontstaticword.nationalID') }}</label>
                    <div class="form-group-icon {{ $errors->has('national_id') ? ' is-invalid' : '' }}">
                      <input type="number" name="national_id" id="national_id" class="form-control"
                        placeholder="{{ __('frontstaticword.nationalID') }}"
                        value="{{ $user->national_id != null ? $user->national_id : old('national_id') }}">
                      <svg class="svg-default form-control-icon">
                        <use xlink:href="{{ asset('front/svg/sprite.svg#profile') }}" />
                      </svg>
                    </div> 
                    @if ($errors->has('national_id'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('national_id') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="academic_qualification"
                      class="form-label">{{ __('frontstaticword.AcademicQualification') }}</label>
                    <div class="form-group-icon {{ $errors->has('academic_qualification') ? ' is-invalid' : '' }}">
                      <select data-placeholder="{{ __('frontstaticword.SelectanOption') }}"
                        name="academic_qualification" id="academic_qualification">
                        {{-- a must for placehoder --}}
                        <option></option>
                        {{-- /a must for placehoder --}}
                        <option value="0" {{ $user->academic_qualification == '0' ? 'selected' : '' }}>
                          {{ __('frontstaticword.IntermediateEducation') }} </option>
                        <option value="1" {{ $user->academic_qualification == '1' ? 'selected' : '' }}>
                          {{ __('frontstaticword.Diploma') }} </option>
                        <option value="2" {{ $user->academic_qualification == '2' ? 'selected' : '' }}>
                          {{ __('frontstaticword.HighSchoolEducation') }} </option>
                        <option value="3" {{ $user->academic_qualification == '3' ? 'selected' : '' }}>
                          {{ __('frontstaticword.UniversityEducation') }} </option>
                        <option value="4" {{ $user->academic_qualification == '4' ? 'selected' : '' }}>
                          {{ __('frontstaticword.BA') }} </option>
                        <option value="5" {{ $user->academic_qualification == '5' ? 'selected' : '' }}>
                          {{ __('frontstaticword.Master') }} </option>
                        <option value="6" {{ $user->academic_qualification == '6' ? 'selected' : '' }}>
                          {{ __('frontstaticword.PhD') }} </option>
                        <option value="7" {{ $user->academic_qualification == '7' ? 'selected' : '' }}>
                          {{ __('frontstaticword.OtherAcademicQualification') }} </option>
                      </select>
                      <svg class="svg-default form-control-icon">
                        <use xlink:href="{{ asset('front/svg/sprite.svg#teacher') }}" />
                      </svg>
                    </div>
                    @if ($errors->has('academic_qualification'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('academic_qualification') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
              </div>
            </fieldset>
            {{-- Change Password --}}
            <h4 class="title-25 mb-4 pb-3">{{ __('frontstaticword.UpdatePassword') }}</h4>
            <fieldset class="main-block mb-5">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="password" class="form-label">{{ __('frontstaticword.Password') }}</label>
                    <div class="form-group-icon {{ $errors->has('password') ? ' is-invalid' : '' }}">
                      <input type="password" name="password" id="password" class="form-control"
                        placeholder="{{ __('frontstaticword.EnterPassword') }}">
                      <svg class="svg-default form-control-icon">
                        <use xlink:href="{{ asset('front/svg/sprite.svg#lock') }}" />
                      </svg>
                    </div>
                    @if ($errors->has('password'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="confirm_password"
                      class="form-label">{{ __('frontstaticword.ConfirmPassword') }}</label>
                    <div class="form-group-icon">
                      <input type="password" class="form-control" name="confirm_password" id="confirm_password"
                        placeholder="{{ __('frontstaticword.ConfirmPassword') }}">
                      <svg class="svg-default form-control-icon">
                        <use xlink:href="{{ asset('front/svg/sprite.svg#lock') }}" />
                      </svg>
                    </div>
                  </div>
                </div>
              </div>
            </fieldset>
            {{-- Social Profile --}}
            <h4 class="title-25 mb-4 pb-3">{{ __('frontstaticword.SocialProfile') }}</h4>
            <fieldset class="main-block mb-5">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="fb_url" class="form-label">{{ __('frontstaticword.FacebookUrl') }}</label>
                    <div class="form-group-icon {{ $errors->has('fb_url') ? ' is-invalid' : '' }}">
                      <input type="url" name="fb_url" id="fb_url" class="form-control"
                        placeholder="{{ __('frontstaticword.FacebookUrl') }}" value="{{ $user->fb_url }}">
                      <svg class="svg-resize-20 form-control-icon" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20.666 20.666">
                        <g transform="translate(0 0)">
                          <path
                            d="M19.525,0H1.14A1.14,1.14,0,0,0,0,1.141V19.526a1.14,1.14,0,0,0,1.141,1.14H19.525a1.14,1.14,0,0,0,1.141-1.14h0V1.14A1.14,1.14,0,0,0,19.525,0Zm0,0"
                            transform="translate(0 0)" fill="#4267b2" />
                          <path
                            d="M212.913,94.869V86.877h2.694l.4-3.128h-3.1V81.757c0-.9.251-1.519,1.547-1.519H216.1v-2.79a22.077,22.077,0,0,0-2.407-.123,3.758,3.758,0,0,0-4.011,4.123v2.3H207v3.128h2.684v7.992Zm0,0"
                            transform="translate(-198.645 -74.203)" fill="#fff" />
                        </g>
                      </svg>
                    </div>
                    @if ($errors->has('fb_url'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('fb_url') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="twitter_url" class="form-label">{{ __('frontstaticword.TwitterUrl') }}</label>
                    <div class="form-group-icon {{ $errors->has('twitter_url') ? ' is-invalid' : '' }}">
                      <input type="url" name="twitter_url" id="twitter_url" class="form-control"
                        placeholder="{{ __('frontstaticword.TwitterUrl') }}" value="{{ $user->twitter_url }}">
                      <svg xmlns="http://www.w3.org/2000/svg" class="svg-resize-20 form-control-icon"
                        viewBox="0 0 21.296 17.308">
                        <path
                          d="M6.7,17.807A12.347,12.347,0,0,0,19.129,5.375q0-.284-.012-.565A8.89,8.89,0,0,0,21.3,2.548a8.716,8.716,0,0,1-2.509.688A4.385,4.385,0,0,0,20.709.819a8.766,8.766,0,0,1-2.774,1.06,4.373,4.373,0,0,0-7.446,3.985A12.405,12.405,0,0,1,1.482,1.3,4.373,4.373,0,0,0,2.835,7.132,4.336,4.336,0,0,1,.856,6.586c0,.018,0,.036,0,.056a4.37,4.37,0,0,0,3.505,4.283A4.363,4.363,0,0,1,2.388,11a4.374,4.374,0,0,0,4.082,3.035A8.766,8.766,0,0,1,1.043,15.9,8.908,8.908,0,0,1,0,15.844a12.369,12.369,0,0,0,6.7,1.963"
                          transform="translate(0 -0.5)" fill="#1da1f2" />
                      </svg>
                    </div>
                    @if ($errors->has('twitter_url'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('twitter_url') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="youtube_url" class="form-label">{{ __('frontstaticword.YoutubeUrl') }}</label>
                    <div class="form-group-icon {{ $errors->has('youtube_url') ? ' is-invalid' : '' }}">
                      <input type="text" name="youtube_url" id="youtube_url" class="form-control"
                        placeholder="{{ __('frontstaticword.YoutubeUrl') }}" value="{{ $user->youtube_url }}">
                      <svg xmlns="http://www.w3.org/2000/svg" class="svg-resize-20 form-control-icon"
                        viewBox="0 0 23.198 16.242">
                        <g transform="translate(0 0)">
                          <path
                            d="M22.72,2.542A2.906,2.906,0,0,0,20.676.5C18.86,0,11.6,0,11.6,0S4.338,0,2.522.478A2.966,2.966,0,0,0,.478,2.542,30.626,30.626,0,0,0,0,8.121,30.513,30.513,0,0,0,.478,13.7a2.907,2.907,0,0,0,2.045,2.045c1.834.5,9.077.5,9.077.5s7.261,0,9.077-.478A2.906,2.906,0,0,0,22.72,13.72,30.627,30.627,0,0,0,23.2,8.14a29.069,29.069,0,0,0-.478-5.6Zm0,0"
                            transform="translate(0)" fill="red" />
                          <path d="M204.969,109.44l6.038-3.478-6.038-3.478Zm0,0" transform="translate(-195.682 -97.841)"
                            fill="#fff" />
                        </g>
                      </svg>
                    </div>
                    @if ($errors->has('youtube_url'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('youtube_url') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="linkedin_url" class="form-label">{{ __('frontstaticword.LinkedInUrl') }}</label>
                    <div class="form-group-icon {{ $errors->has('twitter_url') ? ' is-invalid' : '' }}">
                      <input type="text" name="linkedin_url" id="linkedin_url" class="form-control"
                        placeholder="{{ __('frontstaticword.LinkedInUrl') }}" value="{{ $user->linkedin_url }}">
                      <svg xmlns="http://www.w3.org/2000/svg" class="svg-resize-20 form-control-icon"
                        viewBox="0 0 20.626 19.715">
                        <g transform="translate(0 -0.5)">
                          <path d="M6.488,159.684H10.91v13.3H6.488Zm0,0" transform="translate(-6.227 -152.771)"
                            fill="#069" />
                          <path d="M2.5.5a2.3,2.3,0,1,0-.058,4.6h.029A2.305,2.305,0,1,0,2.5.5Zm0,0" fill="#069" />
                          <path
                            d="M185.379,151.934a4.389,4.389,0,0,0-3.985,2.2v-1.884h-4.422v13.3h4.421V158.12a3.031,3.031,0,0,1,.146-1.079,2.42,2.42,0,0,1,2.269-1.617c1.6,0,2.24,1.22,2.24,3.008v7.116h4.421v-7.627c0-4.086-2.181-5.987-5.09-5.987Zm0,0"
                            transform="translate(-169.844 -145.334)" fill="#069" />
                        </g>
                      </svg>
                    </div>
                    @if ($errors->has('linkedin_url'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('linkedin_url') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
              </div>
            </fieldset>
            {{-- Submit --}}
            <div class="row">
              <div class="col-sm-4 mx-auto">
                <button type="submit"
                  class="btn btn-accent w-100 mt-3">{{ __('frontstaticword.UpdateProfile') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
@endsection
