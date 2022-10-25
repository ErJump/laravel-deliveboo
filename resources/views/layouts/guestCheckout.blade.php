<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Deliveboo | @yield('title')</title>

    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <!-- Montserrat -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
        <!-- Open Sans -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark ms_bg_primary py-2">
               <div class="container-fluid">
                  <a href="/" class="navbar-brand">
                     <img src="{{asset('assets/images/logo-white.png')}}" alt="logo" class="d-none d-lg-block">
                     <img src="{{asset('assets/images/logo-small.png')}}" alt="logo" class="d-lg-none">
                  </a>
                  <div class="d-flex justify-content-between">
                     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                     </button>
                  </div>
                  <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                     <ul class="navbar-nav">
                        <li class="nav-item">
                           <a href="/" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="/admin">Area Personale</a>
                        </li>
                     </ul>
                  </div>
               </div>
            </nav>
         </header>
        @yield('content')

        @include('partials.footer')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @yield('footer-scripts')
</body>
</html>
