@extends('admin/layouts.master')
@section('title', __('Twilio Settings') . ' - ' . __('adminstaticword.Admin'))
@section('body')

<section class="content">
	@include('admin.message')
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title"> {{ __('Twilio SMS Channel Settings') }}</h3>
				</div>

				<!-- /.box-header -->
				<div class="box-body">
					<form action="{{ route('twilio.update') }}" method="POST">
						@csrf
						<div class="row">
							<div class="col-xs-12">
								<div class="form-group">
									<label>{{ __('Twilio Enable') }}</label>
									<div class="toggler">
										<input hidden id="aamar_pay" type="checkbox"
											name="twilio_enable"
											{{ $settings->twilio_enable == '1' ? 'checked' : '' }} />
										<label class="main-toggle {{ $settings->twilio_enable == '1' ? 'on' : '' }}" for="aamar_pay">
											<span data-off="{{ __('adminstaticword.No') }}" data-on="{{ __('adminstaticword.Yes') }}"></span>
										</label>
									</div>
								</div>
							</div>

							<div class="col-xs-12">
								<div class="form-group">
									<label for="TWILIO_SID">TWILIO SID: <sup class="redstar">*</sup></label>
									<input id="TWILIO_SID" name="TWILIO_SID" type="text" value="{{ env('TWILIO_SID') }}"
										class="form-control">
								</div>
							</div>

							<div class="col-xs-12">
								<div class="form-group">
									<label for="TWILIO_AUTH_TOKEN">TWILIO AUTH TOKEN: <sup class="redstar">*</sup></label>
									<input id="TWILIO_AUTH_TOKEN" name="TWILIO_AUTH_TOKEN" type="text" value="{{ env('TWILIO_AUTH_TOKEN') }}"
										class="form-control">
								</div>
							</div>

							<div class="col-xs-12">
								<div class="form-group">
									<label for="TWILIO_NUMBER">TWILIO NUMBER:<sup class="redstar">*</sup></label>
									<input id="TWILIO_NUMBER" name="TWILIO_NUMBER" type="text" value="{{ env('TWILIO_NUMBER') }}"
										class="form-control">
								</div>
							</div>

						</div>
						<div class="box-footer">
							<div class="row">
								<div class="col-xs-9"></div>
								<button value="" type="submit"
									class="btn btn-md col-xs-3 btn-primary">{{ __('adminstaticword.Save') }}</button>
							</div>
						</div>
					</form>


				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
</section>
@endsection