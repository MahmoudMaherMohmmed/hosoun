@php $languages = App\Language::all(); @endphp
@if (isset($languages) && count($languages) > 0)
  <div class="dropdown lang flex-shrink-0">
    <button class="btn nav-btn bg-transparent" type="button" data-bs-toggle="dropdown" aria-expanded="false">
      @if (Session::get('changed_language') == 'ar')
        <svg class="svg-resize-20">
          <use xlink:href="{{ asset('/front/svg/flags.svg#sa-ar') }}" />
        </svg>
      @else
        <svg class="svg-resize-20">
          <use xlink:href="{{ asset('/front/svg/flags.svg#usa-en') }}" />
        </svg>
      @endif
    </button>
    <div class="dropdown-menu p-4">
      @foreach ($languages as $language)
        @if($language->local != Session::get('changed_language'))
        <div class="d-flex align-items-center text-nowrap">
          <a href="{{ route('languageSwitch', $language->local) }}">
            @if ($language->local == 'ar')
              <svg class="svg-resize-20 me-2">
                <use xlink:href="{{ asset('/front/svg/flags.svg#sa-ar') }}" />
              </svg>
            @else
              <svg class="svg-resize-20">
                <use xlink:href="{{ asset('/front/svg/flags.svg#usa-en') }}" />
              </svg>
            @endif
            {{ $language->name }}
          </a>
        </div>
        @endif
      @endforeach
    </div>
  </div>
@endif
