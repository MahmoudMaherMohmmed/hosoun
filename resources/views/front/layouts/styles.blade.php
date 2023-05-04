<link href="{{ asset('front/css/owl.carousel.min.css') }}" rel="stylesheet">
<link href="{{ asset('front/css/owl.theme.default.min.css') }}" rel="stylesheet">
<link href="{{ asset('admin/bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
<link href="{{ asset('front/css/fontawesome.all.min.css') }}" rel="stylesheet">
<link href="{{ asset('front/css/intlTelInput.min.css') }}" rel="stylesheet">
<link href="{{ asset('front/css/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('front/css/star-rating-svg.css') }}" rel="stylesheet">

{{-- bootstrap --}}
@if (in_array(Session::get('changed_language'), ['ar', 'he', 'ur', 'arc', 'az', 'dv', 'ku', 'fa']))
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.rtl.min.css"
    integrity="sha384-WJUUqfoMmnfkBLne5uxXj+na/c7sesSJ32gI7GfCk4zO4GthUKhSEGyvQ839BC51" crossorigin="anonymous">
  <link href="{{ asset('front/css/main.css') }}" rel="stylesheet" />
  <link href="{{ asset('front/css/homepage.css') }}" rel="stylesheet" />
@else
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link href="{{ asset('front/css/main.css') }}" rel="stylesheet" />
  <link href="{{ asset('front/css/ltr.css') }}" rel="stylesheet" />
@endif


{{-- APP CSS Variables --}}
<style>
  /* CSS Variables */
  :root {
    --clr-black: #03151E;
    --clr-black-rgb: 3, 21, 30;
    --clr-white: #FFF;
    --clr-white-rgb: 255, 255, 255;
    --clr-dark: #0E3C54;
    --clr-dark-rgb: 14, 60, 84;
    --clr-light: #F3F9FB;
    --clr-border: #EEE;
    --clr-dim: #959595;
    --clr-accent: #58b6b0;
    --clr-accent-rgb: 88, 182, 176;
    --clr-accent-2: #e49a02;
    --clr-accent-2-rgb: 228, 154, 2;
    --clr-danger: #D40D0D;
    --bs-border-color: #EEEEEE;
  }

  /* /CSS Variables */
</style>
