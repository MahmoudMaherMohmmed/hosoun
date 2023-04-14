@extends('admin.layouts.master')
@section('title', __('adminstaticword.Currency') . ' - ' . __('adminstaticword.Admin'))
@section('body')

<section class="content">
    @include('admin.message')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('adminstaticword.Currency') }}</h3>
                </div>
                <div class="panel-body">
                    <form action="{{ action('CurrencyController@update') }}" method="POST"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <label for="icon">{{ __('adminstaticword.Icon') }}<sup
                                        class="redstar">*</sup></label>
                                <input id="icon" value="{{ $show['icon'] }}" name="icon" type="text"
                                    class="form-control icp-auto icp"
                                    placeholder="{{ __('adminstaticword.Select') }} {{ __('adminstaticword.Icon') }}"
                                    autocomplete="off" />

                            </div>

                            <div class="col-xs-12 col-md-6">
                                <label for="currency">{{ __('adminstaticword.Currency') }}<sup
                                        class="redstar">*</sup></label>
                                <input id="currency" value="{{ $show['currency'] }}" name="currency" type="text"
                                    class="form-control" placeholder="Ex:INR" autocomplete="off" />
                            </div>
                        </div>
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-xs-8 col-sm-9 col-md-10"></div>
                                <button value="" type="submit"
                                    class="btn btn-md col-xs-4 col-sm-3 col-md-2 btn-primary">{{ __('adminstaticword.Save') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@section('script')

<script>
    (function ($) {
        "use strict";
        $('.icp-auto').iconpicker({

            icons: ['fa fa-inr', 'fa fa-bitcoin', 'fa fa-btc', 'fa fa-cny', 'fa fa-dollar', 'fa fa-eur',
                'fa fa-ngn', 'fa fa-cedi', 'fa fa-rial', 'fa fa-dinar', 'fa fa-tugrik',
                'fa fa-brazilian-real', 'fa fa-idr', 'fa fa-shillings', 'fa-gg-circle', 'fa fa-gg',
                'fa fa-rub', 'fa fa-ils', 'fa fa-try', 'fa fa-krw', 'fa fa-gbp', 'fa fa-zar',
                'fa fa-rs', 'fa fa-pula', 'fa fa-aud', 'fa fa-egy', 'fa fa-taka', 'fa fa-mal',
                'fa fa-rub', 'fa fa-brl', 'fa fa-zwl', 'fa fa-ngr', 'fa fa-eutho', 'fa fa-sgd',
                'fa fa-lkr', 'fa fa-mad', 'fa fa-thai', 'fa fa-jod', 'fa fa-tsh', 'fa fa-da',
                'fa fa-dzd', 'fa fa-rwf'
            ],


            selectedCustomClass: 'label label-success',
            selectedCustomClass: 'label label-success',
            mustAccept: true,
            hideOnSelect: true,
        });
    })(jQuery);
</script>

@endsection