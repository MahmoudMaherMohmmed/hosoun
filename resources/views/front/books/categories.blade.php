@extends('front.layouts.master')
@section('css')
@endsection
@section('title')
  {{ __('frontstaticword.BooksCategories') }}
@endsection

@section('content')
    @include('front.layouts.page_header', ['title' => __('frontstaticword.BooksCategories') ])
    @if ($book_categories->isNotEmpty())
        <section class="block-sec bg-dark-accent">
            <section class="books-carousel owl-carousel owl-theme">
                @foreach ($book_categories as $book_category)
                <section class="books-item text-center d-flex flex-column align-items-center justify-content-start">
                    <a href="{{ route('browse.book.category.subcategories', $book_category->id) }}">
                        <img src="{{ url('/images/book_categories/', $book_category->image) }}" class="books-thumbnail" alt="{{ $book_category->title }}">
                    <a>
                    <span class="fs-1 fw-bold text-white">{{ $book_category->title }}</span>
                    <span class="text-white-70"> {{ $book_category->description }} </span>
                </section>
                @endforeach
            </section>
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
