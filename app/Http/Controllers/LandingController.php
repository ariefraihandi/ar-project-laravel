<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function showLandingPage(Request $request)
    {
        $data = [
            'title'     => "Ini adalah halaman Landing Page",
            'penerima'  => $request->penerima, 
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
