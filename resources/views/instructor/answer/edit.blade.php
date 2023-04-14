@extends('admin/layouts.master')
@section('title', __('adminstaticword.Edit') . ' ' . __('adminstaticword.Answer') . ' - ' . __('adminstaticword.Instructor'))
@section('body')

<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-xs-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"> {{ __('adminstaticword.Edit') }} {{ __('adminstaticword.Answer') }}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <form action="{{url('instructoranswer/'.$answer->id)}}" method="POST"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        
                        
                        
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label class="display-none"
                                        for="course_id">{{ __('adminstaticword.SelectCourse') }}</label>
                                    <input id="course_id" value="{{ $answer->course_id }}" autofocus name="course_id" type="text"
                                        class="form-control display-none">
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="answer"> {{ __('adminstaticword.Answer') }}:<sup
                                            class="redstar">*</sup></label>
                                    <textarea id="answer" name="answer" rows="4" class="form-control"
                                        placeholder="Please Enter Your Answer">{{ $answer->answer }}</textarea>
                                </div>
                            </div>
                            
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>{{ __('adminstaticword.Status') }}:</label>
                                    <div class="toggler">
                                        <input hidden id="cb10111" type="checkbox"
                                            {{ $answer->status==1 ? 'checked' : '' }}>
                                        <label class="main-toggle toggle-lg {{ $answer->status==1 ? 'on' : '' }}" for="cb10111">
                                            <span data-off="{{ __('adminstaticword.Deactive') }}" data-on="{{ __('adminstaticword.Active') }}"></span>
                                        </label>
                                    </div>
                                    <input type="hidden" name="status" value="{{ $answer->status }}" id="jjjj">
                                </div>
                            </div>
                        </div>

                        <div class="box-footer">
                            <div class="row">
                                <div class="col-xs-9"></div>
                                <button value="" type="submit"
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