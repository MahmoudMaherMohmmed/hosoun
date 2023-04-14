<div class="dropdown ms-2 ms-sm-4 flex-shrink-0">
  <button class="btn nav-btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    <svg class="svg-default">
      <use xlink:href="{{ asset('/front/svg/sprite.svg#notification') }}" />
    </svg>
  </button>
  <div class="dropdown-menu notifications">
    <h5 class="border-bottom p-4 m-3 mb-2 title">{{ __('frontstaticword.Notifications') }}</h5>
    <ul class="notifications-menu">
      @foreach(Auth()->user()->unreadNotifications as $notification)
        <li class="d-flex align-items-start w-100">
          <svg class="svg-default flex-shrink-0 me-3">
            <use xlink:href="{{ asset('/front/svg/sprite.svg#notification-status') }}" />
          </svg>
          <p class="mb-0">{{ str_limit($notification->data['data'], $limit = 20, $end = '...') }}</p>
          <svg class="flex-shrink-0 options ms-5">
            <use xlink:href="{{ asset('/front/svg/sprite.svg#dots') }}" />
          </svg>
        </li>
      @endforeach
    </ul>
  </div>
</div>
