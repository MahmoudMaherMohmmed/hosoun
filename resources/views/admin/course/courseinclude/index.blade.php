<section class="content">

	<div class="row">
		<div class="col-xs-12">
			<a data-toggle="modal" data-target="#myModalJ" href="#" class="btn btn-info btn-sm">+
				{{ __('adminstaticword.Add') }}</a>
			<br>
			<br>
			<div class="table-responsive">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>{{ __('adminstaticword.Course') }}</th>
							<th>{{ __('adminstaticword.Icon') }}</th>
							<th>{{ __('adminstaticword.Detail') }}</th>
							<th>{{ __('adminstaticword.Status') }}</th>
							<th>{{ __('adminstaticword.Edit') }}</th>
							<th>{{ __('adminstaticword.Delete') }}</th>
						</tr>
					</thead>

					<tbody>
						<?php $i=0;?>
						@foreach($courseinclude as $cat)
						<?php $i++;?>
						<tr>
							<td><?php echo $i;?></td>
							<td>{{$cat->courses->title}}</td>
							<td>{{$cat->icon}}</td>
							<td>{{ strip_tags($cat->detail) }}</td>
							<td>
								
								
								<form action="{{ route('include.quick',$cat->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    <button  type="Submit" class="btn btn-xs {{ $cat->status ==1 ? 'btn-success' : 'btn-danger' }}">
                                      @if($cat->status ==1)
                                        {{ __('adminstaticword.Active') }}
                                      @else
                                        {{ __('adminstaticword.Deactive') }}
                                      @endif
                                    </button>
                                </form>

							</td>
							<td>
								<a class="table-edit" href="{{url('courseinclude/'.$cat->id)}}">
									<i class='bx bx-edit'></i></a>
							</td>

							<td>
								<form method="post" action="{{url('courseinclude/'.$cat->id)}}" data-parsley-validate class="form-horizontal form-label-left">
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
	<div class="modal fade" id="myModalJ" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
							aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">{{ __('adminstaticword.Add') }}
						{{ __('adminstaticword.CourseInclude') }}</h4>
				</div>
				<div class="box box-primary">
					<div class="panel panel-sum">
						<div class="modal-body">
							<form id="demo-form2" method="post" action="{{ route('courseinclude.store') }}"
								data-parsley-validate>
								{{ csrf_field() }}
                                

								<div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group">
        									<label for="course_id">{{ __('adminstaticword.CourseName') }}:</label>
            								<select id="course_id" name="course_id" class="form-control">
            									<option value="{{ $cor->id }}">{{ $cor->title }}</option>
            								</select>
                                        </div>    
                                    </div>
									<div class="col-xs-12">
										<div class="form-group">
											<label for="icon">{{ __('adminstaticword.Icon') }}:<sup
													class="redstar">*</sup></label>
											<input id="icon" type="text" name="icon" class="form-control icp-auto icp"
												autocomplete="off" required>
										</div>
									</div>
									<div class="col-xs-12">
										<div class="form-group">
											<label for="detail">{{ __('adminstaticword.Detail') }}:<sup
													class="redstar">*</sup></label>
											<textarea id="detail" rows="1" name="detail" class="form-control"></textarea>
										</div>
									</div>
    								<div class="col-xs-12">
    									<div class="form-group">
    										<label>{{ __('adminstaticword.Status') }}:</label>
    										<div class="toggler">
    											<input hidden id="status" type="checkbox" name="status">
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