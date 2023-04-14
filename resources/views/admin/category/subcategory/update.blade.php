@extends('admin/layouts.master')
@section('title', __('adminstaticword.Edit') . ' ' . __('adminstaticword.SubCategory'))
@section('body')

<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-xs-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('adminstaticword.Edit') }} {{ __('adminstaticword.SubCategory') }}</h3>
                    <a href="{{url('subcategory')}}" class="btn btn-success pull-right owtbtn">
                        {{ __('adminstaticword.Back') }}
                    </a>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div class="box-body">
                    <form id="demo-form" method="post" action="{{url('subcategory/'.$cate->id)}}" data-parsley-validate
                        class="form-label-left" autocomplete="off">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="row">

                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                    <label for="category_id">{{ __('adminstaticword.SelectCategory') }}</label>
                                    <select id="category_id" name="category_id" class="form-control js-example-basic-single">
                                        @foreach($category as $cou)
                                        <option value="{{ $cou->id }}"
                                            {{$cate->category_id == $cou->id  ? 'selected' : ''}}>{{ $cou->title}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                    <label for="title">{{ __('adminstaticword.SubCategory') }}:<span class="redstar">*</span></label>
                                    <input type="title" class="form-control" name="title" id="title" value="{{$cate->title}}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                    <label for="icon">{{ __('adminstaticword.Icon') }}:<span class="redstar">*</span></label>
                                    <input type="text" class="form-control icp-auto icp" name="icon" id="icon" value="{{$cate->icon}}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                    <label>{{ __('adminstaticword.Status') }}:</label>
                                    <div class="toggler">
                                        <input hidden id="status" type="checkbox" name="status" {{ $cate->status == '1' ? 'checked' : '' }}>
                                        <label class="main-toggle toggle-lg {{ $cate->status == '1' ? 'on' : '' }}" for="status">
                                            <span data-on="{{ __('adminstaticword.Enable') }}" data-off="{{ __('adminstaticword.Disable') }}"></span>
                                        </label>
                                    </div>
                                    <input type="hidden" name="free" value="0" for="status" id="status">
                                </div>
                            </div>
                        </div>

                        <div class="box-footer">
                            <div class="row">
                                <div class="col-xs-9 col-md-10"></div>
                                <button type="submit" class="btn btn-md col-xs-3 col-md-2 btn-primary">{{ __('adminstaticword.Save') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!--/.col (right) -->
    </div>
    <!-- /.row -->
</section>

@endsection