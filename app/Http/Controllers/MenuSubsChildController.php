<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuSubsChild;
use App\Models\Menu;
use App\Models\MenuSub;

class MenuSubsChildController extends Controller
{
    public function showChildSubmenu()
    {
        $menus      = Menu::all(); // Mengambil data menu menggunakan model Menu
        $submenu    = MenuSub::all(); // Mengambil data menu menggunakan model Menu
        
        $data = [
            'title' => "Child Submenu",
            'subtitle' => "List Child Submenu",
            'menus' => $menus,
            'submenu' => $submenu,
        ];
        
        return view('Konten/submenuchild', $data);
    }

    public function childsubAction(Request $request)
{
    // Validasi input form jika diperlukan
    $validatedData = $request->validate([
        'id_submenu' => 'required',
        'title' => 'required|max:255',
        'url' => 'required|max:255',
        'is_active' => 'required|boolean',
    ]);

    // Simpan data child submenu ke dalam tabel menus_subs_child
    MenuSubsChild::create([
        'id_submenu' => $request->input('id_submenu'),
        'title' => $request->input('title'),
        'url' => $request->input('url'),
        'is_active' => $request->input('is_active'),
    ]);

    // Redirect atau kembali ke halaman sebelumnya dengan pesan sukses
    return redirect()->back()->with('success', 'Child submenu berhasil ditambahkan');
}

    public function edit($id)
    {
        // Tampilkan form untuk mengedit child submenu dengan ID tertentu
    }

    public function update(Request $request, $id)
    {
        // Validasi input form jika diperlukan
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'url' => 'required|max:255',
            'is_active' => 'required|boolean',
        ]);

        // Perbarui data child submenu berdasarkan ID
        $childSubmenu = MenuSubsChild::findOrFail($id);
        $childSubmenu->title = $request->input('title');
        $childSubmenu->url = $request->input('url');
        $childSubmenu->is_active = $request->input('is_active');
        $childSubmenu->save();

        // Redirect atau kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Child submenu berhasil diperbarui');
    }

    public function destroy($id)
    {
        // Hapus child submenu berdasarkan ID
        MenuSubsChild::findOrFail($id)->delete();

        // Redirect atau kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Child submenu berhasil dihapus');
    }
}
