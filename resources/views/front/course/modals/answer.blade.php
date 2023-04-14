<!-- Modal -->
<div class="modal fade" id="{{ $location }}AnswerModal{{ $question->id }}" tabindex="-1"
  aria-labelledby="{{ $location }}AnswerModal{{ $question->id }}Label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header p-0 mb-4 justify-content-center border-bottom-0">
        <h1 class="modal-title fs-3" id="{{ $location }}AnswerModal{{ $question->id }}Label">
          {{ __('frontstaticword.AddAnswer') }}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-0 mt-5">
        <div class="answer-head">{!! $question->question !!}</div>
        <form method="post" action="{{ url('addanswer', $question->id) }}">
          @csrf
          <input type="hidden" name="question_id" value="{{ $question->id }}" />
          <input type="hidden" name="instructor_id" value="{{ $course->user_id }}" />
          <input type="hidden" name="ans_user_id" value="{{ Auth::user()->id }}" />
          <input type="hidden" name="ques_user_id" value="{{ $question->user_id }}" />
          <input type="hidden" name="course_id" value="{{ $question->course_id }}" />
          <input type="hidden" name="question_id" value="{{ $question->id }}" />
          <input type="hidden" name="status" value="1" />
          <textarea name="answer" id="answer" class="form-control p-5" placeholder="{{ __('frontstaticword.WriteAnswer') }}"></textarea>
          <div class="text-center mt-5">
            <button type="submit" class="btn btn-accent">{{ __('frontstaticword.Submit') }}</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
