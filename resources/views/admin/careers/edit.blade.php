@extends('admin.layouts.master')
@section('title', __('adminstaticword.Career') . ' - ' . __('adminstaticword.Admin'))
@section('body')

<section class="content">
	@include('admin.message')
	<form action="{{ action('CareersController@update') }}" method="POST" enctype="multipart/form-data">
		{{ csrf_field() }}
		{{ method_field('PUT') }}
		<div class="row">
			<div class="col-xs-12 col-md-4 col-lg-3">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">{{ __('adminstaticword.Career') }}</h3>
					</div>
					<div class="panel-body">
						<div class="row">
							{{-- Section one toggler --}}
							<div class="col-xs-12 col-sm-6 col-md-12">
								<div class="form-group">
									<label>{{ __('adminstaticword.Section') }} {{ __('adminstaticword.One') }}: Header</label>
									<div class="toggler">
										<input name="one_enable" hidden id="section_one1" type="checkbox"
										{{ $careers['one_enable']==1 ? 'checked' : '' }} />
										<label class="main-toggle {{ $careers['one_enable']==1 ? 'on' : '' }}" for="section_one1">
											<span data-off="{{ __('adminstaticword.OFF') }}" data-on="{{ __('adminstaticword.ON') }}"></span>
										</label>
									</div>
								</div>
							</div>
							{{-- Section Two toggler --}}
							<div class="col-xs-12 col-sm-6 col-md-12">
								<div class="form-group">
									<label>{{ __('adminstaticword.Section') }} {{ __('adminstaticword.Two') }}</label>
									<div class="toggler">
										<input hidden id="section_two2" type="checkbox" disabled
										{{ $careers['two_enable']==1 ? 'checked' : '' }} />
										<label class="main-toggle {{ $careers['two_enable']==1 ? 'on' : '' }}" for="section_two2">
											<span data-off="{{ __('adminstaticword.OFF') }}" data-on="{{ __('adminstaticword.ON') }}"></span>
										</label>
									</div>
								</div>
							</div>
							{{-- Section Three toggler --}}
							<div class="col-xs-12 col-sm-6 col-md-12">
								<div class="form-group">
									<label>{{ __('adminstaticword.Section') }} {{ __('adminstaticword.Three') }}: Careers learn</label>
									<div class="toggler">
										<input name="three_enable" hidden id="section_three3" type="checkbox"
											{{ $careers['three_enable']==1 ? 'checked' : '' }} />
										<label class="main-toggle {{ $careers['three_enable']==1 ? 'on' : '' }}" for="section_three3">
											<span data-off="{{ __('adminstaticword.OFF') }}" data-on="{{ __('adminstaticword.ON') }}"></span>
										</label>
									</div>
								</div>
							</div>
							{{-- Section Four toggler --}}
							<div class="col-xs-12 col-sm-6 col-md-12">
								<div class="form-group">
									<label>{{ __('adminstaticword.Section') }} {{ __('adminstaticword.Four') }}</label>
									<div class="toggler">
										<input name="four_enable" hidden id="section_four4" type="checkbox"
											{{ $careers['four_enable']==1 ? 'checked' : '' }} />
										<label class="main-toggle {{ $careers['four_enable']==1 ? 'on' : '' }}" for="section_four4">
											<span data-off="{{ __('adminstaticword.OFF') }}" data-on="{{ __('adminstaticword.ON') }}"></span>
										</label>
									</div>
								</div>
							</div>
							{{-- Section Five toggler --}}
							<div class="col-xs-12 col-sm-6 col-md-12">
								<div class="form-group">
									<label>{{ __('adminstaticword.Section') }} {{ __('adminstaticword.Five') }}</label>
									<div class="toggler">
										<input name="five_enable" hidden id="section_five5" type="checkbox"
											{{ $careers['five_enable']==1 ? 'checked' : '' }} />
										<label class="main-toggle {{ $careers['five_enable']==1 ? 'on' : '' }}" for="section_five5">
											<span data-off="{{ __('adminstaticword.OFF') }}" data-on="{{ __('adminstaticword.ON') }}"></span>
										</label>
									</div>
								</div>
							</div>
							{{-- Section Six toggler --}}
							<div class="col-xs-12 col-sm-6 col-md-12">
								<div class="form-group">
									<label>{{ __('adminstaticword.Section') }} {{ __('adminstaticword.Six') }}</label>
									<div class="toggler">
										<input name="six_enable" hidden id="section_six6" type="checkbox"
											{{ $careers['six_enable']==1 ? 'checked' : '' }} />
										<label class="main-toggle {{ $careers['six_enable']==1 ? 'on' : '' }}" for="section_six6">
											<span data-off="{{ __('adminstaticword.OFF') }}" data-on="{{ __('adminstaticword.ON') }}"></span>
										</label>
									</div>
								</div>
							</div>
						</div>

						<div class="box-footer">
							<div class="row">
								<div class="col-xs-9 col-md-8"></div>
								<button value="" type="submit" class="btn btn-md col-xs-3 col-md-4 btn-primary">{{ __('adminstaticword.Save') }}</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-8 col-lg-9">
				{{-- Section one --}}
				<div class="box box-primary" style="{{ $careers['one_enable']==1 ? '' : 'display:none' }}"
				id="section_one">
					<div class="panel-body">
						<div class="row">
							<div class="col-xs-12">
								<h4 class="box-title mt-0">{{ __('adminstaticword.Section') }} {{ __('adminstaticword.One') }}: Header</h4>
								<hr>
							</div>

							<div class="col-xs-12">
								<div class="form-group">
									<label for="one_heading">{{ __('adminstaticword.Heading') }}:<sup
											class="redstar">*</sup></label>
									<input id="one_heading" value="{{ $careers['one_heading'] }}" name="one_heading" type="text"
										class="form-control"/>
								</div>
							</div>

							<div class="col-xs-12">
								<div class="form-group">
									<label for="one_text">{{ __('adminstaticword.Description') }}:<sup class="redstar">*</sup></label>
									<textarea id="one_text" name="one_text" rows="1" class="form-control">{{ $careers['one_text'] }}</textarea>
								</div>
							</div>

							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<label for="one_btntxt">{{ __('adminstaticword.ButtonText') }}:<sup
											class="redstar">*</sup></label>
									<input id="one_btntxt" value="{{ $careers['one_btntxt'] }}" name="one_btntxt" type="text"
										class="form-control"/>
								</div>
								<div class="form-group">
									<label for="three_btntxt">{{ __('adminstaticword.Link') }}:<sup
											class="redstar">*</sup></label>
									<input id="three_btntxt" value="{{ $careers['three_btntxt'] }}" name="three_btntxt" type="text"
										class="form-control"/>
								</div>
							</div>

							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<label for="one_video">{{ __('adminstaticword.Image') }}:<sup class="redstar">*</sup></label>
									<div>
										<input type="file" name="one_video" id="one_video" class="inputfile inputfile-1">
										<label for="one_video"><svg xmlns="http://www.w3.org/2000/svg" width="50"
												height="30" viewBox="0 0 20 17">
												<path
													d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
											</svg> <span>{{ __('adminstaticword.Chooseafile') }}</span>
										</label>
									</div>
									<img src="{{ url('/images/careers/'.$careers['one_video']) }}"
										class="img-responsive about-img-preview" />
								</div>
							</div>
						</div>
					</div>
				</div>
				{{-- Section Two --}}
				<div class="box box-primary" style="{{ $careers['two_enable']==1 ? '' : 'display:none' }}"
				id="section_two">
					<div class="panel-body">
						<div class="row">
							<div class="col-xs-12">
								<h4 class="box-title mt-0">{{ __('adminstaticword.Section') }} {{ __('adminstaticword.Two') }}:</h4>
								<hr>
							</div>
						</div>
					</div>
				</div>
				{{-- Section Three --}}
				<div class="box box-primary" style="{{ $careers['three_enable']==1 ? '' : 'display:none' }}"
				id="section_three">
					<div class="panel-body">
						<div class="row">
							<div class="col-xs-12">
								<h4 class="box-title mt-0">{{ __('adminstaticword.Section') }} {{ __('adminstaticword.Three') }}: Career Learn</h4>
								<hr>
							</div>

							<div class="col-xs-12">
								<div class="form-group">
									<label for="three_heading">{{ __('adminstaticword.Heading') }}:<sup
											class="redstar">*</sup></label>
									<input id="three_heading" value="{{ $careers['three_heading'] }}" name="three_heading" type="text"
										class="form-control"/>
								</div>
							</div>

							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<label for="three_video">{{ __('adminstaticword.Image') }}:<sup
											class="redstar">*</sup></label>
									<div>
										<input type="file" name="three_video" id="three_video" class="inputfile inputfile-1">
										<label for="three_video"><svg xmlns="http://www.w3.org/2000/svg" width="50"
												height="30" viewBox="0 0 20 17">
												<path
													d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
											</svg> <span>{{ __('adminstaticword.Chooseafile') }}</span>
										</label>
									</div>
									<img src="{{ url('/images/careers/'.$careers['three_video']) }}" class="img-responsive about-img-preview" />
								</div>
							</div>
							
							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<label for="three_bg_image">{{ __('adminstaticword.BackgroundImage') }}:<sup
											class="redstar">*</sup></label>
									<div>
										<input type="file" name="three_bg_image" id="three_bg_image" class="inputfile inputfile-1">
										<label for="three_bg_image"><svg xmlns="http://www.w3.org/2000/svg" width="50"
												height="30" viewBox="0 0 20 17">
												<path
													d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
											</svg> <span>{{ __('adminstaticword.Chooseafile') }}</span>
										</label>
									</div>
									<img src="{{ url('/images/careers/'.$careers['three_bg_image']) }}" class="img-responsive about-img-preview" />
								</div>
							</div>
						</div>
					</div>
				</div>
				{{-- Section Four --}}
				<div class="box box-primary" style="{{ $careers['four_enable']==1 ? '' : 'display:none' }}"
				id="section_four">
					<div class="panel-body">
						<div class="row" >
							<div class="col-xs-12">
								<h4 class="box-title mt-0">{{ __('adminstaticword.Section') }} {{ __('adminstaticword.Four') }}:</h4>
								<hr>
							</div>

							{{-- Image one --}}
							<div class="col-xs-6 col-sm-4 col-md-6 col-lg-4">
								<div class="form-group">
									<label for="four_img_one">{{ __('adminstaticword.ImageOne') }}:<sup
											class="redstar">*</sup></label>
									<div>
										<input type="file" name="four_img_one" id="four_img_one" class="inputfile inputfile-1">
										<label for="four_img_one"><svg xmlns="http://www.w3.org/2000/svg" width="50"
												height="30" viewBox="0 0 20 17">
												<path
													d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
											</svg> <span>{{ __('adminstaticword.Chooseafile') }}</span>
										</label>
									</div>
									<img src="{{ url('/images/careers/'.$careers['four_img_one']) }}"
										class="img-responsive about-img-preview" />
								</div>
							</div>
							{{-- Image Two --}}
							<div class="col-xs-6 col-sm-4 col-md-6 col-lg-4">
								<div class="form-group">
									<label for="four_img_two">{{ __('adminstaticword.ImageTwo') }}:<sup
											class="redstar">*</sup></label>
									<div>
										<input type="file" name="four_img_two" id="four_img_two" class="inputfile inputfile-1">
										<label for="four_img_two"><svg xmlns="http://www.w3.org/2000/svg" width="50"
												height="30" viewBox="0 0 20 17">
												<path
													d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
											</svg> <span>{{ __('adminstaticword.Chooseafile') }}</span>
										</label>
									</div>
									<img src="{{ url('/images/careers/'.$careers['four_img_two']) }}"
										class="img-responsive about-img-preview" />
								</div>
							</div>
							{{-- Image Three --}}
							<div class="col-xs-6 col-sm-4 col-md-6 col-lg-4">
								<div class="form-group">
									<label for="four_img_three">{{ __('adminstaticword.ImageThree') }}:<sup
											class="redstar">*</sup></label>
									<div>
										<input type="file" name="four_img_three" id="four_img_three" class="inputfile inputfile-1">
										<label for="four_img_three"><svg xmlns="http://www.w3.org/2000/svg" width="50"
												height="30" viewBox="0 0 20 17">
												<path
													d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
											</svg> <span>{{ __('adminstaticword.Chooseafile') }}</span>
										</label>
									</div>
									<img src="{{ url('/images/careers/'.$careers['four_img_three']) }}"
										class="img-responsive about-img-preview" />
								</div>
							</div>
							{{-- Image Four --}}
							<div class="col-xs-6 col-sm-4 col-md-6 col-lg-4">
								<div class="form-group">
									<label for="four_img_four">{{ __('adminstaticword.ImageFour') }}:<sup
											class="redstar">*</sup></label>
									<div>
										<input type="file" name="four_img_four" id="four_img_four" class="inputfile inputfile-1">
										<label for="four_img_four"><svg xmlns="http://www.w3.org/2000/svg" width="50"
												height="30" viewBox="0 0 20 17">
												<path
													d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
											</svg> <span>{{ __('adminstaticword.Chooseafile') }}</span>
										</label>
									</div>
									<img src="{{ url('/images/careers/'.$careers['four_img_four']) }}"
										class="img-responsive about-img-preview" />
								</div>
							</div>
							{{-- Image Five --}}
							<div class="col-xs-6 col-sm-4 col-md-6 col-lg-4">
								<div class="form-group">
									<label for="four_img_five">{{ __('adminstaticword.ImageFive') }}:<sup
											class="redstar">*</sup></label>
									<div>
										<input type="file" name="four_img_five" id="four_img_five" class="inputfile inputfile-1">
										<label for="four_img_five"><svg xmlns="http://www.w3.org/2000/svg" width="50"
												height="30" viewBox="0 0 20 17">
												<path
													d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
											</svg> <span>{{ __('adminstaticword.Chooseafile') }}</span>
										</label>
									</div>
									<img src="{{ url('/images/careers/'.$careers['four_img_five']) }}"
										class="img-responsive about-img-preview" />
								</div>
							</div>
							{{-- Image Six --}}
							<div class="col-xs-6 col-sm-4 col-md-6 col-lg-4">
								<div class="form-group">
									<label for="four_img_six">{{ __('adminstaticword.ImageSix') }}:<sup
											class="redstar">*</sup></label>
									<div>
										<input type="file" name="four_img_six" id="four_img_six" class="inputfile inputfile-1">
										<label for="four_img_six"><svg xmlns="http://www.w3.org/2000/svg" width="50"
												height="30" viewBox="0 0 20 17">
												<path
													d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
											</svg> <span>{{ __('adminstaticword.Chooseafile') }}</span>
										</label>
									</div>
									<img src="{{ url('/images/careers/'.$careers['four_img_six']) }}"
										class="img-responsive about-img-preview" />
								</div>
							</div>
							{{-- Image Seven --}}
							<div class="col-xs-6 col-sm-4 col-md-6 col-lg-4">
								<div class="form-group">
									<label for="four_img_seven">{{ __('adminstaticword.ImageSeven') }}:<sup
											class="redstar">*</sup></label>
									<div>
										<input type="file" name="four_img_seven" id="four_img_seven" class="inputfile inputfile-1">
										<label for="four_img_seven"><svg xmlns="http://www.w3.org/2000/svg" width="50"
												height="30" viewBox="0 0 20 17">
												<path
													d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
											</svg> <span>{{ __('adminstaticword.Chooseafile') }}</span>
										</label>
									</div>
									<img src="{{ url('/images/careers/'.$careers['four_img_seven']) }}"
										class="img-responsive about-img-preview" />
								</div>
							</div>
							{{-- Image Eight --}}
							<div class="col-xs-6 col-sm-4 col-md-6 col-lg-4">
								<div class="form-group">
									<label for="four_img_eight">{{ __('adminstaticword.ImageEight') }}:<sup
											class="redstar">*</sup></label>
									<div>
										<input type="file" name="four_img_eight" id="four_img_eight" class="inputfile inputfile-1">
										<label for="four_img_eight"><svg xmlns="http://www.w3.org/2000/svg" width="50"
												height="30" viewBox="0 0 20 17">
												<path
													d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
											</svg> <span>{{ __('adminstaticword.Chooseafile') }}</span>
										</label>
									</div>
									<img src="{{ url('/images/careers/'.$careers['four_img_eight']) }}"
										class="img-responsive about-img-preview" />
								</div>
							</div>
							{{-- Image Nine --}}
							<div class="col-xs-6 col-sm-4 col-md-6 col-lg-4">
								<div class="form-group">
									<label for="four_img_nine">{{ __('adminstaticword.ImageNine') }}:<sup
											class="redstar">*</sup></label>
									<div>
										<input type="file" name="four_img_nine" id="four_img_nine" class="inputfile inputfile-1">
										<label for="four_img_nine"><svg xmlns="http://www.w3.org/2000/svg" width="50"
												height="30" viewBox="0 0 20 17">
												<path
													d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
											</svg> <span>{{ __('adminstaticword.Chooseafile') }}</span>
										</label>
									</div>
									<img src="{{ url('/images/careers/'.$careers['four_img_nine']) }}"
										class="img-responsive about-img-preview" />
								</div>
							</div>
						</div>
					</div>
				</div>
				{{-- Section Five --}}
				<div class="box box-primary" style="{{ $careers['five_enable']==1 ? '' : 'display:none' }}"
				id="section_five">
					<div class="panel-body">
						<div class="row" >
							<div class="col-xs-12">
								<h4 class="box-title mt-0">{{ __('adminstaticword.Section') }} {{ __('adminstaticword.Five') }}:</h4>
								<hr>
							</div>

							<div class="col-xs-12">
								<label for="five_heading">{{ __('adminstaticword.Heading') }}:<sup
										class="redstar">*</sup></label>
								<input id="five_heading" value="{{ $careers['five_heading'] }}" name="five_heading" type="text"
									class="form-control"/>
							</div>
		
							<div class="col-xs-12">
								<label for="five_text">{{ __('adminstaticword.Text') }}:<sup class="redstar">*</sup></label>
								<input id="five_text" value="{{ $careers['five_text'] }}" name="five_text" type="text"
									class="form-control"  />
							</div>
		
							<div class="col-xs-12 display-none">
								<label for="five_icon">{{ __('adminstaticword.Icon') }}:<sup class="redstar">*</sup></label>
								<input id="five_icon" value="{{ $careers['five_icon'] }}" name="five_icon" type="text"
									class="form-control" placeholder="Enter Icon" />
								
							</div>
							
							{{-- Topic one --}}
							<div class="col-xs-12 col-md-6">
								<div class="dashed-container">
									<div class="form-group">
										<label for="five_textone">{{ __('adminstaticword.Topic') }} {{ __('adminstaticword.One') }}:<sup class="redstar">*</sup></label>
										<input id="five_textone" value="{{ $careers['five_textone'] }}" name="five_textone" type="text" class="form-control"/>
									</div>
	
									<div class="form-group">
										<label for="five_dtlone">{{ __('adminstaticword.Detail') }}:<sup
												class="redstar">*</sup></label>
										<textarea id="five_dtlone" name="five_dtlone" rows="1" class="form-control">{{ $careers['five_dtlone'] }}</textarea>
									</div>
								</div>
							</div>
							{{-- Topic Two --}}
							<div class="col-xs-12 col-md-6">
								<div class="dashed-container">
									<div class="form-group">
										<label for="five_texttwo">{{ __('adminstaticword.Topic') }} {{ __('adminstaticword.Two') }}:<sup class="redstar">*</sup></label>
										<input id="five_texttwo" value="{{ $careers['five_texttwo'] }}" name="five_texttwo" type="text" class="form-control"/>
									</div>
		
									<div class="form-group">
										<label for="five_dtltwo">{{ __('adminstaticword.Detail') }}:<sup
												class="redstar">*</sup></label>
										<textarea id="five_dtltwo" name="five_dtltwo" rows="1" class="form-control">{{ $careers['five_dtltwo'] }}</textarea>
									</div>
								</div>
							</div>
							{{-- Topic Three --}}
							<div class="col-xs-12 col-md-6">
								<div class="dashed-container">
									<div class="form-group">
										<label for="five_textthree">{{ __('adminstaticword.Topic') }} {{ __('adminstaticword.Three') }}:<sup class="redstar">*</sup></label>
										<input id="five_textthree" value="{{ $careers['five_textthree'] }}" name="five_textthree" type="text" class="form-control"/>
									</div>
		
									<div class="form-group">
										<label for="five_dtlthree">{{ __('adminstaticword.Detail') }}:<sup
												class="redstar">*</sup></label>
										<textarea id="five_dtlthree" name="five_dtlthree" rows="1" class="form-control">{{ $careers['five_dtlthree'] }}</textarea>
									</div>
								</div>
							</div>								
							{{-- Topic Four --}}
							<div class="col-xs-12 col-md-6">
								<div class="dashed-container">
									<div class="form-group">
										<label for="five_textfour">{{ __('adminstaticword.Topic') }} {{ __('adminstaticword.Four') }}:<sup class="redstar">*</sup></label>
										<input id="five_textfour" value="{{ $careers['five_textfour'] }}" name="five_textfour" type="text" class="form-control"/>
									</div>
		
									<div class="form-group">
										<label for="five_dtlfour">{{ __('adminstaticword.Detail') }}:<sup
												class="redstar">*</sup></label>
										<textarea id="five_dtlfour" name="five_dtlfour" rows="1" class="form-control">{{ $careers['five_dtlfour'] }}</textarea>
									</div>	
								</div>
							</div>
							{{-- Topic Five --}}
							<div class="col-xs-12 col-md-6">
								<div class="dashed-container">
									<div class="form-group">
										<label for="five_textfive">{{ __('adminstaticword.Topic') }} {{ __('adminstaticword.Five') }}:<sup class="redstar">*</sup></label>
										<input id="five_textfive" value="{{ $careers['five_textfive'] }}" name="five_textfive" type="text" class="form-control"/>
									</div>
		
									<div class="form-group">
										<label for="five_dtlfive">{{ __('adminstaticword.Detail') }}:<sup
												class="redstar">*</sup></label>
										<textarea id="five_dtlfive" name="five_dtlfive" rows="1" class="form-control">{{ $careers['five_dtlfive'] }}</textarea>
									</div>	
								</div>
							</div>
							{{-- Topic Six --}}
							<div class="col-xs-12 col-md-6">
								<div class="dashed-container">
									<div class="form-group">
										<label for="five_textsix">{{ __('adminstaticword.Topic') }} {{ __('adminstaticword.Six') }}:<sup class="redstar">*</sup></label>
										<input id="five_textsix" value="{{ $careers['five_textsix'] }}" name="five_textsix" type="text" class="form-control"/>
									</div>
		
									<div class="form-group">
										<label for="five_dtlsix">{{ __('adminstaticword.Detail') }}:<sup
												class="redstar">*</sup></label>
										<textarea id="five_dtlsix" name="five_dtlsix" rows="1" class="form-control">{{ $careers['five_dtlsix'] }}</textarea>
									</div>
								</div>
							</div>
							{{-- Topic Seven --}}
							<div class="col-xs-12 col-md-6">
								<div class="dashed-container">
									<div class="form-group">
										<label for="five_textseven">{{ __('adminstaticword.Topic') }} {{ __('adminstaticword.Seven') }}:<sup class="redstar">*</sup></label>
										<input id="five_textseven" value="{{ $careers['five_textseven'] }}" name="five_textseven" type="text" class="form-control"/>
									</div>
		
									<div class="form-group">
										<label for="five_dtlseven">{{ __('adminstaticword.Detail') }}:<sup
												class="redstar">*</sup></label>
										<textarea id="five_dtlseven" name="five_dtlseven" rows="1" class="form-control">{{ $careers['five_dtlseven'] }}</textarea>
									</div>
								</div>
							</div>
							{{-- Topic Eight --}}
							<div class="col-xs-12 col-md-6">
								<div class="dashed-container">
									<div class="form-group">
										<label for="five_texteight">{{ __('adminstaticword.Topic') }} {{ __('adminstaticword.Eight') }}:<sup class="redstar">*</sup></label>
										<input id="five_texteight" value="{{ $careers['five_texteight'] }}" name="five_texteight" type="text" class="form-control"/>
									</div>
		
									<div class="form-group">
										<label for="five_dtleight">{{ __('adminstaticword.Detail') }}:<sup
												class="redstar">*</sup></label>
										<textarea id="five_dtleight" name="five_dtleight" rows="1" class="form-control">{{ $careers['five_dtleight'] }}</textarea>
									</div>
								</div>
							</div>
							{{-- Topic Nine --}}
							<div class="col-xs-12 col-md-6">
								<div class="dashed-container">
									<div class="form-group">
										<label for="five_textnine">{{ __('adminstaticword.Topic') }} {{ __('adminstaticword.Nine') }}:<sup class="redstar">*</sup></label>
										<input id="five_textnine" value="{{ $careers['five_textnine'] }}" name="five_textnine" type="text" class="form-control"/>
									</div>
		
									<div class="form-group">
										<label for="five_dtlnine">{{ __('adminstaticword.Detail') }}:<sup
												class="redstar">*</sup></label>
										<textarea id="five_dtlnine" name="five_dtlnine" rows="1" class="form-control">{{ $careers['five_dtlnine'] }}</textarea>
									</div>
								</div>
							</div>
							{{-- Topic Ten --}}
							<div class="col-xs-12 col-md-6">
								<div class="dashed-container">
									<div class="form-group">
										<label for="five_textten">{{ __('adminstaticword.Topic') }} {{ __('adminstaticword.Ten') }}:<sup class="redstar">*</sup></label>
										<input id="five_textten" value="{{ $careers['five_textten'] }}" name="five_textten" type="text" class="form-control"/>
									</div>

									<div class="form-group">
										<label for="five_dtlten">{{ __('adminstaticword.Detail') }}:<sup
												class="redstar">*</sup></label>
										<textarea id="five_dtlten" name="five_dtlten" rows="1" class="form-control">{{ $careers['five_dtlten'] }}</textarea>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				{{-- Section Six --}}
				<div class="box box-primary"style="{{ $careers['six_enable']==1 ? '' : 'display:none' }}"
				id="section_six">
					<div class="panel-body">
						<div class="row" >
							<div class="col-xs-12">
								<h4 class="box-title mt-0">{{ __('adminstaticword.Section') }} {{ __('adminstaticword.Six') }}:</h4>
								<hr>
							</div>

							<div class="col-xs-12">
								<div class="form-group">
									<label for="six_heading">{{ __('adminstaticword.Heading') }}:<sup
											class="redstar">*</sup></label>
									<input id="six_heading" value="{{ $careers['six_heading'] }}" name="six_heading" type="text"
										class="form-control"/>
								</div>
							</div>

							<div class="col-xs-12">
								<div class="form-group">
									<label for="six_text">{{ __('adminstaticword.Description') }}<sup class="redstar">*</sup></label>
									<textarea id="six_text" name="six_text" rows="3" class="form-control">{{ $careers['six_text'] }}</textarea>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label for="six_topic_one">{{ __('adminstaticword.Topic') }} {{ __('adminstaticword.One') }}:<sup class="redstar">*</sup></label>
									<input id="six_topic_one" value="{{ $careers['six_topic_one'] }}" name="six_topic_one" type="text" class="form-control"/>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label for="six_topic_two">{{ __('adminstaticword.Topic') }} {{ __('adminstaticword.Two') }}:<sup class="redstar">*</sup></label>
									<input id="six_topic_two" value="{{ $careers['six_topic_two'] }}" name="six_topic_two" type="text" class="form-control"/>
								</div>
								
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label for="six_topic_three">{{ __('adminstaticword.Topic') }} {{ __('adminstaticword.Three') }}:<sup class="redstar">*</sup></label>
									<input id="six_topic_three" value="{{ $careers['six_topic_three'] }}" name="six_topic_three" type="text" class="form-control"/>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label for="six_topic_four">{{ __('adminstaticword.Topic') }} {{ __('adminstaticword.Four') }}:<sup class="redstar">*</sup></label>
									<input id="six_topic_four" value="{{ $careers['six_topic_four'] }}" name="six_topic_four" type="text" class="form-control"/>
								</div>
								
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label for="six_topic_five">{{ __('adminstaticword.Topic') }} {{ __('adminstaticword.Five') }}:<sup class="redstar">*</sup></label>
									<input id="six_topic_five" value="{{ $careers['six_topic_five'] }}" name="six_topic_five" type="text" class="form-control"/>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label for="six_topic_six">{{ __('adminstaticword.Topic') }} {{ __('adminstaticword.Six') }}:<sup class="redstar">*</sup></label>
									<input id="six_topic_six" value="{{ $careers['six_topic_six'] }}" name="six_topic_six" type="text" class="form-control"/>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</section>
