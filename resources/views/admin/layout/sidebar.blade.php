<header class="main-nav">
    <div class="sidebar-user text-center">
        <a class="setting-primary" href="javascript:void(0)"><i data-feather="settings"></i></a><img
            class="img-90 rounded-circle" src="/assets/mirror/images/1.png" alt=""/>
        <a href="user-profile.html"><h6 class="mt-3 f-14 f-w-600">پنل مدیریت</h6></a>
        <p class="mb-0 font-roboto">آخرین ورود :</p>
        <ul>
            <li>
                <span><span class="counter">1</span> </span>
                <p>تعداد کاربران</p>
            </li>
            <li>
                <span>2 </span>
                <p>کاربر جدید</p>
            </li>
            <li>
                <span><span class="counter">95.2</span> هزار</span>
                <p>سود دیروز</p>
            </li>
        </ul>
    </div>
    <nav>
        <div class="main-navbar">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>بازگشت</span><i class="fa fa-angle-left ps-2"
                                                                                aria-hidden="true"></i></div>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>عمومی</h6>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav" href="{{route('dashboard')}}"><i data-feather="zap"></i><span>داشبورد</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="airplay"></i><span>مدیریت</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="{{route('admin.index')}}">لیست مدیران</a></li>
                            <li><a href="{{route('admin.new')}}">افزودن مدیر </a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="layout"></i><span>کاربران </span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="{{route('user.index')}}">لیست کاربران</a></li>
                            <li><a href="{{route('user.new')}}">افزودن کاربر</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav" href="{{route('document.list')}}"><i data-feather="heart"></i><span>درخواست تایید مدارک</span></a>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>مالی</h6>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)">
                            <i data-feather="box"></i>
                            <span>بانک</span>
                        </a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="{{route('bank.list')}}">لیست بانک ها</a></li>
                            <li><a href="{{route('bank.add')}}">افزودن بانک</a></li>

                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)">
                            <i data-feather="folder-plus"></i>
                            <span>حساب بانکی کاربران</span>
                        </a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="{{route('bankAccounts.list')}}">درخواست های ثبت حساب</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="edit-3"></i><span>طرح های عضویت</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="{{route('subscription.list')}}">طرح های عضویت</a></li>
                            <li><a href="{{route('subscription.add')}}">افزودن طرح عضویت</a></li>
                        </ul>
                    </li>

                    <li class="sidebar-main-title">
                        <div>
                            <h6>پشتیبانی</h6>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="javascript:void(0)"> <i data-feather="sliders"></i><span>گروه پشتیبانی</span>
                        </a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="{{route('ticketCategory.list')}}">لیست</a></li>
                            <li><a href="{{route('ticketCategory.add')}}">افزودن</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav" href="{{route('dashboard')}}"><i data-feather="zap"></i><span>پیام های دریافتی</span></a>
                    </li>


            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header>
