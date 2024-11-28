<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('isi_data', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('umur');
            $table->date('tanggal_lahir');
            $table->integer('berat_badan');
            $table->integer('tinggi_badan');
            $table->string('alergi_obat');
            $table->string('riwayat_sakit');
            $table->string('kelainan_kencing');
            $table->string('kondisi_penis');
            $table->string('kondisi_tubuh');
            $table->string('nama_orang_tua');
            $table->string('pekerjaan_orang_tua');   
            $table->string('alamat');
            $table->string('no_whatsapp');
            $table->date('tanggal_khitan');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('isi_data');
    }
};
