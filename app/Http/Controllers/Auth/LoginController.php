<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Add this import statement
use Illuminate\Support\Facades\Session;

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
            
            $user = Auth::user();
            
            if ($user->status > 0) {
                // Ambil requested_url dari sesi
                $requestedUrl = $request->input('requested_url');
            
                if ($requestedUrl) {
                    // Redirect ke URL yang diminta sebelumnya setelah login berhasil
                    return redirect()->to($requestedUrl)->with('user_id', $user->id);
                    // echo $user->id;
                    // echo $requestedUrl;
                }
                

                // Jika tidak ada URL yang diminta sebelumnya, redirect ke halaman dashboard atau halaman lain yang sesuai.
                return redirect('/user')->with('user_id', $user->id);
                // echo $user->id;
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


    public function logoutAction(Request $request)
    {
        Auth::logout(); // Melakukan logout pengguna

        // Opsional: Anda dapat menghapus semua data sesi dengan Session::flush()
        // Session::flush();

        // Redirect ke halaman login atau halaman lain yang sesuai setelah logout
        return redirect()->route('login.page')->with('success', 'Anda telah berhasil logout.');
    }

}
