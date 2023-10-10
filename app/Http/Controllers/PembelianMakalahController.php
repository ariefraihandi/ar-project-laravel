<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PembelianMakalah;

class PembelianMakalahController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input jika diperlukan
        $request->validate([
            'id_makalah' => 'required',
            'judul_makalah' => 'required',
            'format' => 'required',
            'harga' => 'required',
        ]);

        // Simpan data pembelian makalah ke dalam database
        PembelianMakalah::create([
            'id_makalah' => $request->input('id_makalah'),
            'judul_makalah' => $request->input('judul_makalah'),
            'format' => $request->input('format'),
            'harga' => $request->input('harga'),
        ]);

        // Tambahkan logika lainnya jika diperlukan, seperti redirect ke halaman terima kasih
        // atau menampilkan pesan sukses.

        return redirect()->route('halaman-terima-kasih');
    }
}
