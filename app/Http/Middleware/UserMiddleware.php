<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Support\Facades\Cookie;

class UserMiddleware
{
    public function handle($request, Closure $next)
    {

        view()->share('section', $request->segment(2));
        view()->share('url',str_replace(url('/'),'',url()->current()));

        if(Cookie::get('User') != null){
            $userName = decrypt(Cookie::get('User'));
            if($userName){
                $User = User::where('mobile_number', $userName)->first();
                if($User){
                    $request->session()->put('User',$User);
                }
                else{
                    $request->session()->forget('Admin');
                    Cookie::queue('Admin', '', -1);
                    return redirect('/user/login')->with('msg','کاربری یافت نشد');

                }
            }
        }

        if($request->session()->has('User')){
            global $User;
            $User = User::find($request->session()->get('User')->id);
           

        }else{
            return redirect('/user/login')->with('msg','کاربری یافت نشد');
        }
//        $Notifications = Notification::where('user_type','admin')->where('is_read','0')->orderBy('id','DESC')->get();
//        view()->share('Notifications',$Notifications);
        # Segment
        view()->share('section', $request->segment(2));
        view()->share('url',str_replace(url('/'),'',url()->current()));


        # Admin
        view()->share('User',$User);

        return $next($request);
    }
}
