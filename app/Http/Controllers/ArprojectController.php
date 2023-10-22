<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\MenuSub;
use App\Models\MenuSubsChild;
use App\Models\AccessChild; 
use App\Models\AccessSubmenu; 
use App\Models\UsersRole;
use App\Models\Users;
use App\Models\UsersProfile;
use App\Models\Pengguna;
use App\Models\AccessMenu;

class ArprojectController extends Controller
{
    public function showPenggunaPage()
    {
        $user           = auth()->user();
        $users          = Users::where('id', $user->id)->first();
        $userRole       = UsersRole::where('id', $user->role_id)->first();
        $userProfile    = UsersProfile::where('user_id', $user->id)->first();
        $penggunas      = Pengguna::all();
        $roleId         = $user->role_id; 
        $data = [
            'title'         => "Pengguna",
            'subtitle'      => "List",
            'userRole'      => $userRole,
            'penggunas'     => $penggunas,   
            'users'         => $users,
            'userProfile'   => $userProfile,
        ];
        return view('Konten/Arproject/penggunalist', $data);
    }

    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'instansi' => 'required',
            'alamat' => 'required',
            'whatsapp' => 'required',
            'email' => 'required|email',
            'api_key' => 'required',
            'status' => 'required',
        ]);

        // Simpan data pengguna ke dalam database
        Pengguna::create($validatedData);

        return redirect()->route('pengguna.Page')->with('success', 'Data pengguna berhasil ditambahkan.');
    }

    public function checkUserKey(Request $request)
    {
        $user_key = $request->input('user_key');
        $pengguna = Pengguna::where('api_key', $user_key)->first();
        
        if ($pengguna) {
            return response()->json(['message' => 'User key is valid'], 200);
        } else {
            return response()->json(['message' => 'User key is invalid'], 401);
        }
    }
    

}
