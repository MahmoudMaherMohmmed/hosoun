<div class="row">
	<div class="col-xs-12">
		<!-- /.box-header -->
		<div class="box-body">
			<form action="{{ route('manifest.update') }}" method="POST">
				@csrf

				<div class="row">
					<div class="col-xs-12">
						<div class="form-group">
							<label>{{ __('PWA Enable') }}: </label>
							<div class="toggler">
								<input hidden id="cb3" type="checkbox" name="pwa_enable"
									{{ $env_files['PWA_ENABLE'] == '1' ? 'checked' : '' }}>
								<label class="main-toggle toggle-lg {{ $env_files['PWA_ENABLE'] == '1' ? 'on' : '' }}" for="cb3">
									<span data-off="{{ __('adminstaticword.Disable') }}" data-on="{{ __('adminstaticword.Enable') }}"></span>
								</label>
							</div>
							<input type="hidden" name="free" value="0" for="cb3" id="cb3">
						</div>
	
						<div class="form-group">
							<label for="app_name">{{ __('adminstaticword.AppName') }}: </label>
							<input id="app_name" disabled class="form-control" type="text" name="app_name"
								value="{{ config("app.name")}}" />
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-6">
						<div class="form-group">
							<label for="pwa_theme">{{ __('adminstaticword.ThemeColorforheader') }} : </label>
							<input id="pwa_theme" name="pwa_theme" class="form-control" type="color"
								value="{{ $env_files['PWA_THEME_COLOR'] }}" />
						</div>
					</div>
					<div class="col-xs-6">
						<div class="form-group">
							<label for="pwa_bg">{{ __('adminstaticword.BackgroundColor') }} :</label>
							<input id="pwa_bg" name="pwa_bg" class="form-control" type="color"
								value="{{ $env_files['PWA_BG_COLOR'] }}" />
						</div>
					</div>
				</div>

				<div class="box-footer">
					<div class="row">
						<div class="col-xs-9"></div>
						<button type="submit" class="btn btn-md btn-danger col-xs-3">
							<i class="fa fa-save"></i> {{ __('adminstaticword.Save') }}
						</button>
					</div>
				</div>


			</form>
		</div>
		<!-- /.box-body -->

	</div>
	<!-- /.col -->
</div>
<!-- /.row -->