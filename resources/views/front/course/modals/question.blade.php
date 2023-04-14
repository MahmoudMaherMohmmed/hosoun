<!-- Modal -->
<div class="modal fade" id="questionModal" tabindex="-1" aria-labelledby="questionModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header p-0 mb-4 justify-content-center border-bottom-0">
        <h1 class="modal-title fs-3" id="questionModalLabel">{{ __('frontstaticword.Askanewquestion') }}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-0 mt-5">
        <form method="post" action="{{ url('addquestion', $course->id) }}">
          @csrf
          <input type="hidden" name="instructor_id" class="form-control" value="{{$course->user_id}}"  />
          <input type="hidden" name="user_id"  value="{{Auth::user()->id}}" />
          <input type="hidden" name="course_id"  value="{{$course->id}}" />
          <input type="hidden" name="status"  value="1" />

          <textarea name="question" id="question" class="form-control p-5" placeholder="{{ __('frontstaticword.Question') }}"></textarea>
          <div class="text-center mt-5">
            <button type="submit" class="btn btn-accent">{{ __('frontstaticword.Submit') }}</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
