@extends('admin/layouts.master')
@section('title', __('adminstaticword.Edit') . ' ' . __('adminstaticword.Directory') . ' - ' . __('adminstaticword.Admin'))
@section('body')

<section class="content">
    @include('admin.message')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"> {{ __('adminstaticword.Edit') }} {{ __('adminstaticword.Directory') }}</h3>
                    <a href="{{url('directory')}}" class="btn btn-success pull-right owtbtn">
                        {{ __('adminstaticword.Back') }}
                    </a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form id="demo-form" method="post" action="{{url('directory/'.$show->id)}}" data-parsley-validate
                        class="form-label-left" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}


                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="exampleInputTitle">{{ __('adminstaticword.City') }}:<sup
                                            class="redstar">*</sup></label>
                                    <input type="text" class="form-control" name="heading" id="exampleInputTitle"
                                        value="{{$show->city}}">
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="detail">{{ __('adminstaticword.Detail') }}:<sup
                                            class="redstar">*</sup></label>
                                    <textarea type="text" id="detail" class="form-control" name="detail">{{$show->detail}}</textarea>
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>{{ __('adminstaticword.Status') }}:</label>
                                    <div class="toggler">
                                        <input hidden id="status" type="checkbox" name="status" {{ $show->status == '1' ? 'checked' : '' }}>
                                        <label class="main-toggle toggle-lg {{ $show->status == '1' ? 'on' : '' }}" for="status">
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
                                <button type="submit" class="btn btn-lg col-xs-3 col-md-2 btn-primary">+ {{ __('adminstaticword.Save') }}</button>
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