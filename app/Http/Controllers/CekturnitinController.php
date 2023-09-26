<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Users;
use App\Models\UsersProfile;
use App\Models\Files;
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

            $user = Users::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'status' => '0', // Sesuaikan dengan nilai yang sesuai
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

            // Commit the transaction
            DB::commit();

            return redirect()->back()->with('success', 'Data berhasil disimpan.');          
            
        } catch (\Exception $e) {
            // Rollback the transaction on error
            DB::rollback();
        
            // Redirect or return an error response
            return redirect()->back()->with('error', 'Terjadi kesalahan. Data tidak disimpan.');
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
