@extends('front.layouts.master')
@section('css')
@endsection
@section('title')
    {{ __('frontstaticword.Checkout') }}
@endsection

@section('custom-css')
  <!-- Moyasar Styles -->
  <link rel="stylesheet" href="https://cdn.moyasar.com/mpf/1.7.3/moyasar.css">
@endsection

@section('content')
  @include('front.layouts.page_header', ['title' => __('frontstaticword.Checkout')])
  <section class="block-sec">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <div class="checkout-card brief">
            <div class="head">
                @if (count($carts) > 0)
                    @foreach($carts as $cart)
                        @include('front.cart.card')
                    @endforeach
                @endif
            </div>
            <h5 class="title fs-3 border-bottom-0 pb-0">{{ __('frontstaticword.Total') }}</h5>
            <div class="content">
              <ul class="border-bottom">
                @if($gsetting['currency_swipe'] == 1)
                    <li class="d-flex align-items-center">
                        {{ __('frontstaticword.TotalPrice') }}
                        <span class="fw-bold ms-auto"><i class="{{ $currency->icon }}"></i>{{ $price_total }}</span>
                    </li>
                @else
                    <li class="d-flex align-items-center">
                        {{ __('frontstaticword.TotalPrice') }}
                        <span class="fw-bold ms-auto"> {{ $price_total }}<i class="{{ $currency->icon }}"></i></span>
                    </li>
                @endif
                <li class="d-flex align-items-center">
                    {{ __('frontstaticword.DiscountPercent') }}
                  <span class="fw-bold ms-auto">{{ round($offer_percent, 0) }}%</span>
                </li>
              </ul>
              @if($gsetting['currency_swipe'] == 1)
                <div class="d-flex align-items-center fw-bold mt-4 pt-3">
                    {{ __('frontstaticword.TotalPrice') }}
                    <span class="text-accent ms-auto"><i class="{{ $currency->icon }}"></i>{{ $cart_total }}</span>
                </div>
              @else
                <div class="d-flex align-items-center fw-bold mt-4 pt-3">
                    {{ __('frontstaticword.TotalPrice') }}
                    <span class="text-accent ms-auto">{{ $cart_total }}<i class="{{ $currency->icon }}"></i></span>
                </div>
              @endif
            </div>
          </div>
        </div>
        <div class="col-lg-7 mt-5 mt-lg-0">
          <h2 class="fs-2">اختر طريقة الدفع المناسبة لك</h2>
          <div class="payment accordion" id="accordion_payment">
            {{-- CreditCard --}}
{{--            <div class="payment-item border-bottom">--}}
{{--              <div class="form-check w-100" data-bs-toggle="collapse" type="button" aria-expanded="false"--}}
{{--                data-bs-target="#creditCard" aria-controls="creditCard">--}}
{{--                <input class="form-check-input mb-2" type="radio" name="payment" id="credit-check">--}}
{{--                <label class="form-check-label w-100 d-flex align-items-center fw-bold fs-3" for="credit-check">--}}
{{--                بايبال--}}
{{--                  <div class="d-flex align-items-center ms-auto">--}}
{{--                    <img src="{{ asset('front/img/payment/mada.png') }}" alt="mada">--}}
{{--                    <img src="{{ asset('front/img/payment/visa.png') }}" alt="visa" class="mx-4">--}}
{{--                    <img src="{{ asset('front/img/payment/mastercard.png') }}" alt="mastercard">--}}
{{--                  </div>--}}
{{--                </label>--}}
{{--              </div>--}}
{{--              <div class="collapse  border-top mt-5" id="creditCard" data-bs-parent="#accordion_payment">--}}
{{--                  <div class="payment-proceed-btn">--}}
{{--                      <form action="{{ route('payWithpaypal') }}" method="POST" autocomplete="off">--}}
{{--                          @csrf--}}

{{--                          <input type="hidden" name="amount" value="{{ $cart_total  }}"/>--}}
{{--                          <button class="btn btn-primary" title="checkout" type="submit">{{ __('frontstaticword.Proceed') }}</button>--}}
{{--                      </form>--}}

