<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\MenuSub;

class SubmenuController extends Controller
{
    public function showSubmenu()
    {
        $menus = Menu::all(); // Mengambil data menu menggunakan model Menu
        
        $data = [
            'title' => "Submenu",
            'subtitle' => "List Submenu",
            'menus' => $menus,
        ];
        
        return view('Konten/submenu', $data);
    }


    public function submenuAction(Request $request)
    {
        // Validasi input form jika diperlukan
        $validatedData = $request->validate([
            'menu_id' => 'required',
            'title' => 'required|max:255',
            'url' => 'required|max:255',
            'icon' => 'required|max:255',
            'itemsub' => 'required|max:255',
            'is_active' => 'required|boolean',
        ]);

        // Simpan data submenu ke dalam tabel menus_sub
        MenuSub::create([
            'menu_id' => $request->input('menu_id'),
            'title' => $request->input('title'),
            'url' => $request->input('url'),
            'icon' => $request->input('icon'),
            'itemsub' => $request->input('itemsub'),
            'is_active' => $request->input('is_active'),
        ]);

        // Redirect atau kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Submenu berhasil ditambahkan');
    }

    public function store(Request $request)
    {
        // Simpan submenu baru ke database
    }

    public function edit($id)
    {
        // Tampilkan form untuk mengedit submenu berdasarkan ID
    }

    public function update(Request $request, $id)
    {
        // Perbarui submenu berdasarkan ID
    }

    public function destroy($id)
    {
        // Hapus submenu berdasarkan ID
    }
}
