<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class TabelUserController extends Controller
{
    public function index()
    {
        $user = User::orderBy('id', 'asc')->get();
        $total = User::count();
        return view('admin.tabeluser', compact(['user','total']));
    }
    // public function create()
    // {
    //     return view('admin.produk.metode.create');
    // }
    // public function delete($id)
    // {
    //     $produkmetode = User::findOrFail($id)->delete();
    // }


    // public function save(Request $request)
    // {
    //     $validation = $request->validate([
    //         'nama'=> 'required',
    //         'harga'=> 'required',
    //     ]);
    //     $data = User :: create($validation);
    //     if ($data){
    //         session()->flash('success', 'Produk berhasil ditambahkan');
    //         return redirect(route('admin/produkmetode'));
    //     } else {
    //         session()->flash('error', 'Ada masalah');
    //         return redirect(route('admin/produkmetode/create'));
    //     }


    // }
    // public function edit($id)
    // {
    //     $produkmetode = User::findOrFail($id);
    //     return view ('admin.produk.metode.update', compact('produkmetode'));
    // }
    // public function update(Request $request, $id)
    // {
    //     $produkmetode= User::findOrFail($id);
    //     $nama = $request->nama;
    //     $harga = $request->harga;

    //     $produkmetode ->nama = $nama;
    //     $produkmetode ->harga = $harga;
    //     $data = $produkmetode->save();
    //     if ($data){
    //         session()->flash('success', 'Produk berhasil diperbarui');
    //         return redirect(route('admin/produkmetode'));
    //     } else {
    //         session()->flash('error', 'Ada masalah saat memperbarui');
    //         return redirect(route('admin/produkmetode/update'));
    //     }


    // }



}
