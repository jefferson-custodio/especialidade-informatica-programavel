<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Sentinelas :: @yield('title', 'Home')</title>

    <!-- Styles -->
    <link href="{{ asset('assets/css/bootstrap.min.css'); }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/fontawesome-free-5.15.4-web/css/all.min.css'); }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/global.css'); }}" rel="stylesheet" />

    @stack('styles')
  </head>

  <body>
    <div id="app" class="h-100 w-100">
      @if (isset($nav) && $nav == true)
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
        <a class="navbar-brand" href="/">Sentinelas</a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
      </nav>
      @endif
      <!--  -->
      @if (session('status'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
      <!--  -->
      @yield('content')
    </div>
    <script src="{{ asset('assets/js/jquery.min.js'); }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js'); }}"></script>
    <script src="{{ asset('assets/js/maskMoney.min.js'); }}"></script>

    @stack('scripts')
  </body>
</html>
