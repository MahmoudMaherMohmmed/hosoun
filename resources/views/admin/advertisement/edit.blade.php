@extends('admin/layouts.master')
@section('title', __('adminstaticword.Edit') . ' ' . __('adminstaticword.Advertisement') . ' - ' . __('adminstaticword.Admin'))
@section('body')

<section class="content">
    @include('admin.message')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"> {{ __('adminstaticword.Edit') }} {{ __('adminstaticword.Advertisement') }}
                    </h3>
                    <a href="{{url('advertisement')}}" class="btn btn-success pull-right owtbtn">
                        {{ __('adminstaticword.Back') }}
                    </a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form id="demo-form" method="post" action="{{url('advertisement/'.$advs->id)}}"
                        data-parsley-validate enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}


                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                    <label for="image1">{{ __('adminstaticword.Image') }}:<sup
                                            class="redstar">*</sup></label>
                                    <div>
                                        <input type="file" name="image1" id="image" class="inputfile inputfile-1" />
                                        <label for="image">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17"
                                                viewBox="0 0 20 17">
                                                <path
                                                    d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
                                            </svg>
                                            <span>{{ __('adminstaticword.Chooseafile') }}&hellip;</span>
                                        </label>
                                    </div>
                                    <small class="text-muted"><i class="fa fa-question-circle"></i>
                                        {{ __('adminstaticword.RecommnadedSize') }} (1375 x 409px)</small>
                                    <div>
                                        <img src="{{ url('/images/advertisement/'.$advs->image1) }}" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                    <label for="url1">{{ __('adminstaticword.EnterURL') }}:<sup class="redstar">*</sup></label>
                                    <input type="title" class="form-control" name="url1" id="url1" value="{{ $advs->url1 }}" placeholder="{{ __('adminstaticword.EnterURL') }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                    <label for="position">{{ __('adminstaticword.Position') }}:<sup class="redstar">*</sup></label>
                                    <select id="position" class="form-control js-example-basic-single" name="position">
                                        <option value="none" selected disabled hidden>
                                            {{ __('adminstaticword.SelectanOption') }}
                                        </option>
                                        <option {{ $advs->position == 'belowslider' ? 'selected' : ''}} value="belowslider">
                                            Below Slider</option>
                                        <option {{ $advs->position == 'belowrecent' ? 'selected' : ''}} value="belowrecent">
                                            Below Recent Courses</option>
                                        <option {{ $advs->position == 'belowbundle' ? 'selected' : ''}} value="belowbundle">
                                            Below Bundle Courses</option>
                                        <option {{ $advs->position == 'belowtestimonial' ? 'selected' : ''}}
                                            value="belowtestimonial">Below Testimonial</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                    <label>{{ __('adminstaticword.Status') }}:</label>
                                    <div class="toggler">
                                        <input hidden id="status" type="checkbox" name="status" {{ $advs->status == '1' ? 'checked' : '' }}>
                                        <label class="main-toggle toggle-lg {{ $advs->status == '1' ? 'on' : '' }}" for="status">
                                            <span data-on="{{ __('adminstaticword.Enable') }}" data-off="{{ __('adminstaticword.Disable') }}"></span>
                                        </label>
                                    </div>
                                    <input type="hidden" name="free" value="0" for="status" id="status">
                                </div>
                            </div>
                        </div>




                        <div class="box-footer">
                            <div class="row">
                                <div class="col-xs-9"></div>
                                <button type="submit" class="btn btn-md col-xs-3 btn-primary">+ {{ __('adminstaticword.Save') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!--/.col -->
    </div>
</section>

@endsection