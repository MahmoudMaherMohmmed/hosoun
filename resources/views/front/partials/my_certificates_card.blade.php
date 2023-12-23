<section class="course-card position-relative">
  @if ($certificate->image != null && $certificate->image !== '')
    <a href="{{ url('/images/certificates/'.$certificate->file) }}" class="img d-inline-block">
      <img src="{{ url('/images/certificates/'.$certificate->image) }}" alt="{{ $certificate->title }}">
    </a>
  @else
    <a href="{{ url('/images/certificates/'.$certificate->file) }}" class="img d-inline-block">
      <img src="{{ Avatar::create($certificate->title)->toBase64() }}" alt="{{ $certificate->title }}">
    </a>
  @endif



  <div class="border-top card-footer">

      <div class="text-center">

        <a href="{{ url('/images/certificates/'.$certificate->file) }}"
          class="mt-4 d-block">
{{--            {{ __('frontstaticword.preview') }}--}}
      {{ $certificate->title }}
        </a>
      </div>
  </div>
</section>
