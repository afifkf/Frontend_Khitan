<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IsiData extends Model
{
    use HasFactory;
    protected $table = 'isi_data';
    protected $fillable =[
        'nama',
        'umur',
        'tanggal_lahir',
        'berat_badan',
        'tinggi_badan',
        'alergi_obat',
        'riwayat_sakit',
        'kelainan_kencing',
        'kondisi_penis',
        'kondisi_tubuh',
        'nama_orang_tua',
        'pekerjaan_orang_tua',
        'alamat',
        'no_whatsapp',
        'tanggal_khitan',

    ];
}
