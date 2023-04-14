@extends('admin/layouts.master')
@section('title', __('adminstaticword.Edit') . ' ' . __('adminstaticword.Review'))
@section('body')

<section class="content">
	@include('admin.message')
	<div class="row">
		<!-- left column -->
		<div class="col-xs-12">
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title"> {{ __('adminstaticword.Edit') }} {{ __('adminstaticword.Review') }}</h3>
					<a href="{{ url()->previous() }}" class="btn btn-success pull-right owtbtn">
                        {{ __('adminstaticword.Back') }}
                    </a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<form id="demo-form" method="post" action="{{url('reviewrating/'.$jp->id)}}"
						data-parsley-validate>
						{{ csrf_field() }}
						{{ method_field('PUT') }}

						<div class="row">
							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<label class="display-none"
										for="course">{{ __('adminstaticword.Course') }}</label>
									<select id="course" name="course" class="form-control display-none">
										@foreach($courses as $cou)
										<option value="{{ $cou->id }}"
											{{$jp->courses->id == $cou->id  ? 'selected' : ''}}>{{ $cou->title}}
										</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<label class="display-none"
										for="user">{{ __('adminstaticword.User') }}</label>
									<select id="user" name="user" class="form-control display-none">
										@foreach($users as $cu)
										<option value="{{ $cu->id }}" {{$jp->user->id == $cu->id  ? 'selected' : ''}}>
											{{ $cu->fname}}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-xs-12">
								<div class="form-group">
									<label for="review">{{ __('adminstaticword.Review') }}:<sup
											class="redstar">*</sup></label>
									<textarea id="review" rows="3" name="review" class="form-control">{{ $jp->review }}</textarea>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-xs-12 col-md-4">
								<div class="form-group">
									<label>{{ __('adminstaticword.Status') }}:</label>
									<div class="toggler">
										<input hidden id="abcde" type="checkbox"
											{{ $jp->status==1 ? 'checked' : '' }}>
										<label class="main-toggle toggle-lg {{ $jp->status==1 ? 'on' : '' }}" for="abcde">
											<span data-off="{{ __('adminstaticword.Deactive') }}" data-on="{{ __('adminstaticword.Active') }}"></span>
										</label>
									</div>
									<input type="hidden" name="status" value="{{ $jp->status }}" id="abcdef">
								</div>
							</div>

							<div class="col-xs-12 col-md-4">
								<div class="form-group">
									<label>{{ __('adminstaticword.Approved') }}:</label>
									<div class="toggler">
										<input hidden id="cb10112" type="checkbox"
											{{ $jp->approved==1 ? 'checked' : '' }}>
										<label class="main-toggle toggle-lg {{ $jp->approved==1 ? 'on' : '' }}" for="cb10112">
											<span data-off="{{ __('adminstaticword.Deactive') }}" data-on="{{ __('adminstaticword.Active') }}"></span>
										</label>
									</div>
									<input type="hidden" name="approved" value="{{ $jp->approved }}" id="jjjj">
								</div>
							</div>

							<div class="col-xs-12 col-md-4">
								<div class="form-group">
									<label>{{ __('adminstaticword.Featured') }}:</label>
									<div class="toggler">
										<input hidden id="featured1" type="checkbox"
											{{ $jp->featured==1 ? 'checked' : '' }}>
										<label class="main-toggle toggle-lg {{ $jp->featured==1 ? 'on' : '' }}" for="featured1">
											<span data-off="{{ __('adminstaticword.Deactive') }}" data-on="{{ __('adminstaticword.Active') }}"></span>
										</label>
									</div>
									<input type="hidden" name="featured" value="{{ $jp->featured }}" id="featured2">
								</div>
							</div>
						</div>

						<div class="box-footer">
							<div class="row">
								<div class="col-xs-9"></div>
								<button type="submit"
									class="btn btn-md col-xs-3 btn-primary">{{ __('adminstaticword.Save') }}</button>
							</div>
						</div>

					</form>
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