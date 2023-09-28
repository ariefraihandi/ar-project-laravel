<?php

namespace App\Http\Controllers\Auth;

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
use App\Models\EmailVerificationToken; 
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;


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
        $email = $request->input('email');

        // Check if a user profile with the given username exists
        $user = Users::where('email', $email)->first();

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

        // Generate a secure verification token
        $verificationToken = Str::random(64);

        // Create the user
        $user = Users::create([
            'username' => $request->input('username'),
            'name' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'status' => '0', // Adjust as needed
        ]);

        $userProfile = UsersProfile::create([
            'user_id' => $user->id,
            'alamat' => '', // Sesuaikan dengan alamat jika ada
            'universitas' => '', // Sesuaikan dengan universitas jika ada
            'fakultas' => '', // Sesuaikan dengan fakultas jika ada
            'image' => '', // Sesuaikan dengan nama gambar jika ada
            'user_ig' => '',
            'user_tt' => '', // Sesuaikan dengan akun Twitter jika ada
            'user_fb' => '', // Sesuaikan dengan akun Facebook jika ada
        ]);

        // Store the token in the custom table
        $emailVerificationToken = EmailVerificationToken::create([
            'user_id' => $user->id,
            'token' => $verificationToken,
            'email' => $request->input('email'),
            'expires_at' => now()->addHours(24), // Adjust token expiration as needed
        ]);

        // Send the verification email
        Mail::to($user->email)->send(new SendEmail($user, $verificationToken));

        // Commit the transaction
        DB::commit();

        return redirect()->route('login.page')->with('success', 'Email Anda berhasil diverifikasi. Silakan masuk.');
       
    } catch (\Exception $e) {
        // Rollback the transaction on error
        DB::rollback();
    
        Log::error('Registration error: ' . $e->getMessage());
    
        // Handle the error and return a response
        return redirect()->back()->with('error', 'Registration failed. Please try again.');
    }
}


}
