@if($coursechapters->isNotEmpty())
  @php
    function courseHoursMins($course) {
        $time =  App\CourseClass::where('course_id', $course->id)->sum("duration");

        if ($time < 1) {
          return ' 0 ' . __('frontstaticword.hours') . ' 0 ' . __('frontstaticword.min'); 
        }

        $hours =floor($time / 60);

        $minutes = ($time % 60);
        
        return $hours . __('frontstaticword.hours') . $minutes . __('frontstaticword.min'); 
    }
  @endphp 
  <div class="course-content-block">
    <h3 class="block-title">{{ __('frontstaticword.CourseContent') }}</h3>
    <div class="d-flex align-items-center fs-5 mb-5">
      <span>{{ $coursechapters->count() }} {{ __('frontstaticword.sections') }}</span>
      <hr class="vertical-divider" />
      <span>{{App\CourseClass::where('course_id', $course->id)->count()}} {{ __('frontstaticword.lectures') }}</span>
      <hr class="vertical-divider" /> 
      <span>{{courseHoursMins($course)}}</span>
    </div>
    @foreach($coursechapters as $chapter)
      <div class="content-collapse block-box">
        <div class="head" data-bs-toggle="collapse" data-bs-target="#chapter-{{$chapter->id}}" aria-expanded="false"
          aria-controls="chapter-{{$chapter->id}}">
          <span class="fw-bold">{{$chapter->chapter_name}}</span>
          <span class="fs-4 ms-auto">{{App\CourseClass::where('coursechapter_id', $chapter->id)->count()}} {{ __('frontstaticword.lectures') }}</span>
          <span class="fs-4 ms-5">{{round(App\CourseClass::where('coursechapter_id', $chapter->id)->sum("duration"), 2)}}</span>
        </div>
        <div class="collapse" id="chapter-{{$chapter->id}}">
          <div class="content">
            @php $course_classes = App\CourseClass::where('coursechapter_id', $chapter->id)->get(); @endphp
            @foreach($course_classes as $course_class)
              <span href="javascript:void(0)" class="d-flex flex-wrap align-items-center text-accent p-2 mb-3">
                @if($course_class->type =='video')
                  <i class="fa fa-play-circle"></i>
                @endif
                @if($course_class->type =='audio')
                  <i class="fas fa-play"></i>
                @endif
                @if($course_class->type =='image')
                  <i class="fas fa-image"></i>
                @endif
                @if($course_class->type =='pdf')
                  <i class="fas fa-file-pdf"></i>
                @endif
                @if($course_class->type =='zip')
                  <i class="far fa-file-archive"></i>
                @endif

                &nbsp;{{ $course_class->title }}&nbsp;
                @if($course_class->preview_url != NULL || $course_class->preview_video != NULL )
                  <a href="{{ route('lightbox',$course_class->id) }}" target="_blank">({{ __('frontstaticword.preview') }})</a>
                @endif

                <span class="fs-5 ms-auto">
                  @if($course_class->type =='video' || $course_class->type =='audio')
                    {{ $course_class->duration }} {{ __('frontstaticword.min') }}
                  @else
                    {{ $course_class->size }} MB
                  @endif
                </span>
              </span>
            @endforeach
          </div>
        </div>
      </div>
    @endforeach
  </div>
@endif
