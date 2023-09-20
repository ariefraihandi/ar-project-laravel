<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CekturnitinController extends Controller
{
    public function showTurnitinPage()
    {
        $data = [
            'title'     => "Pengecekan Turnitin Gratis",
            'subtitle'     => "AR Project",
            
        ];
        return view('Konten/turnitin', $data);
    }


    public function checkTurnitin(Request $request)
{
    // Validasi input
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'instagram_username' => 'required|string|max:255',
        'file' => 'required|mimes:doc,docx,pdf|max:3048', // Sesuaikan dengan tipe file yang diizinkan dan ukuran maksimumnya
    ]);

    // Simpan file yang diunggah ke server (misalnya dalam direktori 'uploads')
    $file = $request->file('file');
    $fileName = time() . '_' . $file->getClientOriginalName();
    $file->move(public_path('uploads'), $fileName);

    $inputData = [
        'name' => $request->name,
        'email' => $request->email,
        'instagram_username' => $request->instagram_username,
        'file_name' => $fileName,
    ];

    // Menampilkan data inputan dalam bentuk array
    echo '<pre>';
    print_r($inputData);
    echo '</pre>';
    // $result = "Hasil pengecekan Turnitin: 80% similarity"; // Gantilah dengan hasil sebenarnya

    // return view('turnitin.result', compact('result'));
}

}
