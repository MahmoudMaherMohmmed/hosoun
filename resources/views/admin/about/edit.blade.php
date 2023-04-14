@extends('admin.layouts.master')
@section('title', __('adminstaticword.About') . ' - ' . __('adminstaticword.Admin'))
@section('body')

<section class="content">
	@include('admin.message')
	<div class="content">
		<form action="{{ action('AboutController@update') }}" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}
			{{ method_field('PUT') }}
			<div class="row">
				<div class="col-xs-12 col-md-4 col-lg-3">
					<div class="box box-primary">
						<div class="box-header with-border">
							<h3 class="box-title">{{ __('adminstaticword.About') }}</h3>
						</div>
						<div class="panel-body">
							<div class="row">
								{{-- Section one toggler --}}
								<div class="col-xs-12 col-sm-6 col-md-12 ">
									<div class="form-group">
										<label>{{ __('adminstaticword.Section') }} {{ __('adminstaticword.One') }}: Header</label>
										<div class="toggler">
											<input name="one_enable" hidden id="sec_one1" type="checkbox"
												{{ $data['one_enable']==1 ? 'checked' : '' }} />
											<label class="main-toggle {{ $data['one_enable']==1 ? 'on' : '' }}"
												for="sec_one1">
												<span data-off="{{ __('adminstaticword.OFF') }}"
													data-on="{{ __('adminstaticword.ON') }}"></span>
											</label>
										</div>
									</div>
								</div>
								{{--<div class="col-xs-12 col-sm-6 col-md-12 ">
									<div class="form-group">
										<label>{{ __('adminstaticword.Section') }} {{ __('adminstaticword.Two') }}: Instructor Profile</label>
										<div class="toggler">
											<input name="two_enable" hidden id="sec_two2" type="checkbox"
												{{ $data['two_enable']==1 ? 'checked' : '' }} />
											<label class="main-toggle {{ $data['two_enable']==1 ? 'on' : '' }}"
												for="sec_two2">
												<span data-off="{{ __('adminstaticword.OFF') }}"
													data-on="{{ __('adminstaticword.ON') }}"></span>
											</label>
										</div>
									</div>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-12 ">
									<div class="form-group">
										<label>{{ __('adminstaticword.Section') }} {{ __('adminstaticword.Three') }}: Counters</label>
										<div class="toggler">
											<input name="three_enable" hidden id="sec_three3" type="checkbox"
												{{ $data['three_enable']==1 ? 'checked' : '' }} />
											<label class="main-toggle {{ $data['three_enable']==1 ? 'on' : '' }}"
												for="sec_three3">
												<span data-off="{{ __('adminstaticword.OFF') }}"
													data-on="{{ __('adminstaticword.ON') }}"></span>
											</label>
										</div>
									</div>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-12 ">
									<div class="form-group">
										<label>{{ __('adminstaticword.Section') }} {{ __('adminstaticword.Four') }}: Work</label>
										<div class="toggler">
											<input name="four_enable" hidden id="sec_four4" type="checkbox"
												{{ $data['four_enable']==1 ? 'checked' : '' }} disabled />
											<label class="main-toggle {{ $data['four_enable']==1 ? 'on' : '' }}"
												for="sec_four4">
												<span data-off="{{ __('adminstaticword.OFF') }}"
													data-on="{{ __('adminstaticword.ON') }}"></span>
											</label>
										</div>
									</div>
								</div>--}}
								{{-- Section five toggler --}}
								<div class="col-xs-12 col-sm-6 col-md-12 ">
									<div class="form-group">
										<label>{{ __('adminstaticword.Section') }} {{ __('adminstaticword.Two') }}: About</label>
										<div class="toggler">
											<input name="five_enable" hidden id="sec_five5" type="checkbox"
												{{ $data['five_enable']==1 ? 'checked' : '' }} />
											<label class="main-toggle {{ $data['five_enable']==1 ? 'on' : '' }}"
												for="sec_five5">
												<span data-off="{{ __('adminstaticword.OFF') }}"
													data-on="{{ __('adminstaticword.ON') }}"></span>
											</label>
										</div>
									</div>
								</div>
								{{--<div class="col-xs-12 col-sm-6 col-md-12 ">
									<div class="form-goup">
										<label>{{ __('adminstaticword.Section') }} {{ __('adminstaticword.Six') }}: About and Contact</label>
										<div class="toggler">
											<input name="six_enable" hidden id="sec_six6" type="checkbox"
												{{ $data['six_enable']==1 ? 'checked' : '' }} />
											<label class="main-toggle {{ $data['six_enable']==1 ? 'on' : '' }}"
												for="sec_six6">
												<span data-off="{{ __('adminstaticword.OFF') }}"
													data-on="{{ __('adminstaticword.ON') }}"></span>
											</label>
										</div>
									</div>
								</div>--}}
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
					<div class="box box-primary" style="{{ $data['one_enable']==1 ? '' : 'display:none' }}" id="sec_one">
						<div class="panel-body">
							<div class="row">
								<div class="col-xs-12">
									<h4 class="box-title mt-0">{{ __('adminstaticword.Section') }} {{ __('adminstaticword.One') }} : Header</h4>
									<hr>
								</div>

								<div class="col-xs-12 col-sm-6 col-md-12 col-lg-6">
									<div class="form-group">
										<label for="one_heading">{{ __('adminstaticword.Heading') }}:<sup
												class="redstar">*</sup></label>
										<input id="one_heading" value="{{ $data['one_heading'] }}" autofocus name="one_heading"
											type="text" class="form-control"/>
									</div>

									<div class="form-group">
										<label for="one_text">{{ __('adminstaticword.Description') }}:<sup class="redstar">*</sup></label>
										{{--<input id="one_text" value="{{ $data['one_text']}}" autofocus name="one_text" type="text"
											class="form-control"/>--}}
										<textarea id="one_text" name="one_text" rows="5" class="form-control">{{ $data['one_text']}}</textarea>
									</div>
									
									<div class="form-group hidden">
										<label for="link_four">{{ __('adminstaticword.Link') }}:<sup class="redstar">*</sup></label>
										<input id="link_four" value="{{ $data['link_four']}}" autofocus name="link_four"
											type="text" class="form-control"/>
									</div>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-12 col-lg-6">

									<div class="form-group">
										<label for="one_image">{{ __('adminstaticword.BackgroundImage') }}:<sup
												class="redstar">*</sup></label>
										<div>
											<input type="file" name="one_image" id="one_image"
												class="inputfile inputfile-1">
											<label for="one_image"><svg xmlns="http://www.w3.org/2000/svg" width="50"
													height="30" viewBox="0 0 20 17">
													<path
														d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
												</svg> <span>{{ __('adminstaticword.Chooseafile') }}</span>
											</label>
										</div>
										<div class="row">
											<div class="col-xs-12 col-lg-7">
												<img src="{{ url('/images/about/'.$data['one_image']) }}"
													class="img-responsive" />
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					{{-- Section two --}}
					<div class="box box-primary" style="{{ $data['two_enable']==1 ? '' : 'display:none' }}" id="sec_two">
						<div class="panel-body">
							<div class="row">
								<div class="col-xs-12">
									<h4 class="box-title mt-0">{{ __('adminstaticword.Section') }} {{ __('adminstaticword.Two') }} : Instructor Profile</h4>
									<hr>
								</div>

								<div class="col-xs-12">
									<div class="form-group">
										<label for="two_heading">{{ __('adminstaticword.Heading') }}:<sup
												class="redstar">*</sup></label>
										<input id="two_heading" value="{{ $data['two_heading'] }}" autofocus name="two_heading"
											type="text" class="form-control"/>
									</div>
								</div>

								<div class="col-xs-12">
									<div class="form-group">
										<label for="two_text">{{ __('adminstaticword.Description') }}:<sup class="redstar">*</sup></label>
										<textarea id="two_text" name="two_text" rows="3" class="form-control"
											>{{ $data['two_text'] }}</textarea>
									</div>
								</div>

								{{-- Instructor one --}}
								<div class="col-xs-12 col-lg-6">
									<div class="form-group">
										<label for="two_imageone">{{ __('adminstaticword.InstructorImage') }} {{ __('adminstaticword.One') }}:<sup
												class="redstar">*</sup></label>
										<div>
											<input type="file" name="two_imageone" id="two_imageone" class="inputfile inputfile-1">
											<label for="two_imageone"><svg xmlns="http://www.w3.org/2000/svg" width="50"
													height="30" viewBox="0 0 20 17">
													<path
														d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
												</svg> <span>{{ __('adminstaticword.Chooseafile') }}</span>
											</label>
										</div>
										<img src="{{ $data['two_imageone'] ? url('/images/about/'.$data['two_imageone']) :url('/admin/img/img-placehoder.jpg') }}" class="img-responsive about-img-preview" />
									</div>

									<div class="form-group">
										<label for="two_txtone">{{ __('adminstaticword.InstructorName') }} {{ __('adminstaticword.One') }}:<sup
												class="redstar">*</sup></label>
										<input id="two_txtone" value="{{ $data['two_txtone'] }}" name="two_txtone" type="text"
											class="form-control" />
									</div>

									<div class="form-group">
										<label for="two_imagetext">{{ __('adminstaticword.InstructorDesc') }} {{ __('adminstaticword.One') }}:<sup
												class="redstar">*</sup></label>
										<textarea id="two_imagetext" name="two_imagetext" rows="3" class="form-control"
											>{{ $data['two_imagetext'] }}</textarea>
									</div>
								</div>

								{{-- Instructor Two --}}
								<div class="col-xs-12 col-lg-6">
									<div class="form-group">
										<label for="two_imagetwo">{{ __('adminstaticword.InstructorImage') }} {{ __('adminstaticword.Two') }}:<sup
												class="redstar">*</sup></label>
										<div>
											<input type="file" name="two_imagetwo" id="two_imagetwo"
												class="inputfile inputfile-1">
											<label for="two_imagetwo"><svg xmlns="http://www.w3.org/2000/svg" width="50"
													height="30" viewBox="0 0 20 17">
													<path
														d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
												</svg> <span>{{ __('adminstaticword.Chooseafile') }}</span>
											</label>
										</div>
										<img src="{{ $data['two_imagetwo'] ? url('/images/about/'.$data['two_imagetwo']) :url('/admin/img/img-placehoder.jpg') }}" class="img-responsive about-img-preview" />
									</div>

									<div class="form-group">
										<label for="two_txttwo">{{ __('adminstaticword.InstructorName') }} {{ __('adminstaticword.Two') }}:<sup
												class="redstar">*</sup></label>
										<input id="two_txttwo" value="{{ $data['two_txttwo'] }}" name="two_txttwo" type="text"
											class="form-control" />
									</div>

									<div class="form-group">
										<label for="text_one">{{ __('adminstaticword.InstructorDesc') }} {{ __('adminstaticword.Two') }}:<sup
												class="redstar">*</sup></label>
										<textarea id="text_one" name="text_one" rows="3" class="form-control"
											>{{ $data['text_one'] }}</textarea>
									</div>
								</div>

								{{-- Instructor Three --}}
								<div class="col-xs-12 col-lg-6">
									<div class="form-group">
										<label for="two_imagethree">{{ __('adminstaticword.InstructorImage') }} {{ __('adminstaticword.Three') }}:<sup
												class="redstar">*</sup></label>
										<div>
											<input type="file" name="two_imagethree" id="two_imagethree"
												class="inputfile inputfile-1">
											<label for="two_imagethree"><svg xmlns="http://www.w3.org/2000/svg" width="50"
													height="30" viewBox="0 0 20 17">
													<path
														d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
												</svg> <span>{{ __('adminstaticword.Chooseafile') }}</span>
											</label>
										</div>
										<img src="{{ $data['two_imagethree'] ? url('/images/about/'.$data['two_imagethree']) :url('/admin/img/img-placehoder.jpg') }}" class="img-responsive about-img-preview" />
									</div>

									<div class="form-group">
										<label for="two_txtthree">{{ __('adminstaticword.InstructorName') }} {{ __('adminstaticword.Three') }}:<sup
												class="redstar">*</sup></label>
										<input id="two_txtthree" value="{{ $data['two_txtthree'] }}" name="two_txtthree" type="text"
											class="form-control" />
									</div>

									<div class="form-group">
										<label for="text_two">{{ __('adminstaticword.InstructorDesc') }} {{ __('adminstaticword.Three') }}:<sup
												class="redstar">*</sup></label>
										<textarea id="text_two" name="text_two" rows="3" class="form-control"
											>{{ $data['text_two'] }}</textarea>
									</div>
								</div>

								{{-- Instructor Four --}}
								<div class="col-xs-12 col-lg-6">
									<div class="form-group">
										<label for="two_imagefour">{{ __('adminstaticword.InstructorImage') }} {{ __('adminstaticword.Four') }}:<sup
												class="redstar">*</sup></label>
										<div>
											<input type="file" name="two_imagefour" id="two_imagefour"
												class="inputfile inputfile-1">
											<label for="two_imagefour"><svg xmlns="http://www.w3.org/2000/svg" width="50"
													height="30" viewBox="0 0 20 17">
													<path
														d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
												</svg> <span>{{ __('adminstaticword.Chooseafile') }}</span>
											</label>
										</div>
										<img src="{{ $data['two_imagefour'] ? url('/images/about/'.$data['two_imagefour']) :url('/admin/img/img-placehoder.jpg') }}" class="img-responsive about-img-preview" />
									</div>

									<div class="form-group">
										<label for="two_txtfour">{{ __('adminstaticword.InstructorName') }} {{ __('adminstaticword.Four') }}:<sup
												class="redstar">*</sup></label>
										<input id="two_txtfour" value="{{ $data['two_txtfour'] }}" name="two_txtfour" type="text"
											class="form-control" />
									</div>

									<div class="form-group">
										<label for="text_three">{{ __('adminstaticword.InstructorDesc') }} {{ __('adminstaticword.Four') }}:<sup
												class="redstar">*</sup></label>
										<textarea id="text_three" name="text_three" rows="3" class="form-control"
											>{{ $data['text_three'] }}</textarea>
									</div>
								</div>

							</div>
						</div>
					</div>
					{{-- Section three --}}
					<div class="box box-primary" style="{{ $data['three_enable']==1 ? '' : 'display:none' }}" id="sec_three">
						<div class="panel-body">
							<div class="row">
								<div class="col-xs-12">
									<h4 class="box-title mt-0">{{ __('adminstaticword.Section') }} {{ __('adminstaticword.Three') }} : Counters</h4>
									<hr>
								</div>

								<div class="col-xs-12">
									<div class="form-group">
										<label for="three_heading">{{ __('adminstaticword.Heading') }}:<sup
												class="redstar">*</sup></label>
										<input id="three_heading" value="{{ $data['three_heading'] }}" autofocus name="three_heading"
											type="text" class="form-control"/>
									</div>
								</div>

								<div class="col-xs-12">
									<div class="form-group">
										<label for="three_text">{{ __('adminstaticword.Description') }}:<sup
												class="redstar">*</sup></label>
										<textarea id="three_text" name="three_text" rows="3" class="form-control"
											>{{ $data['three_text'] }}</textarea>
									</div>
								</div>

								{{-- Counter one --}}
								<div class="col-xs-6 col-sm-4 col-md-6 col-lg-4">
									<div class="dashed-container">
										<div class="form-group">
											<label for="three_countone" class="item-flex"><i class='bx bx-stopwatch me'></i>{{ __('adminstaticword.Counter') }} {{ __('adminstaticword.One') }}:<sup
													class="redstar">*</sup></label>
											<input id="three_countone" value="{{ $data['three_countone'] }}" name="three_countone"
												type="text" class="form-control"/>
										</div>
	
										<div class="form-group">
											<label for="three_txtone">{{ __('adminstaticword.CounterOneText') }}:<sup
													class="redstar">*</sup></label>
											<input id="three_txtone" value="{{ $data['three_txtone'] }}" name="three_txtone" type="text"
												class="form-control" />
										</div>
									</div>
								</div>
								{{-- Counter Two --}}
								<div class="col-xs-6 col-sm-4 col-md-6 col-lg-4">
									<div class="dashed-container">
										<div class="form-group">
											<label for="three_counttwo" class="item-flex"><i class='bx bx-stopwatch me'></i>{{ __('adminstaticword.Counter') }} {{ __('adminstaticword.Two') }}:<sup
													class="redstar">*</sup></label>
											<input id="three_counttwo" value="{{ $data['three_counttwo'] }}" name="three_counttwo"
												type="text" class="form-control"/>
										</div>
	
										<div class="form-group">
											<label for="three_txttwo">{{ __('adminstaticword.CounterTwoText') }}:<sup
													class="redstar">*</sup></label>
											<input id="three_txttwo" value="{{ $data['three_txttwo'] }}" name="three_txttwo" type="text"
												class="form-control"/>
										</div>
									</div>
								</div>
								{{-- Counter Three --}}
								<div class="col-xs-6 col-sm-4 col-md-6 col-lg-4">
									<div class="dashed-container">
										<div class="form-group">
											<label for="three_countthree" class="item-flex"><i class='bx bx-stopwatch me'></i>{{ __('adminstaticword.Counter') }} {{ __('adminstaticword.Three') }}:<sup
													class="redstar">*</sup></label>
											<input id="three_countthree" value="{{ $data['three_countthree'] }}" name="three_countthree"
												type="text" class="form-control"/>
										</div>
	
										<div class="form-group">
											<label for="three_txtthree">{{ __('adminstaticword.CounterThreeText') }}:<sup
													class="redstar">*</sup></label>
											<input id="three_txtthree" value="{{ $data['three_txtthree'] }}" name="three_txtthree"
												type="text" class="form-control"/>
										</div>
									</div>
								</div>
								{{-- Counter Four --}}
								<div class="col-xs-6 col-sm-4 col-md-6 col-lg-4">
									<div class="dashed-container">
										<div class="form-group">
											<label for="three_countfour" class="item-flex"><i class='bx bx-stopwatch me'></i>{{ __('adminstaticword.Counter') }} {{ __('adminstaticword.Four') }}:<sup
													class="redstar">*</sup></label>
											<input id="three_countfour" value="{{ $data['three_countfour'] }}" name="three_countfour"
												type="text" class="form-control"/>
										</div>
	
										<div class="form-group">
											<label for="three_txtfour">{{ __('adminstaticword.CounterFourText') }}:<sup
													class="redstar">*</sup></label>
											<input id="three_txtfour" value="{{ $data['three_txtfour'] }}" name="three_txtfour" type="text"
												class="form-control"/>
										</div>
									</div>
								</div>
								{{-- Counter Five --}}
								<div class="col-xs-6 col-sm-4 col-md-6 col-lg-4">
									<div class="dashed-container">
										<div class="form-group">
											<label for="three_countfive" class="item-flex"><i class='bx bx-stopwatch me'></i>{{ __('adminstaticword.Counter') }} {{ __('adminstaticword.Five') }}:<sup
													class="redstar">*</sup></label>
											<input id="three_countfive" value="{{ $data['three_countfive'] }}" name="three_countfive"
												type="text" class="form-control"/>
										</div>
	
										<div class="form-group">
											<label for="three_txtfive">{{ __('adminstaticword.CounterFiveText') }}:<sup
													class="redstar">*</sup></label>
											<input id="three_txtfive" value="{{ $data['three_txtfive'] }}" name="three_txtfive" type="text"
												class="form-control"/>
										</div>
									</div>
								</div>
								{{-- Counter Six --}}
								<div class="col-xs-6 col-sm-4 col-md-6 col-lg-4">
									<div class="dashed-container">
										<div class="form-group">
											<label for="three_countsix" class="item-flex"><i class='bx bx-stopwatch me'></i>{{ __('adminstaticword.Counter') }} {{ __('adminstaticword.Six') }}:<sup
													class="redstar">*</sup></label>
											<input id="three_countsix" value="{{ $data['three_countsix'] }}" name="three_countsix"
												type="text" class="form-control"/>
										</div>
	
										<div class="form-group">
											<label for="three_txtsix">{{ __('adminstaticword.CounterThreeText') }}:<sup
													class="redstar">*</sup></label>
											<input id="three_txtsix" value="{{ $data['three_txtsix'] }}" name="three_txtsix" type="text"
												class="form-control"/>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
					{{-- Section four --}}
					<div class="box box-primary" style="{{ $data['four_enable']==1 ? '' : 'display:none' }}" id="sec_four">
						<div class="panel-body">
							<div class="row">
								<div class="col-xs-12">
									<h4 class="box-title mt-0">{{ __('adminstaticword.Section') }} {{ __('adminstaticword.Four') }} : Work</h4>
									<hr>
								</div>

								<div class="col-xs-12">
									<div class="form-group">
										<label for="four_heading">{{ __('adminstaticword.Heading') }}:<sup class="redstar">*</sup></label>
										<input id="four_heading" value="{{ $data['four_heading'] }}" autofocus name="four_heading" type="text" class="form-control"/>
									</div>
								</div>

								<div class="col-xs-12 display-none">
									<div class="form-group">
										<label for="four_btntext">{{ __('adminstaticword.ButtonText') }}:<sup class="redstar">*</sup></label>
										<input id="four_btntext" value="{{ $data['four_btntext'] }}" autofocus name="four_btntext" type="text" class="form-control"/>
									</div>
								</div>

								<div class="col-xs-12">
									<div class="form-group">
										<label for="four_text">{{ __('adminstaticword.Description') }}:<sup class="redstar">*</sup></label>
										<textarea id="four_text" name="four_text" rows="3" class="form-control">{{ $data['four_text'] }}</textarea>
									</div>
								</div>

								<div class="col-xs-12 col-md-6">
									<div class="form-group">
										<label for="four_imageone">{{ __('adminstaticword.ImageOne') }}:<sup
												class="redstar">*</sup></label>
										<div>
											<input type="file" name="four_imageone" id="four_imageone"
												class="inputfile inputfile-1">
											<label for="four_imageone"><svg xmlns="http://www.w3.org/2000/svg" width="50"
													height="30" viewBox="0 0 20 17">
													<path
														d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
												</svg> <span>{{ __('adminstaticword.Chooseafile') }}</span>
											</label>
										</div>
										<img src="{{ $data['four_imageone'] ? url('/images/about/'.$data['four_imageone']) :url('/admin/img/img-placehoder.jpg') }}"
											class="img-responsive about-img-preview" />
									</div>

									<div class="form-group">
										<label for="four_txtone">{{ __('adminstaticword.ImageOneText') }}:<sup
												class="redstar">*</sup></label>
										<input id="four_txtone" value="{{ $data['four_txtone'] }}" name="four_txtone" type="text"
											class="form-control"/>
									</div>
								</div>

								<div class="col-xs-12 col-md-6">
									<div class="form-group">
										<label for="four_imagetwo">{{ __('adminstaticword.ImageTwo') }}:<sup
												class="redstar">*</sup></label>
										<div>
											<input type="file" name="four_imagetwo" id="four_imagetwo"
												class="inputfile inputfile-1">
											<label for="four_imagetwo"><svg xmlns="http://www.w3.org/2000/svg" width="50"
													height="30" viewBox="0 0 20 17">
													<path
														d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
												</svg> <span>{{ __('adminstaticword.Chooseafile') }}</span>
											</label>
										</div>
										<img src="{{ $data['four_imagetwo'] ? url('/images/about/'.$data['four_imagetwo']) :url('/admin/img/img-placehoder.jpg') }}"
											class="img-responsive about-img-preview" />
									</div>

									<div class="form-group">
										<label for="four_txttwo">{{ __('adminstaticword.ImageTwoText') }}:<sup
												class="redstar">*</sup></label>
										<input id="four_txttwo" value="{{ $data['four_txttwo'] }}" name="four_txttwo" type="text"
											class="form-control"/>
									</div>
								</div>

								<div class="col-md-4 display-none">
									<div class="form-group">
										<label for="four_icon">Section Four Icon:<sup class="redstar">*</sup></label>
										<input id="four_icon" value="1" name="four_icon" type="text" class="form-control"
											placeholder="Enter Heading" />
									</div>
								</div>
							</div>
						</div>
					</div>
					{{-- Section five --}}
					<div class="box box-primary" style="{{ $data['five_enable']==1 ? '' : 'display:none' }}" id="sec_five">
						<div class="panel-body">
							<div class="row">
								<div class="col-xs-12">
									<h4 class="box-title mt-0">{{ __('adminstaticword.Section') }} {{ __('adminstaticword.Five') }} : About </h4>
									<hr>
								</div>

								<div class="col-xs-12">
									<div class="form-group">
										<label for="five_heading">{{ __('adminstaticword.Heading') }}:<sup
												class="redstar">*</sup></label>
										<input id="five_heading" value="{{ $data['five_heading'] }}" autofocus name="five_heading"
											type="text" class="form-control"/>
									</div>
								</div>

								<div class="col-xs-12">
									<div class="form-group">
										<label for="five_text">{{ __('adminstaticword.Description') }}:<sup class="redstar">*</sup></label>
										<textarea id="five_text" name="five_text" rows="5" class="form-control">{{ $data['five_text'] }}</textarea>
									</div>
								</div>

								<div class="col-xs-12 col-sm-4 col-md-12 col-lg-4">
									<div class="form-group">
										<label for="five_imageone">{{ __('adminstaticword.ImageOne') }}:<sup
												class="redstar">*</sup></label>
										<div>
											<input type="file" name="five_imageone" id="five_imageone"
												class="inputfile inputfile-1">
											<label for="five_imageone"><svg xmlns="http://www.w3.org/2000/svg" width="50"
													height="30" viewBox="0 0 20 17">
													<path
														d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
												</svg> <span>{{ __('adminstaticword.Chooseafile') }}</span>
											</label>
										</div>
										<img src="{{ $data['five_imageone'] ? url('/images/about/'.$data['five_imageone']) :url('/admin/img/img-placehoder.jpg') }}"
											class="img-responsive about-img-preview" />
									</div>
								</div>

								<div class="col-xs-12 col-sm-4 col-md-12 col-lg-4 hidden">
									<div class="form-group">
										<label for="five_imagetwo">{{ __('adminstaticword.ImageTwo') }}:<sup
												class="redstar">*</sup></label>
										<div>
											<input type="file" name="five_imagetwo" id="five_imagetwo"
												class="inputfile inputfile-1">
											<label for="five_imagetwo"><svg xmlns="http://www.w3.org/2000/svg" width="50"
													height="30" viewBox="0 0 20 17">
													<path
														d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
												</svg> <span>{{ __('adminstaticword.Chooseafile') }}</span>
											</label>
										</div>
										
										<img src="{{ $data['five_imagetwo'] ? url('/images/about/'.$data['five_imagetwo']) :url('/admin/img/img-placehoder.jpg') }}"
											class="img-responsive about-img-preview" />
									</div>
								</div>

								<div class="col-xs-12 col-sm-4 col-md-12 col-lg-4 hidden">
									<div class="form-group">
										<label for="five_imagethree">{{ __('adminstaticword.ImageThree') }}:<sup
												class="redstar">*</sup></label>
										<div>
											<input type="file" name="five_imagethree" id="five_imagethree"
												class="inputfile inputfile-1">
											<label for="five_imagethree"><svg xmlns="http://www.w3.org/2000/svg" width="50"
													height="30" viewBox="0 0 20 17">
													<path
														d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
												</svg> <span>{{ __('adminstaticword.Chooseafile') }}</span>
											</label>
										</div>
										<img src="{{ $data['five_imagethree'] ? url('/images/about/'.$data['five_imagethree']) :url('/admin/img/img-placehoder.jpg') }}"
											class="img-responsive about-img-preview" />
									</div>
								</div>
							</div>
						</div>
					</div>
					{{-- Section six --}}
					<div class="box box-primary" style="{{ $data['six_enable']==1 ? '' : 'display:none' }}" id="sec_six">
						<div class="panel-body">
							<div class="row">
								<div class="col-xs-12">
									<h4 class="box-title mt-0">{{ __('adminstaticword.Section') }} {{ __('adminstaticword.Six') }} : About and Contact </h4>
									<hr>
								</div>

								<div class="col-xs-12">
									<div class="form-group">
										<label for="six_heading">{{ __('adminstaticword.Heading') }}:<sup
												class="redstar">*</sup></label>
										<input id="six_heading" value="{{ $data['six_heading'] }}" name="six_heading" type="text"
											class="form-control"/>
									</div>
								</div>

								<div class="col-xs-12 col-lg-4">
									<div class="dashed-container">
										<div class="form-group">
											<label for="six_txtone">{{ __('adminstaticword.Text') }} {{ __('adminstaticword.One') }}:<sup
													class="redstar">*</sup></label>
											<input id="six_txtone" value="{{ $data['six_txtone'] }}" name="six_txtone" type="text"
												class="form-control" />
										</div>
										
										<div class="form-group">
											<label for="six_deatilone">{{ __('adminstaticword.Detail') }}:<sup
													class="redstar">*</sup></label>
											<textarea id="six_deatilone" name="six_deatilone" rows="5" class="form-control">{{ $data['six_deatilone'] }}</textarea>
										</div>
										
										<div class="form-group">
											<label for="link_one">{{ __('adminstaticword.Link') }}:<sup class="redstar">*</sup></label>
											<input id="link_one" value="{{ $data['link_one'] }}" name="link_one" type="text"
												class="form-control"/>
										</div>
									</div>
								</div>

								<div class="col-xs-12 col-lg-4">
									<div class="dashed-container">
										<div class="form-group">
											<label for="six_txttwo">{{ __('adminstaticword.Text') }} {{ __('adminstaticword.Two') }}:<sup
													class="redstar">*</sup></label>
											<input id="six_txttwo" value="{{ $data['six_txttwo'] }}" name="six_txttwo" type="text"
												class="form-control" />
										</div>
	
										<div class="form-group">
											<label for="six_deatiltwo">{{ __('adminstaticword.Detail') }}:<sup
													class="redstar">*</sup></label>
											<textarea id="six_deatiltwo" name="six_deatiltwo" rows="5" class="form-control">{{ $data['six_deatiltwo'] }}</textarea>
										</div>
										
										<div class="form-group">
											<label for="link_two">{{ __('adminstaticword.Link') }}:<sup class="redstar">*</sup></label>
											<input id="link_two" value="{{ $data['link_two'] }}" name="link_two" type="text"
												class="form-control"/>
										</div>
									</div>
								</div>

								<div class="col-xs-12 col-lg-4">
									<div class="dashed-container">
										<div class="form-group">
											<label for="six_txtthree">{{ __('adminstaticword.Text') }} {{ __('adminstaticword.Three') }}:<sup
													class="redstar">*</sup></label>
											<input id="six_txtthree" value="{{ $data['six_txtthree'] }}" name="six_txtthree" type="text"
												class="form-control" />
										</div>
										
										<div class="form-group">
											<label for="six_deatilthree">{{ __('adminstaticword.Detail') }}:<sup
													class="redstar">*</sup></label>
											<textarea id="six_deatilthree" name="six_deatilthree" rows="5" class="form-control">{{ $data['six_deatilthree'] }}</textarea>
										</div>
										
										<div class="form-group">
											<label for="link_three">{{ __('adminstaticword.Link') }}:<sup class="redstar">*</sup></label>
											<input id="link_three" value="{{ $data['link_three'] }}" name="link_three" type="text"
												class="form-control"/>
										</div>
									</div>
								</div>

								<div class="col-xs-12 col-sm-6">
									<div class="form-group">
										<label for="facebook" class="item-flex">
											<i class='bx bxl-facebook-square i-facebook me'></i>
											{{ __('adminstaticword.FacebookUrl') }}:
											<sup class="redstar">*</sup>
										</label>
										<input id="facebook" value="{{ $data['four_btntext'] }}" autofocus name="facebook"
											type="text" class="form-control"/>
									</div>
								</div>

								<div class="col-xs-12 col-sm-6">
									<div class="form-group">
										<label for="instagram" class="item-flex">
											<i class='bx bxl-instagram-alt i-instagram me' ></i>
											{{ __('adminstaticword.InstagramUrl') }}:
											<sup class="redstar">*</sup>
										</label>
										<input id="instagram" value="{{ $data['five_btntext'] }}" autofocus name="instagram"
											type="text" class="form-control"/>
									</div>
								</div>

								<div class="col-xs-12 col-sm-6">
									<div class="form-group">
										<label for="linkedin" class="item-flex">
											<i class='bx bxl-linkedin-square i-linkedin me' ></i>
											{{ __('adminstaticword.LinkedInUrl') }}:
											<sup class="redstar">*</sup>
										</label>
										<input id="linkedin" value="{{ $data['linkedin'] }}" autofocus name="linkedin" type="text"
											class="form-control"/>
									</div>
								</div>

								<div class="col-xs-12 col-sm-6">
									<div class="form-group">
										<label for="twitter" class="item-flex">
											<i class='bx bxl-twitter i-twitter me' ></i>
											{{ __('adminstaticword.TwitterUrl') }}:
											<sup class="redstar">*</sup>
										</label>
										<input id="twitter" value="{{ $data['twitter'] }}" autofocus name="twitter" type="text"
											class="form-control"/>
									</div>
								</div>

							</div>
						</div>
					</div>

				</div>
			</div>
		</form>
	</div>
