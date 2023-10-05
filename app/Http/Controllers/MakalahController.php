<?php

namespace App\Http\Controllers;


use App\Models\Makalah;
use App\Models\Users;
use App\Models\UsersProfile;
use App\Models\UsersRole;
use App\Imports\MakalahImport;
use Illuminate\Http\Request;
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
}
