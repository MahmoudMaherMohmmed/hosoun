<section class="course-card position-relative">
  @if ($course->preview_image != null && $course->preview_image !== '')
    <a href="{{ route('course.content', ['id' => $course->id, 'slug' => $course->slug]) }}" class="img d-inline-block">
      <img src="{{ asset('images/course/' . $course->preview_image) }}" alt="{{ $course->title }}">
    </a>
  @else
    <a href="{{ route('course.content', ['id' => $course->id, 'slug' => $course->slug]) }}" class="img d-inline-block">
      <img src="{{ Avatar::create($course->title)->toBase64() }}" alt="{{ $course->title }}">
    </a>
  @endif

  <div class="course-card-content">
    <div class="d-flex align-items-center">
      <span class="rating-readonly"></span>
      <span class="fw-bold ms-3 pt-2">(4.5)</span>
    </div>
    <a href="{{ route('course.content', ['id' => $course->id, 'slug' => $course->slug]) }}" class="card-title">
      {{ $course->title }}
    </a>
    @if (isset($course->user) && $course->user != null)
      <a href="{{ route('instructor.profile', ['id' => $course->user->id, 'name' => $course->user->fname . ' ' . $course->user->lname]) }}"
        class="instructor">
        {{ __('frontstaticword.by') }} {{ $course->user->fname . ' ' . $course->user->lname }}
      </a>
    @endif
  </div>

  <div class="border-top card-footer">
    @php
      $progress = App\CourseProgress::where('course_id', $course->id)
          ->where('user_id', Auth::User()->id)
          ->first();
    @endphp
    @if (!empty($progress))
      @php
        $total_class = count($progress->all_chapter_id);
        
        $read_class = count($progress->mark_chapter_id);
        
        $progress = ($read_class / $total_class) * 100;
      @endphp
      <div class="text-center">
        <div class="progress w-100 flex-grow-1 me-3" role="progressbar" aria-label="Basic example"
          aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100">
          <div class="progress-bar" style="width: {{ $progress }}%"></div>
        </div>
        <a href="{{ route('course.content', ['id' => $course->id, 'slug' => $course->slug]) }}"
          class="mt-4 d-block">{{ __('frontstaticword.Complete') }}</a>
      </div>
    @else
      <div class="text-center">
        <div class="progress w-100 flex-grow-1 me-3" role="progressbar" aria-label="Basic example" aria-valuenow="0"
          aria-valuemin="0" aria-valuemax="100">
          <div class="progress-bar" style="width: 0%"></div>
        </div>
        <a href="{{ route('course.content', ['id' => $course->id, 'slug' => $course->slug]) }}"
          class="mt-4 d-block">{{ __('frontstaticword.StartCourse') }}</a>
      </div>
    @endif
  </div>
</section>
