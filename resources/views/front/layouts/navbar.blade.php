<nav class="navbar flex-column navbar-expand-xl p-0">
  <div class="w-100 py-4">
    <div class="container">
      <div class="d-flex align-items-center ms-auto py-2">

        <a class="navbar-brand logo p-0" href="{{ url('/') }}">
          <img src="{{ asset('/front/img/logo.svg') }}" alt="website-logo">
        </a>

        <ul class="navbar-nav d-none d-xl-flex justify-content-center mx-auto">
          @include('front.layouts.navbar.nav')
        </ul>

        <div class="d-flex align-items-center ms-auto ms-xl-5">
          {{-- Language Switcher Btn --}}
          @php $languages = App\Language::all(); @endphp
          @if (isset($languages) && count($languages) > 0)
            @foreach ($languages as $language)
              @if ($language->local != Session::get('changed_language'))
                <a href="{{ route('languageSwitch', $language->local) }}"
                  class="btn nav-btn lang flex-shrink-0 text-uppercase">
                  {{ $language->local }}
                </a>
              @endif
            @endforeach
          @endif


          {{-- Login/Register buttons --}}
          @guest
            <a href="{{ route('register') }}" class="btn btn-accent ms-3 d-none d-xl-inline-flex">
              {{ __('frontstaticword.SignupFree') }}
            </a>
            <a href="{{ route('login') }}" class="text-accent text-nowrap ms-4 d-none d-xl-inline-flex">
              {{ __('frontstaticword.Login') }}
            </a>
            <a href="{{ route('login') }}" class="d-inline-block d-xl-none btn nav-btn">
              <svg class="svg-resize-24 svg-fill-white">
                <use xlink:href="{{ asset('/front/svg/sprite.svg#user') }}" />
              </svg>
            </a>
          @endguest

          @auth
            @include('front.layouts.navbar.user')
            <a href="{{ route('wishlist.show') }}" class="btn btn-accent2 nav-btn ms-3">
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

        <button class="d-xl-none border-0 p-0 rounded-0 bg-light ms-3" type="button" data-bs-toggle="offcanvas"
          data-bs-target="#sidebar" aria-controls="sidebar">
          <i class="fas fa-bars fs-20 text-accent"></i>
        </button>
      </div>
    </div>
  </div>
</nav>

@include('front.layouts.sidebar')
