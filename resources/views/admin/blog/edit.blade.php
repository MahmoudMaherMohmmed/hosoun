@extends('admin.layouts.master')
@section('title', __('adminstaticword.UpdateBlog') . ' - ' . __('adminstaticword.Admin'))
@section('body')

<section class="content">
	@include('admin.message')
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">{{ __('adminstaticword.UpdateBlog') }}</h3>
					<a href="{{url('blog')}}" class="btn btn-success pull-right owtbtn">
                        {{ __('adminstaticword.Back') }}
                    </a>
				</div>
				<div class="panel-body">
					<form action="{{route('blog.update',$show->id)}}" method="POST" enctype="multipart/form-data">
						{{ csrf_field() }}
						{{ method_field('PUT') }}

						<div class="row">
							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<label for="datepicker">{{ __('adminstaticword.Date') }}<sup class="redstar">*</sup></label>
									<div class="input-group date">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input name="date" value="{{ $show->date }}" id="datepicker" autofocus required
											type="text" class="form-control"
											placeholder="{{ __('adminstaticword.Select') }} {{ __('adminstaticword.Date') }}" />
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<label for="user_id">{{ __('adminstaticword.User') }}<sup
											class="redstar">*</sup></label>
									<select id="user_id" name="user_id" class="form-control js-example-basic-single">
										<option value="{{ $show->user_id }}">{{  $show->user->fname }}</option>
									</select>
								</div>
							</div>
						</div>
						

						<div class="row">
							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<label for="heading">{{ __('adminstaticword.Heading') }}<sup
											class="redstar">*</sup></label>
									<input id="heading" value="{{ $show->heading }}" autofocus required name="heading" type="text"
										class="form-control"
										placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.Heading') }}" />
								</div>
							</div>
							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<label for="text">{{ __('adminstaticword.ButtonText') }}</label>
									<input id="text" value="{{ $show->text }}" autofocus name="text" type="text" class="form-control"
										placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.ButtonText') }}" />
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-xs-12">
								<div class="form-group">
									<label for="detail">{{ __('adminstaticword.Detail') }}<sup
											class="redstar">*</sup></label>
									<textarea id="detail" name="detail" rows="5" class="form-control"
										placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.Detail') }}">{{ $show->detail }}</textarea>
								</div>
							</div>
						</div>
						
						
						@if(Auth::user()->role == 'admin')
						
						<div class="row">
							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<label for="image">{{ __('adminstaticword.Image') }}<sup class="redstar">*</sup></label>
									<div>
										<input type="file" name="image" id="image" class="inputfile inputfile-1"
											>
										<label for="image"><svg xmlns="http://www.w3.org/2000/svg" width="50"
												height="30" viewBox="0 0 20 17">
												<path
													d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
											</svg> <span>{{ __('adminstaticword.Chooseafile') }}</span>
										</label>
									</div>
									<div class="row">
										<img src="{{ url('/images/blog/'.$show->image) }}" class="img-responsive col-xs-12 col-md-6" />
									</div>
								</div>
							</div>

							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<label>{{ __('adminstaticword.Approved') }}:</label>
									<div class="toggler">
										<input hidden id="approved" type="checkbox" name="approved"
											{{ $show->approved == '1' ? 'checked' : '' }}>
										<label class="main-toggle toggle-lg {{ $show->approved == '1' ? 'on' : '' }}" for="approved">
											<span data-off="{{ __('adminstaticword.Disable') }}" data-on="{{ __('adminstaticword.Enable') }}"></span>
										</label>
									</div>
									<input type="hidden" name="free" value="0" for="approved" id="approved">
								</div>
								<div class="form-group">
									<label>{{ __('adminstaticword.Status') }}:</label>
									<div class="toggler">
										<input hidden id="status" type="checkbox" name="status"
											{{ $show->status == '1' ? 'checked' : '' }}>
										<label class="main-toggle toggle-lg {{ $show->status == '1' ? 'on' : '' }}" for="status">
											<span data-off="{{ __('adminstaticword.Disable') }}" data-on="{{ __('adminstaticword.Enable') }}"></span>
										</label>
									</div>
									<input type="hidden" name="free" value="0" for="status" id="status">
								</div>
							</div>
						</div>
						

						@endif

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