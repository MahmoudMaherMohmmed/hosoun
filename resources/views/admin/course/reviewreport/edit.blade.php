@extends('admin.layouts.master')
@section('title', __('adminstaticword.Edit') . ' ' . __('adminstaticword.Review'))
@section('body')

<section class="content">
	@include('admin.message')
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title"> {{ __('adminstaticword.Edit') }} {{ __('adminstaticword.Review') }}</h3>
					<a href="{{ url()->previous() }}" class="btn btn-success pull-right owtbtn">
                        {{ __('adminstaticword.Back') }}
                    </a>
				</div>
				<div class="panel-body">
					<form action="{{action('ReportReviewController@update',$show->id)}}" method="POST">
						{{ csrf_field() }}
						{{ method_field('PUT') }}

						<input type="hidden" value="{{ $show->course_id }}" autofocus required name="course"
							class="form-control" placeholder="Enter Title" />

						<input type="hidden" value="{{ $show->review_id }}" autofocus required name="course"
							class="form-control" placeholder="Enter Title" />

						<div class="row">
							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<label for="title">{{ __('adminstaticword.Title') }}<sup class="redstar">*</sup></label>
									<input id="title" value="{{ $show->title }}" autofocus required name="title" type="text"
										class="form-control" placeholder="Enter Title" />
								</div>
							</div>
							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<label for="email">{{ __('adminstaticword.Email') }}<sup class="redstar">*</sup></label>
									<input id="email" value="{{ $show->email }}" autofocus required name="email" type="email"
										class="form-control" placeholder="Enter Email" />
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-xs-12">
								<div class="form-group">
									<label for="detail">{{ __('adminstaticword.Detail') }}<sup
											class="redstar">*</sup></label>
									<textarea id="detail" name="detail" value="" rows="4" class="form-control"
										placeholder="">{{ $show->detail }}</textarea>
								</div>
							</div>
						</div>


						<div class="row">
							<div class="col-xs-9"></div>
							<button value="" type="submit"
								class="btn btn-md col-xs-3 btn-primary">{{ __('adminstaticword.Save') }}</button>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection