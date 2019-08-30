<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}-@yield('title')</title>


    <!-- Styles -->

    <link href="{{ asset('css/page.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    @yield('styleSheets')

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{ asset('img/apple-touch-icon.png') }}">
    <link rel="icon" href="{{ asset('img/favicon.png') }}">
  </head>

  <body>


    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-stick-dark" data-navbar="sticky">
      <div class="container">

        <div class="navbar-left">
          <button class="navbar-toggler" type="button">&#9776;</button>
          <a class="navbar-brand" href="/">
            <img class="logo-dark" src="{{ asset('img/logo-dark.png') }}" alt="logo">
            <img class="logo-light" src="{{ asset('img/logo-light.png') }}" alt="logo">
          </a>
        </div>

        <section class="navbar-mobile">
          <span class="navbar-divider d-mobile-none"></span>

          <ul class="nav nav-navbar">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('post.index') }}">Posts <span class="arrow"></span></a>
              <ul class="nav">

                <li class="nav-item">
                  <a class="nav-link" href="{{ route('post.create') }}">Create</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="{{ route('post.trashed') }}">Trash</a>
                </li>

              </ul>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{ route('tag.index') }}">Tags</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{ route('category.index') }}">Categories</a>
            </li>
            @if (Auth::user()->hasRole('admin'))
              <a class="nav-link" href="{{ route('user.index') }}">Users</a>
            @endif
          </ul>
        </section>
        @auth ()
          <section class="navbar-mobile" style="direction: rtl">
          <ul class="nav nav-navbar float-right">
            <li  class="nav-item ">
              <a class="btn btn-xs btn-round btn-success" href="{{ route('user.profile', Auth::user()->id) }}">
                {{ Auth::user()->name }}
              </a>

              <ul class="nav">

                <li class="nav-item">
                  <a class="nav-link" href="{{ route('user.settings') }}">Settings</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                  </a>


                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                </li>

              </ul>
            </li>
          </ul>
          </section>
        @else
          <a class="btn btn-xs btn-round btn-success" href="{{ route('login') }}">Login</a>

        @endauth

      </div>
    </nav><!-- /.navbar -->
    
    @yield('content')
    <!-- Footer -->
    <footer class="footer">
      <div class="container">
        <div class="row gap-y align-items-center">

          <div class="col-6 col-lg-3">
            <a href="/"><img src="{{ asset('img/logo-dark.png') }}" alt="logo"></a>
          </div>

          <div class="col-6 col-lg-3 text-right order-lg-last">
            <div class="social">
              <a class="social-facebook" href="https://www.facebook.com/amr.moneir.7"><i class="fa fa-facebook"></i></a>
              <a class="social-twitter" href="mailto:a.monier2107@gmail.com"><i class="ti-email"></i></a>
              <a class="social-instagram" href="https://www.instagram.com/amr.monier/"><i class="fa fa-instagram"></i></a>
              <a class="social-dribbble" href="https://github.com/AmrMonier"><i class="fa fa-github"></i></a>

            </div>
          </div>

          <div class="col-lg-6 text-center">
            All Copyrights reserved to Amr Monier &copy;
          </div>

        </div>
      </div>
    </footer><!-- /.footer -->


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <script src="{{ asset('js/page.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>

@yield('scripts')
  </body>
</html>
