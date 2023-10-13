<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use App\Models\Users;
use App\Models\UsersProfile;
use App\Models\Files;
use App\Models\Menu;
use App\Models\UsersRole;
use App\Models\AccessMenu;
use App\Models\AccessSubmenu;
use App\Models\Access;
use App\Models\MenuSub;
use GuzzleHttp\Client;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;

class PortalController extends Controller
{
    public function __construct() {
        $this->va = env('IPAYMU_VA_S');
        $this->apiKey = env('IPAYMU_API_KEY_S');
    
        // Tambahkan baris-baris berikut untuk menampilkan nilai variabel lingkungan
        // dd('VA:', $this->va, 'API Key:', $this->apiKey);
    }

    
    public function showPortalPage()
    {
        $user = auth()->user();
        $userRole = UsersRole::where('id', $user->role_id)->first();
        $users = Users::where('id', $user->id)->first();

        // Fetch the balance from iPaymu
        $balance = $this->getIPaymuBalance(); // Implement the method to get the balance

        $roleId = $user->role_id;
        $menus = Menu::all();
        $data = [
            'title' => "Portal",
            'subtitle' => "AR Project",
            'userRole' => $userRole,
            'users' => $users,
            'menus' => $menus,
            'balance' => $balance, // Add the balance to the data array
        ];

        return view('Konten/dashboard', $data);
    }


    private function formatBalance($balance) {
        $formattedBalance = '';
    
        if ($balance >= 1000000) {
            $formattedBalance = number_format($balance / 1000000, 1, ',', '.') . ' M';
        } elseif ($balance >= 1000) {
            $formattedBalance = number_format($balance / 1000, 1, ',', '.') . ' K';
        } else {
            $formattedBalance = number_format($balance, 1, ',', '.');
        }
    
        return $formattedBalance;
    }
    
    
    private function getIPaymuBalance() {
        $va = env('IPAYMU_VA');
        $apiKey = env('IPAYMU_API_KEY');
    
        $timestamp = date('YmdHis');
    
        $curl = curl_init();
    
        $data = [
            'account' => $va
        ];
    
        $jsonBody = json_encode($data, JSON_UNESCAPED_SLASHES);
        $requestBody = strtolower(hash('sha256', $jsonBody));
        $stringToSign = 'POST:' . $va . ':' . $requestBody . ':' . $apiKey;
        $signature = hash_hmac('sha256', $stringToSign, $apiKey);
    
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://my.ipaymu.com/api/v2/balance',
            // CURLOPT_URL => 'https://sandbox.ipaymu.com/api/v2/balance',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'signature: ' . $signature,
                'va: ' . $va,
                'timestamp: ' . $timestamp
            ),
        ));
        
    
        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    
        curl_close($curl);
    
        if ($httpCode === 200) {
            $responseData = json_decode($response, true);
            if ($responseData && isset($responseData['Data']['MerchantBalance'])) {
                $merchantBalance = $responseData['Data']['MerchantBalance'];
                // Format the balance
                $formattedBalance = $this->formatBalance($merchantBalance);
                return $formattedBalance;
            } else {
                return 'Failed to retrieve balance or invalid response.';
            }
        } else {
            return 'Failed to retrieve balance. HTTP Status: ' . $httpCode;
        }
    }
}
    