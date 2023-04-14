@extends('admin/layouts.master')
@section('title', __('adminstaticword.Add') . ' ' . __('adminstaticword.Announcement'))
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
                    <h3 class="box-title"> {{ __('adminstaticword.Add') }} {{ __('adminstaticword.Announcement') }}</h3>
                    <a href="{{ url()->previous() }}" class="btn btn-success pull-right owtbtn">
                        {{ __('adminstaticword.Back') }}
                    </a>
                </div>
                <br>
                <div class="box-body">
                    <form id="demo-form2" method="post" action="{{ route('announsment.store') }}"
                        data-parsley-validate>
                        {{ csrf_field() }}
                        
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="course_id"> {{ __('adminstaticword.Course') }}<span class="required">*</span></label>
                                    <select id="course_id" name="course_id" class="form-control">
                                        <option value="{{ $cor->id }}">{{ $cor->title }}</option>
                                    </select>
                                </div>
                            </div>
    
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="user_id">{{ __('adminstaticword.User') }}</label>
                                    <select id="user_id" name="user_id" class="form-control">
                                        @php
                                        $users = App\User::all();
                                        @endphp
            
                                        @foreach($users as $us)
                                        <option value="{{$us->id}}">{{$us->fname}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="editor6">{{ __('adminstaticword.Announcement') }}:<sup
                                            class="redstar">*</sup></label>
                                    <textarea name="announsment" id="editor6" rows="2" class="form-control"
                                        placeholder="Enter Your Announcement"></textarea>
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>{{ __('adminstaticword.Status') }}:</label>
                                    <div class="toggler">
                                        <input hidden id="uuuu" type="checkbox" />
                                        <label class="main-toggle toggle-lg" for="uuuu">
                                            <span data-off="{{ __('adminstaticword.Deactive') }}" data-on="{{ __('adminstaticword.Active') }}"></span>
                                        </label>
                                    </div>
                                    <input type="hidden" name="status" value="1" id="uuuuu">
                                </div>
                            </div>
                        </div>

                        <div class="box-footer">
                            <div class="row">
                                <div class="col-xs-9"></div>
                                <button type="submit" class="btn btn-md col-xs-3 btn-primary">{{ __('adminstaticword.Submit') }}</button>
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