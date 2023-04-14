@extends('admin/layouts.master')
@section('title', __('adminstaticword.Edit') . ' ' . __('adminstaticword.CourseLanguage') . ' - ' . __('adminstaticword.Admin'))
@section('body')

<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-xs-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('adminstaticword.Edit') }} {{ __('adminstaticword.CourseLanguage') }}</h3>
                    <a href="{{url('courselang')}}" class="btn btn-success pull-right owtbtn">
                        {{ __('adminstaticword.Back') }}
                    </a>
                </div>
                <!-- /.box-header -->
                <!-- form start -->

                <div class="box-body">
                        <form id="demo-form" method="post" action="{{url('courselang/'.$language->id)}}" data-parsley-validate>
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            <div class="row">
                                <div class="col-xs-12 col-md-9">
                                    <div class="form-group">
                                        <label for="name">{{ __('adminstaticword.Name') }}: <sup class="redstar">*</sup></label>
                                        <input type="text" class="form-control" name="name" value="{{ $language->name }}" id="name" placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.Language') }}">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-md-3">
                                    <div class="form-group">
                                        <label>{{ __('adminstaticword.Status') }}:</label>
                                        <div class="toggler">
                                            <input hidden id="xyz" type="checkbox" {{ $language->status==1 ? 'checked' : '' }}>
                                            <label class="main-toggle toggle-lg {{ $language->status==1 ? 'on' : '' }}" for="xyz">
                                                <span data-on="{{ __('adminstaticword.Enable') }}" data-off="{{ __('adminstaticword.Disable') }}"></span>
                                            </label>
                                        </div>
                                        <input type="hidden" name="status" value="{{ $language->status }}" id="xyzz">
                                    </div>
                                </div>
                            </div>

                            <div class="box-footer">
                                <div class="row">
                                    <div class="col-xs-9"></div>
                                    <button type="submit" class="btn btn-md col-xs-3 btn-primary">{{ __('adminstaticword.Submit') }}</button>
                                </div>
                            </div>
                    <!-- /.box-body -->

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