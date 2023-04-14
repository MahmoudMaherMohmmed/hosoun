@extends('admin/layouts.master')
@section('title', __('adminstaticword.Add') . ' ' . __('adminstaticword.SocialLink') . ' - ' . __('adminstaticword.Admin'))
@section('body')

@section("title","Social Link")

<section class="content">
    @include('admin.message')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('adminstaticword.Add') }} {{ __('adminstaticword.SocialLink') }}</h3>
                    <a href="{{url('facts')}}" class="btn btn-success pull-right owtbtn">
                        {{ __('adminstaticword.Back') }}
                    </a>
                </div>
                <div class="box-body">
                    <form method="post" action="{{action('SocialLinkController@store')}}" vdata-parsley-validate enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                    <label for="title">{{ __('adminstaticword.Heading') }}:<sup class="redstar">*</sup></label>
                                    <input id="title" class="form-control" type="text" name="title" placeholder="">
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                    <label for="icon">{{ __('adminstaticword.Icon') }}:<sup class="redstar">*</sup></label>
                                    <input id="icon" class="form-control icp-auto icp" type="text" name="icon" placeholder="{{ __('adminstaticword.ChooseIcon') }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                    <label for="link">{{ __('adminstaticword.URL') }}:<sup class="redstar">*</sup></label>
                                    <input id="link" class="form-control" type="url" name="link" placeholder="">
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                    <label>{{ __('adminstaticword.Status') }}:</label>
                                    <div class="toggler">
                                        <input hidden id="status" type="checkbox" name="status" {{ isset($social_link)&&$social_link->status == '1' ? 'checked' : '' }}>
                                        <label class="main-toggle toggle-lg {{ isset($social_link)&&$social_link->status == '1' ? 1 : 0 }}" for="status">
                                            <span data-on="{{ __('adminstaticword.Enable') }}" data-off="{{ __('adminstaticword.Disable') }}"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="box-footer">
                            <div class="row">
                                <div class="col-xs-9"></div>
                                <button type="submit" value="Add Slider" class="btn btn-md col-xs-3 btn-primary">+
                                    {{ __('adminstaticword.Save') }}</button>
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