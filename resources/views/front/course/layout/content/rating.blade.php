@if($reviews->isNotEmpty())
<div class="course-content-block">
  <h3 class="block-title">{{ __('frontstaticword.StudentFeedback') }}</h3>
  <div class="block-box">
    <div class="d-flex flex-column flex-sm-row align-items-center">
      <div class="d-flex flex-column align-items-center flex-shrink-0 mb-5 mb-sm-0 me-sm-5">
        <div class="total-rating">{{round(CourseRateHelper::rate($course)['rate'], 1)}}</div>
        <span class="rating-readonly"></span>
      </div>
      <div class="d-flex flex-column align-items-center flex-grow-1 w-100">
        <!--Learn Progress-->
        @php
          $learn_review_total = App\ReviewRating::where('course_id', $course->id)->where('status', 1)->sum('learn') * 5; 
          $learn_review_count = App\ReviewRating::where('course_id', $course->id)->where('status', 1)->count() * 5;
          $learn_review_rate = (($learn_review_total/$learn_review_count) * 100)/5 ;
        @endphp
        <div class="d-flex align-items-center w-100">
          <div class="progress flex-grow-1 me-3" role="progressbar" aria-label="Basic example" aria-valuenow="{{$learn_review_rate}}"
            aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar" style="width: {{$learn_review_rate}}%"></div>
          </div>
          <div class="d-flex align-items-center flex-shrink-0 ms-4">
            <span class="rating-readonly small"></span>
            <span class="fw-bold mt-2 fs-12 ms-2">{{round($learn_review_rate)}}%</span>
          </div>
        </div>

        <!--Value Progress-->
        @php
          $value_review_total = App\ReviewRating::where('course_id', $course->id)->where('status', 1)->sum('value') * 5; 
          $value_review_count = App\ReviewRating::where('course_id', $course->id)->where('status', 1)->count() * 5;
          $value_review_rate = (($value_review_total/$value_review_count) * 100)/5 ;
        @endphp
        <div class="d-flex align-items-center w-100">
          <div class="progress flex-grow-1 me-3" role="progressbar" aria-label="Basic example" aria-valuenow="{{$value_review_rate}}"
            aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar" style="width: {{$value_review_rate}}%"></div>
          </div>
          <div class="d-flex align-items-center flex-shrink-0 ms-4">
            <span class="rating-readonly small"></span>
            <span class="fw-bold mt-2 fs-12 ms-2">{{round($value_review_rate)}}%</span>
          </div>
        </div>

        <!--Price Progress-->
        @php
          $price_review_total = App\ReviewRating::where('course_id', $course->id)->where('status', 1)->sum('price') * 5; 
          $price_review_count = App\ReviewRating::where('course_id', $course->id)->where('status', 1)->count() * 5;
          $price_review_rate = (($price_review_total/$price_review_count) * 100)/5 ;
        @endphp
        <div class="d-flex align-items-center w-100">
          <div class="progress flex-grow-1 me-3" role="progressbar" aria-label="Basic example" aria-valuenow="{{$price_review_rate}}"
            aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar" style="width: {{$price_review_rate}}%"></div>
          </div>
          <div class="d-flex align-items-center flex-shrink-0 ms-4">
            <span class="rating-readonly small"></span>
            <span class="fw-bold mt-2 fs-12 ms-2">{{round($price_review_rate)}}%</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endif

