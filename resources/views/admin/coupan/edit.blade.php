@extends("admin/layouts.master")
@section('title', __('adminstaticword.Edit') . ' ' . __('adminstaticword.Coupon') . ' - ' . __('adminstaticword.Admin'))
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
                        {{ __('adminstaticword.Edit') }} {{ __('adminstaticword.Coupon') }}: {{ $coupan->code }}
                    </h3>
                </div>
                <form action="{{ route('coupon.update', $coupan->id) }}" method="POST">
                    @csrf
                    {{ method_field('PUT') }}

                    <div class="box-body">
                        <div class="row">

                            <div class="col-xs-12 col-md-6 form-group">
                                <label for="codefield">{{ __('adminstaticword.CouponCode') }}: <span class="redstar">*</span></label>
                                <input value="{{ $coupan->code }}" type="text" class="form-control" name="code" id="codefield">
                            </div>

                            <div class="col-xs-12 col-md-6 form-group">
                                <label for="distype">{{ __('adminstaticword.DiscountType') }}: <span class="redstar">*</span></label>
                                <select required="" name="distype" id="distype" class="form-control">
                                    <option {{ $coupan->distype == 'fix' ? 'selected' : '' }} value="fix">
                                        {{ __('adminstaticword.FixAmount') }}</option>
                                    <option {{ $coupan->distype == 'per' ? 'selected' : '' }} value="per">%
                                        {{ __('adminstaticword.Percentage') }}</option>
                                </select>
                            </div>
                            
                            <div class="col-xs-12 col-md-6 form-group">
                                <label for="amountfield">{{ __('adminstaticword.Amount') }}: <span class="redstar">*</span></label>
                                <input type="text" value="{{ $coupan->amount }}" class="form-control" name="amount" id="amountfield">

                            </div>
                            
                            <div class="col-xs-12 col-md-6 form-group">
                                <label for="link_by">{{ __('adminstaticword.Linkedto') }}: <span class="redstar">*</span></label>
                                <select required="" name="link_by" id="link_by"
                                    class="form-control js-example-basic-single">
                                    <option {{ $coupan->link_by == 'course' ? 'selected' : '' }} value="course">
                                        {{ __('adminstaticword.LinktoCourse') }}</option>
                                    <option {{ $coupan->link_by == 'cart' ? 'selected' : '' }} value="cart">
                                        {{ __('adminstaticword.LinktoCart') }}</option>
                                    <option {{ $coupan->link_by == 'category' ? 'selected' : '' }} value="category">
                                        {{ __('adminstaticword.LinktoCategory') }}</option>
                                    <option {{ $coupan->link_by == 'bundle' ? 'selected' : '' }} value="bundle">
                                        {{ __('adminstaticword.LinktoBundle') }}</option>
                                </select>
                            </div>

                            <div style="{{ $coupan->link_by == 'course' ? '' : 'display: none' }}" id="probox"
                                class="col-xs-12 col-md-6 form-group">
                                <label for="pro_id">{{ __('adminstaticword.SelectCourse') }}: <span class="redstar">*</span> </label>
                                <select id="pro_id" name="course_id" class="js-example-basic-single form-control">
                                    <option value="none" selected disabled hidden>
                                        {{ __('adminstaticword.SelectanOption') }}
                                    </option>
                                    @foreach (App\Course::where('status', '1')->get() as $product)
                                    @if ($product->type == 1)
                                    <option {{ $coupan->course_id == $product->id ? 'selected' : '' }}
                                        value="{{ $product->id }}">{{ $product['title'] }} -
                                        {{ $product->discount_price }}<i
                                            class="{{ $currency->icon }}">{{ $currency->currency }}</i>
                                    </option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>

                            <div style="{{ $coupan->link_by == 'bundle' ? '' : 'display: none' }}" id="bundlebox"
                                class="col-xs-12 col-md-6 form-group">
                                <label for="bundle_id">{{ __('adminstaticword.SelectBundle') }}: <span class="redstar">*</span> </label>
                                <select id="bundle_id" name="bundle_id" class="js-example-basic-single form-control">
                                    <option value="none" selected disabled hidden>
                                        {{ __('adminstaticword.SelectanOption') }}
                                    </option>
                                    @foreach (App\BundleCourse::where('status', '1')->get() as $product)
                                    @if ($product->type == 1)
                                    <option {{ $coupan->bundle_id == $product->id ? 'selected' : '' }}
                                        value="{{ $product->id }}">{{ $product['title'] }}
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

                            <div style="{{ $coupan->link_by == 'category' ? '' : 'display: none' }}" id="catbox"
                                class="col-xs-12 col-md-6 form-group">
                                <label for="cat_id">{{ __('adminstaticword.SelectCategories') }}: <span class="redstar">*</span>
                                </label>
                                <select style="width: 100%" id="cat_id" name="category_id"
                                    class="js-example-basic-single form-control">
                                    <option value="none" selected disabled hidden>
                                        {{ __('adminstaticword.SelectanOption') }}
                                    </option>
                                    @foreach (App\Categories::where('status', '1')->get() as $category)
                                    <option {{ $coupan->category_id == $category->id ? 'selected' : '' }}
                                        value="{{ $category->id }}">{{ $category['title'] }}

                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-xs-12 col-md-6 form-group">
                                <label for="maxusage">{{ __('adminstaticword.MaxUsageLimit') }}: <span class="redstar">*</span></label>
                                <input value="{{ $coupan->maxusage }}" type="number" min="1" class="form-control"
                                    name="maxusage" id="maxusage">
                            </div>

                            <div style="{{ $coupan->link_by == 'product' ? 'display:none' : '' }}" id="minAmount"
                                class="col-xs-12 col-md-6 form-group">
                                <label for="minamount">{{ __('adminstaticword.MinAmount') }}: </label>
                                <div class="input-group">
                                    @php
                                    $currency = App\Currency::first();
                                    @endphp
                                    <span class="input-group-addon"><i class="{{ $currency->icon }}"></i></span>
                                    <input value="{{ $coupan->minamount }}" type="number" min="0.0" value="0.00"
                                        step="0.1" class="form-control" name="minamount" id="minamount">
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-6 form-group">
                                <label for="expirydate">{{ __('adminstaticword.ExpiryDate') }}: </label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input value="{{ date('Y-m-d', strtotime($coupan->expirydate)) }}" id="expirydate"
                                        type="text" class="form-control" name="expirydate">
                                </div>
                            </div>

                            <div class="col-xs-12 col-md-6 form-group">
                                <label>{{ __('adminstaticword.CouponCodedisplayonfront') }}:</label>
                                <div class="toggler">
                                    <input name="show_to_users" id="frees" type="checkbox"
                                        {{ $coupan->show_to_users=="1" ? 'checked' : '' }} hidden>
                                    <label for="frees" class="main-toggle {{ $coupan->show_to_users=="1" ? 'on' : '' }}">
                                        <span data-on="{{ __('adminstaticword.Yes') }}" data-off="{{ __('adminstaticword.No') }}"></span>
                                    </label>
                                </div>

                                <small class="txt-desc">({{ __('adminstaticword.CouponCodeNote') }})</small>
                            </div>
                        </div>

                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-md btn-primary">
                            <i class="fa fa-save"></i> {{ __('adminstaticword.Update') }}
                        </button>
                </form>
                <a href="{{ route('coupon.index') }}" title="Cancel and go back"
                    class="btn btn-md btn-default btn-flat">
                    <i class="fa fa-reply"></i> {{ __('adminstaticword.Back') }}
                </a>
            </div>
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
                $('#catbox').hide();
                $('#bundlebox').hide();
                $('#pro_id').attr('required', 'required');
            } else if (opt == 'bundle') {
                $('#minAmount').hide();
                $('#probox').hide();
                $('#catbox').hide();
                $('#bundlebox').show();
                $('#bundle_id').attr('required', 'required');
            } else {
                $('#bundlebox').hide();
                $('#minAmount').show();
                $('#probox').hide();
                $('#catbox').show();
                $('#pro_id').removeAttr('required');
            }
        });

        $('#link_by').on('change', function () {
            var opt = $(this).val();

            if (opt == 'category') {
                $('#catbox').show();
                $('#probox').hide();
                $('#bundlebox').hide();
                $('#cat_id').attr('required', 'required');
            } else {
                $('#catbox').hide();
                $('#probox').show();
                $('#cat_id').removeAttr('required');
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