@extends('front.layouts.master')
@section('css')
@endsection
@section('title')
  {{ __('frontstaticword.Help&Support') }}
@endsection

@section('content')
  <section class="page_header" style="min-height: 30rem">
    <div class="container">
      <div class="d-flex flex-column align-content-center justify-content-center text-center">
        <h1 class="title">
          {{ __('frontstaticword.Help&Support') }} 
        </h1>
        @include('front.partials.search', ['search_placeholder' => 'البحث ...'])
      </div>
    </div>
  </section>


  <section class="block-sec page-content">
    <div class="container">
      <div class="row mb-5">
        <div class="col-12">
          <ul class="nav nav-pills justify-content-center nav-tabs border-bottom-0" id="supportTabs" role="tablist">
            <li class="nav-item mx-1" role="presentation">
              <button class="nav-link active" id="trainee-tab" data-bs-toggle="tab" data-bs-target="#trainee"
                type="button" role="tab" aria-controls="trainee" aria-selected="false">{{ __('frontstaticword.Students') }}</button>
            </li>
            <li class="nav-item mx-1" role="presentation">
              <button class="nav-link" id="trainer-tab" data-bs-toggle="tab" data-bs-target="#trainer" type="button"
                role="tab" aria-controls="trainer" aria-selected="false">{{ __('frontstaticword.Instructor') }}</button>
            </li>
          </ul>
        </div>
      </div>
      <div class="row">
        <div class="col-12 mb-5 mt-3">
          <h3 class="title-25">{{ __('frontstaticword.faq') }}</h3>
        </div>
        <div class="col-md-6">
          <div class="tab-content">
            {{-- Trainee Tab --}}
            <div class="tab-pane fade show active" id="trainee" role="tabpanel" aria-labelledby="trainee-tab"
              tabindex="0">
              @php $faqs = App\FaqStudent::where('status', 1)->latest()->get(); @endphp
              @foreach($faqs as $faq)
                <div class="main-block support-collapse" data-bs-toggle="collapse" data-bs-target="#qa_trainee_{{ $faq->id }}"
                  aria-expanded="false" aria-controls="qa_trainee_{{ $faq->id }}">
                  <button class="btn text-start text-black w-100 justify-content-between p-5">
                    {{ $faq->title }}
                    <svg class="svg-resize-15 svg-stroke-black ms-5">
                      <use xlink:href="{{ asset('/front/svg/sprite.svg#chevron') }}" />
                    </svg>
                  </button>
                  <div class="collapse p-5" id="qa_trainee_{{ $faq->id }}">{!! $faq->details !!}</div>
                </div>
              @endforeach
            </div>
            {{-- Trainer Tab --}}
            <div class="tab-pane fade" id="trainer" role="tabpanel" aria-labelledby="trainer-tab" tabindex="0">
            @php $faqs_instructor = App\FaqInstructor::where('status', 1)->latest()->get(); @endphp
              @foreach($faqs_instructor as $faq)
                <div class="main-block support-collapse" data-bs-toggle="collapse" data-bs-target="#qa_trainer_{{ $faq->id }}"
                  aria-expanded="false" aria-controls="qa_trainer_{{ $faq->id }}">
                  <button class="btn text-start text-black w-100 justify-content-between p-5">
                    {{ $faq->title }}
                    <svg class="svg-resize-15 svg-stroke-black ms-5">
                      <use xlink:href="{{ asset('/front/svg/sprite.svg#chevron') }}" />
                    </svg>
                  </button>
                  <div class="collapse p-5" id="qa_trainer_{{ $faq->id }}"> {!! $faq->details !!} </div>
                </div>
              @endforeach
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <a href="{{ route('purchase.show') }}" class="support-item main-block d-flex align-items-center">
            <div class="d-flex align-items-center me-5">
              <figure class="mb-0 me-4">
                <svg class="svg-resize-32 svg-fill-white">
                  <use xlink:href="{{ asset('/front/svg/sprite.svg#receipt-2') }}" />
                </svg>
              </figure>
              <div class="d-flex flex-column">
                <span class="fw-bold mb-3">{{ __('frontstaticword.PurchaseHistory') }}</span>
                <span class="text-dim fs-14">{{ __('frontstaticword.PurchaseHistoryDescription') }}</span>
              </div>
            </div>
            <svg class="svg-resize-15 ms-auto chevron">
              <use xlink:href="{{ asset('/front/svg/sprite.svg#chevron') }}" />
            </svg>
          </a>
          <a href="{{ Auth::check() ? route('profile.show', Auth::User()->id) : route('login') }}" class="support-item main-block d-flex align-items-center">
            <div class="d-flex align-items-center me-5">
              <figure class="mb-0 me-4">
                <svg class="svg-resize-32 svg-fill-white">
                  <use xlink:href="{{ asset('/front/svg/sprite.svg#profile-circle-2') }}" />
                </svg>
              </figure>
              <div class="d-flex flex-column">
                <span class="fw-bold mb-3">{{ __('frontstaticword.UserProfile') }}</span>
                <span class="text-dim fs-14">{{ __('frontstaticword.UserProfileDescription') }}</span>
              </div>
            </div>
            <svg class="svg-resize-15 ms-auto chevron">
              <use xlink:href="{{ asset('/front/svg/sprite.svg#chevron') }}" />
            </svg>
          </a>
          <a href="{{ url('user_contact') }}" class="support-item main-block d-flex align-items-center">
            <div class="d-flex align-items-center me-5">
              <figure class="mb-0 me-4">
                <svg class="svg-resize-32 svg-fill-white">
                  <use xlink:href="{{ asset('/front/svg/sprite.svg#message-2') }}" />
                </svg>
              </figure>
              <div class="d-flex flex-column">
                <span class="fw-bold mb-3">{{ __('frontstaticword.Contactus') }}</span>
                <span class="text-dim fs-14">{{ __('frontstaticword.ContactusDescription') }}</span>
              </div>
            </div>
            <svg class="svg-resize-15 ms-auto chevron">
              <use xlink:href="{{ asset('/front/svg/sprite.svg#chevron') }}" />
            </svg>
          </a>
        </div>
      </div>
    </div>
  </section>
@endsection
