@extends('front.layouts.master')
@section('css')
@endsection
@section('title')
  {{ __('frontstaticword.Aboutus') }} 
@endsection

@section('content')
  @include('front.layouts.page_header', ['title' => __('frontstaticword.Aboutus')])
  <section class="block-sec page-content">
    <div class="container">
        <!-- about-home start -->
        @if($about['one_enable'] == 1)
        <div class="row">
          <div class="col-12 col-md my-5">
              @if($about->one_heading!=null)
              <h3 class="mb-5" style="font-size: 4rem">{{ $about->one_heading }}</h3>
              @endif
              @if($about->one_text!=null)
              <p>{{ $about->one_text }}</p>
              @endif
          </div>
            @if($about->one_image!=null)
              <div class="col-12 col-md my-5">
                <img src="{{ asset('images/about/'.$about->one_image) }}" alt="">
              </div>
            @endif
        </div>
        @endif

        @if($about['five_enable'] == 1)
          <div class="row">
            @if($about->five_imageone!=null)
              <div class="col-12 col-md my-5">
                <img src="{{ asset('images/about/'.$about->five_imageone) }}" alt="">
              </div>
            @endif
            <div class="col-12 col-md my-5">
              @if($about->five_heading!=null)
                <h3 class="mb-5" style="font-size: 4rem">{{ $about->five_heading }}</h3>
              @endif
              @if($about->five_text!=null)
                <p>{{$about->five_text}}</p>
              @endif
            </div>
          </div>
        @endif
    </div>

  </section>
@endsection
