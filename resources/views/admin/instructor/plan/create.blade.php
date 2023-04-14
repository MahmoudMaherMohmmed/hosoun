@extends('admin/layouts.master')
@section('title', __('adminstaticword.Add') . ' ' . __('adminstaticword.InstructorPlan') . ' - ' . __('adminstaticword.Admin'))
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
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <div class="row">
                        <div class="col-xs-10">
                            <h3 class="box-title"> {{ __('adminstaticword.Add') }}
                                {{ __('adminstaticword.InstructorPlan') }}</h3>
                        </div>
                        <div class="col-xs-2">
                            <h4 class="admin-form-text">
                                <a href="{{url('subscription/plan')}}" data-toggle="tooltip"
                                    data-original-title="Go back" class="btn-floating">
                                    <i class="material-icons">
                                        <button class="btn btn-xs btn-success abc">
                                            {{ __('adminstaticword.Back') }}
                                        </button>
                                    </i>
                                </a>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <form action="{{action('InstructorPlanController@store')}}" method="post"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <input type="hidden" class="form-control" name="user_id" id="exampleInputTitle"
                                value="{{ Auth::User()->id }}" required>

                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="title">{{ __('adminstaticword.Title') }}:
                                            <sup class="redstar">*</sup></label>
                                        <input type="title" class="form-control" name="title" id="title"
                                            placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.Title') }}"
                                            value="" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="createBundleEditor">{{ __('adminstaticword.Detail') }}:
                                            <sup class="redstar">*</sup></label>
                                        <textarea id="createBundleEditor" name="detail" rows="5" class="form-control"
                                            placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.Detail') }}"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label>{{ __('adminstaticword.Free') }}:</label>
                                        <div class="toggler">
                                            <input name="type" id="cb111" type="checkbox" hidden/>
                                            <label for="cb111" class="main-toggle toggle-lg">
                                                <span data-on="{{ __('adminstaticword.Paid') }}" data-off="{{ __('adminstaticword.Free') }}"></span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="display-none row" id="pricebox">
                                        <div class="col-xs-12 col-md-6 form-group">
                                            <label for="priceMain">
                                                {{ __('adminstaticword.Price') }}:<sup class="redstar">*</sup>
                                            </label>
                                            <input type="text" class="form-control" name="price" id="priceMain"
                                                placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.Price') }}"
                                                value="">
                                        </div>
                                        <div class="col-xs-12 col-md-6 form-group">
                                            <label for="offerPrice">{{ __('adminstaticword.DiscountPrice') }}:</label>
                                            <input type="text" class="form-control" name="discount_price"
                                                id="offerPrice"
                                                placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.DiscountPrice') }}"
                                                value="">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-md-6">
                                    <div class="form-group">
                                        @if(Auth::User()->role == "admin")
                                        <label>{{ __('adminstaticword.Status') }}:</label>
                                        <div class="toggler">
                                            <input hidden id="cb3" type="checkbox" />
                                            <label class="main-toggle toggle-lg" for="cb3">
                                                <span data-on="{{ __('adminstaticword.Active') }}" data-off="{{ __('adminstaticword.Deactive') }}"></span>
                                            </label>
                                        </div>
                                        <input type="hidden" name="status" value="0" id="test">
                                        @endif
                                    </div>
                                </div>

                                <br />

                                <div class="col-xs-12 col-md-6">
                                    <div class="form-group">
                                        <label for="image">{{ __('adminstaticword.PreviewImage') }}:</label>
                                        - <p class="inline info">size: 250x150</p>
                                        <div>
                                            <input type="file" name="preview_image" id="image"
                                                class="inputfile inputfile-1" />
                                            <label for="image"><svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                    height="17" viewBox="0 0 20 17">
                                                    <path
                                                        d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
                                                </svg>
                                                <span>{{ __('adminstaticword.Chooseafile') }}&hellip;</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label>{{ __('adminstaticword.Duration') }}:</label>
                                        <div class="toggler">
                                            <input id="duration_type" type="checkbox" name="duration_type" hidden>
                                            <label for="duration_type" class="main-toggle toggle-lg">
                                                <span data-on="{{ __('adminstaticword.Month') }}" data-off="{{ __('adminstaticword.Days') }}"></span>
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label for="duration">{{ __('adminstaticword.PlanExpireDuration') }}</label>
                                            <input min="1" class="form-control" name="duration" type="number" id="duration"
                                                placeholder="Enter Duration in months" value="{{ (old('duration')) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="courses_allowed">{{ __('adminstaticword.numberCoursesAllowed') }}:</label>
                                        <input min="1" class="form-control" name="courses_allowed" type="number"
                                            id="courses_allowed" placeholder="" value="{{ (old('courses_allowed')) }}">
                                    </div>
                                </div>
                            </div>


                            <div class="box-footer">
                                <div class="row">
                                    <div class="col-xs-8"></div>
                                    <button type="submit"
                                        class="btn btn-lg col-xs-4 btn-primary">{{ __('adminstaticword.Save') }}</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.box -->
        </div>
    </div>
    <!-- /.row -->
</section>

@endsection

@section('scripts')


<script>
    (function ($) {
        "use strict";

        $(function () {
            CKEDITOR.replace('createBundleEditor');
        });

        $(function () {
            $('.js-example-basic-single').select2();
        });

        $(function () {
            $('#cb1').change(function () {
                $('#j').val(+$(this).prop('checked'))
            })
        })

        $(function () {
            $('#cb3').change(function () {
                $('#test').val(+$(this).prop('checked'))
            })
        })

        $('#cb111').on('change', function () {

            if ($('#cb111').is(':checked')) {
                $('#pricebox').show('fast');

                $('#priceMain').prop('required', 'required');

            } else {
                $('#pricebox').hide('fast');

                $('#priceMain').removeAttr('required');
            }

        });

        $('#preview').on('change', function () {

            if ($('#preview').is(':checked')) {
                $('#document1').show('fast');
                $('#document2').hide('fast');
            } else {
                $('#document2').show('fast');
                $('#document1').hide('fast');
            }

        });

        $("#cb3").on('change', function () {
            if ($(this).is(':checked')) {
                $(this).attr('value', '1');
            } else {
                $(this).attr('value', '0');
            }
        });

        $(function () {

            $('#ms').change(function () {
                if ($('#ms').val() == 'yes') {
                    $('#doabox').show();
                } else {
                    $('#doabox').hide();
                }
            });

        });

        $(function () {

            $('#ms').change(function () {
                if ($('#ms').val() == 'yes') {
                    $('#doaboxx').show();
                } else {
                    $('#doaboxx').hide();
                }
            });

        });

        $(function () {

            $('#msd').change(function () {
                if ($('#msd').val() == 'yes') {
                    $('#doa').show();
                } else {
                    $('#doa').hide();
                }
            });

        });


    })(jQuery);
</script>

@endsection