@extends('admin.layouts.master')
@section('title', __('adminstaticword.Quiz') . ' ' . __('adminstaticword.Question'))
@section('body')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('adminstaticword.Quiz') }} {{ __('adminstaticword.Question') }}</h3>
                    <a href="{{ url()->previous() }}" class="btn btn-success pull-right owtbtn">
                        {{ __('adminstaticword.Back') }}
                    </a>
                </div>
                <div class="box-header">

                    @if($topic->type == NULL)
                    <a title="Import products" href="{{ route('import.quiz') }}"
                        class="btn bg-primary btn-sm">{{ __('adminstaticword.Import') }}
                        {{ __('adminstaticword.QuizQuestions') }}</a>

                    <a data-toggle="modal" data-target="#myModalquiz" href="#" class="btn btn-info btn-sm">+
                        {{ __('adminstaticword.Add') }} {{ __('adminstaticword.Question') }}</a>
                    @endif

                    @if($topic->type == '1')
                    <a data-toggle="modal" data-target="#myModalquizsubject" href="#" class="btn btn-info btn-sm">+
                        {{ __('adminstaticword.Add') }} {{ __('Subjective Questions') }}</a>
                    @endif

                </div>


                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('adminstaticword.Course') }}</th>
                                    <th>{{ __('adminstaticword.Topic') }}</th>
                                    <th>{{ __('adminstaticword.Question') }}</th>
                                    @if($topic->type == NULL)
                                    <th>{{ __('adminstaticword.A') }}</th>
                                    <th>{{ __('adminstaticword.B') }}</th>
                                    <th>{{ __('adminstaticword.C') }}</th>
                                    <th>{{ __('adminstaticword.D') }}</th>
                                    <th>{{ __('adminstaticword.Answer') }}</th>
                                    @endif
                                    <th>{{ __('adminstaticword.Edit') }}</th>
                                    <th>{{ __('adminstaticword.Delete') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=0;?>
                                @foreach($quizes as $quiz)
                                <?php $i++;?>
                                <tr>
                                    <td><?php echo $i;?></td>
                                    <td>{{$quiz->courses->title}}</td>
                                    <td>{{$quiz->topic->title}}</td>
                                    <td>{{$quiz->question}}</td>
                                    @if($topic->type == NULL)
                                    <td>{{$quiz->a}}</td>
                                    <td>{{$quiz->b}}</td>
                                    <td>{{$quiz->c}}</td>
                                    <td>{{$quiz->c}}</td>
                                    <td>{{$quiz->answer}}</td>
                                    @endif
                                    <td>

                                        @if($topic->type == NULL)
                                        <a data-toggle="modal" data-target="#myModaledit{{$quiz->id}}" href="#"
                                            class="table-edit"><i class='bx bx-edit'></i></a>

                                        @endif

                                        @if($topic->type == '1')
                                        <a data-toggle="modal" data-target="#myModaleditsub{{$quiz->id}}" href="#"
                                            class="table-edit"><i class='bx bx-edit'></i></a>
                                        @endif
                                    </td>
                                    <td>
                                        <form method="post" action="{{url('admin/questions/'.$quiz->id)}}"
                                            data-parsley-validate class="form-horizontal form-label-left">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button type="submit" class="btn-null table-delete"><i
                                                    class='bx bx-trash'></i></button>
                                        </form>
                                    </td>
                                </tr>

                                <!--Model for edit question-->
                                <div class="modal fade" id="myModaledit{{$quiz->id}}" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">
                                                    {{ __('adminstaticword.Edit') }}
                                                    {{ __('adminstaticword.Question') }}</h4>
                                            </div>
                                            <div class="box box-primary">
                                                <div class="panel panel-sum">
                                                    <div class="modal-body">
                                                        <form id="demo-form2" method="POST"
                                                            action="{{route('questions.update', $quiz->id)}}"
                                                            data-parsley-validate enctype="multipart/form-data">
                                                            {{ csrf_field() }}
                                                            {{ method_field('PUT') }}

                                                            <input type="hidden" name="course_id"
                                                                value="{{ $topic->course_id }}" />

                                                            <input type="hidden" name="topic_id"
                                                                value="{{ $topic->id }}" />

                                                            <div class="row">
                                                                <div class="col-xs-12 col-md-6">
                                                                    <div class="form-group">
                                                                        <label
                                                                            for="question">{{ __('adminstaticword.Question') }}</label>
                                                                        <textarea name="question" rows="6"
                                                                            class="form-control"
                                                                            placeholder="Enter Your Question">{{ $quiz->question }}</textarea>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label
                                                                            for="answer">{{ __('adminstaticword.Answer') }}:<sup
                                                                                class="redstar">*</sup></label>
                                                                        <select id="answer" name="answer"
                                                                            class="form-control js-example-basic-single">
                                                                            <option
                                                                                {{ $quiz->answer == 'A' ? 'selected' : ''}}
                                                                                value="A">{{ __('adminstaticword.A') }}
                                                                            </option>
                                                                            <option
                                                                                {{ $quiz->answer == 'B' ? 'selected' : ''}}
                                                                                value="B">{{ __('adminstaticword.B') }}
                                                                            </option>
                                                                            <option
                                                                                {{ $quiz->answer == 'C' ? 'selected' : ''}}
                                                                                value="C">{{ __('adminstaticword.C') }}
                                                                            </option>
                                                                            <option
                                                                                {{ $quiz->answer == 'D' ? 'selected' : ''}}
                                                                                value="D">{{ __('adminstaticword.D') }}
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>


                                                                <div class="col-xs-12 col-md-6">
                                                                    <div class="form-group">
                                                                        <label
                                                                            for="a">{{ __('adminstaticword.AOption') }}
                                                                            :<sup class="redstar">*</sup></label>
                                                                        <input id="a" type="text" name="a"
                                                                            value="{{ $quiz->a }}" class="form-control"
                                                                            placeholder="Enter Option A">
                                                                    </div>
                                                                </div>

                                                                <div class="col-xs-12 col-md-6">
                                                                    <div class="form-group">
                                                                        <label
                                                                            for="b">{{ __('adminstaticword.BOption') }}
                                                                            :<sup class="redstar">*</sup></label>
                                                                        <input id='b' type="text" name="b"
                                                                            value="{{ $quiz->b }}" class="form-control"
                                                                            placeholder="Enter Option B" />
                                                                    </div>
                                                                </div>

                                                                <div class="col-xs-12 col-md-6">
                                                                    <div class="form-group">
                                                                        <label
                                                                            for="c">{{ __('adminstaticword.COption') }}
                                                                            :<sup class="redstar">*</sup></label>
                                                                        <input id="c" type="text" name="c"
                                                                            value="{{ $quiz->c }}" class="form-control"
                                                                            placeholder="Enter Option C" />
                                                                    </div>
                                                                </div>

                                                                <div class="col-xs-12 col-md-6">
                                                                    <div class="form-group">
                                                                        <label
                                                                            for="d">{{ __('adminstaticword.DOption') }}
                                                                            :<sup class="redstar">*</sup></label>
                                                                        <input id="d" type="text" name="d"
                                                                            value="{{ $quiz->d }}" class="form-control"
                                                                            placeholder="Enter Option D" />
                                                                    </div>
                                                                </div>

                                                            </div>


                                                            <div class="col-xs-12">
                                                                <div class="extras-block">
                                                                    <h4 class="extras-heading">Images And Video For
                                                                        Question</h4>
                                                                    <div class="row">
                                                                        <div class="col-xs-12 col-md-6">
                                                                            <div
                                                                                class="form-group{{ $errors->has('question_video_link') ? ' has-error' : '' }}">
                                                                                <label for="question_video_link">Add
                                                                                    Video To Question :<sup
                                                                                        class="redstar">*</sup></label>
                                                                                <input type="text"
                                                                                    id="question_video_link"
                                                                                    name="question_video_link"
                                                                                    value="{{ $quiz->question_video_link }}"
                                                                                    class="form-control"
                                                                                    placeholder="https://myvideolink.com/embed/.." />

                                                                                <small
                                                                                    class="text-danger">{{ $errors->first('question_video_link') }}</small>
                                                                                <p class="help">YouTube And Vimeo Video
                                                                                    Support (Only Embed Code Link)</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xs-12 col-md-6">
                                                                            <div
                                                                                class="form-group{{ $errors->has('question_img') ? ' has-error' : '' }}">
                                                                                <label for="question_img">Add
                                                                                    Image To Question :<sup
                                                                                        class="redstar">*</sup></label>
                                                                                <div>
                                                                                    <input type="file" id="question_img"
                                                                                        name="question_img"
                                                                                        class="inputfile inputfile-1" />
                                                                                    <label for="file3"><svg
                                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                                            width="50" height="30"
                                                                                            viewBox="0 0 20 17">
                                                                                            <path
                                                                                                d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
                                                                                        </svg>
                                                                                        <span>{{ __('adminstaticword.Chooseafile') }}</span>
                                                                                    </label>
                                                                                </div>
                                                                                <small
                                                                                    class="text-danger">{{ $errors->first('question_img') }}</small>
                                                                                <p class="help">Please Choose Only .JPG,
                                                                                    .JPEG and .PNG</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="box-footer">
                                                                <div class="row">
                                                                    <div class="col-xs-9"></div>
                                                                    <button type="submit"
                                                                        class="btn btn-md col-xs-3 btn-primary">{{ __('adminstaticword.Submit') }}</button>
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

                                <!--Model for edit question-->
                                <div class="modal fade" id="myModaleditsub{{$quiz->id}}" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">
                                                    {{ __('adminstaticword.Edit') }}
                                                    {{ __('adminstaticword.Question') }}</h4>
                                            </div>
                                            <div class="box box-primary">
                                                <div class="panel panel-sum">
                                                    <div class="modal-body">
                                                        <form id="demo-form2" method="POST"
                                                            action="{{route('questions.update', $quiz->id)}}"
                                                            data-parsley-validate enctype="multipart/form-data">
                                                            {{ csrf_field() }}
                                                            {{ method_field('PUT') }}

                                                            <input type="hidden" name="course_id"
                                                                value="{{ $topic->course_id }}" />

                                                            <input type="hidden" name="topic_id"
                                                                value="{{ $topic->id }}" />

                                                            <input type="hidden" name="type" value="1" />

                                                            <div class="row">
                                                                <div class="col-xs-12">
                                                                    <div class="form-group">
                                                                        <label
                                                                            for="question">{{ __('adminstaticword.Question') }}</label>
                                                                        <textarea id="question" name="question" rows="6"
                                                                            class="form-control"
                                                                            placeholder="Enter Your Question"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-xs-12">
                                                                <div class="extras-block">
                                                                    <h4 class="extras-heading">Images And Video For
                                                                        Question</h4>
                                                                    <div class="row">
                                                                        <div class="col-xs-12 col-md-6">
                                                                            <div
                                                                                class="form-group{{ $errors->has('question_video_link') ? ' has-error' : '' }}">
                                                                                <label for="question_video_link">Add
                                                                                    Video To Question :<sup
                                                                                        class="redstar">*</sup></label>
                                                                                <input type="text"
                                                                                    name="question_video_link"
                                                                                    name="question_video_link"
                                                                                    value="{{ $quiz->question_video_link }}"
                                                                                    class="form-control"
                                                                                    placeholder="https://myvideolink.com/embed/.." />
                                                                                <small
                                                                                    class="text-danger">{{ $errors->first('question_video_link') }}</small>
                                                                                <p class="help">YouTube And Vimeo Video
                                                                                    Support (Only Embed Code Link)</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xs-12 col-md-6">
                                                                            <div
                                                                                class="form-group{{ $errors->has('question_img') ? ' has-error' : '' }}">
                                                                                <label for="question_img">Add
                                                                                    Image To Question :<sup
                                                                                        class="redstar">*</sup></label>
                                                                                <div>
                                                                                    <input type="file" id="question_img"
                                                                                        name="question_img"
                                                                                        class="inputfile inputfile-1" />
                                                                                    <label for="file3"><svg
                                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                                            width="50" height="30"
                                                                                            viewBox="0 0 20 17">
                                                                                            <path
                                                                                                d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
                                                                                        </svg>
                                                                                        <span>{{ __('adminstaticword.Chooseafile') }}</span>
                                                                                    </label>
                                                                                </div>
                                                                                <small
                                                                                    class="text-danger">{{ $errors->first('question_img') }}</small>
                                                                                <p class="help">Please Choose Only .JPG,
                                                                                    .JPEG and .PNG</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="box-footer">
                                                                <div class="row">
                                                                    <div class="col-xs-9"></div>
                                                                    <button type="submit"
                                                                        class="btn btn-md col-xs-3 btn-primary">{{ __('adminstaticword.Submit') }}</button>
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


                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!--Model for add question -->
<div class="modal fade" id="myModalquiz" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"> {{ __('adminstaticword.Add') }}
                    {{ __('adminstaticword.Question') }}</h4>
            </div>
            <div class="box box-primary">
                <div class="panel panel-sum">
                    <div class="modal-body">
                        <form id="demo-form2" method="post" action="{{route('questions.store')}}" data-parsley-validate
                            enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <input type="hidden" name="course_id" value="{{ $topic->course_id }}" />

                            <input type="hidden" name="topic_id" value="{{ $topic->id }}" />



                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="question">{{ __('adminstaticword.Question') }}</label>
                                        <textarea id="question" name="question" rows="6" class="form-control"
                                            placeholder="Enter Your Question"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="answer">{{ __('adminstaticword.Answer') }}:<sup
                                                class="redstar">*</sup></label>
                                        <select id="answer" style="width: 100%" name="answer"
                                            class="form-control js-example-basic-single">
                                            <option value="none" selected disabled hidden>
                                                {{ __('adminstaticword.SelectanOption') }}
                                            </option>
                                            <option value="A">{{ __('adminstaticword.A') }}</option>
                                            <option value="B">{{ __('adminstaticword.B') }}</option>
                                            <option value="C">{{ __('adminstaticword.C') }}</option>
                                            <option value="D">{{ __('adminstaticword.D') }}</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="col-xs-12 col-md-6">
                                    <div class="form-group">
                                        <label for="a">{{ __('adminstaticword.AOption') }} :<sup
                                                class="redstar">*</sup></label>
                                        <input id="a" type="text" name="a" class="form-control"
                                            placeholder="Enter Option A">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-md-6">
                                    <div class="form-group">
                                        <label for="b">{{ __('adminstaticword.BOption') }} :<sup
                                                class="redstar">*</sup></label>
                                        <input id="b" type="text" name="b" class="form-control"
                                            placeholder="Enter Option B" />
                                    </div>
                                </div>

                                <div class="col-xs-12 col-md-6">
                                    <div class="form-group">
                                        <label for="c">{{ __('adminstaticword.COption') }} :<sup
                                                class="redstar">*</sup></label>
                                        <input id="c" type="text" name="c" class="form-control"
                                            placeholder="Enter Option C" />
                                    </div>
                                </div>

                                <div class="col-xs-12 col-md-6">
                                    <div class="form-group">
                                        <label for="d">{{ __('adminstaticword.DOption') }} :<sup
                                                class="redstar">*</sup></label>
                                        <input id="d" type="text" name="d" class="form-control"
                                            placeholder="Enter Option D" />
                                    </div>
                                </div>

                            </div>



                            <div class="col-xs-12">
                                <div class="extras-block">
                                    <h4 class="extras-heading">Video And Image For Question</h4>
                                    <div class="row">
                                        <div class="col-xs-12 col-md-6">
                                            <div
                                                class="form-group{{ $errors->has('question_video_link') ? ' has-error' : '' }}">
                                                <label for="question_video_link">Add Video To Question :<sup
                                                        class="redstar">*</sup></label>
                                                <input id="question_video_link" type="text" name="question_video_link"
                                                    class="form-control"
                                                    placeholder="https://myvideolink.com/embed/.." />
                                                <small
                                                    class="text-danger">{{ $errors->first('question_video_link') }}</small>
                                                <p class="help">YouTube And Vimeo Video Support (Only Embed Code Link)
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-6">
                                            <div
                                                class="form-group{{ $errors->has('question_img') ? ' has-error' : '' }}">
                                                <label for="question_img">Add Image To Question :<sup
                                                        class="redstar">*</sup></label>
                                                <div>
                                                    <input type="file" id="question_img" name="question_img"
                                                        class="inputfile inputfile-1" />
                                                    <label for="question_img"><svg xmlns="http://www.w3.org/2000/svg"
                                                            width="50" height="30" viewBox="0 0 20 17">
                                                            <path
                                                                d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
                                                        </svg> <span>{{ __('adminstaticword.Chooseafile') }}</span>
                                                    </label>
                                                </div>
                                                <small class="text-danger">{{ $errors->first('question_img') }}</small>
                                                <p class="help">Please Choose Only .JPG, .JPEG and .PNG</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>



                            <div class="box-footer">
                                <div class="row">
                                    <div class="col-xs-9"></div>
                                    <button type="submit"
                                        class="btn btn-md col-xs-3 btn-primary">{{ __('adminstaticword.Submit') }}</button>
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


<!--Model for add question -->
<div class="modal fade" id="myModalquizsubject" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"> {{ __('adminstaticword.Add') }}
                    {{ __('Subjective Questions') }}</h4>
            </div>
            <div class="box box-primary">
                <div class="panel panel-sum">
                    <div class="modal-body">
                        <form id="demo-form2" method="post" action="{{route('questions.store')}}" data-parsley-validate
                            enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <input type="hidden" name="course_id" value="{{ $topic->course_id }}" />

                            <input type="hidden" name="topic_id" value="{{ $topic->id }}" />


                            <input type="hidden" name="type" value="1" />

                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="question">{{ __('adminstaticword.Question') }}</label>
                                        <textarea id="question" name="question" rows="6" class="form-control"
                                            placeholder="Enter Your Question"></textarea>
                                    </div>
                                </div>

                                <div class="col-xs-12">
                                    <div class="extras-block">
                                        <h4 class="extras-heading">Video And Image For Question</h4>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-6">
                                                <div
                                                    class="form-group{{ $errors->has('question_video_link') ? ' has-error' : '' }}">
                                                    <label for="question_video_link">Add Video To Question :<sup
                                                            class="redstar">*</sup></label>
                                                    <input id="question_video_link" type="text"
                                                        name="question_video_link" class="form-control"
                                                        placeholder="https://myvideolink.com/embed/.." />
                                                    <small
                                                        class="text-danger">{{ $errors->first('question_video_link') }}</small>
                                                    <p class="help">YouTube And Vimeo Video Support (Only Embed Code
                                                        Link)
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-md-6">
                                                <div
                                                    class="form-group{{ $errors->has('question_img') ? ' has-error' : '' }}">
                                                    <label for="question_img">Add Image To Question :<sup
                                                            class="redstar">*</sup></label>
                                                    <div>
                                                        <input type="file" id="question_img" name="question_img"
                                                            class="inputfile inputfile-1" />
                                                        <label for="file3"><svg xmlns="http://www.w3.org/2000/svg"
                                                                width="50" height="30" viewBox="0 0 20 17">
                                                                <path
                                                                    d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
                                                            </svg> <span>{{ __('adminstaticword.Chooseafile') }}</span>
                                                        </label>
                                                    </div>
                                                    <small
                                                        class="text-danger">{{ $errors->first('question_img') }}</small>
                                                    <p class="help">Please Choose Only .JPG, .JPEG and .PNG</p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="box-footer">
                                <div class="row">
                                    <div class="col-xs-9"></div>
                                    <button type="submit"
                                        class="btn btn-md col-xs-3 btn-primary">{{ __('adminstaticword.Submit') }}</button>
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


</section>

@endsection