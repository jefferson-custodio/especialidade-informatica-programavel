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
        <a class="navbar-brand" href="/">Navbar</a>
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

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                id="navbarDropdown"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                Dropdown
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#">Disabled</a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" />
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
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
