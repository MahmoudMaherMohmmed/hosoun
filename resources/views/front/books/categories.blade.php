@extends('front.layouts.master')
@section('css')
@endsection
@section('title')
  {{ __('frontstaticword.BooksCategories') }}
@endsection

@section('content')
  @include('front.layouts.page_header', ['title' => __('frontstaticword.BooksCategories')])
  @if ($book_categories->isNotEmpty())
    <section class="block-sec books-page">
      <div class="container">
        <div class="row">
          @foreach ($book_categories as $book_category)
            <div class="col-sm-6 col-lg-3 pb-4 pb-lg-0">
              <a href="{{ route('browse.book.category.subcategories', $book_category->id) }}"
                class="books-item text-center d-flex flex-column align-items-center justify-content-start">
                <img src="{{ url('/images/book_categories/', $book_category->image) }}" class="books-thumbnail"
                  alt="{{ $book_category->title }}">
                <span class="fs-1 fw-bold">{{ $book_category->title }}</span>
                <span class=""> {{ $book_category->description }} </span>
              </a>
            </div>
          @endforeach
        </div>
      </div>
    </section>
  @else
    <section class="block-sec page-content">
      <div class="container">
        <div class="content-wrapper border">
          <div class="row">
            <div class="col">{{ __('frontstaticword.NoBooksCategories') }}</div>
          </div>
        </div>
      </div>
    </section>
  @endif
@endsection
