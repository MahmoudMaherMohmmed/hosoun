<footer class="bg-accent text-white">
  <div class="container">
    {{-- Footer Content --}}
    <section class="row">
      @php $settings = App\Setting::first(); @endphp
      <div class="col-12 col-md-auto footer-brand mb-5 pb-5 mb-md-0 pb-md-0">
        @if ($settings->logo_type == 'L')
          @if ($settings->footer_logo != null)
            <a href="{{ url('/') }}" title="{{ $settings->project_title }}">
              <img src="{{ asset('images/logo/' . $settings->footer_logo) }}" alt="{{ $settings->project_title }}">
            </a>
          @endif
        @else
          <a href="{{ url('/') }}"><b>{{ $settings->project_title }}</b></a>
        @endif
        @if ($settings->project_description)
          <p>{{ $settings->project_description }}</p>
        @endif
        @php
          $social_links = App\SocialLink::where('status', 1)
              ->latest()
              ->get();
        @endphp
        @if ($social_links->isNotEmpty())
          <nav class="d-flex align-items-center">
            @foreach ($social_links as $social_link)
              <a href="{{ $social_link->link }}" class="social-link">
                <i class="fa-brands {{ $social_link->icon }}"></i>
              </a>
            @endforeach
          </nav>
        @endif
      </div>
      @php $widgets = App\WidgetSetting::first(); @endphp
      @if (isset($widgets))
        <div class="col col-md-auto">
          <h6 class="footer-links-title">{{ $widgets->widget_one }}</h6>
          <ul class="">
            <li><a href="{{ url('/') }}" class="footer-link">{{ __('frontstaticword.Home') }}</a></li>
            <li>
              <a href="{{ route('about.show') }}" class="footer-link">
                {{ __('frontstaticword.Aboutus') }}
              </a>
            </li>
            <li><a href="{{ route('blog.all') }}" class="footer-link">{{ __('frontstaticword.Blog') }}</a></li>
          </ul>
        </div>
        <div class="col col-md-auto">
          <h6 class="footer-links-title">{{ $widgets->widget_two }}</h6>
          <ul class="">
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
        @php $pages = App\Page::where('status', 1)->get(); @endphp
        @if ($pages->isNotEmpty())
          <div class="col col-md-auto">
            <h6 class="footer-links-title">{{ $widgets->widget_three }}</h6>
            <ul class="">
              @foreach ($pages as $page)
                <li><a href="{{ route('page.show', $page->slug) }}" class="footer-link"
                    title="{{ $page->title }}">{{ $page->title }}</a></li>
              @endforeach
            </ul>
          </div>
        @endif
      @endif
    </section>
    {{-- Copyrights --}}
    <section id="copyrights" class="text-white row mt-5">
      <div class="col-12 col-sm text-center text-sm-start mb-5 mb-sm-0">
        الحقوق محفوظة ©
        <span id="current-year"></span>
        {{ $settings->project_title }}
      </div>
      <div class="col-12 col-sm text-center d-flex align-items-center justify-content-center justify-content-sm-end">
        صنع بكل الحب في
        <a href="https://www.ibtdi.com/" target="_blank">
          <img src="{{ asset('front/img/ibtdi.svg') }}" id="ibtdi">
        </a>
      </div>
    </section>
  </div>
</footer>

@section('custom-js')
  <script>
    $("#current-year").text(new Date().getFullYear());
  </script>
@endsection
