<meta charset="UTF-8">
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="Description"
  content="من خلال منصة حصون ابدأ الآن في تعلم اللغة
العربية والتربية الإسلامية بدروس ميسرة
وفقاً لمنهج علمي سليم">
<meta name="Author" content="Spruko Technologies Private Limited">
<meta name="Keywords" content="onlineLearning, quraan, hazeeth, قرآن كريم, حديث, قراءات, اجازات, تجويد, تصحيح تلاوة" />

<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('front/img/favicon/apple-touch-icon.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('front/img/favicon/favicon-32x32.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('front/img/favicon/favicon-16x16.png') }}">
<link rel="manifest" href="{{ asset('front/img/favicon/site.webmanifest') }}">

{{-- APP TITLE --}}
@php $settings = App\Setting::first(); @endphp
<title>{{ $settings->project_title }} - @yield('title')</title>
