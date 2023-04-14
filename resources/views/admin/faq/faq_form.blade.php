@extends('admin/layouts.master')
@section('title', __('adminstaticword.Add') . ' ' . __('adminstaticword.FAQ') . ' - ' . __('adminstaticword.Admin'))
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
        <!-- left column -->
        <div class="col-xs-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"> {{ __('adminstaticword.Add') }} {{ __('adminstaticword.FAQ') }}</h3>
                    <a href="{{url('faq')}}" class="btn btn-success pull-right owtbtn">
                        {{ __('adminstaticword.Back') }}
                    </a>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <form id="demo-form2" method="post" action="{{url('faq/')}}" data-parsley-validate
                            class="form-label-left" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="exampleInputTit1e">{{ __('adminstaticword.Title') }}:<sup
                                                class="redstar">*</sup></label>
                                        <input type="text" class="form-control" name="title"
                                            placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.Title') }}"
                                            id="exampleInputTitle" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="detail">{{ __('adminstaticword.Detail') }}:<sup
                                                class="redstar">*</sup></label>
                                        <textarea id="detail" name="details" class="form-control" rows="5"
                                            placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.Detail') }}"
                                            value=""></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12">
                                    <label>{{ __('adminstaticword.Status') }}:</label>
                                    <div class="toggler">
                                        <input hidden id="status" type="checkbox" name="status">
                                        <label class="main-toggle toggle-lg" for="status">
                                            <span data-on="{{ __('adminstaticword.Active') }}" data-off="{{ __('adminstaticword.Deactive') }}"></span>
                                        </label>
                                    </div>
                                    <input type="hidden" name="free" value="0" for="status" id="status">
                                </div>
                            </div>

                            <div class="box-footer">
                                <div class="row">
                                    <div class="col-xs-8 col-md-9"></div>
                                    <button type="submit"  class="btn btn-lg col-xs-4 col-md-3 btn-primary">{{ __('adminstaticword.Submit') }}</button>
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