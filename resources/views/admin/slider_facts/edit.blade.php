@extends('admin.layouts.master')
@section('title', __('adminstaticword.Edit') . ' ' . __('adminstaticword.FactsSlider') . ' - ' . __('adminstaticword.Admin'))
@section('body')

<section class="content">
    @include('admin.message')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('adminstaticword.Edit') }} {{ __('adminstaticword.FactsSlider') }}</h3>
                    <a href="{{url('facts')}}" class="btn btn-success pull-right owtbtn">
                        {{ __('adminstaticword.Back') }}
                    </a>
                </div>
                <div class="panel-body">
                    <form action="{{route('facts.update',$show->id)}}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}


                        <div class="row">
                            <div class="col-xs-12 col-md-4">
                                <div class="form-group">
                                    <label for="icon"> {{ __('adminstaticword.Icon') }}<sup class="redstar">*</sup></label>
                                    <input id="icon" value="{{ $show->icon }}" autofocus required name="icon" type="text" class="form-control icp-auto icp" placeholder="{{ __('adminstaticword.ChooseIcon') }}" />
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-4">
                                <div class="form-group">
                                    <label for="heading"> {{ __('adminstaticword.Heading') }}<sup class="redstar">*</sup></label>
                                    <input id="heading" value="{{ $show->heading }}" autofocus required name="heading" type="text" class="form-control" placeholder="Enter Facts Heading" />
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-4">
                                <div class="form-group">
                                    <label for="sub_heading"> {{ __('adminstaticword.SubHeading') }}<sup class="redstar">*</sup></label>
                                    <input id="sub_heading" value="{{ $show->sub_heading }}" autofocus required name="sub_heading" type="text" class="form-control" placeholder="Enter Facts Sub Heading" />
                                </div>
                            </div>
                        </div>
                        <br>

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