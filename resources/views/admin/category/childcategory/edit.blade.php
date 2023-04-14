@extends('admin/layouts.master')
@section('title', __('adminstaticword.Edit') . ' ' . __('adminstaticword.ChildCategory'))
@section('body')

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('adminstaticword.Edit') }} {{ __('adminstaticword.ChildCategory') }}
                    </h3>
                    <a href="{{url('childcategory')}}" class="btn btn-success pull-right owtbtn">
                        {{ __('adminstaticword.Back') }}
                    </a>
                </div>
                <!-- /.box-header -->
                <!-- form start -->

                <div class="box-body">
                    <form id="demo-form" method="post" action="{{url('childcategory/'.$cate->id)}}"
                        data-parsley-validate class="form-label-left" autocomplete="off">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="category_id">{{ __('adminstaticword.SelectCategory') }}</label>
                                    <select name="category_id" id="category_id" class="form-control js-example-basic-single">
                                        @php
                                        $category = App\Categories::all();
                                        @endphp
                                        @foreach($category as $caat)
                                        <option {{ $cate->category_id == $caat->id ? 'selected' : "" }}
                                            value="{{ $caat->id }}">{{ $caat->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="upload_id">{{ __('adminstaticword.SelectSubCategory') }}</label>
                                    <select name="subcategory_id" id="upload_id" class="form-control js-example-basic-single">
                                        @php
                                        $subcategory = App\SubCategory::all();
                                        @endphp
                                        @foreach($subcategory as $caat)
                                        <option {{ $cate->subcategory_id == $caat->id ? 'selected' : "" }}
                                            value="{{ $caat->id }}">{{ $caat->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <div class="form-group">

                                </div>
                                <label for="title">{{ __('adminstaticword.Title') }}:<span class="redstar">*</span></label>
                                <input type="text" class="form-control" name="title" id="title" value="{{$cate->title}}">
                            </div>

                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="icon">{{ __('adminstaticword.Icon') }}:<span class="redstar">*</span></label>
                                    <input type="text" class="form-control icp-auto icp" name="icon" id="icon" value="{{$cate->icon}}">
                                </div>
                            </div>
                            
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>{{ __('adminstaticword.Status') }}:</label>
                                    <div class="toggler">
                                        <input class="tgl tgl-skewed" id="status" type="checkbox" name="status" {{ $cate->status == '1' ? 'checked' : '' }}>
                                        <label class="main-toggle toggle-lg {{ $cate->status == '1' ? 'on' : '' }}" for="status">
                                            <span data-on="{{ __('adminstaticword.Enable') }}" data-off="{{ __('adminstaticword.Disable') }}"></span>
                                        </label>
                                    </div>
                                    <input type="hidden" name="free" value="0" for="status" id="status">
                                </div>
                            </div>
                        </div>

                        <div class="box-footer">
                            <div class="row">
                                <div class="col-xs-9"></div>
                                <div class="col-xs-3">
                                    <button type="submit" class="btn btn-md col-xs-12 btn-primary">{{ __('adminstaticword.Save') }}</button>
                                </div>
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



@section('scripts')

<script>
    (function ($) {
        "use strict";

        $(function () {
            var urlLike = '{{ url('
            admin / dropdown ') }}';
            $('#category_id').change(function () {
                var up = $('#upload_id').empty();
                var cat_id = $(this).val();
                if (cat_id) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "GET",
                        url: urlLike,
                        data: {
                            catId: cat_id
                        },
                        success: function (data) {
                            console.log(data);
                            up.append('<option value="0">Please Choose</option>');
                            $.each(data, function (id, title) {
                                up.append($('<option>', {
                                    value: id,
                                    text: title
                                }));
                            });
                        },
                        error: function (XMLHttpRequest, textStatus, errorThrown) {
                            console.log(XMLHttpRequest);
                        }
                    });
                }
            });
        });

    })(jQuery);
</script>

@endsection