@endsection



@section('script')
<script>
	(function ($) {
		"use strict";

		$(document).ready(function () {

			$('#section_one1').change(function () {
				if ($('#section_one1').is(':checked')) {
					$('#section_one').show('fast');
				} else {
					$('#section_one').hide('fast');
				}

			});

			$('#section_two2').change(function () {
				if ($('#section_two2').is(':checked')) {
					$('#section_two').show('fast');
				} else {
					$('#section_two').hide('fast');
				}

			});

			$('#section_three3').change(function () {
				if ($('#section_three3').is(':checked')) {
					$('#section_three').show('fast');
				} else {
					$('#section_three').hide('fast');
				}

			});

			$('#section_four4').change(function () {
				if ($('#section_four4').is(':checked')) {
					$('#section_four').show('fast');
				} else {
					$('#section_four').hide('fast');
				}

			});

			$('#section_five5').change(function () {
				if ($('#section_five5').is(':checked')) {
					$('#section_five').show('fast');
				} else {
					$('#section_five').hide('fast');
				}

			});

			$('#section_six6').change(function () {
				if ($('#section_six6').is(':checked')) {
					$('#section_six').show('fast');
				} else {
					$('#section_six').hide('fast');
				}

			});
		});
	})(jQuery);
</script>


@endsection