@extends("admin/layouts.master")
@section('title', __('adminstaticword.Import') . ' ' . __('adminstaticword.Question'))
@section("body")

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
	<div class="box box-primary">
		<div class="box-header with-header">
			<h3 class="box-title">{{ __('adminstaticword.Import') }} {{ __('adminstaticword.Question') }}</h3>
			<a href="{{ url()->previous() }}" class="btn btn-success pull-right owtbtn">
                {{ __('adminstaticword.Back') }}
            </a>
		</div>

		<div class="box-body">

			<form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
				{{ csrf_field() }}

				<div class="row">
					<div class="form-group col-xs-12">
						<div class="form-group">
							<label for="file">{{ __('adminstaticword.Select') }} xls/csv {{ __('adminstaticword.File') }} :</label>
                            <div>
							    <input id="file" {{ __('adminstaticword.Required') }}="" type="file" name="file" class="inputfile inputfile-1">
                                <label for="file"><svg xmlns="http://www.w3.org/2000/svg" width="50"
                                        height="30" viewBox="0 0 20 17">
                                        <path
                                            d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
                                    </svg> <span>{{ __('adminstaticword.Chooseafile') }}</span>
                                </label>
                            </div>
							@if ($errors->has('file'))
							<span class="invalid-feedback text-danger" role="alert">
								<strong>{{ $errors->first('file') }}</strong>
							</span>
							@endif
						</div>
						<p></p>
						<button type="submit" class="btn bg-primary btn-sm">{{ __('adminstaticword.Submit') }}</button>
					</div>


				</div>

			</form>

		</div>
	</div>

	<div class="box box-primary">
		<div class="box-header with-border">
			<div class="box-title">{{ __('adminstaticword.Instructions') }}</div>
		</div>

		<div class="box-body">
			<p>The columns of the upload file should be in the following order.</p>

			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Column No</th>
							<th>Column Name</th>
							<th>{{ __('adminstaticword.Description') }}</th>
						</tr>
					</thead>
	
					<tbody>
						<tr>
							<td>1</td>
							<td><b>{{ __('adminstaticword.Course') }}</b> ({{ __('adminstaticword.Required') }})</td>
							<td>{{ __('adminstaticword.CourseName') }}</td>
						</tr>
	
						<tr>
							<td>2</td>
							<td><b>{{ __('adminstaticword.QuizTopic') }}</b> ({{ __('adminstaticword.Required') }})</td>
							<td>{{ __('adminstaticword.QuizTopic') }} {{ __('adminstaticword.Name') }}</td>
						</tr>
	
						<tr>
							<td>3</td>
							<td><b>{{ __('adminstaticword.Question') }}</b> ({{ __('adminstaticword.Required') }})</td>
							<td>{{ __('adminstaticword.Question') }} {{ __('adminstaticword.Name') }}</td>
						</tr>
	
						<tr>
							<td>4</td>
							<td><b>{{ __('adminstaticword.A') }}</b> ({{ __('adminstaticword.Required') }})</td>
							<td>{{ __('adminstaticword.AOption') }}</td>
						</tr>
	
						<tr>
							<td>5</td>
							<td><b>{{ __('adminstaticword.C') }}</b> ({{ __('adminstaticword.Required') }})</td>
							<td>{{ __('adminstaticword.BOption') }}</td>
						</tr>
	
						<tr>
							<td>6</td>
							<td><b>{{ __('adminstaticword.C') }}</b> ({{ __('adminstaticword.Required') }})</td>
							<td>{{ __('adminstaticword.COption') }}</td>
						</tr>
	
						<tr>
							<td>7</td>
							<td><b>{{ __('adminstaticword.D') }}</b> ({{ __('adminstaticword.Required') }})</td>
							<td>{{ __('adminstaticword.DOption') }}</td>
						</tr>
	
						<tr>
							<td>8</td>
							<td><b>CorrectAnswer</b> ({{ __('adminstaticword.Required') }})</td>
							<td>Question correct answer -> options ({{ __('adminstaticword.A') }},{{ __('adminstaticword.B') }},{{ __('adminstaticword.C') }},{{ __('adminstaticword.D') }})</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>
@endsection