<form enctype="multipart/form-data" method="POST" action="{{ route('setting.store') }}">
	@csrf

	<div class="row">
		<div class="col-xs-12">
			<div class="form-group">
				<label>{{ __('adminstaticword.TextLogo') }}:</label>
			    <div class="toggler">
			        <input hidden id="opp" type="checkbox" name="project_logo" {{ $gsetting->logo_type == 'L' ? 'checked' : '' }}>
			        <label class="main-toggle toggle-lg {{ $gsetting->logo_type == 'L' ? 'on' : '' }}" for="opp">
						<span data-off="{{ __('adminstaticword.Text') }}" data-on="{{ __('adminstaticword.Logo') }}"></span>
					</label>
			    </div>
			    <input type="hidden" name="free" value="0" for="opp" id="oppp">
		    </div>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12 col-md-6">
			<div class="row">
				@if ($errors->has('logo'))
				<div class="display-none" id="logo">
                    <strong class="text-danger">{{ $errors->first('logo') }}</strong>
                </div>
                @endif
				<div class="col-xs-12 col-md-6">
					<div class="form-group">
						<label for="logo">{{ __('adminstaticword.Logo') }}</label>- <p class="inline info">{{ __('adminstaticword.Size') }}: 300x90</p>
						<div>
							<input type="file" name="logo" value="{{ $setting->logo }}" id="logo" class="{{ $errors->has('logo') ? ' is-invalid' : '' }} inputfile inputfile-1"/>
							<label for="logo"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="30" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>{{ __('adminstaticword.ChooseaLogo') }}</span>
							</label>
							<span class="text-danger invalid-feedback" role="alert"></span>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-md-4">
					<div class="well">
						@if($setting->logo !="")
							<div class="logo-settings">
								<img src="{{ asset('images/logo/'.$setting->logo) }}" alt="{{ $setting->logo }}" class="img-responsive">
							</div>
						@else
							<div class="alert alert-danger">
								{{ __('adminstaticword.Nologofound') }}
							</div>
						@endif
					</div>
				</div>
			</div>
			
		</div>
		<div class="col-xs-12 col-md-6">
			<div class="row">
				@if ($errors->has('footer_logo'))
				<div class="display-none" id="footer_logo">
                    <strong class="text-danger">{{ $errors->first('footer_logo') }}</strong>
                </div>
                @endif
				<div class="col-xs-12 col-md-6">
					<div class="form-group">
						<label for="footer_logo">{{ __('adminstaticword.footerlogo') }}</label>- <p class="inline info">{{ __('adminstaticword.Size') }}: 300x90</p>
						<div>
							<input type="file" name="footer_logo" value="{{ $setting->footer_logo }}" id="footer_logo" class="{{ $errors->has('footer_logo') ? ' is-invalid' : '' }} inputfile inputfile-1"/>
							<label for="footer_logo"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="30" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>{{ __('adminstaticword.ChooseaLogo') }}</span>
							</label>
							<span class="text-danger invalid-feedback" role="alert"></span>
						</div>
					</div>
				 	  
				</div>
				<div class="col-xs-12 col-md-4">
					<div class="well">
						@if($setting->footer_logo !="")
							<div class="logo-settings">
								<img src="{{ asset('images/logo/'.$setting->footer_logo) }}" alt="{{ $setting->footer_logo }}" class="img-responsive">
							</div>
						@else
							<div class="alert alert-danger">
								{{ __('adminstaticword.Nologofound') }}
							</div>
						@endif
					</div>
				</div>
			</div>
			
		</div>
	</div>


	<div class="row">
		<div class="col-xs-12 col-md-6">
			<div class="row">
				@if ($errors->has('favicon'))
                    <strong class="text-danger">{{ $errors->first('favicon') }}</strong>
                @endif
				<div class="col-xs-12 col-md-6">
					<label for="favi">{{ __('adminstaticword.Favicon') }}</label>- <p class="inline info">{{ __('adminstaticword.Size') }}: 35x35</p>
					<div>
						<input type="file" name="favicon" id="favi" class="{{ $errors->has('favicon') ? ' is-invalid' : '' }} inputfile inputfile-1"/>
						<label for="favi"><svg xmlns="http://www.w3.org/2000/svg" width="100" height="30" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>{{ __('adminstaticword.Chooseafavicon') }}</span>
						</label>
					</div>
				</div>
				<div class="col-xs-12 col-md-4">
					<div class="well">
						@if($setting->favicon !="")
							<div class="favicon-settings">
								<img src="{{ asset('images/favicon/'.$setting->favicon) }}" alt="{{ $setting->favicon }}" class="img-responsive">
							</div>
						@else
							<div class="alert alert-danger">
								{{ __('adminstaticword.NoFaviconfound') }}
							</div>
						@endif
					</div>

				</div>
			</div>
			
		</div>
		<div class="col-xs-12 col-md-6">
			<div class="row">
				@if ($errors->has('preloader_logo'))
				<div class="display-none" id="preloader_logo">
                    <strong class="text-danger">{{ $errors->first('preloader_logo') }}</strong>
                </div>
                @endif
				<div class="col-xs-12 col-md-6">
					<div class="form-group">
						<label for="preloader_logo">{{ __('adminstaticword.Preloaderlogo') }}</label>- <p class="inline info">{{ __('adminstaticword.Size') }}: 300x90</p>
						<div>
							<input type="file" name="preloader_logo" value="{{ $setting->preloader_logo }}" id="preloader_logo" class="{{ $errors->has('preloader_logo') ? ' is-invalid' : '' }} inputfile inputfile-1"/>
							<label for="preloader_logo"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="30" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>{{ __('adminstaticword.ChooseaLogo') }}</span>
							</label>
							<span class="text-danger invalid-feedback" role="alert"></span>
						</div>
					</div>
				 	  
				</div>
				<div class="col-xs-12 col-md-4">
					<div class="well">
						@if($setting->preloader_logo !="")
							<div class="logo-settings">
								<img src="{{ asset('images/logo/'.$setting->preloader_logo) }}" alt="{{ $setting->preloader_logo }}" class="img-responsive">
							</div>
						@else
							<div class="alert alert-danger">
								{{ __('adminstaticword.Nologofound') }}
							</div>
						@endif
					</div>
				</div>
			</div>
			
		</div>
	</div>

	

	<div class="row">
		<div class="col-xs-12 col-md-6">
			<div class="form-group">
				<label for="project_title">{{ __('adminstaticword.ProjectTitle') }}:<sup class="redstar">*</sup></label>
			  	<input id="project_title" value="{{ $setting->project_title }}" placeholder="Enter project title" name="project_title" type="text" class="{{ $errors->has('project_title') ? ' is-invalid' : '' }} form-control">
			  	@if ($errors->has('project_title'))
	                <span class="text-danger invalid-feedback" role="alert">
	                    <strong>{{ $errors->first('project_title') }}</strong>
	                </span>
	            @endif
	        </div>
		</div>
		<div class="col-xs-12 col-md-6">
			<div class="form-group">
				<label for="APP_URL">{{ __('adminstaticword.APPURL') }}:<sup class="redstar">*</sup></label>
				<input id="APP_URL" placeholder="http://localhost/" name="APP_URL" type="text" class="{{ $errors->has('APP_URL') ? ' is-invalid' : '' }} form-control" value="{{ $env_files['APP_URL'] }}" >
				  @if ($errors->has('APP_URL'))
					<span class="text-danger invalid-feedback" role="alert">
						<strong>{{ $errors->first('APP_URL') }}</strong>
					</span>
				@endif
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12">
			<label for="project_description">{{ __('adminstaticword.Description') }}:<sup class="redstar">*</sup></label>
            <textarea id="project_description" name="project_description" rows="4" class="form-control" required>{{ $setting->project_description }}</textarea>
		</div>
	</div>


	<div class="row">
		<div class="col-xs-12 col-md-6">
			<div class="form-group">
				<label for="phone">{{ __('adminstaticword.Contact') }}:<sup class="redstar">*</sup></label>
				<input id="phone" value="{{ $setting->default_phone }}" name="default_phone" type="text" class="{{ $errors->has('default_phone') ? ' is-invalid' : '' }} form-control" required>
			</div>
		</div>
		<div class="col-xs-12 col-md-6">
			<div class="form-group">
				<label for="wel_email">{{ __('adminstaticword.Email') }}:<sup class="redstar">*</sup></label>
				<input id="wel_email" value="{{ $setting->wel_email }}" name="wel_email" type="text" class="{{ $errors->has('wel_email') ? ' is-invalid' : '' }} form-control" required>
			</div>
		</div>
	</div>
	

	<div class="row">
		<div class="col-xs-12 col-md-6">
			<div class="form-group">
				<label for="cpy_txt">{{ __('adminstaticword.CopyrightText') }}:<sup class="redstar">*</sup></label>
				<input id="cpy_txt" value="{{ $setting->cpy_txt }}" name="cpy_txt" placeholder="Enter Copyright Text" type="text" required class="{{ $errors->has('cpy_txt') ? ' is-invalid' : '' }} form-control">
			</div>
		</div>
		<div class="col-xs-12 col-md-6">
			<div class="form-group">
				<label for="feature_amount">{{ __('adminstaticword.AmountFeatureCourse') }}:</label>
				<small>({{ __('adminstaticword.AmountFeatureCourseNote') }})</small>
				<input min="1" class="form-control" name="feature_amount" type="number" value="{{ $setting->feature_amount }}" id="feature_amount"  placeholder="Enter amount to feature course ex: 100" class="{{ $errors->has('feature_amount') ? ' is-invalid' : '' }} form-control">
			</div>
		</div>
	</div>
	

	<div class="row">
		<div class="col-xs-12">
			<label for="default_address">{{ __('adminstaticword.Address') }}:<sup class="redstar">*</sup></label>
            <textarea id="default_address" name="default_address" rows="2" class="form-control" placeholder="Enter your address" required>{{ $setting->default_address }}</textarea>
		</div>
	</div>
	

	<h4 class="box-title">{{ __('adminstaticword.MapCoordinates') }}</h4>
	<div class="row">
		<div class="col-xs-12 col-md-6">
			<div class="form-group">
				<label>{{ __('adminstaticword.MapEnable') }}:</label>
				<div class="toggler">              
					<input hidden id="map_enable" type="checkbox" name="map_enable" {{ $gsetting->map_enable == 'map' ? 'checked' : '' }} >
					<label class="main-toggle toggle-lg {{ $gsetting->map_enable == 'map' ? 'on' : '' }}" for="map_enable">
						<span  data-off="{{ __('adminstaticword.Image') }}" data-on="{{ __('adminstaticword.Map') }}"></span>
					</label>
				</div>
				<small>({{ __('adminstaticword.MapEnableNote') }})</small>
			</div>
		</div>
		<div class="col-xs-12 col-md-6">
			<div class="row" style="{{ $setting['map_enable'] == 'image' ? '' : 'display:none' }}" id="sec_one">
				<div class="col-xs-12 col-md-6">
					<div class="form-group">
						<label for="contact">{{ __('adminstaticword.ContactPageImage') }}:</label>
						<div>
							<input type="file" name="contact_image" value="{{ $setting->contact_image }}" id="contact" class="{{ $errors->has('contact_image') ? ' is-invalid' : '' }} inputfile inputfile-1">
							<label for="contact"><svg xmlns="http://www.w3.org/2000/svg" width="100" height="30" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>{{ __('adminstaticword.Chooseaimage') }}</span>
							</label>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-md-6">
					<div class="form-group">
						@if($setting->contact_image !="")
							<div class="contact-settings">
								<img src="{{ asset('images/contact/'.$setting->contact_image) }}" alt="{{ $setting->contact_image }}" class="img-responsive">
							</div>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
	

	<div class="row" style="{{ $setting['map_enable'] == 'map' ? '' : 'display:none' }}" id="sec1_one">
		<div class="col-xs-12 col-md-4">
			<div class="form-group">
				<label for="map_lat">{{ __('adminstaticword.MapLatitude') }}:</label>
				<input id="map_lat" value="{{ $setting->map_lat }}" name="map_lat" placeholder="Enter Latitude" type="text" class="{{ $errors->has('map_lat') ? ' is-invalid' : '' }} form-control">
			</div>
		</div>
		<div class="col-xs-12 col-md-4">
			<div class="form-group">
				<label for="map_long">{{ __('adminstaticword.MapLongitude') }}:</label>
				<input id="map_long" value="{{ $setting->map_long }}" name="map_long" placeholder="Enter Longitude" type="text" class="{{ $errors->has('map_long') ? ' is-invalid' : '' }} form-control">
			</div>
		</div>
		<div class="col-xs-12 col-md-4">
			<div class="form-group">
				<label for="map_api">{{ __('adminstaticword.MapApiKey') }}:</label>
				<input id="map_api" value="{{ $setting->map_api }}" name="map_api" placeholder="Enter Map Api" type="text" class="{{ $errors->has('map_api') ? ' is-invalid' : '' }} form-control">
			</div>
		</div>
	</div>
	
	<hr>

	<h4 class="box-title">{{ __('adminstaticword.PromoBar') }}</h4>
	<div class="row">
		<div class="col-xs-12 col-md-6">
		    <div class="form-group">
                <label>{{ __('adminstaticword.PromoEnable') }}: </label> (Enable Promobar on site)
                <div class="toggler">              
    	            <input hidden id="promo_enable" type="checkbox" name="promo_enable" {{ $gsetting->promo_enable == 1 ? 'checked' : '' }} >
    	            <label class="main-toggle toggle-lg {{ $gsetting->promo_enable == 1 ? 'on' : '' }}" for="promo_enable">
    					<span data-off="{{ __('adminstaticword.Disable') }}" data-on="{{ __('adminstaticword.Enable') }}"></span>
    				</label>
    	        </div>
		    </div>
		</div>
	</div>
	<div class="row" style="{{ $setting['promo_enable'] == 1 ? '' : 'display:none' }}" id="sec2_one">
		<div class="col-xs-12 col-md-6">
			<div class="form-group">
				<label for="promo_text">{{ __('adminstaticword.PromoText') }}:</label>
				<input id="promo_text" value="{{ $setting->promo_text }}" name="promo_text" type="text" class="{{ $errors->has('promo_text') ? ' is-invalid' : '' }} form-control">
			</div>
		</div>
		<div class="col-xs-12 col-md-6">
			<div class="form-group">
				<label for="promo_link">{{ __('adminstaticword.PromoLink') }}:</label>
				<input id="promo_link" value="{{ $setting->promo_link }}" name="promo_link" type="text" class="{{ $errors->has('promo_link') ? ' is-invalid' : '' }} form-control">
			</div>
		</div>
	</div>
	<hr>



	<h4 class="box-title">{{ __('adminstaticword.FacebookChatBubble') }}</h4>
	<div class="row">
		<div class="col-xs-12">
			<div class="form-group">
				<label for="chat_bubble">{{ __('adminstaticword.FacebookChatBubble') }}:</label>
				<input id="chat_bubble" value="{{ $setting->chat_bubble }}" name="chat_bubble" placeholder="Enter Your Chat Bubble Link" type="text" class="{{ $errors->has('chat_bubble') ? ' is-invalid' : '' }} form-control">
				<small>Facebook Bubble Chat will not work on localhost (eg. xampp & wampp)</small>
				<small><a target="__blank" href="https://app.respond.io/">Get URL For Facebook Messenger Chat Bubble</a></small>
			</div>
		</div>
	</div>

	<hr>


	<h4 class="box-title">{{ __('adminstaticword.AppDownload') }}</h4>
	<div class="row">
		<div  class="col-xs-12 col-md-2">
			<div class="form-group">
				<label>{{ __('App Store') }}: </label>
				<div class="toggler">              
					<input hidden id="app_download" type="checkbox" name="app_download" {{ $gsetting->app_download == '1' ? 'checked' : '' }} >
					<label class="main-toggle toggle-lg {{ $gsetting->app_download == '1' ? 'on' : '' }}" for="app_download">
						<span data-off="{{ __('adminstaticword.Disable') }}" data-on="{{ __('adminstaticword.Enable') }}"></span>
					</label>
				</div>
				<input type="hidden" name="free" value="0" for="app_download" id="app_download"> 
			</div>
		</div>
		<div  class="col-xs-12 col-md-10">
			<div class="form-group">
				<label for="app_link">{{ __('adminstaticword.Link') }}:</label>
				<input id="app_link" value="{{ $setting->app_link }}" name="app_link" type="text" class="{{ $errors->has('app_link') ? ' is-invalid' : '' }} form-control">
			</div>
		</div>
	</div>

	
	<div class="row">
		<div  class="col-xs-12 col-md-2">
			<div class="form-group">
				<label>{{ __('Play Store') }}: </label>
				<div class="toggler">              
					<input hidden id="play_download" type="checkbox" name="play_download" {{ $setting->play_download == '1' ? 'checked' : '' }} >
					<label class="main-toggle toggle-lg {{ $setting->play_download == '1' ? 'on' : '' }}" for="play_download">
						<span data-off="{{ __('adminstaticword.Disable') }}" data-on="{{ __('adminstaticword.Enable') }}"></span>
					</label>
				</div>
				<input type="hidden" id="play_download" name="free" value="0" for="play_download" id="play_download"> 
			</div>
		</div>
		<div  class="col-xs-12 col-md-10">
			<div class="form-group">
				<label for="play_link">{{ __('adminstaticword.Link') }}:</label>
				<input id="play_link" value="{{ $setting->play_link }}" name="play_link" type="text" class="{{ $errors->has('play_link') ? ' is-invalid' : '' }} form-control">
			</div>
		</div>
	</div>

	<hr>
	
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-3">
			<div class="form-group">
				<label>{{ __('adminstaticword.RightClick') }}: </label>
				<div class="toggler">              
					<input hidden id="cb3" type="checkbox" name="rightclick" {{ $gsetting->rightclick == '0' ? 'checked' : '' }} >
					<label class="main-toggle toggle-lg {{ $gsetting->rightclick == '0' ? 'on' : '' }}" for="cb3">
						<span data-off="{{ __('adminstaticword.Disable') }}" data-on="{{ __('adminstaticword.Enable') }}"></span>
					</label>
				</div>
				<input type="hidden"  name="free" value="0" for="cb3" id="cb3"> 
			</div>
		</div>
		
		<div class="col-xs-12 col-sm-6 col-md-3">
			<div class="form-group">
				<label>{{ __('adminstaticword.InspectElement') }}: </label>
				<div class="toggler">              
					<input hidden id="cb4" type="checkbox" name="inspect" {{ $setting->inspect == '0' ? 'checked' : '' }} >
					<label class="main-toggle toggle-lg {{ $setting->inspect == '0' ? 'on' : '' }}" for="cb4">
						<span data-off="{{ __('adminstaticword.Disable') }}" data-on="{{ __('adminstaticword.Enable') }}"></span>
					</label>
				</div>
				<input type="hidden" id="inspect" name="free" value="0" for="cb4" id="cb4">
			</div>
		</div>

		<div class="col-xs-12 col-sm-6 col-md-3">
			<div class="form-group">
				<label>{{ __('adminstaticword.PreloaderEnable') }}: </label>
				<div class="toggler">              
					<input hidden id="preloader" type="checkbox" name="preloader_enable" {{ $gsetting->preloader_enable == '1' ? 'checked' : '' }} >
					<label class="main-toggle toggle-lg {{ $gsetting->preloader_enable == '1' ? 'on' : '' }}" for="preloader">
						<span data-off="{{ __('adminstaticword.Disable') }}" data-on="{{ __('adminstaticword.Enable') }}"></span>
					</label>
				</div>
				<input type="hidden"  name="free" value="0" for="preloader" id="preloader">
			</div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-3">
			<div class="form-group">
				<label>{{ __('adminstaticword.APPDebug') }}:</label>
				<div class="toggler">              
					<input hidden id="debug" type="checkbox" name="APP_DEBUG" {{ env('APP_DEBUG') == true ? "checked" : "" }} >
					<label class="main-toggle toggle-lg {{ env('APP_DEBUG') == true ? "on" : "" }}" for="debug">
						<span data-off="{{ __('adminstaticword.Disable') }}" data-on="{{ __('adminstaticword.Enable') }}"></span>
					</label>
				</div>
				<input type="hidden"  name="free" value="0" for="debug" id="debug">
			</div>
		</div>
	</div>

	<hr>

	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-3">
			<div class="form-group">
				<label>{{ __('adminstaticword.WelcomeEmail') }}: </label>
				<div class="toggler">              
					<input hidden id="welmail" type="checkbox" name="w_email_enable" {{ $gsetting->w_email_enable == '1' ? 'checked' : '' }} >
					<label class="main-toggle toggle-lg {{ $gsetting->w_email_enable == '1' ? 'on' : '' }}" for="welmail">
						<span data-off="{{ __('adminstaticword.Disable') }}" data-on="{{ __('adminstaticword.Enable') }}"></span>
					</label>
				</div>
				<input type="hidden"  name="free" value="0" for="welmail" id="welmail">
			</div>
		</div>

		<div class="col-xs-12 col-sm-6 col-md-3">
			<div class="form-group">
				<label>{{ __('adminstaticword.VerifyEmail') }}: </label>
				<div class="toggler">              
					<input hidden id="verify" type="checkbox" name="verify_enable" {{ $gsetting->verify_enable == '1' ? 'checked' : '' }} >
					<label class="main-toggle toggle-lg {{ $gsetting->verify_enable == '1' ? 'on' : '' }}" for="verify">
						<span data-off="{{ __('adminstaticword.Disable') }}" data-on="{{ __('adminstaticword.Enable') }}"></span>
					</label>
				</div>
				<input type="hidden" name="free" value="0" for="verify" id="verify">
				<div>
					<small>(If you enable it, a welcome email will be sent to user's register email id, make sure you updated your mail setting in Site Setting >> Mail Settings before enable it.)</small>
					<small class="text-danger">{{ $errors->first('color') }}</small> 
				</div>
			</div>
		</div>

		<div class="col-xs-12 col-sm-6 col-md-3">
			<div class="form-group">
				<label>{{ __('adminstaticword.BecomeAnInstructor') }}: </label>
				<div class="toggler">              
					<input hidden id="instructor" type="checkbox" name="instructor_enable" {{ $gsetting->instructor_enable == '1' ? 'checked' : '' }} >
					<label class="main-toggle toggle-lg {{ $gsetting->instructor_enable == '1' ? 'on' : '' }}" for="instructor">
						<span data-off="{{ __('adminstaticword.Disable') }}" data-on="{{ __('adminstaticword.Enable') }}"></span>
					</label>
				</div>
				<input type="hidden"  name="free" value="0" for="instructor" id="instructor">
				<div>
					<small>(Enable Become an instructor option for users)</small>
					<small class="text-danger">{{ $errors->first('color') }}</small> 
				</div>
			</div>
		</div>

		<div class="col-xs-12 col-sm-6 col-md-3">
			<div class="form-group">
				<label>{{ __('adminstaticword.CategoryMenu') }}: </label>
				<div class="toggler">              
					<input hidden id="category" type="checkbox" name="cat_enable" {{ $gsetting->cat_enable == '1' ? 'checked' : '' }} >
					<label class="main-toggle toggle-lg {{ $gsetting->cat_enable == '1' ? 'on' : '' }}" for="category">
						<span data-off="{{ __('adminstaticword.Disable') }}" data-on="{{ __('adminstaticword.Enable') }}"></span>
					</label>
				</div>
				<input type="hidden"  name="free" value="0" for="category" id="category">
				<div>
					<small>(If you enable it, Category menu will show on instructor Dashboard)</small>
					<small class="text-danger">{{ $errors->first('color') }}</small> 
				</div>
			</div>
		</div>
	</div>

	<hr>

    <div class="row">

    	<div class="col-xs-12 col-sm-6 col-md-3">
			<div class="form-group">
				<label>{{ __('Enable Zoom On Portal') }}: </label>
				<div class="toggler">              
					<input hidden id="zoom_enable" type="checkbox" name="zoom_enable" {{ $gsetting->zoom_enable == 1 ? 'checked' : '' }} >
					<label class="main-toggle toggle-lg {{ $gsetting->zoom_enable == 1 ? 'on' : '' }}" for="zoom_enable">
						<span data-off="{{ __('adminstaticword.Disable') }}" data-on="{{ __('adminstaticword.Enable') }}"></span>
					</label>
				</div>
				<small>(Enable Live zoom meetings on portal)</small>
			</div>
    	</div>

    	<div class="col-xs-12 col-sm-6 col-md-3">
			<div class="form-group">
				<label>{{ __('Enable Big Blue Meetings') }}: </label>
				<div class="toggler">              
					<input hidden id="bbl_enable" type="checkbox" name="bbl_enable" {{ $gsetting->bbl_enable == 1 ? 'checked' : '' }} >
					<label class="main-toggle toggle-lg {{ $gsetting->bbl_enable == 1 ? 'on' : '' }}" for="bbl_enable">
						<span data-off="{{ __('adminstaticword.Disable') }}" data-on="{{ __('adminstaticword.Enable') }}"></span>
					</label>
				</div>
				<small>(Enable Big Blue meetings on portal)</small>
			</div>
    	</div>

    	<div class="col-xs-12 col-sm-6 col-md-3">
			<div class="form-group">
				<label>{{ __('Mobile no. on SignUp') }}: </label>
				<div class="toggler">              
					<input hidden id="mobile_enable" type="checkbox" name="mobile_enable" {{ $gsetting->mobile_enable == 1 ? 'checked' : '' }} >
					<label class="main-toggle toggle-lg {{ $gsetting->mobile_enable == 1 ? 'on' : '' }}" for="mobile_enable">
						<span data-off="{{ __('adminstaticword.Disable') }}" data-on="{{ __('adminstaticword.Enable') }}"></span>
					</label>
				</div>
				<small>(Enable mobile no. on SignUp)</small>
			</div>
    	</div>

    	<div class="col-xs-12 col-sm-6 col-md-3">
			<div class="form-group">
				<label>{{ __('adminstaticword.CertificateEnable') }}: </label>
				<div class="toggler">              
					<input hidden id="certificate_enable" type="checkbox" name="certificate_enable" {{ $gsetting->certificate_enable == 1 ? 'checked' : '' }} >
					<label class="main-toggle toggle-lg {{ $gsetting->certificate_enable == 1 ? 'on' : '' }}" for="certificate_enable">
						<span data-off="{{ __('adminstaticword.Disable') }}" data-on="{{ __('adminstaticword.Enable') }}"></span>
					</label>
				</div>
				<small>(Enable Certificate on courses)</small>
			</div>
    	</div>
    </div>
    <hr>

    <div class="row">

    	<div class="col-xs-12 col-sm-6 col-md-3">
			<div class="form-group">
				<label>{{ __('adminstaticword.DeviceControl') }}: </label>
				<div class="toggler">              
					<input hidden id="device_enable" type="checkbox" name="device_enable" {{ $gsetting->device_control == 1 ? 'checked' : '' }} >
					<label class="main-toggle toggle-lg {{ $gsetting->device_control == 1 ? 'on' : '' }}" for="device_enable">
						<span data-off="{{ __('adminstaticword.Disable') }}" data-on="{{ __('adminstaticword.Enable') }}"></span>
					</label>
				</div>
				<small>(Enable Device Control on Courses)</small>
			</div>
    	</div>

    	<div class="col-xs-12 col-sm-6 col-md-3">
			<div class="form-group">
				<label>{{ __('adminstaticword.IPBlock') }}: </label>
				<div class="toggler">              
					<input hidden id="ipblock_enable" type="checkbox" name="ipblock_enable" {{ $gsetting->ipblock_enable == 1 ? 'checked' : '' }} >
					<label class="main-toggle toggle-lg {{ $gsetting->ipblock_enable == 1 ? 'on' : '' }}" for="ipblock_enable">
						<span data-off="{{ __('adminstaticword.Disable') }}" data-on="{{ __('adminstaticword.Enable') }}"></span>
					</label>
				</div>
				<small>(Enable Ip block on portal)</small>
			</div>
    	</div>

    	<div class="col-xs-12 col-sm-6 col-md-3">
			<div class="form-group">
				<label>{{ __('adminstaticword.Assignment') }}: </label>
				<div class="toggler">              
					<input hidden id="assignment_enable" type="checkbox" name="assignment_enable" {{ $gsetting->assignment_enable == 1 ? 'checked' : '' }} >
					<label class="main-toggle toggle-lg {{ $gsetting->assignment_enable == 1 ? 'on' : '' }}" for="assignment_enable">
						<span data-off="{{ __('adminstaticword.Disable') }}" data-on="{{ __('adminstaticword.Enable') }}"></span>
					</label>
				</div>
				<small>(Enable Assignment on Course)</small>
			</div>
    	</div>

    	<div class="col-xs-12 col-sm-6 col-md-3">
			<div class="form-group">
				<label>{{ __('adminstaticword.Appointment') }}: </label>
				<div class="toggler">              
					<input hidden id="appointment_enable" type="checkbox" name="appointment_enable" {{ $gsetting->appointment_enable == 1 ? 'checked' : '' }} >
					<label class="main-toggle toggle-lg {{ $gsetting->appointment_enable == 1 ? 'on' : '' }}" for="appointment_enable">
						<span data-off="{{ __('adminstaticword.Disable') }}" data-on="{{ __('adminstaticword.Enable') }}"></span>
					</label>
				</div>
				<small>(Enable Appointment on Course)</small>
			</div>
    	</div>
    </div>

    <hr>

    <div class="row">

    	<div class="col-xs-12 col-sm-6 col-md-3">
			<div class="form-group">
				<label>{{ __('adminstaticword.HideIdentity') }}: </label>
				<div class="toggler">              
					<input hidden id="hide_identity" type="checkbox" name="hide_identity" {{ $gsetting->hide_identity == 1 ? 'checked' : '' }} >
					<label class="main-toggle toggle-lg {{ $gsetting->hide_identity == 1 ? 'on' : '' }}" for="hide_identity">
						<span data-off="{{ __('adminstaticword.Disable') }}" data-on="{{ __('adminstaticword.Enable') }}"></span>
					</label>
				</div>
				<small>(Hide User Indentity from Instructor)</small>
			</div>
    	</div>

    	<div class="col-xs-12 col-sm-6 col-md-3">
			<div class="form-group">
				<label>{{ __('adminstaticword.CourseHover') }}: </label>
				<div class="toggler">              
					<input hidden id="course_hover" type="checkbox" name="course_hover" {{ $gsetting->course_hover == 1 ? 'checked' : '' }} >
					<label class="main-toggle toggle-lg {{ $gsetting->course_hover == 1 ? 'on' : '' }}" for="course_hover">
						<span data-off="{{ __('adminstaticword.Disable') }}" data-on="{{ __('adminstaticword.Enable') }}"></span>
					</label>
				</div>
				<small>(Enable/Disable Hover from home sliders)</small>
			</div>
    	</div>

    	<div class="col-xs-12 col-sm-6 col-md-3">
			<div class="form-group">
				<label>{{ __('Currency Swipe') }}: </label>
				<div class="toggler">              
					<input hidden id="currency_swipe" type="checkbox" name="currency_swipe" {{ $gsetting->currency_swipe == 1 ? 'checked' : '' }} >
					<label class="main-toggle toggle-lg {{ $gsetting->currency_swipe == 1 ? 'on' : '' }}" for="currency_swipe">
						<span data-off="{{ __('adminstaticword.Before') }}" data-on="{{ __('adminstaticword.After') }}"></span>
					</label>
				</div>
				<small>(Swipe currency before/after icon)</small>
			</div>
    	</div>

    	<div class="col-xs-12 col-sm-6 col-md-3">
			<div class="form-group">
				<label>{{ __('Attandance') }}: </label>
				<div class="toggler">              
					<input hidden id="attandance_enable" type="checkbox" name="attandance_enable" {{ $gsetting->attandance_enable == 1 ? 'checked' : '' }} >
					<label class="main-toggle toggle-lg {{ $gsetting->attandance_enable == 1 ? 'on' : '' }}" for="attandance_enable">
						<span data-off="{{ __('adminstaticword.Disable') }}" data-on="{{ __('adminstaticword.Enable') }}"></span>
					</label>
				</div>
				<small>(Enable Attandance on Courses)</small>
			</div>
    	</div>
    </div>

    <hr>

    <div class="row">

    	<div class="col-xs-12 col-sm-6 col-md-3">
			<div class="form-group">
				<label>{{ __('adminstaticword.ActivityLog') }}: </label>
				<div class="toggler">              
					<input hidden id="activity_enable" type="checkbox" name="activity_enable" {{ $gsetting->activity_enable == 1 ? 'checked' : '' }} >
					<label class="main-toggle toggle-lg {{ $gsetting->activity_enable == 1 ? 'on' : '' }}" for="activity_enable">
						<span data-off="{{ __('adminstaticword.Disable') }}" data-on="{{ __('adminstaticword.Enable') }}"></span>
					</label>
				</div>
				<small>(Enable Users Activity Logs on Login/Register)</small>
			</div>
    	</div>

    	<div class="col-xs-12 col-sm-6 col-md-3">
			<div class="form-group">
				<label>{{ __('adminstaticword.InstructorSubscription') }}: </label>
				<div class="toggler">              
					<input hidden id="plan_enable" type="checkbox" name="plan_enable" {{ $gsetting->plan_enable == 1 ? 'checked' : '' }} >
					<label class="main-toggle toggle-lg {{ $gsetting->plan_enable == 1 ? 'on' : '' }}" for="plan_enable">
						<span data-off="{{ __('adminstaticword.Disable') }}" data-on="{{ __('adminstaticword.Enable') }}"></span>
					</label>
				</div>
				<small>(Enable Instructor subcription plans)</small>
			</div>
    	</div>

    	<div class="col-xs-12 col-sm-6 col-md-3">
			<div class="form-group">
				<label>{{ __('adminstaticword.GoogleMeet') }}: </label>
				<div class="toggler">              
					<input hidden id="googlemeet_enable" type="checkbox" name="googlemeet_enable" {{ $gsetting->googlemeet_enable == 1 ? 'checked' : '' }} >
					<label class="main-toggle toggle-lg {{ $gsetting->googlemeet_enable == 1 ? 'on' : '' }}" for="googlemeet_enable">
						<span data-off="{{ __('adminstaticword.Disable') }}" data-on="{{ __('adminstaticword.Enable') }}"></span>
					</label>
				</div>
				<small>(Enable Google Meet on portal)</small>
			</div>
    	</div>

    	<div class="col-xs-12 col-sm-6 col-md-3">
			<div class="form-group">
				<label>{{ __('adminstaticword.CookieNotice') }}: </label>
				<div class="toggler">              
					<input hidden id="cookie_enable" type="checkbox" name="cookie_enable" {{ $gsetting->cookie_enable == 1 ? 'checked' : '' }} >
					<label class="main-toggle toggle-lg {{ $gsetting->cookie_enable == 1 ? 'on' : '' }}" for="cookie_enable">
						<span data-off="{{ __('adminstaticword.Disable') }}" data-on="{{ __('adminstaticword.Enable') }}"></span>
					</label>
				</div>
				<small>(Enable Cookie Notice on Site)</small>
			</div>
    	</div>
    </div>

    <hr>

    <div class="row">
    	<div class="col-xs-12 col-sm-6 col-md-3">
			<div class="form-group">
				<label>{{ __('adminstaticword.JitsiMeeting') }}: </label>
				<div class="toggler">              
					<input hidden id="jitsimeet_enable" type="checkbox" name="jitsimeet_enable" {{ $gsetting->jitsimeet_enable == 1 ? 'checked' : '' }} >
					<label class="main-toggle toggle-lg {{ $gsetting->jitsimeet_enable == 1 ? 'on' : '' }}" for="jitsimeet_enable">
						<span data-off="{{ __('adminstaticword.Disable') }}" data-on="{{ __('adminstaticword.Enable') }}"></span>
					</label>
				</div>
				<small>(Enable Jitsi Meeting on Portal)</small>
			</div>
    	</div>
    </div>

    
	
	
	
	<div class="box-footer">
		<div class="row">
			<div class="col-xs-9"></div>
			<button type="Submit" class="btn btn-md col-xs-3 btn-primary btn-md flex-row-center-all"><i class='bx bx-save me' ></i> {{ __('adminstaticword.Save') }}</button>
		</div>
	</div>

</form>
