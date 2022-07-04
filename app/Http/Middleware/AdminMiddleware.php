<?php

namespace App\Http\Middleware;

use App\Models\Manager;
use App\Models\Notification;
use Closure;
use Illuminate\Support\Facades\Cookie;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        return $next($request);

        view()->share('section', $request->segment(2));
        view()->share('url',str_replace(url('/'),'',url()->current()));

        if(Cookie::get('Admin') != null){
            $userName = decrypt(Cookie::get('Admin'));
            if($userName){
                $Admin = Manager::where('user_name', $userName)->first();
                if($Admin){
                    $request->session()->put('Admin',$Admin);
                }
            }
        }
        if($request->session()->has('Admin')){
            global $Admin;
            $Admin = Manager::find($request->session()->get('Admin')->id);


        }else{
            return redirect('/admin/login')->with('msg',trans('messages.no_user_found'));
        }
        $Notifications = Notification::where('user_type','admin')->where('is_read','0')->orderBy('id','DESC')->get();
        view()->share('Notifications',$Notifications);
        # Segment
        view()->share('section', $request->segment(2));
        view()->share('url',str_replace(url('/'),'',url()->current()));


        # Admin
        view()->share('Admin',$Admin);


        return $next($request);
    }
}
