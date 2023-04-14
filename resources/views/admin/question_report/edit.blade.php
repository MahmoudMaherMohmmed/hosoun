@extends('admin.layouts.master')
@section('title', __('adminstaticword.Edit') . ' ' . __('adminstaticword.Report') . ' - ' . __('adminstaticword.Admin'))
@section('body')

<section class="content">
    @include('admin.message')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('adminstaticword.Edit') }} {{ __('adminstaticword.Question') }}
                        {{ __('adminstaticword.Report') }}</h3>
                    <a href="{{url('user/question/report')}}" class="btn btn-success pull-right owtbtn">
                        {{ __('adminstaticword.Back') }}
                    </a>
                </div>
                <div class="panel-body">
                    <form action="{{url('user/question/report/'.$show->id)}}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                    <label for="title">{{ __('adminstaticword.Title') }}<sup
                                            class="redstar">*</sup></label>
                                    <input value="{{ $show->title }}" autofocus required id="title" name="title" type="text"
                                        class="form-control" placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.Title') }}" />
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                    <label for="email">{{ __('adminstaticword.Email') }}<sup
                                            class="redstar">*</sup></label>
                                    <input value="{{ $show->email }}" autofocus required id="email" name="email" type="email"
                                        class="form-control" placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.Email') }}" />
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="detail">{{ __('adminstaticword.Detail') }}<sup
                                            class="redstar">*</sup></label>
                                    <textarea id="detail" name="detail" value="" rows="4" class="form-control"
                                        placeholder="">{{ $show->detail }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="box-footer">
                            <div class="row">
                                <div class="col-xs-9 col-md-10"></div>
                                <button value="" type="submit" class="btn btn-md col-xs-3 col-md-2 btn-primary">{{ __('adminstaticword.Save') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection