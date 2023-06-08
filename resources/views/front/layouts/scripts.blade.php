{{-- Bootstrap script --}}
<script src="{{ asset('front/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('front/js/jquery-3.6.3.min.js') }}"></script>
<script src="{{ asset('front/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('front/js/intlTelInput-jquery.min.js') }}"></script>
<script src="{{ asset('front/js/select2.full.min.js') }}"></script>
<script src="{{ asset('front/js/jquery.star-rating-svg.min.js') }}"></script>
<script src="{{ asset('front/js/flatpickr.js') }}"></script>

@if (in_array(Session::get('changed_language'), ['ar', 'he', 'ur', 'arc', 'az', 'dv', 'ku', 'fa']))
  <script src="{{ asset('front/js/sliders.rtl.js') }}"></script>
@else
  <script src="{{ asset('front/js/sliders.ltr.js') }}"></script>
@endif
<script src="{{ asset('front/js/main.js') }}"></script>

@if (isset($gsetting->chat_bubble))
  <script src="{{ $gsetting->chat_bubble }}" async></script>
@endif

@if ($gsetting->google_ana)
  <script async src="https://www.googletagmanager.com/gtag/js?id={{ $gsetting->google_ana }}"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', '{{ $gsetting->google_ana }}');
  </script>
@endif


@if (isset($gsetting->fb_pixel))
  <script>
    ! function(f, b, e, v, n, t, s) {
      if (f.fbq) return;
      n = f.fbq = function() {
        n.callMethod ?
          n.callMethod.apply(n, arguments) : n.queue.push(arguments)
      };
      if (!f._fbq) f._fbq = n;
      n.push = n;
      n.loaded = !0;
      n.version = '2.0';
      n.queue = [];
      t = b.createElement(e);
      t.async = !0;
      t.src = v;
      s = b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t, s)
    }(window, document, 'script',
      'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '{{ $gsetting->fb_pixel }}');
    fbq('track', 'PageView');
  </script>

  <script>
    (function(e, t, n) {
      var r = e.querySelectorAll("html")[0];
      r.className = r.className.replace(/(^|\s)no-js(\s|$)/, "$1js$2")
    })(document, window, 0);
  </script>
  <noscript>
    <img style="display:none" src="https://www.facebook.com/tr?id={{ $gsetting->fb_pixel }}&ev=PageView&noscript=1" />
  </noscript>
@endif


@if ($gsetting->rightclick == '1')
  <script>
    (function($) {
      "use strict";
      $(function() {
        $(document).on("contextmenu", function(e) {
          return false;
        });
      });
    })(jQuery);
  </script>
@endif

@if ($gsetting->inspect == '1')
  <script>
    (function($) {
      "use strict";
      document.onkeydown = function(e) {
        if (event.keyCode == 123) {
          return false;
        }
        if (e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
          return false;
        }
        if (e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
          return false;
        }
        if (e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
          return false;
        }
        if (e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
          return false;
        }
      }
    })(jQuery);
  </script>
@endif

@if ($gsetting->wapp_enable == '1')
  <script src="{{ asset('js/venom-button.min.js') }}"></script>
  <script type="text/javascript">
    $('#myButton').venomButton({
      phone: '{{ $gsetting->wapp_phone }}',
      popupMessage: '{{ $gsetting->wapp_popup_msg }}',
      message: "",
      showPopup: true,
      position: "{{ $gsetting->wapp_position }}",
      linkButton: false,
      showOnIE: false,
      headerTitle: '{{ $gsetting->wapp_title }}',
      headerColor: '{{ $gsetting->wapp_color }}',
      backgroundColor: '#25d366',
      zIndex: 999999999999,
      buttonImage: '<img src="{{ asset('images/icons/whatsapp.svg') }}" />',
      size: '60px',
    });
  </script>
@endif
