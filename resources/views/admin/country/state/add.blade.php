@extends("admin/layouts.master")
@section('title', __('adminstaticword.Add') . ' ' . __('adminstaticword.State') . ' - ' . __('adminstaticword.Admin'))
@section("body")

<section class="content">
    @include('admin.message')
    <div class="row">
        <div class="col-xs-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"> {{ __('adminstaticword.Add') }} {{ __('adminstaticword.State') }}</h3>
                    <div class="panel-heading">
                        <a href=" {{url('admin/state')}} " class="btn btn-success pull-right owtbtn">
                            {{ __('adminstaticword.Back') }}
                        </a>
                    </div>
                </div>
                <form id="demo-form2" class="inline-form clear-both" method="post" enctype="multipart/form-data"
                    action="{{url('admin/state')}}" data-parsley-validate class="form-horizontal form-label-left">
                    {{csrf_field()}}
                    <div class="box-body">
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="state_id">
                                {{ __('adminstaticword.Add') }} {{ __('adminstaticword.State') }} <span
                                    class="redstar">*</span>
                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="state_id" required class="form-control js-example-basic-single" name="state_id">
                                    <option>{{ __('adminstaticword.ChooseCountry') }}:</option>
                                    @foreach ($country as $c)
                                    <option value="{{ $c->id }}">{{ $c->nicename }}</option>
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
            <!-- /.box -->
        </div>
    </div>
</section>

@endsection