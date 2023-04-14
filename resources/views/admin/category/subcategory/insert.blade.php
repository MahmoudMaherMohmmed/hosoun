@extends('admin/layouts.master')
@section('title', __('adminstaticword.AddSubCategory'))
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
                    <h3 class="box-title">{{ __('adminstaticword.AddSubCategory') }}</h3>
                    <a href="{{url('subcategory')}}" class="btn btn-success pull-right owtbtn">
                        {{ __('adminstaticword.Back') }}
                    </a>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div class="box-body">
                    <form id="demo-form2" method="post" action="{{url('subcategory/')}}" data-parsley-validate
                        class="form-label-left" autocomplete="off">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                    <label for="category_id">{{ __('adminstaticword.Category') }}</label>
                                    {{-- <select name="category_id"  class="form-control js-example-basic-single col-md-7 col-xs-12"> --}}
                                    <select name="category_id" id="category_id"  class="form-control js-example-basic-single">
                                        @foreach($category as $cate)
                                        <option value="{{$cate->id}}">{{$cate->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-5" style="align-self: flex-end">
                                <div class="form-group">
                                    <button type="button" data-dismiss="modal" data-toggle="modal" data-target="#myModal9" title="AddCategory" class="item-flex btn btn-md btn-primary">
                                        <i class='bx bx-window-open me' ></i> {{ __('adminstaticword.AddCategory') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                    <label for="title">{{ __('adminstaticword.SubCategory') }}:<sup class="redstar">*</sup></label>
                                    <input type="text" class="form-control" name="title" id="title" placeholder="" value="">
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                    <label for="icon">{{ __('adminstaticword.Icon') }}:<sup class="redstar">*</sup></label>
                                    <input type="text" class="form-control icp-auto icp" name="icon" id="icon" placeholder="{{ __('adminstaticword.ChooseIcon') }}" value="">
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-xs-12">
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
                        <br>

                        <div class="box-footer">
                            <div class="row">
                                <div class="col-xs-8 col-md-10"></div>
                                <button type="submit" class="btn btn-md col-xs-4 col-md-2 btn-primary">{{ __('adminstaticword.Save') }}</button>
                            </div>
                        </div>

                    </form>
                </div>
                <!-- /.box -->
            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
</section>

@include('admin.category.subcategory.cat')

@endsection