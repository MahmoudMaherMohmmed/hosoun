@extends('admin.layouts.master')
@section('title', __('adminstaticword.Edit') . ' ' . __('adminstaticword.InstructorPlan') . ' - ' . __('adminstaticword.Admin'))
@section('body')


<section class="content">
    @include('admin.message')
    <div class="row">
        <!-- left column -->
        <div class="col-xs-12">
            <div class="box box-primary">
                <!-- general form elements -->
                <div class="box-header with-border">
                    <h3 class="box-title"> {{ __('adminstaticword.Edit') }} {{ __('adminstaticword.InstructorPlan') }}</h3>
                    <a href="{{url('subscription/plan')}}" data-toggle="tooltip"
                        data-original-title="Go back" class="btn-floating">
                        <i class="material-icons">
                            <button class="btn btn-xs btn-success abc">
                                {{ __('adminstaticword.Back') }}
                            </button>
                        </i>
                    </a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <form action="{{ url('subscription/plan', $plans->id) }}" method="post"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="title">{{ __('adminstaticword.Title') }}:<sup
                                                class="redstar">*</sup></label>
                                        <input type="text" class="form-control" name="title" id="title"
                                            value="{{ $plans->title }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="editBundleEditor">{{ __('adminstaticword.Detail') }}:<sup
                                                class="redstar">*</sup></label>
                                        <textarea id="editBundleEditor" name="detail" rows="3" class="form-control"
                                            required>{!!  $plans->detail !!}</textarea>
                                    </div>
                                </div>
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-xs-12">
                                    <label>{{ __('adminstaticword.Free') }}:</label>
                                    <div class="toggler">
                                        <input name="type" id="cb111" type="checkbox" {{ $plans->type == '1' ? 'checked' : '' }} hidden/>
                                        <label for="cb111" class="main-toggle toggle-lg {{ $plans->type == '1' ? 'on' : '' }}">
                                            <span data-on="{{ __('adminstaticword.Paid') }}" data-off="{{ __('adminstaticword.Free') }}"></span>
                                        </label>
                                    </div>

                                    <div @if ($plans->price == '' && $plans->price == '') class="display-none" @endif id="doabox">
                                        <div class="form-group">
                                            <label for="priceMain">{{ __('adminstaticword.Price') }}: <sup
                                                    class="redstar">*</sup></label>
                                            <input type="number" min="1" class="form-control" name="price"
                                                id="priceMain"
                                                placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.Price') }}"
                                                value="{{ $plans->price }}">
                                        </div>
                                    </div>

                                    <div @if ($plans->price == '' && $plans->discount_price == '') class="display-none" @endif id="doaboxx">
                                        <div class="form-group">
                                            <label for="offerPrice">{{ __('adminstaticword.DiscountPrice') }}: <sup
                                                    class="redstar">*</sup></label>
                                            <input type="number" min="1" class="form-control" name="discount_price"
                                                id="offerPrice"
                                                placeholder="{{ __('adminstaticword.Enter') }} {{ __('adminstaticword.DiscountPrice') }}"
                                                value="{{ $plans->discount_price }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-md-6">
                                    @if (Auth::User()->role == 'admin')
                                    <label>{{ __('adminstaticword.Status') }}:</label>
                                    <div class="toggler">
                                        <input hidden id="cb333" type="checkbox" {{ $plans->status == 1 ? 'checked' : '' }} />
                                        <label class="main-toggle toggle-lg {{ $plans->status == 1 ? 'on' : '' }}" for="cb333">
                                            <span data-on="{{ __('adminstaticword.Active') }}" data-off="{{ __('adminstaticword.Deactive') }}"></span>
                                        </label>
                                    </div>
                                    <input type="hidden" name="status" value="{{ $plans->status }}" id="c33">
                                    @endif
                                </div>

                                <div class="col-xs-12 col-md-6">
                                    <div class="form-group">
                                        <label for="image">{{ __('adminstaticword.PreviewImage') }}:</label>
                                        <div>
                                            <input type="file" name="preview_image" id="image" class="inputfile inputfile-1" />
                                            <label for="image"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="7"
                                                    viewBox="0 0 20 17">
                                                    <path
                                                        d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
                                                </svg> <span>{{ __('adminstaticword.Chooseafile') }}&hellip;</span>
                                            </label>
                                        </div>
                                        @if ($plans['preview_image'] !== null && $plans['preview_image'] !== '')
                                        <img src="{{ url('/images/plan/' . $plans->preview_image) }}" height="70px;"
                                            width="70px;" />
                                        @else
                                        <img src="{{ Avatar::create($plans->title)->toBase64() }}" alt="course"
                                            class="img-fluid">
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>{{ __('adminstaticword.Duration') }}: </label>
                                        <div class="toggler">
                                            <input id="duration_type" type="checkbox" name="duration_type" {{ $plans->duration_type == "m" ? 'checked' : '' }} hidden>
                                            <label for="duration_type" class="main-toggle toggle-lg {{ $plans->duration_type == "m" ? 'on' : '' }}">
                                                <span data-on="{{ __('adminstaticword.Month') }}" data-off="{{ __('adminstaticword.Days') }}"></span>
                                            </label>
                                        </div>
    
                                        <div class="form-group">
                                            <label for="duration">{{ __('adminstaticword.PlanExpireDuration') }}</label>
                                            <input min="1" class="form-control" name="duration" type="number" id="duration"
                                                value="{{ $plans->duration }}" placeholder="Enter Duration in months">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Stripe Subscription-->
                            <div class="row">
                                <div class="col-xs-12">
                                    <label for="courses_allowed">{{ __('adminstaticword.numberCoursesAllowed') }}:</label>
                                    <input min="1" class="form-control" name="courses_allowed" type="number"
                                        id="courses_allowed" placeholder="" value="{{ $plans->courses_allowed }}">

                                </div>

                            </div><br>
                            <!--Stripe Subscription-->
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
            CKEDITOR.replace('editBundleEditor');
        });

        $(function () {
            $('.js-example-basic-single').select2();
        });

        $(function () {
            $('#cb1').change(function () {
                $('#f').val(+$(this).prop('checked'))
            })
        })

        $(function () {
            $('#cb3').change(function () {
                $('#test').val(+$(this).prop('checked'))
            })
        })

        $(function () {

            $('#murl').change(function () {
                if ($('#murl').val() == 'yes') {
                    $('#doab').show();
                } else {
                    $('#doab').hide();
                }
            });

        });

        $(function () {

            $('#murll').change(function () {
                if ($('#murll').val() == 'yes') {
                    $('#doabb').show();
                } else {
                    $('#doab').hide();
                }
            });

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

    })(jQuery);
</script>

@endsection