<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;
use Request;
use App\Role;

class RedirectIfNotAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

        $user = $request->session()->get('user');

        if (!$user) {
             return redirect('admin/login');
        }
        else {
            $currentRole = Request::route()->getName();
            if ($currentRole == 'Helper')
                return $next($request);

            if ($user->group_id == 1 || empty($currentRole)) {
                return $next($request);
            }
            $role = Role::where('access_path', $currentRole)->first();
            if (count($user->groupId->roles->where('role_id', $role->id)) == 1)
                return $next($request);

            return redirect('admin/permission-denied');
        }
    }
}
