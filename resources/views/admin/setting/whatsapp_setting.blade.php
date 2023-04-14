@extends('admin.layouts.master')
@section('title', __('adminstaticword.WhatsappChatButton') . ' - ' . __('adminstaticword.Admin'))
@section('body')

<section class="content">
	@include('admin.message')
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">{{ __('adminstaticword.WhatsappChatButton') }}</h3>
				</div>
				<div class="panel-body">
					<form action="{{ action('WhatsappButtonController@update') }}" method="POST"
						enctype="multipart/form-data">
						{{ csrf_field() }}
						{{ method_field('POST') }}

						<div class="row">
							<div class="col-xs-12">
								<div class="form-group">
									<label>{{ __('adminstaticword.EnableWhatsappChatButton') }}: </label>
									<div class="toggler">
										<input hidden id="cb3" type="checkbox" name="wapp_enable"
											{{ $setting['wapp_enable'] == '1' ? 'checked' : '' }}>
										<label class="main-toggle toggle-lg {{ $setting['wapp_enable'] == '1' ? 'on' : '' }}" for="cb3">
											<span data-off="{{ __('adminstaticword.Disable') }}" data-on="{{ __('adminstaticword.Enable') }}"></span>
										</label>
									</div>
									<input type="hidden" name="free" value="0" for="cb3" id="cb3">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-xs-12">
								<div class="form-group">
									<label for="wapp_phone">{{ __('adminstaticword.WhatasppPhoneNo') }} (with country
										code):</label>
									<input id="wapp_phone" value="{{ $setting['wapp_phone'] }}" name="wapp_phone" type="text"
										class="form-control" placeholder="Whatsapp Phone Number" required
										autocomplete="off" />
								</div>
							</div>

							<div class="col-xs-12">
								<div class="form-group">
									<label for="wapp_popup_msg">{{ __('adminstaticword.WhatasppPopUpMsg') }}:</label>
									<input id="wapp_popup_msg" value="{{ $setting['wapp_popup_msg'] }}" name="wapp_popup_msg" type="text"
										class="form-control" placeholder="PopUp Message" required autocomplete="off" />
								</div>
							</div>

							<div class="col-xs-12">
								<div class="form-group">
									<label for="wapp_title">{{ __('adminstaticword.HeaderTitle') }}:</label>
									<input id="wapp_title" value="{{ $setting['wapp_title'] }}" name="wapp_title" type="text"
										class="form-control" placeholder="Header Title" required autocomplete="off" />
								</div>
							</div>

							<div class="col-xs-12">
								<div class="form-group">
									<label>{{ __('adminstaticword.ButtonPosition') }}: </label>
									<div class="toggler">
										<input hidden id="cb4" type="checkbox" name="wapp_position"
											{{ $setting['wapp_position'] == 'left' ? 'checked' : '' }}>
										<label class="main-toggle toggle-lg {{ $setting['wapp_position'] == 'left' ? 'on' : '' }}" for="cb4">
											<span data-off="{{ __('adminstaticword.Right') }}" data-on="{{ __('adminstaticword.Left') }}"></span>
										</label>
									</div>
									<input type="hidden" name="free" value="0" for="cb4" id="cb4">
								</div>
							</div>

							<div class="col-xs-12">
								<div class="form-group">
									<label for="wapp_color">{{ __('adminstaticword.whatsappcolor') }}:</label>
									<div class="input-group my-colorpicker2">
										<input id="wapp_color" type="text" name="wapp_color"
											value="{{ $setting['wapp_color'] }}"
											class="form-control my-colorpicker1"
											placeholder="Choose color" required>

										<div class="input-group-addon">
											<i></i>
										</div>
									</div>
								</div>
							</div>
						</div>


						<div class="box-footer">
							<div class="row">
								<div class="col-xs-9 col-md-10"></div>
								<button value="" type="submit"
									class="btn btn-md col-xs-3 col-md-2 btn-primary">{{ __('adminstaticword.Save') }}</button>
							</div>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection


@section('scripts')

<script>
	$(function () {
		$('.my-colorpicker2').colorpicker();
		$('.my-colorpicker1').colorpicker();
	})
</script>

@endsection