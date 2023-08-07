<div class="dropdown auth-user ms-3 flex-shrink-0">
  <button class="btn btn-accent d-xl-inline-flex" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    <svg class="svg-resize-24 svg-fill-white flex-shrink-0">
      <use xlink:href="{{ asset('/front/svg/sprite.svg#user') }}" />
    </svg>
    <span class="d-none d-xl-inline-block">
      {{ __('frontstaticword.MyAccount') }}
    </span>
    <svg class="d-none d-xl-inline-block svg-resize-24 svg-fill-white flex-shrink-0">
      <use xlink:href="{{ asset('/front/svg/sprite.svg#arrow-solid') }}" />
    </svg>
  </button>
  <div class="dropdown-menu">
    <div class="content">
      {{-- user info --}}
      <div class="d-flex align-items-center user border-bottom pb-4">
        @if (Auth::User()['user_img'] != null &&
                Auth::User()['user_img'] != '' &&
                @file_get_contents('images/user_img/' . Auth::user()['user_img']))
          <img class="flex-shrink-0" src="{{ url('/images/user_img/' . Auth::User()->user_img) }}"
            alt="{{ Auth::User()->fname . ' ' . Auth::User()->lname }}">
        @else
          <img class="flex-shrink-0" src="{{ asset('images/default/user.jpg') }}"
            alt="{{ Auth::User()->fname . ' ' . Auth::User()->lname }}">
        @endif
        <div class="d-flex flex-column ms-3 w-75">
          <h5 class="fw-semibold text">
            {{ Auth::User()->fname . ' ' . Auth::User()->lname }}
          </h5>
          <h6 class="fw-normal mt-3 text-dim text">
            {{ Auth::User()->email }}
          </h6>
        </div>
      </div>
      {{-- Menu --}}
      <ul class="menu p-0">
        @if (Auth::User()->role == 'admin')
          <li>
            <a class="dropdown-item fw-semibold" href="{{ url('/admins') }}" target="_blank">
              <svg class="svg-default">
                <use xlink:href="{{ asset('/front/svg/sprite.svg#setting') }}" />
              </svg>
              <span> {{ __('frontstaticword.AdminDashboard') }} </span>
            </a>
          </li>
        @endif
        @if (Auth::User()->role == 'instructor')
          <li>
            <a class="dropdown-item fw-semibold" href="{{ url('/instructor') }}" target="_blank">
              <svg class="svg-default">
                <use xlink:href="{{ asset('/front/svg/sprite.svg#note') }}" />
              </svg>
              <span> {{ __('frontstaticword.InstructorDashboard') }} </span>
            </a>
          </li>
        @endif
        <li>
          <a class="dropdown-item fw-semibold" href="{{ route('profile.show', Auth::User()->id) }}">
            <svg class="svg-default">
              <use xlink:href="{{ asset('/front/svg/sprite.svg#profile-circle') }}" />
            </svg>
            <span> {{ __('frontstaticword.UserProfile') }} </span>
          </a>
        </li>
        <li>
        @if (Auth::User()->role != 'user')
        <li>
          <a class="dropdown-item fw-semibold" href="{{ url('bankdetail') }}">
            <svg class="svg-default">
              <use xlink:href="{{ asset('/front/svg/sprite.svg#cards') }}" />
            </svg>
            <span> {{ __('frontstaticword.MyBankDetails') }} </span>
          </a>
        </li>
        @endif
        <li>
          <a class="dropdown-item fw-semibold" href="{{ route('mycourse.show') }}">
            <svg class="svg-default">
              <use xlink:href="{{ asset('/front/svg/sprite.svg#note') }}" />
            </svg>
            <span> {{ __('frontstaticword.MyCourses') }} </span>
          </a>
        </li>
        <li>
          <a class="dropdown-item fw-semibold" href="{{ route('wishlist.show') }}">
            <svg class="svg-default">
              <use xlink:href="{{ asset('/front/svg/sprite.svg#heart') }}" />
            </svg>
            <span> {{ __('frontstaticword.MyWishlist') }} </span>
          </a>
        </li>
        @if (Auth::User()->role != 'admin')
        <li>
          <a class="dropdown-item fw-semibold" href="{{ route('purchase.show') }}">
            <svg class="svg-default">
              <use xlink:href="{{ asset('/front/svg/sprite.svg#receipt-text') }}" />
            </svg>
            <span> {{ __('frontstaticword.PurchaseHistory') }} </span>
          </a>
        </li>
        @endif
        @if (Auth::User()->role == 'user')
          @if ($gsetting->instructor_enable == 1)
            <li>
              <a class="dropdown-item fw-semibold pb-0" href="{{ route('beinstructor.show') }}">
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
    <form id="logout" class="text-center border-top py-4" action="{{ route('logout') }}" method="POST">
      @csrf
      <button type="submit" class="border-0 bg-transparent fw-semibold p-0 fs-14">
        {{ __('frontstaticword.Logout') }}
      </button>
    </form>
  </div>
</div>
