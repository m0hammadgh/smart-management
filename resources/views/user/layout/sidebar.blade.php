<header class="main-nav">
    <div class="sidebar-user text-center">
        <a class="setting-primary" href="javascript:void(0)"><i data-feather="settings"></i></a><img class="img-90 rounded-circle" src="/assets/user/images/65-658471_happy-man-happy-man-face-png.png" alt="" />
        @if($user->name=="" || $user->last_name=="" )
        <a class="btn btn-danger" href="{{route('user.complete_profile')}}">تکمیل اطلاعات</a>
        @elseif($user->email_verified ==false)
            <br/>
            <a class="btn btn-warning" href="{{route('user.email_verification')}}">تایید ایمیل</a>
        @elseif($user->status =="review_document")
            <br/>
            <a class="btn btn-success">در انتظار تایید مدارک</a>
        @else
            <a href="user-profile.html"> <h6 class="mt-3 f-14 f-w-600">{{$user->name}} {{$user->last_name}}</h6></a>
            <p class="mb-0 font-roboto">اداره منابع انسانی</p>

        @endif
        <ul>
            <li>
               <span >18</span>
                <p>روز باقیمانده</p>
            </li>
            <li>
                <span><span >2</span> %</span>
                <p>سود سایت</p>
            </li>
            <li>
                <span><span >70</span> %</span>
                <p>سود شما</p>
            </li>
        </ul>
    </div>
    <nav>
        <div class="main-navbar">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>بازگشت</span><i class="fa fa-angle-left ps-2" aria-hidden="true"></i></div>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>کاربری</h6>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav" href="{{route('user.profile')}}"><i data-feather="list"></i><span>پروفایل کاربری</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav" href="{{route('user.requests')}}"><i data-feather="list"></i><span>درخواست ها</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav" ><i data-feather="list"></i><span>حساب های بانکی</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav" href="#"><i data-feather="list"></i><span>طرح های ویژه</span></a>
                    </li>

                    <li class="sidebar-main-title">
                        <div>
                            <h6>اجزاء</h6>
                        </div>
                    </li>
                    <li>
                        <a class="nav-link menu-title link-nav" href="support-ticket.html"><i data-feather="headphones"></i><span>تیکت پشتیبانی</span></a>
                    </li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header>
