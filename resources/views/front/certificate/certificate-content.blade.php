<section class="certificate-img">
  <div class="content">
    <p>هذه الشهادة مقدمة من منصة حصون التعليمية</p>
    <p>
      إلى/
      {{ auth()->user()->fname ?? '' }}
      {{ auth()->user()->lname ?? '' }}
    </p>
    <p>لاجتيازهم دورة/ {{ $course['title'] }}</p>
    <p class="foot">نتمنى لهم التوفيق والنجاح</p>
  </div>
</section>
