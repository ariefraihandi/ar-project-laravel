<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\MenuSub;
use App\Models\MenuSubsChild;
use App\Models\AccessChild; 
use App\Models\AccessSubmenu; 
use App\Models\UsersRole;
use App\Models\Users;
use App\Models\UsersProfile;
use App\Models\AccessMenu;

class MenuRole extends Controller
{
    public function showRolePage()
    {
        $user           = auth()->user();
        $users          = Users::where('id', $user->id)->first();
        $userRole       = UsersRole::where('id', $user->role_id)->first();
        $userProfile    = UsersProfile::where('user_id', $user->id)->first();
        $roles          = UsersRole::all();
        $data = [
            'title'         => "Role",
            'subtitle'      => "Role List",
            'userRole'      => $userRole,
            'roles'         => $roles,   
            'users'         => $users,
            'userProfile'   => $userProfile,
        ];
        return view('Konten/Menus/role', $data);
    }

    public function destroy(Request $request, $id)
    {
        $role = UsersRole::find($id);

        if (!$role) {
            return redirect()->route('role.page')->with('error', 'Role tidak ditemukan');
        }

        $role->delete();

        return redirect()->route('role.page')->with('success', 'Role berhasil dihapus');
    }

    public function showAccessPage($id)
    {
        $user = auth()->user();
        $users = Users::where('id', $user->id)->first();
        $userRole = UsersRole::where('id', $user->role_id)->first();
        $userProfile = UsersProfile::where('user_id', $user->id)->first();
        $menus = Menu::all();
        $submenus = MenuSub::all();
        $childsubs = MenuSubsChild::all();
        $roleId = $user->role_id; 

        $data = [
            'title' => "Role",
            'subtitle' => "Role List",
            'userRole' => $userRole,
            'menus' => $menus,   
            'submenus' => $submenus,   
            'childsubs' => $childsubs,   
            'users' => $users,
            'userProfile' => $userProfile,
        ];
        $data['checkAccesschild'] = [$this, 'checkAccesschild']; 
        $data['checkAccessSub'] = [$this, 'checkAccessSub']; 

        return view('Konten/Menus/access', $data);
    }

    public function checkAccesschild($role_id, $childsubmenu_id)
    {
        $result = AccessChild::where('role_id', $role_id)
            ->where('childsubmenu_id', $childsubmenu_id)
            ->count();

        if ($result > 0) {
            return "checked='checked'";
        } else {
            return "";
        }
    }
    
    public function checkAccessSub($role_id, $submenu_id)
    {
        $result = AccessSubmenu::where('role_id', $role_id)
            ->where('submenu_id', $submenu_id)
            ->count();

        if ($result > 0) {
            return "checked='checked'";
        } else {
            return "";
        }
    }

    public function updateAccessChild(Request $request)
    {
        $roleId = $request->input('role_id');
        $childSubmenuId = $request->input('childsubmenu_id');
    
        // Hapus data AccessChild berdasarkan role_id dan childsubmenu_id
        AccessChild::where('role_id', $roleId)
                   ->where('childsubmenu_id', $childSubmenuId)
                   ->delete();
    
        // Respon sukses ke klien
        return redirect()->back()->with('success', 'Data AccessChild berhasil dihapus');
    }
    
}
