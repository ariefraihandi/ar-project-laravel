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
            'metatitle' => '<meta property="og:title" content="Ebook Soal CPNS - Dapatkan Kumpulan Soal CPNS Terbaru" />',
            'metadescription' => '<meta property="og:description" content="Kami adalah penyedia eBook Soal CPNS terpercaya. Dapatkan koleksi soal CPNS terbaru dan berkualitas untuk persiapan ujian Anda." />',
            'description' => '<meta name="description" content="Kami adalah penyedia soal-soal seleksi CPNS terakurat dan terupdate. Kami telah merangkum soal-soal terbaik dari berbagai sumber dengan akurasi soal 100 Akurat">',
            'gtagScript' => <<<SCRIPT
                                <script async src="https://www.googletagmanager.com/gtag/js?id=AW-11392355575">
                                </script>
                                <script>
                                window.dataLayer = window.dataLayer || [];
                                function gtag(){dataLayer.push(arguments);}
                                gtag('js', new Date());

                                gtag('config', 'AW-11392355575');
                                </script>
                            SCRIPT,
                            
        ];
        return view('Konten/cpns', $data);
    }
}
