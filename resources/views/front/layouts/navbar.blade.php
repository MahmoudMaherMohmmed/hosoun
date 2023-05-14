<nav class="navbar navbar-expand-xl py-4">
  <div class="container flex-nowrap">
    <a class="navbar-brand logo p-0 m-0" href="{{ url('/') }}">
      <img src="{{ asset('/front/img/logo.svg') }}" alt="website-logo">
    </a>

    <ul class="navbar-nav d-none d-xl-flex justify-content-center mx-auto">
      @include('front.layouts.navbar.nav')
    </ul>

    <div class="d-flex align-items-center ms-auto ms-xl-5">
      <div class="d-none d-sm-block">
        @include('front.layouts.navbar.lang-switch')
      </div>


      {{-- Login/Register buttons --}}
      @guest
        <a href="{{ route('register') }}" class="btn btn-accent ms-3 d-none d-xl-inline-flex">
          {{ __('frontstaticword.SignupFree') }}
        </a>
        <a href="{{ route('login') }}" class="text-accent text-nowrap ms-4 d-none d-xl-inline-flex">
          {{ __('frontstaticword.Login') }}
        </a>
        <a href="{{ route('login') }}" class="d-xl-none btn bg-accent nav-btn ms-3">
          <svg class="svg-resize-24 svg-fill-white">
            <use xlink:href="{{ asset('/front/svg/sprite.svg#user') }}" />
          </svg>
        </a>
      @endguest

      @auth
        @include('front.layouts.navbar.user')
        <a href="{{ route('wishlist.show') }}" class="btn btn-accent2 nav-btn ms-3" title="Go to wishlist page">
          <svg class="svg-resize-24 svg-fill-white">
            <use xlink:href="{{ asset('/front/svg/sprite.svg#heart-fill') }}" />
          </svg>
        </a>
        <a href="{{ route('cart.show') }}" id="cart" class="btn btn-dark nav-btn ms-3 position-relative">
          <svg class="svg-resize-24 svg-fill-white">
            <use xlink:href="{{ asset('/front/svg/sprite.svg#cart') }}" />
          </svg>
          <span class="notification">{{ App\Cart::where('user_id', Auth::User()->id)->count() }}</span>
        </a>
        {{-- @include('front.layouts.navbar.notifications') --}}
      @endauth
    </div>

    <button class="d-xl-none border-0 p-0 rounded-0 bg-light ms-3" type="button" style="width: 4rem; height: 4rem"
      data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="sidebar">
      <i class="fas fa-bars fs-20 text-accent"></i>
    </button>
  </div>
</nav>

@include('front.layouts.sidebar')
