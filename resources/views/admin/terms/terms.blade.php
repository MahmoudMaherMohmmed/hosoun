@extends('admin.layouts.master')
@section('title', __('adminstaticword.Terms&Condition') . ' - ' . __('adminstaticword.Admin'))
@section('body')

<section class="content">
	@include('admin.message')
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">{{ __('adminstaticword.Terms&Condition') }}</h3>
				</div>
				<div class="panel-body">
					<form action="{{ action('TermsController@update') }}" method="POST">
						{{ csrf_field() }}
						{{ method_field('PUT') }}

						<div class="row">
							<div class="col-xs-12">
								<div class="form-group">
									<label for="detail">{{ __('adminstaticword.Terms&Condition') }}:<sup
											class="redstar">*</sup></label>
									<textarea id="detail" name="terms" rows="10" cols="80">
										{{ optional($items)->terms }}
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