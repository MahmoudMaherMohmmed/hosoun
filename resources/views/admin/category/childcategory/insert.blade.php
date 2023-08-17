@extends('admin/layouts.master')
@section('title', __('adminstaticword.AddChildCategory'))
@section('body')

<section class="content">
    @include('admin.message')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('adminstaticword.AddChildCategory') }}</h3>
                    <a href="{{url('childcategory')}}" class="btn btn-success pull-right owtbtn">
                        {{ __('adminstaticword.Back') }}
                    </a>
                </div>
                <div class="box-body">
                    <form id="demo-form2" method="post" action="{{url('childcategory/')}}" data-parsley-validate
                        class="form-label-left" autocomplete="off">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-xs-12 col-md-5">
                                <div class="form-group">
                                    <label for="category_id">{{ __('adminstaticword.Category') }}</label>
                                    <select name="category_id" id="category_id" class="form-control js-example-basic-single">
                                        <option value="0">{{ __('adminstaticword.PleaseSelect') }}</option>
                                        @foreach($category as $cat)
                                        <option value="{{$cat->id}}">{{$cat->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-4">
                                <div class="form-group">
                                    <label for="upload_id">{{ __('adminstaticword.SubCategory') }}</label>
                                    <select name="subcategories" id="upload_id" class="form-control js-example-basic-single">
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-3" style="align-self: flex-end">
                                <div class="form-group">
                                    {{-- <label for="exampleInputTit1e">{{ __('adminstaticword.SubCategory') }}</label> --}}
                                    <button type="button" data-dismiss="modal" data-toggle="modal" data-target="#myModal7" title="AddCategory" class="btn btn-md btn-primary">
                                        <i class='bx bx-window-open me' ></i> {{ __('adminstaticword.AddSubCategory') }}
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                    <label for="title">{{ __('adminstaticword.Title') }}:<sup class="redstar">*</sup></label>
                                    <input type="text" class="form-control" name="title" id="title" placeholder="" value="">
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-6">
                                <div class="form-group">
                                    <label for="icon">{{ __('adminstaticword.Icon') }}:<sup class="redstar">*</sup></label>
                                    <input type="text" class="form-control icp-auto icp" name="icon" id="icon" placeholder="{{ __('adminstaticword.ChooseIcon') }}" value="">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 ">
                                <label>{{ __('adminstaticword.Status') }}:</label>
                                <div class="toggler">
                                    <input hidden id="status" type="checkbox" name="status">
                                    <label class="main-toggle toggle-lg" for="status">
                                        <span data-on="{{ __('adminstaticword.Enable') }}" data-off="{{ __('adminstaticword.Disable') }}"></span>
                                    </label>
                                </div>
                                <input type="hidden" name="free" value="0" for="status" id="status">
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
    @include('admin.category.childcategory.child')
</section>



@endsection



@section('scripts')

<script>
    (function ($) {
        "use strict";

        $(function () {
            var urlLike = '{{ url("admin/dropdown") }}';
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