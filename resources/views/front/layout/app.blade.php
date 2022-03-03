<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

  <meta charset="utf-8">
  <title>@yield('title')</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="stylesheet" href="{{ asset('/front/assets/css/main.min.css?v=2.1') }}">
  <link rel="stylesheet" href="{{asset('front/assets/css/all.min.css')}}"/>
  <script src="{{ asset('/front/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

  @stack('css')

</head>

<body>

  {{-- start header --}}
  @include('front.include.header')
  {{-- end header --}}


  <main class="main">
    {{-- dynamic content start --}}
    @yield('content')
    {{-- dynamic content end --}}
  </main>

  {{-- footer start --}}
  @include('front.include.footer')
  {{-- footer end --}}


  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
  <!-- Vendor JS-->
  <script src="{{asset('/front/assets/js/vendor/modernizr-3.6.0.min.js')}}"></script>
  <script src="{{ asset('/front/assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
  <script src="{{ asset('/front/assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('/front/assets/js/plugins/slick.min.js') }}"></script>
  <script src="{{ asset('/front/assets/js/plugins/jquery.syotimer.min.js') }}"></script>
  <script src="{{ asset('/front/assets/js/plugins/wow.min.js') }}"></script>
  <script src="{{ asset('/front/assets/js/plugins/jquery-ui.min.js') }}"></script>
  <script src="{{ asset('/front/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('/front/assets/js/plugins/magnific-popup.min.js') }}"></script>
  <script src="{{ asset('/front/assets/js/plugins/select2.min.js') }}"></script>
  <script src="{{ asset('/front/assets/js/plugins/waypoints.min.js') }}"></script>
  <script src="{{ asset('/front/assets/js/plugins/counterup.min.js') }}"></script>
  <script src="{{ asset('/front/assets/js/plugins/jquery.countdown.min.js') }}"></script>
  <script src="{{ asset('/front/assets/js/plugins/images-loaded.min.js') }}"></script>
  <script src="{{ asset('/front/assets/js/plugins/isotope.min.js') }}"></script>
  <script src="{{ asset('/front/assets/js/plugins/scrollup.min.js') }}"></script>
  <script src="{{ asset('/front/assets/js/plugins/jquery.vticker-min.js') }}"></script>
  <script src="{{ asset('/front/assets/js/plugins/jquery.theia.sticky.min.js') }}"></script>
  <script src="{{ asset('/front/assets/js/plugins/jquery.elevatezoom.min.js') }}"></script>
  {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> --}}
  <!-- Template  JS -->
  <script src="{{ asset('/front/assets/js/main.min.js?v=2.1') }}"></script>
  <script src="{{ asset('/front/assets/js/shop.min.js?v=2.1') }}"></script>

  @stack('js')
</body>
</html>
