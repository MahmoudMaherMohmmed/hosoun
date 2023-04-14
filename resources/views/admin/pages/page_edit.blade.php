@extends('admin/layouts.master')
@section('title', __('adminstaticword.Edit') . ' ' . __('adminstaticword.Pages') . ' - ' . __('adminstaticword.Admin'))
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
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"> {{ __('adminstaticword.Edit') }} - {!! $find->title !!}</h3>
                    <a href="{{url('page')}}" class="btn btn-success pull-right owtbtn">
                        {{ __('adminstaticword.Back') }}
                    </a>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <form id="demo-form2" method="post" action="{{url('page/'.$find->id)}}" data-parsley-validate enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{method_field('PATCH')}}

                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <div class="form-group">
                                        <label for="title">{{ __('adminstaticword.Title') }}:</label>
                                        <input type="text" class="form-control" name="title" id="title" value="{{$find->title}}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    <div class="form-group">
                                        <label for="slug">{{ __('adminstaticword.Slug') }}:</label>
                                        <input type="text" class="form-control" name="slug" id="slug" value="{{$find->slug}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label>{{ __('adminstaticword.Status') }}:</label>
                                        <li class="toggler">
                                            <input hidden id="cb10" type="checkbox" {{ $find->status==1 ? 'checked' : '' }}>
                                            <label class="main-toggle toggle-lg {{ $find->status==1 ? 'on' : '' }}" for="cb10">
                                                <span data-on="{{ __('adminstaticword.Active') }}" data-off="{{ __('adminstaticword.Deactive') }}"></span>
                                            </label>
                                        </li>
                                        <input type="hidden" name="status" value="{{ $find->status }}" id="j">
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="detail">{{ __('adminstaticword.Detail') }}:</label>
                                        <textarea id="detail" name="details" rows="5"
                                            class="form-control">{{$find->details}}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="box-footer">
                                <div class="row">
                                    <div class="col-xs-8 col-md-9"></div>
                                    <button type="submit" class="btn btn-md col-xs-8 col-md-3 btn-primary">{{ __('adminstaticword.Save') }}</button>
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