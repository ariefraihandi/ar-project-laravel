<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Users;
use App\Models\UsersProfile;
use App\Models\Files;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;

class PortalController extends Controller
{
    public function showPortalPage()
    {
        $data = [
            'title' => "Portal",
            'subtitle' => "AR Project",
        ];

        return view('Konten/dashboard', $data); // Updated the view name to use dot notation
    }
}
