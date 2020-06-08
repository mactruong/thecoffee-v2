<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\admins;
use App\Models\role;
use Auth;

class CheckACLMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
       
        $admins = Admins::join('role','admins.id_role','=','role.id')
            ->select('admins.*','role.role_key as role_key')
            ->where('admins.id',Auth::guard('admin')->user()->id)
            ->first();
            
        if(!($admins->role_key == $role)){

            return $next($request);

        } else {
            
             return redirect()->back()->with('error', 'Bạn không có quyền vào trang này! Cảm Ơn');
        }
    }
}