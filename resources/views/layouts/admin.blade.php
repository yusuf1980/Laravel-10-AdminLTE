<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="{{asset('assets/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/admin/adminlte.min.js')}}"></script>
    @vite(['resources/sass/admin.scss', 'resources/js/admin.js'])
    @stack('css')
</head>

<body class="hold-transition sidebar-mini">
    <div id="app">
        <div class="wrapper">
            @include('layouts.admin.header')
            @include('layouts.admin.sidebar')
            <div class="content-wrapper">
                <section class="content-header">
                    <div class="container-fluid">
                      <div class="row mb-2">
                        <div class="col-sm-6">
                          <h1>@yield('title-content')</h1>
                        </div>
                        <div class="col-sm-6">
                          <ol class="breadcrumb float-sm-right">
                            @yield('breadcrumb')
                          </ol>
                        </div>
                      </div>
                    </div>
                  </section>
                  <section class="content">
                    @yield('content')
                  </section>
            </div>
        </div>
    </div>
    @stack('js')
</body>

</html>
