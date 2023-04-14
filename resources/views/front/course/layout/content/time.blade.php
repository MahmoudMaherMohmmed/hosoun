@if($course->requirement!=null)
<div class="course-content-block">
  <h3 class="block-title">{{ __('frontstaticword.Announcements') }}</h3>
  <div class="block-box p-5">
    <div class="d-flex flex-column flex-sm-row align-items-sm-center">
      <span class="fw-bold">{{ $course->requirement }}</span>
    </div>
  </div>
</div>
@endif
