<section class="course-card position-relative">
  @if ($course->preview_image != null && $course->preview_image !== '')
    <a href="{{ route('user.course.show', ['id' => $course->id, 'slug' => $course->slug]) }}" class="img d-inline-block">
      <img src="{{ asset('images/course/' . $course->preview_image) }}" alt="{{ $course->title }}">
    </a>
  @else
    <a href="{{ route('user.course.show', ['id' => $course->id, 'slug' => $course->slug]) }}" class="img d-inline-block">
      <img src="{{ Avatar::create($course->title)->toBase64() }}" alt="{{ $course->title }}">
    </a>
  @endif

  @if (Auth::check())
    @php
      $wish = App\Wishlist::where('user_id', Auth::User()->id)
          ->where('course_id', $course->id)
          ->first();
    @endphp
    @if ($wish == null)
      <form method="post" action="{{ url('show/wishlist', $course->id) }}">
        {{ csrf_field() }}
        <input type="hidden" name="user_id" value="{{ Auth::User()->id }}" />
        <input type="hidden" name="course_id" value="{{ $course->id }}" />

        <button class="fav-remove">
          <svg class="svg-resize-24 svg-stroke-white">
            <use xlink:href="{{ asset('/front/svg/sprite.svg#heart') }}" />
          </svg>
        </button>
      </form>
    @else
      <form method="post" action="{{ url('remove/wishlist', $course->id) }}">
        {{ csrf_field() }}
        <input type="hidden" name="user_id" value="{{ Auth::User()->id }}" />
        <input type="hidden" name="course_id" value="{{ $course->id }}" />

        <button class="fav-remove">
          <svg class="svg-resize-24 svg-stroke-white">
            <use xlink:href="{{ asset('/front/svg/sprite.svg#trash') }}" />
          </svg>
        </button>
      </form>
    @endif
  @else
    <a href="{{ route('login') }}">
      <button class="fav-remove">
        <svg class="svg-resize-24 svg-stroke-white">
          <use xlink:href="{{ asset('/front/svg/sprite.svg#heart') }}" />
        </svg>
      </button>
    </a>
  @endif


  <div class="course-card-content">
    <div class="d-flex align-items-center">
      <span class="rating-readonly"></span>
      <span class="fw-bold ms-3 pt-2">(4.5)</span>
    </div>
    <a href="{{ route('user.course.show', ['id' => $course->id, 'slug' => $course->slug]) }}" class="card-title">
      {{ $course->title }}
    </a>
    @if (isset($course->user) && $course->user != null)
      <a href="{{ route('instructor.profile', ['id' => $course->user->id, 'name' => $course->user->fname . ' ' . $course->user->lname]) }}"
        class="instructor">
        {{ __('frontstaticword.by') }} {{ $course->user->fname . ' ' . $course->user->lname }}
      </a>
    @endif
  </div>

  <div class="border-top d-flex align-items-center justify-content-between card-footer">
    @if ($course->type == 1)
      <div class="rate text-right">
        <ul>
          @if ($course->discount_price == !null)
            @if ($gsetting->currency_swipe == 1)
              <span class="fw-bold text-accent"><i class="{{ $currency->icon }}"></i>
                {{ $course->discount_price }}</span>&nbsp;
              <span class="fw-bold text-accent"><del><i class="{{ $currency->icon }}"></i>
                  {{ $course->price }}</del></span>
            @else
              <span class="fw-bold text-accent">{{ $course->discount_price }} <i
                  class="{{ $currency->icon }}"></i></span>&nbsp;
              <span class="fw-bold text-accent"><del>{{ $course->price }} <i
                    class="{{ $currency->icon }}"></i></del></span>
            @endif
          @else
            @if ($gsetting->currency_swipe == 1)
              <span class="fw-bold text-accent"><i class="{{ $currency->icon }}"></i> {{ $course->price }}</span>
            @else
              <span class="fw-bold text-accent">{{ $course->price }} <i class="{{ $currency->icon }}"></i></span>
            @endif
          @endif
        </ul>
      </div>
    @else
      <span class="fw-bold text-accent">{{ __('frontstaticword.Free') }}</span>
    @endif

    @if ($course->type == 1)
      @if (Auth::check())
        @if (Auth::User()->role == 'admin')
          <a href="{{ route('course.content', ['id' => $course->id, 'slug' => $course->slug]) }}"
            class="btn btn-accent-light btn-shake text-accent">
            {{ __('frontstaticword.GoToCourse') }}
            <figure class="anim">
              <svg>
                <use xlink:href="{{ asset('/front/svg/sprite.svg#arrow-circle-left') }}" />
              </svg>
            </figure>
          </a>
        @else
          @php
            $order = App\Order::where('user_id', Auth::User()->id)
                ->where('course_id', $course->id)
                ->where('status', 1)
                ->first();
          @endphp
          @if (!empty($order))
            <a href="{{ route('course.content', ['id' => $course->id, 'slug' => $course->slug]) }}"
              class="btn btn-accent-light btn-shake text-accent">
              {{ __('frontstaticword.GoToCourse') }}
              <figure class="anim">
                <svg>
                  <use xlink:href="{{ asset('/front/svg/sprite.svg#arrow-circle-left') }}" />
                </svg>
              </figure>
            </a>
          @else
            @php
              $cart = App\Cart::where('user_id', Auth::User()->id)
                  ->where('course_id', $course->id)
                  ->first();
            @endphp
            @if (!empty($cart))
              <a href="#"
                onclick="event.preventDefault(); document.getElementById('remove-from-cart-{{ $course->id }}').submit();"
                class="btn btn-accent-light btn-shake text-accent">
                {{ __('frontstaticword.RemoveFromCart') }}
                <figure class="anim">
                  <svg>
                    <use xlink:href="{{ asset('/front/svg/sprite.svg#arrow-circle-left') }}" />
                  </svg>
                </figure>
              </a>

              <form id="remove-from-cart-{{ $course->id }}" method="post"
                action="{{ route('remove.item.cart', $cart->id) }}" style="display: none;">
                {{ csrf_field() }}
              </form>
            @else
              <a href="#"
                onclick="event.preventDefault(); document.getElementById('add-to-cart-{{ $course->id }}').submit();"
                class="btn btn-accent-light btn-shake text-accent">
                {{ __('frontstaticword.AddToCart') }}
                <figure class="anim">
                  <svg>
                    <use xlink:href="{{ asset('/front/svg/sprite.svg#arrow-circle-left') }}" />
                  </svg>
                </figure>
              </a>
              <div class="protip-btn">
                <form id="add-to-cart-{{ $course->id }}" method="post"
                  action="{{ route('addtocart', ['course_id' => $course->id, 'price' => $course->price, 'discount_price' => $course->discount_price]) }}"
                  style="display: none;">
                  {{ csrf_field() }}
                  <input type="hidden" name="category_id" value="{{ $course->category->id }}" />
                </form>
              </div>
            @endif
          @endif
        @endif
      @else
        <a href="{{ route('login') }}" class="btn btn-accent-light btn-shake text-accent">
          {{ __('frontstaticword.AddToCart') }}
          <figure class="anim">
            <svg>
              <use xlink:href="{{ asset('/front/svg/sprite.svg#arrow-circle-left') }}" />
            </svg>
          </figure>
        </a>
      @endif
    @else
      @if (Auth::check())
        @if (Auth::User()->role == 'admin')
          <a href="{{ route('course.content', ['id' => $course->id, 'slug' => $course->slug]) }}"
            class="btn btn-accent-light btn-shake text-accent">
            {{ __('frontstaticword.GoToCourse') }}
            <figure class="anim">
              <svg>
                <use xlink:href="{{ asset('/front/svg/sprite.svg#arrow-circle-left') }}" />
              </svg>
            </figure>
          </a>
        @else
          @php
            $enroll = App\Order::where('user_id', Auth::User()->id)
                ->where('course_id', $course->id)
                ->first();
          @endphp
          @if ($enroll == null)
            <a href="{{ url('enroll/show', $course->id) }}" class="btn btn-accent-light btn-shake text-accent">
              {{ __('frontstaticword.EnrollNow') }}
              <figure class="anim">
                <svg>
                  <use xlink:href="{{ asset('/front/svg/sprite.svg#arrow-circle-left') }}" />
                </svg>
              </figure>
            </a>
          @else
            <a href="{{ route('course.content', ['id' => $course->id, 'slug' => $course->slug]) }}"
              class="btn btn-accent-light btn-shake text-accent">
              {{ __('frontstaticword.GoToCourse') }}
              <figure class="anim">
                <svg>
                  <use xlink:href="{{ asset('/front/svg/sprite.svg#arrow-circle-left') }}" />
                </svg>
              </figure>
            </a>
          @endif
        @endif
      @else
        <a href="{{ route('login') }}" class="btn btn-accent-light btn-shake text-accent">
          {{ __('frontstaticword.EnrollNow') }}
          <figure class="anim">
            <svg>
              <use xlink:href="{{ asset('/front/svg/sprite.svg#arrow-circle-left') }}" />
            </svg>
          </figure>
        </a>
      @endif
    @endif
  </div>

  {{-- @if ($status === 'progress')
    <div class="text-center">
      <div class="progress w-100 flex-grow-1 me-3" role="progressbar" aria-label="Basic example" aria-valuenow="73"
        aria-valuemin="0" aria-valuemax="100">
        <div class="progress-bar" style="width: 73%"></div>
      </div>
      <a href="{{ url('/enrolled') }}" class="mt-4 d-block">ابدأ الدورة</a>
    </div>
  @endif --}}
</section>
