@extends('front.layouts.master')

@section('title') {{$book_child_category->title}} @endsection

@section('custom-css')
@endsection

@section('content')
  @include('front.layouts.page_header', ['title' => $book_child_category->title])

  <section class="block-sec">
    <div class="container">
      <section class="row">
        @foreach ($books as $book)
          <div class="col-sm-6 col-lg-4 col-xl-3 p-4">
            <section class="book-card">
              <img src="{{ url('/images/books/', $book->image) }}" alt="book-cover"
                class="rounded-40 w-100 img-fluid object-fit-cover">
              <section class="">
                <section class="d-flex flex-column gap-2 text-center py-5 px-4">
                  <span class="fw-bold">{{$book->title}}</span>
                  <span class="text-dim fs-14">{{$book->description}}</span>
                </section>
                <section class="d-flex align-items-center gap-3">
                  <a href="" download class="btn btn-accent-light w-100">{{__('frontstaticword.Download')}}</a>
                  <a href="" class="btn btn-accent-light w-100">{{__('frontstaticword.View')}}</a>
                </section>
              </section>
            </section>
          </div>
        @endforeach
      </section>
    </div>
  </section>
@endsection
