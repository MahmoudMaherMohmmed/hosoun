@extends('admin/layouts.master')
@section('title', __('adminstaticword.PayToFeature') . ' - ' . __('adminstaticword.Instructor'))
@section('body')


<section class="content">
    @include('admin.message')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('frontstaticword.PayToFeature') }}</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">


                        <div class="row">
                            <div class="col-xs-12 col-md-5">


                                <strong>{{ __('frontstaticword.Course') }}:</strong>
                                <br>
                                <br>
                                @if($course['preview_image'] !== NULL && $course['preview_image'] !== '')
                                <img src="images/course/<?php echo $course['preview_image'];  ?>"
                                    class="img-responsive">
                                @else
                                <img src="{{ Avatar::create($course->title)->toBase64() }}" class="img-responsive">
                                @endif
                                <br>

                                {{ $course->title }}
                                <br>
                                <br>

                                @php
                                $currency = App\Currency::first();
                                @endphp

                                <label for="total_amount">{{ __('frontstaticword.AmountFeatureCourse') }}:</sup></label>&nbsp;
                                <b><i class="{{ $currency->icon }}"></i>&nbsp;{{ $gsetting->feature_amount }}</b>

                            </div>

                            <div class="col-xs-12 col-md-7">
                                <div class="box">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">{{ __('frontstaticword.PayWithPaytm') }}</h3>
                                        <div class="box-tools pull-right">
                                            <!-- Collapse Button -->
                                            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <!-- /.box-tools -->
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <form method="post" action="{{ url('/paywithpaytm') }}" accept-charset="UTF-8"
                                            class="form-horizontal" role="form">
                                            @csrf

                                            <input type="hidden" name="user_id" value="{{Auth::User()->id}}" />

                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <div class="form-group">
                                                        <label for="name"><strong>{{ __('frontstaticword.Name') }}</strong></label>
                                                        <input id="name" type="text" name="name" class="form-control"
                                                            value="{{Auth::User()->fname}}" required>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12">
                                                    <div class="form-group">
                                                        <label for="mobile"><strong>{{ __('frontstaticword.Mobile') }}</strong></label>
                                                        <input id="mobile" type="text" name="mobile" class="form-control"
                                                            placeholder="Enter Mobile Number"
                                                            value="{{Auth::User()->mobile}}" required autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12">
                                                    <div class="form-group">
                                                        <label for="email"><strong>{{ __('frontstaticword.Email') }} {{ __('frontstaticword.ID') }}</strong></label>
                                                        <input id="email" type="email" name="email" class="form-control"
                                                            value="{{Auth::User()->email}}" placeholder="Enter Email id"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12">
                                                    <div class="form-group">
                                                        <label for="amount"><strong>{{ __('frontstaticword.AmountFeatureCourse') }}</strong></label>
                                                        <input id="amount" type="text" name="amount" class="form-control" placeholder=""
                                                            value="{{ $payment->total_amount }}" readonly="">
                                                    </div>
                                                </div>

                                                <div class="col-xs-12">
                                                    <button class="btn btn-primary" title="checkout" type="submit">{{ __('frontstaticword.PayWithPaytm') }}</button>
                                                </div>
                                            </div>

                                        </form>
                                    </div>

                                </div>
                                <!-- /.box -->

                                <div class="box">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">{{ __('frontstaticword.PayWithPaypal') }}</h3>
                                        <div class="box-tools pull-right">
                                            <!-- Collapse Button -->
                                            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <!-- /.box-tools -->
                                    </div>

                                    @php
                                    $secureamount = Crypt::encrypt($payment->total_amount);
                                    @endphp
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <form action="{{ route('featuredWithpaypal') }}" method="POST"
                                            autocomplete="off">
                                            @csrf

                                            <input type="hidden" name="amount" value="{{ $secureamount  }}" />
                                            {{-- <input type="hidden" name="course_id" value="{{ $cart->courses->id }}"/>
                                            --}}
                                            <button class="btn btn-primary" title="checkout"
                                                type="submit">{{ __('frontstaticword.Proceed') }}</button>
                                        </form>
                                    </div>
                                    <!-- /.box-body -->

                                </div>
                                <!-- /.box -->
                            </div>
                        </div>

                    </div>
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


@section('script')

<script src="{{ url('js/jquery.payform.min.js')}}" charset="utf-8"></script>
<script src="{{ url('js/script.js') }}"></script>

<script src="{{ url('js/jquery.min.js') }}"></script>
@endsection