@auth
  @php
      $user_course = App\Order::where('user_id', Auth::User()->id)->where('course_id', $course->id)->first();
      
      if(empty($user_course)) {
          $user_bundle_course_orders = auth()->user()->orders->where('bundle_id', '>' , 0);
          foreach($user_bundle_course_orders as $user_bundle_course_order) {
              $bundle_course_ids = $user_bundle_course_order->bundle_course_id;
              if(in_array($course->id, $bundle_course_ids)) {
                  $user_course = $course;
              }
          }
      }
  @endphp
  @if(1)
    <form method="post" action="{{route('course.rating',$course->id)}}">
      @csrf
      <div class="course-content-block">
        <h3 class="block-title">{{ __('frontstaticword.Reviews') }}</h3>
        <div class="block-box">
          <table class="table table-borderless">
            <tbody>
              <tr>
                <th>{{ __('frontstaticword.ReviewBy') }}</th>
                <th class="text-center">
                  <svg class="svg-resize-20 mx-1">
                    <use xlink:href="{{ asset('/front/svg/sprite.svg#star') }}" />
                  </svg>
                  <span class="mx-1">1</span>
                </th>
                <th class="text-center">
                  <svg class="svg-resize-20 mx-1">
                    <use xlink:href="{{ asset('/front/svg/sprite.svg#star') }}" />
                  </svg>
                  <span class="mx-1">2</span>
                </th>
                <th class="text-center">
                  <svg class="svg-resize-20 mx-1">
                    <use xlink:href="{{ asset('/front/svg/sprite.svg#star') }}" />
                  </svg>
                  <span class="mx-1">3</span>
                </th>
                <th class="text-center">
                  <svg class="svg-resize-20 mx-1">
                    <use xlink:href="{{ asset('/front/svg/sprite.svg#star') }}" />
                  </svg>
                  <span class="mx-1">4</span>
                </th>
                <th class="text-center">
                  <svg class="svg-resize-20 mx-1">
                    <use xlink:href="{{ asset('/front/svg/sprite.svg#star') }}" />
                  </svg>
                  <span class="mx-1">5</span>
                </th>
              </tr>
              <tr>
                <td>{{ __('frontstaticword.Learn') }}</td>
                <td class="text-center">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" value="1" id="" name="learn">
                  </div>
                </td>
                <td class="text-center">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" value="2" id="" name="learn">
                  </div>
                </td>
                <td class="text-center">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" value="3" id="" name="learn">
                  </div>
                </td>
                <td class="text-center">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" value="4" id="" name="learn">
                  </div>
                </td>
                <td class="text-center">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" value="5" id="" name="learn">
                  </div>
                </td>
              </tr>
              <tr>
                <td>{{ __('frontstaticword.Value') }}</td>
                <td class="text-center">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" value="1" id="" name="value">
                  </div>
                </td>
                <td class="text-center">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" value="2" id="" name="value">
                  </div>
                </td>
                <td class="text-center">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" value="3" id="" name="value">
                  </div>
                </td>
                <td class="text-center">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" value="4" id="" name="value">
                  </div>
                </td>
                <td class="text-center">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" value="5" id="" name="value">
                  </div>
                </td>
              </tr>
              <tr>
                <td>{{ __('frontstaticword.Price') }}</td>
                <td class="text-center">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" value="1" id="" name="price">
                  </div>
                </td>
                <td class="text-center">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" value="2" id="" name="price">
                  </div>
                </td>
                <td class="text-center">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" value="3" id="" name="price">
                  </div>
                </td>
                <td class="text-center">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" value="4" id="" name="price">
                  </div>
                </td>
                <td class="text-center">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" value="5" id="" name="price">
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="course-content-block">
        <h3 class="block-title">{{ __('frontstaticword.Writereview') }}</h3>
          <textarea class="form-control p-5" id="comment" placeholder="{{ __('frontstaticword.WriteYourComment') }} ....."></textarea>
          <button type="submit" class="btn btn-accent mt-5">{{ __('frontstaticword.SubmitYourReview') }}</button>
      </div>
    </form>
  @endif
@endauth

@if($course->review()->where('status', 1)->where('approved', 1)->count() > 0)
<div class="course-content-block">
  <h3 class="block-title">{{ __('frontstaticword.SectionTestimonialTitle') }}</h3>
    @foreach($course->review()->where('status', 1)->where('approved', 1)->get() as $rating)
      <div class="block-box testimonial-item py-5 mb-4">
        <div class="d-flex align-items-start justify-content-between">
          <div class="d-flex flex-column flex-sm-row align-items-sm-center">
            @if ($rating->user->user_img != null || $rating->user->user_img != '')
              <img src="{{ asset('images/user_img/' . $rating->user->user_img) }}" alt="user-img" class="avatar-60">
            @else
              <img src="{{ asset('front/img/user.jpg') }}" alt="user-img" class="avatar-60">
            @endif
            <div class="d-flex flex-column">
              <span class="fw-bold">{{ $rating->user->fname .' '.$rating->user->lname }}</span>
              <span class="rating-readonly my-3"></span>
              <p class="fs-14 fw-bold">{{ $rating->review }}</p>
            </div>
          </div>
          <span class="text-dim fs-14 fw-light text-nowrap">{{ date('d-m-Y', strtotime($rating->created_at)) }}</span>
        </div>
      </div>
    @endforeach
</div>
@endif
