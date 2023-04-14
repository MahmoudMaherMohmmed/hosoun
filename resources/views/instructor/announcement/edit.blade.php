@extends('admin/layouts.master')
@section('title', __('adminstaticword.Edit') . ' ' . __('adminstaticword.Annoncement') . ' - ' . __('adminstaticword.Instructor'))
@section('body')

<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-xs-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"> {{ __('adminstaticword.Edit') }} {{ __('adminstaticword.Annoncement') }}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form id="demo-form" method="post" action="{{url('instructor/announcement/'.$announs->id)}}"
                        data-parsley-validate>
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}


                        <input type="hidden" name="instructor_id" class="form-control"
                            value="{{ Auth::User()->id }}" />


                        <div class="row">
                            <div class="col-xs-12 col-md-9">
                                <div class="form-group">
                                    <label for="announsment">{{ __('adminstaticword.Announsment') }}:<span
                                            class="redstar">*</span></label>
                                    <textarea id="announsment" name="announsment" rows="3" class="form-control"
                                        placeholder="Enter Question">{{$announs->announsment}}</textarea>
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-3">
                                <div class="form-group">
                                    <label>{{ __('adminstaticword.Status') }}:</label>
                                    <div class="toggler">
                                        <input hidden id="cb77" type="checkbox"
                                            {{ $announs->status==1 ? 'checked' : '' }}>
                                        <label class="main-toggle toggle-lg {{ $announs->status==1 ? 'on' : '' }}" for="cb77">
                                            <span data-off="{{ __('adminstaticword.Deactive') }}" data-on="{{ __('adminstaticword.Active') }}"></span>
                                        </label>
                                    </div>
                                    <input type="hidden" name="status" value="{{ $announs->status }}" id="jp">
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="box-footer">
                            <div class="row">
                                <div class="col-xs-9"></div>
                                <button type="submit"
                                    class="btn btn-md col-xs-3 btn-primary">{{ __('adminstaticword.Save') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!--/.col (right) -->
    </div>
    <!-- /.row -->
</section>

@endsection