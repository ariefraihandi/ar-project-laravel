<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if ($request->expectsJson()) {
            // Return a JSON response when the request expects JSON
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        Session::flash('requested_url', url()->current());
        Session::flash('error', 'Anda Belum Login.');
        return route('login.page');
    }
}
