@extends('admin.layouts.master')
@section('title', __('adminstaticword.CategorySlider') . ' - ' . __('adminstaticword.Admin'))
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
                    <h3 class="box-title">{{ __('adminstaticword.CategorySlider') }} </h3>
                </div>
                <div class="panel-body">
                    <form action="{{ action('CategorySliderController@update') }}" method="POST"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="heading">{{ __('adminstaticword.SelectCategory') }}</label>
                                    <select id="heading" class="form-control js-example-basic-single" name="category_id[]"
                                        multiple="multiple" size="3" required>

                                        @foreach ($category as $cat)
                                        @if($cat->status == 1)
                                        <option value="{{ $cat->id }}"
                                            {{in_array($cat->id, optional($category_slider)->category_id ?: []) ? "selected": ""}}>
                                            {{ $cat->title }}
                                        </option>
                                        @endif

                                        optional($settings)->site_title

                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <input value="1" name="category_to_show" type="hidden" class="form-control" />
                                </div>
                            </div>
                        </div>

                        <div class="box-footer">
                            <div class="row">
                                <div class="col-xs-9"></div>
                                <button value="" type="submit" class="btn btn-md col-xs-3 btn-primary">{{ __('adminstaticword.Save') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection