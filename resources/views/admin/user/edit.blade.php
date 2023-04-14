@extends('admin.layouts.master')
@section('title', __('adminstaticword.Edit') . ' ' . __('adminstaticword.User') . ' - ' . __('adminstaticword.Admin'))
@section('body')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<section class="content">
    @include('admin.message')
    <div class="row">
        <div class="col-xs-12">
            <form action="{{ route('user.update',$user->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="row">
                    <div class="col-xs-12 col-md-4">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">{{ __('adminstaticword.SocialProfile') }}</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    {{-- personal image --}}
                                    <div class="col-xs-12">
                                        <label for="user_img">{{ __('adminstaticword.Image') }}:</label>
                                        <p class="inline info">{{ __('adminstaticword.Recommendedsize') }}: 625x625</p>
                                        <div>
                                            <input type="file" name="user_img" id="user_img" class="inputfile inputfile-1" />
                                            <label for="user_img"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17"
                                                    viewBox="0 0 20 17">
                                                    <path
                                                        d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
                                                    </svg> <span>{{ __('adminstaticword.Chooseafile') }}&hellip;</span>
                                        </div>

                                        {{-- <input type="file" name="user_img" class="form-control"> --}}
                                    </div>
                                    <div class="col-xs-12">
                                        @if($user->user_img != null || $user->user_img !='')
                                        <div class="edit-user-img">
                                            <img src="{{ url('/images/user_img/'.$user->user_img) }}" class="img-fluid"
                                                alt="User Image" class="img-responsive">
                                        </div>
                                        @else
                                        <div class="edit-user-img">
                                            <img src="{{ asset('images/default/user.jpg')}}" class="img-fluid" alt="User Image"
                                                class="img-responsive">
                                        </div>
                                        @endif
                                    </div>
                                </div>

                                <br/>
                                
        
                                <div class="row">
                                    {{-- Verfied --}}
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label>{{ __('adminstaticword.Verified') }}:</label>
                                            <div class="toggler">
                                                <input hidden id="verified" type="checkbox" {{ $user->email_verified_at != NULL ? 'checked' : '' }}>
                                                <label class="main-toggle {{ $user->email_verified_at != NULL ? 'on' : '' }}" for="verified">
                                                    <span data-on="{{ __('adminstaticword.Yes') }}" data-off="{{ __('adminstaticword.No') }}"></span>
                                                </label>
                                            </div>
                                            <input type="hidden" name="verified" value="{{ $user->verified }}" id="verified">
                                        </div>
                                    </div>
                                    {{-- Status --}}
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label>{{ __('adminstaticword.Status') }}:</label>
                                            <div class="toggler">
                                                <input hidden id="status" type="checkbox" name="status" {{ $user->status == '1' ? 'checked' : '' }}>
                                                <label class="main-toggle toggle-lg {{ $user->status == '1' ? 'on' : '' }}" for="status">
                                                    <span data-on="{{ __('adminstaticword.Active') }}" data-off="{{ __('adminstaticword.Deactive') }}"></span>
                                                </label>
                                            </div>
                                            <input type="hidden" name="free" value="0" for="status" id="status">
                                        </div>
                                    </div>
                                </div>
                                
        
                                {{-- Update passord checkbox --}}
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="update-password">
                                            <label> {{ __('adminstaticword.UpdatePassword') }}:</label>
                                            <div class="toggler">
                                                <input name="update_pass" id="myCheck" type="checkbox" hidden onclick="myFunction()">
                                                <label for="myCheck" class="main-toggle">
                                                    <span data-on="{{ __('adminstaticword.Yes') }}" data-off="{{ __('adminstaticword.No') }}"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
        
                                <div class="row display-none" id="update-password">
                                    <div class="col-xs-12">
                                        <label for="password">{{ __('adminstaticword.Password') }}</label>
                                        <input id="password" type="password" name="password" class="form-control"
                                            placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.Password') }}">
                                    </div>
                                    <div class="col-xs-12">
                                        <label for="confirmpassword">{{ __('adminstaticword.ConfirmPassword') }}</label>
                                        <input id="confirmpassword" type="password" name="confirmpassword" class="form-control"
                                            placeholder="{{ __('adminstaticword.ConfirmPassword') }}">
                                    </div>
                                </div>
                                
                                <br/>
        
                                {{-- <div class="box-header with-border">
                                    <h3 class="box-title">{{ __('adminstaticword.SocialProfile') }}</h3>
                                </div> --}}
                                
                                {{-- Social links --}}
                                <div class="row">
                                    <div class="col-xs-12">
                                        <label class="item-flex" for="fb_url">
                                            <i class='bx bxl-facebook-square i-facebook me'></i>
                                            <span>{{ __('adminstaticword.FacebookUrl') }}:</span>
                                        </label>
                                        <input id="fb_url" autofocus name="fb_url" value="{{ $user->fb_url }}" type="text"
                                            class="form-control" placeholder="Facebook.com/" />
                                    </div>
                                    <div class="col-xs-12">
                                        <label class="item-flex" for="youtube_url">
                                            <i class='bx bxl-youtube i-youtube me' ></i>
                                            <span>{{ __('adminstaticword.YoutubeUrl') }}:</span>
                                        </label>
                                        <input id="youtube_url" autofocus name="youtube_url" value="{{ $user->youtube_url }}" type="text"
                                            class="form-control" placeholder="youtube.com/" />
                                        
                                    </div>
        
                                    <div class="col-xs-12">
                                        <label class="item-flex" for="twitter_url">
                                            <i class='bx bxl-twitter i-twitter me' ></i>
                                            <span>{{ __('adminstaticword.TwitterUrl') }}:</span>
                                        </label>
                                        <input id="twitter_url" autofocus name="twitter_url" value="{{ $user->twitter_url }}" type="text"
                                            class="form-control" placeholder="Twitter.com/" />
                                    </div>
                                    <div class="col-xs-12">
                                        <label class="item-flex" for="linkedin_url">
                                            <i class='bx bxl-linkedin-square i-linkedin me' ></i>
                                            <span>{{ __('adminstaticword.LinkedInUrl') }}:</span>
                                        </label>
                                        <input id="linkedin_url" autofocus name="linkedin_url" value="{{ $user->linkedin_url }}" type="text"
                                            class="form-control" placeholder="Linkedin.com/" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-8">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title"> {{ __('adminstaticword.Edit') }} {{ __('adminstaticword.Users') }}</h3>
                            </div>
                            
                            <div class="panel-body">
        
                                <div class="row">
                                    {{-- First name --}}
                                    <div class="col-xs-12 col-md-6">
                                        <label for="fname">
                                            {{ __('adminstaticword.FirstName') }}:
                                            <sup class="redstar">*</sup>
                                        </label>
                                        <input id="fname" value="{{ $user->fname }}" autofocus required name="fname" type="text"
                                            class="form-control"
                                            placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.FirstName') }}" />
                                    </div>
                                    {{-- Last name --}}
                                    <div class="col-xs-12 col-md-6">
                                        <label for="lname">
                                            {{ __('adminstaticword.LastName') }}:
                                            <sup class="redstar">*</sup>
                                        </label>
                                        <input id="lname" value="{{ $user->lname }}" required name="lname" type="text" class="form-control"
                                            placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.LastName') }}" />
                                    </div>
                                </div>
                                
                                <div class="row">
                                    {{-- Phone number --}}
                                    <div class="col-xs-12 col-md-6">
                                        <label for="mobile"> {{ __('adminstaticword.Mobile') }}:</label>
                                        <input id="mobile" value="{{ $user->mobile }}" type="text" name="mobile_number"
                                            placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.Mobile') }}"
                                            class="form-control">
                                    </div>
                                    {{-- Email address --}}
                                    <div class=" col-xs-12 col-md-6">
                                        <label for="email">{{ __('adminstaticword.Email') }}:<sup class="redstar">*</sup>
                                        </label>
                                        <input id="email" value="{{ $user->email }}" required type="email" name="email"
                                            placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.Email') }}"
                                            class="form-control">
                                    </div>
                                </div>
    
    
                                <div class="row">
                                    {{-- Address --}}
                                    <div class="col-xs-12 col-md-6">
                                        <label for="address">{{ __('adminstaticword.Address') }}: </label>
                                        <textarea id="address" name="address" class="form-control" rows="1"
                                            placeholder="{{ __('adminstaticword.Enter') }} adderss"
                                            value="">{{ $user->address }}</textarea>
                                    </div>
                                    {{-- Role --}}
                                    <div class="col-xs-12 col-md-6">
                                        <label for="role">{{ __('adminstaticword.SelectRole') }}:</label>
                                        @if(Auth::User()->role=="admin")
                                        <select id="role" class="form-control js-example-basic-single" name="role">
                                            <option {{ $user->role == 'user' ? 'selected' : ''}} value="user">
                                                {{ __('adminstaticword.User') }}</option>
                                            <option {{ $user->role == 'admin' ? 'selected' : ''}} value="admin">
                                                {{ __('adminstaticword.Admin') }}</option>
                                            <option {{ $user->role == 'instructor' ? 'selected' : ''}} value="instructor">
                                                {{ __('adminstaticword.Instructor') }}</option>
                                        </select>
                                        @endif
                                        @if(Auth::User()->role=="instructor")
                                        <select id="role" class="form-control js-example-basic-single" name="role">
                                            <option {{ $user->role == 'user' ? 'selected' : ''}} value="user">
                                                {{ __('adminstaticword.User') }}</option>
                                            <option {{ $user->role == 'instructor' ? 'selected' : ''}} value="instructor">
                                                {{ __('adminstaticword.Instructor') }}</option>
                                        </select>
                                        @endif
                                        @if(Auth::User()->role=="user")
                                        <select id="role" class="form-control js-example-basic-single" name="role">
                                            <option {{ $user->role == 'user' ? 'selected' : ''}} value="user">
                                                {{ __('adminstaticword.User') }}</option>
                                        </select>
                                        @endif
                                    </div>
                                </div>
                                
    
                                <div class="row">
                                    {{-- Country --}}
                                    <div class="col-xs-12 col-md-6">
                                        <label for="country_id">{{ __('adminstaticword.Country') }}:</label>
                                        <select id="country_id" class="form-control js-example-basic-single" name="country_id">
                                            <option value="none" selected disabled hidden>
                                                {{ __('adminstaticword.SelectanOption') }}
                                            </option>
    
                                            @foreach ($countries as $coun)
                                            <option value="{{ $coun->country_id }}"
                                                {{ $user->country_id == $coun->country_id ? 'selected' : ''}}>
                                                {{ $coun->nicename }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- State --}}
                                    <div class="col-xs-12 col-md-6">
                                        <label for="city_id">{{ __('adminstaticword.State') }}:</label>
                                        <select id="state_id" class="form-control js-example-basic-single" name="state_id">
                                            <option value="none" selected disabled hidden>
                                                {{ __('adminstaticword.SelectanOption') }}
                                            </option>
                                            @foreach ($states as $s)
                                            <option value="{{ $s->state_id}}"
                                                {{ $user->state_id==$s->state_id ? 'selected' : '' }}>{{ $s->name}}</option>
                                            @endforeach
    
                                        </select>
                                    </div>
                                    {{-- City --}}
                                    <div class="col-xs-12 col-md-6">
                                        <label for="city_id">{{ __('adminstaticword.City') }}:</label>
                                        <select id="city_id" class="form-control js-example-basic-single" name="city_id">
                                            <option value="none" selected disabled hidden>
                                                {{ __('adminstaticword.SelectanOption') }}
                                            </option>
                                            @foreach ($cities as $c)
                                            <option value="{{ $c->id }}" {{ $user->city_id == $c->id ? 'selected' : ''}}>
                                                {{ $c->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- Postal code --}}
                                    <div class="col-xs-12 col-md-6">
                                        <label for="pin_code">{{ __('adminstaticword.Pincode') }}:</label>
                                        <input id="pin_code" value="{{ $user->pin_code }}"
                                            placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.Pincode') }}"
                                            type="text" name="pin_code" class="form-control">
                                    </div>

                                    <div class="col-xs-12 col-md-6">
                                        <label for="nationality">{{ __('frontstaticword.Nationality') }}:</label>
                                        <select id="nationality" class="form-control {{ $errors->has('nationality') ? ' is-invalid' : '' }}" name="nationality" style="height: 3.5em">
                                            @if($user->nationality==null)
                                            <option value="none" selected disabled hidden> 
                                                {{ __('frontstaticword.Nationality') }}
                                            </option>
                                            @endif
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
                                        @if($errors->has('nationality'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('nationality') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="col-xs-12 col-md-6">
                                        <label for="academic_qualification">{{ __('frontstaticword.nationalID') }}:</label>
                                        <input type="text" class="form-control{{ $errors->has('national_id') ? ' is-invalid' : '' }}" name="national_id" value="{{ $user->national_id!=null ? $user->national_id : old('national_id') }}" id="national_id" placeholder="{{ __('frontstaticword.nationalID') }}">
                                        @if($errors->has('national_id'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('national_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="col-xs-12 col-md-12">
                                        <label for="academic_qualification">{{ __('frontstaticword.AcademicQualification') }}:</label>
                                        <select id="academic_qualification" class="form-control {{ $errors->has('academic_qualification') ? ' is-invalid' : '' }}" name="academic_qualification" style="height: 3.5em">
                                            @if($user->academic_qualification==null)
                                            <option value="none" selected disabled hidden> 
                                                {{ __('frontstaticword.AcademicQualification') }}
                                            </option>
                                            @endif
                                            
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
                                        @if($errors->has('academic_qualification'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('academic_qualification') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                
                                
    
                                <div class="row">
                                    {{-- Details --}}
                                    <div class="col-xs-12">
                                        <label for="detail">{{ __('adminstaticword.Detail') }}:<sup
                                                class="redstar">*</sup></label>
                                        <textarea id="detail" name="detail" class="form-control" rows="5"
                                            placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.Detail') }}"
                                            value="">{{ $user->detail }}</textarea>
                                    </div>
                                </div>
                                
                                
    
                                <div class="box-footer" style="padding: 10px 0">
                                    <button type="submit" class="btn btn-md btn-primary">
                                        <i class="fa fa-save"></i> {{ __('adminstaticword.Save') }}
                                    </button>
                                    <a href="{{ route('user.index') }}" title="Cancel and go back"
                                        class="btn btn-md btn-default btn-flat">
                                        <i class="fa fa-reply"></i> {{ __('adminstaticword.Back') }}
                                    </a>
                                </div>
                            
                            </div>
                            <!-- /.panel body -->
                        </div>
                        <!-- /.box -->
                    </div>
                </div>

            </form>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>

@endsection

@section('scripts')

<script>
    (function ($) {
        "use strict";

        $(function () {
            $("#dob,#doa").datepicker({
                changeYear: true,
                yearRange: "-100:+0",
                dateFormat: 'yy/mm/dd',
            });
        });


        $('#married_status').change(function () {

            if ($(this).val() == 'Married') {
                $('#doaboxxx').show();
            } else {
                $('#doaboxxx').hide();
            }
        });

        $(function () {
            var urlLike = '{{ url('
            country / dropdown ') }}';
            $('#country_id').change(function () {
                var up = $('#upload_id').empty();
                var cat_id = $(this).val();
                if (cat_id) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "GET",
                        url: urlLike,
                        data: {
                            catId: cat_id
                        },
                        success: function (data) {
                            console.log(data);
                            up.append('<option value="0">Please Choose</option>');
                            $.each(data, function (id, title) {
                                up.append($('<option>', {
                                    value: id,
                                    text: title
                                }));
                            });
                        },
                        error: function (XMLHttpRequest, textStatus, errorThrown) {
                            console.log(XMLHttpRequest);
                        }
                    });
                }
            });
        });

        $(function () {
            var urlLike = '{{ url('
            country / gcity ') }}';
            $('#upload_id').change(function () {
                var up = $('#grand').empty();
                var cat_id = $(this).val();
                if (cat_id) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "GET",
                        url: urlLike,
                        data: {
                            catId: cat_id
                        },
                        success: function (data) {
                            console.log(data);
                            up.append('<option value="0">Please Choose</option>');
                            $.each(data, function (id, title) {
                                up.append($('<option>', {
                                    value: id,
                                    text: title
                                }));
                            });
                        },
                        error: function (XMLHttpRequest, textStatus, errorThrown) {
                            console.log(XMLHttpRequest);
                        }
                    });
                }
            });
        });

    })(jQuery);
</script>

<script>
    function myFunction() {
        var checkBox = document.getElementById("myCheck");
        var text = document.getElementById("update-password");
        if (checkBox.checked == true) {
            text.style.display = "block";
        } else {
            text.style.display = "none";
        }
    }
</script>

@endsection