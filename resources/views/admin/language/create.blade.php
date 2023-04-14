@extends('admin/layouts.master')
@section('body')
@section("title", __('adminstaticword.Add') . ' ' . __('adminstaticword.Language') . ' - ' . __('adminstaticword.Admin'))


<section class="content">
    @include('admin.message')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">

                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('adminstaticword.Add') }} {{ __('adminstaticword.Language') }}</h3>
                    <a href="{{route('show.lang')}}" class="btn btn-success pull-right owtbtn">
                        {{ __('adminstaticword.Back') }}
                    </a>
                </div>
                <div class="panel-body">


                    <form id="demo-form2" method="post" action="{{action('LanguageController@store')}}"
                        data-parsley-validate class="form-label-left" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-xs-12 col-md-5">
                                <div class="form-group">
                                    <label for="local">{{ __('adminstaticword.Local') }}:<sup
                                            class="redstar">*</sup></label>
                                    <input id="local" class="form-control" type="text" name="local"
                                        placeholder="Please enter language local name" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-5">
                                <div class="form-group">
                                    <label for="name">{{ __('adminstaticword.Name') }}:<sup
                                            class="redstar">*</sup></label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="Please enter language name eg:English" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-2">
                                <div class="form-group">
                                    <label>{{ __('adminstaticword.SetDefault') }}</label>
                                    <div class="toggler">
                                        <input hidden name="def" type="checkbox" class="checkbox-switch" id="logo_chk">
                                        <label class="main-toggle" for="logo_chk">
                                            <span data-on="{{ __('adminstaticword.Yes') }}" data-off="{{ __('adminstaticword.No') }}"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="box-footer">
                            <div class="row">
                                <div class="col-xs-9"></div>
                                <button type="submit"
                                    class="btn btn-md col-xs-3 btn-primary">{{ __('adminstaticword.Save') }}</button>
                            </div>
                        </div>

                    </form>
                </div>
                <!-- /.panel body -->
            </div>
            <!-- /.box -->
        </div>
        <!--/.col (right) -->
    </div>
    <!-- /.row -->
</section>

@endsection