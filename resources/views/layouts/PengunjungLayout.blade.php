<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- jQuery -->
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">  
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.bootstrap4.min.css">




</head>
<body>
    <!--<div id="app"> HAPUS NANTI ERRROR-->
 <!--<div id="app"> HAPUS NANTI ERRROR-->
     
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel yesPrint">
                <div class="container">
                <!-- Brand/logo -->
                <img src="/img/lambangDinas.PNG" class="img-brand" alt="logo">
                <h5 style="color:black;margin-left:10px; float:left;">
                    SISTEM INFORMASI GABUNGAN KELOMPOK TANI PENGOLAH KOMODITI PERKEBUNAN
                </h5>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">

                        </ul>
                    </div>
            </nav>

        <main class="py-4">
            @yield('content')
        </main>
    <!--</div> BAGIAN DARI APP HAPUS AJA NANTI GA BISA UPDATE-->

        <!-- jQuery -->
        <script src="//code.jquery.com/jquery.js"></script>

        {{-- Data Tabel --}}
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
</body>
</html>
