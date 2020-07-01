<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class Anewsauth
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
        $user = Auth::user();
        $username = $user->username;
        if($role!=''){
            $arRole = explode('|',$role);
            if(!in_array($username, $arRole)){
                //in ra thông báo không được quyền
                return redirect()->route('admin.user.index')->with('msg','Bạn không được quyền!');
            }
        }

        return $next($request);
    }
}
