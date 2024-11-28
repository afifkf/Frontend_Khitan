<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Admin Dashboard') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
            /* Sidebar styles */
            .sidebar {
                width: 250px;
                height: 100vh;
                background-color: #2c3e50;
                color: white;
                position: fixed;
                top: 0;
                left: 0;
                padding-top: 20px;
            }

            .sidebar h2 {
                text-align: center;
                margin-bottom: 30px;
            }

            .sidebar a {
                display: block;
                color: white;
                padding: 15px;
                text-decoration: none;
                transition: 0.3s;
            }

            .sidebar a:hover {
                background-color: #34495e;
            }

            .content {
                margin-left: 250px;
                padding: 20px;
            }
        </style>

</head>
<body>
    
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <a href="{{ route('dashboard') }}"><i class="fas fa-home"></i> Beranda</a>
        <a href="{{ route('admin/dashboard') }}"><i class="fas fa-home"></i> Dashboard Admin</a>
        <a href="{{ route('admin/produkmetode') }}"><i class="fas fa-box"></i> Produk</a>
        <a href="{{ route('admin/tabeluser') }}"><i class="fas fa-users"></i> Pengguna</a>
        <!-- <a href="#"><i class="fas fa-file"></i> Laporan</a> -->
        <!-- Logout Form -->
        <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
            @csrf
        </form>

        <!-- Logout Link -->
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>
    </div>

    <!-- Main Content -->
    <div class="content">
    <header class="bg-white shadow mb-4">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
        <!-- Judul Halaman -->
        <h3 class="font-semibold text-gray-800 leading-tight">
            {{ __('Dashboard Admin') }}
        </h3>

        <!-- Profil Dropdown -->
        <div class="relative" x-data="{ open: false }">
            <button @click="open = !open" class="flex items-center space-x-3 text-sm font-medium text-gray-700 hover:text-gray-900 focus:outline-none">
                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}" alt="Avatar" class="h-8 w-8 rounded-full">
                <span>{{ Auth::user()->name }}</span>
                <svg class="h-4 w-4 text-gray-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 111.414 1.414l-4 4a1 1 01-1.414 0l-4-4a1 1 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>

            <!-- Dropdown Content -->
            <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50 ring-1 ring-black ring-opacity-5" style="display: none;">
                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                    {{ __('Profil') }}
                </a>
                @if (auth()->user()->usertype === 'Admin')
                    <a href="{{ route('admin/dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                        {{ __('Dashboard Admin') }}
                    </a>
                @endif
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                        {{ __('Logout') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>

        <div class="container">
    <style>
        .container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); /* Responsive columns */
            gap: 20px; /* Space between cards */
            padding: 20px;
        }

        .card {
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            background-color: #f8f9fa; /* Light gray background */
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .card-body {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .card-title {
            font-size: 1.25rem;
            margin-bottom: 10px;
        }

        .card-text {
            font-size: 1rem;
            margin-bottom: 15px;
        }

        .btn {
            font-size: 0.9rem;
            padding: 10px 15px;
        }
    </style>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Laporan Omzet</h5>
            <p class="card-text">Tersedia : <strong>5 Metode</strong></p>
            <a href="labarugi" class="btn btn-warning mt-3">Buka</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Keluhan</h5>
            <p class="card-text">Jumlah : <strong>5 User</strong></p>
            <a href="keluhan" class="btn btn-warning mt-3">Buka</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Data Pasien</h5>
            <p class="card-text">Jumlah: <strong>5 User</strong></p>
            <a href="datapasien" class="btn btn-warning mt-3">Buka</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Transaksi</h5>
            <p class="card-text">Jumlah: <strong>5 User</strong></p>
            <a href="transaksi" class="btn btn-warning mt-3">Buka</a>
        </div>
    </div>
</div>

<div class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Grafik Penjualan per Bulan</h5>
                <canvas id="salesChart" width="400" height="200"></canvas>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('salesChart').getContext('2d');

        // Data dari server

        new Chart(ctx, {
            type: 'bar', // Jenis grafik: bar, line, pie, dll.
            data: {
                labels: salesData.months, // Label bulan
                datasets: [{
                    label: 'Penjualan',
                    data: salesData.sales, // Data penjualan
                    backgroundColor: 'rgba(75, 192, 192, 0.2)', // Warna batang
                    borderColor: 'rgba(75, 192, 192, 1)', // Warna garis
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>


    </div>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>
