@extends('layouts.master')
@section('title')
  عنوان الدورة
@endsection

@section('content')
  <section class="page_header course-header text-white">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <h1 class="title">تطوير سياسات وإجراءات العمل إعداد وصياغة الأدلة</h1>
          <div class="d-flex align-items-center mt-5">
            <span class="rating-readonly"></span>
            <span class="fw-bold ms-3 pt-2">(4.5)</span>
            <span class="fs-14 ms-5 mt-1">
              <span class="fw-bold">12</span>
              {{ __('frontstaticword.studentsenrolled') }}
            </span>
          </div>
          <div class="d-lg-none enroll-header mt-5">
            @include('course.layout.enroll_card')
          </div>

          <div class="actions">
            <button class="btn h-auto">
              <svg class="svg-resize-20 svg-fill-white">
                <use xlink:href="{{ asset('/front/svg/sprite.svg#share') }}" />
              </svg>
              {{ __('frontstaticword.share') }}
            </button>
            <button class="btn h-auto">
              <svg class="svg-resize-20 svg-stroke-white">
                <use xlink:href="{{ asset('/front/svg/sprite.svg#heart') }}" />
              </svg>
              {{ __('frontstaticword.AddtoWishlist') }}
            </button>
            <button class="btn h-auto" type="button" data-bs-toggle="modal" data-bs-target="#reportModal">
              <svg class="svg-resize-20 svg-stroke-white">
                <use xlink:href="{{ asset('/front/svg/sprite.svg#flag') }}" />
              </svg>
              {{ __('frontstaticword.Report') }}
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="course-page-sec">
    <div class="container">
      <div class="row position-relative">
        <div class="col-lg-8">
          @include('course.layout.content.time')
          @include('course.layout.content.info')
          @include('course.layout.content.rating')
        </div>

        {{-- Course enrolled card --}}
        <div class="d-none d-lg-block col-lg-4">
          @include('course.layout.enroll_card')
        </div>


        {{-- NewCoursesSlider --}}
        <div class="col-12">
          <div class="course-content-block">
            <h3 class="block-title">{{ __('frontstaticword.RecentCourses') }}</h3>
            <section class="course-carousel owl-carousel owl-theme">
              @for ($i = 0; $i < 6; $i++)
                <section class="course-card">
                  <img src="{{ asset('front/img/samples/1.jpg') }}" alt="course-img">
                  <div class="course-card-content border-bottom">
                    <h4 class="card-title">
                      تطوير سياسات وإجراءات العمل - إعداد وصياغة الأدلة
                    </h4>
                    <div class="text-dim">
                      {{ __('frontstaticword.LastUpdated') }}:
                      <span class="text-black">25th September 2022</span>
                    </div>
                    <div class="d-flex align-items-center mt-4 pt-3">
                      <svg class="svg-default me-3">
                        <use xlink:href="{{ asset('/front/svg/sprite.svg#profile-circle') }}" />
                      </svg>
                      <span class="fw-bold mx-2">12</span>
                      {{ __('frontstaticword.studentsenrolled') }}
                    </div>
                  </div>
                  <div class="d-flex align-items-center justify-content-between card-footer">
                    <span class="fw-bold text-accent">SAR 120</span>

                  </div>
                </section>
              @endfor
            </section>
          </div>
        </div>
      </div>
    </div>

  </section>


  @include('course.modals.report')
@endsection
