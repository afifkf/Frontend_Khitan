<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LabaRugiController extends Controller
{
    public function view()
{
    // Simulasi data penjualan per bulan
    $salesData = [
        'months' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        'sales' => [150, 200, 300, 250, 400, 320, 500, 450, 400, 550, 600, 700],
    ];

    return view('admin.dashboard', compact('salesData'));
}

public function LabaRugi()
{
    // Contoh data laba rugi
    $labaRugi = [
        ['bulan' => 'Januari', 'pendapatan' => 5000000, 'pengeluaran' => 3000000, 'laba' => 2000000],
        ['bulan' => 'Februari', 'pendapatan' => 6000000, 'pengeluaran' => 4000000, 'laba' => 2000000],
        ['bulan' => 'Maret', 'pendapatan' => 7000000, 'pengeluaran' => 3500000, 'laba' => 3500000],
    ];

    return view('admin.labarugi', compact('labaRugi'));
}


}
