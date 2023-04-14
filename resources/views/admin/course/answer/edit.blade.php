@extends('admin.layouts.master')
@section('title', __('adminstaticword.Edit') . ' ' . __('adminstaticword.Answer'))
@section('body')

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"> {{ __('adminstaticword.Edit') }} {{ __('adminstaticword.Answer') }}</h3>
                    <a href="{{ url()->previous() }}" class="btn btn-success pull-right owtbtn">
                        {{ __('adminstaticword.Back') }}
                    </a>
                </div>
                <div class="panel-body">
                    <form action="{{route('courseanswer.update',$show->id)}}" method="POST"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <input type="hidden" name="instructor_id" class="form-control" value="{{ Auth::User()->id }}" />

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="course_id">{{ __('adminstaticword.SelectCourse') }}</label>
                                    <input id="course_id" value="{{ $show->course_id }}" autofocus name="course_id"
                                        type="text" class="form-control">
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <label for="answer">{{ __('adminstaticword.Answer') }}:<sup
                                        class="redstar">*</sup></label>
                                <textarea id="answer" name="answer" rows="4" class="form-control"
                                    required>{{ $show->answer }}</textarea>
                            </div>

                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>{{ __('adminstaticword.Status') }}:</label>
                                    <div class="toggler">
                                        <input hidden id="cb10111" type="checkbox"
                                            {{ $show->status==1 ? 'checked' : '' }}>
                                        <label class="main-toggle toggle-lg {{ $show->status==1 ? 'on' : '' }}"
                                            for="cb10111">
                                            <span data-off="{{ __('adminstaticword.Deactive') }}"
                                                data-on="{{ __('adminstaticword.Active') }}"></span>
                                        </label>
                                    </div>
                                    <input type="hidden" name="status" value="{{ $show->status }}" id="jjjj">
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
            </div>
        </div>
    </div>
</section>
@endsection