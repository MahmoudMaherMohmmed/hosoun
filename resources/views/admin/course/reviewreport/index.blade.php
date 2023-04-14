<section class="content">
	@include('admin.message')
	<div class="row">
		<div class="col-xs-12">
			<div class="box-body">
				<div class="table-responsive">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th>{{ __('adminstaticword.User') }}</th>
								<th>{{ __('adminstaticword.Course') }}</th>
								<th>{{ __('adminstaticword.Title') }}</th>
								<th>{{ __('adminstaticword.Email') }}</th>
								<th>{{ __('adminstaticword.Detail') }}</th>
								<th>{{ __('adminstaticword.Edit') }}</th>
								<th>{{ __('adminstaticword.Delete') }}</th>
							</tr>
						</thead>
						<tbody>
							<?php $i=0;?>
							@foreach($reports as $report)
							<?php $i++;?>
							<tr>
								<td><?php echo $i;?></td>
								<td>{{$report->user['fname']}}</td>
								<td>{{$report->courses['title']}}</td>
								<td>{{$report->title}}</td>
								<td>{{$report->email}}</td>
								<td>{{$report->detail}}</td>
								<td>
									<a class="table-edit" href="{{url('reports/'.$report->id)}}">
										<i class='bx bx-edit'></i></a>
								</td>
								<td>
									<form method="post" action="{{url('reports/'. $report->id)}}" data-parsley-validate class="form-horizontal form-label-left">
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
			<!-- /.box-body -->
		</div>
	</div>
	<!-- /.row -->
</section>