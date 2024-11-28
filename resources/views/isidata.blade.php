<x-app-layout>
    <x-slot name="header">
        <h3 class="font-semibold text-grey-800 leading-tight text-center">
            {{ __('Masukkan Data Diri') }}
        </h3>
        <p><a href="{{ route('pilihmetode') }}" class="btn btn-primary btn-sm">Kembali</a></p>
    </x-slot>

    @php
        $metodeId = session('metode_terpilih');
        $metodeNama = $metodeId ? App\Models\ProdukMetode::find($metodeId)->nama : 'Belum dipilih';
    @endphp

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg-px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <h3 class="mb-3"><strong>{{ $metodeNama }}</strong></h3>                    
                    @if (session()->has('error'))
                    <div>
                        {{ session('error') }}
                    </div>
                    @endif

                    <!-- Form -->
                    <form id="myForm" action="{{route('isidata.save')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="container p-4 bg-light border rounded">
                            <h3 class="text-center mb-4">Form Data Anak dan Orang Tua</h3>

                            <!-- Data Anak -->
                            <h5 class="mb-4">Data Anak</h5>

                            <div class="row">
                            <div class="col mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama">
                                @error('nama')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col mb-3">
                                <label for="umur" class="form-label">Umur</label>
                                <input type="text" id="umur" name="umur" class="form-control" placeholder="Umur">
                            </div>
                            </div>

                            <div class="row">
                            <div class="col mb-3">
                                <label for="ttl" class="form-label">Tanggal Lahir</label>
                                <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control">
                            </div>
                            <div class="col mb-3">
                                <label for="berat_badan" class="form-label">Berat Badan</label>
                                <input type="text" id="berat_badan" name="berat_badan" class="form-control" placeholder="Berat badan">
                            </div>
                            </div>

                            <div class="row">
                            <div class="col mb-3">
                                <label for="tinggi_badan" class="form-label">Tinggi Badan</label>
                                <input type="text" id="tinggi_badan" name="tinggi_badan" class="form-control" placeholder="Tinggi badan">
                            </div>
                            <div class="col mb-3">
                                <label for="alergi" class="form-label">Riwayat Alergi Obat</label>
                                <input type="text" id="alergi_obat" name="alergi_obat" class="form-control" placeholder="Riwayat alergi obat">
                            </div>
                            </div>

                            <div class="row">
                            <div class="col mb-3">
                                <label for="riwayat_sakit" class="form-label">Riwayat Sakit</label>
                                <input type="text" id="riwayat_sakit" name="riwayat_sakit" class="form-control" placeholder="Riwayat sakit">
                            </div>
                            <div class="col mb-3">
                                <label for="kelainan_kencing" class="form-label">Kelainan Saat Kencing</label>
                                <input type="text" id="kelainan_kencing" name="kelainan_kencing" class="form-control" placeholder="Kelainan saat kencing">
                            </div>
                            </div>

                            <div class="row">
                            <div class="col mb-3">
                                <label for="kondisi_penis" class="form-label">Kondisi Penis dan Sekitarnya</label>
                                <input type="text" id="kondisi_penis" name="kondisi_penis" class="form-control" placeholder="Kondisi penis dan sekitarnya">
                            </div>
                            <div class="col mb-3">
                                <label for="kondisi_tubuh" class="form-label">Kondisi Tubuh Anak</label>
                                <input type="text" id="kondisi_tubuh" name="kondisi_tubuh" class="form-control" placeholder="Kondisi tubuh anak">
                            </div>
                            </div>

                            <!-- Data Orang Tua -->
                            <h5 class="mt-4 mb-4">Data Orang Tua</h5>

                            <div class="row">
                            <div class="col mb-3">
                                <label for="nama_orang_tua" class="form-label">Nama Orang Tua</label>
                                <input type="text" id="nama_orang_tua" name="nama_orang_tua" class="form-control" placeholder="Nama orang tua">
                            </div>
                            <div class="col mb-3">
                                <label for="pekerjaan_orang_tua" class="form-label">Pekerjaan Orang Tua</label>
                                <input type="text" id="pekerjaan_orang_tua" name="pekerjaan_orang_tua" class="form-control" placeholder="Pekerjaan orang tua">
                            </div>
                            </div>

                            <div class="row">
                            <div class="col mb-3">
                                <label for="tanggalkhitan" class="form-label">Tanggal Khitan</label>
                                <input type="date" id="tanggal_khitan" name="tanggal_khitan" class="form-control">
                            </div>
                            <div class="col mb-3">
                                <label for="no_whatsapp" class="form-label">Nomor Whatsapp</label>
                                <input type="text" id="no_whatsapp" name="no_whatsapp" class="form-control" placeholder="Nomor Whatsapp">
                            </div>
                            </div>
                            
                            <div class="row">
                            <div class="col mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Alamat">
                            </div>

                            <!-- Submit Button -->
                            <div class="d-grid mt-4">
                                <button type="button" class="btn btn-primary" onclick="showConfirmationModal()">Submit</button>
                            </div>
                        </div>
                    </form>

                    <!-- Modal Konfirmasi -->
                    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="confirmationModalLabel">Konfirmasi Submit</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <p><strong>Nama : </strong> <span id="confirmNama"></span></p>
                                <p><strong>Umur : </strong> <span id="confirmUmur"></span></p>
                                <p><strong>Tanggal : </strong> <span id="confirmTanggal_lahir"></span></p>
                                <p><strong>Berat Badan : </strong> <span id="confirmBerat_badan"></span></p>
                                <p><strong>Tinggi Badan : </strong> <span id="confirmTinggi_badan"></span></p>
                                <p><strong>Alergi Obat : </strong> <span id="confirmAlergi_obat"></span></p>
                                <p><strong>Riwayat Penyakit : </strong> <span id="confirmRiwayat_sakit"></span></p>
                                <p><strong>Kelainan Kencing : </strong> <span id="confirmKelainan_kencing"></span></p>
                                <p><strong>Kondisi Penis : </strong> <span id="confirmKondisi_penis"></span></p>
                                <p><strong>Kondisi Tubuh : </strong> <span id="confirmKondisi_tubuh"></span></p>
                                <p><strong>Nama Orang Tua : </strong> <span id="confirmNama_orang_tua"></span></p>
                                <p><strong>Pekerjaan Orang Tua : </strong> <span id="confirmPekerjaan_orang_tua"></span></p>
                                <p><strong>Almat : </strong> <span id="confirmAlamat"></span></p>
                                <p><strong>No Whatsapp : </strong> <span id="confirmNo_whatsapp"></span></p>
                                <p><strong>Tanggal Khitan : </strong> <span id="confirmTanggal_khitan"></span></p>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="button" class="btn btn-primary" onclick="submitForm()" method="POST">Konfirmasi</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- JavaScript untuk menampilkan modal dan submit form -->
                    <script>
                        function showConfirmationModal() {
                            // Ambil nilai dari input form
                            document.getElementById('confirmNama').innerText = document.getElementById('nama').value;
                            document.getElementById('confirmUmur').innerText = document.getElementById('umur').value;
                            document.getElementById('confirmTanggal_lahir').innerText = document.getElementById('tanggal_lahir').value;
                            document.getElementById('confirmBerat_badan').innerText = document.getElementById('berat_badan').value;
                            document.getElementById('confirmTinggi_badan').innerText = document.getElementById('tinggi_badan').value;
                            document.getElementById('confirmAlergi_obat').innerText = document.getElementById('alergi_obat').value;
                            document.getElementById('confirmRiwayat_sakit').innerText = document.getElementById('riwayat_sakit').value;
                            document.getElementById('confirmKelainan_kencing').innerText = document.getElementById('kelainan_kencing').value;
                            document.getElementById('confirmKondisi_penis').innerText = document.getElementById('kondisi_penis').value;
                            document.getElementById('confirmKondisi_tubuh').innerText = document.getElementById('kondisi_tubuh').value;
                            document.getElementById('confirmNama_orang_tua').innerText = document.getElementById('nama_orang_tua').value;
                            document.getElementById('confirmPekerjaan_orang_tua').innerText = document.getElementById('pekerjaan_orang_tua').value;
                            document.getElementById('confirmAlamat').innerText = document.getElementById('alamat').value;
                            document.getElementById('confirmNo_whatsapp').innerText = document.getElementById('no_whatsapp').value;
                            document.getElementById('confirmTanggal_khitan').innerText = document.getElementById('tanggal_khitan').value;


                            // Lanjutkan untuk input lain

                            // Tampilkan modal
                            var confirmationModal = new bootstrap.Modal(document.getElementById('confirmationModal'));
                            confirmationModal.show();
                        }

                        function submitForm() {
                            const form = document.getElementById('myForm');
                            form.addEventListener('submit', function(event) {
                                event.preventDefault(); // Mencegah pengiriman default
                                window.location.href = "{{ route('pembayaran') }}"; // Arahkan ke halaman pembayaran
                                form.submit(); // Kirim form setelah pengalihan
                            });
                            form.submit(); // Panggil submit untuk memicu event listener di atas
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
