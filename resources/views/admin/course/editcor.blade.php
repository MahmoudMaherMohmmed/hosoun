<section class="content">
    {{-- @include('admin.message') --}}
    <div class="row">
        <!-- left column -->
        <div class="col-xs-12">
            <!-- general form elements -->
            <div class="box-header with-border">
                <h3 class="box-title"> {{ __('adminstaticword.Edit') }} {{ __('adminstaticword.Course') }}</h3>
            </div>
            <br>
            <!-- /.box-header -->
            <div class="box-body">
                <form action="{{route('course.update',$cor->id)}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    <div class="row">
                        <div class="col-xs-12 col-md-4">
                            <div class="form-group">
                                <label for="category_id">{{ __('adminstaticword.Category') }}<span class="redstar">*</span></label>
                                <select name="category_id" id="category_id" class="form-control js-example-basic-single"
                                    required>
                                    <option value="0">{{ __('adminstaticword.SelectanOption') }}</option>
                                    @php
                                    $category = App\Categories::all();
                                    @endphp
    
                                    @foreach($category as $caat)
                                    <option {{ $cor->category_id == $caat->id ? 'selected' : "" }}
                                        value="{{ $caat->id }}">{{ $caat->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <div class="form-group">
                                <label for="upload_id">{{ __('adminstaticword.SubCategory') }}:<span class="redstar">*</span></label>
                                <select name="subcategory_id" id="upload_id"
                                    class="form-control js-example-basic-single">
                                    @php
                                    $subcategory =App\SubCategory::where('category_id', $cor->category_id)->get();
                                    @endphp
                                    <option value="none" selected disabled hidden>
                                        {{ __('frontstaticword.SelectanOption') }}
                                    </option>
                                    @if(!empty($subcategory))
                                    @foreach($subcategory as $caat)
                                    <option {{ $cor->subcategory_id == $caat->id ? 'selected' : "" }}
                                        value="{{ $caat->id }}">{{ $caat->title }}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <div class="form-group">
                                <label for="grand">{{ __('adminstaticword.ChildCategory') }}:</label>
                                <select name="childcategory_id" id="grand" class="form-control js-example-basic-single">
                                    @php
                                    $childcategory = App\ChildCategory::where('subcategory_id',
                                    $cor->subcategory_id)->get();
                                    @endphp
                                    <option value="none" selected disabled hidden>
                                        {{ __('frontstaticword.SelectanOption') }}
                                    </option>
                                    @if(!empty($childcategory))
                                    @foreach($childcategory as $caat)
                                    <option {{ $cor->childcategory_id == $caat->id ? 'selected' : "" }}
                                        value="{{ $caat->id }}">{{ $caat->title }}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 display-none">
                            <div class="form-group">
                                @php
                                $User = App\User::all();
                                @endphp
                                <label for="user">{{ __('adminstaticword.SelectUser') }}</label>
                                <select id="user" name="user" class="form-control js-example-basic-single col-md-7 col-xs-12">
                                    <option value="{{ Auth::user()->id }}">{{ Auth::user()->fname }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                                @php
                                $languages = App\CourseLanguage::all();
                                @endphp
                                <label for="language_id">{{ __('adminstaticword.SelectLanguage') }}</label>
                                <select id="language_id" name="language_id"
                                    class="form-control js-example-basic-single col-md-7 col-xs-12">
                                    <option value="none" selected disabled hidden>
                                        {{ __('adminstaticword.SelectanOption') }}
                                    </option>
                                    @foreach($languages as $cat)
                                    <option {{ $cor->language_id == $cat->id ? 'selected' : "" }}
                                        value="{{ $cat->id }}">{{ $cat->name }}</option>
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
                                    <option {{ $cor->refund_policy_id == $ref->id ? 'selected' : "" }}
                                        value="{{ $ref->id }}">{{ $ref->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>


                    @if(Auth::User()->role == "admin")
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="level_tags">{{ __('adminstaticword.SelectTags') }}</label>
                                <select id="level_tags" class="form-control js-example-basic-single" name="level_tags">
                                    <option value="none" selected disabled hidden>
                                        {{ __('adminstaticword.SelectanOption') }}
                                    </option>
                                    <option {{ $cor->tags == 'trending' ? 'selected' : ''}} value="trending">Trending</option>
                                    <option {{ $cor->tags == 'onsale' ? 'selected' : ''}} value="onsale">Onsale</option>
                                    <option {{ $cor->tags == 'bestseller' ? 'selected' : ''}} value="bestseller">Bestseller</option>
                                    <option {{ $cor->tags == 'beginner' ? 'selected' : ''}} value="beginner">Beginner</option>
                                    <option {{ $cor->tags == 'intermediate' ? 'selected' : ''}} value="intermediate">Intermediate</option>
                                    <option {{ $cor->tags == 'expert' ? 'selected' : ''}} value="expert">Expert</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="course_tags">{{ __('adminstaticword.CourseTags') }}</label>
                                <select id="course_tags" class="form-control js-example-basic-single" name="course_tags[]"
                                    multiple="multiple" size="5">
                                    @if(is_array($cor['course_tags']) || is_object($cor['course_tags']))
                                    @foreach($cor['course_tags'] as $cat)
                                    <option value="{{ $cat }}"
                                        {{in_array($cat, $cor['course_tags'] ?: []) ? "selected": ""}}>{{ $cat }}
                                    </option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                                <label for="title">{{ __('adminstaticword.Title') }}:<sup
                                        class="redstar">*</sup></label>
                                <input type="text" class="form-control" name="title" id="title"
                                    value="{{ $cor->title }}">
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                                <label for="slug">{{ __('adminstaticword.Slug') }}: <sup
                                        class="redstar">*</sup></label>
                                <input pattern="[/^\S*$/]+" type="text" class="form-control" name="slug"
                                    id="slug" value="{{ $cor->slug}}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                                <label for="short_detail">{{ __('adminstaticword.ShortDetail') }}:<sup
                                        class="redstar">*</sup></label>
                                <textarea id="short_detail" name="short_detail" rows="3"
                                    class="form-control">{!! $cor->short_detail !!}</textarea>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group">
                                <label for="requirement">{{ __('adminstaticword.Requirements') }}:<sup
                                        class="redstar">*</sup></label>
                                <textarea id="requirement" name="requirement" rows="3" class="form-control"
                                    required>{!! $cor->requirement !!}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="detail">{{ __('adminstaticword.Detail') }}:<sup
                                        class="redstar">*</sup></label>
                                <textarea id="detail" name="detail" rows="3"
                                    class="form-control">{!! $cor->detail !!}</textarea>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group display-none">
                                <div class="form-group">
                                    <label>{{ __('adminstaticword.MoneyBack') }}:</label>
                                    <div class="toggler">
                                        <input hidden id="rox" type="checkbox" @if($cor->day !="" && $cor->day !="") checked @endif/>
                                        <label class="main-toggle @if($cor->day !="" && $cor->day !="") on @endif" for="rox">
                                            <span data-off="{{ __('adminstaticword.No') }}" data-on="{{ __('adminstaticword.Yes') }}"></span>
                                        </label>
                                    </div>
                                    <input type="hidden" name="money" value="0" id="roxx">
                                </div>
    
                                <div @if($cor->day =="" && $cor->day =="") class="display-none" @endif id="jeet">
                                    <div class="form-group">
                                        <label for="day">{{ __('adminstaticword.Days') }}:<sup
                                                class="redstar">*</sup></label>
                                        <input type="number" min="1" class="form-control" name="day"
                                            id="day" placeholder="{{ __('adminstaticword.Enter') }} day"
                                            value="{{ $cor->day }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label>{{ __('adminstaticword.Free') }}:</label>
                                    <div class="toggler">
                                        <input hidden id="cb111" name="type" type="checkbox" {{ $cor->type == '1' ? 'checked' : '' }} />
                                        <label class="main-toggle toggle-lg {{ $cor->type == '1' ? 'on' : '' }}" for="cb111">
                                            <span data-off="{{ __('adminstaticword.Free') }}" data-on="{{ __('adminstaticword.Paid') }}"></span>
                                        </label>
                                    </div>
                                    <input type="hidden" name="free" value="0" id="j111">
                                </div>
    
                                <div @if($cor->type == '0') class="display-none" @endif id="doabox">
                                    <div class="form-group">
                                        <label for="price">{{ __('adminstaticword.Price') }}: <sup
                                                class="redstar">*</sup></label>
                                        <input type="number" step="0.01" class="form-control" name="price"
                                            id="price"
                                            placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.Price') }}"
                                            value="{{ $cor->price }}">
                                    </div>
                                </div>
    
                                <div @if($cor->type == '0') class="display-none" @endif id="doaboxx">
                                    <div class="form-group">
                                        <label for="discount_price">{{ __('adminstaticword.DiscountPrice') }}: <sup
                                                class="redstar">*</sup></label>
                                        <input type="number" step="0.01" class="form-control" name="discount_price"
                                            id="discount_price"
                                            placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.DiscountPrice') }}"
                                            value="{{ $cor->discount_price }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label>{{ __('adminstaticword.PreviewVideo') }}:</label>
                                    <div class="toggler">
                                        <input name="preview_type" hidden id="preview" type="checkbox" {{ $cor->preview_type=="video" ? 'checked' : '' }}>
                                        <label class="main-toggle toggle-lg {{ $cor->preview_type=="video" ? 'on' : '' }}" for="preview">
                                            <span  data-off="{{ __('adminstaticword.URL') }}" data-on="{{ __('adminstaticword.UploadVideo') }}"></span>
                                        </label>
                                    </div>
                                    <input type="hidden" name="free" value="0" id="to">
                                </div>
    
                                <div @if($cor->preview_type =="url" ) class="display-none" @endif id="document1">
                                    <div class="form-group">
                                        <label for="video">{{ __('adminstaticword.UploadVideo') }}: <sup
                                                class="redstar">*</sup></label>
                                        <div>
                                            <input type="file" name="video" id="video" value="{{ $cor->video }}" class="inputfile inputfile-1">
                                            <label for="image"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="7"
                                                    viewBox="0 0 20 17">
                                                    <path
                                                        d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
                                                    </svg> <span>{{ __('adminstaticword.Chooseafile') }}&hellip;</span>
                                            </label>
                                        </div>
                                        @if($cor->video !="")
                                        <video src="{{ asset('video/preview/'.$cor->video) }}" width="200" height="150"
                                            controls>
                                        </video>
                                        @endif
                                    </div>
                                </div>
    
                                <div @if($cor->preview_type =="video") class="display-none" @endif id="document2">
                                    <div class="form-group">
                                        <label for="url">{{ __('adminstaticword.URL') }}: <sup
                                                class="redstar">*</sup></label>
                                        <input class="form-control" placeholder="{{ __('adminstaticword.Enter') }} URL"
                                            name="url" id="url" value="{{ $cor->url }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label>{{ __('adminstaticword.Duration') }}: </label>
                                    <div class="toggler">
                                        <input hidden id="duration_type" type="checkbox"
                                            name="duration_type" {{ $cor->duration_type == "m" ? 'checked' : '' }}>
                                        <label class="main-toggle toggle-lg {{ $cor->duration_type == "m" ? 'on' : '' }}" for="duration_type">
                                            <span data-off="{{ __('adminstaticword.Days') }}" data-on="{{ __('adminstaticword.Month') }}"></span>
                                        </label>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="duration">{{ __('adminstaticword.CourseExpireDuration') }}</label>
                                    <input min="1" class="form-control" name="duration" type="number" id="duration"
                                        value="{{ $cor->duration }}"
                                        placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.Duration') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="image">{{ __('adminstaticword.PreviewImage') }}:</label>
                                <div>
                                    <input type="file" name="image" id="image" class="inputfile inputfile-1" />
                                    <label for="image"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="7"
                                            viewBox="0 0 20 17">
                                            <path
                                                d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
                                            </svg> <span>{{ __('adminstaticword.Chooseafile') }}&hellip;</span>
                                    </label>
                                </div>
                                <div>
                                    @if($cor['preview_image'] !== NULL && $cor['preview_image'] !== '')
                                    <img src="{{ url('/images/course/'.$cor->preview_image) }}" height="70px;"
                                        width="70px;" />
                                    @else
                                    <img src="{{ Avatar::create($cor->title)->toBase64() }}" alt="course" class="img-fluid">
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                @if(Auth::User()->role == "admin")
                                <label for="revenue">{{ __('adminstaticword.InstructorRevenue') }}:</label>
                                <div class="input-group">
                                    <input min="1" max="100" class="form-control" name="instructor_revenue"
                                        type="number" value="{{ $cor['instructor_revenue'] }}" id="revenue"
                                        placeholder="Enter revenue percentage"
                                        class="{{ $errors->has('instructor_revenue') ? ' is-invalid' : '' }} form-control">
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
                                    <input hidden id="cb1" type="checkbox" {{ $cor->featured==1 ? 'checked' : '' }}>
                                    <label class="main-toggle {{ $cor->featured==1 ? 'on' : '' }}" for="cb1">
                                        <span data-off="{{ __('adminstaticword.No') }}" data-on="{{ __('adminstaticword.Yes') }}"></span>
                                    </label>
                                </div>
                                <input type="hidden" name="featured" value="{{ $cor->featured }}" id="f">
                                @endif
                            </div>
                            <div class="form-group">
                                @if(Auth::User()->role == "admin")
                                <label>{{ __('adminstaticword.Status') }}:</label>
                                <div class="toggler">
                                    <input hidden id="cb333" type="checkbox" {{ $cor->status==1 ? 'checked' : '' }}>
                                    <label class="main-toggle toggle-lg {{ $cor->status==1 ? 'on' : '' }}" for="cb333">
                                        <span data-off="{{ __('adminstaticword.Deactive') }}" data-on="{{ __('adminstaticword.Active') }}"></span>
                                    </label>
                                </div>
                                <input type="hidden" name="status" value="{{ $cor->status }}" id="c33">
                                @endif
                            </div>
                            <div class="form-group">
                                <label>{{ __('adminstaticword.InvolvementRequest') }}:</label>
                                <div class="toggler">
                                    <input name="involvement_request" hidden id="involve" type="checkbox" {{ $cor->involvement_request==1 ? 'checked' : '' }} />
                                    <label class="main-toggle {{ $cor->involvement_request==1 ? 'on' : '' }}" for="involve">
                                        <span data-off="{{ __('adminstaticword.OFF') }}" data-on="{{ __('adminstaticword.ON') }}"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>{{ __('adminstaticword.Assignment') }}:</label>
                                <div class="toggler">
                                    <input hidden name="assignment_enable" id="frees" type="checkbox" {{ $cor['assignment_enable']=="1" ? 'checked' : '' }}>
                                    <label class="main-toggle {{ $cor['assignment_enable']=="1" ? 'on' : '' }}" for="frees">
                                        <span data-off="{{ __('adminstaticword.No') }}" data-on="{{ __('adminstaticword.Yes') }}"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>{{ __('adminstaticword.Appointment') }}:</label>
                                <div class="toggler">
                                    <input hidden name="appointment_enable" id="frees1" type="checkbox" {{ $cor['appointment_enable']=="1" ? 'checked' : '' }}>
                                    <label class="main-toggle {{ $cor['appointment_enable']=="1" ? 'on' : '' }}" for="frees1">
                                        <span data-off="{{ __('adminstaticword.No') }}" data-on="{{ __('adminstaticword.Yes') }}"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>{{ __('adminstaticword.CertificateEnable') }}:</label>
                                <div class="toggler">
                                    <input hidden name="certificate_enable" id="frees2" type="checkbox" {{ $cor['certificate_enable']=="1" ? 'checked' : '' }}>
                                    <label class="main-toggle {{ $cor['certificate_enable']=="1" ? 'on' : '' }}" for="frees2">
                                        <span data-off="{{ __('adminstaticword.No') }}" data-on="{{ __('adminstaticword.Yes') }}"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="box-footer">
                        <div class="row">
                            <div class="col-xs-9"></div>
                            <button type="submit" class="btn btn-md col-xs-3 btn-primary">{{ __('adminstaticword.Save') }}</button>
                        </div>
                    </div>

                </form>
            </div>
            <!-- /.box -->
        </div>
        <!--/.col (right) -->
    </div>
    <!-- /.row -->
</section>
  
  
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
        $('#f').val(+ $(this).prop('checked'))
      })
    })
  
    $(function() {
      $('#cb3').change(function() {
        $('#test').val(+ $(this).prop('checked'))
      })
    })
  
    $(function(){
  
        $('#murl').change(function(){
          if($('#murl').val()=='yes')
          {
              $('#doab').show();
          }
          else
          {
              $('#doab').hide();
          }
        });
  
    });
  
    $(function(){
  
        $('#murll').change(function(){
          if($('#murll').val()=='yes')
          {
              $('#doabb').show();
          }
          else
          {
              $('#doab').hide();
          }
        });
  
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
  