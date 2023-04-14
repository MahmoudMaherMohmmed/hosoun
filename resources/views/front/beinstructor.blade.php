@extends('front.layouts.master')
@section('css')
@endsection
@section('title')
  {{ __('frontstaticword.BecomeAnInstructor') }}
@endsection

@section('content')
  @include('front.layouts.page_header', ['title' => __('frontstaticword.BecomeAnInstructor')])
  <section class="block-sec">
    <div class="container">
      <div class="row">
        <div class="col-sm-10 col-lg-8 col-xl-6 mx-auto">
          <section class="main-block">
            @include('admin.message')

            @if(Auth::check())
              @php $instructor_request = App\Instructor::where('user_id', Auth::user()->id)->first(); @endphp
              @if( $instructor_request != NULL)
                <div class="alert alert-danger" role="alert"> {{ __('frontstaticword.AlreadyRequest') }} </div>

                <form method="post" action="{{url('requestinstructor/'. $instructor_request->id)}}" data-parsley-validate
                    class="form-horizontal form-label-left">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <div class="cancel-button" style="text-align:center">
                        <button type="submit" class="btn btn-accent w-100 mt-5">{{ __('frontstaticword.CancelRequest')}}</button>
                    </div>
                </form>
              @else
                <form method="post" action="{{ route('apply.instructor') }}" class="p-sm-4" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="user_id" value="{{Auth::User()->id}}" />
                  <div class="form-group">
                    <label for="fname" class="form-label">{{ __('frontstaticword.FirstName')}}</label>
                    <div class="form-group-icon">
                      <input type="text" name="fname" id="fname" class="form-control" placeholder="{{ __('frontstaticword.EnterFirstName')}}" value="{{Auth::User()->fname}}" required>
                      <svg class="svg-default form-control-icon">
                        <use xlink:href="{{ asset('/front/svg/sprite.svg#profile') }}" />
                      </svg>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="lname" class="form-label">{{ __('frontstaticword.LastName')}}</label>
                    <div class="form-group-icon">
                      <input type="text" name="lname" id="lname" class="form-control" placeholder="{{ __('frontstaticword.EnterLastName')}}" value="{{Auth::User()->lname}}" required>
                      <svg class="svg-default form-control-icon">
                        <use xlink:href="{{ asset('/front/svg/sprite.svg#profile') }}" />
                      </svg>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email" class="form-label">{{ __('frontstaticword.Email')}}</label>
                    <div class="form-group-icon">
                      <input type="email" name="email" id="email" class="form-control" placeholder="{{ __('frontstaticword.Email')}}" required>
                      <svg class="svg-default form-control-icon">
                        <use xlink:href="{{ asset('/front/svg/sprite.svg#sms') }}" />
                      </svg>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="mobile" class="form-label">{{ __('frontstaticword.Mobile')}}</label>
                    <input type="tel" name="mobile" id="mobile" class="form-control" placeholder="{{ __('frontstaticword.EnterMobileNo')}}" required>
                  </div>
                  <div class="form-group">
                    <label for="detail" class="form-label">{{ __('frontstaticword.Detail')}}</label>
                    <div class="form-group-icon">
                      <textarea name="detail" id="detail" class="form-control" placeholder="{{ __('frontstaticword.Detail')}}" required></textarea>
                      <svg class="svg-default form-control-icon">
                        <use xlink:href="{{ asset('/front/svg/sprite.svg#edit') }}" />
                      </svg>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="file" class="form-label">{{ __('frontstaticword.UploadResume')}}</label>
                    <div class="form-group-icon">
                      <input type="file" name="file" id="file" onchange="previewFile(this);">
                      <div class="file-upload">{{ __('frontstaticword.UploadAttachments')}}</div>
                      <svg class="svg-default form-control-icon">
                        <use xlink:href="{{ asset('/front/svg/sprite.svg#document-upload') }}" />
                      </svg>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="image" class="form-label">{{ __('frontstaticword.UploadImage')}}</label>
                    <div class="form-group-icon">
                      <input type="file" name="image" id="image" onchange="previewFile(this);">
                      <div class="file-upload">{{ __('frontstaticword.UploadAttachments')}}</div>
                      <svg class="svg-default form-control-icon">
                        <use xlink:href="{{ asset('/front/svg/sprite.svg#gallery-add') }}" />
                      </svg>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-accent w-100 mt-5">{{ __('frontstaticword.Submit') }}</button>
                </form>
              @endif
            @else
              <div class="box-footer">
                  <button type="submit" onclick="window.location.href = '{{ route('login') }}';"
                      class="btn btn-accent w-100 mt-5">{{ __('frontstaticword.BecomeAnInstructorFormLogin') }}</button>
              </div>
            @endif
          </section>
        </div>
      </div>
    </div>
  </section>
@endsection
