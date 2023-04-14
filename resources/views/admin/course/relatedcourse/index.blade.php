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
	<div class="row">
		<div class="col-xs-12">
			<a data-toggle="modal" data-target="#myModalabc" href="#"
				class="btn btn-info btn-sm">+{{ __('adminstaticword.Add') }}</a>
			<br>
			<br>
			<div class="table-responsive">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>{{ __('adminstaticword.RelatedCourse') }}</th>
							<th>{{ __('adminstaticword.Status') }}</th>
							<th>{{ __('adminstaticword.Edit') }}</th>
							<th>{{ __('adminstaticword.Delete') }}</th>
						</tr>
					</thead>
					<tbody>
						<?php $i=0;?>
						@foreach($relatedcourse as $cat)
						<?php $i++;?>
						<tr>
							<td><?php echo $i;?></td>
							<td>{{$cat->courses->title}}</td>
							<td>
								
								
								<form action="{{ route('related.quick',$cat->id) }}" method="POST">
									{{ csrf_field() }}
									<button type="Submit"
										class="btn btn-xs table-status {{ $cat->status ==1 ? 'btn-success' : 'btn-danger' }}">
										@if($cat->status ==1)
										{{ __('adminstaticword.Active') }}
										@else
										{{ __('adminstaticword.Deactive') }}
										@endif
									</button>
								</form>
							</td>
							<td>
								<a class="table-edit" href="{{url('relatedcourse/'.$cat->id)}}"><i class='bx bx-edit'></i></a>
							</td>
							<td>
								<form method="post" action="{{url('relatedcourse/'.$cat->id)}}=" data-parsley-validate class="form-horizontal form-label-left">
									{{ csrf_field() }}
									{{ method_field('DELETE') }}
									<button type="submit" class="btn-null table-delete"><i class='bx bx-trash'></i></button>
								</form>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<!--Model start-->
	<div class="modal fade" id="myModalabc" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-md" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
							aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel"> {{ __('adminstaticword.Add') }}
						{{ __('adminstaticword.RelatedCourse') }}</h4>
				</div>
				<div class="box box-primary">
					<div class="panel panel-sum">
						<div class="modal-body">
							<form id="demo-form2" method="post" action="{{ route('relatedcourse.store') }}"
								data-parsley-validate>
								{{ csrf_field() }}

								<input type="hidden" class="form-control" name="user_id" id="user_id"
									value="{{ $cor->user_id }}">

								<div class="row display-none">
									<div class="col-xs-12">
										<div class="form-group">
											<label for="main_course_id">{{ __('adminstaticword.Course') }}</label>
											<select id="main_course_id" name="main_course_id" class="form-control">
												<option value="{{ $cor->id }}">{{ $cor->title }}</option>
											</select>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-xs-12">
										<div class="form-group">
											<label for="course_id">{{ __('adminstaticword.RelatedCourse') }}:<sup
													class="redstar">*</sup></label>
											@php
											$courses = App\Course::all();
											@endphp
											<select id="course_id" name="course_id"
												class="form-control js-example-basic-single">
												@foreach($courses as $course)
												@if($course->id !== $cor->id)
												<option value="{{ $course->id }}">{{ $course->title }}</option>
												@endif
												@endforeach
											</select>
											<small class="txt-desc"> {{ __('adminstaticword.Select') }}
												{{ __('adminstaticword.RelatedCourse') }}</small>
										</div>
									</div>
									
									<div class="col-xs-12">
										<label>{{ __('adminstaticword.Status') }}:</label>
										<div class="toggler">
											<input hidden id="c2" type="checkbox" />
											<label class="main-toggle toggle-lg" for="c2">
												<span data-off="{{ __('adminstaticword.Deactive') }}" data-on="{{ __('adminstaticword.Active') }}"></span>
											</label>
										</div>
										<input type="hidden" name="status" value="1" id="t2">
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
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--Model close -->
</section>