@extends('front.layouts.master')
@section('css')
@endsection
@section('title')
    {{ $page->title }}
@endsection

@section('content')
  @include('front.layouts.page_header', ['title' => $page->title])
  <section class="block-sec page-content">
    <div class="container">
      <div class="content-wrapper border">
        <div class="row">
          <div class="col">{!! $page->details !!}</div>
        </div>
      </div>
    </div>
  </section>
@endsection
