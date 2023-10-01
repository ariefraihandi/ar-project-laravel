<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\UsersRole;
use App\Models\UsersProfile;
use App\Models\Users;

class AccountController extends Controller
{
    public function showAcountPage()
    {
        $user = auth()->user();
        $userRole = UsersRole::where('id', $user->role_id)->first();
        $userProfile = UsersProfile::where('user_id', $user->id)->first();
        $users = Users::where('id', $user->id)->first();
        $roleId = $user->role_id;
        $data = [
            'title' => "Account",
            'subtitle' => "Profil",
            'users' => $users,
            'userProfile' => $userProfile,
            'userRole' => $userRole,
        ];

        return view('Konten/user', $data);
    }

    public function updateProfile(Request $request)
    {
        // Start a database transaction
        DB::beginTransaction();

        try {
            // Validate the request data
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'whatsapp' => 'nullable|string|max:15',
                'alamat' => 'nullable|string|max:255',
                'universitas' => 'nullable|string|max:255',
                'fakultas' => 'nullable|string|max:255',
                'user_ig' => 'nullable|string|max:255',
                'profile_photo' => 'nullable|max:8000', // Max file size is 2MB (2048 KB)
            ]);

            // Get the currently authenticated user
            $user = Auth::user();

            // Update the user's name and email using the User model
            $user->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
            ]);

            // Retrieve the user's profile (assuming you have a one-to-one relationship)
            $profile = UsersProfile::where('user_id', $user->id)->first();

            if (!$profile) {
                // Create a new profile if it doesn't exist
                $profile = new UsersProfile([
                    'whatsapp' => $request->input('whatsapp'),
                    'alamat' => $request->input('alamat'),
                    'universitas' => $request->input('universitas'),
                    'fakultas' => $request->input('fakultas'),
                    'user_ig' => $request->input('user_ig'),
                ]);
                $user->profile()->save($profile);
            } else {
                // Update the existing profile
                $profile->update([
                    'whatsapp' => $request->input('whatsapp'),
                    'alamat' => $request->input('alamat'),
                    'universitas' => $request->input('universitas'),
                    'fakultas' => $request->input('fakultas'),
                    'user_ig' => $request->input('user_ig'),
                ]);
            }

            if ($request->hasFile('profile_photo')) {
                $uploadedFile = $request->file('profile_photo');
                
                // Validasi tipe file dan ukuran file
                $validatedData = $request->validate([
                    'profile_photo' => 'image|mimes:jpeg,png|max:2048', // Max file size is 2MB (2048 KB)
                ]);
            
                // Generate a unique file name based on the user's ID
                $fileName = 'profile_photo_' . auth()->user()->id . '.' . $uploadedFile->getClientOriginalExtension();
            
                // Store the uploaded photo in the public/profile directory
                $path = $uploadedFile->storeAs('public/profile', $fileName);
            
                // Save the file name to the user's profile
                $profile->update(['image' => $fileName]);
            }
            

            DB::commit();

            return redirect()->route('account.page')->with('success', 'Profile updated successfully.');
        } catch (\Exception $e) {
            // Rollback the transaction on error
            DB::rollback();

            $errorMessage = 'Update Error: ' . $e->getMessage();

            Log::error('Update Error: ' . $errorMessage);

            // Handle the error and return a response with the error message
            return redirect()->back()->with('error', $errorMessage);
        }
    }
}
