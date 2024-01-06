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
            // If the user is a regular user, restrict access and show unauthorized message
            if ($user->role == 'user') {
                abort(403, 'Unauthorized action. Only admins are allowed to access this resource.');
            }
        } else {
            // If the user is not logged in, provide an explanation and show the login form
            return redirect('/login')->with('status', 'You need to log in as an admin to access this resource.');
        }

        return $next($request);
    }
}
