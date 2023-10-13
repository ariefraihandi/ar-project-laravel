<?php

// app/Http/Middleware/VerifyIpaymuCsrfToken.php

namespace App\Http\Middleware;

use Closure;

class VerifyIpaymuCsrfToken
{
    public function handle($request, Closure $next)
    {
        // Ensure that the request has the 'X-CSRF-TOKEN' header
        $requestToken = $request->header('X-CSRF-TOKEN');
        $expectedToken = csrf_token();

        if ($requestToken !== $expectedToken) {
            // CSRF token mismatch - handle the error or log it
            return response('CSRF token mismatch', 400);
        }

        return $next($request);
    }
}
