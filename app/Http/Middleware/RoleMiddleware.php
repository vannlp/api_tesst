<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role = 'editer')
    {
        // echo (int)$role;
        // die;

        if($request->user()->hasRole($role)){
            return $next($request);
        }
        
        return response('Không có quyền truy cập', 401);
    }
}