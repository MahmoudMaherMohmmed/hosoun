@extends('admin.layouts.master')
@section('title', __('adminstaticword.CourseText') . ' - ' . __('adminstaticword.Admin'))
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
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('adminstaticword.CourseText') }}</h3>
                </div>
                <div class="panel-body">
                    <form action="{{ action('CoursetextController@update') }}" method="POST"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                    <label for="heading">{{ __('adminstaticword.Heading') }}<sup
                                            class="redstar">*</sup></label>
                                    <input id="heading" value="{{ $show['heading'] }}" autofocus required name="heading" type="text"
                                        class="form-control"
                                        placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.Heading') }}" />
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                    <label for="sub_heading">{{ __('adminstaticword.SubHeading') }}<sup
                                            class="redstar">*</sup></label>
                                    <input id="sub_heading" value="{{ $show['sub_heading'] }}" autofocus required name="sub_heading"
                                        type="text" class="form-control"
                                        placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.SubHeading') }}" />
                                </div>
                            </div>
                        </div>

                        <div class="box-footer">
                            <div class="row">
                                <div class="col-xs-9 col-md-10"></div>
                                <button value="" type="submit"
                                    class="btn btn-md col-xs-3 col-md-2 btn-primary">{{ __('adminstaticword.Save') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</section>
@endsection