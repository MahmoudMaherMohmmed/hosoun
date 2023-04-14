@extends('admin/layouts.master')
@section('title', __('adminstaticword.Add') . ' ' . __('adminstaticword.Advertisement') . ' - ' . __('adminstaticword.Admin'))
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
    @include('admin.message')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"> {{ __('adminstaticword.Add') }} {{ __('adminstaticword.Advertisement') }}
                    </h3>
                    <a href="{{url('advertisement')}}" class="btn btn-success pull-right owtbtn">
                        {{ __('adminstaticword.Back') }}
                    </a>
                </div>
                <div class="box-body">
                    <form id="demo-form2" method="post" action="{{url('advertisement/')}}" data-parsley-validate enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                    <label for="image1">{{ __('adminstaticword.Image') }}:<sup class="redstar">*</sup></label>
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
                                    <small class="text-muted"><i class="fa fa-question-circle"></i> {{ __('adminstaticword.RecommnadedSize') }} (1375 x 409px)</small>
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                    <label for="url1">{{ __('adminstaticword.EnterURL') }}:<sup class="redstar">*</sup></label>
                                    <input type="title" class="form-control" name="url1" id="url1" placeholder="{{ __('adminstaticword.EnterURL') }}">
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
                                        <option value="belowslider">Below Slider</option>
                                        <option value="belowrecent">Below Recent Courses</option>
                                        <option value="belowbundle">Below Bundle Courses</option>
                                        <option value="belowtestimonial">Below Testimonial</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                    <label>{{ __('adminstaticword.Status') }}:</label>
                                    <div class="toggler">
                                        <input hidden id="status" type="checkbox" name="status">
                                        <label class="main-toggle toggle-lg" for="status">
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
                                <button type="submit" value="Add Slider" class="btn btn-md col-xs-3 btn-primary">{{ __('adminstaticword.Save') }}</button>
                            </div>
                        </div>

                    </form>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.box -->
        </div>
        <!--/.col (right) -->
    </div>
    <!-- /.row -->
</section>
@endsection