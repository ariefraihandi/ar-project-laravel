<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Import DB class
use Illuminate\Support\Facades\Log; // Import Log class
use App\Models\MenuSub;
use App\Models\Menu;
use App\Models\UsersRole;
use App\Models\AccessSubmenu; // Import AccessSubmenu model
use Illuminate\Support\Facades\Auth; // Import Auth facade

class SubmenuController extends Controller
{
    public function showSubmenu()
    {
        $menus = Menu::all(); // Mengambil data menu menggunakan model Menu
        $user = auth()->user();
        $userRole = UsersRole::where('id', $user->role_id)->first();
      
        $roleId = $user->role_id; 

        $data = [
            'title' => "Submenu",
            'subtitle' => "List Submenu",
            'menus' => $menus,
            'userRole' => $userRole,
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

        try {
            // Start a database transaction
            DB::beginTransaction();
            $nextOrder = MenuSub::max('order') + 1;

            $menuSub = MenuSub::create([
                'menu_id' => $request->input('menu_id'),
                'title' => $request->input('title'),
                'order' => $nextOrder,
                'url' => $request->input('url'),
                'icon' => $request->input('icon'),
                'itemsub' => $request->input('itemsub'),
                'is_active' => $request->input('is_active'),
            ]);

            // Get the authenticated user's ID
            $user_id = Auth::id();

            // Create a new AccessSubmenu record
            $accessSubmenu = new AccessSubmenu();
            $accessSubmenu->role_id = $user_id; // You may adjust this based on your role logic
            $accessSubmenu->submenu_id = $menuSub->id; // Assuming $menuSub->id contains the ID of the newly created submenu
            $accessSubmenu->save();

            // Commit the database transaction
            DB::commit();

            // Redirect atau kembali ke halaman sebelumnya dengan pesan sukses
            return redirect()->back()->with('success', 'Submenu berhasil ditambahkan');
        } catch (\Exception $e) {
            // Rollback the transaction on error
            DB::rollback();

            $errorMessage = 'Submenu creation error: ' . $e->getMessage();

            Log::error('Submenu creation error: ' . $errorMessage);

            // Handle the error and return a response with the error message
            return redirect()->back()->with('error', $errorMessage);
        }
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
