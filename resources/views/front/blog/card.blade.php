<a href="{{ route('blog.detail', $blog->id) }}" class="d-block blog-card position-relative">
  <div class="blog-img w=100 h-100 overflow-hidden">
    <img src="{{ asset('images/blog/' . $blog->image) }}" class="img-fluid" alt="blog-img">
  </div>
  <section class="card-content position-absolute d-flex flex-column align-items-start">
    <span class="card-title text-white fw-bold d-inline-block">
      {{ $blog->heading }}
    </span>
    <span class="time">
      {{ $blog->created_at != null ? $blog->created_at->format('M d Y') : '' }}
    </span>
  </section>
</a>
