@section('title', 'Sign Up')
@include('theme.head')
@include('admin.message')

<link
     rel="stylesheet"
     href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
   />

<style>
    .iti{
        width: 100%;
        direction: ltr;
    }
</style>

<!-- end head -->
<!-- body start-->
<body>
<section id="nav-bar" class="nav-bar-main-block nav-bar-main-block-one">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="nav-bar-btn btm-20">
                    <a href="{{ url('/') }}" class="btn btn-secondary" title="Home"><i class="fa fa-chevron-left"></i>{{ __('frontstaticword.Backtohome') }}</a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="logo text-center btm-10">
                    @php
                        $logo = App\Setting::first();
                    @endphp

                    @if($logo->logo_type == 'L')
                        <a href="{{ url('/') }}" title="logo"><img src="{{ asset('images/logo/'.$logo->logo) }}" class="img-fluid" alt="logo"></a>
                    @else()
                        <a href="{{ url('/') }}"><b><div class="logotext">{{ $logo->project_title }}</div></b></a>
                    @endif
                </div>
            </div>
            <div class="col-lg-4">
                <div class="Login-btn txt-rgt">
                    <a href="{{ route('login') }}" class="btn btn-secondary" title="login">{{ __('frontstaticword.Login') }}</a>
                </div> 
            </div>
        </div>
    </div>
