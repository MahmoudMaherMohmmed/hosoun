@extends('front.layouts.master')

@section('title')
  {{ __('frontstaticword.Careers') }}
@endsection

@section('custom-css')
@endsection

@section('content')
  @include('front.layouts.page_header', ['title' => __('frontstaticword.Careers')])
  <section class="block-sec">
    <div class="container">
      <section class="row">
        <div class="col-12 mb-5">
          <section class="bg-accent-2-light p-5 rounded-4">
            <h3 class="fs-20">عنوان الوظيفة المطلوب فيها التقديم</h3>
            <div class="d-flex align-items-center gap-2 mt-4">
              <span class="tag tag-accent-light">full-time</span>
              <span class="tag tag-accent-light">part-time</span>
            </div>
            <p class="mt-4">
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquam, ex obcaecati et quisquam
              quasi esse quae
              non fugit ipsam quod asperiores consectetur quis dolorum provident veniam maxime? Itaque sit velit soluta
              ipsam voluptate! Optio aliquam voluptatum impedit ipsa expedita quasi unde suscipit mollitia veritatis
              doloremque officia, perspiciatis atque perferendis consequuntur.....
            </p>
          </section>
          <section class="mt-5">
            <h4 class="job-desc-title">المسئوليات</h4>
            <ul class="d-flex flex-column gap-3">
              @for ($i = 0; $i < 3; $i++)
                <li class="job-desc-list-item">Lorem, ipsum dolor sit amet consectetur adipisicing elit. </li>
              @endfor
            </ul>
          </section>
          <section class="mt-5">
            <h4 class="job-desc-title">المتطلبات</h4>
            <ul class="d-flex flex-column gap-3">
              @for ($i = 0; $i < 3; $i++)
                <li class="job-desc-list-item">Lorem, ipsum dolor sit amet consectetur adipisicing elit. </li>
              @endfor
            </ul>
          </section>
          <section class="mt-5">
            <h4 class="job-desc-title">للتقديم على الوظيفة</h4>
            <a href="mailto:admin@admin.com" class="text-accent">
              admin@admin.com
            </a>
          </section>
        </div>
      </section>
    </div>
  </section>
@endsection
