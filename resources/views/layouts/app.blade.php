<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MSF</title>

  <link rel="stylesheet" href="{{ asset('assets/css/main/app.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/main/app-dark.css') }}">
  <link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon.svg') }}" type="image/x-icon">
  <link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon.png') }}" type="image/png"> 
  <link rel="stylesheet" href="{{ asset('assets/css/shared/iconly.css') }}">
  <link rel="stylesheet" href="{{ asset('css/waitme.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
<body>
<div id="app">
  <div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
      @include('navbars.header')
      @include('navbars.sidebar')
    </div>
  </div>
  <div id="main">
    @include('navbars.headings')
    @yield('main-content')
  </div>
</div>
<script>
    let APP_URL = {!! json_encode(url('/')) !!}
</script>
<script src="{{ asset('js/common-service.js') }}"></script>
<script src="{{ asset('js/spinner.js') }}"></script>
<script src="{!! mix('js/app.js') !!}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>
<script src="{{ asset('assets/js/pages/dashboard.js') }}"></script>
<script src="{{ asset('js/waitme.min.js') }}"></script>
<script src="{{ asset('js/logout.js') }}"></script>
@yield('custom-js')
</body>
</html>
