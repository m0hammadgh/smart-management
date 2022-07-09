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
                    $request->session()->forget('User');
                    Cookie::queue('User', '', -1);
                    return redirect('/user/login')->with('msg','کاربری یافت نشد');

                }
            }
        }

        if($request->session()->has('User')){
            global $User;
            $User = User::find($request->session()->get('User')->id);
            if (!$User)
            {
                $request->session()->forget('User');
                Cookie::queue('User', '', -1);
                return redirect('/user/login')->with('msg','کاربری یافت نشد');
            }

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
        view()->share('user',$User);

        return $next($request);
    }
}
