<?php

// DownloadController.php
namespace App\Http\Controllers;

use App\Models\FreeDownloader;
use App\Models\Makalah;
use App\Models\DownloadLog;
use Illuminate\Http\Request;
use App\Notifications\FileUploaded;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert; // Import SweetAlert
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail; // Import Mail
use App\Mail\AdminNotification; // Import mail yang akan digunakan

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
        // Validasi form
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'file1' => 'required|file|mimes:pdf',
            'file2' => 'required|file|mimes:pdf',
            'file3' => 'required|file|mimes:pdf',
            'id_makalah' => 'required|string',
        ]);

        if ($validator->fails()) {
            // Validasi gagal, redirect kembali dengan pesan kesalahan dan input data
            return redirect()->back()
                ->with('error', 'Form Tidak Terisi Dengan Lengkap');
        }

        // Handle unggahan file
        $filePaths = [];

        foreach (['file1', 'file2', 'file3'] as $fieldName) {
            if ($request->hasFile($fieldName)) {
                $file = $request->file($fieldName);
                $originalFileName = $file->getClientOriginalName();

                // Generate nama unik dengan menambahkan awalan timestamp
                $uniqueFileName = time() . '_' . $originalFileName;

                // Simpan file dengan nama unik
                $filePath = $file->storeAs('uploads', $uniqueFileName, 'public');
                $filePaths[$fieldName] = $uniqueFileName;
            }
        }

        try {
            $token = str_pad(rand(1, pow(10, 10)-1), 10, '0', STR_PAD_LEFT);
            // Buat rekaman baru dalam database
            $fileUploader = FreeDownloader::create([
                'email' => $request->input('email'),
                'file1' => $filePaths['file1'] ?? null,
                'file2' => $filePaths['file2'] ?? null,
                'file3' => $filePaths['file3'] ?? null,
                'id_makalah' => $request->input('id_makalah'),
                'token' => $token, 
            ]);

            // Kirim notifikasi
            $fileUploader->notify(new FileUploaded());

            // Kirim email ke admin
            Mail::to('raihandi93@gmail.com')->send(new \App\Mail\AdminNotification());

            return redirect()->back()->with('success', 'Makalah Berhasil Dikirim, Mohon Cek Email Anda Secara Berkala.');
        } catch (\Exception $e) {
            $errorMessage = 'Kesalahan Sistem: ' . $e->getMessage();
            Log::error('Kesalahan Sistem: ' . $errorMessage);
            return redirect()->back()->with('error', $errorMessage);
        }
    }

    public function filesDownlodad(Request $request)
    {
        $token = $request->query('token');
        $kode = $request->query('kode');
    
        // Lakukan validasi token dan kode
        $downloadLog = DownloadLog::where('download_token', $token)
            ->where('makalah_id', $kode)
            ->first();
    
        if ($downloadLog) {
            $makalah = Makalah::where('kode', $kode)->first();
            $data = [
                'title'         => "Download Makalah",
                'subtitle'      => "AR Project",
                'url'           => $downloadLog->url,
                'download_token' => $downloadLog->download_token,
                'makalah_id'    => $downloadLog->makalah_id,
            ];
    
            // Return a view response
            return view('Konten/Boss/download', $data);
        }  else {
            $data = [
                'title'    => "Download Makalah",
                'subtitle' => "AR Project",
            ];
        
            // Return a view response with an error message using the key 'Error'
            return view('Konten/Boss/download', $data)->with('error', 'Token Tidak Valid.');
        }
    }

    

    public function downloading(Request $request)
{
    $downloadToken = $request->input('download_id');
    $downloadLog = DownloadLog::where('download_token', $downloadToken)->first();

    if ($downloadLog && $downloadLog->url) {
        // Delete the record from DownloadLog
        $downloadLog->delete();

        return response()->json([
            'success' => true,
            'downloadUrl' => $downloadLog->url,
        ]);
    }

    return response()->json([
        'success' => false,
        'error' => 'File Sudah Pernah Diunduh.',
    ]);
}

}
