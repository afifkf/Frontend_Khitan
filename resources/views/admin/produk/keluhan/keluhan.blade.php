<x-app-layout>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <style>
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

            <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                @csrf
            </form>
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
                    {{ __('Keluhan') }}
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

            <!-- Tabel 1: Rekap Laba Rugi -->
            <div class="py-3">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <h3>Kelainan saat kencing</h3>
                            <a href="" class="btn btn-primary btn-sm">Tambah Produk</a>
                            <hr />
                            <table class="table table-hover table-bordered mt-3">
                                <thead class="table-secondary">
                                    <tr>
                                        <th>No</th>
                                        <th>Kelainan</th>
                                        <th>Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($keluhan as $keluhans)
                                    <tr>
                                        <td class="align-middle">{{ $loop->iteration }}</td>
                                        <td class="align-middle"></td>
                                        <td class="align-middle"></td>
                                        <td class="align-middle">
                                        <div class="btn-group" role="group" aria-label="Basic-example">
                                                <a href="" type="button" class="btn btn-success link btn-sm">Edit</a>
                                                <a href="" type="button" class="btn btn-danger btn-sm">Hapus</a>
                                        </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="text-center">Data tidak ditemukan</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tabel 2: Data Pengeluaran -->
            <div class="py-3">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <h3>Kondisi Penis dan Sekitarnya</h3>
                            <a href="" class="btn btn-primary btn-sm">Tambah Produk</a>
                            <hr />
                            <table class="table table-hover table-bordered mt-3">
                                <thead class="table-secondary">
                                    <tr>
                                        <th>No</th>
                                        <th>Kondisi Penis</th>
                                        <th>Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($keluhan as $data)
                                    <tr>
                                        <td class="align-middle">{{ $loop->iteration }}</td>
                                        <td class="align-middle"></td>
                                        <td class="align-middle"></td>
                                        <td class="align-middle">
                                        <div class="btn-group" role="group" aria-label="Basic-example">
                                                <a href="" type="button" class="btn btn-success link btn-sm">Edit</a>
                                                <a href="" type="button" class="btn btn-danger btn-sm">Hapus</a>
                                        </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="3" class="text-center">Data tidak ditemukan</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tabel 3: Data Pendapatan -->
            <div class="py-3">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <h3>Kondisi Tubuh Anak</h3>
                            <a href="" class="btn btn-primary btn-sm">Tambah Produk</a>
                            <hr />
                            <table class="table table-hover table-bordered mt-3">
                                <thead class="table-secondary">
                                    <tr>
                                        <th>No</th>
                                        <th>Kondisi Tubuh</th>
                                        <th>Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($keluhan as $data)
                                    <tr>
                                        <td class="align-middle">{{ $loop->iteration }}</td>
                                        <td class="align-middle"></td>
                                        <td class="align-middle"></td>
                                        <td class="align-middle">
                                        <div class="btn-group" role="group" aria-label="Basic-example">
                                                <a href="" type="button" class="btn btn-success link btn-sm">Edit</a>
                                                <a href="" type="button" class="btn btn-danger btn-sm">Hapus</a>
                                        </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="3" class="text-center">Data tidak ditemukan</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</x-app-layout>
