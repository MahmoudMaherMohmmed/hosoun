@extends('front.layouts.master')
@section('custom-css')
  <style>
    @media print {
      @page {
        size: A4;
      }

      .navbar,
      .navbar>*,
      .page_header,
      .page_header>*,
      footer,
      footer>*,
      .no-print,
      .no-print>* {
        display: none !important
      }

      .main-block .col-md-4 {
        flex: 0 0 auto !important;
        width: 33.33333333% !important;
      }
    }
  </style>
@endsection
@section('title')
  {{ __('frontstaticword.Invoice') }}
@endsection

@section('content')
  @include('front.layouts.page_header', ['title' => __('frontstaticword.Invoice')])
  <section class="block-sec">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="d-flex flex-column-reverse flex-sm-row align-items-sm-center">
            @php $setting = App\setting::first(); @endphp
            @if($setting->logo_type == 'L')
              <a href="{{ url('/') }}" class="logo">
                <img src="{{ asset('images/logo/'.$setting->logo) }}" alt="{{ $setting->project_title }}">
              </a>
            @else()
                <a href="{{ url('/') }}"><b>{{ $setting->project_title }}</b></a>
            @endif

            <div class="d-flex align-items-center mb-5 mb-ms-0 ms-auto no-print">
              <a href="{{route('invoice.download',$orders->id)}}" target="_blank" class="btn btn-accent me-4" style="min-width: 16.8rem">{{ __('frontstaticword.InvoiceDownload') }}</a>
              <button class="btn btn-accent2-light" style="min-width: 16.8rem" onclick="window.print();">{{ __('frontstaticword.InvoicePrint') }}</button>
            </div>
          </div>
          <div class="fw-bold fs-12 mt-5">{{ __('frontstaticword.Puchasedon') }}: {{ date('jS F Y', strtotime($orders->created_at)) }}</div>

          <section class="main-block my-5">
            <div class="row ">
              <div class="col-md-4">
                <ul>
                  <li class="text-dim fs-12 my-4">{{ __('frontstaticword.From') }}</li>
                  @if($orders->course_id != NULL)
                  <li class="text-accent fs-12 my-4 fw-bold">{{ $orders->courses->user->fname }} {{ $orders->courses->user->lname }}</li>
                  <li class="text-dim fs-12 my-4">
                    {{ __('frontstaticword.address') }}
                    <span class="text-black fw-bold ms-3">
                      {{ $orders->courses->user->address }}
                    </span>
                  </li>
                  <li class="text-dim fs-12 my-4">
                    {{ __('frontstaticword.Phone') }}
                    <span class="text-black fw-bold ms-3">
                      {{ $orders->courses->user->mobile }}
                    </span>
                  </li>
                  <li class="text-dim fs-12 my-4">
                    {{ __('frontstaticword.Email') }}
                    <span class="text-black fw-bold ms-3">
                      {{ $orders->courses->user->email }}
                    </span>
                  </li>
                  @else
                  <li class="text-accent fs-12 my-4 fw-bold">{{ $orders->bundle->user->fname }} {{ $orders->bundle->user->lname }}</li>
                  <li class="text-dim fs-12 my-4">
                    {{ __('frontstaticword.address') }}
                    <span class="text-black fw-bold ms-3">
                      {{ $orders->bundle->user->address }}
                    </span>
                  </li>
                  <li class="text-dim fs-12 my-4">
                    {{ __('frontstaticword.Phone') }}
                    <span class="text-black fw-bold ms-3">
                      {{ $orders->bundle->user->mobile }}
                    </span>
                  </li>
                  <li class="text-dim fs-12 my-4">
                    {{ __('frontstaticword.Email') }}
                    <span class="text-black fw-bold ms-3">
                      {{ $orders->bundle->user->email }}
                    </span>
                  </li>
                  @endif
                </ul>
              </div>
              <div class="col-md-4">
                <ul>
                  <li class="text-dim fs-12 my-4">{{ __('frontstaticword.To') }}</li>
                  <li class="text-accent fs-12 my-4 fw-bold">{{ $orders->user->fname }} {{ $orders->user->lname }}</li>
                  <li class="text-dim fs-12 my-4">
                    {{ __('frontstaticword.address') }}
                    <span class="text-black fw-bold ms-3">
                      {{ $orders->user->address }}
                    </span>
                  </li>
                  <li class="text-dim fs-12 my-4">
                    {{ __('frontstaticword.Phone') }}
                    <span class="text-black fw-bold ms-3">
                      {{ $orders->user->mobile }}
                    </span>
                  </li>
                  <li class="text-dim fs-12 my-4">
                    {{ __('frontstaticword.Email') }}
                    <span class="text-black fw-bold ms-3">
                      {{ $orders->user->email }}
                    </span>
                  </li>
                </ul>
              </div>
              <div class="col-md-4">
                <ul>
                  <li class="text-dim fs-12 my-4">
                    {{ __('frontstaticword.OrderID') }}
                    <span class="text-black fw-bold ms-3">
                      {{ $orders->order_id }}
                    </span>
                  </li>
                  <li class="text-dim fs-12 my-4">
                    {{ __('frontstaticword.TransactionID') }}
                    <span class="text-black fw-bold ms-3">
                      {{ $orders->transaction_id }}
                    </span>
                  </li>
                  <li class="text-dim fs-12 my-4">
                    {{ __('frontstaticword.PaymentMode') }}
                    <span class="text-black fw-bold ms-3">
                      {{ $orders->payment_method }}
                    </span>
                  </li>
                  <li class="text-dim fs-12 my-4">
                    {{ __('frontstaticword.Currency') }}
                    <span class="text-black fw-bold ms-3">
                      {{ $orders->currency }}
                    </span>
                  </li>
                  <li class="text-dim fs-12 my-4">
                    {{ __('frontstaticword.PaymentStatus') }}
                    <span class="text-black fw-bold ms-3">
                      @if($orders->status ==1)
                        {{ __('frontstaticword.Recieved') }}
                      @else 
                        {{ __('frontstaticword.Pending') }}
                      @endif
                    </span>
                  </li>
                  <li class="text-dim fs-12 my-4">
                    {{ __('frontstaticword.Enrollon') }}
                    <span class="text-black fw-bold ms-3">
                      {{ date('jS F Y', strtotime($orders->created_at)) }}
                    </span>
                  </li>
                  @if($orders->enroll_expire != NULL)
                  <li class="text-dim fs-12 my-4">
                    {{ __('frontstaticword.EnrollEnd') }}
                    <span class="text-black fw-bold ms-3">
                      {{ date('jS F Y', strtotime($orders->enroll_expire)) }}
                    </span>
                  </li>
                  @endif
                </ul>
              </div>
            </div>
          </section>

          <div class="table-responsive payment-table mt-5">
            <table class="table mt-3">
              <thead>
                <tr>
                  <th>{{ __('frontstaticword.Courses') }}</th>
                  <th>{{ __('frontstaticword.Instructor') }}</th>
                  <th>{{ __('frontstaticword.Currency') }}</th>
                  @if($orders->coupon_discount != 0)
                  <th>{{ __('frontstaticword.CouponDiscount') }}</th>
                  @endif
                  <th>{{ __('frontstaticword.Total') }}</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="fw-bold">
                    <div class="d-flex flex-wrap align-items-center">
                      @if($orders->course_id != NULL)
                          @if($orders->courses->preview_image !== NULL && $orders->courses->preview_image !== '')
                            <a href="{{ route('user.course.show',['id' => $orders->courses->id, 'slug' => $orders->courses->slug ]) }}">
                              <img src="{{ asset('images/course/'. $orders->courses->preview_image) }}" class="me-4 flex-shrink-0" alt="{{$orders->courses->title}}">
                            </a>
                          @else
                            <a href="{{ route('user.course.show',['id' => $orders->courses->id, 'slug' => $orders->courses->slug ]) }}">
                              <img src="{{ Avatar::create($orders->courses->title)->toBase64() }}" class="me-4 flex-shrink-0" alt="{{$orders->courses->title}}">
                            </a>
                          @endif
                        @else
                          @if($orders->bundle->preview_image !== NULL && $orders->bundle->preview_image !== '')
                            <a href="{{ route('bundle.detail', $orders->bundle->id) }}">
                              <img src="{{ asset('images/bundle/'. $orders->bundle->preview_image) }}" class="me-4 flex-shrink-0" alt="{{$orders->bundle->title}}">
                            </a>
                          @else
                            <a href="{{ route('bundle.detail', $orders->bundle->id) }}">
                              <img src="{{ Avatar::create($orders->bundle->title)->toBase64() }}" class="me-4 flex-shrink-0" alt="{{$orders->bundle->title}}">
                            </a>
                          @endif
                        @endif
                      <span style="max-width: 18.4rem">
                        @if($orders->course_id != NULL)
                          {{ $orders->courses->title }}
                        @else
                          {{ $orders->bundle->title }}
                        @endif
                      </span>
                    </div>
                  </td>
                  <td>
                    @if($orders->course_id != NULL)
                      {{ $orders->courses->user->email }}
                    @else
                      {{ $orders->bundle->user->email }}
                    @endif
                  </td>
                  <td> {{ $orders->currency }} </td>
                  @if($orders->coupon_discount != 0)
                  <td>
                    @if($gsetting->currency_swipe == 1)
                        (-)&nbsp;<i class="{{ $orders->currency_icon }}"></i>{{ $orders->coupon_discount }}
                    @else
                        (-)&nbsp;{{ $orders->coupon_discount }}<i class="{{ $orders->currency_icon }}"></i>
                    @endif
                  </td>
                  @endif
                  <td class="fw-bold text-accent">
                    @if($orders->coupon_discount == !NULL)
                      @if($gsetting->currency_swipe == 1)
                        <i class="fa {{ $orders->currency_icon }}"></i>{{ $orders->total_amount - $orders->coupon_discount }}
                      @else
                        {{ $orders->total_amount - $orders->coupon_discount }}<i class="fa {{ $orders->currency_icon }}"></i>
                      @endif
                    @else
                      @if($gsetting->currency_swipe == 1)
                        <i class="fa {{ $orders->currency_icon }}"></i>{{ $orders->total_amount }}
                      @else
                        {{ $orders->total_amount }}<i class="fa {{ $orders->currency_icon }}"></i>
                      @endif
                    @endif
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </section>
@endsection
