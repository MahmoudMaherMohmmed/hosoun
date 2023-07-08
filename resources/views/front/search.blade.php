@extends('front.layouts.master')

@section('css') @endsection

@section('title')
    {{ __('frontstaticword.Courses') }}
@endsection

@section('content')
  @include('front.layouts.page_header', ['title' => __('frontstaticword.Courses')])
  <section class="block-sec">
    <div class="container">
      <div class="row">
        @include('admin.message')

        @if(count($search_data) > 0)
          @foreach ($search_data as $course)
              <div class="col-12 col-sm-6 col-lg-4 mb-4">
                @include('front.course.layout.card', ['course' => $course])
              </div>
          @endforeach
        @else
        {{-- Empty Status --}}
          <div class="col-12">
            <div class="main-block text-center d-flex flex-column align-items-center justify-content-center">
              <svg class="svg-resize-32 svg-stroke-accent mb-4">
                <use xlink:href="{{ asset('/front/svg/sprite.svg#search') }}" />
              </svg>
              {{ __('frontstaticword.Nosearch') }} "{{$searchTerm}}"
            </div>
          </div>
        @endif
      </div>
    </div>
  </section>
@endsection
