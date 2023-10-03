<?php

// DownloadController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FreeDownloader;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert; // Import SweetAlert
use Illuminate\Support\Facades\Validator;

class DownloadController extends Controller
{
    public function download(Request $request)
    {
        // Mendapatkan data dari URL
        $idMakalah = $request->input('id_makalah');
        $judulMakalah = $request->input('judul_makalah');
        $format = $request->input('format');
        $harga = $request->input('harga');
    
        // Simpan data dalam array $data
        $data = [
            'title'     => "Submit 3 Makalah",
            'subtitle'     => "AR Project",
            'idMakalah' => $idMakalah,
            'judulMakalah' => $judulMakalah,
            'format' => $format,
            'harga' => $harga,
        ];
    
        return view('Konten/Boss/free', $data);

    }


    public function submitForm(Request $request)
{
    // Validate the form data
    $validator = Validator::make($request->all(), [
        'email' => 'required|email',
        'file1' => 'required|file|mimes:pdf',
        'file2' => 'required|file|mimes:pdf',
        'file3' => 'required|file|mimes:pdf',
        'id_makalah' => 'required|string',
    ]);

    if ($validator->fails()) {
        // Validation fails, redirect back with error messages and input data
        return redirect()->back()
            ->with('error', 'Form Tidak Terisi Dengan Lengkap');
    }

    // Handle file uploads
    $filePaths = [];

    foreach (['file1', 'file2', 'file3'] as $fieldName) {
        if ($request->hasFile($fieldName)) {
            $file = $request->file($fieldName);
            $originalFileName = $file->getClientOriginalName();

            // Generate a unique file name by adding a timestamp prefix
            $uniqueFileName = time() . '_' . $originalFileName;

            // Store the file with the unique name
            $filePath = $file->storeAs('uploads', $uniqueFileName, 'public');
            $filePaths[$fieldName] = $uniqueFileName;
        }
    }

    try {
        // Create a new record in the database
        FreeDownloader::create([
            'email' => $request->input('email'),
            'file1' => $filePaths['file1'] ?? null,
            'file2' => $filePaths['file2'] ?? null,
            'file3' => $filePaths['file3'] ?? null,
            'id_makalah' => $request->input('id_makalah'),
        ]);

        // Redirect back with success message

        return redirect()->back()->with('success', 'Data berhasil disimpan.');
    } catch (\Exception $e) {

        $errorMessage = 'Kesalahan Sistem: ' . $e->getMessage();
        
        Log::error('Kesalahan Sistem: ' . $errorMessage);
    
        // Handle the error and return a response with the error message
        return redirect()->back()->with('error', $errorMessage);
    }
}
}
