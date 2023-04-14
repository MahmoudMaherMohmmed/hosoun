<section class="blog-card">
  <img src="{{ asset('images/blog/' . $blog->image) }}" class="img-fluid" alt="blog-img">
  <section class="card-content">
    <span class="text-accent-2">{{ $blog->created_at != null ? $blog->created_at->format('M d Y') : '' }}
      {{ $blog->user != null ? '/' : '' }}
      {{ $blog->user != null ? $blog->user->fname . ' ' . $blog->user->lname : '/' }}</span>
    <h3 class="card-title">{{ $blog->heading }}</h3>
    <p class="text-dim">{!! \Illuminate\Support\Str::words($blog->detail, $words = 10, $end = '...') !!}</p>

    <a href="{{ route('blog.detail', $blog->id) }}" class="d-flex align-items-center text-accent fw-bold mt-3 btn-shake">
      {{ __('frontstaticword.ViewMore') }}
      <figure class="anim">
        <svg class="svg-default ms-3">
          <use xlink:href="{{ asset('/front/svg/sprite.svg#arrow-left') }}" />
        </svg>
      </figure>
    </a>
  </section>
</section>