</section>
@endsection


@section('script')
<script>
	(function ($) {
		"use strict";

		$(function () {

			$('#sec_one1').change(function () {
				if ($('#sec_one1').is(':checked')) {
					$('#sec_one').show('fast');
				} else {
					$('#sec_one').hide('fast');
				}

			});

			$('#sec_two2').change(function () {
				if ($('#sec_two2').is(':checked')) {
					$('#sec_two').show('fast');
				} else {
					$('#sec_two').hide('fast');
				}

			});

			$('#sec_three3').change(function () {
				if ($('#sec_three3').is(':checked')) {
					$('#sec_three').show('fast');
				} else {
					$('#sec_three').hide('fast');
				}

			});

			$('#sec_four4').change(function () {
				if ($('#sec_four4').is(':checked')) {
					$('#sec_four').show('fast');
				} else {
					$('#sec_four').hide('fast');
				}

			});

			$('#sec_five5').change(function () {
				if ($('#sec_five5').is(':checked')) {
					$('#sec_five').show('fast');
				} else {
					$('#sec_five').hide('fast');
				}

			});

			$('#sec_six6').change(function () {
				if ($('#sec_six6').is(':checked')) {
					$('#sec_six').show('fast');
				} else {
					$('#sec_six').hide('fast');
				}

			});

		});
	})(jQuery);
</script>


@endsection