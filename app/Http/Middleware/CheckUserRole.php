<?php

// CheckUserRole.php

namespace App\Http\Middleware;

use Closure;

class CheckUserRole
{
    public function handle($request, Closure $next)
    {
        $user = $request->user();

        // Check if the user is logged in
        if ($user) {
            // If the user is a regular user, restrict access and show unauthorized view
            if ($user->role == 'user') {
                return response()->view('auth-error', [], 403);
            }
        } else {
            // If the user is not logged in, redirect to login page
            return redirect('/login')->with('status', 'Anda perlu masuk sebagai admin untuk mengakses sumber daya ini.');
        }

        return $next($request);
    }
}
