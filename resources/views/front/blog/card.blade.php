<section class="blog-card position-relative">
  <div class="blog-img w=100 h-100 overflow-hidden">
    <img src="{{ asset('images/blog/' . $blog->image) }}" class="img-fluid" alt="blog-img">
  </div>
  <section class="card-content position-absolute d-flex flex-column align-items-start">
    <a href="{{ route('blog.detail', $blog->id) }}" class="card-title text-white fw-bold d-inline-block">
      {{ $blog->heading }}
    </a>
    <span class="time">
      {{ $blog->created_at != null ? $blog->created_at->format('M d Y') : '' }}
    </span>
  </section>
</section>
