<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keluhan;

class KeluhanController extends Controller
{
    public function index()
    {
        $keluhan = Keluhan::orderBy('id', 'asc')->get();
        $total = Keluhan::count();
        return view('admin.produk.keluhan.keluhan', compact(['keluhan','total']));
    }
    

    
    // public function create()
    // {
    //     return view('admin.produk.metode.create');
    // }
    // public function delete($id)
    // {
    //     $produkmetode = Keluhan::findOrFail($id);
    //     $produkmetode->delete();
    
    //     // Flash message
    //     session()->flash('success', 'Produk berhasil dihapus');
        
    //     // Redirect ke halaman utama produk
    //     return redirect()->route('admin/produkmetode');
    // }
    

    // public function save(Request $request)
    // {
    //     // Validasi input
    //     $validation = $request->validate([
    //         'nama' => 'required',
    //         'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Pastikan file adalah gambar
    //         'harga' => 'required',
    //     ]);
    
    //     // Jika ada file gambar yang diunggah
    //     if ($request->hasFile('gambar')) {
    //         $file = $request->file('gambar');
    //         $filename = time() . '_' . $file->getClientOriginalName();
    //         $file->move(public_path('images'), $filename); // Simpan gambar ke folder public/images
    //         $validation['gambar'] = 'images/' . $filename; // Simpan path gambar di database
    //     }
    
    //     $data = ProdukMetode::create($validation);
    
    //     if ($data) {
    //         session()->flash('success', 'Produk berhasil ditambahkan');
    //         return redirect(route('admin/produkmetode'));
    //     } else {
    //         session()->flash('error', 'Ada masalah saat menambahkan produk');
    //         return redirect(route('admin/produkmetode/create'));
    //     }
    // }

    // public function edit($id)
    // {
    //     $produkmetode = ProdukMetode::findOrFail($id);
    //     return view ('admin.produk.metode.update', compact('produkmetode'));
    // }
    // public function update(Request $request, $id)
    // {
    //     $produkmetode = ProdukMetode::findOrFail($id);
        
    //     // Validasi input
    //     $validatedData = $request->validate([
    //         'nama' => 'required',
    //         'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //         'harga' => 'required|numeric',
    //     ]);
        
    //     // Update nama dan harga
    //     $produkmetode->nama = $validatedData['nama'];
    //     $produkmetode->harga = $validatedData['harga'];
    
    //     // Hanya update gambar jika ada file gambar baru yang diunggah
    //     if ($request->hasFile('gambar')) {
    //         // Hapus gambar lama jika ada
    //         if ($produkmetode->gambar && file_exists(public_path($produkmetode->gambar))) {
    //             unlink(public_path($produkmetode->gambar)); // Menghapus gambar lama
    //         } else {
    //         }
    
    //         // Simpan gambar baru
    //         $file = $request->file('gambar');
    //         $filename = time() . '_' . $file->getClientOriginalName();
    //         $file->move(public_path('images'), $filename);
    //         $produkmetode->gambar = 'images/' . $filename; // Update path gambar
    //     }
    
    //     // Simpan data ke database
    //     if ($produkmetode->save()) {
    //         session()->flash('success', 'Produk berhasil diperbarui');
    //         return redirect()->route('admin/produkmetode');
    //     } else {
    //         session()->flash('error', 'Ada masalah saat memperbarui produk');
    //         return redirect()->route('admin/produkmetode/edit', ['id' => $id]);
    //     }
    // }
            

}
