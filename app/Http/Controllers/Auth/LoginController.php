<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Add this import statement

class LoginController extends Controller
{
    public function showLoginPage()
    {
        $data = [
            'title' => "Login",
            'subtitle' => "AR Project",
        ];

        return view('Konten.login', $data);
    }

    public function loginAction(Request $request)
{
    $credentials = $request->only('username', 'password');

    if (Auth::attempt(['email' => $credentials['username'], 'password' => $credentials['password']]) ||
        Auth::attempt(['username' => $credentials['username'], 'password' => $credentials['password']])) {
        
        $user = Auth::user(); // Perbaiki baris ini

        if ($user->status > 0) {
            // Kredensial berhasil dan status memenuhi syarat
            echo "yes";
        } else {
            // Kredensial berhasil tetapi status tidak memenuhi syarat
            Auth::logout();
            echo "error: Your account is not verified yet.";
        }
    } else {
        // Kredensial tidak berhasil
        echo "error: Invalid credentials";
    }
}

}
