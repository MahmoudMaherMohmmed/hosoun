<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  @include('front.layouts.meta')
  @include('front.layouts.styles')
  <style>
      /* Chrome, Safari, Edge, Opera */
      input::-webkit-outer-spin-button,
      input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
      }

      /* Firefox */
      input[type=number] {
        -moz-appearance: textfield;
      }
  </style>
</head>

<body>

  {{-- Auth Header --}}
  <header class="auth-header">
    <div class="container">
      <section class="row align-items-center">
        {{-- Back to main --}}
        <div class="col d-none d-sm-block">
          <a href="{{ url('/') }}" class="fw-bold d-flex align-items-center">
            <svg class="svg-resize-20 svg-stroke-black -rotate-90 me-3">
              <use xlink:href="{{ asset('/front/svg/sprite.svg#chevron') }}" />
            </svg>
            {{ __('frontstaticword.Backtohome') }}
          </a>
        </div>
        {{-- Website --}}
        <div class="col text-center">
          <a href="{{ url('/') }}" class="logo">
            <img src="{{ asset('/front/img/logo.png') }}" alt="website-logo">
          </a>
        </div>
        {{-- Redirect --}}
        <div class="col text-end d-none d-sm-block">
          @yield('auth-header-redirect')
        </div>
      </section>
    </div>
  </header>
  {{-- /Auth Header --}}

  <!-- container -->
  <main>
    @yield('content')
  </main>

  @include('auth.layouts.bottombar')

  <!-- main-content closed -->
  @include('front.layouts.footer')
  @include('front.layouts.scripts')
  @yield('js')
</body>

</html>
