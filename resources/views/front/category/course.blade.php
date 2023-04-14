<section class="course-card-search">
  @if ($course['preview_image'] !== null && $course['preview_image'] !== '')
    <a href="{{ route('user.course.show', ['id' => $course->id, 'slug' => $course->slug]) }}"><img
        src="{{ asset('images/course/' . $course->preview_image) }}" alt="{{ $course->title }}"></a>
  @else
    <a href="{{ route('user.course.show', ['id' => $course->id, 'slug' => $course->slug]) }}"><img
        src="{{ Avatar::create($course->title)->toBase64() }}" alt="{{ $course->title }}"></a>
  @endif
  <div class="course-card-search-content">
    <div class="d-flex align-items-center">
      <span class="rating-readonly"></span>
      <span class="fw-bold ms-3 pt-2">(4.5)</span>
    </div>
    <h4 class="card-title">
      <a href="{{ route('user.course.show', ['id' => $course->id, 'slug' => $course->slug]) }}">
        {{ $course->title }}
      </a>
    </h4>

    <p class="text-dim">{{ str_limit($course->short_detail, $limit = 125, $end = '...') }}</p>

    <div class="info d-flex align-content-center">
      <span class="item">
        <span class="text-accent fw-bold">{{ App\CourseClass::where('course_id', $course->id)->count() }}</span>
        {{ __('frontstaticword.Courses') }}
      </span>
      <span class="item">
        <span class="text-accent fw-bold">{{ App\Order::where('course_id', $course->id)->count() }}</span>
        {{ __('frontstaticword.Students') }}
      </span>
      <span class="item">{{ __('frontstaticword.AllLevels') }}</span>
      <span class="item">{{ __('frontstaticword.Finished') }}</span>
    </div>

    @if ($course->type == 1)
      @php $currency = App\Currency::first(); @endphp
      @if ($course->discount_price == !null)
        @if ($gsetting['currency_swipe'] == 1)
          <div class="text-accent fw-bold price"><i
              class="{{ $currency->icon }}"></i>{{ $course->discount_price }}&nbsp;<s><i
                class="{{ $currency->icon }}"></i>{{ $course->price }}</s></div>
        @else
          <div class="text-accent fw-bold price">{{ $course->discount_price }}<i
              class="{{ $currency->icon }}"></i>&nbsp;<s>{{ $course->price }}<i
                class="{{ $currency->icon }}"></i></s></div>
        @endif
      @else
        @if ($gsetting['currency_swipe'] == 1)
          <div class="text-accent fw-bold price"><i class="{{ $currency->icon }}"></i>{{ $course->price }}</div>
        @else
          <div class="text-accent fw-bold price">{{ $course->price }}<i class="{{ $currency->icon }}"></i></div>
        @endif
      @endif
    @else
      <div class="text-accent fw-bold price">{{ __('frontstaticword.Free') }}</div>
    @endif
  </div>
</section>
