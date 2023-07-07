<div class="col-lg-4">
  <section class="filters offcanvas offcanvas-bottom" tabindex="-1" id="filter" aria-labelledby="filterLabel">
    @if ((isset($subcat) && count($subcat) > 0) || (isset($childcat) && count($childcat) > 0))
      <div class="filter-block">
        <h4 class="filter-title">{{ __('frontstaticword.SubCategories') }}</h4>
        <div class="filter-list">
          @if (isset($subcat))
            @foreach ($subcat as $cat)
              <div>
                <a href="{{ route('subcategory.page', ['id' => $cat->id, 'category' => str_slug(str_replace('-', '&', $cat->title))]) }}"
                  class="btn h-auto w-100 justify-content-between fw-light p-0">
                  {{ $cat->title }}
                  <svg class="svg-resize-15 svg-fill-accent">
                    <use xlink:href="{{ asset('/front/svg/sprite.svg#arrow-circle-left') }}" />
                  </svg>
                </a>
              </div>
            @endforeach
          @elseif(isset($childcat))
            @foreach ($childcat as $cat)
              <div>
                <a href="{{ route('childcategory.page', ['id' => $cat->id, 'category' => str_slug(str_replace('-', '&', $cat->title))]) }}"
                  class="btn h-auto w-100 justify-content-between fw-light p-0">
                  {{ $cat->title }}
                  <svg class="svg-resize-15 svg-fill-accent">
                    <use xlink:href="{{ asset('/front/svg/sprite.svg#arrow-circle-left') }}" />
                  </svg>
                </a>
              </div>
            @endforeach
          @endif
        </div>
      </div>
    @endif
    <div class="filter-block">
      <h4 class="filter-title">{{ __('frontstaticword.CourseType') }}</h4>
      <div class="filter-list">
        <div class="form-check">
          <input class="form-check-input type" type="checkbox" value="paid"
            {{ app('request')->input('type') == 'paid' ? 'checked' : '' }}>
          <label class="form-check-label" for="paid">
            {{ __('frontstaticword.Paid') }}
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input type" type="checkbox" value="free"
            {{ app('request')->input('type') == 'free' ? 'checked' : '' }}>
          <label class="form-check-label" for="free">
            {{ __('frontstaticword.Free') }}
          </label>
        </div>
      </div>
    </div>
    @php $course_languages = App\CourseLanguage::get(); @endphp
    @if ($course_languages->isNotEmpty())
      <div class="filter-block">
        <h4 class="filter-title">{{ __('frontstaticword.Language') }}</h4>
        <div class="filter-list">
          @foreach ($course_languages as $language)
            <div class="form-check">
              <input class="form-check-input lang" type="checkbox" value="{{ $language->id }}"
                id="{{ $language->name }}" {{ app('request')->input('lang') == $language->id ? 'checked' : '' }}>
              <label class="form-check-label" for="{{ $language->name }}">
                {{ $language->name }}
              </label>
            </div>
          @endforeach
        </div>
      </div>
    @endif
  </section>
</div>
