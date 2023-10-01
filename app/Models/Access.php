<?php
// app/Models/Access.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Access extends Model
{
    use HasFactory;

    // Fungsi untuk mengambil akses berdasarkan role_id
    public static function getAccessByRoleId($roleId)
    {
        // Menggabungkan data akses dari ketiga tabel
        $menuAccesses = DB::table('access_menu')
            ->where('user_id', $roleId)
            ->get();

        $submenuAccesses = DB::table('access_submenu')
            ->where('role_id', $roleId)
            ->get();

        $childSubmenuAccesses = DB::table('access_child')
            ->where('role_id', $roleId)
            ->get();

        // Menggabungkan semua data akses menjadi satu koleksi
        $accesses = collect()
            ->concat($menuAccesses)
            ->concat($submenuAccesses)
            ->concat($childSubmenuAccesses);

        // Mendapatkan nama menu, submenu, dan child submenu untuk setiap akses
        foreach ($accesses as $access) {
            $access->menu_name = null;
            $access->submenu_name = null;
            $access->childsubmenu_name = null;
        
            if (property_exists($access, 'menu_id') && $access->menu_id !== null) {
                $menu = DB::table('menus')
                    ->where('id', $access->menu_id)
                    ->first();
        
                if ($menu) {
                    $access->menu_name = $menu->menu_name;
                }
            }
        
            if (property_exists($access, 'submenu_id') && $access->submenu_id !== null) {
                $submenu = DB::table('menus_sub')
                    ->where('id', $access->submenu_id)
                    ->first();
        
                if ($submenu) {
                    $access->submenu_name = $submenu->title;
                    $access->submenu_icon = $submenu->icon;
                    $access->submenu_itemsub = $submenu->itemsub;
                }
            }
        
            if (property_exists($access, 'childsubmenu_id') && $access->childsubmenu_id !== null) {
                $childSubmenu = DB::table('menus_subs_child')
                    ->where('id', $access->childsubmenu_id)
                    ->first();
        
                if ($childSubmenu) {
                    $access->childsubmenu_name = $childSubmenu->title;
                    $access->childsubmenu_url = $childSubmenu->url;
                }
            }
        }

        return $accesses;
    }
}
