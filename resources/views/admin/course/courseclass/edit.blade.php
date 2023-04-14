@extends('admin/layouts.master')
@section('title', __('adminstaticword.Edit') . ' ' . __('adminstaticword.CourseClass'))
@section('body')

<section class="content">

	<div class="row">
		<div class="col-xs-12 {{ $cate->type =="video" ? 'col-md-7' : "" }}">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">{{ __('adminstaticword.Edit') }} {{ __('adminstaticword.CourseClass') }}</h3>
					<a href="{{ url()->previous() }}" class="btn btn-success pull-right owtbtn">
                        {{ __('adminstaticword.Back') }}
                    </a>
				</div>
				<div class="box-body">
					<form enctype="multipart/form-data" id="demo-form" method="post"
						action="{{url('courseclass/'.$cate->id)}}" data-parsley-validate>
						{{ csrf_field() }}
						{{ method_field('PUT') }}

						<div class="row">
							<div class="col-xs-12">
								<div class="form-group">
									<label for="coursechapter">{{ __('adminstaticword.ChapterName') }}:</label>
									<select id="coursechapter" name="coursechapter" class="form-control">
										@php
										$coursechapters = App\CourseChapter::all();
										@endphp
										@foreach($coursechapters as $cat)
										<option {{ $cate->coursechapter_id == $cat->id ? 'selected' : "" }}
											value="{{ $cat->id }}">
											{{ $cat->chapter_name }}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="form-group">
									<label for="title">{{ __('adminstaticword.Title') }}: <sup class="redstar">*</sup></label>
									<input type="text" class="form-control " name="title" id="title" value="{{$cate->title}}" required>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="form-group">
									<label for="chapters">{{ __('adminstaticword.CourseChapter') }}:</label>
									<select name="coursechapter_id" id="chapters" class="form-control">
										@foreach($coursechapt as $chapters)
										<option value="{{ $chapters->id }}"
											{{ $cate->coursechapter_id==$chapters->id ? 'selected' : '' }}>
											{{ $chapters->chapter_name }}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="form-group">
									<label for="detail3">{{ __('adminstaticword.Detail') }}:</label>
									<textarea id="detail3" name="detail" rows="5" class="form-control" placeholder="Enter Your Details">{{ $cate->detail }}</textarea>
								</div>
							</div>
							<div class="col-xs-12">
								<div class="form-group">
									<label for="filetype">{{ __('adminstaticword.Type') }}:</label>
									<select name="type" id="filetype" class="form-control">
										<option value="{{ $cate->type }}">{{ $cate->type }}</option>
									</select>
								</div>
							</div>
						</div>


						<div class="row">
							{{-- Video --}}
							<div class="col-xs-12">
								@if($cate->type =="video")
									<div class="form-group" id="videotype">
										<input type="radio" name="checkVideo" id="ch1" value="url"
											{{ $cate->url !="" ? 'checked' : "" }}>&nbsp;{{ __('adminstaticword.URL') }}&emsp;
										<input type="radio" name="checkVideo" id="ch2" value="uploadvideo"
											{{ $cate->video !="" ? 'checked' : "" }}>&nbsp;{{ __('adminstaticword.UploadVideo') }}&emsp;
										<input type="radio" name="checkVideo" id="ch9" value="iframeurl"
											{{ $cate->iframe_url !="" ? 'checked' : "" }}>&nbsp;{{ __('adminstaticword.IframeURL') }}&emsp;
										<input type="radio" name="checkVideo" id="ch10" value="liveurl"
											{{ $cate->date_time !="" ? 'checked' : "" }}>&nbsp;{{ __('adminstaticword.LiveClass') }}&emsp;
	
	
										@if($gsetting->aws_enable == 1)
										<div class="form-group">
											<input type="radio" name="checkVideo" id="ch13" value="aws_upload"
												{{ $cate->aws_upload !="" ? 'checked' : "" }}>&nbsp;{{ __('adminstaticword.AWSUpload') }}
										</div>
	
										@endif
	
										@if($gsetting->youtube_enable == 1)
										<div class="form-group">
											<input type="radio" name="checkVideo" id="youtubeurl"
												value="youtube">&nbsp;{{ __('Youtube API') }}&emsp;
										</div>
										@endif
	
										@if($gsetting->vimeo_enable == 1)
										<div class="form-group">
											<input type="radio" name="checkVideo" id="vimeourl"
												value="vimeo">&nbsp;{{ __('Vimeo API') }}&emsp;
										</div>
										@endif
									</div>
		
									<!-- aws edit -->
									@if($gsetting->aws_enable == 1)
									<div id="awsUpload" @if($cate->video !=NULL || $cate->iframe_url !=NULL || $cate->url) class="display-none" @endif>
										<div class="form-group">
											<label for="aws_upload">{{ __('adminstaticword.AWSUpload') }}: </label>
											<div>
												<input id="aws_upload" type="file" name="aws_upload" class="inputfile inputfile-1" />
												<label for="aws_upload"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="30"
														viewBox="0 0 20 17">
														<path
															d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
													</svg> <span>{{ __('adminstaticword.Chooseafile') }}</span></label>
												<span class="text-danger invalid-feedback" role="alert"></span>
											</div>
										</div>
										@if($cate->aws_upload !="")
										<div class="form-group">
											<label for="AWSFileName">{{ __('adminstaticword.AWSFileName') }}:</label>
											<input id="AWSFileName" disabled value="{{ $cate->aws_upload }}" class="form-control">
										</div>
										@endif
									</div>
									@endif
		
									<div id="videoURL" @if($cate->video !=NULL || $cate->iframe_url !=NULL ||
										$cate->aws_upload !=NULL) class="display-none" @endif>
										<div class="form-group">
											<label for="apiUrl">{{ __('adminstaticword.URL') }}: </label>
											<input type="text" id="apiUrl" value="{{ $cate->url }}" name="vidurl"
												class="form-control">
										</div>
									</div>
		
									<div id="videoUpload" @if($cate->url !=NULL || $cate->iframe_url !=NULL ||
										$cate->aws_upload !=NULL) class="display-none" @endif>
										<div class="form-group">
											<label for="video_upld">{{ __('adminstaticword.UploadVideo') }}: </label>
											<div>
												<input id="video_upld" type="file" name="video_upld" class="inputfile inputfile-1" />
												<label for="video_upld"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="30"
														viewBox="0 0 20 17">
														<path
															d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
													</svg> <span>{{ __('adminstaticword.Chooseafile') }}</span></label>
												<span class="text-danger invalid-feedback" role="alert"></span>
											</div>
											@if($cate->video !="")
											<video src="{{ asset('video/class/'.$cate->video) }}" controls></video>
											@endif
										</div>
									</div>
		
									<div id="iframeURLBox" @if($cate->url !=NULL || $cate->video !=NULL ||
										$cate->aws_upload !=NULL) class="display-none" @endif >
										<div class="form-group">
											<label for="iframe_url">{{ __('adminstaticword.IframeURL') }}: </label>
											<input id="iframe_url" type="text" value="{{ $cate->iframe_url }}" name="iframe_url"
												class="form-control">
										</div>
									</div>
		
									<div id="liveURLBox" @if($cate->iframe_url !=NULL || $cate->video !=NULL ||
										$cate->aws_upload !=NULL
										|| $cate->url !=NULL) class="display-none" @endif >
										<div class="form-group">
											<label for="date_time">Select a Date & Time:</label>
											<input type="datetime-local" id="date_time" name="date_time"
												value="{{ $live_date }}" class="form-control">
										</div>
									</div>
		
									<div class="form-group" id="duration">
										<label for="duration_field">{{ __('adminstaticword.Duration') }} :</label>
										<input id="duration_field" type="text" name="duration" value="{{ $cate->duration }}"
											class="form-control" placeholder="Enter class duration in (mins) Eg:160">
									</div>
								@endif

							</div>
							{{-- Audio --}}
							<div class="col-xs-12">
								@if($cate->type =="audio")
									<div class="form-group">
										<input type="radio" name="checkAudio" id="ch11" value="audiourl"
											{{ $cate->url !="" ? 'checked' : "" }}> {{ __('adminstaticword.URL') }}
										<input type="radio" name="checkAudio" id="ch12"
											{{ $cate->audio !="" ? 'checked' : "" }} value="uploadaudio">
										{{ __('adminstaticword.UploadAudio') }}
									</div>
			
									<div id="audioURL" @if($cate->audio != "") class="display-none" @endif >
										<div class="form-group">
											<label for="audiourl">{{ __('adminstaticword.URL') }}: </label>
											<input id="audiourl" type="text" value="{{ $cate->url }}" name="audiourl"
												class="form-control">
										</div>
									</div>
			
									<div id="audiofile" @if($cate->url !="") class="display-none" @endif>
										<div class="form-group">
											<label for="audiofile">{{ __('adminstaticword.UploadAudio') }}:</label>
											<div>
												<input id="audiofile" type="file" name="audio" class="inputfile inputfile-1" />
												<label for="audiofile"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="30"
														viewBox="0 0 20 17">
														<path
															d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
													</svg> <span>{{ __('adminstaticword.Chooseafile') }}</span></label>
												<span class="text-danger invalid-feedback" role="alert"></span>
											</div>
										</div>
										@if($cate->audio !="")
										<div class="form-group">
											<label for="audioname">{{ __('adminstaticword.AudioFileName') }}:</label>
											<input id="audioname" disabled value="{{ $cate->audio }}" class="form-control">
										</div>
										@endif
									</div>
			
									<div class="form-group" id="duration">
										<label for="duration_field">{{ __('adminstaticword.Duration') }} :</label>
										<input id="duration_field" type="text" name="duration" value="{{ $cate->duration }}"
											class="form-control" placeholder="Enter class duration in (mins) Eg:160">
									</div>
								@endif
							</div>
							{{-- Image --}}
							<div class="col-xs-12">
								@if($cate->type =="image")
									<div class="form-group" id="imagetype">
										<input type="radio" name="checkImage" id="ch3" value="url"
											{{ $cate->url !="" ? 'checked' : "" }}>
										{{ __('adminstaticword.URL') }}
										<input type="radio" name="checkImage" id="ch4" {{ $cate->image !="" ? 'checked' : "" }}
											value="uploadimage"> {{ __('adminstaticword.UploadImage') }}
									</div>
			
									<div id="imageURL" @if($cate->image !="") class="display-none" @endif >
										<div class="form-group">
											<label for="imgurl">{{ __('adminstaticword.URL') }}: </label>
											<input id="imgurl" type="text" value="{{ $cate->url }}" name="imgurl" class="form-control">
										</div>
									</div>
			
									<div id="imageUpload" @if($cate->url !="") class="display-none" @endif >
										<div class="form-group">
											<label for="fileimg">{{ __('adminstaticword.UploadImage') }}:</label>
											<div>
												<input id="fileimg" type="file" name="image" class="inputfile inputfile-1" />
												<label for="fileimg"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="30"
														viewBox="0 0 20 17">
														<path
															d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
													</svg> <span>{{ __('adminstaticword.Chooseafile') }}</span></label>
												<span class="text-danger invalid-feedback" role="alert"></span>
											</div>
											@if($cate->image !="")
											<img src="{{ asset('images/class/'.$cate->image) }}" width="200" height="150"
												autoplay="no">
											</img>
											@endif
										</div>
									</div>
			
									<div class="form-group" id="size">
										<label for="sizefield">{{ __('adminstaticword.Size') }}:</label>
										<input id="sizefield" type="text" name="size" value="{{ $cate->size }}" class="form-control">
									</div>
								@endif
							</div>
							{{-- Zip --}}
							<div class="col-xs-12">
								@if($cate->type =="zip")
									<div class="form-group" id="ziptype">
										<input type="radio" name="checkZip" id="ch5" value="url"
											{{ $cate->url !="" ? 'checked' : "" }}>
										{{ __('adminstaticword.URL') }}
										<input type="radio" name="checkZip" id="ch6" {{ $cate->zip !="" ? 'checked' : "" }}
											value="uploadzip">
										{{ __('adminstaticword.UploadZip') }}
									</div>
			
									<div id="zipURL" @if($cate->zip !="") class="display-none" @endif >
										<div class="form-group">
											<label for="zipurl"> {{ __('adminstaticword.URL') }}: </label>
											<input id="zipurl" type="text" value="{{ $cate->url }}" name="zipurl" class="form-control">
										</div>
									</div>
			
									<div id="zipUpload" @if($cate->url !="") class="display-none" @endif>
										<div class="form-group">
											<label for="zipfile">{{ __('adminstaticword.UploadZip') }}:</label>
											<div>
												<input id="zipfile" type="file" name="zip" class="inputfile inputfile-1" />
												<label for="zipfile"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="30"
														viewBox="0 0 20 17">
														<path
															d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
													</svg> <span>{{ __('adminstaticword.Chooseafile') }}</span></label>
												<span class="text-danger invalid-feedback" role="alert"></span>
											</div>
										</div>
										@if($cate->zip !="")
										<div class="form-group">
											<label for="zipname">{{ __('adminstaticword.ZipFileName') }}:</label>
											<input id="zipname" disabled value="{{ $cate->zip }}" class="form-control">
										</div>
										@endif
									</div>
			
									<div class="form-group" id="size">
										<label for="size"> {{ __('adminstaticword.Size') }}:</label>
										<input id="size" type="text" name="size" value="{{ $cate->size }}" class="form-control">
									</div>
								@endif
							</div>
							{{-- pdf --}}
							<div class="col-xs-12">
								@if($cate->type =="pdf")
									<div class="form-group" id="pdftype">
										<input type="radio" name="checkPdf" id="ch8" value="url"
											{{ $cate->url !="" ? 'checked' : "" }}>
										{{ __('adminstaticword.URL') }}
										<input type="radio" name="checkPdf" id="ch9" {{ $cate->pdf !="" ? 'checked' : "" }}
											value="uploadpdf">
										{{ __('adminstaticword.UploadPdf') }}
									</div>
		
		
									<div id="pdfURL" @if($cate->pdf !="") class="display-none" @endif >
										<div class="form-group">
											<label for="pdfurl"> {{ __('adminstaticword.URL') }}: </label>
											<input id="pdfurl" type="text" value="{{ $cate->url }}" name="pdfurl" class="form-control">
										</div>
									</div>
		
									<div @if($cate->url !="") class="display-none" @endif id="pdfUpload">
										<div class="form-group">
											<label for="pdf"> {{ __('adminstaticword.UploadPdf') }}:</label>
											<div>
												<input id="pdf" type="file" name="pdf" class="inputfile inputfile-1" />
												<label for="pdf"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="30"
														viewBox="0 0 20 17">
														<path
															d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
													</svg> <span>{{ __('adminstaticword.Chooseafile') }}</span></label>
												<span class="text-danger invalid-feedback" role="alert"></span>
											</div>
										</div>
										@if($cate->pdf !="")
										<div class="form-group">
											<label for="pdfname">{{ __('adminstaticword.PdfFileName') }}:</label>
											<input id="pdfname" disabled value="{{ $cate->pdf }}" class="form-control">
										</div>
										@endif
									</div>
		
									<div class="form-group" id="size">
										<label for="size">{{ __('adminstaticword.Size') }}:</label>
										<input id="size" type="text" name="size" value="{{ $cate->size }}" class="form-control">
									</div>
								@endif
							</div>
						</div>


						<!-- preview video -->
						@if($cate->type =="video")
						<div class="row">
							<div class="col-xs-12">
								<div class="form-group">
									<label>{{ __('adminstaticword.PreviewVideo') }}:</label>
									<div class="toggler">
										<input name="preview_type" hidden id="previewvide"
											type="checkbox">
										<label class="main-toggle toggle-lg" for="previewvide">
											<span data-off="{{ __('adminstaticword.URL') }}" data-on="{{ __('adminstaticword.UploadVideo') }}"></span>
										</label>
									</div>
									<input type="hidden" name="free" value="0" id="to">
								</div>

								<div @if($cate->preview_type =="url" ) class="display-none" @endif id="document11">
									<div class="form-group">
										<label for="video">Preview {{ __('adminstaticword.UploadVideo') }}:
											<sup class="redstar">*</sup></label>
										<div>
											<input type="file" name="video" id="video" class="inputfile inputfile-1" value="{{ $cate->video }}"/>
											<label for="video"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="30"
													viewBox="0 0 20 17">
													<path
														d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
												</svg> <span>{{ __('adminstaticword.Chooseafile') }}</span></label>
											<span class="text-danger invalid-feedback" role="alert"></span>
										</div>
										@if($cate->preview_video !="")
										<video src="{{ asset('video/class/preview/'.$cate->preview_video) }}"
											width="200" height="150" autoplay="no">
										</video>
										@endif
									</div>
								</div>

								<div @if($cate->preview_type =="video") class="display-none" @endif id="document22">
									<div class="form-group">
										<label for="url">Preview {{ __('adminstaticword.URL') }}: <sup
												class="redstar">*</sup></label>
										<input class="form-control" placeholder="Enter Your URL" name="preview_url"
											id="url" value="{{ $cate->preview_url }}">
									</div>
								</div>
							</div>
						</div>
						<br>
						@endif
						<!-- end preview video -->


						{{-- Learning Material --}}
						<div class="row">
							<div class="col-xs-12">
								<div class="form-group">
									<label for="file2">{{ __('adminstaticword.LearningMaterial') }}</label> -
									<p class="inline info">eg: zip or pdf files</p>
									<div>
										<input type="file" name="file" value="{{ $cate->file }}" id="file2"
											class="{{ $errors->has('file') ? ' is-invalid' : '' }} inputfile inputfile-1" />
										<label for="file2"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="30"
												viewBox="0 0 20 17">
												<path
													d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
											</svg> <span>{{ __('adminstaticword.Chooseafile') }}</span>
										</label>
										<span class="text-danger invalid-feedback" role="alert"></span>
									</div>
									@if($cate->file != NULL)
									<input disabled class="form-control" value="{{$cate->file}}">
									@endif
								</div>
							</div>
						</div>


						<div class="row">
							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<label>{{ __('adminstaticword.Status') }}:</label>
									<div class="toggler">
										<input hidden id="status" type="checkbox" name="status"
											{{ $cate->status == '1' ? 'checked' : '' }}>
										<label class="main-toggle toggle-lg {{ $cate->status == '1' ? 'on' : '' }}" for="status">
											<span data-off="{{ __('adminstaticword.Disable') }}" data-on="{{ __('adminstaticword.Enable') }}"></span>
										</label>
									</div>
									<input type="hidden" name="free" value="0" for="status" id="status">
								</div>
							</div>
							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<label>{{ __('adminstaticword.Featured') }}:</label>
									<div class="toggler">
										<input hidden id="featured" type="checkbox" name="featured"
											{{ $cate->featured == '1' ? 'checked' : '' }}>
										<label class="main-toggle toggle-lg {{ $cate->featured == '1' ? 'on' : '' }}" for="featured">
											<span data-off="{{ __('adminstaticword.Disable') }}" data-on="{{ __('adminstaticword.Enable') }}"></span>
										</label>
									</div>
									<input type="hidden" name="free" value="0" id="featured">
								</div>
							</div>
						</div>

						<div class="box-footer">
							<div class="row">
								<div class="col-xs-9"></div>
								<button type="submit" class="btn btn-md col-xs-3 btn-primary">{{ __('adminstaticword.Save') }}</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>


		@if($cate->type =="video")

		<div class="col-xs-12 col-md-5">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">{{ __('adminstaticword.Subtitle') }}</h3>
				</div>
				<div class="box-body">
					<a data-toggle="modal" data-target="#myModalSubtitle" href="#" class="btn btn-info btn-sm">+
						{{ __('adminstaticword.Add') }} {{ __('adminstaticword.Subtitle') }}</a>

					<!--Model start-->
					<div class="modal fade" id="myModalSubtitle" tabindex="-1" role="dialog"
						aria-labelledby="myModalLabel">
						<div class="modal-dialog modal-lg" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
											aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="myModalLabel">
										{{ __('adminstaticword.Add') }} {{ __('adminstaticword.Subtitle') }}</h4>
								</div>
								<div class="box box-primary">
									<div class="panel panel-sum">
										<div class="modal-body">
											<form enctype="multipart/form-data" id="demo-form2" method="post"
												action="{{ route('add.subtitle',$cate->id) }}" data-parsley-validate>
												{{ csrf_field() }}

												<div id="subtitle">
													<div class="form-group">
														<label>{{ __('adminstaticword.Subtitle') }}:</label>
														<div class="table-responsive">
															<table class="table table-bordered" id="dynamic_field">
																<tr>
																	<td>
																		<div
																			class="{{ $errors->has('sub_t') ? ' has-error' : '' }} input-file-block">
																			<div>
																				<input type="file" name="sub_t[]" id="sub_t" class="inputfile inputfile-1" />
																				<label for="sub_t"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="30"
																						viewBox="0 0 20 17">
																						<path
																							d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
																					</svg> <span>{{ __('adminstaticword.Chooseafile') }}</span>
																				</label>
																				<span class="text-danger invalid-feedback" role="alert"></span>
																			</div>
																			<p class="info">Choose subtitle file ex.
																				subtitle.srt, or. txt</p>
																			<small
																				class="text-danger">{{ $errors->first('sub_t') }}</small>
																		</div>
																	</td>
		
																	<td>
																		<input type="text" name="sub_lang[]"
																			placeholder="Subtitle Language"
																			class="form-control name_list" />
																	</td>
																	<td><button type="button" name="add" id="add"
																			class="btn btn-xs btn-success">
																			<i class="fa fa-plus"></i>
																		</button></td>
																</tr>
															</table>
														</div>
													</div>
												</div>
												<div class="box-footer">
													<div class="row">
														<div class="col-xs-9"></div>
														<button type="submit" class="btn btn-md col-xs-3 btn-primary">{{ __('adminstaticword.Submit') }}</button>
													</div>
												</div>

											</form>
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>
					<div class="table-responsive">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<br>
								<br>
								<tr>
									<th>#</th>
									<th>{{ __('adminstaticword.SubtitleLanguage') }} </th>
									<th>{{ __('adminstaticword.Delete') }}</th>
								</tr>
							</thead>
							<tbody>
								<?php $i=0;?>
								@foreach($subtitles as $subtitle)
								<?php $i++;?>
								<tr>
									<td><?php echo $i;?></td>
									<td>{{$subtitle->sub_lang}}</td>
									<td>
										<form method="post" action="{{ route('del.subtitle',$subtitle->id) }}"
											data-parsley-validate class="form-horizontal form-label-left">
											{{ csrf_field() }}
	
											<button type="submit" class="btn-null table-delete">
												<i class='bx bx-trash'></i>
											</button>
										</form>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>




			<!--youtube API Modal -->
			<div id="myyoutubeModal" class="modal fade" role="dialog">
				<div class="modal-dialog modal-lg">

					<!--youtube API Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h1 class="modal-title">Search From Youtube API</h1>
						</div>
						<div class="modal-body">
							@if(is_null(env('YOUTUBE_API_KEY')))
							<p>Make Sure You Have Added Youtube API Key in <a href="{{url('admin/api-settings')}}">API
									Settings</a>
							</p>
							@endif

							<div id="hyv-page-container" style="clear:both;">
								<div class="hyv-content-alignment">
									<div id="hyv-page-content" class="" style="overflow:hidden;">
										<div class="container-4">
											<form action="" method="post" name="hyv-yt-search" id="hyv-yt-search">
												<input type="search" name="hyv-search" id="hyv-search"
													placeholder="Search..." class="ui-autocomplete-input"
													autocomplete="off">
												<button class="icon" id="hyv-searchBtn"></button>
											</form>
										</div>
										<div>
											<input type="hidden" id="pageToken" value="">
											<div class="btn-group" role="group" aria-label="...">
												<button type="button" id="pageTokenPrev" value=""
													class="btn btn-default">Prev</button>
												<button type="button" id="pageTokenNext" value=""
													class="btn btn-default">Next</button>
											</div>
										</div>
										<div id="hyv-watch-content"
											class="hyv-watch-main-col hyv-card hyv-card-has-padding">
											<ul id="hyv-watch-related" class="hyv-video-list">
											</ul>
										</div>

									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>

				</div>
			</div>


			<!--vimeo API Modal -->
			<div id="myvimeoModal" class="modal fade" role="dialog">
				<div class="modal-dialog modal-lg">

					<!--vimeo API Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h1 class="modal-title">Search From Vimeo API</h1>
						</div>
						<div class="modal-body">
							@if(is_null(env('VIMEO_ACCESS')))
							<p>Make Sure You Have Added Vimeo API Key in <a href="{{url('admin/api-settings')}}">API
									Settings</a></p>
							@endif

							<div id="vimeo-page-container" style="clear:both;">
								<div class="vimeo-content-alignment">
									<div id="vimeo-page-content" class="" style="overflow:hidden;">
										<div class="container-4">
											<form action="" method="post" name="vimeo-yt-search" id="vimeo-yt-search">
												<input type="search" name="vimeo-search" id="vimeo-search"
													placeholder="Search..." class="ui-autocomplete-input"
													autocomplete="off">
												<button class="icon" id="vimeo-searchBtn"></button>
											</form>
										</div>
										<div>
											<input type="hidden" id="vpageToken" value="">
											<div class="btn-group" role="group" aria-label="...">
												<button type="button" id="vpageTokenPrev" value=""
													class="btn btn-default">Prev</button>
												<button type="button" id="vpageTokenNext" value=""
													class="btn btn-default">Next</button>
											</div>
										</div>
										<div id="vimeo-watch-content"
											class="vimeo-watch-main-col vimeo-card vimeo-card-has-padding">
											<ul id="vimeo-watch-related" class="vimeo-video-list">
											</ul>
										</div>

									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>

				</div>
			</div>
		</div>

		@endif
		


