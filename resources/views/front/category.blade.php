@extends('front.layouts.master')

@section('title')
  {{ $cats->title }}
@endsection

@section('content')
  @include('front.layouts.page_header', ['title' => $cats->title])
  <section class="block-sec">
    <div class="container">
      <div class="row">
        @include('front.category.filter')

        <div class="col-12 col-lg-8">
          {{-- title --}}
          <div class="d-flex align-items-center justify-content-between mb-4 pb-3">
            <h2 class="category-title">{{ $cats->title }}</h2>
            <a class="btn px-0 d-lg-none" data-bs-toggle="offcanvas" href="#filter" role="button" aria-controls="filter">
              <svg class="svg-default">
                <use xlink:href="{{ asset('/front/svg/sprite.svg#filter') }}" />
              </svg>
              {{ __('frontstaticword.Filtering') }}
            </a>
          </div>
          {{-- SearchResults --}}
          @include('front.category.search_results')

          {{-- SearchResultsCourse --}}
          @if (!$courses->isEmpty())
            @foreach ($courses as $course)
              @include('front.category.course')
            @endforeach
          @else
            {{-- Empty Status --}}
            <div class="col-12">
              <div class="main-block text-center d-flex flex-column align-items-center justify-content-center">
                <svg class="svg-resize-32 svg-stroke-accent mb-4">
                  <use xlink:href="{{ asset('/front/svg/sprite.svg#book-square') }}" />
                </svg>
                لا توجد دورات في هذا القسم حتى الآن
              </div>
            </div>
          @endif
        </div>
      </div>
    </div>
  </section>
@endsection


@section('custom-js')
  <script>
    $(document).ready(function() {
      $("select").select2({
        minimumResultsForSearch: 8,
        dropdownCssClass: "sortby-dropdown"
      });
    });
  </script>

  <script type="text/javascript">
    var getUrlParameter = function getUrlParameter(sParam) {
      var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;
      for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] === sParam) {
          return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
      }
    };

    $('.type').on('click', function() {
      if ($(this).is(':checked')) {
        var type = $(this).val();
        var exist = window.location.href;
        var url = new URL(exist);
        var query_string = url.search;
        var search_params = new URLSearchParams(query_string);
        search_params.set('type', type);
        url.search = search_params.toString();
        var new_url = url.toString();
        window.history.pushState('page2', 'Title', new_url);
      } else {
        var element = '&type=' + getUrlParameter('type');
        var exist = window.location.href;
        var new_url = exist.replace(element, '');
        window.history.pushState('page2', 'Title', new_url);
      }

      location.reload();
    });


    $('.lang').on('click', function() {
      if ($(this).is(':checked')) {
        var type = $(this).val();
        var exist = window.location.href;
        var url = new URL(exist);
        var query_string = url.search;
        var search_params = new URLSearchParams(query_string);
        search_params.set('lang', type);
        url.search = search_params.toString();
        var new_url = url.toString();
        window.history.pushState('page2', 'Title', new_url);
      } else {
        var element = '&lang=' + getUrlParameter('lang');
        var exist = window.location.href;
        var new_url = exist.replace(element, '');
        window.history.pushState('page2', 'Title', new_url);
      }

      location.reload();
    });

    $('select').on("select2:select", function(e) {
      window.open(e.params.data.id, "_self");
    });
  </script>
@endsection
