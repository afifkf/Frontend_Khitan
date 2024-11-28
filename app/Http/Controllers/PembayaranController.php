<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        return view('pembayaran');
    }

    public function create()
    {
        return back()->with('success', 'Pembayaran berhasil diproses.');
    }


}
