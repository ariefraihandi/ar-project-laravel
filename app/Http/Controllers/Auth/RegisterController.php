<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Users; // Change from Users to User
use App\Models\UserProfile;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function showRegisPage()
    {
        $data = [
            'title' => "Register",
            'subtitle' => "AR Project",
        ];

        return view('Konten.register', $data); // Updated the view name to use dot notation
    }

    public function checkUsername(Request $request)
    {
        $username = $request->input('username');

        // Check if a user profile with the given username exists
        $user = Users::where('username', $username)->first();

        if ($user) {
            // If a user profile with the username exists
            return response()->json(['available' => false]);
        } else {
            // If the username is available or not used
            return response()->json(['available' => true]);
        }
    }

   
    public function checkEmail(Request $request)
    {
        $username = $request->input('email');

        // Check if a user profile with the given username exists
        $user = Users::where('email', $username)->first();

        if ($user) {
            // If a user profile with the username exists
            return response()->json(['available' => false]);
        } else {
            // If the username is available or not used
            return response()->json(['available' => true]);
        }
    }

    public function registerUser(Request $request)
    {
        try {
            // Define the validation rules
            $validator = Validator::make($request->all(), [
                'username' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:6',
                'confirm-password' => 'required|same:password',
                'terms' => 'accepted',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Use a database transaction to ensure data consistency
            DB::beginTransaction();

            $user = Users::create([
                'username' => $request->input('username'),
                'email' => $request->input('email'),
                'password' => $request->input('password'),
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


}
