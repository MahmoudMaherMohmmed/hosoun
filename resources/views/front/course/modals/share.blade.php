<!-- Modal -->
<div class="modal fade" id="shareModal" tabindex="-1" aria-labelledby="shareModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header p-0 mb-4 justify-content-center border-bottom-0">
        <h1 class="modal-title fs-3" id="shareModalLabel">{{ __('frontstaticword.Sharethiscourse') }}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-0 mt-5">
        <form onSubmit="return false;">
          <div class="form-group">
            <div class="form-group-icon">
              <input type="text" class="form-control" id="myInput" value="{{ URL::current() }}" disabled>
            </div>
          </div>
          <div class="text-center">
            <button onclick="myFunction()" class="btn btn-accent">{{ __('frontstaticword.CopyText') }}</button>
          </div>
          <div>
            @php
              echo Share::currentPage('', [], '<ul class="d-flex flex-wrap align-items-center justify-content-center mt-4 social-share">')
                  ->facebook()
                  ->twitter()
                  ->linkedin('Extra linkedin summary can be passed here')
                  ->whatsapp()
                  ->telegram();
            @endphp
            </ul>
        </form>
      </div>
    </div>
  </div>
</div>
