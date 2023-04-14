<div class="course-enroll-card">
  <!-- Course Image -->
  @if($course->preview_image !== NULL && $course->preview_image !== '')
    <img src="{{ asset('images/course/'.$course->preview_image) }}" alt="{{ $course->title }}" class="course-img">
  @else
    <img src="{{ Avatar::create($course->title)->toBase64() }}" alt="{{ $course->title }}" class="course-img">
  @endif

  <!-- Course Tage -->
  @if($course->course_tags == !NULL)
  <div class="d-flex flex-wrap align-items-center tags mb-4">
    @foreach($course->course_tags as $tag)
      <span class="tag"><i class="fa fa-tags"></i> &nbsp; {{ $tag }}</span>
    @endforeach
  </div>
  @endif

  <!-- Course Price -->
  @if ($course->type == 1)
    @if ($course->discount_price == !null)
      @if ($gsetting->currency_swipe == 1)
        <div class="text-accent fw-bold price"><i class="{{ $currency->icon }}"></i>
          {{ $course->discount_price }}</div>
      @else
        <div class="text-accent fw-bold price">{{ $course->discount_price }} <i
            class="{{ $currency->icon }}"></i></div>
      @endif
    @else
      @if ($gsetting->currency_swipe == 1)
        <div class="text-accent fw-bold price"><i class="{{ $currency->icon }}"></i> {{ $course->price }}</div>
      @else
        <div class="text-accent fw-bold price">{{ $course->price }} <i class="{{ $currency->icon }}"></i></div>
      @endif
    @endif
  @else
    <div class="text-accent fw-bold price">{{ __('frontstaticword.Free') }}</div>
  @endif

  <!-- Course Info -->
  <ul class="info-list">
    <li class="text-dim">   
      {{ __('frontstaticword.Created') }} : <span class="fw-bold text-black">{{  isset($course->user) ?  $course->user->fname . ' ' . $course->user->lname : '' }}</span>
    </li>
    <li class="text-dim">
      {{ __('frontstaticword.LastUpdated') }} : <span class="text-black">{{ date('jS F Y', strtotime($course->updated_at)) }}</span>
    </li>
    @if($course->language_id == !NULL)
      <li class="text-dim">
      {{ __('frontstaticword.Language') }} : <span class="text-black">{{ $course->language->name }}</span>
      </li>
    @endif
  </ul>

  <!-- Course Entroll -->
  @if ($course->type == 1)
      @if (Auth::check())
        @if (Auth::User()->role == 'admin')
          <a href="{{ route('course.content', ['id' => $course->id, 'slug' => $course->slug]) }}"
            class="btn btn-accent w-100">
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
            <a href="{{ route('course.content', ['id' => $course->id, 'slug' => $course->slug]) }}"
              class="btn btn-accent w-100">
              {{ __('frontstaticword.GoToCourse') }}
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
                class="btn btn-accent w-100">
                {{ __('frontstaticword.RemoveFromCart') }}
              </a>

              <form id="remove-from-cart-{{ $course->id }}" method="post"
                action="{{ route('remove.item.cart', $cart->id) }}" style="display: none;">
                {{ csrf_field() }}
              </form>
            @else
              <a href="#"
                onclick="event.preventDefault(); document.getElementById('add-to-cart-{{ $course->id }}').submit();"
                class="btn btn-accent w-100">
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
        <a href="{{ route('login') }}" class="btn btn-accent w-100">
          {{ __('frontstaticword.AddToCart') }}
        </a>
      @endif
    @else
      @if (Auth::check())
        @if (Auth::User()->role == 'admin')
          <a href="{{ route('course.content', ['id' => $course->id, 'slug' => $course->slug]) }}"
            class="btn btn-accent w-100">
            {{ __('frontstaticword.GoToCourse') }}
          </a>
        @else
          @php
            $enroll = App\Order::where('user_id', Auth::User()->id)
                ->where('course_id', $course->id)
                ->first();
          @endphp
          @if ($enroll == null)
            <a href="{{ url('enroll/show', $course->id) }}" class="btn btn-accent w-100">
              {{ __('frontstaticword.EnrollNow') }}
            </a>
          @else
            <a href="{{ route('course.content', ['id' => $course->id, 'slug' => $course->slug]) }}"
              class="btn btn-accent w-100">
              {{ __('frontstaticword.GoToCourse') }}
            </a>
          @endif
        @endif
      @else
        <a href="{{ route('login') }}" class="btn btn-accent w-100">
          {{ __('frontstaticword.EnrollNow') }}
        </a>
      @endif
    @endif
  </div>
</div>
