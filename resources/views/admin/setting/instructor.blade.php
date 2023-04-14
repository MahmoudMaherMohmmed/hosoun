@extends('admin.layouts.master')
@section('title', __('adminstaticword.InstructorSettings') . ' - ' . __('adminstaticword.Admin'))
@section('body')

<section class="content">
    @include('admin.message')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('adminstaticword.InstructorSettings') }}</h3>
                </div>
                <div class="panel-body">
                    <form action="{{ route('instructor.update') }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('POST') }}

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="revenue">{{ __('adminstaticword.InstructorRevenue') }}:</label>
                                    <div class="input-group">
                                        <input min="1" max="100" class="form-control" name="instructor_revenue"
                                            type="number" value="{{ optional($setting)->instructor_revenue }}"
                                            id="revenue" placeholder="Enter revenue percentage"
                                            class="{{ $errors->has('instructor_revenue') ? ' is-invalid' : '' }} form-control">
                                        <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="admin_revenue">{{ __('adminstaticword.AdminRevenue') }}:</label>
                                    <div class="input-group">
                                        <input min="1" max="100" class="form-control" name="admin_revenue" type="number"
                                            value="{{ 100 - optional($setting)->instructor_revenue }}" id="admin_revenue"
                                            placeholder="Enter revenue percentage"
                                            class="{{ $errors->has('admin_revenue') ? ' is-invalid' : '' }} form-control"
                                            readonly>
                                        <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-md-4">
                                <label>{{ __('adminstaticword.PaytmEnable') }}: </label>
                                <div class="toggler">
                                    <input hidden id="paytm" type="checkbox" name="paytm_enable"
                                        {{ optional($setting)['paytm_enable'] == '1' ? 'checked' : '' }}>
                                    <label class="main-toggle toggle-lg" for="paytm">
                                        <span data-on="{{ __('adminstaticword.Enable') }}" data-off="{{ __('adminstaticword.Disable') }}"></span>
                                    </label>
                                </div>
                                <input type="hidden" name="free" value="0" for="paytm" id="paytm">
                            </div>

                            <div class="col-xs-12 col-md-4">
                                <label>{{ __('adminstaticword.PaypalEnable') }}: </label>
                                <div class="toggler">
                                    <input hidden id="paypal" type="checkbox" name="paypal_enable"
                                        {{ optional($setting)['paypal_enable'] == '1' ? 'checked' : '' }}>
                                    <label class="main-toggle toggle-lg" for="paypal">
                                        <span data-on="{{ __('adminstaticword.Enable') }}" data-off="{{ __('adminstaticword.Disable') }}"></span>
                                    </label>
                                </div>
                                <input type="hidden" name="free" value="0" for="paypal" id="paypal">
                            </div>

                            <div class="col-xs-12 col-md-4">
                                <label>{{ __('adminstaticword.BankTransferEnable') }}: </label>
                                <div class="toggler">
                                    <input hidden id="bank" type="checkbox" name="bank_enable"
                                        {{ optional($setting)['bank_enable'] == '1' ? 'checked' : '' }}>
                                    <label
                                        class="main-toggle toggle-lg {{ optional($setting)['bank_enable'] == '1' ? 'on' : '' }}"
                                        for="bank">
                                        <span data-on="{{ __('adminstaticword.Enable') }}" data-off="{{ __('adminstaticword.Disable') }}"></span>
                                    </label>
                                </div>
                                <input type="hidden" name="free" value="0" for="bank" id="bank">
                            </div>
                        </div>


                        <div class="box-footer">
                            <div class="row">
                                <div class="col-xs-8 col-md-9"></div>
                                <button value="" type="submit"
                                    class="btn btn-md col-xs-4 col-md-3 btn-primary">{{ __('adminstaticword.Save') }}</button>
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



</script>

@endsection