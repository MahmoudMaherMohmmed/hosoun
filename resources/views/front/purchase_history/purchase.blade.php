@extends('front.layouts.master')
@section('css')
@endsection
@section('title')
  {{ __('frontstaticword.PurchaseHistory') }}    
@endsection

@section('content')
  @include('front.layouts.page_header', ['title' => __('frontstaticword.PurchaseHistory')])

  @if($orders->isNotEmpty())
  <section class="block-sec">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="table-responsive payment-table">
            <table class="table">
              <thead>
                <tr>
                  <th>{{ __('frontstaticword.PurchaseHistory') }}</th>
                  <th>{{ __('frontstaticword.Enrollon') }}</th>
                  <th>{{ __('frontstaticword.EnrollEnd') }}</th>
                  <th>{{ __('frontstaticword.PaymentMode') }}</th>
				          <th>{{ __('frontstaticword.TotalPrice') }}</th>
				          <th>{{ __('frontstaticword.PaymentStatus') }}s</th>
				          <th>{{ __('frontstaticword.Actions') }}</th>
                </tr>
              </thead>
              <tbody>
                @foreach($orders as $order)
                  <tr>
                    <td class="fw-bold">
                      <div class="d-flex flex-wrap align-items-center">
                        @if($order->course_id != NULL)
                          @if($order->courses->preview_image !== NULL && $order->courses->preview_image !== '')
                            <a href="{{ route('user.course.show',['id' => $order->courses->id, 'slug' => $order->courses->slug ]) }}">
                              <img src="{{ asset('images/course/'. $order->courses->preview_image) }}" class="me-4 flex-shrink-0" alt="{{$order->courses->title}}">
                            </a>
                          @else
                            <a href="{{ route('user.course.show',['id' => $order->courses->id, 'slug' => $order->courses->slug ]) }}">
                              <img src="{{ Avatar::create($order->courses->title)->toBase64() }}" class="me-4 flex-shrink-0" alt="{{$order->courses->title}}">
                            </a>
                          @endif
                        @else
                          @if($order->bundle->preview_image !== NULL && $order->bundle->preview_image !== '')
                            <a href="{{ route('bundle.detail', $order->bundle->id) }}">
                              <img src="{{ asset('images/bundle/'. $order->bundle->preview_image) }}" class="me-4 flex-shrink-0" alt="{{$order->bundle->title}}">
                            </a>
                          @else
                            <a href="{{ route('bundle.detail', $order->bundle->id) }}">
                              <img src="{{ Avatar::create($order->bundle->title)->toBase64() }}" class="me-4 flex-shrink-0" alt="{{$order->bundle->title}}">
                            </a>
                          @endif
                        @endif
                        <span style="max-width: 18.4rem">
                          @if($order->course_id != NULL)
                            <a href="{{ route('user.course.show',['id' => $order->courses->id, 'slug' => $order->courses->slug ]) }}">{{ $order->courses->title }}</a>
                          @else
                            <a href="{{ route('bundle.detail', $order->bundle->id) }}">{{ $order->bundle->title }}</a>
                          @endif
                        </span>
                      </div>
                    </td>
                    <td>{{ date('jS F Y', strtotime($order->created_at)) }}</td>
                    <td>
                      @if($order->course_id != NULL)
                        @if($order->enroll_expire != NULL)
                          {{ date('jS F Y', strtotime($order->enroll_expire)) }}
                        @else
                            -
                        @endif
                      @endif
                    </td>
                    <td class="fw-bold">{{ $order->payment_method }}</td>
                    <td class="fw-bold">
                      @if($order->coupon_discount == !NULL)
                        @if($gsetting->currency_swipe == 1)
                          <i class="fa {{ $order->currency_icon }}"></i>{{ $order->total_amount - $order->coupon_discount }}
                        @else
                          {{ $order->total_amount - $order->coupon_discount }}<i class="fa {{ $order->currency_icon }}"></i>
                        @endif
                      @else
                        @if($gsetting->currency_swipe == 1)
                          <i class="fa {{ $order->currency_icon }}"></i>{{ $order->total_amount }}
                        @else
                          {{ $order->total_amount }} <i class="fa {{ $order->currency_icon }}"></i>
                        @endif
                      @endif
                    </td>
                    <td class="fw-bold text-accent">
                      @if($order->status ==1)
                        {{ __('frontstaticword.Recieved') }}
                      @else
                        @if ($order->bundle->subscription_status !== 'active')
                            {{ __('frontstaticword.Cancelled') }}
                        @else
                            {{ __('frontstaticword.Pending') }}
                        @endif
                      @endif
                    </td>
                    <td>
                      {{--Show Invoice--}}
                      <a href="{{route('invoice.show',$order->id)}}"  class="btn btn-accent">{{ __('frontstaticword.Invoice') }}</a>

                      {{--unsubscribe--}}
                      @if ($order->subscription_status == 'active' && $order->payment_method !== 'Admin Enroll')
                        <form id="unsubscribeForm" action="{{ route('stripe.cancelsubscription') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" value="{{ $order->id }}" name="order_id">
                            <a onclick="document.getElementById('unsubscribeForm').submit()"
                                class="btn btn-secondary">{{ __('frontstaticword.UnSubscribe') }}</a>
                        </form>
                      @endif

                      {{--refund proceed--}}
                      @php
                        $order_id = Crypt::encrypt($order->id);
                        $ref = App\RefundPolicy::where('id', $order->courses->refund_policy_id)->first();
                        $days = isset($ref->days);
                        $orderDate = $order->created_at;
                        $startDate = date("Y-m-d", strtotime("$orderDate +$days days"));
                        $mytime = Carbon\Carbon::now();
                        $requested = App\RefundCourse::where('user_id', Auth::User()->id)->where('course_id', $order->course_id)->first();
                      @endphp      
                      @if($requested == NULL)
                        @if($order->id) 
							            @if($order->status == 1 )
                            @if($startDate >= $mytime)
                              <a href="{{route('refund.proceed',$order_id)}}"  class="btn btn-secondary">{{ __('frontstaticword.Refund') }}</a>
                            @endif
							            @endif
							          @endif
							        @endif
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endif

  @if($refunds->isNotEmpty())
  <section class="block-sec">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="table-responsive payment-table">
            <table class="table">
              <thead>
                <tr>
                  <th>{{ __('frontstaticword.Refunds') }}</th>
                  <th>{{ __('frontstaticword.Date') }}</th>
                  <th>{{ __('frontstaticword.Amount') }}</th>
                  <th>{{ __('frontstaticword.PaymentMode') }}</th>
                  <th>{{ __('frontstaticword.PaymentStatus') }}s</th>
                  <th>{{ __('frontstaticword.Actions') }}</th>
                </tr>
              </thead>
              <tbody>
                @foreach($refunds as $refund)
                  <tr>
                    <td class="fw-bold">
                      <div class="d-flex flex-wrap align-items-center">
                        @if($refund->courses->preview_image !== NULL && $refund->courses->preview_image !== '')
                          <a href="{{ route('user.course.show',['id' => $refund->courses->id, 'slug' => $refund->courses->slug ]) }}">
                            <img src="{{ asset('images/course/'. $refund->courses->preview_image) }}" class="me-4 flex-shrink-0" alt="{{$refund->courses->title}}">
                          </a>
                        @else
                          <a href="{{ route('user.course.show',['id' => $refund->courses->id, 'slug' => $refund->courses->slug ]) }}">
                            <img src="{{ Avatar::create($refund->courses->title)->toBase64() }}" class="me-4 flex-shrink-0" alt="{{$refund->courses->title}}">
                          </a>
                        @endif
                        <span style="max-width: 18.4rem">
                          <a href="{{ route('user.course.show',['id' => $refund->courses->id, 'slug' => $refund->courses->slug ]) }}">{{ $refund->courses->title }}</a>
                        </span>
                      </div>
                    </td>
                    <td>{{ date('jS F Y', strtotime($refund->updated_at)) }}</td>
                    <td>
                      @if($gsetting['currency_swipe'] == 1)
                        <i class="fa {{ $refund->currency_icon }}"></i>{{ $refund->total_amount }}
                      @else
                        {{ $refund->total_amount }}<i class="fa {{ $refund->currency_icon }}"></i>
                      @endif
                    </td>
                    <td class="fw-bold">{{ $refund->payment_method }}</td>
                    <td class="fw-bold">
                      @if($refund->status ==1)
                        {{ __('adminstaticword.Refunded') }}
                      @else
                        {{ __('adminstaticword.Pending') }}
                      @endif
                    </td>
                    <td>
                      <a href="{{route('invoice.show',$refund->id)}}"  class="btn btn-accent">{{ __('frontstaticword.Invoice') }}</a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endif
@endsection
