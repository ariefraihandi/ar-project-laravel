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
        $users          = Users::where('id', $user->id)->first();

        $roleId = $user->role_id; // Mengambil role_id dari pengguna
        $menus = Menu::all();
        $data = [
            'title' => "Portal",
            'subtitle' => "AR Project",           
            'userRole' => $userRole,
            'users'         => $users,
            'menus' => $menus,

        ];
       
        // dd($userRole);
        // var_dump($userRole);
        return view('Konten/dashboard', $data); // Updated the view name to use dot notation
    }
}


// foreach ($accesses as $access) {
//     // Mengelompokkan data menu
//     if (isset($access->menu_name) && $access->menu_name !== null) {
//         $menuId = $access->id; // Gunakan ID sebagai kunci
//         $menus[$menuId] = [
//             'name' => $access->menu_name, // Nama menu
//             'submenus' => [], // Inisialisasi submenu
//         ];
//     }

//     // Mengelompokkan data submenu
//     if (isset($access->submenu_name) && $access->submenu_name !== null) {
//         // Pastikan menu terkait sudah ada dalam array menus
//         if (isset($menus[$menuId])) {
//             $submenuId = $access->id; // Gunakan ID sebagai kunci
//             $menus[$menuId]['submenus'][$submenuId] = [
//                 'name' => $access->submenu_name, // Nama submenu
//                 'icon' => $access->submenu_icon, // Nama submenu
//                 'itemsub' => $access->submenu_itemsub, // Nama submenu
//                 'childSubmenus' => [], // Inisialisasi child submenu
//             ];
//         }
//     }

//     // Mengelompokkan data child submenu
//     if (isset($access->childsubmenu_name) && $access->childsubmenu_name !== null) {
//         // Pastikan menu dan submenu terkait sudah ada dalam array menus
//         if (isset($menus[$menuId]) && isset($menus[$menuId]['submenus'][$submenuId])) {
//             $childSubmenuId = $access->id; // Gunakan ID sebagai kunci
//             $menus[$menuId]['submenus'][$submenuId]['childSubmenus'][$childSubmenuId] = [
//                 'name' => $access->childsubmenu_name, // Nama child submenu
//                 'url' => $access->childsubmenu_url, // URL dari child submenu
//             ];
//         }
//     }
// }