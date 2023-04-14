@extends('admin/layouts.master')
@section('title', __('adminstaticword.Add') . ' ' . __('adminstaticword.Directory') . ' - ' . __('adminstaticword.Admin'))
@section('body')


<section class="content">
    @include('admin.message')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"> {{ __('adminstaticword.Add') }} {{ __('adminstaticword.Directory') }}</h3>
                    <a href="{{url('directory')}}" class="btn btn-success pull-right owtbtn">
                        {{ __('adminstaticword.Back') }}
                    </a>
                </div>
                <div class="box-body">
                    <form id="demo-form2" method="post" action="{{url('directory/')}}" data-parsley-validate
                        class="form-label-left" enctype="multipart/form-data">
                        {{ csrf_field() }}


                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="city">{{ __('adminstaticword.City') }}:<sup
                                            class="redstar">*</sup></label>
                                    <input class="form-control" type="text" name="city" id="city"
                                        placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.City') }}">
                                </div>
                            </div>

                            {{-- <div class="col-xs-12">
                                        <div class="form-group">
                                            <label for="sub_heading">{{ __('adminstaticword.SubHeading') }}:<sup
                                    class="redstar">*</sup></label>
                                <input type="slug" class="form-control" name="sub_heading" id="sub_heading"
                                    placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.SubHeading') }}">
                                    </div>
                            </div> --}}

                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="detail">{{ __('adminstaticword.Detail') }}:<sup
                                            class="redstar">*</sup></label>
                                    <textarea name="detail" id="detail" rows="1" class="form-control"
                                        placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.Detail') }}"></textarea>
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <div class="from-group">
                                    <label>{{ __('adminstaticword.Status') }}:</label>
                                    <div class="toggler">
                                        <input hidden id="status" type="checkbox" name="status">
                                        <label class="main-toggle toggle-lg" for="status">
                                            <span data-on="{{ __('adminstaticword.Enable') }}" data-off="{{ __('adminstaticword.Disable') }}"></span>
                                        </label>
                                    </div>
                                    <input type="hidden" name="free" value="0" for="status" id="status">
                                </div>
                            </div>
                        </div>


                        <div class="box-footer">
                            <div class="row">
                                <div class="col-xs-9 col-md-10"></div>
                                <button type="submit" value="Add Slider"
                                    class="btn btn-md col-xs-3 col-md-2 btn-primary">{{ __('adminstaticword.Save') }}</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <!-- /.box -->
        </div>
        <!--/.col (right) -->
    </div>
    <!-- /.row -->
</section>
@endsection