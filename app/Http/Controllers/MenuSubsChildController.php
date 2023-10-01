<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\MenuSubsChild;
use App\Models\AccessChild; // Import AccessSubmenu model
use App\Models\Menu;
use App\Models\UsersRole;
use App\Models\MenuSub;

class MenuSubsChildController extends Controller
{
    public function showChildSubmenu()
    {
        $menus      = Menu::all(); // Mengambil data menu menggunakan model Menu
        $submenu    = MenuSub::all(); // Mengambil data menu menggunakan model Menu
        $user = auth()->user();
        $userRole = UsersRole::where('id', $user->role_id)->first();
      
        $roleId = $user->role_id; 


        $data = [
            'title' => "Child Submenu",
            'subtitle' => "List Child Submenu",
            'menus' => $menus,
            'submenu' => $submenu,
            'userRole' => $userRole,
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

        try {
            // Start a database transaction
            DB::beginTransaction();

            $nextOrder = MenuSubsChild::max('order') + 1;

            // Create the child submenu
            $childSubmenu = MenuSubsChild::create([
                'id_submenu' => $request->input('id_submenu'),
                'title' => $request->input('title'),
                'order' => $nextOrder,
                'url' => $request->input('url'),
                'is_active' => $request->input('is_active'),
            ]);

            $user_id = Auth::id();

            // Create a new AccessSubmenu record
            $accessChild = new AccessChild();
            $accessChild->role_id = $user_id; // Adjust this based on your role logic
            $accessChild->childsubmenu_id = $childSubmenu->id; // Use the ID of the newly created child submenu
            $accessChild->save();
            // Commit the database transaction
            DB::commit();

            // Redirect atau kembali ke halaman sebelumnya dengan pesan sukses
            return redirect()->back()->with('success', 'Child submenu berhasil ditambahkan');
        } catch (\Exception $e) {
            // Rollback the transaction on error
            DB::rollback();

            $errorMessage = 'Submenu creation error: ' . $e->getMessage();

            Log::error('Submenu creation error: ' . $errorMessage);

            // Handle the error and return a response with the error message
            return redirect()->back()->with('error', $errorMessage);
        }
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
