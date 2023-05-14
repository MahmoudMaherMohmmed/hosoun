@extends('front.layouts.master')
@section('title')
  {{ $course->title }}
@endsection

@section('content')
  <section class="page_header course-header text-white">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <h1 class="title">{{ $course->title }}</h1>
          <div class="d-flex align-items-center mt-5">
            <span class="rating-readonly"></span>
            <span class="fw-bold ms-3 pt-2">(4.5)</span>
            <span class="fs-14 ms-5 mt-1">
              <span class="fw-bold">{{ $course->order->count() }}</span>
              {{ __('frontstaticword.studentsenrolled') }}
            </span>
          </div>
          <div class="d-lg-none enroll-header mt-5">
            @include('front.course.layout.enroll_card')
          </div>

          <div class="actions">
            <button class="btn h-auto" type="button" data-bs-toggle="modal" data-bs-target="#shareModal">
              <svg class="svg-resize-20 svg-fill-white">
                <use xlink:href="{{ asset('/front/svg/sprite.svg#share') }}" />
              </svg>
              {{ __('frontstaticword.share') }}
            </button>
            <hr class="vertical-divider" />
            @if (Auth::check())
              @if ($wish == null)
                <form method="post" action="{{ url('show/wishlist', $course->id) }}">
                  @csrf
                  <input type="hidden" name="user_id" value="{{ Auth::User()->id }}" />
                  <input type="hidden" name="course_id" value="{{ $course->id }}" />

                  <button class="btn h-auto">
                    <svg class="svg-resize-20 svg-stroke-white">
                      <use xlink:href="{{ asset('/front/svg/sprite.svg#heart') }}" />
                    </svg>
                    {{ __('frontstaticword.AddtoWishlist') }}
                  </button>
                </form>
              @else
                <form method="post" action="{{ url('remove/wishlist', $course->id) }}">
                  @csrf
                  <input type="hidden" name="user_id" value="{{ Auth::User()->id }}" />
                  <input type="hidden" name="course_id" value="{{ $course->id }}" />

                  <button class="btn h-auto">
                    <svg class="svg-resize-20 svg-stroke-white">
                      <use xlink:href="{{ asset('/front/svg/sprite.svg#trash') }}" />
                    </svg>
                    {{ __('frontstaticword.RemovefromWishlist') }}
                  </button>
                </form>
              @endif
              <hr class="vertical-divider" />
            @else
              <a href="{{ route('login') }}" class="btn h-auto">
                <svg class="svg-resize-20 svg-stroke-white">
                  <use xlink:href="{{ asset('/front/svg/sprite.svg#heart') }}" />
                </svg>
                {{ __('frontstaticword.AddtoWishlist') }}
              </a>
              <hr class="vertical-divider" />
            @endif
            @if (Auth::check())
              <button class="btn h-auto" type="button" data-bs-toggle="modal" data-bs-target="#reportModal">
                <svg class="svg-resize-20 svg-stroke-white">
                  <use xlink:href="{{ asset('/front/svg/sprite.svg#flag') }}" />
                </svg>
                {{ __('frontstaticword.Report') }}
              </button>
            @else
              <a href="{{ route('login') }}" class="btn h-auto">
                <svg class="svg-resize-20 svg-stroke-white">
                  <use xlink:href="{{ asset('/front/svg/sprite.svg#flag') }}" />
                </svg>
                {{ __('frontstaticword.Report') }}
              </a>
            @endif
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="course-page-sec">
    <div class="container">
      <div class="row position-relative">
        <div class="col-lg-8">
          @include('admin.message')

          @include('front.course.layout.content.time')
          @include('front.course.layout.content.content')
          @include('front.course.layout.content.info')
          @include('front.course.layout.content.rating')
        </div>

        {{-- Course enrolled card --}}
        <div class="d-none d-lg-block col-lg-4">
          @include('front.course.layout.enroll_card')
        </div>


        {{-- NewCoursesSlider --}}
        @if ($relatedcourse->isEmpty())
          @php
            $recent_courses = App\Course::where('status', 1)
                ->orderBy('created_at', 'desc')
                ->limit(8)
                ->get();
          @endphp
          <div class="col-12">
            <div class="course-content-block">
              <h3 class="block-title">{{ __('frontstaticword.RecentCourses') }}</h3>
              <section class="course-carousel owl-carousel owl-theme">
                @foreach ($recent_courses as $course)
                  <section class="course-card">
                    @if ($course->preview_image !== null && $course->preview_image !== '')
                      <a href="{{ route('user.course.show', ['id' => $course->id, 'slug' => $course->slug]) }}"
                        class="img">
                        <img src="{{ asset('images/course/' . $course->preview_image) }}" alt="{{ $course->title }}">
                      </a>
                    @else
                      <a href="{{ route('user.course.show', ['id' => $course->id, 'slug' => $course->slug]) }}"
                        class="img">
                        <img src="{{ Avatar::create($course->title)->toBase64() }}" alt="{{ $course->title }}">
                      </a>
                    @endif
                    <div class="course-card-content border-bottom">
                      <h4 class="card-title">
                        <a
                          href="{{ route('user.course.show', ['id' => $course->id, 'slug' => $course->slug]) }}">{{ $course->title }}</a>
                      </h4>
                      <div class="text-dim">
                        {{ __('frontstaticword.LastUpdated') }}:
                        <span class="text-black">{{ date('jS F Y', strtotime($course->updated_at)) }}</span>
                      </div>
                      <div class="d-flex align-items-center mt-4 pt-3">
                        <svg class="svg-default me-3">
                          <use xlink:href="{{ asset('/front/svg/sprite.svg#profile-circle') }}" />
                        </svg>
                        <span class="fw-bold mx-2">{{ $course->order->count() }}</span>
                        {{ __('frontstaticword.studentsenrolled') }}
                      </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between card-footer">
                      @if ($course->type == 1)
                        @if ($course->discount_price == !null)
                          @if ($gsetting->currency_swipe == 1)
                            <span class="fw-bold text-accent"><i
                                class="{{ $currency->icon }}"></i>{{ $course->discount_price }}</span>&nbsp;
                            <span class="fw-bold text-accent"><del><i
                                  class="{{ $currency->icon }}"></i>{{ $course->price }}</del></span>
                          @else
                            <span class="fw-bold text-accent">{{ $course->discount_price }}<i
                                class="{{ $currency->icon }}"></i></san>&nbsp;
                              <span class="fw-bold text-accent"><del>{{ $course->price }}<i
                                    class="{{ $currency->icon }}"></i></del></span>
                          @endif
                        @else
                          @if ($gsetting->currency_swipe == 1)
                            <span class="fw-bold text-accent"><i
                                class="{{ $currency->icon }}"></i>{{ $course->price }}</span>
                          @else
                            <span class="fw-bold text-accent">{{ $course->price }}<i
                                class="{{ $currency->icon }}"></i></span>
                          @endif
                        @endif
                      @else
                        <span class="fw-bold text-accent">{{ __('frontstaticword.Free') }}</span>
                      @endif
                    </div>
                  </section>
                @endforeach
              </section>
            </div>
          </div>
        @endif

        {{-- RelatedCoursesSlider --}}
        @if ($relatedcourse->isNotEmpty())
          <div class="col-12">
            <div class="course-content-block">
              <h3 class="block-title">{{ __('frontstaticword.RelatedCourses') }}</h3>
              <section class="course-carousel owl-carousel owl-theme">
                @foreach ($relatedcourse as $rel)
                  @if ($rel->courses->status == 1)
                    <section class="course-card">
                      @if ($rel->courses->preview_image !== null && $rel->courses->preview_image !== '')
                        <a href="{{ route('user.course.show', ['id' => $rel->course_id, 'slug' => $rel->courses->slug]) }}"
                          class="img">
                          <img src="{{ asset('images/course/' . $rel->courses->preview_image) }}"
                            alt="{{ $rel->courses->title }}">
                        </a>
                      @else
                        <a href="{{ route('user.course.show', ['id' => $rel->course_id, 'slug' => $rel->courses->slug]) }}"
                          class="img">
                          <img src="{{ Avatar::create($rel->courses->title)->toBase64() }}"
                            alt="{{ $rel->courses->title }}">
                        </a>
                      @endif
                      <div class="course-card-content border-bottom">
                        <h4 class="card-title">
                          <a
                            href="{{ route('user.course.show', ['id' => $rel->course_id, 'slug' => $rel->courses->slug]) }}">{{ $rel->courses->title }}</a>
                        </h4>
                        <div class="text-dim">
                          {{ __('frontstaticword.LastUpdated') }}:
                          <span class="text-black">{{ date('jS F Y', strtotime($rel->courses->updated_at)) }}</span>
                        </div>
                        <div class="d-flex align-items-center mt-4 pt-3">
                          <svg class="svg-default me-3">
                            <use xlink:href="{{ asset('/front/svg/sprite.svg#profile-circle') }}" />
                          </svg>
                          <span class="fw-bold mx-2">{{ $rel->courses->order->count() }}</span>
                          {{ __('frontstaticword.studentsenrolled') }}
                        </div>
                      </div>
                      <div class="d-flex align-items-center justify-content-between card-footer">
                        @if ($rel->courses->type == 1)
                          @if ($rel->courses->discount_price == !null)
                            @if ($gsetting->currency_swipe == 1)
                              <span class="fw-bold text-accent"><i
                                  class="{{ $currency->icon }}"></i>{{ $rel->courses->discount_price }}</span>&nbsp;
                              <span class="fw-bold text-accent"><del><i
                                    class="{{ $currency->icon }}"></i>{{ $rel->courses->price }}</del></span>
                            @else
                              <span class="fw-bold text-accent">{{ $rel->courses->discount_price }}<i
                                  class="{{ $currency->icon }}"></i></san>&nbsp;
                                <span class="fw-bold text-accent"><del>{{ $rel->courses->price }}<i
                                      class="{{ $currency->icon }}"></i></del></span>
                            @endif
                          @else
                            @if ($gsetting->currency_swipe == 1)
                              <span class="fw-bold text-accent"><i
                                  class="{{ $currency->icon }}"></i>{{ $rel->courses->price }}</span>
                            @else
                              <span class="fw-bold text-accent">{{ $rel->courses->price }}<i
                                  class="{{ $currency->icon }}"></i></span>
                            @endif
                          @endif
                        @else
                          <span class="fw-bold text-accent">{{ __('frontstaticword.Free') }}</span>
                        @endif
                      </div>
                    </section>
                  @endif
                @endforeach
              </section>
              {{-- Empty Status --}}
              <div class="main-block text-center d-flex flex-column align-items-center justify-content-center">
                <svg class="svg-resize-32 svg-stroke-accent mb-4">
                  <use xlink:href="{{ asset('/front/svg/sprite.svg#book-square') }}" />
                </svg>
                لا توجد دورات ذات صلة
              </div>
            </div>
          </div>
        @endif
      </div>
    </div>

  </section>


  @include('front.course.modals.share')
  @include('front.course.modals.report')
@endsection

@section('custom-js')
  <script type="text/javascript">
    function myFunction() {
      /* Get the text field */
      var copyText = document.getElementById("myInput");

      /* Select the text field */
      copyText.select();
      copyText.setSelectionRange(0, 99999); /*For mobile devices*/

      /* Copy the text inside the text field */
      document.execCommand("copy");
    }
  </script>
@endsection
