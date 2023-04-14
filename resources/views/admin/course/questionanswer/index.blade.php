<section class="content">

	<div class="row">
		<div class="col-xs-12">
			<a data-toggle="modal" data-target="#myModalabcde" href="#" class="btn btn-info btn-sm">+
				{{ __('adminstaticword.Add') }}</a>
			<br>
			<br>
			<div class="table-responsive">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>{{ __('adminstaticword.Course') }}</th>
							<th>{{ __('adminstaticword.Question') }}</th>
							<th>{{ __('adminstaticword.Status') }}</th>
							<th>{{ __('adminstaticword.Edit') }}</th>
							<th>{{ __('adminstaticword.Delete') }}</th>
						</tr>
					</thead>
					<tbody>
						<?php $i=0;?>
						@foreach($questions as $que)
						<tr>
							<?php $i++;?>
							<td><?php echo $i;?></td>
							<td>{{$que->courses->title}}</td>
							<td>{{strip_tags($que->question)}}</td>
							<td>
								<form action="{{ route('ansr.quick',$que->id) }}" method="POST">
									{{ csrf_field() }}
									<button type="Submit"
										class="btn btn-xs table-status {{ $que->status ==1 ? 'btn-success' : 'btn-danger' }}">
										@if($que->status ==1)
										{{ __('adminstaticword.Active') }}
										@else
										{{ __('adminstaticword.Deactive') }}
										@endif
									</button>
								</form>
							</td>
							<td>
								<a class="table-edit" href="{{url('questionanswer/'.$que->id)}}"><i class='bx bx-edit'></i></a>
							</td>
							<td>
								<form method="post" action="{{url('questionanswer/'.$que->id)}}" data-parsley-validate
									class="form-horizontal form-label-left">
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
	<div class="modal fade" id="myModalabcde" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-md" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
							aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel"> {{ __('adminstaticword.Add') }}
						{{ __('adminstaticword.Question') }}</h4>
				</div>
				<div class="box box-primary">
					<div class="panel panel-sum">
						<div class="modal-body">
							<form id="demo-form2" method="post" action="{{ route('questionanswer.store') }}"
								data-parsley-validate>
								{{ csrf_field() }}

								<input type="hidden" name="instructor_id" class="form-control"
									value="{{ Auth::User()->id }}" />

									
									<div class="row">
									<div class="col-xs-12">
										<div class="form-group">
											<label for="course_id">{{ __('adminstaticword.Course') }}<span class="redstar">*</span></label>
											<select id="course_id" name="course_id" class="form-control">
												<option value="{{ $cor->id }}">{{ $cor->title }}</option>
											</select>
										</div>
									</div>
									<div class="col-xs-12">
										<div class="form-group">
											<label for="user_id">{{ __('adminstaticword.User') }}</label>
											<select id="user_id" name="user_id" class="form-control">
												<option value="{{ Auth::user()->id }}">{{ Auth::user()->fname }}</option>
											</select>
										</div>
									</div>
								</div>
								<br>

								<div class="row">
									<div class="col-xs-12">
										<div class="form-group">
											<label for="question">{{ __('adminstaticword.Question') }}:<sup
													class="redstar">*</sup></label>
											<textarea id="question" name="question" rows="3" class="form-control"
												placeholder="Enter Your Question"></textarea>
										</div>
									</div>
									<div class="col-xs-12">
										<div class="form-group">
											<label>{{ __('adminstaticword.Status') }}:</label>
											<div class="toggler">
												<input hidden id="c2222" type="checkbox" />
												<label class="main-toggle toggle-lg" for="c2222">
													<span data-off="{{ __('adminstaticword.Deactive') }}" data-on="{{ __('adminstaticword.Active') }}"></span>
												</label>
											</div>
											<input type="hidden" name="status" value="0" id="t2222">
										</div>
									</div>
								</div>


								<div class="box-footer">
									<div class="row">
										<div class="col-xs-9"></div>
										<button type="submit" class="btn btn-md col-xs-3 btn-primary">{{ __('adminstaticword.Submit') }}</button>
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