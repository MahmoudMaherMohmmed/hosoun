@extends('admin.layouts.master')
@section('title', __('adminstaticword.AdsenseSetting') . ' - ' . __('adminstaticword.Admin'))
@section('body')

<section class="content">
	@include('admin.message')
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">{{ __('adminstaticword.AdsenseSetting') }}</h3>
				</div>
				<div class="panel-body">
					<form action="{{ action('AdsenseController@update') }}" method="POST" enctype="multipart/form-data">
						{{ csrf_field() }}
						{{ method_field('PUT') }}

						<div class="row">
							<div class="col-xs-12">
								<div class="form-group">
									<label for="adsense_detail">{{ __('adminstaticword.EnterYourAdsenseScript') }}:<sup
											class="redstar">*</sup></label>
									<textarea id="adsense_detail" name="code" rows="10" class="form-control" required>
									  {{ optional($ad)->code }}
									</textarea>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-4">
								<div class="form-group">
									<label>{{ __('adminstaticword.Status') }}: </label>
									<div class="toggler">
										<input hidden id="statuss" type="checkbox" name="status"
											{{ optional($ad)->status == 1 ? 'checked' : '' }}>
										<label class="main-toggle toggle-lg {{ optional($ad)->status == 1 ? 'on' : '' }}" for="statuss">
											<span data-off="{{ __('adminstaticword.Disable') }}" data-on="{{ __('adminstaticword.Enable') }}"></span>
										</label>
									</div>
								</div>
								<br>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-4">
								<div class="form-group">
									<label>{{ __('adminstaticword.VisibleonHome') }}: </label>
									<div class="toggler">
										<input hidden id="ishome" type="checkbox" name="ishome"
											{{ optional($ad)->ishome == 1 ? 'checked' : '' }}>
										<label class="main-toggle toggle-lg {{ optional($ad)->ishome == 1 ? 'on' : '' }}" for="ishome">
											<span data-off="{{ __('adminstaticword.Disable') }}" data-on="{{ __('adminstaticword.Enable') }}"></span>
										</label>
									</div>
								</div>
								<br>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-4">
								<div class="form-group">
									<label>{{ __('adminstaticword.VisibleonCart') }}: </label>
									<div class="toggler">
										<input hidden id="iscart" type="checkbox" name="iscart"
											{{ optional($ad)->iscart == 1 ? 'checked' : '' }}>
										<label class="main-toggle toggle-lg {{ optional($ad)->iscart == 1 ? 'on' : '' }}" for="iscart">
											<span data-off="{{ __('adminstaticword.Disable') }}" data-on="{{ __('adminstaticword.Enable') }}"></span>
										</label>
									</div>
								</div>
								<br>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-4">
								<div class="form-group">
									<label>{{ __('adminstaticword.VisibleonWishlist') }}: </label>
									<div class="toggler">
										<input hidden id="iswishlist" type="checkbox" name="iswishlist"
											{{ optional($ad)->iswishlist == 1 ? 'checked' : '' }}>
										<label class="main-toggle toggle-lg {{ optional($ad)->iswishlist == 1 ? 'on' : '' }}" for="iswishlist">
											<span data-off="{{ __('adminstaticword.Disable') }}" data-on="{{ __('adminstaticword.Enable') }}"></span>
										</label>
									</div>
								</div>
								<br>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-4">
								<div class="form-group">
									<label>{{ __('adminstaticword.VisibleonDetail') }}: </label>
									<div class="toggler">
										<input hidden id="isdetail" type="checkbox" name="isdetail"
											{{ optional($ad)->isdetail == 1 ? 'checked' : '' }}>
										<label class="main-toggle toggle-lg {{ optional($ad)->isdetail == 1 ? 'on' : '' }}" for="isdetail">
											<span data-off="{{ __('adminstaticword.Disable') }}" data-on="{{ __('adminstaticword.Enable') }}"></span>
										</label>
									</div>
								</div>
								<br>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-4 display-none">
								<div class="form-group">
									<label>{{ __('adminstaticword.VisibleonAll') }}: </label>
									<div class="toggler">
										<input hidden id="isviewall" type="checkbox" name="isviewall"
											{{ optional($ad)->isviewall == 1 ? 'checked' : '' }}>
										<label class="main-toggle toggle-lg {{ optional($ad)->isviewall == 1 ? 'on' : '' }}" for="isviewall">
											<span data-off="{{ __('adminstaticword.Disable') }}" data-on="{{ __('adminstaticword.Enable') }}"></span>
										</label>
									</div>
								</div>
								<br>
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
			</div>
		</div>
	</div>
</section>
@endsection


@section('script')



@endsection