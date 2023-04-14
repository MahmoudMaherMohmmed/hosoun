@extends('admin/layouts.master')
@section('title', __('adminstaticword.Edit') . ' ' . __('adminstaticword.RelatedCourse'))
@section('body')

<section class="content">
	@include('admin.message')
	<div class="row">
		<!-- left column -->
		<div class="col-xs-12">
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">{{ __('adminstaticword.Edit') }} {{ __('adminstaticword.RelatedCourse') }}
					</h3>
					<a href="{{ url()->previous() }}" class="btn btn-success pull-right owtbtn">
                        {{ __('adminstaticword.Back') }}
                    </a>
				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<div class="box-body">
					<form id="demo-form" method="post" action="{{url('relatedcourse/'.$cate->id)}}"
						data-parsley-validate>

						{{ csrf_field() }}
						{{ method_field('PUT') }}

						<input type="hidden" class="form-control " name="user_id" id="user_id"
							value="{{ $cate->user_id }}">

						<div class="row" class="display-none">
							<div class="col-xs-12">
								<div class="form-group">
									<label for="main_course_id">{{ __('adminstaticword.Course') }}</label>
									<select id="main_course_id" name="main_course_id" class="form-control">
										<option value="{{ $cate->main_course_id }}">{{ $cate->main_course_id }}</option>
									</select>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-xs-12">
								<div class="form-group">
									<label for="course_id">{{ __('adminstaticword.RelatedCourse') }}</label>
									<select id="course_id" name="course_id" class="form-control">
										@foreach($courses as $cou)
										<option value="{{ $cou->id }}"
											{{$cate->course_id == $cou->id  ? 'selected' : ''}}>{{ $cou->title}}
										</option>
										@endforeach
									</select>
									<p class="txt-desc">{{ __('adminstaticword.Edit') }}
										{{ __('adminstaticword.RelatedCourse') }}</p>
								</div>
							</div>

							<div class="col-xs-12">
								<div class="form-group">
									<label>{{ __('adminstaticword.Status') }}:</label>
									<div class="toggler">
										<input hidden id="cb7" type="checkbox"
											{{ $cate->status==1 ? 'checked' : '' }}>
										<label class="main-toggle toggle-lg {{ $cate->status==1 ? 'on' : '' }}" for="cb7">
											<span data-off="{{ __('adminstaticword.Deactive') }}" data-on="{{ __('adminstaticword.Active') }}"></span>
										</label>
									</div>
									<input type="hidden" name="status" value="{{ $cate->status }}" id="jeeet">
								</div>
							</div>
						</div>

						<div class="box-footer">
							<div class="row">
								<div class="col-xs-9"></div>
								<button type="submit"
									class="btn btn-md col-xs-3 btn-primary">{{ __('adminstaticword.Submit') }}</button>
							</div>
						</div>

					</form>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
		<!--/.col (right) -->
	</div>
	<!-- /.row -->
</section>

@endsection