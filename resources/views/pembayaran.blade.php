<x-app-layout>
    <x-slot name="header">
        <h5 class="font-semibold text-grey-800 leading-tight">
            {{ __('Pembayaran') }}
        </h5>
    </x-slot>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Form Pembayaran</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pembayaran') }}" method="POST">
                            @csrf
                            
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Orang Tua</label>
                                <input type="text" 
                                       class="form-control" 
                                       id="name" 
                                       name="name" 
                                       placeholder="Masukkan nama lengkap" 
                                       value="{{ session('nama_orang_tua') }}" 
                                       required>
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">Nomor Whatsapp</label>
                                <input type="text" 
                                       class="form-control" 
                                       id="name" 
                                       name="name" 
                                       placeholder="Masukkan no Whatsapp" 
                                       value="{{ session('no_whatsapp') }}" 
                                       required>
                            </div>

                            <div class="mb-3">
                                <label for="status_pembayaran" class="form-label">Status Pembayaran</label>
                                <select class="form-control" id="status_pembayaran" name="status_pembayaran" onchange="toggleHutangInputs()" required>
                                    <option value="lunas">Lunas</option>
                                    <option value="hutang">Hutang</option>
                                </select>
                            </div>

                            <!-- Input tambahan muncul jika status 'Hutang' -->
                            <div id="hutang_inputs" style="display: none;">
                                <div class="mb-3">
                                    <label for="dp" class="form-label">Masukkan DP</label>
                                    <input type="number" class="form-control" id="dp" name="dp" placeholder="Masukkan jumlah DP">
                                </div>

                                <div class="mb-3">
                                    <label for="tenggat_bayar" class="form-label">Tenggat Bayar</label>
                                    <input type="date" class="form-control" id="tenggat_bayar" name="tenggat_bayar">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="payment_method" class="form-label">Metode Pembayaran</label>
                                <select class="form-control" id="payment_method" name="payment_method" required>
                                    <option value="transfer_bank">Transfer Bank</option>
                                    <option value="credit_card">Qris</option>
                                    <option value="e_wallet">E-Wallet</option>
                                    <option value="tunai">Tunai</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="amount" class="form-label">Jumlah Pembayaran</label>
                                <p id="amount_display" class="form-control" style="background-color: #f8f9fa; border: 1px solid #ced4da; padding: 8px;">Rp </p>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Bayar Sekarang</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="py-5 bg-dark text-light text-center mt-5">
        <div class="container">
            <p>&copy; 2024 Khitan Modern. Semua hak cipta dilindungi.</p>
        </div>
    </footer>

    <script>
        function toggleHutangInputs() {
            const statusPembayaran = document.getElementById('status_pembayaran').value;
            const hutangInputs = document.getElementById('hutang_inputs');
            
            if (statusPembayaran === 'hutang') {
                hutangInputs.style.display = 'block';
            } else {
                hutangInputs.style.display = 'none';
            }
        }
    </script>
</x-app-layout>
