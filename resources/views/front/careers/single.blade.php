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
          <section class="bg-accent-2-light p-5 rounded-4">
            <h3 class="fs-20">{{$careerJob->title}}</h3>
            <div class="d-flex align-items-center gap-2 mt-4">
              @foreach(explode(',',$careerJob->tags) as $tag)
              <span class="tag tag-accent-light">{{$tag}}</span>
              @endforeach
            </div>
            <p class="mt-4">
             {!! $careerJob->description !!}
            </p>
          </section>
          <section class="mt-5">
            <h4 class="job-desc-title">{{ __('adminstaticword.Responsibilities') }}</h4>
            <ul class="d-flex flex-column gap-3">
              @foreach(preg_split("/((\r?\n)|(\r\n?))/", $careerJob->responsibilities) as $line)
                <li class="job-desc-list-item">{{$line}}</li>
              @endforeach
              {{-- @for ($i = 0; $i < 3; $i++)
                <li class="job-desc-list-item">Lorem, ipsum dolor sit amet consectetur adipisicing elit. </li>
              @endfor --}}
            </ul>
          </section>
          <section class="mt-5">
            <h4 class="job-desc-title">المتطلبات</h4>
            <ul class="d-flex flex-column gap-3">
              @foreach(preg_split("/((\r?\n)|(\r\n?))/", $careerJob->requirements) as $line)
                <li class="job-desc-list-item">{{$line}}</li>
              @endforeach
            </ul>
          </section>
          <section class="mt-5">
            <h4 class="job-desc-title">للتقديم على الوظيفة</h4>
            {{$careerJob->apply_method}}
            {{-- <a href="mailto:admin@admin.com" class="text-accent">
              admin@admin.com
            </a> --}}
          </section>
        </div>
      </section>
    </div>
  </section>
@endsection
