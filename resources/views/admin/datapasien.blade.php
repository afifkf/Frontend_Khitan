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
                    <h3 class="font-semibold text-gray-800 leading-tight">
                        {{ __('List Pasien') }}
                    </h3>
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center space-x-3 text-sm font-medium text-gray-700 hover:text-gray-900 focus:outline-none">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}" alt="Avatar" class="h-8 w-8 rounded-full">
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="h-4 w-4 text-gray-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 111.414 1.414l-4 4a1 1 01-1.414 0l-4-4a1 1 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50 ring-1 ring-black ring-opacity-5">
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
                    <div class="d-flex align-items-center justify-content-between">
                        <h1 class="mb-0">List Data Pasien</h1>
                        <!-- <a href="{{ route('admin/tabeluser')}}" class="btn btn-primary">Tambah Produk</a> -->
                    </div>
                    <hr>
                    @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('success')}}
                        </div>
                    @endif

                    <table class="table table-hover table-bordered">
                        <thead class="table-secondary">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Umur</th>
                                <th>Tanggal Lahir</th>
                                <th>Nama Ortu</th>
                                <th>Alamat</th>
                                <th>Nomor Whatsapp</th>
                                <th>Tanggal Khitan</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($isidata as $data)
                            <tr>
                                <td class="align-middle">{{$loop->iteration}}</td>
                                <td class="align-middle">{{$data->nama}}</td>
                                <td class="align-middle">{{$data->umur}}</td>
                                <td class="align-middle">{{$data->tanggal_lahir}}</td>
                                <td class="align-middle">{{$data->nama_orang_tua}}</td>
                                <td class="align-middle">{{$data->alamat}}</td>
                                <td class="align-middle">{{$data->no_whatsapp}}</td>
                                <td class="align-middle">{{$data->tanggal_khitan}}</td>
                                <td class="align-middle">
                                    <button type="button" class="btn btn-success" 
                                            onclick="showConfirmationModal(
                                                `{{$data->nama}}`, `{{$data->umur}}`, `{{$data->tanggal_lahir}}`,
                                                `{{$data->berat_badan}}`, `{{$data->tinggi_badan}}`,
                                                `{{$data->alergi_obat}}`, `{{$data->riwayat_sakit}}`,
                                                `{{$data->kelainan_kencing}}`, `{{$data->kondisi_penis}}`,
                                                `{{$data->kondisi_tubuh}}`, `{{$data->nama_orang_tua}}`,
                                                `{{$data->pekerjaan_orang_tua}}`, `{{$data->alamat}}`,
                                                `{{$data->no_whatsapp}}`, `{{$data->tanggal_khitan}}`
                                            )">
                                        Detail
                                    </button>
                                </td>
                            </tr>
                            @empty 
                            <tr>
                                <td class="text-center" colspan="9">Produk tidak ditemukan</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <!-- Modal Konfirmasi -->
                    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="confirmationModalLabel">Data Detail Pasien</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <h5 class="mb-3">Data Anak</h5>
                                            <p><i class="bi bi-person-fill"></i> <strong class="text-primary">Nama :</strong> <span id="modalNama"></span></p>
                                            <p><i class="bi bi-calendar-check"></i> <strong class="text-primary">Umur :</strong> <span id="modalUmur"></span></p>
                                            <p><i class="bi bi-calendar"></i> <strong class="text-primary">Tanggal Lahir :</strong> <span id="modalTanggalLahir"></span></p>
                                            <p><i class="bi bi-weight"></i> <strong class="text-primary">Berat Badan :</strong> <span id="modalBeratBadan"></span></p>
                                            <p><i class="bi bi-rulers"></i> <strong class="text-primary">Tinggi Badan :</strong> <span id="modalTinggiBadan"></span></p>
                                            <p><i class="bi bi-capsule-pill"></i> <strong class="text-primary">Alergi Obat :</strong> <span id="modalAlergiObat"></span></p>
                                            <p><i class="bi bi-heart-pulse"></i> <strong class="text-primary">Riwayat Penyakit :</strong> <span id="modalRiwayatSakit"></span></p>
                                            <p><i class="bi bi-water"></i> <strong class="text-primary">Kelainan Kencing :</strong> <span id="modalKelainanKencing"></span></p>
                                            <p><i class="bi bi-gender-male"></i> <strong class="text-primary">Kondisi Penis :</strong> <span id="modalKondisiPenis"></span></p>
                                            <p><i class="bi bi-body"></i> <strong class="text-primary">Kondisi Tubuh :</strong> <span id="modalKondisiTubuh"></span></p>
                                        </div>
                                        <div class="col-md-6">
                                            <h5 class="mb-3">Data Orang Tua</h5>
                                            <p><i class="bi bi-people-fill"></i> <strong class="text-primary">Nama Orang Tua :</strong> <span id="modalNamaOrtu"></span></p>
                                            <p><i class="bi bi-briefcase-fill"></i> <strong class="text-primary">Pekerjaan Orang Tua :</strong> <span id="modalPekerjaanOrtu"></span></p>
                                            <p><i class="bi bi-house-door-fill"></i> <strong class="text-primary">Alamat :</strong> <span id="modalAlamat"></span></p>
                                            <p><i class="bi bi-whatsapp"></i> <strong class="text-primary">No Whatsapp :</strong> <span id="modalNoWhatsapp"></span></p>
                                            <p><i class="bi bi-calendar2-week"></i> <strong class="text-primary">Tanggal Khitan :</strong> <span id="modalTanggalKhitan"></span></p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Tambahkan gaya CSS untuk menyesuaikan padding, margin, atau warna -->
                                <style>
                                    .modal-body p {
                                        font-size: 1rem;
                                        margin-bottom: 0.5rem;
                                        display: flex;
                                        align-items: center;
                                    }

                                    .modal-body p i {
                                        margin-right: 8px;
                                        color: #0d6efd; /* Warna ikon */
                                    }

                                    .text-primary {
                                        color: #0d6efd;
                                        font-weight: bold;
                                    }
                                </style>
                            </div>
                        </div>
                    </div>

                    <script>
                        function showConfirmationModal(nama, umur, tanggalLahir, beratBadan, tinggiBadan, alergiObat, riwayatSakit, kelainanKencing, kondisiPenis, kondisiTubuh, namaOrtu, pekerjaanOrtu, alamat, noWhatsapp, tanggalKhitan) {
                            document.getElementById('modalNama').textContent = nama;
                            document.getElementById('modalUmur').textContent = umur + " tahun";
                            document.getElementById('modalTanggalLahir').textContent = tanggalLahir;
                            document.getElementById('modalBeratBadan').textContent = beratBadan + " kg";
                            document.getElementById('modalTinggiBadan').textContent = tinggiBadan + " cm";
                            document.getElementById('modalAlergiObat').textContent = alergiObat;
                            document.getElementById('modalRiwayatSakit').textContent = riwayatSakit;
                            document.getElementById('modalKelainanKencing').textContent = kelainanKencing;
                            document.getElementById('modalKondisiPenis').textContent = kondisiPenis;
                            document.getElementById('modalKondisiTubuh').textContent = kondisiTubuh;
                            document.getElementById('modalNamaOrtu').textContent = namaOrtu;
                            document.getElementById('modalPekerjaanOrtu').textContent = pekerjaanOrtu;
                            document.getElementById('modalAlamat').textContent = alamat;
                            document.getElementById('modalNoWhatsapp').textContent = noWhatsapp;
                            document.getElementById('modalTanggalKhitan').textContent = tanggalKhitan;

                            var confirmationModal = new bootstrap.Modal(document.getElementById('confirmationModal'));
                            confirmationModal.show();
                        }
                    </script>
                </div>
            </div>
        </div>
        </div>
    </div>
    </body>
</x-app-layout>
