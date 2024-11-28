<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProdukMetode extends Model
{
    use HasFactory;
    protected $table = 'produk_metodes';
    protected $fillable =[
        'nama',
        'gambar',
        'harga',
    ];
}
