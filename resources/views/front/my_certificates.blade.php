@extends('front.layouts.master')
@section('css')
@endsection
@section('title')
  {{ __('frontstaticword.MyCertificates') }}
@endsection

@section('content')
  @include('front.layouts.page_header', ['title' => __('frontstaticword.MyCertificates')])
  <section class="block-sec">
    <div class="container">
      <div class="row">
        @if ($certificates->isNotEmpty())
          @foreach ($certificates as $certificate)
            <div class="col-12 col-sm-6 col-lg-4 mb-4">

                @include('front.partials.my_certificates_card', ['certificate' => $certificate])
            </div>
          @endforeach
        @else
          {{-- Empty Status --}}
          <div class="col-12">
            <div class="main-block text-center d-flex flex-column align-items-center justify-content-center">
              <svg class="svg-resize-32 svg-stroke-accent mb-4">
                <use xlink:href="{{ asset('/front/svg/sprite.svg#book-square') }}" />
              </svg>
              {{ __('frontstaticword.WhenCertificates') }}
            </div>
          </div>
        @endif
      </div>
    </div>
  </section>
@endsection
