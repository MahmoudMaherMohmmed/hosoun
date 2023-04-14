<section class="bg-accent fixed-bottom p-4 d-sm-none">
  <div class="container">
    <section class="row align-items-center">
      {{-- Back to main --}}
      <div class="col">
        <a href="" class="fw-bold d-flex align-items-center text-white">
          <svg class="svg-resize-20 svg-stroke-white -rotate-90 me-3">
            <use xlink:href="{{ asset('/front/svg/sprite.svg#chevron') }}" />
          </svg>
          العودة الى الرئيسية
        </a>
      </div>
      {{-- Redirect --}}
      <div class="col text-end">
        @yield('bottombar-redirect')
      </div>
    </section>
  </div>

</section>
