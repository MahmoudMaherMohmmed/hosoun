@extends('front.layouts.master')
@section('css')
@endsection
@section('title')
  {{ __('frontstaticword.Instructors') }}
@endsection

@section('content')
  @include('front.layouts.page_header', ['title' => __('frontstaticword.Instructors') ])
    @if ($instructors->isNotEmpty())
        <section class="block-sec">
            <div class="container">
                <div class="row"> 
                    @foreach ($instructors as $instructor)
                        @php
                        $fullname = isset($instructor->fname) . ' ' . isset($instructor->lname);
                        $fullname = preg_replace('/\s+/', '', $fullname);
                        @endphp
                        <section class="instructor-item gap-4 gap-lg-5 text-center d-flex flex-column align-items-center justify-content-start col-3">
                            <div class="teachers__bg position-relative">
                                @if ($instructor->user_img != null || $instructor->user_img != '')
                                <img src="{{ asset('images/user_img/' . $instructor->user_img) }}"
                                    alt="{{ $instructor->fname }} {{ $instructor->lname }}">
                                @else
                                <img src="{{ asset('images/default/instructor.png') }}"
                                    alt="{{ $instructor->fname }} {{ $instructor->lname }}">
                                @endif
                            </div>
                            <span class="name fw-bold">
                                <a href="{{ route('instructor.profile', ['id' => $instructor->id, 'name' => $fullname]) }}"
                                title="{{ $instructor->fname }} {{ $instructor->lname }}">
                                {{ $instructor->fname }} {{ $instructor->lname }}
                                </a>
                            </span>
                            <div class="title text-accent fw-medium">
                                @if ($instructor->detail != null)
                                    {!! $instructor->detail !!}
                                @else
                                    {{ __('frontstaticword.Instructor') }}
                                @endif
                            </div>
                        </section>
                    @endforeach
                </div>
            </div>
        </section>
    @else
        <section class="block-sec page-content">
            <div class="container">
                <div class="content-wrapper border">
                    <div class="row">
                        <div class="col">{{ __('frontstaticword.NoInstructors') }}</div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection
