<?php

namespace App\Http\Middleware;

use Closure;

class RolesMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $roles = array_slice(func_get_args(), 2);
        // var_dump($roles);
        // die;

        foreach($roles as $role) {
            if($request->user()->hasRole($role)){
                return $next($request);
            }
        }
        
        return response('Không có quyền truy cập', 401);
    }
}