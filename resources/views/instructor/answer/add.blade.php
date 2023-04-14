@extends('admin/layouts.master')
@section('title', __('adminstaticword.Add') . ' ' . __('adminstaticword.Answer') . ' - ' . __('adminstaticword.Instructor'))
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
                    <h3 class="box-title"> {{ __('adminstaticword.Add') }} {{ __('adminstaticword.Answer') }}</h3>
                </div>
                <div class="box-body">
                    <form id="demo-form2" method="post" action="{{url('instructoranswer/')}}" data-parsley-validate>
                        {{ csrf_field() }}


                        <input type="hidden" name="instructor_id" value="{{Auth::user()->id}}" />
                        <input type="hidden" name="ans_user_id" value="{{Auth::user()->id}}" />

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="question_id"> {{ __('adminstaticword.Select') }}
                                        {{ __('adminstaticword.Question') }}:<sup class="redstar">*</sup></label>
                                    <select name="question_id" required id="question_id"
                                        class="form-control js-example-basic-single">
                                        <option value="none" selected disabled hidden>
                                            {{ __('adminstaticword.SelectanOption') }}
                                        </option>
                                        @foreach($questions as $ques)
                                        <option value="{{ $ques->id }}">{{ $ques->question}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @foreach($questions as $ques)
                            <input type="hidden" name="ques_user_id" value="{{$ques->user_id}}" />
                            <input type="hidden" name="course_id" value="{{$ques->course_id}}" />
                            @endforeach
                        </div>

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="answer">{{ __('adminstaticword.Answer') }}:<sup
                                            class="redstar">*</sup></label>
                                    <textarea id="answer" name="answer" rows="4" class="form-control"
                                        placeholder="Please Enter Your Answer"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12">
                                <label>{{ __('adminstaticword.Status') }}:</label>
                                <div class="toggler">
                                    <input hidden id="c12" type="checkbox" />
                                    <label class="main-toggle toggle-lg" for="c12">
                                        <span data-off="{{ __('adminstaticword.Deactive') }}" data-on="{{ __('adminstaticword.Active') }}"></span>
                                    </label>
                                </div>
                                <input type="hidden" name="status" value="1" id="t12">
                            </div>
                        </div>

                        <div class="box-footer">
                            <div class="row">
                                <div class="col-xs-9"></div>
                                <button type="submit" value="Add Answer" class="btn btn-md col-xs-3 btn-primary">+
                                    {{ __('adminstaticword.Save') }}</button>
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