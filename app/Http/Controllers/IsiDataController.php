<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IsiData;

class IsiDataController extends Controller
{
    public function index()
    {
        $isidata = IsiData::orderBy('id', 'asc')->get();
        $total = IsiData::count();
        return view('isidata', compact(['isidata','total']));
    }
    public function create()
    {
        return view('isidata');
    }
    public function delete($id)
    {
        $isidata = IsiData::findOrFail($id)->delete();
    }


    public function save(Request $request)
    {
        $validation = $request->validate([
            'nama'=> 'required',
            'umur'=> 'required',
            'tanggal_lahir'=> 'required',
            'berat_badan'=> 'required',
            'tinggi_badan'=> 'required',
            'alergi_obat'=> 'required',
            'riwayat_sakit'=> 'required',
            'kelainan_kencing'=> 'required',
            'kondisi_penis'=> 'required',
            'kondisi_tubuh'=> 'required',
            'nama_orang_tua'=> 'required',
            'pekerjaan_orang_tua'=> 'required',
            'alamat'=> 'required',
            'no_whatsapp'=> 'required',
            'tanggal_khitan'=> 'required',
        ]);
        session(['nama_orang_tua' => $request->input('nama_orang_tua')]);
        session(['no_whatsapp' => $request->input('no_whatsapp')]);
        $data = IsiData :: create($validation);
        if ($data){
            session()->flash('success', 'Data berhasil ditambahkan');
            return redirect(route('pembayaran'));
        } else {
            session()->flash('error', 'Ada masalah');
            return redirect(route('isidata.save'));
        }


    }
    // public function edit($id)
    // {
    //     $isidata = IsiData::findOrFail($id);
    //     return view ('admin.produk.metode.update', compact('produkmetode'));
    // }
    // public function update(Request $request, $id)
    // {
    //     $isidata= IsiData::findOrFail($id);
    //     $nama = $request->nama;
    //     $harga = $request->harga;

    //     $isidata ->nama = $nama;
    //     $isidata ->harga = $harga;
    //     $data = $isidata->save();
    //     if ($data){
    //         session()->flash('success', 'Produk berhasil diperbarui');
    //         return redirect(route('admin/produkmetode'));
    //     } else {
    //         session()->flash('error', 'Ada masalah saat memperbarui');
    //         return redirect(route('admin/produkmetode/update'));
    //     }






}
