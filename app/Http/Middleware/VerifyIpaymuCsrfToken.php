<?php

// app/Http/Middleware/VerifyIpaymuCsrfToken.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyIpaymuCsrfToken extends Middleware
{
    protected $except = [
        '/callback/ipaymu', // Add your callback route here
    ];

    public function handle($request, Closure $next)
    {
        // Check for CSRF token in the request except for the callback route
        if (! $this->inExceptArray($request) && ! $this->tokensMatch($request)) {
            // CSRF token mismatch - handle the error or log it
            return response('CSRF token mismatch', 400);
        }

        return $this->addCookieToResponse($request, $next($request));
    }
}

