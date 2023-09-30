@extends('admin/layouts.master')
@section('title', __('adminstaticword.Add') . ' ' . __('adminstaticword.Course'))
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
    <div class="row">
        <!-- left column -->
        <div class="col-xs-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <div class="row">
                        <div class="col-xs-12">
                            <h3 class="box-title"> {{ __('adminstaticword.Add') }} {{ __('adminstaticword.Course') }}</h3>
                            <a href="{{url('course')}}" data-toggle="tooltip" data-original-title="Go back" class="btn-floating">
                                <i class="material-icons">
                                    <button class="btn btn-xs btn-success abc">{{ __('adminstaticword.Back') }}</button> 
                                </i> 
                            </a>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    <form action="{{url('course/')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-xs-12 col-md-4">
                                <div class="form-group">
                                    <label for="category_id">{{ __('adminstaticword.Category') }}:<span class="redstar">*</span></label>
                                    <select name="category_id" id="category_id"
                                        class="form-control js-example-basic-single">
                                        <option value="0">
                                            {{ __('adminstaticword.SelectanOption') }}
                                        </option>
                                        @foreach($category as $cate)
                                        <option value="{{$cate->id}}">{{$cate->title}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-4">
                                <div class="form-group">
                                    <label for="upload_id">{{ __('adminstaticword.SubCategory') }}:<span
                                            class="redstar">*</span></label>
                                    <select name="subcategory_id" id="upload_id"
                                        class="form-control js-example-basic-single">
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-4">
                                <div class="form-group">
                                    <label for="grand">{{ __('adminstaticword.ChildCategory') }}:</label>
                                    <select name="childcategory_id" id="grand"
                                        class="form-control js-example-basic-single"></select>
                                </div>
                            </div>
                            
                            <div class="col-xs-12 display-none">
                                <div class="form-group">
                                    <label for="user_id">{{ __('adminstaticword.User') }}</label>
                                    <select id="user_id" name="user_id"
                                        class="form-control js-example-basic-single col-md-7 col-xs-12">
                                        <option value="{{Auth::user()->id}}">
                                            {{Auth::user()->fname}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                    <label for="language_id">{{ __('adminstaticword.Language') }}: <span class="redstar">*</span></label>
                                    <select id="language_id" name="language_id" class="form-control js-example-basic-single">
                                        @php
                                        $languages = App\CourseLanguage::all();
                                        @endphp
                                        @foreach($languages as $caat)
                                        <option {{ $caat->language_id == $caat->id ? 'selected' : "" }}
                                            value="{{ $caat->id }}">{{ $caat->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                    @php
                                    $ref_policy = App\RefundPolicy::all();
                                    @endphp
                                    <label for="refund_policy_id">{{ __('adminstaticword.SelectRefundPolicy') }}</label>
                                    <select id="refund_policy_id" name="refund_policy_id"
                                        class="form-control js-example-basic-single col-md-7 col-xs-12">
                                        <option value="none" selected disabled hidden>
                                            {{ __('frontstaticword.SelectanOption') }}
                                        </option>
                                        @foreach($ref_policy as $ref)
                                        <option value="{{ $ref->id }}">{{ $ref->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>



                        <div class="row">
                            @if(Auth::User()->role == "admin")
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="level_tags">{{ __('adminstaticword.SelectTags') }}:</label>
                                        <select id="level_tags" class="form-control js-example-basic-single" name="level_tags">
                                            <option value="none" selected disabled hidden>
                                                {{ __('adminstaticword.SelectanOption') }}
                                            </option>
                                            <option value="trending">Trending</option>
                                            <option value="onsale">Onsale</option>
                                            <option value="bestseller">Bestseller</option>
                                            <option value="beginner">Beginner</option>
                                            <option value="intermediate">Intermediate</option>
                                            <option value="expert">Expert</option>
                                        </select>
                                    </div>
                                </div>
                            @endif
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="course_tags">{{ __('adminstaticword.CourseTags') }}: <span
                                            class="redstar">*</span></label>
                                    <select id="course_tags" class="form-control js-example-basic-single" name="course_tags[]"
                                        multiple="multiple" size="5" row="5" placeholder="">
                                        <option></option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                    <label for="title">{{ __('adminstaticword.Title') }}:
                                        <sup class="redstar">*</sup></label>
                                    <input type="title" class="form-control" name="title" id="title"
                                        placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.Title') }}"
                                        value="{{ (old('title')) }}" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                    <label for="slug">{{ __('adminstaticword.Slug') }}:
                                        <sup class="redstar">*</sup></label>
                                    <input pattern="[/^\S*$/]+" type="text" class="form-control" name="slug"
                                        id="slug"
                                        placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.Slug') }}"
                                        value="{{ (old('slug')) }}" required>
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                    <label for="short_detail">{{ __('adminstaticword.ShortDetail') }}:
                                        <sup class="redstar">*</sup></label>
                                    <textarea id="short_detail" name="short_detail" rows="3" class="form-control"
                                        placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.ShortDetail') }}"
                                        required>{{ (old('short_detail')) }}</textarea>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                    <label for="requirement">{{ __('adminstaticword.Requirements') }}:
                                        <sup class="redstar">*</sup></label>
                                    <textarea id="requirement" name="requirement" rows="3" class="form-control"
                                        placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.Requirements') }}"
                                        required>{{ (old('requirement')) }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="detail">{{ __('adminstaticword.Detail') }}:
                                        {{-- <sup class="redstar">*</sup> --}}
                                    </label>
                                    <textarea id="detail" name="detail" rows="3"
                                        class="form-control">{{ (old('detail')) }}</textarea>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-xs-12 col-md-6 display-none">
                                <div class="form-group">
                                    <label for="refund_enable">{{ __('adminstaticword.ReturnAvailable') }}</label>
                                    <select id="refund_enable" name="refund_enable"
                                        class="form-control js-example-basic-single col-md-7 col-xs-12">
                                        <option value="none" selected disabled hidden>
                                            {{ __('frontstaticword.SelectanOption') }}
                                        </option>
                                        <option value="1">Return Available</option>
                                        <option value="0">Return Not Available</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group display-none">
                                    <div class="form-group">
                                        <label>{{ __('adminstaticword.MoneyBack') }}:</label>
                                        <div class="toggler">
                                            <input hidden id="cb01" type="checkbox" />
                                            <label class="main-toggle" for="cb01">
                                                <span data-off="{{ __('adminstaticword.No') }}" data-on="{{ __('adminstaticword.Yes') }}"></span>
                                            </label>
                                        </div>
                                        <input type="hidden" name="free" value="0" id="cb10">
                                    </div>

                                    <div class="display-none" id="dooa">
                                        <div class="form-group">
                                            <label for="day">{{ __('adminstaticword.Days') }}:
                                                <sup class="redstar">*</sup></label>
                                            <input type="number" min="1" class="form-control" name="day"
                                                id="day"
                                                placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.Days') }}"
                                                value="">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-group">
                                        <label>{{ __('adminstaticword.Free') }}:</label>
                                        <div class="toggler">
                                            <input name="type" hidden id="cb111" type="checkbox" />
                                            <label class="main-toggle toggle-lg" for="cb111">
                                                <span data-off="{{ __('adminstaticword.Free') }}" data-on="{{ __('adminstaticword.Paid') }}"></span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="display-none" id="pricebox">
                                        <div class="form-group">
                                            <label for="priceMain">{{ __('adminstaticword.Price') }}:
                                                <sup class="redstar">*</sup></label>
                                            <input type="text" class="form-control" name="price" id="priceMain"
                                                placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.Price') }}"
                                                value="{{ (old('price')) }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="offerPrice">{{ __('adminstaticword.DiscountPrice') }}: </label>
                                            <input type="text" class="form-control" name="discount_price" id="offerPrice"
                                                placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.DiscountPrice') }}"
                                                value="{{ (old('discount_price')) }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-group">
                                        <label>{{ __('adminstaticword.PreviewVideo') }}:</label>
                                        <div class="toggler">
                                            <input name="preview_type" hidden id="preview" type="checkbox" />
                                            <label class="main-toggle toggle-lg" for="preview">
                                                <span data-off="{{ __('adminstaticword.URL') }}" data-on="{{ __('adminstaticword.UploadVideo') }}"></span>
                                            </label>
                                        </div>
                                        <input type="hidden" name="free" value="0" id="cx">
                                    </div>
    
    
                                    <div class="display-none" id="document1">
                                        <div class="form-group">
                                            <label for="video">{{ __('adminstaticword.UploadVideo') }}:</label>
                                            <div>
                                                <input type="file" name="video" id="video" class="inputfile inputfile-1" />
                                                <label for="image"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17"
                                                        viewBox="0 0 20 17">
                                                        <path
                                                            d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
                                                    </svg>
                                                    <span>{{ __('adminstaticword.Chooseafile') }}&hellip;</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="" id="document2">
                                        <div class="form-group">
                                            <label for="url">{{ __('adminstaticword.URL') }}: </label>
                                            <input type="text" name="url" id="url"
                                                placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.URL') }}"
                                                class="form-control" value="{{ (old('url')) }}">
                                        </div>
                                    </div>
                                </div>
    
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>{{ __('adminstaticword.Duration') }}: </label>
                                        <div class="toggler">
                                            <input hidden id="duration_type" type="checkbox"
                                                name="duration_type">
                                            <label class="main-toggle toggle-lg" for="duration_type">
                                                <span data-off="{{ __('adminstaticword.Days') }}" data-on="{{ __('adminstaticword.Month') }}"></span>
                                            </label>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="duration">{{ __('adminstaticword.CourseExpireDuration') }}</label>
                                        <input min="1" class="form-control" name="duration" type="number" id="duration"
                                            placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.CourseExpireDuration') }}"
                                            value="{{ (old('duration')) }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="image">{{ __('adminstaticword.PreviewImage') }}:</label>
                                    - <p class="inline info">{{ __('adminstaticword.Size') }}: 250x150</p>
                                    <div>
                                        <input type="file" name="preview_image" id="image" class="inputfile inputfile-1" />
                                        <label for="image"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17"
                                                viewBox="0 0 20 17">
                                                <path
                                                    d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
                                            </svg>
                                            <span>{{ __('adminstaticword.Chooseafile') }}&hellip;</span>
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    @if(Auth::User()->role == "admin")
                                    <label for="revenue">{{ __('adminstaticword.InstructorRevenue') }}:</label>
                                    <div class="input-group">
                                        <input min="1" max="100" class="form-control" name="instructor_revenue"
                                            type="number" id="revenue"
                                            placeholder="{{ __('adminstaticword.Enter') }} revenue percentage"
                                            class="{{ $errors->has('instructor_revenue') ? ' is-invalid' : '' }} form-control"
                                            value="{{ (old('instructor_revenue')) }}">
                                        <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                    @if(Auth::User()->role == "admin")
                                    <label>{{ __('adminstaticword.Featured') }}:</label>
                                    <div class="toggler">
                                        <input hidden id="cb1" type="checkbox" />
                                        <label class="main-toggle" for="cb1">
                                            <span data-off="{{ __('adminstaticword.OFF') }}" data-on="{{ __('adminstaticword.ON') }}"></span>
                                        </label>
                                    </div>
                                    <input type="hidden" name="featured" value="0" id="j">
                                    @endif
                                </div>

                                <div class="form-group">
                                    @if(Auth::User()->role == "admin")
                                    <label>{{ __('adminstaticword.Status') }}:</label>
                                    <div class="toggler">
                                        <input hidden id="cb3" type="checkbox" />
                                        <label class="main-toggle toggle-lg" for="cb3">
                                            <span data-off="{{ __('adminstaticword.Deactive') }}" data-on="{{ __('adminstaticword.Active') }}"></span>
                                        </label>
                                    </div>
                                    <input type="hidden" name="status" value="0" id="test">
                                    @endif
                                </div>
        
                                <div class="form-group">
                                    <label>{{ __('adminstaticword.InvolvementRequest') }}:</label>
                                    <div class="toggler">
                                        <input name="involvement_request" hidden id="involve" type="checkbox" />
                                        <label class="main-toggle" for="involve">
                                            <span data-off="{{ __('adminstaticword.OFF') }}" data-on="{{ __('adminstaticword.ON') }}"></span>
                                        </label>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label>{{ __('adminstaticword.Assignment') }}:</label>
                                    <div class="toggler">
                                        <input {{ old('assignment_enable') == "0" ? '' : "checked" }} hidden name="assignment_enable" id="frees" type="checkbox">
                                        <label class="main-toggle {{ old('assignment_enable') == "0" ? '' : "on" }}" for="frees">
                                            <span data-off="{{ __('adminstaticword.No') }}" data-on="{{ __('adminstaticword.Yes') }}"></span>
                                        </label>
                                    </div>
                                </div>
        
                                <div class="form-group">
                                    <label>{{ __('adminstaticword.Appointment') }}:</label>
                                    <div class="toggler">
                                        <input {{ old('appointment_enable') == "0" ? '' : "checked" }} hidden name="appointment_enable" id="frees1" type="checkbox">
                                        <label class="main-toggle {{ old('appointment_enable') == "0" ? '' : "on" }}" for="frees1">
                                            <span data-off="{{ __('adminstaticword.No') }}" data-on="{{ __('adminstaticword.Yes') }}"></span>
                                        </label>
                                    </div>
                                </div>
        
                                <div class="form-group">
                                    <label>{{ __('adminstaticword.CertificateEnable') }}:</label>
                                    <div class="toggler">
                                        <input {{ old('certificate_enable') == "0" ? '' : "checked" }} hidden name="certificate_enable" id="frees2" type="checkbox">
                                        <label class="main-toggle {{ old('certificate_enable') == "0" ? '' : "on" }}" for="frees2">
                                            <span data-off="{{ __('adminstaticword.No') }}" data-on="{{ __('adminstaticword.Yes') }}"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="box-footer">
                            <div class="row">
                                <div class="col-xs-9"></div>
                                <button type="submit" class="btn btn-md col-xs-3 btn-primary">{{ __('adminstaticword.Submit') }}</button>
                            </div>
                        </div>

                    </form>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.box -->
        </div>
    </div>
    <!-- /.row -->
</section>

@endsection

@section('scripts')




<script>
(function($) {
"use strict";

  $(function() {
      $('.js-example-basic-single').select2(
        {
          tags: true,
          tokenSeparators: [',', ' ']
        });
    });

  $(function() {
    $('#cb1').change(function() {
      $('#j').val(+ $(this).prop('checked'))
    })
  })

  $(function() {
    $('#cb3').change(function() {
      $('#test').val(+ $(this).prop('checked'))
    })
  })

  $('#cb111').on('change',function(){

    if($('#cb111').is(':checked')){
      $('#pricebox').show('fast');

      $('#priceMain').prop('required','required');

    }else{
      $('#pricebox').hide('fast');

      $('#priceMain').removeAttr('required');
    }

  });

  $('#preview').on('change',function(){

    if($('#preview').is(':checked')){
      $('#document1').show('fast');
      $('#document2').hide('fast');
    }else{
      $('#document2').show('fast');
      $('#document1').hide('fast');
    }

  });

  $("#cb3").on('change', function() {
    if ($(this).is(':checked')) {
      $(this).attr('value', '1');
    }
    else {
      $(this).attr('value', '0');
    }});

  $(function(){

      $('#ms').change(function(){
        if($('#ms').val()=='yes')
        {
            $('#doabox').show();
        }
        else
        {
            $('#doabox').hide();
        }
      });

  });

  $(function(){

      $('#ms').change(function(){
        if($('#ms').val()=='yes')
        {
            $('#doaboxx').show();
        }
        else
        {
            $('#doaboxx').hide();
        }
      });

  });

  $(function(){

      $('#msd').change(function(){
        if($('#msd').val()=='yes')
        {
            $('#doa').show();
        }
        else
        {
            $('#doa').hide();
        }
      });

  });

  $(function() {
    var urlLike = '{{ url('admin/dropdown') }}';
    $('#category_id').change(function() {
      var up = $('#upload_id').empty();
      var cat_id = $(this).val();    
      if(cat_id){
        $.ajax({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type:"GET",
          url: urlLike,
          data: {catId: cat_id},
          success:function(data){   
            console.log(data);
            up.append('<option value="0">Please Choose</option>');
            $.each(data, function(id, title) {
              up.append($('<option>', {value:id, text:title}));
            });
          },
          error: function(XMLHttpRequest, textStatus, errorThrown) {
            console.log(XMLHttpRequest);
          }
        });
      }
    });
  });

  $(function() {
    var urlLike = '{{ url('admin/gcat') }}';
    $('#upload_id').change(function() {
      var up = $('#grand').empty();
      var cat_id = $(this).val();    
      if(cat_id){
        $.ajax({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type:"GET",
          url: urlLike,
          data: {catId: cat_id},
          success:function(data){   
            console.log(data);
            up.append('<option value="0">Please Choose</option>');
            $.each(data, function(id, title) {
              up.append($('<option>', {value:id, text:title}));
            });
          },
          error: function(XMLHttpRequest, textStatus, errorThrown) {
            console.log(XMLHttpRequest);
          }
        });
      }
    });
  });
})(jQuery);
</script>
  
@endsection
