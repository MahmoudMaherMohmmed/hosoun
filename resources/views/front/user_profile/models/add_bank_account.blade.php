<!-- Modal -->
<section class="modal fade" id="AddBankAccount" tabindex="-1"
  aria-labelledby="AddBankAccountLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header p-0 mb-4 justify-content-center border-bottom-0">
        <h3 class="modal-title fs-5" id="AddBankAccountLabel">
          {{ __('frontstaticword.AddBankDetails') }}
        </h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-0 mt-5">
        <form method="post" action="{{url('bankdetail/')}}">
          {{ csrf_field() }} 
         <input type="hidden" name="user_id"  value="{{Auth::User()->id}}" />
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label for="account_holder_name" class="form-label">{{ __('frontstaticword.A/CHolderName') }}</label>
                <input type="text" name="account_holder_name" id="account_holder_name"
                  class="form-control px-5" placeholder="{{ __('frontstaticword.A/CHolderName') }}" value="" required>
              </div>
              <div class="form-group">
                <label for="bank_name" class="form-label">{{ __('frontstaticword.Bankname') }}</label>
                <input type="text" name="bank_name" id="bank_name"
                  class="form-control px-5" placeholder="{{ __('frontstaticword.Bankname') }}" value="" required>
              </div>
              <div class="form-group">
                <label for="account_number" class="form-label">{{ __('frontstaticword.A/CNo') }}</label>
                <input type="text" name="account_number" id="account_number" class="form-control px-5"
                  placeholder="{{ __('frontstaticword.A/CNo') }}" value="" required>
              </div>
              <div class="form-group">
                <label for="ifcs_code" class="form-label">{{ __('frontstaticword.IFSCCode') }}</label>
                <input type="text" name="ifcs_code" id="ifcs_code" class="form-control px-5"
                  placeholder="{{ __('frontstaticword.IFSCCode') }}" value="" required>
              </div>
            </div>
            <button type="submit" class="btn btn-accent w-100 mt-3">
              {{ __('frontstaticword.save') }}
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
