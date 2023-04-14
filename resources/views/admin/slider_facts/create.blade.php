@extends('admin/layouts.master')
@section('title', __('adminstaticword.Add') . ' ' . __('adminstaticword.FactsSlider') . ' - ' . __('adminstaticword.Admin'))
@section('body')

@section("title","Add Sub Category")

<section class="content">
    @include('admin.message')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('adminstaticword.Add') }} {{ __('adminstaticword.FactsSlider') }}</h3>
                    <a href="{{url('facts')}}" class="btn btn-success pull-right owtbtn">
                        {{ __('adminstaticword.Back') }}
                    </a>
                </div>
                <div class="box-body">
                    <form id="demo-form2" method="post" action="{{action('SliderfactsController@store')}}"
                        vdata-parsley-validate enctype="multipart/form-data">
                        {{ csrf_field() }}


                        <div class="row">
                            <div class="col-xs-12 col-md-4">
                                <div class="form-group">
                                    <label for="icon">{{ __('adminstaticword.Icon') }}:<sup
                                            class="redstar">*</sup></label>
                                    <input id="icon" class="form-control icp-auto icp" type="text" name="icon"
                                        placeholder="{{ __('adminstaticword.ChooseIcon') }}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-4">
                                <div class="form-group">
                                    <label for="heading">{{ __('adminstaticword.Heading') }}:<sup
                                            class="redstar">*</sup></label>
                                    <input id="heading" class="form-control" type="text" name="heading" placeholder="">
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-4">
                                <div class="form-group">
                                    <label for="sub_heading">{{ __('adminstaticword.SubHeading') }}:<sup
                                            class="redstar">*</sup></label>
                                    <input type="text" class="form-control" name="sub_heading" id="sub_heading"
                                        placeholder="">
                                </div>
                            </div>
                        </div>
                        <br>

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