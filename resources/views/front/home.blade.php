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
      <div class="container">
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
      </div>
    </section>
  @endif
  {{-- /Home Carousel --}}

  {{-- Why Hosoun --}}
  <div class="block-sec">
    <div class="container">
      <section class="bg-accent-gradient px-5 block-sec rounded-50">
        <div class="row">
          <div class="col-12 text-center mb-5 pb-3">
            <h3 class="sec-title text-white">لماذا تختار حصون؟</h3>
            <p class="text-white-70">
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
  </div>
  {{-- /Why Hosoun --}}

  {{-- Courses Carousel --}}
  @if($featured_courses->isNotEmpty())
    <section class="container">
      <div class="block-sec">
        <section class="titling">
          <h3 class="sec-title">{{ __('frontstaticword.Courseslist') }}</h3>
          <p class="text-dim">{{ __('frontstaticword.CourseslistSubtitle') }}</p>
        </section>

        <section class="course-carousel owl-carousel owl-theme">
          @foreach ($featured_courses as $course)
            @include('front.course.layout.card')
          @endforeach
        </section>

        <div class="row mt-5 pt-3">
          <div class="col-sm-6 col-lg-4 mx-auto">
            <a href="{{ route('blog.all') }}" class="btn btn-dark-outline w-100">
              <svg class="svg-resize-20 flex-shrink-0">
                <use xlink:href="{{ asset('/front/svg/sprite.svg#arrow-circle') }}" />
              </svg>
              {{ __('frontstaticword.SeeAllArticles') }}
            </a>
          </div>
        </div>
      </div>
    </section>
  @endif
  {{-- /Courses Carousel --}}



  {{-- Banner --}}
  <div class="pt-4">
    <div class="container">
      <div class="bg-light rounded-50 position-relative">
        <div class="iconshapes2">
          <img class="iconshapes__1 position-absolute" src="{{ asset('front/img/iconshape-4.png') }}" alt="">
          <img class="iconshapes__2 position-absolute" src="{{ asset('front/img/iconshape-3.png') }}" alt="">
        </div>
        <div class="row align-items-center justify-content-center">
          <div class="col-lg-4 align-self-end mb-4 mb-lg-0">
            <img class="img-fluid d-block mx-auto" src="{{ asset('front/img/img-2.svg') }}" alt="">
          </div>
          <div class="col-lg-6">
            <div class="p-4 p-lg-5 text-center text-lg-left">
              <p class="font-30 fw-black mb-4 px-0 px-md-6 px-xl-0">
                ابدأ رحلتك الآن في حصون
                وتحدى قدراتك من
                اللحظة
              </p>
              <div class="d-flex align-items-center justify-content-center justify-content-lg-start flex-wrap">
                <a class="btn btn-accent2 px-4 mr-3 mb-2" href="#">
                  <svg class="svg-resize-20 svg-fill-white flex-shrink-0">
                    <use xlink:href="{{ asset('/front/svg/sprite.svg#arrow-circle') }}" />
                  </svg>
                  سجل الآن
                </a>
                <a class="btn btn-dark px-4 mr-3 mb-2" href="#">
                  <svg class="svg-resize-24 svg-fill-white flex-shrink-0">
                    <use xlink:href="{{ asset('/front/svg/sprite.svg#play-circle') }}" />
                  </svg>
                  شاهد قصتنا
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- /Banner --}}



  {{-- InstructorsSections --}}
  <section class="block-sec">
    <div class="container">
      <section class="titling">
        <h3 class="sec-title">
          {{ __('frontstaticword.Instructors') }}
        </h3>
        <p class="text-dim">
          {{ __('frontstaticword.InstructorsSubtitle') }}
        </p>
      </section>

      <section class="instructors-carousel owl-carousel owl-theme">
        @php
          $items = [
              [
                  'img' => 'person-1.png',
                  'title' => 'أ / أحمد منير',
              ],
              [
                  'img' => 'person-2.png',
                  'title' => 'أ / كريم عصام الدين',
              ],
              [
                  'img' => 'person-3.png',
                  'title' => 'أ / محمود خليل',
              ],
              [
                  'img' => 'person-4.png',
                  'title' => 'أ / عمر علي',
              ],
              [
                  'img' => 'person-1.png',
                  'title' => 'أ / أحمد منير',
              ],
              [
                  'img' => 'person-2.png',
                  'title' => 'أ / كريم عصام الدين',
              ],
              [
                  'img' => 'person-3.png',
                  'title' => 'أ / محمود خليل',
              ],
              [
                  'img' => 'person-4.png',
                  'title' => 'أ / عمر علي',
              ],
          ];
        @endphp
        @foreach ($items as $item)
          <section class="instructor-item text-center d-flex flex-column align-items-center justify-content-start">
            <div class="teachers__bg position-relative">
              <img src="{{ url('front/img/persons', $item['img']) }}" alt="instructor-img">
            </div>
            <span class="fs-1 fw-bold">{{ $item['title'] }}</span>
            <div class="title text-accent fw-medium">
              مدرس لغة عربية
            </div>
          </section>
        @endforeach
      </section>
    </div>
  </section>
  {{-- /InstructorsSections --}}



  {{-- BooksSections --}}
  <section class="block-sec bg-dark-accent">
    <div class="container position-relative" style="z-index: 0">
      <section class="titling">
        <h3 class="sec-title text-white">
          {{ __('frontstaticword.BooksCategories') }}
        </h3>
        <p class="text-white-70">
          {{ __('frontstaticword.BooksSubtitle') }}
        </p>
      </section>

      <section class="books-carousel owl-carousel owl-theme">
        @php
          $items = [
              [
                  'img' => 'books.png',
                  'title' => 'عربي',
                  'desc' => 'كتب اللغة العربية المختلفة وتصنيفات العربي',
              ],
              [
                  'img' => 'quran.png',
                  'title' => 'مواد شرعية',
                  'desc' => 'كتب المواد الشرعية مثل الفقه والحديث والسيرة وغيرها',
              ],
              [
                  'img' => 'quran2.png',
                  'title' => 'قران كريم',
                  'desc' => 'علوم القران الكريم من الحفظ والتجويد والقراءات وغيرها',
              ],
              [
                  'img' => 'openbook.png',
                  'title' => 'علوم أخرى',
                  'desc' => 'مواد أخرى مثل الإنجليزية والعلوم وغيرها من المواد',
              ],
              [
                  'img' => 'books.png',
                  'title' => 'عربي',
                  'desc' => 'كتب اللغة العربية المختلفة وتصنيفات العربي',
              ],
              [
                  'img' => 'quran.png',
                  'title' => 'مواد شرعية',
                  'desc' => 'كتب المواد الشرعية مثل الفقه والحديث والسيرة وغيرها',
              ],
              [
                  'img' => 'quran2.png',
                  'title' => 'قران كريم',
                  'desc' => 'علوم القران الكريم من الحفظ والتجويد والقراءات وغيرها',
              ],
              [
                  'img' => 'openbook.png',
                  'title' => 'علوم أخرى',
                  'desc' => 'مواد أخرى مثل الإنجليزية والعلوم وغيرها من المواد',
              ],
          ];
        @endphp
        @foreach ($items as $item)
          <section class="books-item text-center d-flex flex-column align-items-center justify-content-start">
            <img src="{{ url('front/img/books', $item['img']) }}" class="books-thumbnail" alt="">
            <span class="fs-1 fw-bold text-white">{{ $item['title'] }}</span>
            <span class="text-white-70">
              {{ $item['desc'] }}
            </span>
          </section>
        @endforeach
      </section>

      <div class="row mt-5 pt-3">
        <div class="col-sm-6 col-lg-4 mx-auto">
          <a href="" class="btn btn-white-outline w-100">
            <svg class="svg-resize-20 flex-shrink-0">
              <use xlink:href="{{ asset('/front/svg/sprite.svg#arrow-circle') }}" />
            </svg>
            {{ __('frontstaticword.SeeAllBooksCat') }}
          </a>
        </div>
      </div>

      {{-- animations --}}
      <img src="{{ asset('front/svg/lines.svg') }}" class="lines">
      <img src="{{ asset('front/svg/lines.svg') }}" class="lines">
    </div>
  </section>

  {{-- Blog Carousel --}}
  @if (!$blogs->isEmpty())
    <section class="container">
      <div class="block-sec">
        <section class="titling">
          <h3 class="sec-title">{{ __('frontstaticword.Blog') }}</h3>
          <p class="text-dim">{{ __('frontstaticword.RecentBlogsText') }}</p>
        </section>

        <section class="blog-carousel owl-carousel owl-theme">
          @foreach ($blogs as $blog)
            @include('front.blog.card')
          @endforeach
        </section>

        <div class="row mt-5 pt-3">
          <div class="col-sm-6 col-lg-4 mx-auto">
            <a href="{{ route('blog.all') }}" class="btn btn-dark-outline w-100">
              <svg class="svg-resize-20 flex-shrink-0">
                <use xlink:href="{{ asset('/front/svg/sprite.svg#arrow-circle') }}" />
              </svg>
              {{ __('frontstaticword.SeeAllArticles') }}
            </a>
          </div>
        </div>
      </div>
    </section>
  @endif
  {{-- /Blog Carousel --}}


  {{-- LearningPath --}}
  <section class="block-sec">
    <div class="container">
      <div class="boxpath__bg px-5 rounded-50" style="background-image: url('front/img/slidersection.png');">
        <p class="sec-title mb-0 block-sec pb-5">
          <span class="text-accent-2">مسار</span>
          حفظ القرآن الكريم
        </p>
      </div>
      <section class="px-5">
        <div class="row boxpath__items position-relative justify-content-center">
          @php
            $items = ['حفظ', 'تصحيح تلاوة', 'إجازات', 'قراءات', 'تجويد'];
          @endphp
          @foreach ($items as $item)
            <div class="col-6 col-sm-4 col-lg p-3">
              <div class="boxpath bg-white text-center">
                <div class="boxpath__number mb-4"></div>
                <p class="title">
                  {{ $item }}
                </p>
              </div>
            </div>
          @endforeach
        </div>
      </section>
    </div>
  </section>
  {{-- /LearningPath --}}

@endsection
