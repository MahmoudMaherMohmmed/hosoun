@extends('front.layouts.master')

@section('title') {{$book_category->title}} @endsection

@section('custom-css') @endsection

@section('content')
  @include('front.layouts.page_header', ['title' => $book_category->title])

  <section class="block-sec">
    <div class="container">
      <section class="row">
        @foreach($book_sub_categories as $book_sub_category)
        <div class="col-md-6 p-3">
          <section class="books-collapse">
            <button class="books-head" type="button" data-bs-toggle="collapse" data-bs-target="#grade1" aria-expanded="false"
              aria-controls="grade{{$book_sub_category->id}}">
              <div class="d-flex flex-column align-items-start text-start gap-2">
                {{$book_sub_category->title}}
                @php
                  $child_categories_ids = $book_sub_category->child_categories()->pluck('id') 
                @endphp
                <span class="text-accent-2 fw-normal fs-14">{{\App\Book::whereIN('book_child_category_id', $child_categories_ids)->count()}} {{ __('frontstaticword.Books') }}</span>
              </div>
              <i class="isax isax-arrow-left-25 text-accent"></i>
            </button>
            <div class="collapse " id="grade{{$book_sub_category->id}}">
              <div class="books-table border-top mx-5 py-5">
                <div class="table-responsive">
                  <table class="table">
                    <tbody>
                      @foreach($book_sub_category->child_categories as $child_category)
                      <tr>
                        <td class="fw-medium p-3">
                          <a href="{{ route('browse.child.category.books', $child_category->id) }}" class="d-flex align-items-center gap-3">
                            {{$child_category->title}}
                            <span class="ms-auto fs-14 fw-normal">{{$child_category->books->count()}} {{ __('frontstaticword.Books') }}</span>
                          </a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </section>
        </div>
        @endforeach
      </section>
    </div>
  </section>
@endsection
