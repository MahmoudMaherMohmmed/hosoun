@extends('admin.layouts.master')
@section('title', __('adminstaticword.WidgetSetting') . ' - ' . __('adminstaticword.Admin'))
@section('body')

<section class="content">
    @include('admin.message')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('adminstaticword.WidgetSetting') }}</h3>
                </div>
                <div class="panel-body">
                    <form action="{{action('WidgetController@update')}}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="row">
                            <div class="col-xs-12 col-md-4">
                                <div class="form-group">
                                    <label for="widget_one">{{ __('adminstaticword.WidgetOne') }}<sup
                                            class="redstar">*</sup></label>
                                    <input id="widget_one" value="{{ $show ? $show->widget_one : '' }}" autofocus name="widget_one"
                                        type="text" class="form-control" placeholder="" required />
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-4">
                                <div class="form-group">
                                    <label for="widget_two">{{ __('adminstaticword.WidgetTwo') }}<sup
                                            class="redstar">*</sup></label>
                                    <input id="widget_two" value="{{ optional($show)->widget_two }}" autofocus name="widget_two" type="text"
                                        class="form-control" placeholder="" required />
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-4">
                                <div class="form-group">
                                    <label for="widget_three">{{ __('adminstaticword.WidgetThree') }}<sup
                                            class="redstar">*</sup></label>
                                    <input id="widget_three" value="{{ optional($show)->widget_three }}" autofocus name="widget_three"
                                        type="text" class="form-control" placeholder="" required />
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