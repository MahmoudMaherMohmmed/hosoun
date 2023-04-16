<div class="offcanvas offcanvas-start" tabindex="-1" id="sidebar" aria-labelledby="sidebarLabel">
  <div class="offcanvas-header p-5">
    <button type="button" class="btn-close p-0 ms-auto" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body d-flex flex-column p-5">
    <ul class="navbar-nav flex-column">
      @include('front.layouts.navbar.nav')
      {{-- <li class="nav-item py-3">
        <a class="nav-link" href="{{ url('/') }}">{{ __('frontstaticword.Home') }}</a>
      </li>
      <li class="nav-item py-3">
        <a class="nav-link" href="{{ route('about.show') }}">
          {{ __('frontstaticword.Aboutus') }}
        </a>
      </li>
      <li class="nav-item py-3">
        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
          {{ __('frontstaticword.Courses') }}
        </a>
        @php
          $categories = App\Categories::with('subcategory')
              ->where('status', 1)
              ->orderBy('position', 'ASC')
              ->get();
        @endphp
        @if (!$categories->isEmpty())
          <ul class="dropdown-menu">
            @foreach ($categories as $category)
              <li>
                <a class="nav-link"
                  href="{{ route('category.page', ['id' => $category->id, 'category' => $category->title]) }}">
                  {{ str_limit($category->title, $limit = 25, $end = '..') }}
                </a>
              </li>
            @endforeach
          </ul>
        @endif
      </li>
      <li class="nav-item py-3">
        <a class="nav-link" href="{{ route('blog.all') }}">
          {{ __('frontstaticword.Blog') }}
        </a>
      </li>
      <li class="nav-item py-3">
        <a class="nav-link" href="{{ url('/user_contact') }}">{{ __('frontstaticword.Contactus') }}</a>
      </li> --}}
    </ul>
  </div>
</div>
