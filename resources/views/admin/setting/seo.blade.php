<form action="{{ route('seo.set') }}" method="POST">
	@csrf
	<div class="row">
		<div class="col-xs-12 col-md-6">
			<div class="form-group{{ $errors->has('meta_data_desc') ? ' has-error' : '' }}">
				<label for="meta_data_desc">{{ __('adminstaticword.MetaDataDescription') }}:</label>
				<textarea placeholder="Enter description" class="form-control" name="meta_data_desc" id="meta_data_desc" cols="30"
					rows="10">{{ $setting->meta_data_desc }}</textarea>
				<small class="text-danger">{{ $errors->first('meta_data_desc','Meta data description is required !') }}</small>
			</div>
		</div>
		<div class="col-xs-12 col-md-6">
			<div class="form-group{{ $errors->has('meta_data_keyword') ? ' has-error' : '' }}">
				<label for="meta_data_keyword">{{ __('adminstaticword.MetaDataKeywords') }}:</label>
				<textarea placeholder="Use Comma to seprate keyword" class="form-control" name="meta_data_keyword" id="meta_data_keyword"
					cols="30" rows="10">{{ $setting->meta_data_keyword }}
				</textarea>
				<small class="text-danger">{{ $errors->first('meta_data_keyword','Meta Keyword Cannot be blank !') }}</small>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12 col-md-6">
			<div class="form-group{{ $errors->has('google_ana') ? ' has-error' : '' }}">
				<label for="google_ana">{{ __('adminstaticword.GoogleAnalyticKey') }}:</label>
				<input id="google_ana" type="text" class="form-control" placeholder="Enter Google analytic key" name="google_ana"
					value="{{ $setting->google_ana }}">
				<small class="text-danger">{{ $errors->first('google_ana','Google analytic Code is required !') }}</small>
			</div>
		</div>
		<div class="col-xs-12 col-md-6">
			<div class="form-group{{ $errors->has('fb_pixel') ? ' has-error' : '' }}">
				<label for="fb_pixel">{{ __('adminstaticword.FacebookPixelCode') }}:</label>
				<input id="fb_pixel" type="text" name="fb_pixel" class="form-control" placeholder="Enter Facebook Pixel Code"
					value="{{ $setting->fb_pixel }}">
				<small class="text-danger">{{ $errors->first('fb_pixel','Facebook Pixel Code is required !') }}</small>
			</div>
		</div>
	</div>
	<br>

	<div class="box-footer">
		<div class="row">
			<div class="col-xs-9 col-md-10"></div>
			<button type="submit" class="btn btn-md col-xs-3 col-md-2 btn-primary flex-row-center-all"><i class='bx bx-save me' ></i> {{ __('adminstaticword.Save') }}</button>
		</div>
	</div>

</form>