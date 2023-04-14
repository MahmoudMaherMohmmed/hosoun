@if (App\QuizTopic::where('course_id', $course->id)->where('status', 1)->count() > 0)
  {{-- Objective --}}
  @php
    $objective_topics = App\QuizTopic::where('course_id', $course->id)
        ->where('type', null)
        ->where('status', 1)
        ->get();
  @endphp
  @if ($objective_topics->isNotEmpty())
    <div class="course-content-block">
      <h3 class="block-title">{{ __('frontstaticword.Objective') }}</h3>
      @foreach ($objective_topics as $topic)
        @include('front.course.tabs.layouts.exam_card')
      @endforeach
    </div>
  @else
    {{-- Empty Status --}}
    <div class="main-block text-center d-flex flex-column align-items-center justify-content-center">
      <svg class="svg-resize-32 svg-stroke-accent mb-4">
        <use xlink:href="{{ asset('/front/svg/sprite.svg#book-square') }}" />
      </svg>
      لم يتم إضاقة اختبارات بعد
    </div>
  @endif

  {{-- Subjective --}}
  @php
    $subjective_topics = App\QuizTopic::where('course_id', $course->id)
        ->where('type', 1)
        ->where('status', 1)
        ->get();
  @endphp
  @if ($subjective_topics->isNotEmpty())
    <div class="course-content-block">
      <h3 class="block-title">{{ __('frontstaticword.Subjective') }}</h3>
      @foreach ($subjective_topics as $topic)
        @include('front.course.tabs.layouts.exam_card')
      @endforeach
    </div>
  @else
    {{-- Empty Status --}}
    <div class="main-block text-center d-flex flex-column align-items-center justify-content-center">
      <svg class="svg-resize-32 svg-stroke-accent mb-4">
        <use xlink:href="{{ asset('/front/svg/sprite.svg#book-square') }}" />
      </svg>
      لم يتم إضاقة اختبارات بعد
    </div>
  @endif
@endif
