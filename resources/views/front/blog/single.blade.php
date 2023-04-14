@extends('front.layouts.master')
@section('css')
@endsection
@section('title')
  {{ $blog->heading }}
@endsection

@section('content')
  @include('front.layouts.page_header', ['title' => $blog->heading])
  <section class="block-sec blog-content">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <img src="{{ asset('images/blog/'.$blog->image) }}" class="img-fluid mb-5" alt="">
          <div class="d-flex align-items-center text-accent mb-5">
            {{$blog->created_at!=null ? $blog->created_at->format('M d Y') : ''}} {{$blog->user!=null ? '/' : ''}} {{$blog->user!=null ? $blog->user->fname .' '.$blog->user->lname : '/'}}
          </div>

          <h2 class="blog-title">{{ $blog->heading }}</h2>

          <p class="mb-5"> {!! $blog->detail !!} </p>
        </div>
      </div>
    </div>
  </section>
@endsection
