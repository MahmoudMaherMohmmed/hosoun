<!DOCTYPE html>
@if (in_array(Session::get('changed_language'), ['ar', 'he', 'ur', 'arc', 'az', 'dv', 'ku', 'fa']))
  <html lang="ar" dir="rtl">
@else
  <html lang="en" dir="ltr">
@endif

<head>
  @include('front.layouts.meta')
  @include('front.layouts.styles')
  @yield('custom-css')
</head>

<body class="position-relative overflow-x-hidden">
  @include('front.layouts.navbar')
  <main class="">
    @yield('page-header')

    @yield('content')
  </main>
  <!-- main-content closed -->
  @include('front.layouts.footer')
  @include('front.layouts.scripts')

  @yield('custom-js')
</body>

</html>
