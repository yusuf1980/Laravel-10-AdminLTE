<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/sass/admin.scss', 'resources/js/admin.js'])
</head>

<body class="hold-transition login-page">
    <div id="app">
        <div class="login-box">
            <!-- /.login-logo -->
            <div class="card card-outline card-primary">
              <div class="card-header text-center">
                <a href="../../index2.html" class="h1"><b>Admin</b>LTE</a>
              </div>
              <div class="card-body">
                @yield('content')
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
    </div>
</body>

</html>
