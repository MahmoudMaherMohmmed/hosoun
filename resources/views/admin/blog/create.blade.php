@extends('admin/layouts.master')
@section('title', __('adminstaticword.AddBlog') . ' - ' . __('adminstaticword.Admin'))
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
					<h3 class="box-title">{{ __('adminstaticword.AddBlog') }}</h3>
					<a href="{{url('blog')}}" class="btn btn-success pull-right owtbtn">
                        {{ __('adminstaticword.Back') }}
                    </a>
				</div>

				<div class="panel-body">
					<form id="demo-form2" method="post" action="{{action('BlogController@store')}}"
						data-parsley-validate enctype="multipart/form-data">
						{{ csrf_field() }}

						<input type="hidden" class="form-control" name="user_id" value="{{ Auth::User()->id }}">

						<div class="row">
							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<label for="datepicker">{{ __('adminstaticword.Date') }}:<sup
											class="redstar">*</sup></label>
									<div class="input-group date">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input class="form-control" type="text" id="datepicker" name="date"
											placeholder="{{ __('adminstaticword.Select') }} {{ __('adminstaticword.Date') }}"
											required>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<label for="heading">{{ __('adminstaticword.Heading') }}:<sup
											class="redstar">*</sup></label>
									<input class="form-control" type="text" name="heading" id="heading"
										placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.Heading') }}"
										required>
								</div>
							</div>
						</div>


						<div class="row">
							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<label for="text">{{ __('adminstaticword.ButtonText') }}:<sup
											class="redstar">*</sup></label>
									<input type="text" class="form-control" name="text" id="text"
										placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.ButtonText') }}">
								</div>
							</div>
							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<label for="image">{{ __('adminstaticword.Image') }}:<sup
											class="redstar">*</sup></label>
									<div>
										<input type="file" name="image" id="image" class="inputfile inputfile-1"
											required>
										<label for="image"><svg xmlns="http://www.w3.org/2000/svg" width="50"
												height="30" viewBox="0 0 20 17">
												<path
													d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
											</svg> <span>{{ __('adminstaticword.Chooseafile') }}</span>
										</label>
									</div>
								</div>
							</div>
						</div>


						<div class="row">
							<div class="col-xs-12">
								<div class="form-group">
									<label for="detail">{{ __('adminstaticword.Detail') }}:<sup
											class="redstar">*</sup></label>
									<textarea id="detail" name="detail" rows="5" class="form-control"
										placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.Detail') }}"></textarea>
								</div>
							</div>
						</div>

						@if(Auth::user()->role == 'admin')

						<div class="row">
							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<label>{{ __('adminstaticword.Approved') }}:</label>
									<div class="toggler">
										<input hidden id="approved" type="checkbox" name="approved">
										<label class="main-toggle toggle-lg" for="approved">
											<span data-off="{{ __('adminstaticword.Disable') }}"
												data-on="{{ __('adminstaticword.Enable') }}"></span>
										</label>
										</li>
										<input type="hidden" name="free" value="0" for="approved" id="approved">
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<label>{{ __('adminstaticword.Status') }}:</label>
									<div class="toggler">
										<input hidden id="status" type="checkbox" name="status">
										<label class="main-toggle toggle-lg" for="status">
											<span data-off="{{ __('adminstaticword.Disable') }}"
												data-on="{{ __('adminstaticword.Enable') }}"></span>
										</label>
										</li>
										<input type="hidden" name="free" value="0" for="status" id="status">
									</div>
								</div>
							</div>
						</div>

						@endif


						<div class="box-footer">
							<div class="row">
								<div class="col-xs-6 col-sm-8 col-md-10"></div>
								<button type="submit" value="Add Blog"
									class="btn btn-md col-xs-6 col-sm-4 col-md-2 btn-primary">+
									{{ __('adminstaticword.AddBlog') }}</button>
							</div>
						</div>
					</form>
				</div>
				<!-- /.panel body -->
			</div>
			<!-- /.box -->
		</div>
		<!--/.col (right) -->
	</div>
	<!-- /.row -->
</section>

@endsection