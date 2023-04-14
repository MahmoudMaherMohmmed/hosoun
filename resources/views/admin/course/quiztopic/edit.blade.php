@extends('admin.layouts.master')
@section('title', __('adminstaticword.Edit') . ' ' . __('adminstaticword.Quiz'))
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
					<h3 class="box-title"> {{ __('adminstaticword.Edit') }} {{ __('adminstaticword.Quiz') }}</h3>
					<a href="{{ url()->previous() }}" class="btn btn-success pull-right owtbtn">
                        {{ __('adminstaticword.Back') }}
                    </a>

				</div>
				<br>
				<div class="panel-body">
					<form id="demo-form2" method="POST" action="{{route('quiztopic.update', $topic->id)}}"
						data-parsley-validate>
						{{ csrf_field() }}
						{{ method_field('PUT') }}



						<div class="row">
							<div class="col-xs-12">
								<div class="form-group">
									<label for="title">{{ __('adminstaticword.QuizTopic') }}:<span
											class="redstar">*</span> </label>
									<input type="text" placeholder="Enter Quiz Topic" class="form-control " name="title"
										id="title" value="{{ $topic->title }}">
								</div>
							</div>
							<div class="col-xs-12">
								<div class="form-group">
									<label for="description">{{ __('adminstaticword.QuizDescription') }}:<sup
											class="redstar">*</sup></label>
									<textarea id="description" name="description" rows="3" class="form-control"
										placeholder="Enter Description">{{ $topic->description }}</textarea>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="form-group">
									<label for="per_q_mark">{{ __('adminstaticword.PerQuestionMarks') }}:<span
											class="redstar">*</span> </label>
									<input type="number" placeholder="Enter Per Question Mark" class="form-control "
										name="per_q_mark" id="per_q_mark" value="{{ $topic->per_q_mark }}">
								</div>
							</div>
						</div>

						<div class="row display-none">
							<div class="col-xs-12">
								<div class="form-group">
									<label for="timer">{{ __('adminstaticword.QuizTimer') }}:<span
											class="redstar">*</span> </label>
									<input type="text" placeholder="Enter Quiz Time" class="form-control" name="timer"
										id="timer" value="{{ $topic->timer }}">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-xs-12">
								<div class="form-group">
									<label for="due_days">{{ __('adminstaticword.Days') }}:</label>
									<small>(Days after quiz will start when user enroll in course)</small>
									<input type="text" placeholder="Enter Due Days" class="form-control" name="due_days"
										id="due_days" value="{{ $topic->due_days }}">
								</div>
							</div>
						</div>

						<div class="row">
							<div class=".col-xs-12 col-md-4">
								<div class="form-group">
									<label>{{ __('adminstaticword.Status') }}:</label>
									<div class="toggler">
										<input hidden id="111" type="checkbox" name="status"
											{{ $topic->status == '1' ? 'checked' : '' }}>
										<label class="main-toggle toggle-lg {{ $topic->status == '1' ? 'on' : '' }}"  for="111">
											<span data-off="{{ __('adminstaticword.Disable') }}" data-on="{{ __('adminstaticword.Enable') }}"></span>
										</label>
									</div>
									<input type="hidden" name="free" value="0" for="status" id="122">
								</div>
							</div>

							<div class=".col-xs-12 col-md-4">
								<div class="form-group">
									<label>{{ __('adminstaticword.QuizReattempt') }}:</label>
									<div class="toggler">
										<input hidden id="112" type="checkbox" name="quiz_again"
											{{ $topic->quiz_again == '1' ? 'checked' : '' }}>
										<label class="main-toggle toggle-lg {{ $topic->quiz_again == '1' ? 'on' : '' }}"  for="112">
											<span data-off="{{ __('adminstaticword.Disable') }}" data-on="{{ __('adminstaticword.Enable') }}"></span>
										</label>
									</div>
									<input type="hidden" name="free" value="0" for="quiz_again" id="123">
								</div>
							</div>

							<div class=".col-xs-12 col-md-4">
								<div class="form-group">
									<label>{{ __('Quiz Type') }}:</label>
									<div class="toggler">
										<input hidden id="type112" type="checkbox" name="type"
											{{ $topic->type == '1' ? 'checked' : '' }}>
										<label class="main-toggle toggle-lg {{ $topic->type == '1' ? 'on' : '' }}" 
											for="type112">
											<span data-off="{{ __('adminstaticword.Disable') }}" data-on="{{ __('adminstaticword.Enable') }}"></span>
										</label>
									</div>
									<input type="hidden" name="free" value="0" for="quiz_again" id="123">
								</div>
							</div>
						</div>
						<br>

						<div class="box-footer">
							<div class="row">
								<div class="col-xs-9"></div>
								<button type="submit" value="Add Answer" class="btn btn-md col-xs-3 btn-primary">{{ __('adminstaticword.Save') }}</button>
							</div>
						</div>

					</form>

				</div>
				<!-- /.panel body -->
			</div>
			<!-- /.box -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
</section>

@endsection