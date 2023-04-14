<section class="content">

    <div class="row">
        <div class="col-xs-12">
            <a data-toggle="modal" data-target="#myModalab" href="#" class="btn btn-info btn-sm">+
                {{ __('adminstaticword.Add') }}</a>
            <br>
            <br>
            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped db">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('adminstaticword.CourseChapter') }}</th>
                            <th>{{ __('adminstaticword.Title') }}</th>
                            <th>{{ __('adminstaticword.Status') }}</th>
                            <th>{{ __('adminstaticword.Featured') }}</th>
                            <th>{{ __('adminstaticword.Edit') }}</th>
                            <th>{{ __('adminstaticword.Delete') }}</th>
                        </tr>
                    </thead>
                    <tbody id="sortable">
                        <?php $i=0;?>
                        @foreach($courseclass as $cat)
                        <tr class="sortable row1" data-id="{{ $cat->id }}">
                            <?php $i++;?>
                            <td><?php echo $i;?></td>
                            @php
                            $chname = App\CourseChapter::where('id','=',$cat->coursechapter_id)->get();
                            @endphp
                            <td>
                                @foreach($chname as $cc)
                                {{ $cc->chapter_name }}
                                @endforeach
                            </td>
                            <td>{{$cat->title}}</td>
                            <!--<td>-->
                            <!--    @if($cat->status==1)-->
                            <!--    <span class="table-status status-approved">-->
                            <!--        {{ __('adminstaticword.Active') }}-->
                            <!--    </span>-->
                            <!--    @else-->
                            <!--    <span class="table-status status-rejected">-->
                            <!--        {{ __('adminstaticword.Deactive') }}-->
                            <!--    </span>-->
                            <!--    @endif-->
                            <!--</td>-->
                            <td>
                                <form action="{{ route('class.quick',$cat->id) }}" method="POST">
                                    {{ csrf_field() }}

                                    <button type="Submit"
                                        class="btn btn-xs table-status {{ $cat->status ==1 ? 'btn-success' : 'btn-danger' }}">
                                        @if($cat->status ==1)
                                        {{ __('adminstaticword.Active') }}
                                        @else
                                        {{ __('adminstaticword.Deactive') }}
                                        @endif
                                    </button>
                                </form>
                            </td>
                            <td>
                                @if($cat->featured==1)
                                <span class="table-status status-approved">
                                    {{ __('adminstaticword.Yes') }}
                                </span>
                                @else
                                <span class="table-status status-rejected">
                                    {{ __('adminstaticword.No') }}
                                </span>
                                @endif
                            </td>
                            <td>
                                <a class="table-edit" href="{{url('courseclass/'.$cat->id)}}"><i class='bx bx-edit'></i></a>
                            </td>
                            <td>
                                <form method="post" action="{{url('courseclass/'.$cat->id)}}" data-parsley-validate
                                    class="form-horizontal form-label-left">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" class="btn-null table-delete"><i class='bx bx-trash'></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!--Model start-->
    <div class="modal fade" id="myModalab" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">{{ __('adminstaticword.Add') }}
                        {{ __('adminstaticword.CourseClass') }}</h4>
                </div>
                <div class="box box-primary">
                    <div class="panel panel-sum">
                        <div class="modal-body">
                            <form enctype="multipart/form-data" id="demo-form2" method="post"
                                action="{{ route('courseclass.store') }}" data-parsley-validate>
                                {{ csrf_field() }}


                                <select class="display-none" name="course_id" class="form-control">
                                    <option value="{{ $cor->id }}">{{ $cor->title }}</option>
                                </select>

                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label for="course_chapters">{{ __('adminstaticword.ChapterName') }}:<sup
                                                    class="redstar">*</sup></label>
                                            <select id="course_chapters" name="course_chapters"
                                                class="form-control js-example-basic-single" required>
                                                @foreach($coursechapters as $c)
                                                <option value="{{ $c->id }}">{{ $c->chapter_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label for="title">{{ __('adminstaticword.Title') }}:<sup
                                                    class="redstar">*</sup></label>
                                            <input type="text" class="form-control " name="title" id="title" value="" required>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label for="detail2">{{ __('adminstaticword.Detail') }}:</label>
                                            <textarea id="detail2" name="detail" rows="3" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        {{-- Choose file type --}}
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="type">{{ __('adminstaticword.Type') }}:<sup
                                                        class="redstar">*</sup></label>
                                                <select name="type" id="filetype" class="form-control js-example-basic-single"
                                                    required>
                                                    <option>{{ __('adminstaticword.ChooseFileType') }}</option>
                                                    <option value="video">{{ __('adminstaticword.Video') }}</option>
                                                    <option value="audio">{{ __('adminstaticword.Audio') }}</option>
                                                    <option value="image">{{ __('adminstaticword.Image') }}</option>
                                                    <option value="zip">{{ __('adminstaticword.Zip') }}</option>
                                                    <option value="pdf">{{ __('adminstaticword.Pdf') }}</option>
                                                </select>
                                            </div>
                                            <!--for audio -->
                                            <div class="from-group">
                                                <div class="display-none" id="audioChoose">
                                                    <div class="from-group">
                                                        <input type="radio" name="checkAudio" id="ch11" value="audiourl">
                                                        {{ __('adminstaticword.URL') }}
                                                        <input type="radio" name="checkAudio" id="ch12" value="uploadaudio">
                                                        {{ __('adminstaticword.UploadAudio') }}
                                                    </div>
                                                </div>
                                                <div class="display-none" id="audioURL">
                                                    <div class="form-group">
                                                        <label for="audiourl">{{ __('adminstaticword.URL') }}: </label>
                                                        <input id="audiourl" type="text" name="audiourl" class="form-control">
                                                    </div>
                                                </div>
            
                                                <div class="display-none" id="audioUpload">
                                                    <div class="form-group">
                                                        <label for="audioupload">{{ __('adminstaticword.UploadAudio') }}: </label>
                                                        <div>
                                                            <input type="file" name="audioupload" id="audioupload" class="inputfile inputfile-1" />
                                                            <label for="audioupload"><svg xmlns="http://www.w3.org/2000/svg" width="50"
                                                                    height="30" viewBox="0 0 20 17">
                                                                    <path
                                                                        d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
                                                                    </svg> <span>{{ __('adminstaticword.Chooseafile') }}</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--for image -->
                                            <div class="form-group">
                                                <div class="display-none" id="imageChoose">
                                                    <div class="form-group">
                                                        <input type="radio" name="checkImage" id="ch3" value="url">
                                                        {{ __('adminstaticword.URL') }}
                                                        <input type="radio" name="checkImage" id="ch4" value="uploadimage">
                                                        {{ __('adminstaticword.UploadImage') }}
                                                    </div>
                                                </div>
            
                                                <div class="display-none" id="imageURL">
                                                    <div class="form-group">
                                                        <label for="imgurl">{{ __('adminstaticword.URL') }}: </label>
                                                        <input id="imgurl" type="text" name="imgurl" class="form-control">
                                                    </div>
                                                </div>
            
                                                <div class="display-none" id="imageUpload">
                                                    <div class="form-group">
                                                        <label for="">{{ __('adminstaticword.UploadImage') }}: </label>
                                                        <div>
                                                            <input type="file" name="image" id="image" class="inputfile inputfile-1" />
                                                            <label for="image"><svg xmlns="http://www.w3.org/2000/svg" width="50"
                                                                    height="30" viewBox="0 0 20 17">
                                                                    <path
                                                                        d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
                                                                    </svg> <span>{{ __('adminstaticword.Chooseafile') }}</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--video-->
                                            <div class="form-group">
                                                <div class="display-none" id="videotype">
                                                    <input type="radio" name="checkVideo" id="ch1"
                                                        value="url">&nbsp;{{ __('adminstaticword.URL') }}
                                                    &emsp;
                                                    <input type="radio" name="checkVideo" id="ch2"
                                                        value="uploadvideo">&nbsp;{{ __('adminstaticword.UploadVideo') }}
                                                    &emsp;
                                                    <input type="radio" name="checkVideo" id="ch9"
                                                        value="iframeurl">&nbsp;{{ __('adminstaticword.IframeURL') }}
                                                    &emsp;
                                                    <input type="radio" name="checkVideo" id="ch10"
                                                        value="liveurl">&nbsp;{{ __('adminstaticword.LiveClass') }}
                                                    &emsp;
            
                                                    @if($gsetting->aws_enable == 1)
                                                    <input type="radio" name="checkVideo" id="ch13"
                                                        value="aws_upload">&nbsp;{{ __('adminstaticword.AWSUpload') }}
                                                    @endif
            
                                                    @if($gsetting->youtube_enable == 1)
                                                    <input type="radio" name="checkVideo" id="youtubeurl"
                                                        value="youtube">&nbsp;{{ __('Youtube API') }}
                                                    &emsp;
                                                    @endif
            
                                                    @if($gsetting->vimeo_enable == 1)
                                                    <input type="radio" name="checkVideo" id="vimeourl"
                                                        value="vimeo">&nbsp;{{ __('Vimeo API') }}
                                                    &emsp;
                                                    @endif
            
                                                    <br>
                                                </div>
    
                                                <div class="display-none" id="videoURL">
                                                    <div class="form-group">
                                                        <label for="">{{ __('adminstaticword.URL') }}: </label>
                                                        <input type="text" id="apiUrl" name="vidurl" placeholder="Enter Your URL"
                                                            class="form-control">
                                                    </div>
                                                </div>
            
                                                <div class="display-none" id="videoUpload">
                                                    <div class="form-group">
                                                        <label for="">{{ __('adminstaticword.UploadVideo') }}: </label>
                                                        <div>
                                                            <input type="file" name="video_upld" id="video_upld" class="inputfile inputfile-1" />
                                                            <label for="video_upld"><svg xmlns="http://www.w3.org/2000/svg" width="50"
                                                                    height="30" viewBox="0 0 20 17">
                                                                    <path
                                                                        d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
                                                                    </svg> <span>{{ __('adminstaticword.Chooseafile') }}</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
    
                                                <!-- preview video -->
                                                <div class="row">
                                                    <div class="col-xs-12 display-none" id="previewUrl">
                                                        <div class="form-group">
                                                            <label>{{ __('adminstaticword.PreviewVideo') }}:</label>
                                                            <div class="toggler">
                                                                <input name="preview_type" hidden id="previewvid"
                                                                    type="checkbox" />
                                                                <label class="main-toggle toggle-lg" for="previewvid">
                                                                    <span data-off="{{ __('adminstaticword.URL') }}" data-on="{{ __('adminstaticword.UploadVideo') }}"></span>
                                                                </label>
                                                            </div>
                                                            <input type="hidden" name="free" value="0" id="cxv">
                                                        </div>
    
                                                        <div class="display-none" id="document11">
                                                            <div class="form-group">
                                                                <label for="exampleInputSlug">Preview
                                                                    {{ __('adminstaticword.UploadVideo') }}:</label>
                                                                <div>
                                                                    <input type="file" name="video" id="video" class="inputfile inputfile-1" />
                                                                    <label for="video"><svg xmlns="http://www.w3.org/2000/svg" width="50"
                                                                            height="30" viewBox="0 0 20 17">
                                                                            <path
                                                                                d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
                                                                            </svg> <span>{{ __('adminstaticword.Chooseafile') }}</span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="document22">
                                                            <div class="form-group">
                                                                <label for="url">{{ __('adminstaticword.Preview') }} {{ __('adminstaticword.URL') }}: </label>
                                                                <input type="text" name="url" id="url" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end preview video -->
    
                                                <div class="display-none" id="duration_video">
                                                    <div class="form-group">
                                                        <label for="duration"> {{ __('adminstaticword.Duration') }}:</label>
                                                        <input id="duration" type="text" name="duration"
                                                            placeholder="Enter class duration in (mins) Eg:160" class="form-control">
                                                    </div>
                                                </div>
            
                                                <div class="display-none" id="size">
                                                    <div class="form-group">
                                                        <label for="size">{{ __('adminstaticword.Size') }}:</label>
                                                        <input id="size" type="text" name="size" class="form-control">
                                                    </div>
                                                </div>
    
                                                <div id="subtitle" class="display-none">
                                                    <div class="form-group">
                                                        <label>{{ __('adminstaticword.Subtitle') }}:</label>
                                                        <table class="table table-bordered" id="dynamic_field">
                                                            <tr>
                                                                <td>
                                                                    <div
                                                                        class="{{ $errors->has('sub_t') ? ' has-error' : '' }} input-file-block">
                                                                        <div>
                                                                            <input type="file" name="sub_t[]" id="sub_t" class="inputfile inputfile-1" />
                                                                            <label for="sub_t"><svg xmlns="http://www.w3.org/2000/svg" width="50"
                                                                                    height="30" viewBox="0 0 20 17">
                                                                                    <path
                                                                                        d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
                                                                                    </svg> <span>{{ __('adminstaticword.Chooseafile') }}</span>
                                                                            </label>
                                                                        </div>
                                                                        <p class="info">Choose subtitle file ex. subtitle.srt, or. txt</p>
                                                                        <small class="text-danger">{{ $errors->first('sub_t') }}</small>
                                                                    </div>
                                                                </td>
                    
                                                                <td>
                                                                    <input type="text" name="sub_lang[]" placeholder="Subtitle Language"
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
                                            
                                            <div class="display-none" id="iframeURLBox">
                                                <div class="form-group">
                                                    <label for="iframe_url">{{ __('adminstaticword.IframeURL') }}: </label>
                                                    <input id="iframe_url" type="text" name="iframe_url" class="form-control">
                                                </div>
                                            </div>
        
        
                                            <div class="display-none" id="liveclassBox">
                                                <div class="form-group">
                                                    <label for="date_time">Select a Date & Time:</label>
                                                    <input type="datetime-local" id="date_time" name="date_time"
                                                        class="form-control">
                                                </div>
                                            </div>
        
                                            <!-- aws insert -->
                                            @if($gsetting->aws_enable == 1)
                                            <div class="display-none" id="awsBox">
                                                <div class="form-group">
                                                    <label for="aws_upload">{{ __('adminstaticword.AWSUpload') }}</label>
                                                    <div>
                                                        <input type="file" name="aws_upload" id="aws_upload" class="inputfile inputfile-1" />
                                                        <label for="aws_upload"><svg xmlns="http://www.w3.org/2000/svg" width="50"
                                                                height="30" viewBox="0 0 20 17">
                                                                <path
                                                                    d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
                                                                </svg> <span>{{ __('adminstaticword.Chooseafile') }}</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
        
        
                                            <!-- zip -->
                                            <div class="form-group">
                                                <div class="display-none" id="zipChoose">
                                                    <div class="form-group">
                                                        <input type="radio" value="zipURLEnable" name="checkZip" id="ch5">
                                                        {{ __('adminstaticword.URL') }}
                                                        <input type="radio" value="zipEnable" name="checkZip" id="ch6">
                                                        {{ __('adminstaticword.UploadZip') }}
                                                    </div>
                                                </div>
            
                                                <div class="display-none" id="zipURL">
                                                    <div class="form-group">
                                                        <label for="">{{ __('adminstaticword.URL') }}: </label>
                                                        <input type="text" name="zipurl" placeholder="Enter Your URL"
                                                            class="form-control">
                                                    </div>
                                                </div>
            
                                                <div class="display-none" id="zipUpload">
                                                    <div class="form-group">
                                                        <label for="uplzip">{{ __('adminstaticword.UploadZip') }}: </label>
                                                        <div>
                                                            <input type="file" name="uplzip" id="uplzip" class="inputfile inputfile-1" />
                                                            <label for="uplzip"><svg xmlns="http://www.w3.org/2000/svg" width="50"
                                                                    height="30" viewBox="0 0 20 17">
                                                                    <path
                                                                        d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
                                                                    </svg> <span>{{ __('adminstaticword.Chooseafile') }}</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
        
        
                                            <!-- pdf -->
                                            <div class="form-group">
                                                <div class="display-none" id="pdfChoose">
                                                    <div class="form-group">
                                                        <input type="radio" value="pdfURLEnable" name="checkPdf" id="ch7">
                                                        {{ __('adminstaticword.URL') }}
                                                        <input type="radio" value="pdfEnable" name="checkPdf" id="ch8">
                                                        {{ __('adminstaticword.UploadPdf') }}
                                                    </div>
                                                </div>
            
                                                <div class="display-none" id="pdfURL">
                                                    <div class="form-group">
                                                        <label for="pdfurl"> {{ __('adminstaticword.URL') }}: </label>
                                                        <input id="pdfurl" type="text" name="pdfurl" class="form-control">
                                                    </div>
                                                </div>
            
                                                <div class="display-none" id="pdfUpload">
                                                    <div class="form-group">
                                                        <label for="pdf"> {{ __('adminstaticword.UploadPdf') }}: </label>
                                                        <div>
                                                            <input type="file" name="pdf" id="pdf" class="inputfile inputfile-1" />
                                                            <label for="pdf"><svg xmlns="http://www.w3.org/2000/svg" width="50"
                                                                    height="30" viewBox="0 0 20 17">
                                                                    <path
                                                                        d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
                                                                    </svg> <span>{{ __('adminstaticword.Chooseafile') }}</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                                <div class="row">
                                    
                                    <div class="col-xs-12 col-md-4">
                                        {{-- Upload Learning Materials --}}
                                        <div class="form-group">
                                            <label for="file3">{{ __('adminstaticword.LearningMaterial') }}</label>
                                            - <p class="inline info">eg: zip or pdf files</p>
                                            <div>
                                                <input type="file" name="file" id="file3"
                                                    class="{{ $errors->has('file') ? ' is-invalid' : '' }} inputfile inputfile-1" />
                                                <label for="file3"><svg xmlns="http://www.w3.org/2000/svg" width="50"
                                                        height="30" viewBox="0 0 20 17">
                                                        <path
                                                            d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
                                                        </svg> <span>{{ __('adminstaticword.Chooseafile') }}</span>
                                                </label>
                                                <span class="text-danger invalid-feedback" role="alert"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-md-4">
                                        <div class="form-group">
                                            <label>{{ __('adminstaticword.Status') }}:</label>
                                            <div class="toggler">
                                                <input name="status" hidden id="sec_one1" type="checkbox" />
                                                <label class="main-toggle" for="sec_one1">
                                                    <span data-off="{{__('adminstaticword.OFF')}}" data-on="{{__('adminstaticword.ON')}}"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-md-4">
                                        <div class="form-group">
                                            <label>{{ __('adminstaticword.Featured') }}:</label>
                                            <div class="toggler">
                                                <input name="featured" hidden id="sec_one2" type="checkbox" />
                                                <label class="main-toggle" for="sec_one2">
                                                    <span data-off="{{__('adminstaticword.OFF')}}" data-on="{{__('adminstaticword.ON')}}"></span>
                                                </label>
                                            </div>
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
    <!--Model close -->



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
                            Settings</a></p>
                    @endif

                    <div id="hyv-page-container" style="clear:both;">
                        <div class="hyv-content-alignment">
                            <div id="hyv-page-content" class="" style="overflow:hidden;">
                                <div class="container-4">
                                    <form action="" method="post" name="hyv-yt-search" id="hyv-yt-search">
                                        <input type="search" name="hyv-search" id="hyv-search" placeholder="Search..."
                                            class="ui-autocomplete-input" autocomplete="off">
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
                                <div id="hyv-watch-content" class="hyv-watch-main-col hyv-card hyv-card-has-padding">
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
                                            placeholder="Search..." class="ui-autocomplete-input" autocomplete="off">
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




</section>



@section('script')
<!--courseclass.js is included -->




<script type="text/javascript">
    $('#previewvid').on('change', function () {

        if ($('#previewvid').is(':checked')) {
            $('#document11').show('fast');
            $('#document22').hide('fast');
        } else {
            $('#document22').show('fast');
            $('#document11').hide('fast');
        }

    });
</script>

<script>
    $("#sortable").sortable({
        items: "tr",
        cursor: 'move',
        opacity: 0.6,
        update: function () {
            sendOrderToServer();
        }
    });

    function sendOrderToServer() {

        var order = [];
        var token = $('meta[name="csrf-token"]').attr('content');
        $('tr.row1').each(function (index, element) {
            order.push({
                id: $(this).attr('data-id'),
                position: index + 1
            });
        });

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "{{ route('class-sort') }}",
            data: {
                order: order,
                _token: "{{ csrf_token() }}",
            },
            success: function (response) {
                if (response.status == "success") {
                    console.log(response);
                } else {
                    console.log(response);
                }
            }
        });
    }
</script>

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