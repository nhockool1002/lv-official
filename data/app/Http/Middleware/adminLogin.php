<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class adminLogin
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
        if(Auth::check()){
            $user = Auth::user();
            if($user->per_id == 4 or $user->per_id == 3)
                return $next($request);
            else
                return redirect('admin/dangnhap')->with('success_mesage','Bạn không đủ quyền hạn để truy cập AdminCP');
        }
        else{
            return redirect('admin/dangnhap')->with('success_mesage','Bạn chưa đăng nhập');;
        }
    }
}
