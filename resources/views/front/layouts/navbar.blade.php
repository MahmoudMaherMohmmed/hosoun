<nav class="navbar flex-column navbar-expand-xl bg-white p-0">
  <div class="w-100 border-bottom mt-sm-5 mb-xl-5 py-4 pb-sm-0 pb-sm-5">
    <div class="container">
      <div class="d-flex align-items-center ms-auto">

        <a class="navbar-brand logo" href="{{ url('/') }}">
          <img src="{{ asset('/front/img/logo.png') }}" alt="website-logo">
        </a>

        <div class="collapse navbar-collapse ms-5" id="navbarCollapse">
          @include('front.partials.search', ['search_placeholder' => 'ابحث عن الدورة'])
        </div>
        <div class="d-flex align-items-center ms-auto ms-xl-5">
          @include('front.layouts.navbar.lang')

          {{-- Login/Register buttons --}}
          @guest
          <a href="{{ route('login') }}" class="d-inline-block d-sm-none">
            <svg class="svg-resize-32 svg-stroke-accent">
              <use xlink:href="{{ asset('/front/svg/sprite.svg#profile-circle') }}" />
            </svg>
          </a>
          <a href="{{ route('register') }}" class="btn btn-accent ms-4 d-none d-sm-inline-flex">{{ __('frontstaticword.SignupFree') }}</a>
          <a href="{{ route('login') }}" class="text-accent text-nowrap ms-4 d-none d-sm-inline-flex">{{ __('frontstaticword.Login') }}</a>
          @endguest

          @auth
            <a href="{{ route('cart.show') }}" id="cart" class="btn nav-btn ms-2 ms-sm-4 position-relative">
              <svg class="svg-default">
                <use xlink:href="{{ asset('/front/svg/sprite.svg#bag') }}" />
              </svg>
              <span class="notification">{{App\Cart::where('user_id', Auth::User()->id)->count()}}</span>
            </a>
            <a href="{{ route('wishlist.show') }}" class="btn nav-btn ms-2 ms-sm-4">
              <svg class="svg-default">
                <use xlink:href="{{ asset('/front/svg/sprite.svg#heart') }}" />
              </svg>
            </a>
            @include('front.layouts.navbar.notifications')
            @include('front.layouts.navbar.user_dropdown')
          @endauth
        </div>

        <button class="btn d-xl-none" style="min-width: 0" type="button" data-bs-toggle="offcanvas"
          data-bs-target="#sidebar" aria-controls="sidebar">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </div>
  </div>
  <div class="w-100 mb-5 d-none d-xl-block">
    <div class="container position-relative">
      @include('front.layouts.navbar.nav')
      <a href="{{ Auth::User()!=null ? route('mycourse.show') : route('login') }}" id="mycourses" class="btn btn-accent-light">
        <svg class="svg-default"> 
          <use xlink:href="{{ asset('/front/svg/sprite.svg#book-square') }}" />
        </svg>
        {{ __('frontstaticword.MyCourses') }}
      </a>
    </div>
  </div>
</nav>

@include('front.layouts.sidebar')
