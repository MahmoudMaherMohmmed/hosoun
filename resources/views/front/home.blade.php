@extends('front.layouts.master')
@section('css')
@endsection
@section('title')
  {{ __('frontstaticword.Home') }}
@endsection


@section('content')
  <header class="headersearch">
    <div class="container">
      <div class="row bg-accent rounded-pill align-items-center">
        <div class="col-auto">
          <div class="headersearch__dropdown dropdown">
            <button
              class="border-0 bg-transparent dropdown-toggle d-flex align-items-center justify-content-center text-white fw-bold pe-0 ps-4 mx-auto"
              type="button" data-bs-toggle="dropdown" aria-expanded="false">
              <svg class="svg-resize-24 svg-fill-white me-sm-3">
                <use xlink:href="{{ asset('/front/svg/sprite.svg#grid') }}" />
              </svg>
              <span class="d-none d-sm-inline-block">
                {{ __('frontstaticword.CoursesCategories') }}
              </span>
              <svg class="d-none d-lg-inline-block svg-resize-24 svg-fill-white flex-shrink-0 ms-2">
                <use xlink:href="{{ asset('/front/svg/sprite.svg#arrow-solid') }}" />
              </svg>
            </button>

            @php
              $categories = App\Categories::with('subcategory')
                  ->where('status', 1)
                  ->orderBy('position', 'ASC')
                  ->get();
            @endphp
            @if (!$categories->isEmpty())
              <ul class="dropdown-menu rounded-top-0 rounded-bottom-5 bg-accent">
                @foreach ($categories as $category)
                  @php $sub_categories= $category->subcategory->where('status', 1) @endphp
                  <li>
                    <a class="dropdown-item p-3 text-white {{ $sub_categories != null && count($sub_categories) > 0 ? 'toggle' : '' }}"
                      href="{{ route('category.page', ['id' => $category->id, 'category' => $category->title]) }}">
                      {{ str_limit($category->title, $limit = 25, $end = '..') }}
                    </a>
                    @if ($sub_categories != null && count($sub_categories) > 0)
                      <ul class="submenu dropdown-menu">
                        @foreach ($sub_categories as $sub_category)
                          @php $child_categories= $sub_category->childcategory->where('status', 1) @endphp
                          <li>
                            <a class="dropdown-item p-3 text-white {{ $child_categories != null && count($child_categories) > 0 ? 'toggle' : '' }}"
                              href="{{ route('subcategory.page', ['id' => $sub_category->id, 'category' => $sub_category->title]) }}">
                              {{ str_limit($sub_category->title, $limit = 25, $end = '..') }}
                            </a>
                            @if ($child_categories != null && count($child_categories) > 0)
                              <ul class="submenu dropdown-menu">
                                @foreach ($child_categories as $child_category)
                                  <li>
                                    <a class="dropdown-item p-3 text-white"
                                      href="{{ route('childcategory.page', ['id' => $child_category->id, 'category' => $child_category->title]) }}">
                                      {{ str_limit($child_category->title, $limit = 25, $end = '..') }}
                                    </a>
                                  </li>
                                @endforeach
                              </ul>
                            @endif
                          </li>
                        @endforeach
                      </ul>
                    @endif
                  </li>
                @endforeach
              </ul>
            @endif
          </div>
        </div>
        <div class="col px-0">
          <form action="" class="headersearch__form position-relative">
            <div
              class="position-absolute top-50 translate-middle-y d-flex align-items-center justify-content-center px-4 border-end">
              <button class="bg-transparent border-0 px-2" type="submit">
                <svg class="svg-resize-24 svg-fill-accent flex-shrink-0">
                  <use xlink:href="{{ asset('/front/svg/sprite.svg#search-bold') }}" />
                </svg>
              </button>
            </div>
            <input type="search" class="form-control rounded-pill"
              placeholder="{{ __('frontstaticword.Searchforcourses') }}">
          </form>
        </div>
      </div>
    </div>
  </header>

  {{-- Home Carousel --}}
  @if (!$trusted->isEmpty())
    <section id="homeCarousel" class="carousel slide carousel-fade mt-5 pt-3" data-bs-ride="carousel">
      <section class="carousel-inner">
        <div class="d-flex mt-md-5 pt-md-5 ">
          @foreach ($sliders as $slider)
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
              <div class="row">
                <div class="col-md-6">
                  <div class="carousel-caption text-black">
                    <div class="content">
                      @if ($slider->heading != null)
                        <h5 class="caption-title">{{ $slider->heading }}</h5>
                      @endif
                      @if ($slider->detail != null)
                        <p class="caption-text">{{ $slider->detail }}</p>
                      @endif
                      @if ($slider->button_text != null && $slider->button_url != null)
                        <a href="{{ url($slider->button_url) }}" class="btn btn-accent">
                          <svg class="svg-resize-20 svg-fill-white flex-shrink-0">
                            <use xlink:href="{{ asset('/front/svg/sprite.svg#arrow-circle') }}" />
                          </svg>
                          {{ $slider->button_text }}
                        </a>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mt-5 mt-md-0">
                  <img src="{{ asset('images/slider/' . $slider['image']) }}" class="img-fluid"
                    alt="{{ $slider->heading }}">
                </div>
              </div>
            </div>
          @endforeach
        </div>
        {{-- Next/Prev --}}
        <section class="carousel-controls mt-5 mt-lg-0">
          <button class="carousel-control-prev" type="button" data-bs-target="#homeCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#homeCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
          </button>
        </section>
      </section>
    </section>
  @endif
  {{-- /Home Carousel --}}

  {{-- Why Hosoun --}}
  <div class="block-sec">
    <section class="bg-accent-gradient px-5 block-sec rounded-50">
      <div class="row">
        <div class="col-12 text-center mb-5 pb-3">
          <h3 class="sec-title text-white">لماذا تختار حصون؟</h3>
          <p class="text-white-50">
            حصون خيارك الأمثل لتجربة تعليمية مميزة
          </p>
        </div>
        @php
          $items = [
              [
                  'image' => 'online-course.svg',
                  'title' => 'دورات مميزة',
                  'desc' => 'أفضل الدورات التي تقدم على منصة حصون على ايدي باقة من أبرز المدربين',
              ],
              [
                  'image' => 'teacher.svg',
                  'title' => 'كوادر علمية',
                  'desc' => 'أفضل الكوادر العلمية من كل المدربين المميزين على منصة حصون التعليمية',
              ],
              [
                  'image' => 'question.svg',
                  'title' => 'إختبارات مستمرة',
                  'desc' => 'نقدم الإختبارات المستمرة على كل الدورات الموجودة لمتابعة مستوى الطلاب',
              ],
          ];
        @endphp
        @foreach ($items as $item)
          <div class="col-xl-4 features-item">
            <div class="rounded-50 bg-white p-5">
              <div class="d-flex align-items-start py-3">
                <img src="{{ url('front/svg', $item['image']) }}" class="features-img flex-shrink-0 me-5 mb-5"
                  alt="feature-image">
                <div class="d-flex flex-column">
                  <span class="fs-1 fw-black mb-3">{{ $item['title'] }}</span>
                  <span class="text-dim pt-3">{{ $item['desc'] }}</span>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </section>
  </div>
  {{-- /Why Hosoun --}}

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

        {{-- <div class="more-btn">
          <a href="" class="btn btn-accent2">
            {{ __('frontstaticword.ViewMoreCourses') }}
          </a>
        </div> --}}
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

        {{-- <div class="more-btn">
          <a href="" class="btn btn-accent2">
            {{ __('frontstaticword.ViewMoreCourses') }}
          </a>
        </div> --}}
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
