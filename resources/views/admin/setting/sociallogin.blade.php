<div class="row">
	{{-- Facebook --}}
	<div class="col-xs-12 col-md-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-facebook"></i> {{ __('adminstaticword.FacebookLoginSetting') }}
				</h3>
			</div>
			<div class="panel-body">
				<form action="{{ route('sl.fb') }}" method="POST">
					@csrf

					<div class="row">
						<div class="col-xs-12">
							<div class="form-group">
								<label for="FACEBOOK_CLIENT_ID">{{ __('adminstaticword.ClientID') }}:</label>
								<input id="FACEBOOK_CLIENT_ID" type="text" placeholder="enter client ID" class="form-control" name="FACEBOOK_CLIENT_ID"
									value="{{ $env_files['FACEBOOK_CLIENT_ID'] }}">
							</div>

							<div class="form-group">
								<div class="eyeCy">
									<label for="fb_secret">{{ __('adminstaticword.ClientSecretKey') }}:</label>
									<input type="password" placeholder="enter secret key" class="form-control" id="fb_secret"
										name="FACEBOOK_CLIENT_SECRET" value="{{ $env_files['FACEBOOK_CLIENT_SECRET'] }}">
									<span toggle="#fb_secret" class="fa fa-fw fa-eye field-icon toggle-password2"></span>
								</div>
							</div>

							<div class="form-group">
								<label for="FACEBOOK_CALLBACK_URL">{{ __('adminstaticword.CallbackURL') }}:</label>
								<input id="FACEBOOK_CALLBACK_URL" type="text" placeholder="https://yoursite.com/public/auth/facebook/callback"
									name="FACEBOOK_CALLBACK_URL" value="{{ $env_files['FACEBOOK_CALLBACK_URL'] }}"
									class="form-control">
								<small class="text-muted"><i class="fa fa-question-circle"></i> use callback url
									<b>{{ url('auth/facebook/callback') }}</b></small>
							</div>
							
							<div class="form-group">
								<label><i class="fa fa-facebook-square"></i> {{ __('adminstaticword.EnableFacebookLogin') }}: </label>
								<div class="toggler">
									<input {{ $gsetting->fb_login_enable==1 ? 'checked' : '' }} hidden name="fb_enable"
										id="fb_enable" type="checkbox" />
									<label class="main-toggle toggle-lg {{ $gsetting->fb_login_enable==1 ? 'on' : '' }}" for="fb_enable">
										<span data-off="{{ __('adminstaticword.Disable') }}" data-on="{{ __('adminstaticword.Enable') }}"></span>
									</label>
								</div>
							</div>

						</div>
					</div>
					
					<div class="row">
						<div class="col-xs-9"></div>
						<div class="col-xs-3">
							<button type="submit" class="btn btn-md btn-primary flex-row-center-all col-xs-12">
								<i class='bx bx-save me' ></i> {{ __('adminstaticword.Save') }}
							</button>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>

	{{-- Google --}}
	<div class="col-xs-12 col-md-6">
		<div class="panel panel-danger">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-google"></i> {{ __('adminstaticword.GoogleLoginSetting') }}</h3>
			</div>
			<div class="panel-body">
				<form action="{{ route('sl.gl') }}" method="POST">
					@csrf

					<div class="row">
						<div class="col-xs-12">

							<div class="form-group">
								<label for="GOOGLE_CLIENT_ID">{{ __('adminstaticword.ClientID') }}:</label>
								<input id="GOOGLE_CLIENT_ID" name="GOOGLE_CLIENT_ID" type="text" placeholder="enter client ID" class="form-control"
									value="{{ $env_files['GOOGLE_CLIENT_ID'] }}">
							</div>

							<div class="form-group">
								<div class="eyeCy">
									<label for="gsecret">{{ __('adminstaticword.ClientSecretKey') }}:</label>
									<input type="password" name="GOOGLE_CLIENT_SECRET"
										value="{{ $env_files['GOOGLE_CLIENT_SECRET'] }}" placeholder="enter secret key"
										class="form-control" id="gsecret">
									<span toggle="#gsecret"
										class="fa fa-fw fa-eye field-icon toggle-password3 display-inline-flex"></span>
								</div>
							</div>
							
							<div class="form-group">
								<label for="GOOGLE_CALLBACK_URL">{{ __('adminstaticword.CallbackURL') }}:</label>
								<input id="GOOGLE_CALLBACK_URL" type="text" placeholder="https://yoursite.com/public/auth/google/callback"
									name="GOOGLE_CALLBACK_URL" value="{{ $env_files['GOOGLE_CALLBACK_URL'] }}" class="form-control">
								<small class="text-muted"><i class="fa fa-question-circle"></i> use callback url
									<b>{{ url('auth/google/callback') }}</b></small>
							</div>

							<div class="form-group">
								<label><i class="fa fa-google"></i> {{ __('adminstaticword.EnableGoogleLogin') }}: </label>
								<div class="toggler">
									<input name="google_enable" {{ $setting->google_login_enable ==1 ? 'checked' : "" }}
										hidden id="ggl_enable" type="checkbox" />
									<label class="main-toggle toggle-lg {{ $setting->google_login_enable ==1 ? 'on' : "" }}" for="ggl_enable">
										<span data-off="{{ __('adminstaticword.Disable') }}" data-on="{{ __('adminstaticword.Enable') }}"></span>
									</label>
								</div>
							</div>

						</div>
					</div>
					

					<div class="row">
						<div class="col-xs-9"></div>
						<div class="col-xs-3">
							<button type="submit" class="btn btn-md btn-primary flex-row-center-all col-xs-12">
								<i class='bx bx-save me' ></i> {{ __('adminstaticword.Save') }}
							</button>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>

	{{-- Gitlab --}}
	<div class="col-xs-12 col-md-6">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-gitlab"></i> {{ __('adminstaticword.GitLabLoginSetting') }}</h3>
			</div>
			<div class="panel-body">
				<form action="{{ route('sl.git') }}" method="POST">
					@csrf

					<div class="row">
						<div class="col-xs-12">
							<div class="form-group">
								<label for="GITLAB_CLIENT_ID"> {{ __('adminstaticword.ClientID') }}:</label>
								<input id="GITLAB_CLIENT_ID" name="GITLAB_CLIENT_ID" type="text" placeholder="enter client ID" class="form-control"
									value="{{ $env_files['GITLAB_CLIENT_ID'] }}" >
							</div>

							<div class="form-group">
								<div class="eyeCy">
									<label for="tsecret"> {{ __('adminstaticword.ClientSecretKey') }}:</label>
									<input type="password" name="GITLAB_CLIENT_SECRET"
										value="{{ $env_files['GITLAB_CLIENT_SECRET'] }}" placeholder="enter secret key"
										class="form-control" id="tsecret">
									<span toggle="#tsecret" class="fa fa-fw fa-eye field-icon toggle-password4"></span>
								</div>
							</div>

							<div class="form-group">
								<label for="GITLAB_CALLBACK_URL"> {{ __('adminstaticword.CallbackURL') }}:</label>
								<i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top"
									title="https://yoursite.com/public/auth/gitlab/callback"></i>
								<input id="GITLAB_CALLBACK_URL" type="text" placeholder="https://yoursite.com/public/auth/gitlab/callback"
									name="GITLAB_CALLBACK_URL" value="{{ $env_files['GITLAB_CALLBACK_URL'] }}" class="form-control">
								<small class="text-muted"><i class="fa fa-question-circle"></i> use callback url
									<b>{{ url('auth/gitlab/callback') }}</b></small>
							</div>
							
							
							<div class="form-group">
								<label><i class="fa fa-gitlab"></i> {{ __('adminstaticword.EnableGitLabLogin') }}: </label>
								<div class="toggler">
									<input name="gitlab_enable" {{ $setting->gitlab_login_enable ==1 ? 'checked' : "" }}
										hidden id="git_enable" type="checkbox" />
									<label class="main-toggle toggle-lg {{ $setting->gitlab_login_enable ==1 ? 'on' : "" }}" for="git_enable">
										<span data-off="{{ __('adminstaticword.Disable') }}" data-on="{{ __('adminstaticword.Enable') }}"></span>
									</label>
								</div>
							</div>

						</div>
					</div>


					<div class="row">
						<div class="col-xs-9"></div>
						<div class="col-xs-3">
							<button type="submit" class="btn btn-md btn-primary flex-row-center-all col-xs-12">
								<i class='bx bx-save me' ></i> {{ __('adminstaticword.Save') }}
							</button>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>

	{{-- Amazon --}}
	<div class="col-xs-12 col-md-6">
		<div class="panel panel-warning">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-amazon"></i> {{ __('adminstaticword.AmazonLoginSetting') }}</h3>
			</div>
			<div class="panel-body">
				<form action="{{ route('sl.amazon') }}" method="POST">
					@csrf
					
					<div class="row">
						<div class="col-xs-12">
							<div class="form-group">
								<label for="AMAZON_LOGIN_ID"> {{ __('adminstaticword.ClientID') }}:</label>
								<input id="AMAZON_LOGIN_ID" name="AMAZON_LOGIN_ID" type="text" placeholder="enter client ID" class="form-control"
									value="{{ $env_files['AMAZON_LOGIN_ID'] }}" >
							</div>
							
		
							<div class="form-group">
								<div class="eyeCy">
									<label for="asecret"> {{ __('adminstaticword.ClientSecretKey') }}:</label>
									<input type="password" name="AMAZON_LOGIN_SECRET"
										value="{{ $env_files['AMAZON_LOGIN_SECRET'] }}" placeholder="enter secret key"
										class="form-control" id="asecret">
									<span toggle="#asecret" class="fa fa-fw fa-eye field-icon toggle-password5"></span>
								</div>
							</div>
		
							
							<div class="form-group">
								<label for="AMAZON_LOGIN_REDIRECT"> {{ __('adminstaticword.CallbackURL') }}:</label>
								<input id="AMAZON_LOGIN_REDIRECT" type="text" placeholder="https://yoursite.com/public/auth/amazon/callback"
									name="AMAZON_LOGIN_REDIRECT" value="{{ $env_files['AMAZON_LOGIN_REDIRECT'] }}"
									class="form-control">
								<small class="text-muted"><i class="fa fa-question-circle"></i> use callback url
									<b>{{ url('auth/amazon/callback') }}</b></small>
							</div>
							
							<div class="form-group">
								<label><i class="fa fa-amazon"></i> {{ __('adminstaticword.EnableAmazonLogin') }}: </label>
								<div class="toggler">
									<input name="amazon_enable" {{ $setting->amazon_enable ==1 ? 'checked' : "" }}
										hidden id="amazon_enable" type="checkbox" />
									<label class="main-toggle toggle-lg {{ $setting->amazon_enable ==1 ? 'on' : "" }}" for="amazon_enable">
										<span data-off="{{ __('adminstaticword.Disable') }}" data-on="{{ __('adminstaticword.Enable') }}"></span>
									</label>
								</div>
							</div>

						</div>
					</div>


					<div class="row">
						<div class="col-xs-9"></div>
						<div class="col-xs-3">
							<button type="submit" class="btn btn-md btn-primary flex-row-center-all col-xs-12">
								<i class='bx bx-save me' ></i> {{ __('adminstaticword.Save') }}
							</button>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>

	{{-- LinkedIn --}}
	<div class="col-xs-12 col-md-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-linkedin"></i> {{ __('adminstaticword.LinkedLoginSetting') }}
				</h3>
			</div>
			<div class="panel-body">
				<form action="{{ route('sl.linkedin') }}" method="POST">
					@csrf

					<div class="row">
						<div class="col-xs-12">
							<div class="form-group">
								<label for="LINKEDIN_CLIENT_ID"> {{ __('adminstaticword.ClientID') }}:</label>
								<input id="LINKEDIN_CLIENT_ID" name="LINKEDIN_CLIENT_ID" type="text" placeholder="enter client ID" class="form-control"
									value="{{ $env_files['LINKEDIN_CLIENT_ID'] }}" >
							</div>
							
		
							<div class="form-group">
								<div class="eyeCy">
									<label for="lisecret"> {{ __('adminstaticword.ClientSecretKey') }}:</label>
									<input type="password" name="LINKEDIN_CLIENT_SECRET"
										value="{{ $env_files['LINKEDIN_CLIENT_SECRET'] }}" placeholder="enter secret key"
										class="form-control" id="lisecret">
									<span toggle="#lisecret" class="fa fa-fw fa-eye field-icon toggle-password6"></span>
								</div>
							</div>
		
							<div class="form-group">
								<label for="LINKEDIN_CALLBACK_URL"> {{ __('adminstaticword.CallbackURL') }}:</label>
								<input id="LINKEDIN_CALLBACK_URL" type="text" placeholder="https://yoursite.com/public/auth/linkedin/callback"
									name="LINKEDIN_CALLBACK_URL" value="{{ $env_files['LINKEDIN_CALLBACK_URL'] }}"
									class="form-control">
								<small class="text-muted"><i class="fa fa-question-circle"></i> use callback url
									<b>{{ url('auth/linkedin/callback') }}</b></small>
							</div>
							
							
							<div class="form-group">
								<label><i class="fa fa-linkedin"></i> {{ __('adminstaticword.EnableLinkedLogin') }}: </label>
								<div class="toggler">
									<input name="linkedin_enable" {{ $setting->linkedin_enable == 1 ? 'checked' : "" }}
										hidden id="linkedin_enable" type="checkbox" />
									<label class="main-toggle toggle-lg {{ $setting->linkedin_enable == 1 ? 'on' : "" }}" for="linkedin_enable">
										<span data-off="{{ __('adminstaticword.Disable') }}" data-on="{{ __('adminstaticword.Enable') }}"></span>
									</label>
								</div>
							</div>
						</div>
					</div>


					<div class="row">
						<div class="col-xs-9"></div>
						<div class="col-xs-3">
							<button type="submit" class="btn btn-md btn-primary flex-row-center-all col-xs-12">
								<i class='bx bx-save me' ></i> {{ __('adminstaticword.Save') }}
							</button>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>

	{{-- Twitter --}}
	<div class="col-xs-12 col-md-6">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-twitter"></i> {{ __('adminstaticword.TwitterLoginSetting') }}
				</h3>
			</div>
			<div class="panel-body">
				<form action="{{ route('sl.twitter') }}" method="POST">
					@csrf


					<div class="row">
						<div class="col-xs-12">
							<div class="form-group">
								<label for="TWITTER_CLIENT_ID"> {{ __('adminstaticword.ClientID') }}:</label>
								<input id="TWITTER_CLIENT_ID" name="TWITTER_CLIENT_ID" type="text" placeholder="enter client ID" class="form-control"
									value="{{ $env_files['TWITTER_CLIENT_ID'] }}" >
							</div>
							
		
							<div class="form-group">
								<div class="eyeCy">
									<label for="twsecret"> {{ __('adminstaticword.ClientSecretKey') }}:</label>
									<input type="password" name="TWITTER_CLIENT_SECRET"
										value="{{ $env_files['TWITTER_CLIENT_SECRET'] }}" placeholder="enter secret key"
										class="form-control" id="twsecret">
									<span toggle="#twsecret" class="fa fa-fw fa-eye field-icon toggle-password7"></span>
								</div>
							</div>
		
							
							<div class="form-group">
								<label for="TWITTER_CALLBACK_URL"> {{ __('adminstaticword.CallbackURL') }}:</label>
								<input id="TWITTER_CALLBACK_URL" type="text" placeholder="https://yoursite.com/auth/public/twitter/callback"
									name="TWITTER_CALLBACK_URL" value="{{ $env_files['TWITTER_CALLBACK_URL'] }}"
									class="form-control">
								<small class="text-muted"><i class="fa fa-question-circle"></i> use callback url
									<b>{{ url('auth/twitter/callback') }}</b></small>
							</div>
							
							
							<div class="form-group">
								<label><i class="fa fa-twitter"></i> {{ __('adminstaticword.EnableTwitterLogin') }}: </label>
								<div class="toggler">
									<input name="twitter_enable" {{ $setting->twitter_enable == 1 ? 'checked' : "" }}
										hidden id="twitter_enable" type="checkbox" />
									<label class="main-toggle toggle-lg {{ $setting->twitter_enable == 1 ? 'on' : "" }}" for="twitter_enable">
										<span data-off="{{ __('adminstaticword.Disable') }}" data-on="{{ __('adminstaticword.Enable') }}"></span>
									</label>
								</div>
							</div>
						</div>
					</div>


					<div class="row">
						<div class="col-xs-9"></div>
						<div class="col-xs-3">
							<button type="submit" class="btn btn-md btn-primary flex-row-center-all col-xs-12">
								<i class='bx bx-save me' ></i> {{ __('adminstaticword.Save') }}
							</button>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>


</div>