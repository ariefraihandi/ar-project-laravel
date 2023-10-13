<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;
use App\Models\Users;
use App\Models\UsersProfile;
use App\Models\Files;
use App\Models\Menu;
use App\Models\UsersRole;
use App\Models\AccessMenu;
use App\Models\AccessSubmenu;
use App\Models\Access;
use App\Models\MenuSub;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;

class PortalController extends Controller
{
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

    private function getIPaymuBalance()
{
    // Set up the request to iPaymu API
    $account = env('IPAYMU_VA'); // Replace with your iPaymu VA (Virtual Account)
    $apiKey = env('IPAYMU_API_KEY'); // Replace with your iPaymu API key
    $timestamp = gmdate('YmdHis');

    $signature = hash('sha256', $account . $apiKey . $timestamp);

    // Create a cURL request
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://ipaymu.com/api/v2/balance', // Use the correct URL for the live environment
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode(['account' => $account]),
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'va: ' . $account,
            'signature: ' . $signature,
            'timestamp: ' . $timestamp,
        ),
    ));

    $response = curl_exec($curl);

    if (curl_errno($curl)) {
        return "Error: " . curl_error($curl);
    }

    curl_close($curl);

    // Parse the JSON response to extract the balance
    $responseData = json_decode($response, true);

if (isset($responseData['Data']['MerchantBalance'])) {
    return $responseData['Data']['MerchantBalance'];
} else {
    print_r($responseData); // This will print the response data for debugging
    return "Balance not found in response";
}

}

}
