@extends('admin.layouts.master')
@section('title', __('adminstaticword.Edit') . ' ' . __('adminstaticword.SocialLink') . ' - ' . __('adminstaticword.Admin'))
@section('body')

<section class="content">
    @include('admin.message')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('adminstaticword.Edit') }} {{ __('adminstaticword.SocialLink') }}</h3>
                    <a href="{{url('social_link')}}" class="btn btn-success pull-right owtbtn">
                        {{ __('adminstaticword.Back') }}
                    </a>
                </div>
                <div class="panel-body">
                    <form action="{{route('social_link.update',$social_link->id)}}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}


                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                    <label for="title"> {{ __('adminstaticword.Heading') }}<sup class="redstar">*</sup></label>
                                    <input id="title" value="{{ $social_link->title }}" autofocus required name="title" type="text" class="form-control"/>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                    <label for="icon"> {{ __('adminstaticword.Icon') }}<sup class="redstar">*</sup></label>
                                    <input id="icon" value="{{ $social_link->icon }}" autofocus required name="icon" type="text" class="form-control icp-auto icp" placeholder="{{ __('adminstaticword.ChooseIcon') }}" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                    <label for="link">{{ __('adminstaticword.URL') }}:<sup class="redstar">*</sup></label>
                                    <input id="link" class="form-control" type="url" name="link" value="{{ $social_link->link }}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                    <label>{{ __('adminstaticword.Status') }}:</label>
                                    <div class="toggler">
                                        <input hidden id="status" type="checkbox" name="status" {{ isset($social_link)&&$social_link->status == '1' ? 'checked' : '' }}>
                                        <label class="main-toggle toggle-lg {{ isset($social_link)&&$social_link->status == '1' ? 'on' : 'off' }}" for="status">
                                            <span data-on="{{ __('adminstaticword.Enable') }}" data-off="{{ __('adminstaticword.Disable') }}"></span>
                                        </label>
                                    </div>
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