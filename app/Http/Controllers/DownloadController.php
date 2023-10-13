<?php

// DownloadController.php
namespace App\Http\Controllers;

use App\Models\FreeDownloader;
use App\Models\Makalah;
use App\Models\DownloadLog;
use App\Models\PembelianMakalah;
use Illuminate\Http\Request;
use App\Notifications\FileUploaded;
use RealRashid\SweetAlert\Facades\Alert; // Import SweetAlert
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail; 
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Http;
use App\Mail\AdminNotification;

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
    
    public function bayar(Request $request)
    {
        // Validate user inputs
    
        // Get input values from the form
        $idMakalah = $request->input('id_makalah');
        $judulMakalah = $request->input('judul_makalah');
        $format = $request->input('format');
        $harga = $request->input('harga');
        $whatsapp = $request->input('whatsapp');
    
        // Process the WhatsApp number to remove '0' or '62' at the beginning
    
        // Set the data to be passed to the view
        $data = [
            'title' => "Data Pembayaran",
            'subtitle' => "AR Project",
            'idMakalah' => $idMakalah,
            'judulMakalah' => $judulMakalah,
            'format' => $format,
            'harga' => $harga,
        ];
        // Render the 'bayar' view with the data
        return view('Konten/Boss/bayar', $data);
    }
    
    public function submitBayar(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'id_makalah' => 'required',
                'judul_makalah' => 'required',
                'format' => 'required',
                'harga' => 'required',
                'email' => 'required|email',
                'whatsapp' => 'required',
            ]);
    
            $idMakalah = $validatedData['id_makalah'];
            $judulMakalah = $validatedData['judul_makalah'];
            $format = $validatedData['format'];
            $harga = $validatedData['harga'];
            $email = $validatedData['email'];
            $nomorHp = $validatedData['whatsapp'];
    
            $nomorHp = preg_replace('/^0|^(62)/', '', $nomorHp);
            $makalah = Makalah::where('kode', $idMakalah)->first();
    
            $token = Str::random(40);
    
            $pembelian = new PembelianMakalah();
            $pembelian->id_makalah = $idMakalah;
            $pembelian->judul_makalah = $judulMakalah;
            $pembelian->format = $format;
            $pembelian->harga = $makalah->harga;
            $pembelian->email = $email;
            $pembelian->nomor_hp = $nomorHp;
            $pembelian->token = $token;
            $pembelian->status = 0;
            $pembelian->save();

            $va = env('IPAYMU_VA');
            $apiKey = env('IPAYMU_API_KEY');


            // $domain = 'http://127.0.0.1:8000';
            $domain = 'https://ariefraihandi.biz.id';
    
            $body = [
                'product' => [$judulMakalah],
                'qty' => [1],
                'name' => [$email],
                'phone' => [$nomorHp],
                'price' => [$makalah->harga],
                'returnUrl' => $domain . '/thank?token=' . $token,
                'cancelUrl' => $domain . '/cancel?token=' . $token,
                'notifyUrl' => route('payment.handle'),
                'referenceId' => $token,
            ];
           
    
            $jsonBody = json_encode($body, JSON_UNESCAPED_SLASHES);
            $requestBody = strtolower(hash('sha256', $jsonBody));
            $stringToSign = strtoupper('POST') . ':' . $va . ':' . $requestBody . ':' . $apiKey;
            $signature = hash_hmac('sha256', $stringToSign, $apiKey);
            $timestamp = date('YmdHis');
    
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'va' => $va,
                'ip' => $request->ip(),
                'signature' => $signature,
                'timestamp' => $timestamp,
      
            // ])->post('https://sandbox.ipaymu.com/api/v2/payment', $body);
            ])->post('https://my.ipaymu.com/api/v2/payment', $body);
            $responseData = $response->json();
    
            if ($response->ok() && $responseData['Status'] == 200) {
                $sessionId = $responseData['Data']['SessionID'];
                $url = $responseData['Data']['Url'];
                return redirect($url);
            } else {
                $errorResponse = $response->json();
                $errorMessage = $errorResponse['Message']; // Assuming iPaymu provides an error message
            
                return redirect()->back()->with('error', 'Gagal membuat pembayaran di iPaymu: ' . $errorMessage);
            }
        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->with('error', 'An error occurred while processing your request.');
        }
    }
    
    public function downloadPayment(Request $request)
    {
        // Mendapatkan nilai token dari permintaan
        $token = $request->input('token');

        // Temukan data pembelian berdasarkan token atau ID yang sesuai
        $pembelian = PembelianMakalah::where('token', $token)->first();

        // Jika pembelian ditemukan
        if ($pembelian) {
            // Periksa status pembelian
            if ($pembelian->status == 1) {
                // Temukan makalah berdasarkan kode
                $makalah = Makalah::where('kode', $pembelian->id_makalah)->first();

                if ($makalah) {
                    // Redirect ke URL makalah dalam tab baru (target=_blank)
                    return redirect()->away($makalah->url);
                } else {
                    // Makalah tidak ditemukan
                    return response()->json(['message' => 'Makalah not found'], 404);
                }
            } else {
                // Status pembelian tidak valid
                return response()->json(['message' => 'Status pembelian tidak valid'], 400);
            }
        } else {
            // Pembelian tidak ditemukan
            return response()->json(['message' => 'Purchase not found'], 404);
        }
    }


    

    public function submitForm(Request $request)
    {
        // Validasi form
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'instagram' => 'required',
            'file1' => 'required|file|mimes:pdf',
            'file2' => 'required|file|mimes:pdf',
            'file3' => 'required|file|mimes:pdf',
            'followInstagram' => 'required|in:1', // Menambahkan validasi centang
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
                'ig_user' => $request->input('instagram'),
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
