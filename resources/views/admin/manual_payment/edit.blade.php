@extends('admin/layouts.master')
@section('title', __('adminstaticword.Edit') . ' ' . __('adminstaticword.ManualPaymentGateway') . ' - ' . __('adminstaticword.Admin'))
@section('body')

@if ($errors->any())
<div class="alert alert-danger">
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif


<section class="content">
	@include('admin.message')
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title"> {{ __('adminstaticword.Edit') }}
						{{ __('adminstaticword.ManualPaymentGateway') }}</h3>
					<a href="{{url('manualpayment')}}" class="btn btn-success pull-right owtbtn">
                        {{ __('adminstaticword.Back') }}
                    </a>
				</div>
				<div class="box-body">
					<div class="form-group">
						<form id="demo-form2" method="post" action="{{url('manualpayment/'.$payment->id)}}"
							data-parsley-validate enctype="multipart/form-data">
							{{ csrf_field() }}
							{{ method_field('PUT') }}


							<div class="row">
								<div class="col-xs-12">
									<div class="form-group">
										<label for="name">{{ __('adminstaticword.Name') }}:<sup
												class="redstar">*</sup></label>
										<input id="name" class="form-control" type="text" name="name" value="{{ $payment->name }}"
											placeholder="">
									</div>
								</div>

								<div class="col-xs-12">
									<div class="form-group">
										<label for="detail">{{ __('adminstaticword.Detail') }}:<sup
												class="redstar">*</sup></label>
										<textarea name="detail" rows="1" class="form-control" id="detail"
											placeholder="Enter Details">{{ $payment->detail }}</textarea>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-xs-12 col-md-6">
									<label for="image"> {{ __('adminstaticword.Image') }}</label>
									<div>
										<input type="file" name="image" id="image" class="inputfile inputfile-1" />
										<label for="image"><svg xmlns="http://www.w3.org/2000/svg" width="50"
												height="30" viewBox="0 0 20 17">
												<path
													d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
											</svg> <span>{{ __('adminstaticword.Chooseafile') }}</span>
										</label>
									</div>
									<div class="row">
										<div class="col-xs-12 col-md-6">
											<img src="{{ url('/images/manualpayment/'.$payment->image) }}"/>
										</div>
									</div>
								</div>

								<div class="col-xs-12 col-md-6">
									<label>{{ __('adminstaticword.Status') }}:</label>
									<div class="toggler">
										<input hidden id="status" type="checkbox" name="status"
											{{ $payment->status == '1' ? 'checked' : '' }}>
										<label class="main-toggle toggle-lg {{ $payment->status == '1' ? 'on' : '' }}" for="status">
											<span data-off="{{ __('adminstaticword.Disable') }}" data-on="{{ __('adminstaticword.Enable') }}"></span>
										</label>
									</div>
									<input type="hidden" name="free" value="0" for="status" id="status">
								</div>
							</div>
							

							<div class="box-footer">
								<div class="row">
									<div class="col-xs-9 col-md-10"></div>
									<button type="submit" value="Add Slider"
										class="btn btn-md col-xs-3 col-md-2 btn-primary">{{ __('adminstaticword.Save') }}</button>
								</div>
							</div>

						</form>
					</div>
				</div>
				<!-- /.box -->
			</div>
			<!-- /.box -->
		</div>
		<!--/.col (right) -->
	</div>
	<!-- /.row -->
</section>
@endsection