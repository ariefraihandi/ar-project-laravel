<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\UsersRole;
use App\Models\Users;
use App\Models\UsersProfile;
use App\Models\AccessMenu;

class MenuController extends Controller
{
    public function showMenusPage()
    {
        $user           = auth()->user();
        $users          = Users::where('id', $user->id)->first();
        $userRole       = UsersRole::where('id', $user->role_id)->first();
        $userProfile    = UsersProfile::where('user_id', $user->id)->first();
        $menus          = Menu::all();
        $roleId         = $user->role_id; 
        $data = [
            'title'         => "Menu",
            'subtitle'      => "List Menu",
            'userRole'      => $userRole,
            'menus'         => $menus,   
            'users'         => $users,
            'userProfile'   => $userProfile,
        ];
        return view('Konten/menus', $data);
    }

    public function menusAction(Request $request)
    {
        // Validasi input form jika diperlukan
        $validatedData = $request->validate([
            'menu' => 'required|max:255',
        ]);

        try {
            // Start a database transaction
            DB::beginTransaction();

            $nextOrder = Menu::max('order') + 1;

            // Create a new menu item with the calculated order
            $menu = new Menu();
            $menu->menu_name = $request->input('menu');
            $menu->order = $nextOrder;
            $menu->save();


            // Get the user_id from the session
            $user_id = Auth::id();

            // Create a new AccessMenu record
            $accessMenu = new AccessMenu();
            $accessMenu->user_id = $user_id;
            $accessMenu->menu_id = $menu->id; // Assuming $menu->id contains the ID of the newly created menu
            $accessMenu->save();

            // Commit the database transaction
            DB::commit();

        

            // Redirect atau kembali ke halaman sebelumnya dengan pesan sukses
            return redirect()->back()->with('success', 'Menu berhasil ditambahkan');
        // } catch (\Exception $e) {
        //     // Rollback the transaction on error
        //     DB::rollback();
        
        //     // Log the error using the Log facade
        //     Log::error('Menu creation error: ' . $e->getMessage());
        
        //     // Handle the error and return a response
        //     return redirect()->back()->with('error', 'Menu creation failed. Please try again.');
        // }

        } catch (\Exception $e) {
            // Rollback the transaction on error
            DB::rollback();
        
            $errorMessage = 'Menu creation error: ' . $e->getMessage();
        
            Log::error('Menu creation error: ' . $errorMessage);
        
            // Handle the error and return a response with the error message
            return redirect()->back()->with('error', $errorMessage);
        }
    }

    public function destroy($id)
    {
        // Hapus entri dari tabel access_menu yang memiliki menu_id yang sama dengan $id
        AccessMenu::where('menu_id', $id)->delete();

        // Kemudian hapus menu
        $menu = Menu::find($id);

        if (!$menu) {
            return redirect()->back()->with('error', 'Menu not found');
        }

        $menu->delete();

        return redirect()->back()->with('success', 'Menu and related access deleted successfully');
    }

    public function update(Request $request, $id)
    {
        // Validasi data input jika diperlukan

        // Temukan menu berdasarkan ID
        $menu = Menu::find($id);

        if (!$menu) {
            return redirect()->back()->with('error', 'Menu not found');
        }

        // Update data menu berdasarkan data input
        $menu->menu_name = $request->input('menu');
        $menu->order = $request->input('order');
        $menu->save();

        return redirect()->back()->with('success', 'Menu updated successfully');
    }

}
