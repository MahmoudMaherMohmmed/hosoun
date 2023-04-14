@extends('admin/layouts.master')
@section('title', __('adminstaticword.Edit') . ' ' . __('adminstaticword.Question'))
@section('body')

<section class="content">
	<div class="row">
		<!-- left column -->
		<div class="col-xs-12">
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title"> {{ __('adminstaticword.Edit') }} {{ __('adminstaticword.Question') }}</h3>
					<a href="{{ url()->previous() }}" class="btn btn-success pull-right owtbtn">
                        {{ __('adminstaticword.Back') }}
                    </a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="form-group">
						<form id="demo-form" method="post" action="{{url('questionanswer/'.$que->id)}}"
							data-parsley-validate>
							{{ csrf_field() }}
							{{ method_field('PUT') }}


							<input type="hidden" name="instructor_id" class="form-control"
								value="{{ Auth::User()->id }}" />
								
							<div class="row">
								<div class="col-xs-12">
									<div class="form-group">
										<select name="course_id" class="form-control col-md-7 col-xs-12 display-none">
											@foreach($courses as $cou)
											<option class="display-none" value="{{ $cou->id }}"
												{{$que->courses->id == $cou->id  ? 'selected' : ''}}>{{ $cou->title}}</option>
											@endforeach
										</select>
									</div>
								</div>
								
								<div class="col-xs-12">
									<div class="form-group">
										<select name="user_id" class="form-control col-md-7 col-xs-12 display-none">
											@foreach($user as $cu)
											<option class="display-none" value="{{ $cu->id }}"
												{{$que->courses->id == $cu->id  ? 'selected' : ''}}>{{ $cu->fname}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-xs-12">
									<div class="form-group">
										<label for="question">{{ __('adminstaticword.Question') }}:<span
												class="redstar">*</span></label>
										<textarea id="question" name="question" rows="3" class="form-control" required>{{$que->question}}</textarea>
									</div>
								</div>

								<div class="col-xs-12">
									<div class="form-group">
										<label>{{ __('adminstaticword.Status') }}:</label>
										<div class="toggler">
											<input hidden id="cb77" type="checkbox"
												{{ $que->status==1 ? 'checked' : '' }}>
											<label class="main-toggle toggle-lg {{ $que->status==1 ? 'on' : '' }}" for="cb77">
												<span data-off="{{ __('adminstaticword.Deactive') }}" data-on="{{ __('adminstaticword.Active') }}"></span>
											</label>
										</div>
										<input type="hidden" name="status" value="{{ $que->status }}" id="jp">
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
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
		<!--/.col (right) -->
	</div>
	<!-- /.row -->
</section>

@endsection