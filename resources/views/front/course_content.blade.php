@extends('front.layouts.master')
@section('title')
  {{ $course->title }}
@endsection

@section('content')
  <section class="page_header course-header text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-xl-3">
          @if ($course->preview_image !== null && $course->preview_image !== '')
            <img src="{{ asset('images/course/' . $course->preview_image) }}" alt="{{ $course->title }}"
              class="img-fluid course-img d-inline-block">
          @else
            <img src="{{ Avatar::create($course->title)->toBase64() }}" alt="{{ $course->title }}"
              class="img-fluid course-img d-inline-block">
          @endif
        </div> 
        <div class="col-md-8 col-xl-9">
          <h1 class="title">{{ $course->title }}</h1>
          <div class="header-max-w">
            <div class="d-flex flex-wrap align-items-center mt-5">
              <span class="fs-14 my-2 me-5 pe-3">
                {{ __('frontstaticword.Created') }} :
                <span
                  class="fw-bold">{{ $course->user != null ? $course->user->fname . ' ' . $course->user->lname : '---' }}</span>
              </span>
              <span class="fs-14 my-2 me-5 pe-3">
                <span class="fw-bold">{{ $course->order->count() }}</span>
                {{ __('frontstaticword.studentsenrolled') }}
              </span>
              <span class="fs-14 my-2 me-5 pe-3">
                {{ __('frontstaticword.Language') }} :
                <span class="fw-bold">{{ $course->language != null ? $course->language->name : '---' }}</span>
              </span>
              <span class="fs-14 my-2">
                <span class="fw-bold">{{ $courseclass->count() }}</span>
                {{ __('frontstaticword.class') }}
              </span>
            </div>
            <p class="mt-5 mb-2">{{ $course->short_detail }}</p>

            <div class="d-flex align-items-center mt-5">
              @if (!empty($progress))
                @php
                  $total_class = count($progress->all_chapter_id);
                  
                  $read_class = count($progress->mark_chapter_id);
                  
                  $progress_percentage = ($read_class / $total_class) * 100;
                @endphp
                <div class="progress accent-2 flex-grow-1 me-3" role="progressbar" aria-label="Basic example"
                  aria-valuenow="{{ $progress_percentage }}" aria-valuemin="0" aria-valuemax="100">
                  <div class="progress-bar" style="width: {{ $progress_percentage }}%"></div>
                </div>
              @else
                <div class="progress accent-2 flex-grow-1 me-3" role="progressbar" aria-label="Basic example"
                  aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                  <div class="progress-bar" style="width: 0%"></div>
                </div>
              @endif
              <svg class="svg-resize-20 svg-fill-white">
                <use xlink:href="{{ asset('/front/svg/sprite.svg#cup') }}" />
              </svg>
            </div>

            <a href="{{ route('user.course.show', ['id' => $course->id, 'slug' => $course->slug]) }}"
              class="btn btn-redirect btn-white-light btn-shake text-white mt-5">
              {{ __('frontstaticword.Coursedetails') }}
              <figure class="anim">
                <svg class="svg-fill-white">
                  <use xlink:href="{{ asset('/front/svg/sprite.svg#arrow-circle-left') }}" />
                </svg>
              </figure>
            </a>
          </div>
        </div>

      </div>
    </div>
  </section>

  {{-- Course content --}}
  <!-- Nav tabs -->
  <div class="course-page-sec">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <ul class="nav nav-pills justify-content-center nav-tabs border-bottom-0" id="courseTabs" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="info-tab" data-bs-toggle="tab" data-bs-target="#info" type="button"
                role="tab" aria-controls="info" aria-selected="true">{{ __('frontstaticword.Overview') }}</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="download-tab" data-bs-toggle="tab" data-bs-target="#download" type="button"
                role="tab" aria-controls="download"
                aria-selected="false">{{ __('frontstaticword.CourseContent') }}</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="qa-tab" data-bs-toggle="tab" data-bs-target="#qa" type="button"
                role="tab" aria-controls="qa" aria-selected="false">{{ __('frontstaticword.Q&A') }}</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="time-tab" data-bs-toggle="tab" data-bs-target="#time" type="button"
                role="tab" aria-controls="time" aria-selected="false">مواعيد الدورة </button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="exam-tab" data-bs-toggle="tab" data-bs-target="#exam" type="button"
                role="tab" aria-controls="exam" aria-selected="false">اختبار</button>
            </li>
          </ul>
        </div>
        <div class="col-12">
          <!-- Tab panes -->
          <div class="tab-content">
            {{-- Info Tab --}}
            <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info-tab"
              tabindex="0">
              @include('front.course.tabs.info')
            </div>
            {{-- Download Tab --}}
            <div class="tab-pane fade" id="download" role="tabpanel" aria-labelledby="download-tab" tabindex="0">
              @include('front.course.tabs.download')
            </div>
            {{-- Questions and Answers Tab --}}
            <div class="tab-pane fade" id="qa" role="tabpanel" aria-labelledby="qa-tab" tabindex="0">
              @include('front.course.tabs.qa')
            </div>
            {{-- Time Tab --}}
            <div class="tab-pane fade" id="time" role="tabpanel" aria-labelledby="time-tab" tabindex="0">
              @include('front.course.layout.content.time')
            </div>
            {{-- Exam Tab --}}
            <div class="tab-pane fade" id="exam" role="tabpanel" aria-labelledby="exam-tab" tabindex="0">
              @include('front.course.tabs.exam')
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- Modals in all tabs --}}
  @include('front.course.modals.question')
  @include('front.course.modals.report_question')
@endsection
