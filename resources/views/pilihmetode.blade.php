<x-app-layout>
    <x-slot name="header">
        <h3 class="font-semibold text-grey-800 leading-tight text-center">
            {{ __('Pilih Metode Khitan') }}
        </h3>
        <p>
            <a href="{{ route('dashboard') }}" class="btn btn-primary">Kembali</a>
        </p>

    <style>
        .container {
            display: flex;
            gap: 10px;
        }

        .card {
            border-radius: 20px;
            background-color: #fff;
            flex: 1;
            height: 400px;
            transition: all 0.3s ease;
        }

        .card:hover {
            flex: 1.1;
            background-color: rgb(207, 207, 207);
        }
    </style>

        <div class="container mt-4">
            @foreach ($pilihmetode as $metode)
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $metode->nama }}</h5>
                        <!-- Menampilkan gambar -->
                        <img src="{{ asset($metode->gambar) }}" alt="{{ $metode->nama }}" class="img-fluid mb-3" style="max-width: 100%; height: auto;">
                        <p class="card-text">{{ $metode->harga }}</p>
                        <a href="{{ route('pilihmetode.save', ['metode' => $metode->id]) }}" class="btn btn-warning mt-3">
                            Pilih {{ $metode->nama }}
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </x-slot>

</x-app-layout>
