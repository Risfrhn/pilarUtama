<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilar Utama</title>

    <!-- Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <!-- Font Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&family=Liter&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Outfit:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Prata&display=swap" rel="stylesheet">

    <!-- CSS -->    
    <link rel="stylesheet" href="{{ asset('CSS/style.css') }}">

</head>
<body class="d-flex flex-column min-vh-100" style="background-color: #EEEBE5">
    
    <!-- Navbar -->
    @if (!Request::is('login') && !Request::is('register') && !Request::is('forgot-password') && !Request::is('reset-password/{token}') && !Request::is('reset-password/*'))
        @if (Auth::check())
            <!-- Navbar untuk pengguna yang sudah login -->
            <nav class="navbar navbar-expand-lg sticky-top" style="background-color: #EEEBE5; font-size:12px">
                <div class="container d-flex justify-content-between align-items-center">
                    <a class="navbar-brand" style="font-size:10px;" href="{{route('dashboardAdmin.view')}}">
                        <img src="{{ asset('image/Logo.png') }}" alt="Logo" height="60px" class="d-inline-block align-text-top"> 
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse w-90 justify-content-center fw-medium" id="navbarNav">
                        <ul class="navbar-nav gap-4">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="{{route('dashboardAdmin.view')}}#halaman-utama">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('dashboardAdmin.view')}}#tentang-kami">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('dashboardAdmin.view')}}#projek">Projects</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('dashboardAdmin.view')}}#layanan">Services</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('dashboardAdmin.view')}}#kontak">Contact</a>
                            </li>
                        </ul>
                        </div>
                            <a href="#" class="text-decoration-none text-dark d-none d-lg-block">Indonesia, Kalimantan Timur</a>
                        </div>
                    </div>
                </div>
            </nav>
        @else
            <!-- Navbar untuk pengguna yang belum login -->
            <nav class="navbar navbar-expand-lg sticky-top" style="background-color: #EEEBE5; font-size:12px">
                <div class="container d-flex justify-content-between align-items-center">
                    <a class="navbar-brand" style="font-size:10px;" href="{{route('dashboardUser.view')}}">
                        <img src="{{ asset('image/Logo.png') }}" alt="Logo" height="60px" class="d-inline-block align-text-top"> 
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse w-90 justify-content-center fw-medium" id="navbarNav">
                        <ul class="navbar-nav gap-4">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="#halaman-utama">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#tentang-kami">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#projek">Projects</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#layanan">Services</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#kontak">Contact</a>
                            </li>
                        </ul>
                        </div>
                            <a href="#" class="text-decoration-none text-dark d-none d-lg-block">Indonesia, Kalimantan Timur</a>
                        </div>
                    </div>
                </div>
            </nav>
        @endif
    @else
        <!-- Navbar sederhana untuk halaman login/register -->
        <nav class="navbar navbar-expand-lg sticky-top" style="background-color: #EEEBE5; font-size:12px">
            <div class="container d-flex justify-content-between align-items-center">
                <a class="navbar-brand" style="font-size:10px;" href="{{route('dashboardUser.view')}}">
                    <img src="{{ asset('image/Logo.png') }}" alt="Logo" height="60px" class="d-inline-block align-text-top"> 
                </a>
            </div>
        </nav>
    @endif

    <main class="flex-grow-1">
        
