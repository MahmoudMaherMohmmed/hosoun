@extends('admin/layouts.master')
@section('title', __('adminstaticword.Edit') . ' ' . __('adminstaticword.Testimonial') . ' - ' . __('adminstaticword.Admin'))
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
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"> {{ __('adminstaticword.Edit') }} - {{ $test->client_name}} </h3>
                    <a href="{{url('testimonial')}}" class="btn btn-success pull-right owtbtn">
                        {{ __('adminstaticword.Back') }}
                    </a>
                </div>
                <div class="box-body">
                    <form id="demo-form2" method="post" action="{{url('testimonial/'.$test->id)}}" data-parsley-validate
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{method_field('PATCH')}}

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="client_name">{{ __('adminstaticword.Name') }}:<sup
                                            class="redstar">*</sup></label>
                                    <input type="text" class="form-control" name="client_name" id="client_name"
                                        value="{{$test->client_name}}">
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="details">{{ __('adminstaticword.Detail') }}:<sup
                                            class="redstar">*</sup></label>
                                    <textarea id="details" name="details" row="5"
                                        class="form-control">{{$test->details}}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                    <label for="image">{{ __('adminstaticword.Image') }}</label>
                                    <div>
                                        <input type="file" name="image" id="image" class="inputfile inputfile-1" />
                                        <label for="image">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17"
                                                viewBox="0 0 20 17">
                                                <path
                                                    d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
                                            </svg>
                                            <span>{{ __('adminstaticword.Chooseafile') }}&hellip;</span>
                                        </label>
                                    </div>
                                    <img src="{{ url('/images/testimonial/'.$test->image) }}" class="img-responsive image-contained" />
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-6">
                                <label>{{ __('adminstaticword.Status') }}:</label>
                                <div class="toggler">
                                    <input hidden id="welmail" type="checkbox" name="status"
                                        {{ $test->status == '1' ? 'checked' : '' }}>
                                    <label class="main-toggle toggle-lg {{ $test->status == '1' ? 'on' : '' }}"
                                        for="welmail">
                                        <span data-on="{{ __('adminstaticword.Enable') }}"
                                            data-off="{{ __('adminstaticword.Disable') }}"></span>
                                    </label>
                                </div>
                                <input type="hidden" name="free" value="0" for="welmail" id="welmail">
                            </div>
                        </div>

                        <div class="box-footer">
                            <div class="row">
                                <div class="col-xs-9"></div>
                                <button type="submit"
                                    class="btn btn-lg col-xs-3 btn-primary">{{ __('adminstaticword.Submit') }}</button>
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


@section('scripts')

<script>
    (function ($) {
        "use strict";
        tinymce.init({
            selector: 'textarea'
        });
    })(jQuery);
</script>

@endsection