</section>
<section id="signup" class="signup-block-main-block">
    <div class="container">
        <div class="col-lg-6 col-md-8 mx-auto">
            <div class="signup-heading">
               {{ __('frontstaticword.StartLearning') }}!
            </div>

            <div class="signup-block">
                @if($gsetting->fb_login_enable == 1)
                    <div class="signin-link">
                        <a href="{{ url('/auth/facebook') }}" target="_blank" title="facebook" class="btn btn-info btm-10" title="Facebook"><i class="fa fa-facebook"></i>{{ __('frontstaticword.ContinuewithFacebook') }}</a>
                    </div>
                @endif
                
                @if($gsetting->google_login_enable == 1)
                    <div class="signin-link google">
                        <a href="{{ url('/auth/google') }}" target="_blank" title="google" class="btn btn-white btm-10" title="google"><i class="fab fa-google-plus-g"></i>{{ __('frontstaticword.ContinuewithGoogle') }}</a>
                    </div>
                @endif
                
                @if($gsetting->amazon_enable == 1)
                    <div class="signin-link amazon-button">
                        <a href="{{ url('/auth/amazon') }}" target="_blank" title="amazon" class="btn btn-info btm-10" title="Amazon"><i class="fab fa-amazon"></i>{{ __('frontstaticword.ContinuewithAmazon') }}</a>
                    </div>
                @endif

                @if($gsetting->linkedin_enable == 1)
                    <div class="signin-link linkedin-button">
                        <a href="{{ url('/auth/linkedin') }}" target="_blank" title="linkedin" class="btn btn-info btm-10" title="Linkedin"><i class="fab fa-linkedin"></i>{{ __('frontstaticword.ContinuewithLinkedin') }}</a>
                    </div>
                @endif

                @if($gsetting->twitter_enable == 1)
                    <div class="signin-link twitter-button">
                        <a href="{{ url('/auth/twitter') }}" target="_blank" title="twitter" class="btn btn-info btm-10" title="Twitter"><i class="fab fa-twitter"></i>{{ __('frontstaticword.ContinuewithTwitter') }}</a>
                    </div>
                @endif

                @if($gsetting->gitlab_login_enable == 1)
                    <div class="signin-link btm-10">
                        <a href="{{ url('/auth/gitlab') }}" target="_blank" title="gitlab" class="btn btn-white" title="gitlab"><i class="fab fa-gitlab"></i>{{ __('frontstaticword.ContinuewithGitLab') }}</a>
                    </div>
                @endif

                
                
                <form class="signup-form" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <input type="text" class="form-control{{ $errors->has('fname') ? ' is-invalid' : '' }}" name="fname" value="{{ old('fname') }}" id="fname" placeholder="{{ __('frontstaticword.FirstName') }}">
                        @if ($errors->has('fname'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('fname') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <input type="text" class="form-control{{ $errors->has('lname') ? ' is-invalid' : '' }}" name="lname" value="{{ old('lname') }}" id="lname" placeholder="{{ __('frontstaticword.LastName') }}">
                        @if($errors->has('lname'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('lname') }}</strong>
                            </span>
                        @endif
                    </div>
                    
                    <div class="form-group">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" id="email" placeholder="{{ __('frontstaticword.Email') }}">
                        @if($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    @if($gsetting->mobile_enable == 1)
                    <div class="form-group">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <input type="text" class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="phone" value="{{ old('mobile') }}" id="phone">
                        <input type="hidden" class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile" id="mobile" />
                        @if($errors->has('mobile'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('mobile') }}</strong>
                            </span>
                        @endif
                    </div>
                    @endif

                    <div class="form-group">
                        <i class="fa fa-line-chart" aria-hidden="true"></i>
                        <select id="age_group" class="form-control {{ $errors->has('age_group') ? ' is-invalid' : '' }}" name="age_group" style="height: 3.5em">
                            <option value="none" selected disabled hidden> 
                                {{ __('frontstaticword.AgeGroup') }}
                            </option>
                            
                            <option value="21-30"> 21 - 30 </option>
                            <option value="31-40"> 31 - 40 </option>
                            <option value="41-50"> 41 - 50 </option>
                            <option value="51-60"> 51 - 60 </option>
                            <option value="61"> {{ __('frontstaticword.MoreThan') }} 60 </option>
                        </select>
                        @if($errors->has('age_group'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('age_group') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                        <select id="academic_qualification" class="form-control {{ $errors->has('academic_qualification') ? ' is-invalid' : '' }}" name="academic_qualification" style="height: 3.5em">
                            <option value="none" selected disabled hidden> 
                                {{ __('frontstaticword.AcademicQualification') }}
                            </option>
                            
                            <option value="0"> {{ __('frontstaticword.BA') }} </option>
                            <option value="1"> {{ __('frontstaticword.Master') }} </option>
                            <option value="2"> {{ __('frontstaticword.PhD') }} </option>
                        </select>
                        @if($errors->has('academic_qualification'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('academic_qualification') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <i class="fa fa-globe" aria-hidden="true"></i>
                        <select id="country_id" class="form-control {{ $errors->has('country_id') ? ' is-invalid' : '' }}" name="country_id" style="height: 3.5em">
                            <option value="none" selected disabled hidden> 
                                {{ __('frontstaticword.ResidenceCountry') }}
                            </option>
                            
                            @foreach (\App\Country::all() as $country)
                            <option value="{{ $country->country_id }}">
                                {{ $country->nicename }}
                            </option>
                            @endforeach
                        </select>
                        @if($errors->has('country_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('country_id') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <i class="fa fa-briefcase" aria-hidden="true"></i>
                        <input type="text" class="form-control{{ $errors->has('employer') ? ' is-invalid' : '' }}" name="employer" value="{{ old('employer') }}" id="employer" placeholder="{{ __('frontstaticword.Employer') }}">
                        @if($errors->has('employer'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('employer') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                        <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="password" placeholder="{{ __('frontstaticword.Password') }}">
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <i class="fa fa-lock" aria-hidden="true"></i> 
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="{{ __('frontstaticword.ConfirmPassword') }}" required>
                    </div>



                    
                    @if($gsetting->captcha_enable == 1)


                    <div class="{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">

                        <div class="text-center">

                            {!! app('captcha')->display() !!}
                            @if ($errors->has('g-recaptcha-response'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                </span>
                            @endif
                        </div>
                    <br>
                    <br>
                    @endif
                    
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="term" id="term" required>

                            <label class="form-check-label" for="term">
                                <div class="signin-link text-center btm-20">
                                    <b>{{ __('frontstaticword.IAgreeTo') }}<a href="{{url('terms_condition')}}" title="Policy">{{ __('frontstaticword.Terms&Condition') }} </a>, <a href="{{url('privacy_policy')}}" title="Policy">{{ __('frontstaticword.PrivacyPolicy') }}.</a></b>
                                </div>
                            </label>

                           
                        </div>
                    </div>
                    

                    
                    <button type="submit" title="Sign Up" class="btn btn-primary btm-20">{{ __('frontstaticword.Signup') }}</button> 

                   
                    <hr>
                    <div class="sign-up text-center">{{ __('frontstaticword.Alreadyhaveanaccount') }}?<a href="{{ route('login') }}" title="sign-up"> {{ __('frontstaticword.Login') }}</a>
                    </div>
                </form>




            </div>
        </div>
    </div>
</section>


@include('theme.scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script>
   const phoneInputField = document.querySelector("#phone");
   const phoneInput = window.intlTelInput(phoneInputField, {
        onlyCountries: getCountries(),
        separateDialCode: true,
        initialCountry: "sa",
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
   });

   function getCountries() {
        var countries = [];

        @foreach(App\Country::all() as $country)
            countries.push("{{trim($country->iso)}}");
        @endforeach

        return countries;
    }

   $("form").submit(function() {
        var full_number = phoneInput.getNumber();
        $("input[name='mobile'").val(full_number);
    });
 </script>
<!-- end jquery -->
</body>
<!-- body end -->
</html> 
