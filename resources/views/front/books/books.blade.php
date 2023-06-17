@extends('front.layouts.master')
@section('title')
  الصف الاول الإبتدائي
@endsection

@section('custom-css')
@endsection

@section('content')
  @include('front.layouts.page_header', [
      'title' => 'الصف الاول الإبتدائي',
  ])

  <section class="block-sec">
    <div class="container">
      <section class="row">
        @for ($i = 0; $i < 8; $i++)
          <div class="col-sm-6 col-lg-4 col-xl-3 p-4">
            <section class="book-card">
              <img src="{{ asset('/front/img/img-4.jpg') }}" alt="book-cover"
                class="rounded-40 w-100 img-fluid object-fit-cover">
              <section class="">
                <section class="d-flex flex-column gap-2 text-center py-5 px-4">
                  <span class="fw-bold">اسم الكتاب</span>
                  <span class="text-dim fs-14">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nisi,
                    voluptatem?</span>
                </section>
                <section class="d-flex align-items-center gap-3">
                  <a href="" download class="btn btn-accent-light w-100">تحميل</a>
                  <a href="" class="btn btn-accent-light w-100">تصفح</a>
                </section>
              </section>
            </section>
          </div>
        @endfor
      </section>
    </div>
  </section>
@endsection
