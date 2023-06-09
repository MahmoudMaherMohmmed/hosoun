@extends('admin.layouts.master')
@section('title', __('adminstaticword.PrivacyPolicy') . ' - ' . __('adminstaticword.Admin'))
@section('body')

<section class="content">
	@include('admin.message')
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">{{ __('adminstaticword.PrivacyPolicy') }}</h3>
				</div>
				<div class="panel-body">
					<form action="{{ action('TermsController@update') }}" method="POST">
						{{ csrf_field() }}
						{{ method_field('PUT') }}

						<div class="row">
							<div class="col-xs-12">
								<div class="form-group">
									<label for="detail">{{ __('adminstaticword.PrivacyPolicy') }}:<sup
											class="redstar">*</sup></label>
									<textarea id="detail" name="policy" rows="10" cols="80" class="form-control">
									{{ optional($items)->policy }}
									</textarea>
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
			</div>
		</div>
	</div>
</section>
@endsection