</section>



@endsection


@section('script')

{{-- <script>
(function($) {
  "use strict";
    tinymce.init({selector:'textarea'});
})(jQuery);
</script> --}}

<script>
	$('#youtubeurl').click(function () {

		$('#myyoutubeModal').modal("show"); //Open Modal
		$('#videoURL').show();
		$('#videoUpload').hide();
		$('#iframeURLBox').hide();
		$('#duration_video').show();
		$('#liveclassBox').hide();
		$('#awsBox').hide();

	});
</script>

<script>
	$('#vimeourl').click(function () {

		$('#myvimeoModal').modal("show"); //Open Modal
		$('#videoURL').show();
		$('#videoUpload').hide();
		$('#iframeURLBox').hide();
		$('#duration_video').show();
		$('#liveclassBox').hide();
		$('#awsBox').hide();

	});
</script>

<script>
	function setVideoURl(videourls) {
		console.log(videourls);
		$('#apiUrl').val(videourls);
		$('#myyoutubeModal').modal("hide"); //add youtube URL
	}
</script>

<script>
	function setVideovimeoURl(videourls) {
		console.log(videourls);
		$('#apiUrl').val(videourls);
		$('#myvimeoModal').modal("hide"); // add vimeo URL
	}
</script>



<script>
	$('#previewvide').on('change', function () {

		if ($('#previewvide').is(':checked')) {
			$('#document11').show('fast');
			$('#document22').hide('fast');
		} else {
			$('#document22').show('fast');
			$('#document11').hide('fast');
		}

	});
