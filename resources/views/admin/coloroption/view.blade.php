@extends('admin.layouts.master')
@section('title', __('adminstaticword.ColorSettings') . ' - ' . __('adminstaticword.Admin'))
@section('body')

<section class="content">
	@include('admin.message')
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">{{ __('adminstaticword.ColorSettings') }}</h3>
					<a class="btn btn-info btn-sm" href="{{ route('coloroption.reset') }}">
						{{ __('adminstaticword.Reset') }}</a>
				</div>
				<div class="panel-body">
					<form action="{{ url('admin/coloroption/update') }}" method="POST" enctype="multipart/form-data">
						@csrf


						<h4 class="box-title">{{ __('adminstaticword.BackgroundColor') }}</h4>
						<div class="row">
							<div class="col-xs-12">
								<div class="row">
									<div class="col-xs-12 col-md-2"></div>

									<div class="col-xs-12 col-md-4">
										<div class="form-group">
											<label for="blue_bg">{{ __('adminstaticword.BlueBackground') }}:</label>
											<div class="input-group my-colorpicker2">
												<input id="blue_bg" type="text" name="blue_bg" value="{{ $color['blue_bg'] }}"
													class="form-control my-colorpicker1" placeholder="Choose color"
													required>

												<div class="input-group-addon">
													<i></i>
												</div>
											</div>
										</div>
									</div>

									<div class="col-xs-12 col-md-6">

										<img src="{{ url('images/screenshot/18.png') }}" class="img-responsive img-margin-auto"
											width="400px" height="400px">
									</div>
								</div>
								<br>
								<hr>
								<br>


								<div class="row">
									<div class="col-xs-12 col-md-2"></div>

									<div class="col-xs-12 col-md-4">
										<div class="form-group">
											<label for="red_bg">{{ __('adminstaticword.RedBackground') }}:</label>
											<div class="input-group my-colorpicker2">
												<input id="red_bg" type="text" name="red_bg" value="{{ $color['red_bg'] }}"
													class="form-control my-colorpicker1" placeholder="Choose color"
													required>

												<div class="input-group-addon">
													<i></i>
												</div>
											</div>
										</div>
									</div>

									<div class="col-xs-12 col-md-6">
										<img src="{{ url('images/screenshot/19.png') }}" class="img-responsive img-margin-auto"
											width="400px" height="400px">
									</div>
								</div>
								<br>
								<hr>
								<br>

								<div class="row">
									<div class="col-xs-12 col-md-2"></div>

									<div class="col-xs-12 col-md-4">
										<div class="form-group">
											<label for="grey_bg">{{ __('Grey Background') }}:</label>
											<div class="input-group my-colorpicker2">
												<input id="grey_bg" type="text" name="grey_bg" value="{{ $color['grey_bg'] }}"
													class="form-control my-colorpicker1" placeholder="Choose color"
													required>

												<div class="input-group-addon">
													<i></i>
												</div>
											</div>
										</div>
									</div>

									<div class="col-xs-12 col-md-6">
										<img src="{{ url('images/screenshot/15.png') }}" class="img-responsive img-margin-auto"
											width="400px" height="400px">
									</div>
								</div>
								<br>
								<hr>
								<br>

								<div class="row">
									<div class="col-xs-12 col-md-2"></div>

									<div class="col-xs-12 col-md-4">
										<div class="form-group">
											<label for="light_grey_bg">{{ __('Light Grey Background') }}:</label>
											<div class="input-group my-colorpicker2">
												<input id="light_grey_bg" type="text" name="light_grey_bg"
													value="{{ $color['light_grey_bg'] }}"
													class="form-control my-colorpicker1" placeholder="Choose color"
													required>

												<div class="input-group-addon">
													<i></i>
												</div>
											</div>
										</div>
									</div>

									<div class="col-xs-12 col-md-6">
										<img src="{{ url('images/screenshot/17.png') }}" class="img-responsive img-margin-auto"
											width="400px" height="400px">
									</div>
								</div>
								<br>
								<hr>
								<br>

								<div class="row">
									<div class="col-xs-12 col-md-2"></div>

									<div class="col-xs-12 col-md-4">
										<div class="form-group">
											<label for="black_bg">{{ __('Black Background') }}:</label>
											<div class="input-group my-colorpicker2">
												<input id="black_bg" type="text" name="black_bg" value="{{ $color['black_bg'] }}"
													class="form-control my-colorpicker1" placeholder="Choose color"
													required>

												<div class="input-group-addon">
													<i></i>
												</div>
											</div>
										</div>
									</div>

									<div class="col-xs-12 col-md-6">
										<img src="{{ url('images/screenshot/16.png') }}" class="img-responsive img-margin-auto"
											width="400px" height="400px">
									</div>
								</div>
								<br>
								<hr>
								<br>

								<div class="row">
									<div class="col-xs-12 col-md-2"></div>

									<div class="col-xs-12 col-md-4">
										<div class="form-group">
											<label for="white_bg">{{ __('White Background') }}:</label>
											<div class="input-group my-colorpicker2">
												<input id="white_bg" type="text" name="white_bg" value="{{ $color['white_bg'] }}"
													class="form-control my-colorpicker1" placeholder="Choose color"
													required>

												<div class="input-group-addon">
													<i></i>
												</div>
											</div>
										</div>
									</div>

									<div class="col-xs-12 col-md-6">

									</div>
								</div>
								<br>
								<hr>
								<br>

								<div class="row">
									<div class="col-xs-12 col-md-2"></div>

									<div class="col-xs-12 col-md-4">
										<div class="form-group">
											<label for="dark_red_bg">{{ __('Deep Red Background') }}:</label>
											<div class="input-group my-colorpicker2">
												<input id="dark_red_bg" type="text" name="dark_red_bg"
													value="{{ $color['dark_red_bg'] }}"
													class="form-control my-colorpicker1" placeholder="Choose color"
													required>

												<div class="input-group-addon">
													<i></i>
												</div>
											</div>
										</div>
									</div>

									<div class="col-xs-12 col-md-6">
										<img src="{{ url('images/screenshot/14.png') }}" class="img-responsive img-margin-auto"
											width="400px" height="400px">
									</div>
								</div>
								<br>
								<hr>
								<br>




							</div>
						</div>
						<br>


						<h4 class="box-title">{{ __('adminstaticword.TextColor') }}</h4>

						<div class="row">
							<div class="col-xs-12">


								<div class="row">
									<div class="col-xs-12 col-md-2"></div>

									<div class="col-xs-12 col-md-4">
										<div class="form-group">
											<label for="black_text">{{ __('Black Text') }}:</label>
											<div class="input-group my-colorpicker2">
												<input id="black_text" type="text" name="black_text" value="{{ $color['black_text'] }}"
													class="form-control my-colorpicker1" placeholder="Choose color"
													required>

												<div class="input-group-addon">
													<i></i>
												</div>
											</div>
										</div>
									</div>

									<div class="col-xs-12 col-md-6">
										<img src="{{ url('images/screenshot/12.png') }}" class="img-responsive img-margin-auto"
											width="400px" height="400px">
									</div>
								</div>
								<br>
								<hr>
								<br>

								<div class="row">
									<div class="col-xs-12 col-md-2"></div>

									<div class="col-xs-12 col-md-4">
										<div class="form-group">
											<label for="light_grey_text">{{ __('Light Grey Text') }}:</label>
											<div class="input-group my-colorpicker2">
												<input id="light_grey_text" type="text" name="light_grey_text"
													value="{{ $color['light_grey_text'] }}"
													class="form-control my-colorpicker1" placeholder="Choose color"
													required>

												<div class="input-group-addon">
													<i></i>
												</div>
											</div>
										</div>
									</div>

									<div class="col-xs-12 col-md-6">
										<img src="{{ url('images/screenshot/11.png') }}" class="img-responsive img-margin-auto"
											width="400px" height="400px">
									</div>
								</div>
								<br>
								<hr>
								<br>

								<div class="row">
									<div class="col-xs-12 col-md-2"></div>

									<div class="col-xs-12 col-md-4">
										<div class="form-group">
											<label for="dark_grey_text">{{ __('Dark Grey Text') }}:</label>
											<div class="input-group my-colorpicker2">
												<input id="dark_grey_text" type="text" name="dark_grey_text"
													value="{{ $color['dark_grey_text'] }}"
													class="form-control my-colorpicker1" placeholder="Choose color"
													required>

												<div class="input-group-addon">
													<i></i>
												</div>
											</div>
										</div>
									</div>

									<div class="col-xs-12 col-md-6">
										<img src="{{ url('images/screenshot/10.png') }}" class="img-responsive img-margin-auto"
											width="400px" height="400px">
									</div>
								</div>
								<br>
								<hr>
								<br>

								<div class="row">
									<div class="col-xs-12 col-md-2"></div>

									<div class="col-xs-12 col-md-4">
										<div class="form-group">
											<label for="red_text">{{ __('Red Text') }}:</label>
											<div class="input-group my-colorpicker2">
												<input id="red_text" type="text" name="red_text" value="{{ $color['red_text'] }}"
													class="form-control my-colorpicker1" placeholder="Choose color"
													required>

												<div class="input-group-addon">
													<i></i>
												</div>
											</div>
										</div>
									</div>

									<div class="col-xs-12 col-md-6">
										<img src="{{ url('images/screenshot/9.png') }}" class="img-responsive img-margin-auto"
											width="400px" height="400px">
									</div>
								</div>
								<br>
								<hr>
								<br>

								<div class="row">
									<div class="col-xs-12 col-md-2"></div>

									<div class="col-xs-12 col-md-4">
										<div class="form-group">
											<label for="blue_text">{{ __('Blue Text') }}:</label>
											<div class="input-group my-colorpicker2">
												<input id="blue_text" type="text" name="blue_text" value="{{ $color['blue_text'] }}"
													class="form-control my-colorpicker1" placeholder="Choose color"
													required>

												<div class="input-group-addon">
													<i></i>
												</div>
											</div>
										</div>
									</div>

									<div class="col-xs-12 col-md-6">
										<img src="{{ url('images/screenshot/8.png') }}" class="img-responsive img-margin-auto"
											width="400px" height="400px">
									</div>
								</div>
								<br>
								<hr>
								<br>

								<div class="row">
									<div class="col-xs-12 col-md-2"></div>

									<div class="col-xs-12 col-md-4">
										<div class="form-group">
											<label for="dark_blue_text">{{ __('Dark Blue Text') }}:</label>
											<div class="input-group my-colorpicker2">
												<input id="dark_blue_text" type="text" name="dark_blue_text"
													value="{{ $color['dark_blue_text'] }}"
													class="form-control my-colorpicker1" placeholder="Choose color"
													required>

												<div class="input-group-addon">
													<i></i>
												</div>
											</div>
										</div>
									</div>

									<div class="col-xs-12 col-md-6">
										<img src="{{ url('images/screenshot/8.png') }}" class="img-responsive img-margin-auto"
											width="400px" height="400px">
									</div>
								</div>
								<br>
								<hr>
								<br>

								<div class="row">
									<div class="col-xs-12 col-md-2"></div>

									<div class="col-xs-12 col-md-4">
										<div class="form-group">
											<label for="white_text">{{ __('White Text') }}:</label>
											<div class="input-group my-colorpicker2">
												<input id="white_text" type="text" name="white_text" value="{{ $color['white_text'] }}"
													class="form-control my-colorpicker1" placeholder="Choose color"
													required>

												<div class="input-group-addon">
													<i></i>
												</div>
											</div>
										</div>
									</div>

									<div class="col-xs-12 col-md-6">
										<img src="{{ url('images/screenshot/6.png') }}" class="img-responsive img-margin-auto"
											width="400px" height="400px">
									</div>
								</div>
								<br>
								<hr>
								<br>

							</div>
						</div>



						<h4 class="box-title">{{ __('Gradient Background Color') }}</h4>

						<div class="row">
							<div class="col-xs-12">


								<div class="row">
									<div class="col-xs-12 col-md-2"></div>

									<div class="col-xs-12 col-md-4">

										<div class="row">
											<div class="col-xs-12 col-md-6">
												<div class="form-group">
													<label for="linear_bg_one">{{ __('Gradient Background') }}:</label>
													<div class="input-group my-colorpicker2">
														<input id="linear_bg_one" type="text" name="linear_bg_one"
															value="{{ $color['linear_bg_one'] }}"
															class="form-control my-colorpicker1"
															placeholder="Choose color" required>

														<div class="input-group-addon">
															<i></i>
														</div>
													</div>
												</div>
											</div>

											<div class="col-xs-12 col-md-6">
												<div class="form-group">
													<label for="linear_bg_two">{{ __('Gradient Background') }}:</label>
													<div class="input-group my-colorpicker2">
														<input id="linear_bg_two" type="text" name="linear_bg_two"
															value="{{ $color['linear_bg_two'] }}"
															class="form-control my-colorpicker1"
															placeholder="Choose color" required>

														<div class="input-group-addon">
															<i></i>
														</div>
													</div>
												</div>
											</div>
										</div>

									</div>

									<div class="col-xs-12 col-md-6">
										<img src="{{ url('images/screenshot/1.png') }}" class="img-responsive img-margin-auto"
											width="400px" height="400px">
									</div>
								</div>

							</div>
						</div>
						<br>
						<hr>
						<br>


						<h4 class="box-title">{{ __('Reverse Background Gradient Color') }}</h4>

						<div class="row">
							<div class="col-xs-12">


								<div class="row">
									<div class="col-xs-12 col-md-2"></div>

									<div class="col-xs-12 col-md-4">

										<div class="row">
											<div class="col-xs-12 col-md-6">
												<div class="form-group">
													<label
														for="linear_reverse_bg_one">{{ __('Gradient Background') }}:</label>
													<div class="input-group my-colorpicker2">
														<input id="linear_reverse_bg_one" type="text" name="linear_reverse_bg_one"
															value="{{ $color['linear_reverse_bg_one'] }}"
															class="form-control my-colorpicker1"
															placeholder="Choose color" required>

														<div class="input-group-addon">
															<i></i>
														</div>
													</div>
												</div>
											</div>

											<div class="col-xs-12 col-md-6">
												<div class="form-group">
													<label
														for="linear_reverse_bg_two">{{ __('Gradient Background') }}:</label>
													<div class="input-group my-colorpicker2">
														<input id="linear_reverse_bg_two" type="text" name="linear_reverse_bg_two"
															value="{{ $color['linear_reverse_bg_two'] }}"
															class="form-control my-colorpicker1"
															placeholder="Choose color" required>

														<div class="input-group-addon">
															<i></i>
														</div>
													</div>
												</div>
											</div>
										</div>

									</div>

									<div class="col-xs-12 col-md-6">
										<img src="{{ url('images/screenshot/2.png') }}" class="img-responsive img-margin-auto"
											width="400px" height="400px">
									</div>
								</div>

							</div>
						</div>
						<br>
						<hr>
						<br>



						<h4 class="box-title">{{ __('About Gradient Background Color') }}</h4>

						<div class="row">
							<div class="col-xs-12">


								<div class="row">
									<div class="col-xs-12 col-md-2"></div>

									<div class="col-xs-12 col-md-4">

										<div class="row">
											<div class="col-xs-12 col-md-6">
												<div class="form-group">
													<label
														for="linear_about_bg_one">{{ __('Gradient Background') }}:</label>
													<div class="input-group my-colorpicker2">
														<input id="linear_about_bg_one" type="text" name="linear_about_bg_one"
															value="{{ $color['linear_about_bg_one'] }}"
															class="form-control my-colorpicker1"
															placeholder="Choose color" required>

														<div class="input-group-addon">
															<i></i>
														</div>
													</div>
												</div>
											</div>

											<div class="col-xs-12 col-md-6">
												<div class="form-group">
													<label
														for="linear_about_bg_two">{{ __('Gradient Background') }}:</label>
													<div class="input-group my-colorpicker2">
														<input id="linear_about_bg_two" type="text" name="linear_about_bg_two"
															value="{{ $color['linear_about_bg_two'] }}"
															class="form-control my-colorpicker1"
															placeholder="Choose color" required>

														<div class="input-group-addon">
															<i></i>
														</div>
													</div>
												</div>
											</div>
										</div>

									</div>

									<div class="col-xs-12 col-md-6">
										<img src="{{ url('images/screenshot/3.png') }}" class="img-responsive img-margin-auto"
											width="400px" height="400px">
									</div>
								</div>

							</div>
						</div>
						<br>
						<hr>
						<br>



						<h4 class="box-title">{{ __('About Gradient Background Color Two') }}</h4>

						<div class="row">
							<div class="col-xs-12">


								<div class="row">
									<div class="col-xs-12 col-md-2"></div>

									<div class="col-xs-12 col-md-4">

										<div class="row">
											<div class="col-xs-12 col-md-6">
												<div class="form-group">
													<label
														for="linear_about_bluebg_one">{{ __('Gradient Background') }}:</label>
													<div class="input-group my-colorpicker2">
														<input id="linear_about_bluebg_one" type="text" name="linear_about_bluebg_one"
															value="{{ $color['linear_about_bluebg_one'] }}"
															class="form-control my-colorpicker1"
															placeholder="Choose color" required>

														<div class="input-group-addon">
															<i></i>
														</div>
													</div>
												</div>
											</div>

											<div class="col-xs-12 col-md-6">
												<div class="form-group">
													<label
														for="linear_about_bluebg_two">{{ __('Gradient Background') }}:</label>
													<div class="input-group my-colorpicker2">
														<input id="linear_about_bluebg_two" type="text" name="linear_about_bluebg_two"
															value="{{ $color['linear_about_bluebg_two'] }}"
															class="form-control my-colorpicker1"
															placeholder="Choose color" required>

														<div class="input-group-addon">
															<i></i>
														</div>
													</div>
												</div>
											</div>
										</div>

									</div>

									<div class="col-xs-12 col-md-6">
										<img src="{{ url('images/screenshot/4.png') }}" class="img-responsive img-margin-auto"
											width="400px" height="400px">
									</div>
								</div>

							</div>
						</div>
						<br>
						<hr>
						<br>



						<h4 class="box-title">{{ __('Career Gradient Background Color') }}</h4>

						<div class="row">
							<div class="col-xs-12">


								<div class="row">
									<div class="col-xs-12 col-md-2"></div>

									<div class="col-xs-12 col-md-4">

										<div class="row">
											<div class="col-xs-12 col-md-6">
												<div class="form-group">
													<label
														for="linear_career_bg_one">{{ __('Gradient Background') }}:</label>
													<div class="input-group my-colorpicker2">
														<input id="linear_career_bg_one" type="text" name="linear_career_bg_one"
															value="{{ $color['linear_career_bg_one'] }}"
															class="form-control my-colorpicker1"
															placeholder="Choose color" required>

														<div class="input-group-addon">
															<i></i>
														</div>
													</div>
												</div>
											</div>

											<div class="col-xs-12 col-md-6">
												<div class="form-group">
													<label
														for="linear_career_bg_two">{{ __('Gradient Background') }}:</label>
													<div class="input-group my-colorpicker2">
														<input id="linear_career_bg_two" type="text" name="linear_career_bg_two"
															value="{{ $color['linear_career_bg_two'] }}"
															class="form-control my-colorpicker1"
															placeholder="Choose color" required>

														<div class="input-group-addon">
															<i></i>
														</div>
													</div>
												</div>
											</div>
										</div>

									</div>

									<div class="col-xs-12 col-md-6">
										<img src="{{ url('images/screenshot/5.png') }}" class="img-responsive img-margin-auto"
											width="400px" height="400px">
									</div>
								</div>

							</div>
						</div>
						<br>
						<hr>
						<br>




						<div class="box-footer">
							<div class="row">
								<div class="col-xs-9 col-md-10"></div>
								<button value="" type="submit" class="btn btn-md col-xs-3 col-md-2 btn-primary">{{ __('adminstaticword.Save') }}</button>
							</div>
						</div>



					</form>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection


@section('script')

<script>
	$(function () {
		$('.my-colorpicker1').colorpicker();
	})
</script>


<script type="text/javascript">
	$(function () {
		$('.my-colorpicker2').colorpicker()
	})
</script>

@endsection