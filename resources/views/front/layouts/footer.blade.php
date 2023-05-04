<footer class="position-relative">
  <div class="container">
    <div class="row pt-5">
      <div class="col-lg-5">
        <img class="img-fluid img-h300 img-xl-hauto" src="{{ asset('front/svg/footer.svg') }}" alt="">
      </div>
      <div class="col-lg-1"></div>
      @php $widgets = App\WidgetSetting::first(); @endphp
      @if (isset($widgets))
        <div class="col-sm-6 col-lg-3 mt-5 mb-sm-5 mb-lg-0">
          <h6 class="footer-links-title">{{ $widgets->widget_two }}</h6>
          <ul class="footerbg__links list-unstyled mb-0 font-16 font-w500">
            <li>
              <a href="{{ url('/user_contact') }}" class="footer-link">
                {{ __('frontstaticword.Contactus') }}
              </a>
            </li>
            <li>
              <a href="{{ url('/terms_condition') }}" class="footer-link">
                {{ __('frontstaticword.Terms&Condition') }}
              </a>
            </li>
            <li>
              <a href="{{ url('/privacy_policy') }}" class="footer-link">
                {{ __('adminstaticword.PrivacyPolicy') }}
              </a>
            </li>
            <li>
              <a href="{{ route('help.show') }}" class="footer-link">
                {{ __('frontstaticword.Help&Support') }}
              </a>
            </li>
            @if ($gsetting->instructor_enable == 1)
              @if (Auth::check())
                @if (Auth::User()->role == 'user')
                  <li>
                    <a href="{{ route('beinstructor.show') }}" class="footer-link">
                      {{ __('frontstaticword.BecomeAnInstructor') }}
                    </a>
                  </li>
                @endif
              @else
                <li>
                  <a href="{{ route('login') }}" class="footer-link"
                    title="{{ __('frontstaticword.BecomeAnInstructor') }}">
                    {{ __('frontstaticword.BecomeAnInstructor') }}
                  </a>
                </li>
              @endif
            @endif
          </ul>
        </div>
      @endif
      <div class="col-sm-6 col-lg-3 my-5 mb-lg-0">
        <h6 class="footer-links-title">
          تواصل معنا
        </h6>
        <p class="fw-medium mb-3">
          تواصل هاتفيا
        </p>
        <a class="d-inline-block text-accent-2 fs-20 fw-bold mb-3" href="tel:00201002653533">00201002653533</a>
        <p class="fw-medium mb-3">
          البريد الإلكتروني
        </p>
        <a class="d-inline-block text-accent-2 fs-20 fw-bold mb-3" href="mailto:info@huson.com">info@huson.com</a>
        <p class="fw-medium mb-3">
          العنوان
        </p>
        <p class="text-accent-2 fs-20 fw-bold mb-3">
          القاهرة - المعادي
        </p>
      </div>
    </div>
  </div>

  {{-- BottomFooter --}}
  <div class="footerbottom position-relative d-flex align-items-end justify-content-end flex-column">
    <div class="container">
      <div class="row align-items-end justify-content-between mb-4">
        <div class="col-12 col-lg-auto bg-dark-accent rounded-4">
          <div class="d-lg-flex align-items-center p-5 p-lg-0">
            @php
              $social_links = App\SocialLink::where('status', 1)
                  ->latest()
                  ->get();
            @endphp
            @if ($social_links->isNotEmpty())
              <h4 class="text-white text-center mb-4 mb-lg-0 me-lg-5">
                {{ __('frontstaticword.FollowSocials') }}
              </h4>
              <nav
                class="sharesocial d-flex flex-wrap align-itemse-center justify-content-center ml-lg-4 justify-content-center">
                @foreach ($social_links as $social_link)
                  <a href="{{ $social_link->link }}" class="social-link">
                    <i class="fab {{ $social_link->icon }}"></i>
                  </a>
                @endforeach
              </nav>
            @endif
          </div>
        </div>
        <div class="col-12 col-lg-auto p-5 p-lg-0 pb-lg-3 bg-accent rounded-4 mt-3 mt-lg-0">
          <div class="border-bottom pb-4 mb-4">
            <div class="d-flex align-items-center justify-content-between">
              <p class="mb-0 line-13 text-white">
                {{ __('frontstaticword.AcceptedPayment') }}
              </p>
              <div class="d-flex align-items-center">
                <img src="{{ asset('front/img/payment/mastercard.png') }}" class="payment-img me-3"
                  alt="mastercard-payment">
                <img src="{{ asset('front/img/payment/visa.png') }}" class="payment-img" style="height: 2rem"
                  alt="visa-payment">
              </div>
            </div>
          </div>
          <p class="text-end text-white-70 mt-2">
            {{ __('frontstaticword.Copyright') }} @
            <span id="current-year"></span>
          </p>
        </div>
      </div>
    </div>
  </div>
</footer>

@section('custom-js')
  <script>
    $("#current-year").text(new Date().getFullYear());
  </script>
@endsection
