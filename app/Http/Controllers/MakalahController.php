<?php

namespace App\Http\Controllers;


use App\Models\Users;
use App\Models\Makalah;
use App\Models\UsersRole;
use App\Models\UsersProfile;
use App\Models\FreeDownloader;
use App\Imports\MakalahImport;
use App\Models\DownloadLog; 
use Illuminate\Http\Request;
use App\Mail\SendEmail;
use App\Mail\VerifyFileEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class MakalahController extends Controller
{
    public function showUploadForm()
    {
        $user           = auth()->user();
        $users          = Users::where('id', $user->id)->first();
        $userRole       = UsersRole::where('id', $user->role_id)->first();
        $userProfile    = UsersProfile::where('user_id', $user->id)->first();
        $makalas        = Makalah::all();
        $data = [
            'title'         => "Bosmakalah",
            'subtitle'      => "Daftar Makalah",
            'userRole'      => $userRole,  
            'users'         => $users,
            'userProfile'   => $userProfile,
            'makalas'       => $makalas,
        ];
        $data['checkAccesschild'] = [$this, 'checkAccesschild']; 
        $data['checkAccessSub'] = [$this, 'checkAccessSub']; 

       return view('Konten/Boss/makalah', $data);
    }
    
    public function showFiles()
    {
        $user           = auth()->user();
        $users          = Users::where('id', $user->id)->first();
        $userRole       = UsersRole::where('id', $user->role_id)->first();
        $userProfile    = UsersProfile::where('user_id', $user->id)->first();
        $makalas        = FreeDownloader::all();
        $data = [
            'title'         => "Bosmakalah",
            'subtitle'      => "Pengajuan Download",
            'userRole'      => $userRole,  
            'users'         => $users,
            'userProfile'   => $userProfile,
            'makalas'       => $makalas,
        ];
        $data['checkAccesschild'] = [$this, 'checkAccesschild']; 
        $data['checkAccessSub'] = [$this, 'checkAccessSub']; 

       return view('Konten/Boss/freedownloader', $data);
    }

    public function upload(Request $request)
    {
        // Validasi file yang diunggah
        $request->validate([
            'makalah_file' => 'required|mimes:xlsx',
        ]);

        $file = $request->file('makalah_file');

        if ($file) {
            try {
                // Impor data dari file Excel ke dalam database menggunakan kelas impor
                Excel::import(new MakalahImport, $file);

                return redirect()->route('makalah.upload')->with('success', 'Data dari Excel berhasil diimpor.');
            } catch (\Exception $e) {
                Log::error($e->getMessage()); // Log pesan kesalahan
                return redirect()->route('makalah.upload')->with('error', 'Terjadi kesalahan saat mengimpor data.');
            }
        } else {
            return redirect()->route('makalah.upload')->with('error', 'File Excel tidak ditemukan.');
        }
    }
    
    public function sendSuccessEmail(Request $request)
    {
        $email = $request->input('email');
        $token = $request->input('token');
        $kode = $request->input('id_makalah');

        // Lakukan pencarian dalam tabel free_downloader
        $result = FreeDownloader::where('token', $token)
                                ->where('id_makalah', $kode)
                                ->where('email', $email)
                                ->first();

        if ($result) {
            // Jika data ditemukan, cari data di tabel makalahs berdasarkan kode
            $makalah = Makalah::where('kode', $kode)->first();
            $download_token = $this->generateDownloadToken();

            if ($makalah) {
                // Jika data makalah ditemukan, insert token dan kode makalah ke dalam tabel download_logs
                DownloadLog::create([
                    'download_token' => $download_token,
                    'makalah_id' => $kode,
                    'url' => $makalah->url,
                ]);

                $verificationURL = "https://ariefraihandi.biz.id/download?token=$download_token&kode=$kode";
                
                // Mengirim email ke alamat email penerima yang didapat dari $email
                Mail::to($email)->send(new VerifyFileEmail($verificationURL));
            
                // Cetak pesan bahwa email telah dikirim
                return redirect()->back()->with('success', 'Email Berhasil Dikirim');
            } else {
                // Jika data makalah tidak ditemukan, cetak pesan bahwa makalah tidak ditemukan
                echo "Makalah tidak ditemukan";
            }
        } else {
            // Jika data tidak ditemukan, cetak pesan bahwa data tidak ditemukan
            echo "Data tidak ditemukan";
        }
    }



    private function generateDownloadToken()
    {
        $characters = '0123456789';
        $token = '';

        for ($i = 0; $i < 10; $i++) {
            $token .= $characters[random_int(0, strlen($characters) - 1)];
        }

        return $token;
    }

}
