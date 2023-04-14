<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  @include('layouts.meta')
  @include('layouts.styles')
</head>

<body>

  {{-- Auth Header --}}
  <header class="auth-header">
    <div class="container">
      <section class="row align-items-center">
        {{-- Back to main --}}
        <div class="col d-none d-sm-block">
          <a href="" class="fw-bold d-flex align-items-center">
            <svg class="svg-resize-20 svg-stroke-black -rotate-90 me-3">
              <use xlink:href="{{ asset('/front/svg/sprite.svg#chevron') }}" />
            </svg>
            العودة الى الرئيسية
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

  @include('layouts.auth.bottombar')

  <!-- main-content closed -->
  @include('layouts.footer')
  @include('layouts.scripts')
  @yield('js')
</body>

</html>
