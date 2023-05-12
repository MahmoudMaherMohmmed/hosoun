@extends('front.layouts.master')
@section('css')
@endsection
@section('title')
  {{ __('frontstaticword.Contactus') }}
@endsection

@section('content')
  @include('front.layouts.page_header', ['title' => __('frontstaticword.Contactus')])


  <section class="block-sec page-content">
    <div class="container">
      <div class="row pb-5">
        <div class="col-12 text-center">
          <h2 class="title-25 mb-5 pb-5">{{ __('frontstaticword.KeepinTouch') }}</h2>
        </div>
        <div class="col-lg-6 mb-5 mb-lg-0 px-5 align-self-center text-center">
          <img src="{{ asset('/front/img/logo.svg') }}" class="img-fluid px-5 mb-5">
          {{-- @if ($gsetting->map_enable == 'map') --}}
          {{-- GoogleMapsLocation --}}
          {{-- <div id="location" class="w-100 h-100 bg-light main-block" style="min-height: 50rem"> --}}
          {{-- Google Maps API key is required to render map --}}
          {{-- </div> --}}
          {{-- GoogleMapsLocation --}}
          {{-- @elseif($gsetting->map_enable == 'image') --}}
          {{-- <img src="{{ asset('images/contact/'.$gsetting->contact_image) }}" class="img-fluid"> --}}
          {{-- @endif --}}
        </div>
        <div class="col-lg-6 ps-lg-5">
          @include('admin.message')
          <form method="post" action="{{ route('contact.user') }}" class="ms-lg-3">
            @csrf
            @if (Auth::check())
              <input type="hidden" name="user_id" value="{{ Auth::User()->id }}" />
            @endif
            <div class="form-group">
              <label for="fname" class="form-label">{{ __('frontstaticword.Name') }}</label>
              <div class="form-group-icon">
                <input type="text" name="fname" id="fname" class="form-control"
                  placeholder="{{ __('frontstaticword.Name') }}">
                <svg class="svg-default form-control-icon">
                  <use xlink:href="{{ asset('/front/svg/sprite.svg#profile') }}" />
                </svg>
              </div>
            </div>
            <div class="form-group">
              <label for="email" class="form-label">{{ __('frontstaticword.Email') }}</label>
              <div class="form-group-icon">
                <input type="email" name="email" id="email" class="form-control"
                  placeholder="{{ __('frontstaticword.Email') }}">
                <svg class="svg-default form-control-icon">
                  <use xlink:href="{{ asset('/front/svg/sprite.svg#sms') }}" />
                </svg>
              </div>
            </div>
            <div class="form-group">
              <label for="mobile" class="form-label">{{ __('frontstaticword.Mobile') }}</label>
              <div class="form-group-icon">
                <input type="text" name="mobile" id="mobile" class="form-control"
                  placeholder="{{ __('frontstaticword.Mobile') }}">
                <svg class="svg-default form-control-icon">
                  <use xlink:href="{{ asset('/front/svg/sprite.svg#mobile') }}" />
                </svg>
              </div>
            </div>
            <div class="form-group">
              <label for="message" class="form-label">{{ __('frontstaticword.YourMessage') }}</label>
              <textarea name="message" id="message" class="form-control" style="padding-inline-start: 2rem"
                placeholder="{{ __('frontstaticword.YourMessage') }}"></textarea>
            </div>
            @if ($gsetting->captcha_enable == 1)
              <div class="{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                {!! app('captcha')->display() !!}
                @if ($errors->has('g-recaptcha-response'))
                  <span class="help-block">
                    <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                  </span>
                @endif
              </div>
              <br>
            @endif
            <button type="submit" class="btn btn-accent w-100 mt-5">{{ __('frontstaticword.Message') }}</button>
          </form>
        </div>
      </div>
      <div class="row mt-5 pt-5">
        <div class="col-lg-4 mb-5 mb-lg-0">
          <div class="contact-item p-4 d-flex align-items-center">
            <figure class="flex-shrink-0 mb-0">
              <svg class="svg-resize-32 svg-stroke-white">
                <use xlink:href="{{ asset('/front/svg/sprite.svg#mobile') }}" />
              </svg>
            </figure>
            {{ $gsetting->default_phone }}
          </div>
        </div>
        <div class="col-lg-4 mb-5 mb-lg-0">
          <div class="contact-item p-4 d-flex align-items-center">
            <figure class="flex-shrink-0 mb-0">
              <svg class="svg-resize-32 svg-stroke-white">
                <use xlink:href="{{ asset('/front/svg/sprite.svg#sms-tracking') }}" />
              </svg>
            </figure>
            {{ $gsetting->wel_email }}
          </div>
        </div>
        <div class="col-lg-4 mb-5 mb-lg-0">
          <div class="contact-item p-4 d-flex align-items-center">
            <figure class="flex-shrink-0 mb-0">
              <svg class="svg-resize-32 svg-stroke-white">
                <use xlink:href="{{ asset('/front/svg/sprite.svg#location') }}" />
              </svg>
            </figure>
            {{ $gsetting->default_address }}
          </div>
        </div>
      </div>

    </div>
  </section>
@endsection

@section('custom-script')
  <script>
    jQuery(function($) {
      var script = document.createElement('script');
      script.src =
        "https://maps.googleapis.com/maps/api/js?key={{ $gsetting['map_api'] }}&libraries=places&callback=initialize";

      document.body.appendChild(script);
    });

    function initialize() {
      var myLatLng = {
        lat: {{ $gsetting['map_lat'] }},
        lng: {{ $gsetting['map_long'] }}
      }; // Insert Your Latitude and Longitude For Footer Wiget Map
      var mapOptions = {
        center: myLatLng,
        zoom: 15,
        disableDefaultUI: true,
        scrollwheel: false,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        styles: [{
          "featureType": "landscape",
          "stylers": [{
            "saturation": -100
          }, {
            "lightness": 65
          }, {
            "visibility": "on"
          }]
        }, {
          "featureType": "poi",
          "stylers": [{
            "saturation": -100
          }, {
            "lightness": 51
          }, {
            "visibility": "simplified"
          }]
        }, {
          "featureType": "road.highway",
          "stylers": [{
            "saturation": -100
          }, {
            "visibility": "simplified"
          }]
        }, {
          "featureType": "road.arterial",
          "stylers": [{
            "saturation": -100
          }, {
            "lightness": 30
          }, {
            "visibility": "on"
          }]
        }, {
          "featureType": "road.local",
          "stylers": [{
            "saturation": -100
          }, {
            "lightness": 40
          }, {
            "visibility": "on"
          }]
        }, {
          "featureType": "transit",
          "stylers": [{
            "saturation": -100
          }, {
            "visibility": "simplified"
          }]
        }, {
          "featureType": "administrative.province",
          "stylers": [{
            "visibility": "off"
          }]
        }, {
          "featureType": "water",
          "elementType": "labels",
          "stylers": [{
            "visibility": "on"
          }, {
            "lightness": -25
          }, {
            "saturation": -100
          }]
        }, {
          "featureType": "water",
          "elementType": "geometry",
          "stylers": [{
            "hue": "#ffff00"
          }, {
            "lightness": -25
          }, {
            "saturation": -97
          }]
        }]
      }
      // For Footer Widget Map
      var map = new google.maps.Map(document.getElementById("location"), mapOptions);
      var image = 'images/icons/map.png';
      var beachMarker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        icon: image
      });
    }
  </script>
@endsection
