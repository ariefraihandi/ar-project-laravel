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
    return"10.000";
}

    

    
}
