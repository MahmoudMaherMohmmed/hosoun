@if ($course->short_detail != null)
  <div class="course-content-block">
    <h3 class="block-title">{{ __('frontstaticword.Description') }}</h3>
    <div class="block-box">{!! $course->short_detail !!}</div>
  </div>
@endif

@if ($course->detail != null)
  <div class="course-content-block">
    <h3 class="block-title">{{ __('frontstaticword.Detail') }}</h3>
    <div class="block-box">{!! $course->detail !!}</div>
  </div>
@endif

@if ($courseinclude->isNotEmpty())
  <div class="course-content-block">
    <h3 class="block-title">{{ __('frontstaticword.CourseIncludes') }}</h3>
    <div class="block-box">
      <ul class="info-list">
        @foreach($course->include as $in)
          <li>{!! str_limit(strip_tags($in->detail), $limit = 50, $end = '...') !!}</li>
        @endforeach
      </ul>
    </div>
  </div>
@endif

@if ($whatlearns->isNotEmpty())
  <div class="course-content-block">
    <h3 class="block-title">{{ __('frontstaticword.Whatlearn') }}</h3>
    <div class="block-box">
      <ul class="info-list">
        @foreach ($whatlearns as $wl)
          <li>{!! str_limit(strip_tags($wl['detail']), $limit = 120, $end = '...') !!}</li>
        @endforeach
      </ul>
    </div>
  </div>
@endif

<div class="course-content-block">
  <h3 class="block-title">{{ __('frontstaticword.AboutInstructor') }}</h3>
  <div class="d-flex flex-column flex-sm-row align-items-center instructor">
    @php
      $fullname = isset($course->user['fname']) . ' ' . isset($course->user['lname']);
      $fullname = preg_replace('/\s+/', '', $fullname);
    @endphp
    @if ($course->user->user_img != null || $course->user->user_img != '')
      <a href="{{ route('instructor.profile', ['id' => $course->user->id, 'name' => $fullname]) }}"
        title="{{ $fullname }}" class="img mb-5 mb-sm-0 me-sm-5">
        <img src="{{ asset('images/user_img/' . $course->user->user_img) }}" alt="{{ $fullname }}">
      </a>
    @else
      <img src="{{ asset('images/default/user.jpg') }}" class="mb-5 mb-sm-0 me-sm-5" alt="{{ $fullname }}">
    @endif
    <div class="d-flex flex-column">
      <a href="{{ route('instructor.profile', ['id' => $course->user->id, 'name' => $fullname]) }}" class="name"
        title="{{ $fullname }}">
        @if (isset($course->user))
          {{ $course->user['fname'] }} {{ $course->user['lname'] }}
        @endif
      </a>
      @if ($course->user->detail != null)
        <p class="text-dim">{!! $course->user->detail !!}</p>
      @endif
    </div>
  </div>
</div>
