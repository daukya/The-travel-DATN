<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$role)
    {
        $username = Auth::user()->username;
        if(strpos($role,$username)===false){
            $request->session()->flash('msg',"Bạn không có quyền truy cập vào chức năng này");
            return redirect('/404');
        }
        return $next($request);
    }
}
