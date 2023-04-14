@extends('front.layouts.master')
@section('css')
@endsection
@section('title')
  {{ __('frontstaticword.MyCourses') }}
@endsection

@section('content')
  @include('front.layouts.page_header', ['title' => __('frontstaticword.MyCourses')])
  <section class="block-sec">
    <div class="container">
      <div class="row">
        @if ($user_orders->isNotEmpty())
          @foreach ($user_orders as $order)
            <div class="col-12 col-sm-6 col-lg-4 mb-4">
              @if ($order->course_id != null)
                @include('front.course.layout.my_courses_card', ['course' => $order->courses])
              @else
                @include('front.course.layout.my_courses_card', ['course' => $order->bundle->courses])
              @endif
            </div>
          @endforeach
        @else
          {{-- Empty Status --}}
          <div class="col-12">
            <div class="main-block text-center d-flex flex-column align-items-center justify-content-center">
              <svg class="svg-resize-32 svg-stroke-accent mb-4">
                <use xlink:href="{{ asset('/front/svg/sprite.svg#book-square') }}" />
              </svg>
              {{ __('frontstaticword.WhenSubscribe') }}
            </div>
          </div>
        @endif
      </div>
    </div>
  </section>
@endsection
