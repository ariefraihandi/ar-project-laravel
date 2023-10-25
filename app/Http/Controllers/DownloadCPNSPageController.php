<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DownloadCPNSPageController extends Controller
{
    public function showCpnsPage()
    {
        $data = [
            'title'     => "Download Bundling Soal CPNS",
            'subtitle'     => "AR Project",            
        ];
        return view('Konten/cpns', $data);
    }
}
