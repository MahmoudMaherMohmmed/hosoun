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
  @php
      $z = 0;
      $items = App\CourseClass::where('course_id', $course->id)->first();
      $coursewatch = App\WatchCourse::where('course_id','=',$course->id)->where('user_id', Auth::User()->id)->first();
      if(isset($coursewatch['active']) == 0){
          $z = 0;    
      }else{
          $z = 1;
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
                @if($course_class->type =='video' || $course_class->type =='audio')
                  ( {{ $course_class->duration }} {{ __('frontstaticword.min') }} )
                @endif
                @if($course_class->type =='image' || $course_class->type =='pdf' || $course_class->type =='zip' )
                  ( {{ $course_class->size }} Mb )
                @endif

                <span class="fs-5 ms-auto">
                  @if($course_class->file != NULL)
                    <a href="{{ asset('files/class/material/'.$course_class->file) }}" download="{{$course_class->file}}" class="btn btn-inline ms-auto">
                      <svg class="svg-resize-24 svg-fill-accent">
                        <use xlink:href="{{ asset('/front/svg/sprite.svg#receive-square') }}" />
                      </svg>
                    </a>
                  @endif

                  @if($course_class->type =='video' && $course_class->video )
                    <a href="{{ route('watchcourseclass',$course_class->id) }}" title="{{ $course_class->title }}" class="@if($z == 0)iframe @endif"><i class="fa fa-play-circle"></i>&nbsp;{{ __('frontstaticword.Play') }}</a>
                  @endif

                  @if($course_class->type =='video' && $course_class->aws_upload )
                    <a href="{{ route('watchcourseclass',$course_class->id) }}" title="{{ $course_class->title }}" class="@if($z == 0)iframe @endif"><i class="fa fa-play-circle"></i>&nbsp;{{ __('frontstaticword.Play') }}</a>
                  @endif

                  @php $url = Crypt::encrypt($course_class->iframe_url); @endphp
                  @if($course_class->type =='video' && $course_class->iframe_url )
                      <a href="{{ route('watchinframe',[$url, 'course_id' => $course->id]) }}" title="{{ $course_class->title }}"><i class="fa fa-play-circle"></i>&nbsp;{{ __('frontstaticword.Play') }}</a>
                  @endif

                  @if($course_class->type =='audio' && $course_class->audio)
                    <a href="{{ route('audiocourseclass',$course_class->id) }}" title="{{ $course_class->title }}" class="@if($z == 0)iframe @endif"><i class="fa fa-play-circle"></i>&nbsp;{{ __('frontstaticword.Play') }}</a>
                  @endif

                  @if($course_class->type =='image' && $course_class->image )
                      <a href="{{ asset('images/class/'.$course_class->image) }}" download="{{$course_class->image}}" title="{{ $course_class->title }}"><i class="fas fa-image"></i>&nbsp;{{ __('frontstaticword.save') }}</a>
                  @endif

                  @if($course_class->type =='pdf' && $course_class->pdf )
                    <a href="{{route('downloadPdf',$course_class->id)}}" title="{{ $course_class->title }}" class="iframe"><i class="fas fa-file-pdf"></i>&nbsp;{{ __('frontstaticword.save') }}</a>
                  @endif

                  @if($course_class->type =='zip' && $course_class->zip )
                    <a href="{{ asset('files/zip/'.$course_class->zip) }}" download="{{$course_class->zip}}" title="{{ $course_class->title }}"><i class="far fa-file-archive"></i>&nbsp;{{ __('frontstaticword.save') }}</a>
                  @endif

                  @if($course_class->url)
                    @if($course_class->type =='video')
                      @if(Carbon\Carbon::now() >= $course_class->date_time)
                        <a href="{{ route('watchcourseclass',$course_class->id) }}" title="Course" class="@if($z == 0)iframe @endif"><i class="fa fa-play-circle"></i>&nbsp;{{ __('frontstaticword.Play') }}</a>
                      @else
                        <a href="" title="Course"><i class="fa fa-play-circle"></i>&nbsp;{{ __('frontstaticword.Play') }}</a>
                      @endif
                    @endif

                    @if($course_class->type =='image')
                      <a href="{{ $course_class->url }}" title="Course"><i class="fas fa-image"></i>&nbsp;{{ __('frontstaticword.link') }}</a>
                    @endif

                    @if($course_class->type =='pdf')
                      <a href="{{ $course_class->url }}" title="Course"><i class="fas fa-file-pdf"></i>&nbsp;{{ __('frontstaticword.link') }}</a>
                    @endif

                    @if($course_class->type =='zip')
                      <a href="{{ $course_class->url }}" title="Course"><i class="far fa-file-archive">&nbsp;{{ __('frontstaticword.link') }}</i></a>
                    @endif
                    
                    @if($course_class->type =='audio')
                      <a href="{{ route('audiocourseclass',$course_class->id) }}" title="Course" class="@if($z == 0)iframe @endif"><i class="fa fa-play-circle" >&nbsp;{{ __('frontstaticword.Play') }}</i></a>
                    @endif
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

