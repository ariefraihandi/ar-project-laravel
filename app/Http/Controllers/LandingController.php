<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function showLandingPage()
    {
        $data = [
            'title'     => "Solusi untuk Kebutuhan Akademis Anda",
            'subtitle'     => "AR Project",            
        ];
        return view('dashboard', $data);
    }
    

    public function showLoginpage()
    {
        return view('login');
    }

    public function handleFormLogin(Request $request)
    {
        $request->validate([
            'email'  => 'email:valid|max:10',
            'password'  => 'string'
        ]);
    }
}
