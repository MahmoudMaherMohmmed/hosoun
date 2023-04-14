@extends("admin/layouts.master")
@section('title', __('adminstaticword.Add') . ' ' . __('adminstaticword.Country') . ' - ' . __('adminstaticword.Admin'))
@section("body")

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
        @include('admin.message')
        <div class="col-xs-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"> {{ __('adminstaticword.Add') }} {{ __('adminstaticword.Country') }}</h3>
                    <div class="panel-heading">
                        <a href=" {{url('admin/country')}} " class="btn btn-success pull-right owtbtn">
                            {{ __('adminstaticword.Back') }}
                        </a>
                    </div>
                </div>
                <form id="demo-form2" class="inline-form clear-both" method="post" enctype="multipart/form-data"
                    action="{{url('admin/country')}}" data-parsley-validate class="form-horizontal form-label-left">
                    {{csrf_field()}}
                    <div class="box-body">
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="country">
                                {{ __('adminstaticword.CountryName') }} <span class="redstar">*</span>
                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="country" required class="form-control js-example-basic-single" name="country">
                                    <option>{{ __('adminstaticword.ChooseCountry') }}:</option>

                                    @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->nicename }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-md-3 col-sm-3 col-xs-12"></div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <button type="submit" class="btn btn-primary">{{ __('adminstaticword.Save') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection