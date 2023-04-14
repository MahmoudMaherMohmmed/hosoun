@extends('front.layouts.master')
@section('css')
@endsection
@section('title')
  {{ __('frontstaticword.Terms&Condition') }}
@endsection

@section('content')
  @include('front.layouts.page_header', ['title' => __('frontstaticword.Terms&Condition')])
  <section class="block-sec page-content">
    <div class="container">
      <div class="content-wrapper border">
        <div class="row">
          <div class="col">
              @php $term = App\Terms::first(); @endphp             
              @if(isset($term)&&$term!=null)
                {!! $term->terms !!}
              @endif
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
