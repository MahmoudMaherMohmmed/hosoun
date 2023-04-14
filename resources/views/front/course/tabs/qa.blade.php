<div class="course-content-block">
  <div class="row">
    <div class="col-lg-7">
      <div class="d-flex align-items-center justify-content-between">
        <h3 class="block-title">{{ __('frontstaticword.questionsinthiscourse') }}<span
            class="text-accent ms-3">({{ $coursequestions->count() }})</span></h3>
        <button class="btn btn-inline text-accent" data-bs-toggle="modal" data-bs-target="#questionModal">
          <svg class="svg-resize-20 svg-stroke-accent">
            <use xlink:href="{{ asset('/front/svg/sprite.svg#add') }}" />
          </svg>
          {{ __('frontstaticword.Askanewquestion') }}
        </button>
      </div>
      @if ($coursequestions->isNotEmpty())
        @foreach ($coursequestions as $question)
          <div class="block-box mt-4">
            @php
              $answers = App\Answer::where('question_id', $question->id)
                  ->where('status', 1)
                  ->get();
            @endphp
            {{-- question --}}
            <div class="activity-item border-bottom pt-0 px-0">
              <div class="d-flex align-items-center me-5">
                @if ($question->user->user_img != null)
                  <img src="{{ url('/images/user_img/' . $question->user->user_img) }}" alt="user-img"
                    class="avatar-60 me-4 flex-shrink-0">
                @else
                  <img src="{{ asset('front/img/user.jpg') }}" alt="user-img" class="avatar-60 me-4">
                @endif
                <div class="d-flex flex-column">
                  <span
                    class="text-dim fs-14">{{ $question->user != null ? $question->user->fname . ' ' . $question->user->lname : '---' }}</span>
                  <span class="fw-bold fs-14 mt-3">{!! $question->question !!}</span>
                </div>
              </div>
              <div class="d-flex flex-column align-items-start ms-auto">
                <div class="d-flex align-items-center mb-2">
                  <span class="tag tag-accent-light">{{ $answers->count() }} {{ __('frontstaticword.Answers') }}</span>
                  <button class="btn btn-inline ms-3" data-bs-toggle="modal" data-bs-target="#reportQuestionModal">
                    <svg class="svg-resize-20 svg-stroke-accent">
                      <use xlink:href="{{ asset('/front/svg/sprite.svg#flag') }}" />
                    </svg>
                  </button>
                </div>
                <button class="btn btn-inline text-accent-2" data-bs-toggle="modal"
                  data-bs-target="#qaTabAnswerModal{{ $question->id }}">
                  <svg class="svg-resize-20 svg-stroke-accent-2">
                    <use xlink:href="{{ asset('/front/svg/sprite.svg#add') }}" />
                  </svg>
                  {{ __('frontstaticword.AddAnswer') }}
                </button>
                @include('front.course.modals.answer', ['location' => 'qaTab'])
              </div>
            </div>
            {{-- answers --}}
            <div class="mt-5">
              <h3 class="box-title mb-4">{{ __('frontstaticword.TheAnswers') }}</h3>
              @if ($answers->isNotEmpty())
                @foreach ($answers as $answer)
                  <div class="activity-item answer px-0">
                    <div class="d-flex align-items-center me-5">
                      @if ($answer->user->user_img != null)
                        <img src="{{ url('/images/user_img/' . $answer->user->user_img) }}" alt="user-img"
                          class="avatar-60 me-4 flex-shrink-0">
                      @else
                        <img src="{{ asset('front/img/user.jpg') }}" alt="user-img" class="avatar-60 me-4">
                      @endif
                      <div class="d-flex flex-column">
                        <span
                          class="text-dim fs-14">{{ $answer->user != null ? $answer->user->fname . ' ' . $answer->user->lname : '---' }}</span>
                        <span class="fw-bold fs-14 mt-3">{{ $answer->answer }}</span>
                      </div>
                    </div>
                  </div>
                @endforeach
              @endif
            </div>
          </div>
        @endforeach
      @else
        {{-- Empty Status --}}
        <div class="main-block text-center">
          لم يتم إضافة اسئلة بعد
        </div>
      @endif
    </div>
  </div>
</div>
