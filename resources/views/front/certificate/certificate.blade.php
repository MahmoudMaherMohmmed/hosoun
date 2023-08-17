@extends('front.layouts.master')

@section('custom-css')
  @include('front.certificate.certificate-style')
@endsection

@section('title', 'Course Completion Certificate')

@section('content')
  @include('front.layouts.page_header', ['title' => __('frontstaticword.CertificateDownload')])

  @include('admin.message')

  <section class="course-cirtificate block-sec">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <section class="main-block">
            <h4 class="mb-3">{{ __('frontstaticword.CertificateRecipient') }}:</h4>
            <div class="recipient-block">
              <div class="row">
                <div class="col-md-4">
                  @if (Auth::User()->user_img != null || Auth::User()->user_img != '')
                    <img src="{{ asset('images/user_img/' . Auth::User()->user_img) }}" alt="user"
                      class="img-fluid img-circle">
                  @else
                    <img src="{{ asset('images/default/user.jpg') }}" alt="user" class="img-fluid img-circle">
                  @endif
                </div>
                <div class="col-md-8">
                  {{ Auth::User()->fname }}
                </div>
              </div>
            </div>

            <h4 class="mb-3 mt-4">{{ __('frontstaticword.AbouttheCourse') }}:</h4>
            <div class="view-block">
              @if ($course['preview_image'] !== null && $course['preview_image'] !== '')
                <a class="d-block"
                  href="{{ route('user.course.show', ['id' => $course->id, 'slug' => $course->slug]) }}"><img
                    src="{{ asset('images/course/' . $course['preview_image']) }}" alt="course" class="img-fluid"></a>
              @else
                <a class="d-block"
                  href="{{ route('user.course.show', ['id' => $course->id, 'slug' => $course->slug]) }}"><img
                    src="{{ Avatar::create($course->title)->toBase64() }}" alt="course" class="img-fluid"></a>
              @endif
              <div class="view-dtl">
                <a class="mt-3 d-block"
                  href="{{ route('user.course.show', ['id' => $course->id, 'slug' => $course->slug]) }}">
                  {{ str_limit($course->title, $limit = 30, $end = '...') }}
                </a>
                <a herf="#">{{ __('frontstaticword.by') }} {{ $course->user['fname'] }}</a>
                <div class="rating">
                  <ul>
                    <li>
                      <?php
                      $learn = 0;
                      $price = 0;
                      $value = 0;
                      $sub_total = 0;
                      $reviews = App\ReviewRating::where('course_id', $course->id)->get();
                      ?>
                      @if (!empty($reviews[0]))
                        <?php
                        $count = App\ReviewRating::where('course_id', $course->id)->count();
                        
                        foreach ($reviews as $review) {
                            $learn = $review->price * 5;
                            $price = $review->price * 5;
                            $value = $review->value * 5;
                            $sub_total = $sub_total + $learn + $price + $value;
                        }
                        
                        $count = $count * 3 * 5;
                        $rat = $sub_total / $count;
                        $ratings_var = ($rat * 100) / 5;
                        ?>

                        <div class="pull-left">
                          <div class="star-ratings-sprite"><span style="width:<?php echo $ratings_var; ?>%"
                              class="star-ratings-sprite-rating"></span>
                          </div>
                        </div>
                      @else
                        <div class="pull-left">{{ __('frontstaticword.NoRating') }}</div>
                      @endif
                    </li>
                    <!-- overall rating-->
                    <?php
                    $learn = 0;
                    $price = 0;
                    $value = 0;
                    $sub_total = 0;
                    $count = count($reviews);
                    $onlyrev = [];
                    
                    $reviewcount = App\ReviewRating::where('course_id', $course->id)
                        ->WhereNotNull('review')
                        ->get();
                    
                    foreach ($reviews as $review) {
                        $learn = $review->learn * 5;
                        $price = $review->price * 5;
                        $value = $review->value * 5;
                        $sub_total = $sub_total + $learn + $price + $value;
                    }
                    
                    $count = $count * 3 * 5;
                    
                    if ($count != '' && $count > 0) {
                        $rat = $sub_total / $count;
                    
                        $ratings_var = ($rat * 100) / 5;
                    
                        $overallrating = $ratings_var / 2 / 10;
                    }
                    
                    ?>

                    @php
                      $reviewsrating = App\ReviewRating::where('course_id', $course->id)->first();
                    @endphp
                    @if (!empty($reviewsrating))
                      <li>
                        <b>{{ round($overallrating, 1) }}</b>
                      </li>
                    @endif
                    <li>({{ $course->order->count() }})</li>
                  </ul>
                </div>
                @if ($course->type == 1)
                  <div class="rate text-right">
                    <ul>
                      @php
                        $currency = App\Currency::first();
                      @endphp

                      @if ($course->discount_price == !null)
                        @if ($gsetting['currency_swipe'] == 1)
                          <li><a><b><i class="{{ $currency->icon }}"></i>{{ $course->discount_price }}</b></a></li>
                          &nbsp;
                          <li><a><b><strike><i class="{{ $currency->icon }}"></i>{{ $course->price }}</strike></b></a>
                          </li>
                        @else
                          <li><a><b>{{ $course->discount_price }}<i class="{{ $currency->icon }}"></i></b></a></li>
                          &nbsp;
                          <li><a><b><strike>{{ $course->price }}<i class="{{ $currency->icon }}"></i></strike></b></a>
                          </li>
                        @endif
                      @else
                        @if ($gsetting['currency_swipe'] == 1)
                          <li><a><b><i class="{{ $currency->icon }}"></i>{{ $course->price }}</b></a></li>
                        @else
                          <li><a><b>{{ $course->price }}<i class="{{ $currency->icon }}"></i></b></a></li>
                        @endif
                      @endif
                    </ul>
                  </div>
                @else
                  <div class="rate text-right">
                    <ul>
                      <li><a><b>{{ __('frontstaticword.Free') }}</b></a></li>
                    </ul>
                  </div>
                @endif
              </div>
            </div>
            <div class="download-btn mt-4 mb-3">
              <?php
              
              $parameter = Crypt::encrypt($course->id);
              ?>
              <a href="{{ route('cirtificate.download', $course) }}" target="_blank"
                class="btn btn-accent w-100">{{ __('frontstaticword.CertificateDownload') }}</a>
            </div>
            <p><a href="#" data-toggle="modal" data-target="#myModalCirtificate"
                title="report">{{ __('frontstaticword.Updateyourcertificate') }}</a>
              {{ __('frontstaticword.withyourcorrectname') }}.</p>
            <div class="modal fade" id="myModalCirtificate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">{{ __('frontstaticword.UpdateYourCertificate') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                  </div>
                  <div class="box box-primary">
                    <div class="panel panel-sum">
                      <div class="modal-body">
                        {{ __('frontstaticword.Confirmyournameis') }} <b>{{ Auth::User()->fname }}</b>
                        <br>

                        {{ __('frontstaticword.Incorrect') }}? <a
                          href="{{ route('profile.show', Auth::User()->id) }}">{{ __('frontstaticword.Updateyourprofilename') }}</a>.

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
        <div class="col-lg-8 mt-5 mt-lg-0">
          <section class="certificate">
            @include('front.certificate.certificate-content')
          </section>
        </div>
      </div>
    </div>
  </section>

@endsection
