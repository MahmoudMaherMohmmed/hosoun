<div class="dropdown auth-user ms-2 ms-sm-4 flex-shrink-0">
  <button class="btn ms-md-3" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    @if (Auth::User()['user_img'] != null &&
            Auth::User()['user_img'] != '' &&
            @file_get_contents('images/user_img/' . Auth::user()['user_img']))
      <img src="{{ url('/images/user_img/' . Auth::User()->user_img) }}"
        alt="{{ Auth::User()->fname . ' ' . Auth::User()->lname }}">
    @else
      <img src="{{ asset('images/default/user.jpg') }}" alt="{{ Auth::User()->fname . ' ' . Auth::User()->lname }}">
    @endif
    <svg class="d-none d-md-inline-block svg-stroke-black" style="width: 1.5rem; height: 1.5rem">
      <use xlink:href="{{ asset('/front/svg/sprite.svg#chevron') }}" />
    </svg>
  </button>
  <div class="dropdown-menu">
    <div class="content">
      {{-- user info --}}
      <div class="d-flex align-items-center user border-bottom pb-4">
        @if (Auth::User()['user_img'] != null &&
                Auth::User()['user_img'] != '' &&
                @file_get_contents('images/user_img/' . Auth::user()['user_img']))
          <img src="{{ url('/images/user_img/' . Auth::User()->user_img) }}"
            alt="{{ Auth::User()->fname . ' ' . Auth::User()->lname }}">
        @else
          <img src="{{ asset('images/default/user.jpg') }}" alt="{{ Auth::User()->fname . ' ' . Auth::User()->lname }}">
        @endif
        <div class="d-flex flex-column ms-3">
          <h5 class="fw-bold text">{{ Auth::User()->fname . ' ' . Auth::User()->lname }}</h5>
          <h6 class="fw-light mt-3 text-dim text">{{ Auth::User()->email }}</h6>
        </div>
      </div>
      {{-- Menu --}}
      <ul class="menu p-0">
        @if (Auth::User()->role == 'admin')
          <li>
            <a class="dropdown-item fw-bold" href="{{ url('/admins') }}" target="_blank">
              <svg class="svg-default">
                <use xlink:href="{{ asset('/front/svg/sprite.svg#setting') }}" />
              </svg>
              <span> {{ __('frontstaticword.AdminDashboard') }} </span>
            </a>
          </li>
        @endif
        @if (Auth::User()->role == 'instructor')
          <li>
            <a class="dropdown-item fw-bold" href="{{ url('/instructor') }}" target="_blank">
              <svg class="svg-default">
                <use xlink:href="{{ asset('/front/svg/sprite.svg#note') }}" />
              </svg>
              <span> {{ __('frontstaticword.InstructorDashboard') }} </span>
            </a>
          </li>
        @endif
        <li>
          <a class="dropdown-item fw-bold" href="{{ route('profile.show', Auth::User()->id) }}">
            <svg class="svg-default">
              <use xlink:href="{{ asset('/front/svg/sprite.svg#profile-circle') }}" />
            </svg>
            <span> {{ __('frontstaticword.UserProfile') }} </span>
          </a>
        </li>
        <li>
        <li>
          <a class="dropdown-item fw-bold" href="{{ url('bankdetail') }}">
            <svg class="svg-default">
              <use xlink:href="{{ asset('/front/svg/sprite.svg#cards') }}" />
            </svg>
            <span> {{__('frontstaticword.MyBankDetails')}} </span>
          </a>
        </li>
        <li>
          <a class="dropdown-item fw-bold" href="{{ route('mycourse.show') }}">
            <svg class="svg-default">
              <use xlink:href="{{ asset('/front/svg/sprite.svg#note') }}" />
            </svg>
            <span> {{ __('frontstaticword.MyCourses') }} </span>
          </a>
        </li>
        <li>
          <a class="dropdown-item fw-bold" href="{{ route('wishlist.show') }}">
            <svg class="svg-default">
              <use xlink:href="{{ asset('/front/svg/sprite.svg#heart') }}" />
            </svg>
            <span> {{ __('frontstaticword.MyWishlist') }} </span>
          </a>
        </li>
        <li>
          <a class="dropdown-item fw-bold" href="{{ route('purchase.show') }}">
            <svg class="svg-default">
              <use xlink:href="{{ asset('/front/svg/sprite.svg#receipt-text') }}" />
            </svg>
            <span> {{ __('frontstaticword.PurchaseHistory') }} </span>
          </a>
        </li>
        @if (Auth::User()->role == 'user')
          @if ($gsetting->instructor_enable == 1)
            <li>
              <a class="dropdown-item fw-bold pb-0" href="{{ route('beinstructor.show') }}">
                <svg class="svg-default">
                  <use xlink:href="{{ asset('/front/svg/sprite.svg#user-add') }}" />
                </svg>
                <span> {{ __('frontstaticword.BecomeAnInstructor') }} </span>
              </a>
            </li>
          @endif
        @endif
      </ul>
    </div>
    <div class="text-center border-top py-4">
      <form action="{{ route('logout') }}" method="POST">
        @csrf

        <button id="logout" class="btn text-dim fw-bold py-2">{{ __('frontstaticword.Logout') }}</button>
      </form>
    </div>
  </div>
</div>
