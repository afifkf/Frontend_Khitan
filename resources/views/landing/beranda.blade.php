<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Beranda</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- CDN Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <script src="{{ asset('script.js') }}" defer></script>
    <script src="//unpkg.com/alpinejs" defer></script>

    <style>
        body {
            background-color: #ADD8E6;
        }
    </style>
</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Beranda') }}
        </h2>
    </x-slot>

    <!-- Navigation -->

    <!-- Content Sections -->
    <section id="beranda" class="banner-full py-5 text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-14">
                    <img src="{{ asset('images/Rumahkhitan.png') }}" class="img-fluid" alt="Foto sampul">
                </div>
            </div>
        </div>
    </section>

    <section id="beranda" class="banner-full py-5 text-center d-flex align-items-center justify-content-center">
        <div class="container text-black">
            <h1 class="display-4">Selamat Datang di Website Khitan Modern</h1>
            <p class="lead">Khitan modern dengan pelayanan terbaik untuk anak Anda.</p>
            <a href="#kontak" class="btn btn-primary">Hubungi Kami</a>
        </div>
    </section>

    <!-- Tentang Kami Section -->
    <section id="tentang" class="py-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-6">
                    <img src="images/Anak-Setelah-Khitan.jpg" class="img-fluid" alt="Misi">
                </div>
                <div class="col-md-6 d-flex flex-column justify-content-center">
                    <h2 class="section-title">Misi</h2>
                    <p>Memberikan layanan khitan yang aman dan steril dengan menggunakan teknik dan peralatan medis terkini.</p>
                    <a href="#" class="btn btn-primary">Selengkapnya</a>
                </div>
            </div>
            
            <div class="row mb-5">
                <div class="col-md-6 order-md-2">
                    <img src="images/anakbarusunat.jpeg" class="img-fluid" alt="Visi">
                </div>
                <div class="col-md-6 d-flex flex-column justify-content-center order-md-1">
                    <h2 class="section-title">Visi</h2>
                    <p>Menjadi klinik khitan terkemuka yang memberikan pelayanan terbaik, aman, dan nyaman.</p>
                    <a href="#" class="btn btn-primary">Selengkapnya</a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <img src="images/gambarklinik.jpeg" class="img-fluid" alt="Sejarah Pendirian">
                </div>
                <div class="col-md-6 d-flex flex-column justify-content-center">
                    <h2 class="section-title">Sejarah Pendirian</h2>
                    <p>Klinik Khitan Modern didirikan pada tahun 2010 dengan tujuan meningkatkan kualitas layanan khitan di Indonesia.</p>
                    <a href="#" class="btn btn-primary">Selengkapnya</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-5 bg-dark text-light text-center">
        <div class="container">
            <p>&copy; 2024 Khitan Modern. Semua hak cipta dilindungi.</p>
        </div>
    </footer>
</x-app-layout>
</body>
</html>
