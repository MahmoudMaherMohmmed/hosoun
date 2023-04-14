@extends('front.layouts.master')
@section('css')
@endsection
@section('title')
  {{ __('frontstaticword.Home') }}
@endsection


@section('content')
  {{-- Home Carousel --}}
  @if (!$trusted->isEmpty())
    <section id="homeCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
      <div class="carousel-indicators m-0">
        <div class="container">
          @foreach ($sliders as $slider)
            <button type="button" data-bs-target="#homeCarousel" data-bs-slide-to="{{ $loop->index }}"
              class="{{ $loop->first ? 'active' : '' }}" aria-current="true"
              aria-label="Slide_{{ $slider->id }}"></button>
          @endforeach
        </div>
      </div>
      <div class="carousel-inner">
        @foreach ($sliders as $slider)
          <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
            <img src="{{ asset('images/slider/' . $slider['image']) }}" class="d-block w-100"
              alt="{{ $slider->heading }}">
            <div class="carousel-caption">
              <div class="container w-100 mx-auto">
                <div class="content">
                  @if ($slider->heading != null)
                    <h5 class="caption-title">{{ $slider->heading }}</h5>
                  @endif
                  @if ($slider->detail != null)
                    <p class="caption-text">{{ $slider->detail }}</p>
                  @endif
                  @if($slider->button_text!=null && $slider->button_url!=null)
                    <a href="{{ url($slider->button_url) }}" class="btn btn-accent2">{{ $slider->button_text }}</a>
                  @endif
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </section>
  @endif
  {{-- /Home Carousel --}}

  {{-- Featured sections --}}
  @if (!$featured_categories->isEmpty())
    <section class="block-sec">
      <div class="container">
        <section class="titling">
          <h6 class="min-title">{{ __('frontstaticword.WebsiteCategories') }}</h6>
          <h3 class="sec-title">{{ __('frontstaticword.FeaturedCategories') }}</h3>
          <p class="text-dim">{{ __('frontstaticword.FeaturedCategoriesSubtitle') }}</p>
        </section>

        <section class="featured-carousel owl-carousel owl-theme">
          @foreach ($featured_categories as $featured)
            <a href="{{ route('category.page', ['id' => $featured->id, 'category' => $featured->title]) }}"
              class="featured-item">
              <figure>
                <img
                  src="{{ $featured->cat_image != null ? asset('images/category/' . $featured->cat_image) : Avatar::create($featured->title)->toBase64() }}"
                  alt="{{ $featured->title }}">
              </figure>
              <h4 class="title">{{ $featured->title }}</h4>
              <p class="text-dim">{{ __('frontstaticword.BrowseCategory') }} {{ $featured->title }}</p>
            </a>
          @endforeach
        </section>
      </div>
    </section>
  @endif
  {{-- /Featured sections --}}

  {{-- Statistics --}}
  @if (!$facts->isEmpty())
    <section class="bg-accent-2 bg-stats">
      <div class="container">
        <div class="stats">
          @foreach ($facts as $fact)
            <div class="stats-item">
              <i class="fa-solid {{ $fact->icon }}"></i>
              <span class="number">{{ $fact->heading }}</span>
              <span class="title">{{ $fact->sub_heading }}</span>
            </div>
          @endforeach
        </div>
      </div>
    </section>
  @endif

  {{-- New Courses --}}
  @if (!$recent_courses->isEmpty())
    <section class="block-sec">
      <div class="container">
        <section class="titling">
          <h6 class="min-title">{{ __('frontstaticword.Courses') }}</h6>
          <h3 class="sec-title">{{ __('frontstaticword.RecentCourses') }}</h3>
          <p class="text-dim">{{ __('frontstaticword.RecentCoursesSubtitle') }}</p>
        </section>

        <section class="course-carousel owl-carousel owl-theme">
          @foreach ($recent_courses as $course)
            @include('front.course.layout.card')
          @endforeach
        </section>

        {{--<div class="more-btn">
          <a href="" class="btn btn-accent2">
            {{ __('frontstaticword.ViewMoreCourses') }}
          </a>
        </div>--}}
      </div>
    </section>
  @endif

  {{-- Featured Courses --}}
  @if (!$featured_courses->isEmpty())
    <section class="block-sec pt-0">
      <div class="container">
        <section class="titling">
          <h6 class="min-title">{{ __('frontstaticword.Courses') }}</h6>
          <h3 class="sec-title">{{ __('frontstaticword.FeaturedCourses') }}</h3>
          <p class="text-dim">{{ __('frontstaticword.FeaturedCoursesSubtitle') }}</p>
        </section>

        <section class="course-carousel owl-carousel owl-theme">
          @foreach ($featured_courses as $course)
            @include('front.course.layout.card')
          @endforeach
        </section>

        {{--<div class="more-btn">
          <a href="" class="btn btn-accent2">
            {{ __('frontstaticword.ViewMoreCourses') }}
          </a>
        </div>--}}
      </div>
    </section>
  @endif

  {{-- Blog Carousel --}}
  @if (!$blogs->isEmpty())
    <section class="bg-accent-2-light bg-watermark">
      <div class="container">
        <div class="block-sec">
          <section class="titling">
            <h6 class="min-title">{{ __('frontstaticword.RecentNews') }}</h6>
            <h3 class="sec-title">{{ __('frontstaticword.RecentBlogs') }}</h3>
            <p class="text-dim">{{ __('frontstaticword.RecentBlogsText') }}</p>
          </section>

          <section class="blog-carousel owl-carousel owl-theme">
            @foreach ($blogs as $blog)
              @include('front.blog.card')
            @endforeach
          </section>
        </div>
      </div>
    </section>
  @endif

  {{-- Testimonial Carousel --}}
  @if (!$testi->isEmpty())
    <section class="bg-white">
      <div class="container">
        <div class="block-sec">
          <section class="titling">
            <h6 class="min-title">{{ __('frontstaticword.SectionTestimonialTitle') }}</h6>
            <h3 class="sec-title">{{ __('frontstaticword.SectionTestimonialSubtitle') }}</h3>
            <p class="text-dim">{{ __('frontstaticword.SectionTestimonialText') }}</p>
          </section>

          <section class="testimonials-carousel owl-carousel owl-theme">
            @foreach ($testi as $tes)
              <section class="testimonials-card">
                <figure>
                  <svg>
                    <use xlink:href="{{ asset('/front/svg/sprite.svg#quotes') }}" />
                  </svg>
                </figure>
                <h5 class="title">{{ __('frontstaticword.TestimonialTitle') }}</h5>
                <p>{!! str_limit($tes->details, $limit = 300, $end = '...') !!}</p>

                <div class="d-flex align-items-center user">
                  <img src="{{ asset('images/testimonial/' . $tes['image']) }}" alt="user-img">
                  <div class="d-flex flex-column">
                    <span class="name">{{ $tes['client_name'] }}</span>
                    <!--<span class="user-title text-dim">استشاري نفسي</span>-->
                  </div>
                </div>
              </section>
            @endforeach
          </section>
        </div>
      </div>
    </section>
  @endif

  {{-- Trusted --}}
  @if (!$trusted->isEmpty())
    <section class="bg-accent-2-light">
      <div class="block-sec">
        <div class="container">
          <div class="row align-items-md-center">
            <div class="col-12 col-md-3">
              <div class="titling text-md-start pb-md-0">
                <h6 class="min-title">{{ __('frontstaticword.Partners') }}</h6>
                <h3 class="sec-title mb-0">{{ __('frontstaticword.Trusted') }}</h3>
              </div>
            </div>
            <div class="col-12 col-md-9">
              <section class="trusted-carousel owl-carousel owl-theme">
                @foreach ($trusted as $trust)
                  <a href="{{ $trust['url'] }}" target="_blank">
                    <img src="{{ asset('images/trusted/' . $trust['image']) }}" alt="trusted-client-logo" />
                  </a>
                @endforeach
            </div>
          </div>
        </div>
      </div>
      </div>
    </section>
  @endif
@endsection
