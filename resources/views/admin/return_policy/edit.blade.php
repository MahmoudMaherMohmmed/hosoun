@extends('admin/layouts.master')
@section('title', __('adminstaticword.Edit') . ' ' . __('adminstaticword.RefundPolicy') . ' - ' . __('adminstaticword.Admin'))
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
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"> {{ __('adminstaticword.Edit') }} - {!! $return->name !!}</h3>
                    <a href="{{url('refundpolicy')}}" class="btn btn-success pull-right owtbtn">
                        {{ __('adminstaticword.Back') }}
                    </a>
                </div>
                <div class="box-body">
                    <form id="demo-form2" method="post" action="{{url('refundpolicy/'.$return->id)}}"
                        data-parsley-validate 
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{method_field('PATCH')}}

                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                    <label for="name">{{ __('adminstaticword.Name') }}:</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{$return->name}}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                    <label for="days">{{ __('adminstaticword.Days') }}:</label>
                                    <input type="text" class="form-control" name="days" id="days" value="{{$return->days}}">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="editor2">{{ __('adminstaticword.Detail') }}:</label>
                                    <textarea name="detail" rows="5" id="editor2" class="form-control">{{$return->detail}}</textarea>
                                </div>
                            </div>
                            
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>{{ __('adminstaticword.Status') }}:</label>
                                    <div class="toggler">
                                        <input hidden id="cb10" type="checkbox" {{ $return->status==1 ? 'checked' : '' }}>
                                        <label class="main-toggle toggle-lg {{ $return->status==1 ? 'on' : '' }}" for="cb10">
                                            <span data-on="{{ __('adminstaticword.Active') }}" data-off="{{ __('adminstaticword.Deactive') }}"></span>
                                        </label>
                                    </div>
                                    <input type="hidden" name="status" value="{{ $return->status }}" id="j">
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="box-footer">
                            <div class="row">
                                <div class="col-xs-9"></div>
                                <button type="submit" class="btn btn-md col-xs-3 btn-primary">{{ __('adminstaticword.Save') }}</button>
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