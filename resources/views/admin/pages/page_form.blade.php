@extends('admin/layouts.master')
@section('title', __('adminstaticword.Add') . ' ' . __('adminstaticword.Pages') . ' - ' . __('adminstaticword.Admin'))
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
        <!-- left column -->
        <div class="col-xs-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"> {{ __('adminstaticword.Add') }} {{ __('adminstaticword.Pages') }}</h3>
                    <a href="{{url('page')}}" class="btn btn-success pull-right owtbtn">
                        {{ __('adminstaticword.Back') }}
                    </a>
                </div>
                <br>
                <div class="box-body">
                    <div class="form-group">
                        <form id="demo-form2" method="post" action="{{url('page/')}}" data-parsley-validate enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <div class="form-group">
                                        <label for="title">{{ __('adminstaticword.Title') }}:<sup class="redstar">*</sup></label>
                                        <input type="text" class="form-control" name="title" placeholder="Enter Your Title" id="title" value="">
                                    </div>
                                </div>
                                <div class="col-xd-12 col-md-6">
                                    <div class="form-group">
                                        <label>{{ __('adminstaticword.Status') }}:</label>
                                        <div class="toggler">
                                            <input hidden id="123" type="checkbox" />
                                            <label class="main-toggle toggle-lg" for="123">
                                                <span data-on="{{ __('adminstaticword.Active') }}" data-off="{{ __('adminstaticword.Deactive') }}"></span>
                                            </label>
                                        </div>
                                        <input type="hidden" name="status" value="0" id="1234">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="detail">{{ __('adminstaticword.Detail') }}:<sup class="redstar">*</sup></label>
                                        <textarea id="detail" name="details" rows="5" class="form-control" placeholder="Enter Your Details"></textarea>
                                    </div>
                                </div>

                            </div>
                            <br>

                            <div class="box-footer">
                                <div class="row">
                                    <div class="col-xs-8 col-md-9"></div>
                                    <button type="submit" class="btn btn-lg col-xs-4 col-md-3 btn-primary">{{ __('adminstaticword.Submit') }}</button>
                                </div>
                            </div>

                        </form>
                    </div>
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