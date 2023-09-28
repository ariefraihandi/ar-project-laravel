<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log; // Import Log facade
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str; // Import Str facade
use Illuminate\Http\Request;
use App\Mail\SendEmail;
use App\Models\Users; // Assuming this is your User model
use App\Models\UsersProfile;
use App\Models\Files;
use App\Models\EmailVerificationToken; 
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;



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
        try {
            // Define the validation rules
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'instagram_username' => 'required|string|max:255',
                'file' => 'required|mimes:doc,docx,pdf|max:3048',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Use a database transaction to ensure data consistency
            DB::beginTransaction();

            $verificationToken = Str::random(64);

            $user = Users::create([
                'name' => $request->input('name'),
                'username' => $request->input('instagram_username'),
                'email' => $request->input('email'),
                'password' => bcrypt('123456'),
                'status' => '0', 
            ]);

            $userProfile = UsersProfile::create([
                'user_id' => $user->id, // Menghubungkan profil dengan user yang baru dibuat
                'alamat' => '', // Sesuaikan dengan alamat jika ada
                'universitas' => '', // Sesuaikan dengan universitas jika ada
                'fakultas' => '', // Sesuaikan dengan fakultas jika ada
                'image' => '', // Sesuaikan dengan nama gambar jika ada
                'user_ig' => $request->input('instagram_username'),
                'user_tt' => '', // Sesuaikan dengan akun Twitter jika ada
                'user_fb' => '', // Sesuaikan dengan akun Facebook jika ada
            ]);

            $emailVerificationToken = EmailVerificationToken::create([
                'user_id' => $user->id,
                'token' => $verificationToken,
                'expires_at' => now()->addHours(24), // Adjust token expiration as needed
            ]);

            // Handle file upload
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $fileSize = $file->getSize();
                $fileMimeType = $file->getMimeType();

                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = 'public/turnitin';

                // Simpan file ke direktori yang sesuai
                $file->storeAs($filePath, $fileName);

                $file = Files::create([
                    'id_user' => $user->id, // Menghubungkan file dengan user yang baru dibuat
                    'file_name' => $fileName,
                    'file_size' => $fileSize,
                    'mime_type' => $fileMimeType,
                    'status' => '0', // Sesuaikan dengan nilai yang sesuai
                ]);
            }

            Mail::to($user->email)->send(new SendEmail($user, $verificationToken));
            // Commit the transaction
            DB::commit();

            return redirect()->back()->with('success', 'Data berhasil disimpan.');          
            
        } catch (\Illuminate\Database\QueryException $e) {
            // Mengakses pesan kesalahan
            $errorMessage = $e->getMessage();
            
            // Kemudian, Anda dapat melakukan tindakan sesuai kebutuhan
            // Contoh: Menyimpan pesan kesalahan dalam log atau menampilkannya kepada pengguna
            \Log::error('Terjadi kesalahan query: ' . $errorMessage);
            return redirect()->back()->with('error', 'Terjadi kesalahan dalam database.');
        }
    }

    public function checkAvailability(Request $request)
    {
        $username = $request->input('username');

        // Check if a user profile with the given Instagram username exists
        $userProfile = UsersProfile::where('user_ig', $username)
            ->where(function ($query) {
                $query->where('created_at', '>=', now()->subDays(30))
                    ->orWhere('updated_at', '>=', now()->subDays(30));
            })
            ->first();

        if ($userProfile) {
            // If a user profile with the username exists in the last 30 days
            return response()->json(['available' => false]);
        } else {
            // If the username is available or not used in the last 30 days
            return response()->json(['available' => true]);
        }
    }


}