</script>

@if($cate->type =="video")
<script>
	(function ($) {
		"use strict";

		$('#ch1').click(function () {
			$('#videoURL').show();
			$('#videoUpload').hide();
			$('#iframeURLBox').hide();
			$('#liveURLBox').hide();
			$('#awsUpload').hide();
		});

		$('#ch2').click(function () {
			$('#videoURL').hide();
			$('#videoUpload').show();
			$('#iframeURLBox').hide();
			$('#liveURLBox').hide();
			$('#awsUpload').hide();
		});

		$('#ch9').click(function () {
			$('#iframeURLBox').show();
			$('#videoURL').hide();
			$('#videoUpload').hide();
			$('#liveURLBox').hide();
			$('#awsUpload').hide();
		});

		$('#ch10').click(function () {
			$('#iframeURLBox').hide();
			$('#videoURL').show();
			$('#videoUpload').hide();
			$('#liveURLBox').show();
			$('#awsUpload').hide();
		});


		//aws checkbox
		$('#ch13').click(function () {
			$('#awsUpload').show();
			$('#iframeURLBox').hide();
			$('#videoURL').hide();
			$('#videoUpload').hide();
			$('#liveURLBox').hide();
		});

	})(jQuery);
</script>
@endif

@if($cate->type =="audio")
<script>
	(function ($) {
		"use strict";

		$('#ch11').click(function () {
			$('#audioURL').show();
			$('#audioUpload').hide();
		});

		$('#ch12').click(function () {
			$('#audioURL').hide();
			$('#audioUpload').show();

		});

	})(jQuery);
