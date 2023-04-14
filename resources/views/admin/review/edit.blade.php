@extends('admin.layouts.master')
@section('title', __('adminstaticword.Edit') . ' ' . __('adminstaticword.Review') . ' - ' . __('adminstaticword.Admin'))
@section('body')

<section class="content">
    @include('admin.message')
    <div class="content">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('adminstaticword.Edit') }} {{ __('adminstaticword.Review') }}</h3>
                </div>
                <div class="panel-body">
                    <form action="{{ action('ReviewratingController@update') }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label>{{ __('adminstaticword.Status') }}:</label>
                                    <div class="toggler">
                                        <input hidden id="cb10111" type="checkbox"
                                            {{ $show->status==1 ? 'checked' : '' }}>
                                        <label class="main-toggle toggle-lg {{ $show->status==1 ? 'on' : '' }}" for="cb10111">
                                            <span data-off="{{ __('adminstaticword.Deactive') }}" data-on="{{ __('adminstaticword.Active') }}"></span>
                                        </label>
                                    </div>
                                    <input type="hidden" name="status" value="{{ $show->status }}" id="jjjj">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label>{{ __('adminstaticword.Approved') }}:</label>
                                    <div class="toggler">
                                        <input hidden id="cb10112" type="checkbox"
                                            {{ $show->approved==1 ? 'checked' : '' }}>
                                        <label class="main-toggle toggle-lg {{ $show->approved==1 ? 'on' : '' }}" for="cb10112">
                                            <span data-off="{{ __('adminstaticword.Deactive') }}" data-on="{{ __('adminstaticword.Active') }}"></span>
                                        </label>
                                    </div>
                                    <input type="hidden" name="status" value="{{ $show->approved }}" id="jjjj">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-9"></div>
                            <div class="col-xs-3">
                                <button value="" type="submit"
                                    class="btn btn-lg col-xs-12 btn-primary">{{ __('adminstaticword.Save') }}</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection