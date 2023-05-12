<section class="boxcourse position-relative overflow-hidden">
  @if ($course->preview_image != null && $course->preview_image !== '')
    <div class="boxcourse__thu position-absolute"
      style="background: no-repeat center/cover url('{{ asset('images/course/' . $course->preview_image) }}') var(--clr-light)">
    </div>
  @else
    <div class="boxcourse__thu position-absolute"
      style="background-image: {{ Avatar::create($course->title)->toBase64() }}"></div>
  @endif

  @if ($course['level_tags'] == !null)
    <div class="boxcourse__label position-absolute bg-dark-accent text-white lh-sm rounded-pill py-3 px-4 ">
      {{ $course['level_tags'] }}
    </div>
  @endif

  @if ($course->discount_price == !null && $course->price > 0)
    <div class="boxcourse__discount position-absolute lh-sm text-white rounded-pill py-3 px-4">
      -{{ number_format((($course->price - $course->discount_price) * 100) / $course->price, 1) }}%
    </div>
  @endif

  <div class="boxcourse__blank"></div>
  <section class="boxcourse__content position-relative">
    <div class="d-flex flex-column pt-5">
      <span class="rating-readonly"></span>
      <a href="{{ route('course.content', ['id' => $course->id, 'slug' => $course->slug]) }}"
        class="fs-20 fw-bold mt-4">
        {{ $course->title }} </a>
      <div class="d-flex align-items-center mt-4 mb-5">
        @if ($course->type == 1)
          @if ($course->discount_price == !null)
            @if ($gsetting->currency_swipe == 1)
              <p class="text-dark-accent fs-1 fw-bold">
                <span class="fs-5"><i class="{{ $currency->icon }}"></i></span> {{ $course->discount_price }}
              </p>

              <p class="text-dim text-decoration-line-through fs-1 fw-bold ms-4 ps-2">
                <span class="fs-5">
                  <i class="{{ $currency->icon }}"></i>
                </span>
                {{ $course->price }}
              </p>
            @else
              <p class="text-dark-accent fs-1 fw-bold">
                {{ $course->discount_price }}
                <span class="fs-5">
                  <i class="{{ $currency->icon }}"></i>
                </span>
              </p>

              <p class="text-dim text-decoration-line-through fs-1 fw-bold ms-4 ps-2">
                {{ $course->price }} <span class="fs-5">
                  <i class="{{ $currency->icon }}"></i>
                </span>
              </p>
            @endif
          @else
            @if ($gsetting->currency_swipe == 1)
              <p class="text-dark-accent fs-1 fw-bold">
                <span class="fs-5">
                  <i class="{{ $currency->icon }}"></i>
                </span>
                {{ $course->price }}
              </p>
            @else
              <p class="text-dark-accent fs-1 fw-bold">
                {{ $course->price }}
                <span class="fs-5">
                  <i class="{{ $currency->icon }}"></i>
                </span>
              </p>
            @endif
          @endif
        @else
          <p class="text-dark-accent fs-1 fw-bold">
            {{ __('frontstaticword.Free') }}
          </p>
        @endif
      </div>
      <div class="d-flex boxcourse__buttons">
        <!---------------------- Cart ---------------------------------->
        @if ($course->type == 1)
          @if (Auth::check())
            @if (Auth::User()->role == 'admin')
              <a class="btn btn-accent flex-grow-1"
                href="{{ route('course.content', ['id' => $course->id, 'slug' => $course->slug]) }}">
                <svg class="svg-resize-24 svg-fill-white">
                  <use xlink:href="{{ asset('/front/svg/sprite.svg#arrow-circle') }}" />
                </svg>
                {{ __('frontstaticword.GoToCourse') }}
              </a>
            @else
              @php
                $order = App\Order::where('user_id', Auth::User()->id)
                    ->where('course_id', $course->id)
                    ->where('status', 1)
                    ->first();
              @endphp
              @if (!empty($order))
                <a class="btn btn-accent flex-grow-1"
                  href="{{ route('course.content', ['id' => $course->id, 'slug' => $course->slug]) }}">
                  <svg class="svg-resize-24 svg-fill-white">
                    <use xlink:href="{{ asset('/front/svg/sprite.svg#arrow-circle') }}" />
                  </svg>
                  {{ __('frontstaticword.GoToCourse') }}
                </a>
              @else
                @php
                  $cart = App\Cart::where('user_id', Auth::User()->id)
                      ->where('course_id', $course->id)
                      ->first();
                @endphp
                @if (!empty($cart))
                  <a class="btn btn-accent flex-grow-1" href="#"
                    onclick="event.preventDefault(); document.getElementById('remove-from-cart-{{ $course->id }}').submit();">
                    <svg class="svg-resize-24 svg-fill-white">
                      <use xlink:href="{{ asset('/front/svg/sprite.svg#cart') }}" />
                    </svg>
                    {{ __('frontstaticword.RemoveFromCart') }}
                  </a>

                  <form id="remove-from-cart-{{ $course->id }}" method="post"
                    action="{{ route('remove.item.cart', $cart->id) }}" style="display: none;">
                    {{ csrf_field() }}
                  </form>
                @else
                  <a class="btn btn-accent flex-grow-1" href="#"
                    onclick="event.preventDefault(); document.getElementById('add-to-cart-{{ $course->id }}').submit();">
                    <svg class="svg-resize-24 svg-fill-white">
                      <use xlink:href="{{ asset('/front/svg/sprite.svg#cart') }}" />
                    </svg>
                    {{ __('frontstaticword.AddToCart') }}
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
            <a class="btn btn-accent flex-grow-1" href="{{ route('login') }}">
              <svg class="svg-resize-24 svg-fill-white">
                <use xlink:href="{{ asset('/front/svg/sprite.svg#cart') }}" />
              </svg>
              {{ __('frontstaticword.AddToCart') }}
            </a>
          @endif
        @else
          @if (Auth::check())
            @if (Auth::User()->role == 'admin')
              <a class="btn btn-accent flex-grow-1"
                href="{{ route('course.content', ['id' => $course->id, 'slug' => $course->slug]) }}">
                <svg class="svg-resize-24 svg-fill-white">
                  <use xlink:href="{{ asset('/front/svg/sprite.svg#arrow-circle') }}" />
                </svg>
                {{ __('frontstaticword.GoToCourse') }}
              </a>
            @else
              @php
                $enroll = App\Order::where('user_id', Auth::User()->id)
                    ->where('course_id', $course->id)
                    ->first();
              @endphp
              @if ($enroll == null)
                <a class="btn btn-accent flex-grow-1" href="{{ url('enroll/show', $course->id) }}">
                  <svg class="svg-resize-24 svg-fill-white">
                    <use xlink:href="{{ asset('/front/svg/sprite.svg#arrow-circle') }}" />
                  </svg>
                  {{ __('frontstaticword.EnrollNow') }}
                </a>
              @else
                <a class="btn btn-accent flex-grow-1"
                  href="{{ route('course.content', ['id' => $course->id, 'slug' => $course->slug]) }}">
                  <svg class="svg-resize-24 svg-fill-white">
                    <use xlink:href="{{ asset('/front/svg/sprite.svg#arrow-circle') }}" />
                  </svg>
                  {{ __('frontstaticword.GoToCourse') }}
                </a>
              @endif
            @endif
          @else
            <a class="btn btn-accent flex-grow-1" href="{{ route('login') }}">
              <svg class="svg-resize-24 svg-fill-white">
                <use xlink:href="{{ asset('/front/svg/sprite.svg#arrow-circle') }}" />
              </svg>
              {{ __('frontstaticword.EnrollNow') }}
            </a>
          @endif
        @endif

        <!------------------------ Wishlist ---------------------------->
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

              <button class="btn rounded-circle flex-shrink-0">
                <svg class="svg-resize-24 svg-stroke-accent">
                  <use xlink:href="{{ asset('/front/svg/sprite.svg#heart') }}" />
                </svg>
              </button>
            </form>
          @else
            <form method="post" action="{{ url('remove/wishlist', $course->id) }}">
              {{ csrf_field() }}
              <input type="hidden" name="user_id" value="{{ Auth::User()->id }}" />
              <input type="hidden" name="course_id" value="{{ $course->id }}" />

              <button class="btn rounded-circle flex-shrink-0">
                <svg class="svg-resize-24 svg-stroke-accent">
                  <use xlink:href="{{ asset('/front/svg/sprite.svg#trash') }}" />
                </svg>
              </button>
            </form>
          @endif
        @else
          <a href="{{ route('login') }}" class="btn rounded-circle flex-shrink-0">
            <svg class="svg-resize-24 svg-stroke-accent">
              <use xlink:href="{{ asset('/front/svg/sprite.svg#heart') }}" />
            </svg>
          </a>
        @endif
      </div>
    </div>
  </section>
</section>
