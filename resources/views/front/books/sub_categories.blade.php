@extends('front.layouts.master')

@section('title') {{$book_category->title}} @endsection

@section('custom-css') @endsection

@section('content')
  @include('front.layouts.page_header', ['title' => $book_category->title])

  <section class="block-sec">
    <div class="container">
      <section class="row">
        <div class="col-md-6 p-3">
          <section class="books-collapse">
            <button class="books-head" type="button" data-bs-toggle="collapse" data-bs-target="#grade1" aria-expanded="false"
              aria-controls="grade1">
              <div class="d-flex flex-column align-items-start text-start gap-2">
                الصف الأول الإبتدائي
                <span class="text-accent-2 fw-normal fs-14">14 كتاب</span>
              </div>
              <i class="isax isax-arrow-left-25 text-accent"></i>
            </button>
            <div class="collapse " id="grade1">
              <div class="books-table border-top mx-5 py-5">
                <div class="table-responsive">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td class="fw-medium p-3">
                          <a href="{{ url('/books') }}" class="d-flex align-items-center gap-3">
                            النحو
                            <span class="ms-auto fs-14 fw-normal">10 كتب</span>
                          </a>
                        </td>
                      </tr>
                      <tr>
                        <td class="fw-medium p-3">
                          <a href="{{ url('/books') }}" class="d-flex align-items-center gap-3">
                            البلاغة
                            <span class="ms-auto fs-14 fw-normal">4 كتب</span>
                          </a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </section>
          <section class="books-collapse">
            <a href="{{ url('/books') }}" class="books-head">
              <div class="d-flex flex-column align-items-start text-start gap-2">
                الصف الثاني الإبتدائي
                <span class="text-accent-2 fw-normal fs-14">10 كتاب</span>
              </div>
              <i class="isax isax-arrow-left-25 text-accent"></i>
            </a>
          </section>
        </div>
        <div class="col-md-6 p-3">
          <section class="books-collapse">
            <a href="{{ url('/books') }}" class="books-head">
              <div class="d-flex flex-column align-items-start text-start gap-2">
                الصف الثاني الإبتدائي
                <span class="text-accent-2 fw-normal fs-14">10 كتاب</span>
              </div>
              <i class="isax isax-arrow-left-25 text-accent"></i>
            </a>
          </section>
          <section class="books-collapse">
            <button class="books-head" type="button" data-bs-toggle="collapse" data-bs-target="#grade2"
              aria-expanded="false" aria-controls="grade2">
              <div class="d-flex flex-column align-items-start text-start gap-2">
                الصف الأول الإبتدائي
                <span class="text-accent-2 fw-normal fs-14">14 كتاب</span>
              </div>
              <i class="isax isax-arrow-left-25 text-accent"></i>
            </button>
            <div class="collapse " id="grade2">
              <div class="books-table border-top mx-5 py-5">
                <div class="table-responsive">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td class="fw-medium p-3">
                          <a href="{{ url('/books') }}" class="d-flex align-items-center gap-3">
                            النحو
                            <span class="ms-auto fs-14 fw-normal">10 كتب</span>
                          </a>
                        </td>
                      </tr>
                      <tr>
                        <td class="fw-medium p-3">
                          <a href="{{ url('/books') }}" class="d-flex align-items-center gap-3">
                            البلاغة
                            <span class="ms-auto fs-14 fw-normal">4 كتب</span>
                          </a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </section>
        </div>
      </section>
    </div>
  </section>
@endsection
