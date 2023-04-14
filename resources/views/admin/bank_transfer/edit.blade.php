@extends('admin.layouts.master')
@section('title', __('adminstaticword.BankDetails') . ' - ' . __('adminstaticword.Admin'))
@section('body')

<section class="content">
	@include('admin.message')
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">{{ __('adminstaticword.BankDetails') }}</h3>
				</div>
				<div class="panel-body">
					<form action="{{ action('BankTransferController@update') }}" method="POST"
						enctype="multipart/form-data">
						{{ csrf_field() }}
						{{ method_field('PUT') }}

						<div class="row">
							<div class="col-xs-12">
								<div class="form-group">
									<label>{{ __('adminstaticword.BankEnable') }}: </label>
									<div class="toggler">
										<input hidden id="cb3" type="checkbox" name="bank_enable"
											{{ optional($show)['bank_enable'] == '1' ? 'checked' : '' }}>
										<label class="main-toggle toggle-lg {{ optional($show)['bank_enable'] == '1' ? 'on' : '' }}" for="cb3">
											<span data-off="{{ __('adminstaticword.Disable') }}" data-on="{{ __('adminstaticword.Enable') }}"></span>
										</label>
									</div>
									<input type="hidden" name="free" value="0" for="cb3" id="cb3">
								</div>
							</div>

							<div class="col-xs-12">
								<div class="form-group">
									<label for="account_holder_name">{{ __('adminstaticword.AccountHolderName') }}<sup
											class="redstar">*</sup></label>
									<input id="account_holder_name" value="{{ optional($show)->account_holder_name }}" name="account_holder_name"
										type="text" class="form-control"
										placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.AccountHolderName') }}"
										required autocomplete="off" />
								</div>
							</div>
							
							<div class="col-xs-12">
								<div class="form-group">
									<label for="bank_name">{{ __('adminstaticword.BankName') }}<sup
											class="redstar">*</sup></label>
									<input id="bank_name" value="{{ optional($show)->bank_name }}" name="bank_name" type="text"
										class="form-control"
										placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.BankName') }}"
										required autocomplete="off" />
								</div>
							</div>
							
							<div class="col-xs-12">
								<div class="form-group">
									<label for="account_number">{{ __('adminstaticword.AccountNumber') }}<sup
											class="redstar">*</sup></label>
									<input id="account_number" value="{{ optional($show)->account_number }}" name="account_number"
										type="text" class="form-control"
										placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.AccountNumber') }}"
										required autocomplete="off" />
								</div>
							</div>
	
							<div class="col-xs-12">
								<div class="form-group">
									<label for="ifcs_code">{{ __('adminstaticword.IFCSCode') }}</label>
									<input id="ifcs_code" value="{{ optional($show)->ifcs_code }}" name="ifcs_code" type="text"
										class="form-control"
										placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.IFCSCode') }}"
										autocomplete="off" />
								</div>
							</div>
	
							<div class="col-xs-12">
								<div class="form-group">
									<label for="swift_code">{{ __('adminstaticword.SwiftCode') }}</label>
									<input id="swift_code" value="{{ optional($show)->swift_code }}" name="swift_code" type="text"
										class="form-control"
										placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.SwiftCode') }}"
										autocomplete="off" />
								</div>
							</div>
						</div>
						

						<div class="box-footer">
							<div class="row">
								<div class="col-xs-9"></div>
								<button value="" type="submit" class="btn btn-md col-xs-3 btn-primary">{{ __('adminstaticword.Save') }}</button>
							</div>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection