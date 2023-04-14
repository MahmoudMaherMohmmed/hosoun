@extends('admin/layouts.master')
@section('title', __('adminstaticword.Edit') . ' ' . __('adminstaticword.CourseInclude'))
@section('body')

<section class="content">
	<div class="row">
		<!-- left column -->
		<div class="col-xs-12">
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="panel panel-sum">
					<div class="box-header with-border">
						<h3 class="box-title"> {{ __('adminstaticword.Edit') }}
							{{ __('adminstaticword.CourseInclude') }}</h3>
						<a href="{{ url()->previous() }}" class="btn btn-success pull-right owtbtn">
                            {{ __('adminstaticword.Back') }}
                        </a>
					</div>
					<!-- /.box-header -->
					<!-- form start -->
					<div class="box-body">
							<form id="demo-form" method="post" action="{{url('courseinclude/'.$cate->id)}}"
								data-parsley-validate>
								{{ csrf_field() }}
								{{ method_field('PUT') }}

								
								<div class="row">
									<div class="col-xs-12">
										<div class="form-group">
											<label for="course_id">{{ __('adminstaticword.SelectCourse') }}</label>
											<select id="course_id" name="course_id" class="form-control">
												@foreach($courses as $cou)
												<option value="{{ $cou->id }}"
													{{$cate->courses->id == $cou->id  ? 'selected' : ''}}>{{ $cou->title}}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="col-xs-12">
										<div class="form-group">
											<label for="icon">{{ __('adminstaticword.Icon') }}: <sup
													class="redstar">*</sup></label>
											<input type="text" class="form-control icp-auto icp" name="icon"
												id="icon" value="{{$cate->icon}}">
										</div>
									</div>
									<div class="col-xs-12">
										<div class="form-group">
											<label for="detail">{{ __('adminstaticword.Detail') }}:<sup
													class="redstar">*</sup></label>
											<textarea id="detail" rows="1" name="detail"
												class="form-control">{!! $cate->detail !!}</textarea>
										</div>
									</div>
									<div class="col-xs-12">
										<div class="form-group">
											<label>{{ __('adminstaticword.Status') }}:</label>
											<div class="toggler">
												<input hidden id="status" type="checkbox" name="status"
													{{ $cate->status == '1' ? 'checked' : '' }}>
												<label class="main-toggle toggle-lg" for="status">
													<span data-off="{{ __('adminstaticword.Disable') }}" data-on="{{ __('adminstaticword.Enable') }}"></span>
												</label>
											</div>
											<input type="hidden" name="free" value="0" for="status" id="status">
										</div>
									</div>
								</div>


								<div class="box-footer">
									<div class="row">
										<div class="col-xs-9"></div>
										<button type="submit" class="btn btn-md col-xs-3 btn-primary">{{ __('adminstaticword.Save') }}</button>
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