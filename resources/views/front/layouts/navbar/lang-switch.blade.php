{{-- Language Switcher Btn --}}
@php $languages = App\Language::all(); @endphp
@if (isset($languages) && count($languages) > 0)
  @foreach ($languages as $language)
    @if ($language->local != Session::get('changed_language'))
      <a href="{{ route('languageSwitch', $language->local) }}" class="btn nav-btn lang flex-shrink-0 text-uppercase">
        {{ $language->local }}
      </a>
    @endif
  @endforeach
@endif
