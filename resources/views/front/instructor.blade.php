@extends('front.layouts.master')
@section('css')
@endsection
@section('title')
  {{ __('frontstaticword.Instructor') }}: {{ $user->fname }} {{ $user->lname }}
@endsection

@section('content')
  <section class="page_header py-5">
    <div class="container">
      <div class="instructor-header py-5 d-flex flex-column flex-sm-row align-items-center">
        <div class="d-flex flex-column flex-sm-row align-items-center">
          @if ($user->user_img != null || $user->user_img != '')
            <img src="{{ asset('images/user_img/' . $user->user_img) }}" class="mb-5 mb-sm-0 me-sm-5" alt="instructor-img">
          @else
            <img src="{{ asset('images/default/user.jpg') }}" class="mb-5 mb-sm-0 me-sm-5" alt="instructor-img">
          @endif
          <div class="d-flex flex-column align-items-center align-items-sm-start text-center text-sm-start text-white">
            <span class="tag mb-4">{{ __('frontstaticword.Instructor') }}</span>
            <h4 class="title-25">{{ $user->fname }} {{ $user->lname }}</h4>
            <span class="my-4">{{ $user->email }}</span>
            <span class="fs-14">
              <span class="fw-bold me-1">{{ App\Order::where('instructor_id', $user->id)->count() }}</span>
              {{ __('frontstaticword.Totalstudents') }}
            </span>
          </div>
        </div>
        <div class="insructor-social d-flex flex-column justify-content-center ms-sm-auto mt-5 mt-sm-0">
          @if ($user->linkedin_url != null)
            <a href="{{ $user->linkedin_url }}" target="_blank" class="btn btn-white-light text-white fs-12">
              <i class="fa-brands fa-linkedin"></i>
              {{ __('frontstaticword.LinkedIn') }}
            </a>
          @endif
          @if ($user->fb_url != null)
            <a href="{{ $user->fb_url }}" target="_blank" class="btn btn-white-light text-white fs-12">
              <i class="fa-brands fa-facebook"></i>
              {{ __('frontstaticword.Facebook') }}
            </a>
          @endif
          @if ($user->twitter_url != null)
            <a href="{{ $user->twitter_url }}" target="_blank" class="btn btn-white-light text-white fs-12 my-4">
              <i class="fa-brands fa-twitter"></i>
              {{ __('frontstaticword.Twitter') }}
            </a>
          @endif
          @if ($user->youtube_url != null)
            <a href="{{ $user->youtube_url }}" target="_blank" class="btn btn-white-light text-white fs-12">
              <i class="fa-brands fa-twitter"></i>
              {{ __('frontstaticword.Youtube') }}
            </a>
          @endif
        </div>
      </div>
    </div>
  </section>


  <section class="block-sec page-content">
    <div class="container">
      <div class="row">
        <div class="col-12 mb-5">
          <h3 class="title-25">
            {{ __('frontstaticword.MyCourses') }}
            <span class="text-accent fw-bold ms-2">({{ $courses->count() }})</span>
          </h3>
        </div>
        @if ($courses->isNotEmpty())
          @foreach ($courses as $course)
            <div class="col-12 col-sm-6 col-lg-4 mb-4">
              @include('front.course.layout.card')
            </div>
          @endforeach
        @else
          {{-- Empty Status --}}
          <div class="col-12">
            <div class="main-block text-center d-flex flex-column align-items-center justify-content-center">
              <svg class="svg-resize-32 svg-stroke-accent mb-4">
                <use xlink:href="{{ asset('/front/svg/sprite.svg#book-square') }}" />
              </svg>
              لم يقوم المدرب بإضافة دورات بعد
            </div>
          </div>
        @endif
      </div>
    </div>
  </section>
@endsection
