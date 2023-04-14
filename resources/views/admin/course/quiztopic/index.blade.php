<section class="content h-100">
	<div class="row h-100">
		<div class="col-xs-12">
			<a data-toggle="modal" data-target="#myModaltopic" href="#" class="btn btn-info btn-sm">+
				{{ __('adminstaticword.Add') }}</a>

			<br>
			<br>
			<div class="table-responsive h-100">
				<table id="example1" class="table table-bordered table-striped">

					<thead>
						<th>#</th>
						<th>{{ __('adminstaticword.Question') }}</th>
						<th>{{ __('adminstaticword.Marks') }}</th>
						<th>{{ __('adminstaticword.Status') }}</th>
						<th>{{ __('adminstaticword.Reattempt') }}</th>
						<th>{{ __('adminstaticword.DueDays') }}</th>
						<th>{{ __('adminstaticword.Type') }}</th>
						<th>{{ __('adminstaticword.Action') }}</th>
					</thead>
					<tbody>
						<?php $i=0;?>
						@foreach($topics as $topic)
						<tr>
							<?php $i++;?>
							<td><?php echo $i;?></td>
							<td>{{$topic->title}}</td>
							<td>{{$topic->per_q_mark}}</td>

							<td>
								@if($topic->status==1)
								<span class="table-status status-approved">
									{{ __('adminstaticword.Active') }}
								</span>
								@else
								<span class="table-status status-rejected">
									{{ __('adminstaticword.Deactive') }}
								</span>
								@endif
							</td>
							<td>
								@if($topic->quiz_again==1)
								<span class="table-status status-approved">
									{{ __('adminstaticword.Yes') }}
								</span>
								@else
								<span class="table-status status-rejected">
									{{ __('adminstaticword.No') }}
								</span>
								@endif
							</td>
							<td>

								@if($topic->due_days)
								{{$topic->due_days}}
								@else
								-
								@endif
							</td>

							<td>
								@if($topic->type==1)
								{{ __('adminstaticword.Subjective') }}
								@else
								{{ __('adminstaticword.Objective') }}
								@endif
							</td>

							<td>
								<div class="btn-group">
									<button type="button" class="btn btn-default">{{ __('adminstaticword.Action') }}</button>
									<button type="button" class="btn btn-default dropdown-toggle"
										data-toggle="dropdown">
										<span class="caret"></span>
										<span class="sr-only">Toggle Dropdown</span>
									</button>
									<ul class="dropdown-menu" role="menu">
										<li><a href="{{url('admin/quiztopic/'.$topic->id)}}">{{ __('adminstaticword.Edit') }}</a></li>
										<li><a href="{{route('answersheet', $topic->id)}}">{{ __('adminstaticword.Delete') }} {{ __('adminstaticword.Answer') }}</a></li>
										<li><a href="{{route('questions.show', $topic->id)}}">{{ __('adminstaticword.Add') }} {{ __('adminstaticword.Question') }}</a></li>
										<li><a href="{{route('show.quizreport', $topic->id)}}">{{ __('adminstaticword.Show') }} {{ __('adminstaticword.Report') }}</a></li>
										<li class="divider"></li>
										<li>
											<form method="post" action="{{url('admin/quiztopic/'.$topic->id)}}"
												data-parsley-validate class="form-horizontal form-label-left">
												{{ csrf_field() }}
												{{ method_field('DELETE') }}
												<button type="submit" class="btn-null table-delete"
													title="Delete">{{ __('adminstaticword.Delete') }}</button>
											</form>
										</li>
									</ul>
								</div>

							</td>
						</tr>
						@endforeach

					</tbody>
				</table>
			</div>


		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->

	<!--Model start-->
	<div class="modal fade" id="myModaltopic" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-md" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
							aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel"> {{ __('adminstaticword.Add') }}
						{{ __('adminstaticword.Quiz') }}</h4>
				</div>
				<div class="box box-primary">
					<div class="panel panel-sum">
						<div class="modal-body">
							<form id="demo-form2" method="post" action="{{url('admin/quiztopic/')}}"
								data-parsley-validate>
								{{ csrf_field() }}

								<input type="hidden" name="course_id" value="{{ $cor->id }}" />


								<div class="row">
									<div class="col-xs-12">
										<div class="form-group">
											<label for="quiztitle">{{ __('adminstaticword.QuizTopic') }}:<span
													class="redstar">*</span> </label>
											<input type="text" placeholder="Enter Quiz Topic" class="form-control "
												name="title" id="quiztitle" value="">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-xs-12">
										<div class="form-group">
											<label for="description">{{ __('adminstaticword.QuizDescription') }}:<sup
													class="redstar">*</sup></label>
											<textarea id="description" name="description" rows="3" class="form-control"></textarea>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-xs-12">
										<div class="form-group">
											<label for="per_q_mark">{{ __('adminstaticword.Marks') }}:<span
													class="redstar">*</span> </label>
											<input type="number" placeholder="Enter Per Question Mark" class="form-control "
												name="per_q_mark" id="per_q_mark" value="">
										</div>
									</div>
								</div>

								<div class="row display-none">
									<div class="col-xs-12">
										<div class="form-group">
											<label for="timer">{{ __('adminstaticword.QuizTimer') }}:<span
													class="redstar">*</span> </label>
											<input type="text" placeholder="Enter Quiz Time" class="form-control"
												name="timer" id="timer" value="1">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-xs-12">
										<div class="form-group">
											<label for="due_days">{{ __('adminstaticword.Days') }}:</label>
											<small>(Days after quiz will start when user enroll in course)</small>
											<input type="text" placeholder="Enter Due Days" class="form-control"
												name="due_days" id="due_days">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-xs-12 col-md-4">
										<div class="form-group">
											<label>{{ __('adminstaticword.Status') }}:</label>
											<div class="toggler">
												<input hidden id="c18" name="status" type="checkbox" />
												<label class="main-toggle toggle-lg" for="c18">
													<span data-off="{{ __('adminstaticword.Deactive') }}" data-on="{{ __('adminstaticword.Active') }}"></span>
												</label>
											</div>
											<input type="hidden" name="free" value="1" id="t18">
										</div>
									</div>

									<div class="col-xs-12 col-md-4">
										<div class="form-group">
											<label>{{ __('adminstaticword.QuizReattempt') }}:</label>
											<div class="toggler">
												<input hidden id="111" type="checkbox" name="quiz_again">
												<label class="main-toggle toggle-lg" for="111">
													<span data-off="{{ __('adminstaticword.Disable') }}" data-on="{{ __('adminstaticword.Enable') }}"></span>
												</label>
											</div>
											<input type="hidden" name="free" value="0" for="status" id="13">
										</div>
									</div>


									<div class="col-xs-12 col-md-4">
										<div class="form-group">
											<label>{{ __('adminstaticword.QuizType') }}:</label>
											<div class="toggler">
												<input hidden id="type111" type="checkbox" name="type">
												<label class="main-toggle toggle-lg" for="type111">
													<span data-off="{{ __('adminstaticword.Objective') }}" data-on="{{ __('adminstaticword.Subjective') }}"></span>
												</label>
											</div>
											<input type="hidden" name="free" value="0" for="status" id="13">
										</div>
									</div>
								</div>

								<div class="box-footer">
									<div class="row">
										<div class="col-xs-9"></div>
										<button type="submit" value="Add Answer" class="btn btn-md col-xs-3 btn-primary">+
											{{ __('adminstaticword.Save') }}</button>
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