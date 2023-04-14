<form action="{{ route('update.mail.set') }}" method="POST">
	{{ csrf_field() }}
	<div class="row">
		<div class="col-xs-12 col-md-6">
			<div class="form-group">
				<label for="MAIL_FROM_NAME">{{ __('adminstaticword.SenderName') }}:</label>
				<input id="MAIL_FROM_NAME" value="{{ $env_files['MAIL_FROM_NAME'] }}" type="text" name="MAIL_FROM_NAME" placeholder="Enter sender name" class="{{ $errors->has('MAIL_FROM_NAME') ? ' is-invalid' : '' }} form-control">
				@if ($errors->has('email'))
					<span class="text-danger invalid-feedback" role="alert">
						<strong>{{ $errors->first('MAIL_FROM_NAME') }}</strong>
					</span>
				@endif
			</div>
            
			<div class="form-group">
				<label for="MAIL_DRIVER">{{ __('adminstaticword.MAILDRIVER') }}: (ex. SMTP,MAIL)</label>
				<input id="MAIL_DRIVER" value="{{ $env_files['MAIL_DRIVER'] }}" type="text" name="MAIL_DRIVER" placeholder="Enter mail driver" class="{{ $errors->has('MAIL_DRIVER') ? ' is-invalid' : '' }} form-control">
				@if ($errors->has('MAIL_DRIVER'))
					<span class="text-danger invalid-feedback" role="alert">
						<strong>{{ $errors->first('MAIL_DRIVER') }}</strong>
					</span>
				@endif
			</div>
            
			<div class="form-group">
				<label for="MAIL_HOST">{{ __('adminstaticword.MAILHOST') }}:<sup class="redstar">*</sup> (ex. smtp.mailtrap.io)</label> 
				<input id="MAIL_HOST" value="{{ $env_files['MAIL_HOST'] }}" type="text" name="MAIL_HOST" placeholder="Enter mail host" class="{{ $errors->has('MAIL_HOST') ? ' is-invalid' : '' }} form-control" required>
				@if ($errors->has('MAIL_HOST'))
					<span class="text-danger invalid-feedback" role="alert">
						<strong>{{ $errors->first('MAIL_HOST') }}</strong>
					</span>
				@endif
			</div>

            <div class="form-group">
				<label for="MAIL_PORT">{{ __('adminstaticword.MAILPORT') }}:<sup class="redstar">*</sup> (ex. 2525,467)</label>
				<input id="MAIL_PORT" value="{{ $env_files['MAIL_PORT'] }}" type="text" name="MAIL_PORT" placeholder="Enter mail port" class="{{ $errors->has('MAIL_PORT') ? ' is-invalid' : '' }} form-control" required>
				@if ($errors->has('MAIL_PORT'))
					<span class="text-danger invalid-feedback" role="alert">
						<strong>{{ $errors->first('MAIL_PORT') }}</strong>
					</span>
				@endif
			</div>

        </div>
        <div class="col-xs-12 col-md-6">
			<div class="form-group">
				<label for="MAIL_FROM_ADDRESS">{{ __('adminstaticword.MAILADDRESS') }}:<sup class="redstar">*</sup></label>
				<input id="MAIL_FROM_ADDRESS" value="{{ $env_files['MAIL_FROM_ADDRESS'] }}" type="text" name="MAIL_FROM_ADDRESS" placeholder="Enter mail username" class="{{ $errors->has('MAIL_FROM_ADDRESS') ? ' is-invalid' : '' }} form-control" required>
				@if ($errors->has('MAIL_USERNAME'))
					<span class="text-danger invalid-feedback" role="alert">
						<strong>{{ $errors->first('MAIL_FROM_ADDRESS') }}</strong>
					</span>
				@endif
			</div>

            
			<div class="form-group">
				<label for="MAIL_USERNAME">{{ __('adminstaticword.MAILUSERNAME') }}:<sup class="redstar">*</sup> (ex. info@test.com)</label>
				<input id='MAIL_USERNAME' value="{{ $env_files['MAIL_USERNAME'] }}" type="text" name="MAIL_USERNAME" placeholder="Enter mail username" class="{{ $errors->has('MAIL_USERNAME') ? ' is-invalid' : '' }} form-control" required>
				@if ($errors->has('MAIL_USERNAME'))
					<span class="text-danger invalid-feedback" role="alert">
						<strong>{{ $errors->first('MAIL_USERNAME') }}</strong>
					</span>
				@endif
			</div>
            


			<div class="form-group">
				<div class="eyeCy">
					<label for="password-field">{{ __('adminstaticword.MAILPASSWORD') }}:<sup class="redstar">*</sup> </label>
					<input id="password-field" value="{{ $env_files['MAIL_PASSWORD'] }}" type="password" name="MAIL_PASSWORD" placeholder="Enter mail password" class="{{ $errors->has('MAIL_PASSWORD') ? ' is-invalid' : '' }} form-control" required> 
					<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
				</div>
				@if($errors->has('MAIL_PASSWORD'))
					<span class="text-danger invalid-feedback form-control" role="alert">
						<strong>{{ $errors->first('MAIL_PASSWORD') }}</strong>
					</span>
				@endif
			</div>

            
            <div class="form-group">
				<label for="MAIL_ENCRYPTION">{{ __('adminstaticword.MAILENCRYPTION') }}: (ex. TLS/SSL)</label>
				<input id="MAIL_ENCRYPTION" value="{{ $env_files['MAIL_ENCRYPTION'] }}" type="text" name="MAIL_ENCRYPTION" placeholder="Enter mail encryption" class="{{ $errors->has('MAIL_ENCRYPTION') ? ' is-invalid' : '' }} form-control">
				@if ($errors->has('MAIL_ENCRYPTION'))
					<span class="text-danger invalid-feedback" role="alert">
						<strong>{{ $errors->first('MAIL_ENCRYPTION') }}</strong>
					</span>
				@endif
			</div>
			
            
		</div>
	</div>
    
    <br/>
	<div class="row">
		<div class="col-xs-9 col-md-10"></div>
		<div class="col-xs-3 col-md-2">
			<button type="submit" class="btn btn-md btn-primary col-xs-12"><i class="fa fa-save"></i> {{ __('adminstaticword.Save') }}</button>
		</div>
	</div>
</form>