</script>
@endif

@if($cate->type =="image")
<script>
	(function ($) {
		"use strict";

		$('#ch3').click(function () {
			$('#imageURL').show();
			$('#imageUpload').hide();
		});

		$('#ch4').click(function () {
			$('#imageURL').hide();
			$('#imageUpload').show();

		});

	})(jQuery);
</script>
@endif

@if($cate->type =="zip")
<script>
	(function ($) {
		"use strict";

		$('#ch5').click(function () {
			$('#zipURL').show();
			$('#zipUpload').hide();
		});

		$('#ch6').click(function () {
			$('#zipURL').hide();
			$('#zipUpload').show();
		});

	})(jQuery);
</script>




@endif
@endsection


@section('stylesheets')

<style type="text/css">
	.modal {
		overflow-y: auto;
	}


	body {
		background-color: #efefef;
	}

	.container-4 input#hyv-search {
		width: 500px;
		height: 30px;
		border: 1px solid #c6c6c6;
		font-size: 10pt;
		float: left;
		padding-left: 15px;
		-webkit-border-top-left-radius: 5px;
		-webkit-border-bottom-left-radius: 5px;
		-moz-border-top-left-radius: 5px;
		-moz-border-bottom-left-radius: 5px;
		border-top-left-radius: 5px;
		border-bottom-left-radius: 5px;
	}

	.container-4 input#vimeo-search {
		width: 500px;
		height: 30px;
		border: 1px solid #c6c6c6;
		font-size: 10pt;
		float: left;
		padding-left: 15px;
		-webkit-border-top-left-radius: 5px;
		-webkit-border-bottom-left-radius: 5px;
		-moz-border-top-left-radius: 5px;
		-moz-border-bottom-left-radius: 5px;
		border-top-left-radius: 5px;
		border-bottom-left-radius: 5px;
	}

	.container-4 button.icon {
		height: 34px;
		background: #F0F0EF url(../../images/icons/searchicon.png) 10px 1px no-repeat;
		background-size: 24px;
		-webkit-border-top-right-radius: 5px;
		-webkit-border-bottom-right-radius: 5px;
		-moz-border-radius-topright: 5px;
		-moz-border-radius-bottomright: 5px;
		border-top-right-radius: 5px;
		border-bottom-right-radius: 5px;
		border: 1px solid #c6c6c6;
		width: 50px;
		margin-left: -44px;
		color: #4f5b66;
		font-size: 10pt;
	}

	button#pageTokenNext {
		margin-left: 5px;
		border-radius: 3px;
		margin-bottom: 20px;
	}

	button#vpageTokenNext {
		margin-left: 5px;
		border-radius: 3px;
		margin-bottom: 20px;
	}
</style>



@endsection