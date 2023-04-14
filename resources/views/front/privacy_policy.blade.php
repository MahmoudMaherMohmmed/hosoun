@extends('front.layouts.master')
@section('css')
@endsection
@section('title')
  {{ __('adminstaticword.PrivacyPolicy') }}
@endsection

@section('content')
  @include('front.layouts.page_header', ['title' => __('adminstaticword.PrivacyPolicy') ])
  <section class="block-sec page-content">
    <div class="container">
      <div class="content-wrapper border">
        <div class="row">
          <div class="col">
            @php $policy = App\Terms::first(); @endphp              
            @if(isset($policy)&&$policy!=null)
              {!! $policy->policy !!}
            @endif
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
