<div class="form-group{{ $errors->has('css') ? ' has-error' : '' }}">
	<form action="{{ route('css.store') }}" method="POST">
		{{ csrf_field() }}

		<div class="row">
			<div class="col-xs-12">
				<div class="form-group">
					<label for="css">{{ __('adminstaticword.CustomCSS') }}:</label>
					<small class="text-danger">{{ $errors->first('css','CSS Cannot be blank !') }}</small>
					<textarea placeholder="a {
					  color:red;
					}" id="css" class="form-control" name="css" rows="10" cols="30">{{ $css }}</textarea>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-9 col-md-10"></div>
			<div class="col-xs-3 col-md-2">
				<button type="submit" class="btn btn-md btn-primary flex-row-center-all col-xs-12">
					<i class='bx bx-save me' ></i> {{ __('adminstaticword.ADDCSS') }}
				</button>
			</div>
		</div>

	</form>
</div>


<br/>


<div class="form-group{{ $errors->has('js') ? ' has-error' : '' }}">
	<form action="{{ route('js.store') }}" method="POST">
		{{ csrf_field() }}

		<div class="row">
			<div class="col-xs-12">
				<div class="form-group">
					<label for="js">{{ __('adminstaticword.CustomJS') }}:</label>
					<small class="text-danger">{{ $errors->first('js','Javascript Cannot be blank !') }}</small>
					<textarea placeholder="$(document).ready(function{
					  //code
					});" id="js" class="form-control" name="js" rows="10" cols="30">{{ $js }}</textarea>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-9 col-md-10"></div>
			<div class="col-xs-3 col-md-2">
				<button type="submit" class="btn btn-md btn-primary flex-row-center-all col-xs-12">
					<i class='bx bx-save me' ></i>> {{ __('adminstaticword.ADDJS') }}
				</button>
			</div>
		</div>

	</form>
</div>