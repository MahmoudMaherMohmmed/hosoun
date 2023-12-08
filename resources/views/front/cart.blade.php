@extends('front.layouts.master')
@section('css')
@endsection
@section('title')
  {{ __('frontstaticword.ShoppingCart') }}
@endsection

@section('content')
  @include('front.layouts.page_header', ['title' => __('frontstaticword.ShoppingCart')])
  <section class="block-sec">
    <div class="container">
      <div class="row">
        <div class="col-12 mb-5">
          <h3 class="title-25">
            {{ __('frontstaticword.ShoppingCart') }}
            <span class="text-accent">({{ count($carts) }})</span>
          </h3>
        </div>

        @if (count($carts) > 0)
          <div class="col-lg-8">
            @include('admin.message')

            @foreach ($carts as $cart)
              @include('front.cart.card')
            @endforeach
          </div>
          <div class="col-lg-4">
            <div class="checkout-card">
              <h5 class="title fs-3">{{ __('frontstaticword.Total') }}</h5>
              <div class="content">
                @if (Session::has('fail'))
                  <div class="alert alert-danger alert-dismissible fade show">
                    {{ Session::get('fail') }}
                  </div>
                @endif

                <ul class="border-bottom">
                  @if ($gsetting['currency_swipe'] == 1)
                    <li class="d-flex align-items-center">
                      {{ __('frontstaticword.TotalPrice') }}
                      <span class="fw-bold ms-auto"><i class="{{ $currency->icon }}"></i> {{ $price_total }}</span>
                    </li>
                    <li class="d-flex align-items-center">
                      {{ __('frontstaticword.OfferDiscount') }}
                      <span class="fw-bold ms-auto">-&nbsp;<i class="{{ $currency->icon }}"></i>
                        {{ $price_total - $offer_total }}</span>
                    </li>
                  @else
                    <li class="d-flex align-items-center">
                      {{ __('frontstaticword.TotalPrice') }}
                      <span class="fw-bold ms-auto">{{ $price_total }} <i class="{{ $currency->icon }}"></i></span>
                    </li>
                    <li class="d-flex align-items-center">
                      {{ __('frontstaticword.OfferDiscount') }}
                      <span class="fw-bold ms-auto">-&nbsp;{{ $price_total - $offer_total }} <i
                          class="{{ $currency->icon }}"></i></span>
                    </li>
                  @endif

                  <li>
                    <div class="d-flex align-items-center">
                      {{ __('frontstaticword.CouponDiscount') }}
                      @if ($cpn_discount == !null)
                        @if ($gsetting['currency_swipe'] == 1)
                          <span class="fw-bold ms-auto">-&nbsp;<i class="{{ $currency->icon }}"></i>
                            {{ $cpn_discount }}</span>
                        @else
                          <span class="fw-bold ms-auto">-&nbsp;{{ $cpn_discount }} <i
                              class="{{ $currency->icon }}"></i></span>
                        @endif
                      @else
                        <button class="btn btn-inline text-accent fs-5 ms-auto" type="button" data-bs-toggle="collapse"
                          data-bs-target="#copoun" aria-expanded="false" aria-controls="copoun">
                          {{ __('frontstaticword.ApplyCoupon') }}
                        </button>
                      @endif
                    </div>
                    <div class="collapse " id="copoun">
                      <div class="mt-4 pt-2">
                        <form method="post" action="{{ url('apply/coupon') }}" class="position-relative">
                          {{ csrf_field() }}
                          <input type="hidden" name="user_id" value="{{ Auth::User()->id }}" />
                          <input type="text" name="coupon" value=""
                            placeholder="{{ __('frontstaticword.EnterCoupon') }}" class="form-control p-4" />
                          <button type="submit" class="btn btn-accent">{{ __('frontstaticword.Apply') }}</button>
                        </form>
                      </div>
                    </div>
                  </li>
                  <li class="d-flex align-items-center">
                    {{ __('frontstaticword.DiscountPercent') }}
                    <span class="fw-bold ms-auto">{{ round($offer_percent, 0) }}% {{ __('frontstaticword.Off') }}</span>
                  </li>
                </ul>
                @if ($gsetting['currency_swipe'] == 1)
                  <div class="d-flex align-items-center fw-bold my-4 py-3">
                    {{ __('frontstaticword.Total') }}
                    <span class="text-accent ms-auto"><i class="{{ $currency->icon }}"></i> {{ $cart_total }}</span>
                  </div>
                @else
                  <div class="d-flex align-items-center fw-bold my-4 py-3">
                    {{ __('frontstaticword.Total') }}
                    <span class="text-accent ms-auto">{{ $cart_total }} <i class="{{ $currency->icon }}"></i></span>
                  </div>
                @endif

{{--                <a href="#" onclick="event.preventDefault(); document.getElementById('cart-form').submit();"--}}
{{--                  class="btn btn-accent w-100">{{ __('frontstaticword.Checkout') }}</a>--}}

                <form id="cart-form" method="post" action="{{ url('gotocheckout') }}" style="display: none;">
                  {{ csrf_field() }}
                  <input type="hidden" name="user_id" value="{{ Auth::User()->id }}" />
                  <input type="hidden" name="price_total" value="{{ $price_total }}" />
                  <input type="hidden" name="offer_total" value="{{ $offer_total }}" />
                  <input type="hidden" name="offer_percent" value="{{ round($offer_percent, 2) }}" />
                  <input type="hidden" name="cart_total" value="{{ $cart_total }}" />
                </form>
              </div>
            </div>
          </div>
        @else
          <div class="col-12">
            <div class="main-block text-center d-flex flex-column align-items-center justify-content-center">
              <svg class="svg-resize-32 svg-stroke-accent mb-4">
                <use xlink:href="{{ asset('/front/svg/sprite.svg#bag') }}" />
              </svg>
              {{ __('frontstaticword.cartempty') }}
            </div>
          </div>
        @endif
      </div>
    </div>

  </section>
@endsection
