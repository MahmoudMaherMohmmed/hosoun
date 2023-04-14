<div class="cart-item">
  <div class="d-flex flex-column flex-sm-row align-items-sm-center me-5">
    @if($cart->course_id != NULL)
      @if($cart->courses->preview_image !== NULL && $cart->courses->preview_image !== '')
        <a href="{{ route('user.course.show',['id' => $cart->courses->id, 'slug' => $cart->courses->slug ]) }}">
          <img src="{{ asset('images/course/'. $cart->courses->preview_image) }}" alt="{{$cart->courses->title}}" class="mb-5 mb-sm-0">
        </a>
      @else
        <a href="{{ route('user.course.show',['id' => $cart->courses->id, 'slug' => $cart->courses->slug ]) }}">
          <img src="{{ Avatar::create($cart->courses->title)->toBase64() }}" alt="{{$cart->courses->title}}" class="mb-5 mb-sm-0">
        </a>
      @endif
    @else
      @if($cart->bundle->preview_image !== NULL && $cart->bundle->preview_image !== '')
        <a href="{{ route('user.course.show',['id' => $cart->bundle->id, 'slug' => $cart->bundle->slug ]) }}">
          <img src="{{ asset('images/bundle/'. $cart->bundle->preview_image) }}" alt="{{$cart->bundle->title}}" class="mb-5 mb-sm-0">
        </a>
      @else
        <a href="{{ route('user.course.show',['id' => $cart->bundle->id, 'slug' => $cart->bundle->slug ]) }}">
          <img src="{{ Avatar::create($cart->bundle->title)->toBase64() }}" alt="{{$cart->bundle->title}}" class="mb-5 mb-sm-0">
        </a>
      @endif
    @endif
    <div class="content">
      @if($cart->course_id != NULL)
        <h4><a href="{{ route('user.course.show',['id' => $cart->courses->id, 'slug' => $cart->courses->slug ]) }}">{{ $cart->courses->title }}</a></h4>
        <span class="text-dim fs-14 subtitle">{{ $cart->courses->user->fname }}</span>
      @else
        <h4><a href="{{ route('user.course.show',['id' => $cart->bundle->id, 'slug' => $cart->bundle->slug ]) }}">{{ $cart->bundle->title }}</a></h4>
        <span class="text-dim fs-14 subtitle"> {{ $cart->bundle->user->fname }}</span>
      @endif
      @if($cart->offer_price == !NULL)
        @if($gsetting['currency_swipe'] == 1)
          <span class="text-accent f2-3 fw-bold"><i class="{{ $currency->icon }}"></i> {{ $cart->offer_price }}</span>
          <span class="text-accent f2-3 fw-bold"><s><i class="{{ $currency->icon }}"></i> {{ $cart->price }}</s></span>
        @else
          <span class="text-accent f2-3 fw-bold">{{ $cart->offer_price }} <i class="{{ $currency->icon }}"></i></span>
          <span class="text-accent f2-3 fw-bold"><s>{{ $cart->price }} <i class="{{ $currency->icon }}"></i></s></span>
        @endif
      @else
        @if($gsetting['currency_swipe'] == 1)
          <span class="text-accent f2-3 fw-bold"><i class="{{ $currency->icon }}"></i> {{ $cart->price }}</span>
        @else
          <span class="text-accent f2-3 fw-bold">{{ $cart->price }} <i class="{{ $currency->icon }}"></i></span>
        @endif
      @endif
    </div>
  </div>
  <div class="d-flex align-items-center ms-auto actions">
    <form method="post" action="{{ url('show/wishlist', $cart->id ) }}">
        {{ csrf_field() }}
        <input type="hidden" name="user_id"  value="{{Auth::User()->id}}" />
        <input type="hidden" name="course_id"  value="{{$cart->course_id}}" />

        <button class="btn btn-accent-light">
        <svg class="svg-default">
          <use xlink:href="{{ asset('/front/svg/sprite.svg#heart') }}" />
        </svg>
      </button>
    </form>
    <form method="post" action="{{url('removefromcart', $cart->id)}}">
        {{ csrf_field() }}
        
        <button class="btn btn-inline ms-3">
          <svg class="svg-resize-24 svg-stroke-danger">
            <use xlink:href="{{ asset('/front/svg/sprite.svg#trash') }}" />
          </svg>
        </button>
    </form>
  </div>
</div>
