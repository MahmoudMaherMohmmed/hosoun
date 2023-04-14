@extends('admin/layouts.master')
@section('title', __('adminstaticword.Add') . ' ' . __('adminstaticword.RefundPolicy') . ' - ' . __('adminstaticword.Admin'))
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
                    <h3 class="box-title"> {{ __('adminstaticword.Add') }} {{ __('adminstaticword.RefundPolicy') }}</h3>
                    <a href="{{url('refundpolicy')}}" class="btn btn-success pull-right owtbtn">
                        {{ __('adminstaticword.Back') }}
                    </a>
                </div>
                <br>
                <div class="box-body">
                    <form id="demo-form2" method="post" action="{{url('refundpolicy/')}}"
                        data-parsley-validate
                        enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                    <label for="name">{{ __('adminstaticword.Name') }}:<sup class="redstar">*</sup></label>
                                    <input type="text" class="form-control" name="name" id="name" value="">
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                    <label for="days">{{ __('adminstaticword.Days') }}:<sup class="redstar">*</sup></label>
                                    <input type="text" class="form-control" name="days" placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.ReturnDays') }}" id="days" value="">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="detail">{{ __('adminstaticword.Detail') }}:<sup class="redstar">*</sup></label>
                                    <textarea name="detail" id="editor2" rows="5" class="form-control"></textarea>
                                </div>
                            </div>
                            
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>{{ __('adminstaticword.Status') }}:</label>
                                    <div class="toggler">
                                        <input hidden id="123" type="checkbox" />
                                        <label class="main-toggle toggle-lg" for="123">
                                            <span data-on="{{ __('adminstaticword.Active') }}" data-off="{{ __('adminstaticword.Deactive') }}"></span>
                                        </label>
                                    </div>
                                    <input type="hidden" name="status" value="0" id="1234">
                                </div>
                            </div>
                        </div>

                        <div class="box-footer">
                            <div class="row">
                                <div class="col-xs-9"></div>
                                <button type="submit" class="btn btn-lg col-xs-3 btn-primary">{{ __('adminstaticword.Submit') }}</button>
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
    tinymce.init({
        selector: '#editor1,#editor2,.editor',
        height: 350,
        menubar: 'edit view insert format tools table tc',
        autosave_ask_before_unload: true,
        autosave_interval: "30s",
        autosave_prefix: "{path}{query}-{id}-",
        autosave_restore_when_empty: false,
        autosave_retention: "2m",
        image_advtab: true,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks fullscreen',
            'insertdatetime media table paste wordcount'
        ],
        toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media  template link anchor codesample | a11ycheck ltr rtl | showcomments addcomment',
        content_css: '//www.tiny.cloud/css/codepen.min.css'
    });
</script>
@endsection