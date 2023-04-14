@extends('admin/layouts.master')
@section('body')
@section("title", __('adminstaticword.Edit') . ' ' . __('adminstaticword.Language') . ' - ' . __('adminstaticword.Admin'))

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
                    <h3 class="box-title"> {{ __('adminstaticword.Edit') }} {{ __('adminstaticword.Language') }}</h3>
                    <a href="{{route('show.lang')}}" class="btn btn-success pull-right owtbtn">
                        {{ __('adminstaticword.Back') }}
                    </a>
                </div>
                <div class="panel-body">


                    <form id="demo-form2" method="post" action="{{route('languages.update',$language->id)}}"
                        data-parsley-validate class="form-label-left" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="row">
                            <div class="col-xs-12 col-md-5">
                                <div class="form-group">
                                    <label for="local">{{ __('adminstaticword.Local') }}:<sup
                                            class="redstar">*</sup></label>
                                    <input id="local" class="form-control" type="text" name="local" value="{{ $language->local }}"
                                        placeholder="Please enter language local name" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-5">
                                <div class="form-group">
                                    <label for="name">{{ __('adminstaticword.Name') }}:<sup
                                            class="redstar">*</sup></label>
                                    <input type="text" class="form-control" name="name" value="{{ $language->name }}"
                                        id="name" placeholder="Please enter language name eg:English" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-2">
                                <div class="form-group">
                                    <label>{{ __('adminstaticword.SetDefault') }}</label>
                                    <div class="toggler">
                                        <input hidden name="def" {{ $language->def==1 ? "checked" : "" }}
                                            type="checkbox" id="logo_chk">
                                        <label class="main-toggle {{ $language->def==1 ? "on" : "" }}"
                                            for="logo_chk">
                                            <span data-on="{{ __('adminstaticword.Yes') }}" data-off="{{ __('adminstaticword.No') }}"></span>
                                        </label>
                                    </div>

                                </div>
                            </div>
                        </div>



                        <div class="box-footer">
                            <button type="submit"
                                class="btn btn-md btn-primary">{{ __('adminstaticword.Save') }}</button>
                        </div>


                    </form>
                </div>
                <!-- /.panel body -->
            </div>
            <!-- /.box -->
        </div>
        <!--/.col (right) -->
    </div>
    <!-- /.row -->
</section>

@endsection