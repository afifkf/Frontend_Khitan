<x-app-layout>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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

<div class="py-3">
    <div class="max-w-7xl mx-auto sm:px-6 lg-px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h3 class="mb-0">Edit Produk</h3>
                <hr />
                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('admin/produkmetode/update', ['id' => $produkmetode->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label">Nama Produk</label>
                            <input type="text" name="nama" class="form-control" placeholder="Nama" value="{{ $produkmetode->nama }}" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label">Gambar Produk</label>
                            <input type="file" name="gambar" class="form-control" placeholder="Gambar">
                            <!-- Tampilkan gambar saat ini jika ada -->
                            @if ($produkmetode->gambar)
                                <img src="{{ asset($produkmetode->gambar) }}" alt="Gambar Produk" class="img-thumbnail mt-2" style="max-height: 150px;">
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label">Harga</label>
                            <input type="number" name="harga" class="form-control" placeholder="Harga" value="{{ $produkmetode->harga }}" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-warning">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</x-app-layout>
