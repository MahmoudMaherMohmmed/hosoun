<!doctype html>
<html dir="rtl" lang="ar">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  @include('front.certificate.certificate-style')
  <style>
    .certificate.print {
      max-width: 50rem;
      width: 100%;
      margin: 0 auto
    }
  </style>
</head>

<body>
  <main class="certificate print">
    @include('front.certificate.certificate-content')
  </main>
  <button class="btn-print" onclick="print(1)">طباعة</button>
</body>

</html>
