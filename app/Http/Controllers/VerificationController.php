<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\EmailVerificationToken;
use Carbon\Carbon;

class VerificationController extends Controller
{
    public function verifyEmail(Request $request)
    {
        $email = $request->query('email');
        $token = $request->query('token');

        // Cari token verifikasi berdasarkan alamat email
        $verificationToken = EmailVerificationToken::where('email', $email)->where('token', $token)->first();

        // Periksa apakah token verifikasi ditemukan
        if (!$verificationToken) {
            // Token tidak ditemukan, cek apakah email ada dalam database
            $user = Users::where('email', $email)->first();

            if (!$user) {
                // Email tidak ditemukan dalam database, kembali ke halaman registrasi
                return redirect()->route('registration')->with('error', 'Akun Anda belum terdaftar.');
            } else {
                // Email ditemukan, lihat status
                if ($user->status === 1) {
                    // Pengguna telah terverifikasi (status 1), mungkin ingin menangani lupa kata sandi di sini
                    return redirect()->route('login'); // Gantilah 'password.reset' dengan rute yang sesuai
                } else {
                    // Status pengguna adalah 0, token salah
                    return redirect()->route('register')->with('error', 'Token verifikasi salah.');
                }
            }
        }

        // Periksa apakah token kadaluarsa
        if ($this->isTokenExpired($verificationToken)) {
            // Token sudah kadaluarsa
            return redirect()->route('register')->with('error', 'Token verifikasi kadaluarsa.');
        }

        // Dapatkan pengguna berdasarkan email
        $user = Users::where('email', $email)->first();

        if ($user) {
            // Tandai email sebagai diverifikasi
            $user->status = 1;
            $user->activated_at = now();
            $user->save();
        }

        // Hapus token verifikasi setelah digunakan
        $verificationToken->delete();

        // Redirect ke halaman autentikasi setelah berhasil verifikasi
        return redirect()->route('login')->with('success', 'Email Anda berhasil diverifikasi. Silakan masuk.');
    }

    private function isTokenExpired($verificationToken)
    {
        // Periksa apakah token sudah kadaluarsa berdasarkan 'expires_at'
        return Carbon::now()->greaterThan($verificationToken->expires_at);
    }
}
