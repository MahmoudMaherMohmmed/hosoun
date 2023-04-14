<form id="search" class="d-flex position-relative" role="search">
  <input class="form-control me-2" type="search" placeholder="{{ $search_placeholder }}" aria-label="Search">
  <button class="btn position-absolute" type="submit">
    <svg class="svg-resize-24">
      <use xlink:href="{{ asset('/front/svg/sprite.svg#search') }}" />
    </svg>
  </button>
</form>
