@extends('admin/layouts.master')
@section('title', __('adminstaticword.Add') . ' ' . __('adminstaticword.NewQuestion') . ' - ' . __('adminstaticword.Instructor'))
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
        <!-- left column -->
        <div class="col-xs-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('adminstaticword.Add') }} {{ __('adminstaticword.NewQuestion') }}</h3>
                </div>
                <div class="box-body">
                    <form id="demo-form2" method="post" action="{{ route('instructorquestion.store') }}"
                        data-parsley-validate>
                        {{ csrf_field() }}


                        <input type="hidden" name="instructor_id" class="form-control"
                            value="{{ Auth::User()->id }}" />

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="course_id">{{ __('adminstaticword.Course') }} <span
                                            class="redstar">*</span></label>
                                    <select id="course_id" name="course_id" class="form-control js-example-basic-single">
                                        <option value="none" selected disabled hidden>
                                            {{ __('adminstaticword.SelectanOption') }}
                                        </option>
                                        @foreach($course as $cor)
                                        <option value="{{ $cor->id }}">{{ $cor->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <select name="user_id" class="form-control display-none">
                                        <option value="{{ Auth::user()->id }}">{{ Auth::user()->fname }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="question">{{ __('adminstaticword.Question') }}:<sup
                                            class="redstar">*</sup></label>
                                    <textarea id="question" name="question" rows="3" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>{{ __('adminstaticword.Status') }}:</label>
                                    <div class="toggler">
                                        <input hidden id="c2222" type="checkbox" />
                                        <label class="main-toggle toggle-lg" for="c2222">
                                            <span data-off="{{ __('adminstaticword.Deactive') }}"
                                                data-on="{{ __('adminstaticword.Active') }}"></span>
                                        </label>
                                    </div>
                                    <input type="hidden" name="status" value="0" id="t2222">
                                </div>
                            </div>
                        </div>

                        <div class="box-footer">
                            <div class="row">
                                <div class="col-xs-9"></div>
                                <button type="submit"
                                    class="btn btn-md col-xs-3 btn-primary">{{ __('adminstaticword.Submit') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.box -->
        </div>
        <!--/.col (right) -->
    </div>
    <!-- /.row -->
</section>
@endsection