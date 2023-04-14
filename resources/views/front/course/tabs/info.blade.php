<div class="course-content-block">
  <h3 class="block-title">{{ __('frontstaticword.RecentActivity') }}</h3>
  <div class="row">
    <div class="col-lg-6 mb-5 mb-lg-0">
      <div class="block-box p-0">
        <div class="d-flex align-items-center justify-content-between p-5 border-bottom">
          <h5 class="box-title">{{ __('frontstaticword.RecentQuestions') }}</h5>
          <button type="button" class="btn btn-inline text-accent">
            {{ __('frontstaticword.Browsequestions') }}
          </button>
        </div>
        @if ($coursequestions->isNotEmpty())
          @foreach ($coursequestions->take(2) as $question)
            <div class="activity-item">
              <div class="d-flex align-items-center me-5">
                @if ($question->user->user_img != null)
                  <img src="{{ url('/images/user_img/' . $question->user->user_img) }}" alt="user-img"
                    class="avatar-60 me-4 flex-shrink-0">
                @else
                  <img src="{{ asset('front/img/user.jpg') }}" alt="user-img" class="avatar-60 me-4">
                @endif
                <div class="d-flex flex-column">
                  <span class="text-dim fs-14">{{ $question->user->fname . ' ' . $question->user->lname }}</span>
                  <span class="fw-bold fs-14 mt-3">{!! $question->question !!}</span>
                </div>
              </div>
              <div class="d-flex flex-column ms-auto">
                <span
                  class="tag tag-accent-light mb-2">{{ App\Answer::where('question_id', $question->id)->where('status', 1)->count() }}
                  {{ __('frontstaticword.Answers') }}</span>
                <button class="btn btn-inline text-accent-2" data-bs-toggle="modal"
                  data-bs-target="#infoTabAnswerModal{{ $question->id }}">
                  <svg class="svg-resize-20 svg-stroke-accent-2">
                    <use xlink:href="{{ asset('/front/svg/sprite.svg#add') }}" />
                  </svg>
                  {{ __('frontstaticword.AddAnswer') }}
                </button>
                @include('front.course.modals.answer', ['location' => 'infoTab'])
              </div>
            </div>
          @endforeach
        @else
          {{-- Empty Status --}}
          <div class="activity-item justify-content-center text-dim fs-14">
            لم يتم إضافة اسئلة بعد
          </div>
        @endif

      </div>
    </div>
    <div class="col-lg-6">
      <div class="block-box p-0">
        <div class="d-flex align-items-center justify-content-between p-5 border-bottom">
          <h5 class="box-title">{{ __('frontstaticword.RecentAnnouncements') }}</h5>
          <a href="" class="text-accent fw-bold fs-14">{{ __('frontstaticword.Browseannouncements') }}</a>
        </div>
        @if ($announsments->isNotEmpty())
          @foreach ($announsments->take(2) as $announsment)
            <div class="activity-item">
              <div class="d-flex align-items-center me-5">
                @if ($announsment->user->user_img != null)
                  <img src="{{ url('/images/user_img/' . $announsment->user->user_img) }}" alt="user-img"
                    class="avatar-60 me-4 flex-shrink-0">
                @else
                  <img src="{{ asset('front/img/user.jpg') }}" alt="user-img" class="avatar-60 me-4">
                @endif
                <div class="d-flex flex-column">
                  <span class="text-dim fs-14">{{ $announsment->user->fname }} {{ $announsment->user->lname }}</span>
                  <span class="fw-bold fs-14 mt-3">{{ $announsment->announsment }}</span>
                </div>
              </div>
            </div>
          @endforeach
        @else
          {{-- Empty Status --}}
          <div class="activity-item justify-content-center text-dim fs-14">
            لم يتم إضافة إعلانات بعد
          </div>
        @endif
      </div>
    </div>
  </div>
</div>

@include('front.course.layout.content.info')
