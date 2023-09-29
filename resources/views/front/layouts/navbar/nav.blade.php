{{-- <ul class="navbar-nav justify-content-center mx-auto"> --}}
<li class="nav-item">
  <a class="nav-link p-0 active" href="{{ url('/') }}">
    {{ __('frontstaticword.Home') }}
  </a>
</li>
<li class="nav-item dropdown mega-drop">
  <a class="nav-link p-0 dropdown-toggle" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside"
    aria-expanded="false">
    {{ __('frontstaticword.Courseslist') }}
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
        @php $sub_categories= $category->subcategory->where('status', 1) @endphp
        <li>
          <div class="dropdown-item {{ $sub_categories != null && count($sub_categories) > 0 ? 'toggle' : '' }}">
            <a class=""
              href="{{ route('category.page', ['id' => $category->id, 'category' => $category->title]) }}">
              {{ str_limit($category->title, $limit = 25, $end = '..') }}
            </a>
          </div>
          @if ($sub_categories != null && count($sub_categories) > 0)
            <ul class="submenu dropdown-menu">
              @foreach ($sub_categories as $sub_category)
                @php $child_categories= $sub_category->childcategory->where('status', 1) @endphp
                <li>
                  <div
                    class="dropdown-item {{ $child_categories != null && count($child_categories) > 0 ? 'toggle' : '' }}">
                    <a
                      href="{{ route('subcategory.page', ['id' => $sub_category->id, 'category' => $sub_category->title]) }}">
                      {{ str_limit($sub_category->title, $limit = 25, $end = '..') }}
                    </a>
                  </div>
                  @if ($child_categories != null && count($child_categories) > 0)
                    <ul class="submenu dropdown-menu">
                      @foreach ($child_categories as $child_category)
                        <li>
                          <a class="dropdown-item"
                            href="{{ route('childcategory.page', ['id' => $child_category->id, 'category' => $child_category->title]) }}">
                            {{ str_limit($child_category->title, $limit = 25, $end = '..') }}
                          </a>
                        </li>
                      @endforeach
                    </ul>
                  @endif
                </li>
              @endforeach
            </ul>
          @endif
        </li>
      @endforeach
    </ul>
  @endif
</li>


{{-- <li class="nav-item">
  <a class="nav-link p-0" href="">
    {{ __('frontstaticword.Quizzes') }}
  </a>
</li> --}}
<li class="nav-item">
  <a class="nav-link p-0" href="{{ route('instructors.all') }}">
    {{ __('frontstaticword.Instructors') }}
  </a>
</li>
<li class="nav-item">
  <a class="nav-link p-0" href="{{ route('browse.book.categories') }}">
    {{ __('frontstaticword.Books') }}
  </a>
</li>
<li class="nav-item">
  <a class="nav-link p-0" href="{{ route('blog.all') }}">
    {{ __('frontstaticword.Blog') }}
  </a>
</li>
<li class="nav-item">
  <a class="nav-link p-0" href="{{ url('/user_contact') }}">
    {{ __('frontstaticword.Contactus') }}
  </a>
</li>
{{-- </ul> --}}
