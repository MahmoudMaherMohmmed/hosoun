@extends('front.layouts.master')

@section('title')
  {{ isset($book_child_category) && $book_child_category!=null ? $book_child_category->title : __('frontstaticword.SearchBook') }}
@endsection

@section('custom-css')
@endsection

@section('content')
  @include('front.layouts.page_header', ['title' => isset($book_child_category) && $book_child_category!=null ? $book_child_category->title : __('frontstaticword.SearchBook')])
  <section class="block-sec">
    <div class="container">
      <section class="row">
        <div class="col-12 mb-5">
          <form method="GET" action="{{ route('book.search') }}">
            <div class="form-group">
              <div class="form-group-icon"> 
                <input type="search" name="searchTerm" class="form-control"
                  placeholder="{{ __('frontstaticword.SearchBook') }}" required autofocus>
                <svg class="svg-default form-control-icon">
                  <use xlink:href="{{ asset('/front/svg/sprite.svg#search') }}" />
                </svg>
              </div>
            </div>
          </form>
        </div>
        @foreach ($books as $book)
          <div class="col-6 col-md-4 col-lg-3 p-4">
            <section class="book-card">
              <img src="{{ url('/images/books/', $book->image) }}" alt="book-cover"
                class="rounded-40 w-100 img-fluid object-fit-cover">
              <section class="">
                <section class="d-flex flex-column gap-2 text-center py-5 px-4">
                  <span class="fw-bold">{{ $book->title }}</span>
                  <span class="text-dim fs-14">{{ $book->description }}</span>
                </section>
                <section class="d-flex align-items-center gap-3">
                  <a href="{{ route('book.pdf', $book->id) }}" class="btn btn-accent-light w-100" target="_blank">
                    <svg class="svg-default form-control-icon">
                      <use xlink:href="{{ asset('/front/svg/sprite.svg#book-square') }}" />
                    </svg>
                    {{ __('frontstaticword.View') }}
                  </a>
                </section>
              </section>
            </section>
          </div>
        @endforeach
      </section>
    </div>
  </section>
@endsection
