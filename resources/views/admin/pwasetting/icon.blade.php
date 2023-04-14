<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<form action="{{ route('icons.update') }}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="box-body">
					<div class="row">
						<div class="col-xs-12 col-md-6">
							<div class="row">
								<div class="col-xs-12 col-sm-8">
									<div class="form-group">
										<label for="icon_512">PWA {{ __('adminstaticword.Icon') }} (512x512): <span class="text-danger">*</span> </label>
										<div>
											<input id="icon_512" type="file" name="icon_512" class="inputfile inputfile-1" />
											<label for="icon_512"><svg xmlns="http://www.w3.org/2000/svg" width="50"
													height="30" viewBox="0 0 20 17">
													<path
														d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
												</svg> <span>{{ __('adminstaticword.Chooseafile') }}</span>
											</label>
										</div>
									</div>
								</div>
				
								<div class="col-xs-12 col-sm-4 well">
									<img class="img-responsive" src="{{ url('images/icons/icon-512x512.png') }}" alt="icon_256x256.png">
								</div>
							</div>
						</div>
	
						<div class="col-xs-12 col-md-6">
							<div class="row">
								<div class="col-xs-12 col-sm-8">
									<div class="form-group">
										<label for="splash_2048">PWA {{ __('adminstaticword.SplashScreen') }} (2048x2732): <span class="text-danger">*</span> </label>
										<div>
											<input id="splash_2048" type="file" name="splash_2048" class="inputfile inputfile-1" />
											<label for="splash_2048"><svg xmlns="http://www.w3.org/2000/svg" width="50"
													height="30" viewBox="0 0 20 17">
													<path
														d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
												</svg> <span>{{ __('adminstaticword.Chooseafile') }}</span>
											</label>
										</div>
									</div>
								</div>
				
								<div class="col-xs-12 col-sm-4 well">
									<img class="img-responsive" src="{{ url('images/icons/splash-2048x2732.png') }}"
										alt="splash-2048x2732.png">
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="box-footer">
					<div class="row">
						<div class="col-xs-9"></div>
						<button type="submit" class="btn btn-md col-xs-3 btn-danger">
							{{ __('adminstaticword.Save') }}
						</button>
					</div>
				</div>
			</form>
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
</section>