@extends('admin.layouts.master')
@section('title', __('adminstaticword.ComingSoon') . ' - ' . __('adminstaticword.Admin'))
@section('body')

<section class="content">
	@include('admin.message')
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">{{ __('adminstaticword.ComingSoon') }}</h3>
				</div>
				<div class="panel-body">
					<form action="{{ action('ComingSoonController@update') }}" method="POST"
						enctype="multipart/form-data">
						{{ csrf_field() }}
						{{ method_field('PUT') }}

						<div class="row">
							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<label for="heading">{{ __('adminstaticword.Heading') }}<sup
											class="redstar">*</sup></label>
									<input id="heading" value="{{ optional($comingsoon)->heading }}" name="heading"
										type="text" class="form-control" required />
								</div>
								<div class="form-group">
									<label for="btn_text">{{ __('adminstaticword.ButtonText') }}<sup
											class="redstar">*</sup></label>
									<input id="btn_text" value="{{ optional($comingsoon)->btn_text }}" name="btn_text"
										type="text" class="form-control" required />
								</div>
							</div>

							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<label for="bg_image">{{ __('adminstaticword.BackgroundImage') }}<sup
											class="redstar">*</sup></label>
									<div>
										<input type="file" name="bg_image" id="bg_image" class="inputfile inputfile-1">
										<label for="bg_image"><svg xmlns="http://www.w3.org/2000/svg" width="50"
												height="30" viewBox="0 0 20 17">
												<path
													d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
											</svg> <span>{{ __('adminstaticword.Chooseafile') }}</span>
										</label>
									</div>
									<img src="{{ url('/images/comingsoon/'.optional($comingsoon)->bg_image) }}"
										class="img-responsive" />
								</div>
							</div>
						</div>

						<hr>

						{{-- Counters --}}
						<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-3">
								<div class="form-group">
									<label class="item-flex" for="count_one"><i class='bx bx-stopwatch me' ></i> {{ __('adminstaticword.CounterOne') }}<sup
											class="redstar">*</sup></label>
									<input id="count_one" value="{{ optional($comingsoon)->count_one }}" name="count_one" type="text"
										class="form-control" required />
								</div>
								<div class="form-group">
									<label for="text_one">
										{{(app()->getLocale()=='ar')? 
											__('adminstaticword.Text') .' '. __('adminstaticword.CounterOne') 
											: 
											__('adminstaticword.CounterOne') .' '. __('adminstaticword.Text')
										}}
										<sup class="redstar">*</sup>
									</label>
									<input id="text_one" value="{{ optional($comingsoon)->text_one }}" name="text_one" type="text"
										class="form-control" required />
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-3">
								<div class="form-group">
									<label class="item-flex" for="count_two"><i class='bx bx-stopwatch me' ></i> {{ __('adminstaticword.CounterTwo') }}<sup
											class="redstar">*</sup></label>
									<input id="count_two" value="{{ optional($comingsoon)->count_two }}" name="count_two" type="text"
										class="form-control" required />
								</div>
								<div class="form-group">
									<label for="text_two">
										{{(app()->getLocale()=='ar')? 
											__('adminstaticword.Text') .' '. __('adminstaticword.CounterTwo')
											: 
											__('adminstaticword.CounterTwo') .' '. __('adminstaticword.Text') 
										}}
										<sup class="redstar">*</sup>
									</label>
									<input id="text_two" value="{{ optional($comingsoon)->text_two }}" name="text_two" type="text"
										class="form-control" required />
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-3">
								<div class="form-group">
									<label class="item-flex" for="count_three"><i class='bx bx-stopwatch me' ></i> {{ __('adminstaticword.CounterThree') }}<sup
											class="redstar">*</sup></label>
									<input id="count_three" value="{{ optional($comingsoon)->count_three }}" name="count_three"
										type="text" class="form-control" required />
								</div>
								<div class="form-group">
									<label for="text_three">
										{{(app()->getLocale()=='ar')? 
											__('adminstaticword.Text') .' '. __('adminstaticword.CounterThree') 
											: 
											__('adminstaticword.CounterThree') .' '. __('adminstaticword.Text')
										}}
										<sup class="redstar">*</sup>
									</label>
									<input id="text_three" value="{{ optional($comingsoon)->text_three }}" name="text_three" type="text"
										class="form-control" required />
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-3">
								<div class="form-group">
									<label class="item-flex" for="count_four"><i class='bx bx-stopwatch me' ></i> {{ __('adminstaticword.CounterFour') }}<sup
											class="redstar">*</sup></label>
									<input id="count_four" value="{{ optional($comingsoon)->count_four }}" name="count_four" type="text"
										class="form-control" required />
								</div>
								<div class="form-group">
									<label for="text_four">
										{{(app()->getLocale()=='ar')? 
											__('adminstaticword.Text') .' '. __('adminstaticword.CounterFour')
											: 
											__('adminstaticword.CounterFour') .' '. __('adminstaticword.Text')
										}}
										<sup class="redstar">*</sup>
									</label>
									<input id="text_four" value="{{ optional($comingsoon)->text_four }}" name="text_four" type="text"
										class="form-control" required />
								</div>
							</div>
						</div>

						<hr>


						<div class="row">
							<div class="col-xs-12">
								<div class="form-group">
									<label for="allowed_ip">Enter IP Address to allowed while Maintanace Mode is Enabled
										(ex:
										172.16.254.1, 506.457.14.512)</label>
									<select id="allowed_ip" class="form-control js-example-basic-single"
										name="allowed_ip[]" multiple="multiple" size="5">
										@if(is_array(optional($comingsoon)->allowed_ip) ||
										is_object(optional($comingsoon)->allowed_ip))
										@foreach(optional($comingsoon)->allowed_ip as $cat)
										<option value="{{ $cat }}"
											{{in_array($cat, $comingsoon['allowed_ip'] ?: []) ? "selected": ""}}>
											{{ $cat }}
										</option>
										@endforeach
										@endif
									</select>
								</div>
							</div>

							<div class="col-xs-12">
								<div class="from-group">
									<label>{{ __('Enable Maintanace Mode') }}: </label>
									<div class="toggler">
										<input hidden id="enable" type="checkbox" name="enable"
											{{ optional($comingsoon)->enable == 1 ? 'checked' : '' }}>
										<label
											class="main-toggle toggle-lg {{ optional($comingsoon)->enable == 1 ? 'on' : '' }}"
											for="enable">
											<span data-off="{{ __('adminstaticword.Disable') }}"
												data-on="{{ __('adminstaticword.Enable') }}"></span>
										</label>
									</div>
									<div>
										<small>({{ __('adminstaticword.Enable') }}
											{{ __('Enable Maintanace Mode') }})</small>
									</div>
								</div>
							</div>
						</div>


						<div class="box-footer">
							<div class="row">
								<div class="col-xs-9"></div>
								<button value="" type="submit"
									class="btn btn-md col-xs-3 btn-primary">{{ __('adminstaticword.Save') }}</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection