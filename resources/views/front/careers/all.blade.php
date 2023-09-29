@extends('front.layouts.master')

@section('title')
  {{ __('frontstaticword.Careers') }}
@endsection

@section('custom-css')
@endsection

@section('content')
  @include('front.layouts.page_header', ['title' => __('frontstaticword.Careers')])
  <section class="block-sec">
    <div class="container">
      <section class="row">
        <div class="col-12 mb-5">
          <form action="">
            <div class="form-group">
              <div class="form-group-icon">
                <input type="search" name="SearchCareer" id="SearchCareer" value="" class="form-control"
                  placeholder="{{ __('frontstaticword.SearchCareer') }}" required autofocus>
                <svg class="svg-default form-control-icon">
                  <use xlink:href="{{ asset('/front/svg/sprite.svg#search') }}" />
                </svg>
              </div>
            </div>
          </form>
        </div>
        <div class="col-12">
          @foreach ($careerJobs as $careerJob)
            <section class="job-card mb-4">
              <h3 class="fs-20">{{$careerJob->title}}</h3>
              <p class="mt-4">
                {!! $careerJob->description !!}
              </p>
              <div class="d-flex align-items-center gap-3 mt-4">
                <div class="d-flex align-items-center gap-2">
                  @foreach(explode(',',$careerJob->tags) as $tag)
                    <span class="tag tag-accent-light">{{$tag}}</span>
                    @endforeach
                  {{-- <span class="tag tag-accent-light">full-time</span>
                  <span class="tag tag-accent-light">part-time</span> --}}
                </div>
                <a href="{{ route('career.job.show',$careerJob->id) }}" class="d-flex align-items-center gap-2 text-accent fw-bold ms-auto">
                  {{ __('frontstaticword.Detail') }}
                  <svg class="svg-resize-24 svg-stroke-accent">
                    <use xlink:href="{{ asset('/front/svg/sprite.svg#arrow-left') }}" />
                  </svg>
                </a>
              </div>
            </section>
          @endforeach
        </div>
      </section>
    </div>
  </section>
@endsection
