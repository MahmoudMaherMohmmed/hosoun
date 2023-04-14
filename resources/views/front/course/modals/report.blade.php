<!-- Modal -->
<div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="reportModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header p-0 mb-4 justify-content-center border-bottom-0">
        <h1 class="modal-title fs-3" id="reportModalLabel">{{ __('frontstaticword.Report') }}</h1> 
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-0 mt-5">
        <form method="post" action="{{ route('course.report', $course->id) }}">
          @csrf
          <div class="form-group">
            <label for="title" class="form-label">{{ __('frontstaticword.Title') }}</label>
            <div class="form-group-icon">
              <input type="text" name="title" id="title" class="form-control" placeholder="{{ __('frontstaticword.Title') }}" value="" required>
              <svg class="svg-default form-control-icon">
                <use xlink:href="{{ asset('/front/svg/sprite.svg#edit') }}" />
              </svg>
            </div>
          </div>
          <div class="form-group">
            <label for="email" class="form-label">{{ __('frontstaticword.Email') }}</label>
            <div class="form-group-icon">
              <input type="email" name="email" id="email" class="form-control" placeholder="{{ __('frontstaticword.Email') }}" value="{{ Auth::user()!=null ? Auth::user()->email : '' }}" required>
              <svg class="svg-default form-control-icon">
                <use xlink:href="{{ asset('/front/svg/sprite.svg#sms') }}" />
              </svg>
            </div>
          </div>
          <div class="form-group">
            <label for="detail" class="form-label">{{ __('frontstaticword.Detail') }}</label>
            <div class="form-group-icon">
              <textarea name="detail" id="detail" class="form-control" placeholder="{{ __('frontstaticword.Detail') }}"></textarea>
              <svg class="svg-default form-control-icon">
                <use xlink:href="{{ asset('/front/svg/sprite.svg#edit') }}" />
              </svg>
            </div>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-accent">{{ __('frontstaticword.Submit') }}</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
