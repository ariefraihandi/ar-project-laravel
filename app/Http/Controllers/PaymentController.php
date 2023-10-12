<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\PembelianMakalah;
use App\Models\HargaBarang; 
use App\Models\Payment;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Mail;
use App\Mail\PaymentSuccessMail;

class PaymentController extends Controller
{
    public function processPayment(Request $request)
    {
        // Validasi input pembayaran
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'whatsapp' => 'required',
            'code_barang' => 'required',
        ]);

        // Ambil data harga barang dari tabel "barang" berdasarkan kode_barang
        $kode_barang = $request->code_barang;
        $barang = HargaBarang::where('kode_barang', $kode_barang)->first();

        // Periksa apakah barang ditemukan
        if (!$barang) {
            return response()->json(['message' => 'Barang tidak ditemukan'], 404);
        }

        // Harga barang dari data barang
        $product_price = $barang->harga_barang;

        // Selain harga barang, Anda juga dapat mengambil data lain dari barang jika diperlukan

        
        $va = env('IPAYMU_VA');
        $apiKey = env('IPAYMU_API_KEY');
        
        // $va = env('IPAYMU_VA_S');
        // $apiKey = env('IPAYMU_API_KEY_S');

        // Buat body request untuk iPaymu
        $body = [
            'product' => [$barang->nama_barang], // Sesuaikan dengan nama barang
            'qty' => [1], // Sesuaikan dengan jumlah barang
            'name' => [$request->name],
            'phone' => [$request->whatsapp],
            'price' => [$product_price], // Sesuaikan dengan harga barang
            'returnUrl' => 'https://your-website.com/thank-you-page', // Sesuaikan dengan URL sukses
            'cancelUrl' => 'https://your-website.com/cancel-page', // Sesuaikan dengan URL batal
            'notifyUrl' => 'https://your-website.com/callback-url', // Sesuaikan dengan URL callback
            'referenceId' => '1234', // Sesuaikan dengan referensi ID Anda
        ];

        // Generate Signature
        $jsonBody = json_encode($body, JSON_UNESCAPED_SLASHES);
        $requestBody = strtolower(hash('sha256', $jsonBody));
        $stringToSign = strtoupper('POST') . ':' . $va . ':' . $requestBody . ':' . $apiKey;
        $signature = hash_hmac('sha256', $stringToSign, $apiKey);
        $timestamp = date('YmdHis');

        // Buat objek Guzzle HTTP Client
        $client = new Client();

        // Buat permintaan POST ke iPaymu
        $response = $client->post('https://sandbox.ipaymu.com/api/v2/payment', [
        // $response = $client->post('https://my.ipaymu.com/api/v2/payment', [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                // 'ip' => '127.0.0.1',
                'va' => $va,
                'signature' => $signature,
                'timestamp' => $timestamp,
            ],
            'json' => $body,
        ]);

        // Ambil data respons dari iPaymu
        $responseData = json_decode($response->getBody());

        if ($responseData->Status == 200) {
            $sessionId = $responseData->Data->SessionID;
            $url = $responseData->Data->Url;
            return redirect($url); // Redirect ke halaman pembayaran iPaymu
        } else {
            return response()->json(['message' => 'Gagal membuat pembayaran di iPaymu'], 400);
        }
    }

    public function handleIPaymuCallback(Request $request)
{
    // Dapatkan data callback dari iPaymu
    $callbackData = $request->all();
    \Log::info('Callback Data:', $callbackData);

    // Proses data callback dan cari pembelian berdasarkan reference_id
    $referenceId = $callbackData['reference_id'];
    \Log::info('Reference ID:', $referenceId);

    $pembelian = PembelianMakalah::where('token', $referenceId)->first();
    \Log::info('Pembelian:', $pembelian);

    if ($pembelian) {
        \Log::info('Pembelian Status Before Update:', $pembelian->status);
        // Update status pembelian menjadi berhasil
        $pembelian->status = 1;
        $pembelian->save();
        \Log::info('Pembelian Status After Update:', $pembelian->status);

        // Kirim email ke pembeli
        Mail::to($pembelian->email)->send(new PaymentSuccessMail($pembelian));
    }

    // Respon ke iPaymu dengan OK
    return response('OK', 200);
}


    public function thanks(Request $request)
    {
        $token = $request->query('token');
    
        // Cek apakah token ada di tabel pembelian_makalah
        $pembelian = PembelianMakalah::where('token', $token)->first();
        $data = [
            'title'     => "Pembayaran Berhasil",
            'subtitle'     => "AR Project",
            'pembelian' => $pembelian,
        ];

        if ($pembelian) {
            session()->flash('success', 'Pembayaran Berhasil.');
            return view('Konten/Boss/succesBayar', $data);
        } else {
            session()->flash('error', 'Data Tidak Ditemukan');
            return view('Konten/Boss/succesBayar', $data);
        }
    }

    public function cancelPayment($token)
    {
        $token = $request->query('token');
        $pembelian = PembelianMakalah::where('token', $token)->first();
        $data = [
            'title'     => "Pembayaran Gagal",
            'subtitle'     => "AR Project",
            'pembelian' => $pembelian,
        ];
        
        if ($pembelian) {
            session()->flash('error', 'Pembayaran Dibatalkan');
            return view('Konten/Boss/succesBayar', $data);
        } else {
            session()->flash('success', 'Data Tidak Ditemukan');
            return view('Konten/Boss/succesBayar', $data);
        }
    }
    
}
