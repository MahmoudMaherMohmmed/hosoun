@extends("admin/layouts.master")
@section('title', __('adminstaticword.Add') . ' ' . __('adminstaticword.Coupon') . ' - ' . __('adminstaticword.Admin'))

@section('body')
@php
$currency = App\Currency::first();
@endphp
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">

                <div class="box-header with-border">
                    <h3 class="box-title">
                        {{ __('adminstaticword.Add') }} {{ __('adminstaticword.Coupon') }}
                    </h3>
                </div>
                <form action="{{ route('coupon.store') }}" method="POST">
                    @csrf
                    <div class="box-body">
                        <div class="row">
                            
                            <div class="col-xs-12 col-md-6 form-group">
                                <label for="codefield">{{ __('adminstaticword.CouponCode') }}: <span class="redstar">*</span></label>
                                <input required="" type="text" class="form-control" name="code" id="codefield">
                            </div>

                            <div class="col-xs-12 col-md-6 form-group">
                                <label for="distype">{{ __('adminstaticword.DiscountType') }}: <span class="redstar">*</span></label>
                                <select required="" name="distype" id="distype" class="form-control">
                                    <option value="fix">{{ __('adminstaticword.FixAmount') }}</option>
                                    <option value="per">% {{ __('adminstaticword.Percentage') }}</option>
                                </select>
                            </div>

                            <div class="col-xs-12 col-md-6 form-group">
                                <label for="amountfield">{{ __('adminstaticword.Amount') }}: <span class="redstar">*</span></label>
                                <input required="" type="text" class="form-control" name="amount" id="amountfield">
                            </div>
                            
                            <div class="col-xs-12 col-md-6 form-group">
                                <label for="link_by">{{ __('adminstaticword.Linkedto') }}: <span class="redstar">*</span></label>
                                <select required="" name="link_by" id="link_by" class="form-control js-example-basic-single">
                                    <option value="none" selected disabled hidden>
                                        {{ __('adminstaticword.SelectanOption') }}
                                    </option>
                                    <option value="course">{{ __('adminstaticword.LinktoCourse') }}</option>
                                    <option value="cart">{{ __('adminstaticword.LinktoCart') }}</option>
                                    <option value="category">{{ __('adminstaticword.LinktoCategory') }}</option>
                                    <option value="bundle">{{ __('adminstaticword.LinktoBundle') }}</option>
                                </select>
                            </div>
                            
                            <div id="probox" class="col-xs-12 col-md-6 form-group display-none">
                                <label for="pro_id">{{ __('adminstaticword.SelectCourse') }}: <span class="redstar">*</span> </label>
                                <select style="width: 100%" id="pro_id" name="course_id"
                                    class="js-example-basic-single form-control">
                                    <option value="none" selected disabled hidden>
                                        {{ __('adminstaticword.SelectanOption') }}
                                    </option>
                                    @foreach (App\Course::where('status', '1')->get() as $product)
                                    @if ($product->type == 1)
    
                                    <option value="{{ $product->id }}">{{ $product['title'] }}
                                        - {{ $product->discount_price }}<i
                                            class="{{ $currency->icon }}">{{ $currency->currency }}</i>
                                    </option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            
                            <div id="bundlebox" class="col-xs-12 col-md-6 form-group display-none">
                                <label for="bundle_id">{{ __('adminstaticword.SelectBundle') }}: <span class="redstar">*</span> </label>
                                <select style="width: 100%" id="bundle_id" name="bundle_id"
                                    class="js-example-basic-single form-control">
                                    <option value="none" selected disabled hidden>
                                        {{ __('adminstaticword.SelectanOption') }}
                                    </option>
                                    @foreach (App\BundleCourse::where('status', '1')->get()->sortByDesc('updated_at') as
                                    $product)
                                    @if ($product->type == 1)
                                    <option value="{{ $product->id }}">{{ $product['title'] }}
                                        @isset($product->billing_interval)
                                        - {{ $product->discount_price }} <i
                                            class="{{ $currency->icon }}">{{ $currency->currency }}</i> /
                                        {{ $product->billing_interval }}
                                        @endisset()
                                    </option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            
                            <div id="catbox" class="col-xs-12 col-md-6 form-group display-none">
                                <label for="cat_id">{{ __('adminstaticword.SelectCategories') }}: <span class="required">*</span>
                                </label>
                                <select style="width: 100%" id="cat_id" name="category_id"
                                    class="js-example-basic-single form-control">
                                    <option value="none" selected disabled hidden>
                                        {{ __('adminstaticword.SelectanOption') }}
                                    </option>
                                    @foreach (App\Categories::where('status', '1')->get() as $category)
                                    <option value="{{ $category->id }}">{{ $category['title'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="col-xs-12 col-md-6 form-group">
                                <label for="maxusage">{{ __('adminstaticword.MaxUsageLimit') }}: <span class="redstar">*</span></label>
                                <input required="" type="number" min="1" class="form-control" name="maxusage" id="maxusage">
                            </div>

                            <div id="minAmount" class="col-xs-12 col-md-6 form-group">
                                <label for="minamount">{{ __('adminstaticword.MinAmount') }}: </label>
                                <div class="input-group">
                                    @php
                                    $currency = App\Currency::first();
                                    @endphp
                                    <span class="input-group-addon"><i class="{{ $currency->icon }}"></i></span>
                                    <input type="number" min="0.0" value="0.00" step="0.1" class="form-control"
                                        name="minamount" id="minamount">
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-6 form-group">
                                <label for="expirydate">{{ __('adminstaticword.ExpiryDate') }}: </label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input required="" id="expirydate" type="text" class="form-control" name="expirydate">
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-6 form-group">
                                <label>{{ __('adminstaticword.CouponCodedisplayonfront') }}:</label>
                                <div class="toggler">
                                    <input {{ old('show_to_users') == "0" ? '' : "checked" }} name="show_to_users" id="frees" type="checkbox" hidden>
                                    <label for="frees" class="main-toggle {{ old('show_to_users') == "0" ? '' : "on" }}">
                                        <span data-on="{{ __('adminstaticword.Yes') }}" data-off="{{ __('adminstaticword.No') }}"></span>
                                    </label>
                                </div>
                                <small class="txt-desc">({{ __('adminstaticword.CouponCodeNote') }}) </small>
                            </div>

                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-md btn-primary">
                            <i class="fa fa-plus-circle"></i> {{ __('adminstaticword.Save') }}
                        </button>
                </form>
                <a href="{{ route('coupon.index') }}" title="Cancel and go back"
                    class="btn btn-md btn-default btn-flat">
                    <i class="fa fa-reply"></i> {{ __('adminstaticword.Back') }}
                </a>
            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script>
    (function ($) {
        "use strict";

        $('#link_by').on('change', function () {
            var opt = $(this).val();

            if (opt == 'course') {
                $('#minAmount').hide();
                $('#probox').show();
                $('#bundlebox').hide();
                $('#pro_id').attr('required', 'required');
            } else if (opt === 'bundle') {
                $('#minAmount').hide();
                $('#probox').hide();
                $('#bundlebox').show();
                $('#bundle_id').attr('required', 'required');
            } else {
                $('#minAmount').show();
                $('#probox').hide();
                $('#bundlebox').hide();
                $('#pro_id').removeAttr('required');
            }
        });

        $('#link_by').on('change', function () {
            var opt = $(this).val();

            if (opt == 'category') {
                $('#catbox').show();
                $('#pro_id').attr('required', 'required');
            } else {
                $('#catbox').hide();
                $('#pro_id').removeAttr('required');
            }
        });

        $(function () {
            $("#expirydate").datepicker({
                dateFormat: 'yy-m-d'
            });
        });

    })(jQuery);
</script>

@endsection