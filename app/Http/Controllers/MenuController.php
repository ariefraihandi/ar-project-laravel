<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function showMenusPage()
    {
        $data = [
            'title'     => "Menu",
            'subtitle'     => "List Menu",
            
        ];
        return view('Konten/menus', $data);
    }

    public function menusAction(Request $request)
    {
        // Validasi input form jika diperlukan
        $validatedData = $request->validate([
            'menu' => 'required|max:255',
        ]);

        // Buat instance model Menu dan simpan data ke database
        $menu = new Menu();
        $menu->menu_name = $request->input('menu');
        $menu->save();

        // Redirect atau kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Menu berhasil ditambahkan');
    }
}