{{--                  </div>--}}
{{--                <!-- <form action="" class="row pt-5 my-3">--}}
{{--                  <div class="col-12">--}}
{{--                    <input type="text" class="form-control px-5 mb-4" id="account_number" name="account_number"--}}
{{--                      placeholder="رقم البطاقة">--}}
{{--                  </div>--}}
{{--                  <div class="col-12">--}}
{{--                    <input type="text" class="form-control px-5 mb-4" id="owner" name="owner"--}}
{{--                      placeholder="اسم صاحب البطاقة">--}}
{{--                  </div>--}}
{{--                  <div class="col-6">--}}
{{--                    <input type="text" class="form-control px-5 mb-4" id="expire" name="expire"--}}
{{--                      placeholder="تاريخ الانتهاء">--}}
{{--                  </div>--}}
{{--                  <div class="col-6">--}}
{{--                    <input type="text" class="form-control px-5 mb-4" id="cvv" name="cvv" placeholder="CCV">--}}
{{--                  </div>--}}
{{--                  <div class="col-12">--}}
{{--                    <button type="submit" class="btn btn-accent w-100 mt-5">تأكيد دفع الطلب</button>--}}
{{--                  </div>--}}
{{--                </form> -->--}}
{{--              </div>--}}
{{--            </div>--}}
            {{-- Transfer --}}
            @php $banktransfer = App\BankTransfer::first(); @endphp
            @if(isset($banktransfer))
                @if($banktransfer->bank_enable == '1')
                <div class="payment-item">
                    <div class="form-check w-100" data-bs-toggle="collapse" type="button" aria-expanded="false"
                        data-bs-target="#transfer" aria-controls="transfer">
                        <input class="form-check-input mb-2" type="radio" name="payment" id="transfer-check">
                        <label class="form-check-label w-100 fw-bold fs-3" for="transfer-check">
                        {{ __('frontstaticword.banktransfer') }}
                        </label>
                    </div>
                    <div class="collapse  border-top mt-5" id="transfer" data-bs-parent="#accordion_payment">
                        <div class="row pt-5 my-3">
                            <div class="col-12">
                                <div class="transfer-info">
                                <h5 class="mb-5">{{ __('frontstaticword.banktransferdetail') }}</h5>
                                <div class="d-flex align-items-center">
                                    <figure>
                                    <img src="{{ asset('front/img/payment/bank.png') }}" alt="bank-img">
                                    </figure>
                                    <ul class="d-flex flex-column">
                                        <li class="mb-4">
                                            <span class="text-dim">{{ __('frontstaticword.Accountholdername') }}: </span>
                                            <span class="fw-bold">{{ $banktransfer->account_holder_name }}</span>
                                        </li>
                                        <li class="mb-4">
                                            <span class="text-dim">{{ __('frontstaticword.BankName') }}: </span>
                                            <span class="fw-bold">{{ $banktransfer->bank_name }}</span>
                                        </li>
                                        <li class="mb-4">
                                            <span class="text-dim">{{ __('frontstaticword.BankAcccountNumber') }}: </span>
                                            <span class="fw-bold">{{ $banktransfer->account_number }}</span>
                                        </li>
                                        @if(isset($banktransfer->ifcs_code))
                                        <li class="mb-4">
                                            <span class="text-dim">{{ __('frontstaticword.IFCSCode') }}: </span>
                                            <span class="fw-bold">{{ $banktransfer->ifcs_code }}</span>
                                        </li>
                                        @endif
                                        @if(isset($banktransfer->swift_code))
                                        <li>
                                            <span class="text-dim">{{ __('frontstaticword.SwiftCode') }}: </span>
                                            <span class="fw-bold">{{ $banktransfer->swift_code }}</span>
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                                </div>
                            </div>
                        </div>
                        <form method="POST" action="{{ url('process/banktransfer') }}" accept-charset="UTF-8" enctype="multipart/form-data" class="row pt-5 my-3">
		                    @csrf
                            <input type="hidden" name="amount" value="{{ round($cart_total,2) }}"/>
                            <input type="hidden" name="user_id" value="{{Auth::User()->id}}"/>
                            <input type="hidden" name="fname" value="{{Auth::User()->fname}}"/>
                            <input type="hidden" name="mobile" value="{{Auth::User()->mobile}}"/>
                            <input type="hidden" name="email" value="{{Auth::User()->email}}"/>
                            <div class="col-12">
                                <div class="d-flex align-items-center">
                                <div class="imgfile me-4">
                                    <div class="d-flex flex-column align-items-center text-accent fs-4 fw-bold">
                                    <svg class="svg-default mb-4">
                                        <use xlink:href="{{ asset('/front/svg/sprite.svg#gallery-export') }}" />
                                    </svg>
                                    {{ __('frontstaticword.PleaseDocument') }}
                                    </div>
                                    <input name="proof" class="form-control" type="file" id="imgfile" onchange="previewFile(this);" required>
                                </div>
                                <div class="imgfile">
                                    <img id="previewImg" class="bg-white" src="{{ asset('front/img/no-image.png') }}"
                                    alt="Placeholder">
                                </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-accent w-100 mt-5">{{ __('frontstaticword.Proceed') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
                @endif
            @endif
          </div>
        </div>
      </div>
    </div>

  </section>
@endsection

@section('custom-js')
  <!-- Moyasar Scripts -->
  <script src="https://polyfill.io/v3/polyfill.min.js?features=fetch"></script>
  <script src="https://cdn.moyasar.com/mpf/1.7.3/moyasar.js"></script>
  <script>
    Moyasar.init({
          element: '.mysr-form',
          amount: {{ round($cart_total,2) * 100 }},
          currency: 'SAR',
          description: 'Order For {{ Auth::User()->fname }} {{ Auth::User()->lname}}',
          publishable_api_key: '{{config("moyasar.publishable_key")}}',
          callback_url: '{{route("moyasar.callback")}}',
          methods: ['creditcard', 'stcpay', 'applepay'],
          apple_pay: {
              country: 'SA',
              label: 'Order For {{ Auth::User()->fname }} {{ Auth::User()->lname}}',
              validate_merchant_url: 'https://api.moyasar.com/v1/applepay/initiate'
          }
      });
  </script>
@endsection
