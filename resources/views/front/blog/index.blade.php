@extends('front.layouts.master')
@section('css')
@endsection
@section('title')
  {{ __('frontstaticword.Blog') }}
@endsection

@section('content')
  @include('front.layouts.page_header', ['title' => trans('frontstaticword.Blog')])
  <section class="block-sec">
    <div class="container">
      <div class="row">
        @foreach ($blogs as $blog)
          <div class="col-12 col-lg-6 mb-4">
            @include('front.blog.card')
          </div>
        @endforeach
      </div>
    </div>

  </section>
@endsection
