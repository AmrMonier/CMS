<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CMS-Lazy Welcome</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/guest-welcome.css') }}">
    <link rel="stylesheet" href="/css/master.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300&display=swap" rel="stylesheet">
  </head>
  <body>
    <div class="type-js headline">
      <h1 class="text-js">
        The Developer is too lazy to create a welcome page plaese just login and start using our site, thanks

      </h1>
      <div id="btn" style="display: none">
          <a class="btn btn-warning btn-lg m-3" href="{{ route('login') }}">Login</a>
      </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/welcome-page.js') }}">

    </script>
  </body>
</html>
