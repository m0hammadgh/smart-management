<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css" integrity="sha384-JvExCACAZcHNJEc7156QaHXTnQL3hQBixvj5RV5buE7vgnNEzzskDtx9NQ4p6BJe" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/assets/user/css/style.css">


    <link rel="stylesheet/less" type="text/css" href="/assets/user/css/styles.less" />
    <title>True Impact Partners</title>
</head>

<body>
<div class="wrapper text-center justify-content-center">
    <aside class="main-sidebar pad-15">
        <div class="user-info">
            <a href="#">
                <i class="fa fa-wrench"></i>
            </a>
            <div class="clearfix"></div>
            <div class="user-image mb-4">
                <img src="/assets/user/images/65-658471_happy-man-happy-man-face-png.png">
            </div>
            @if($user->name=="" || $user->last_name=="" )
                <a class="btn btn-danger" href="{{route('user.complete_profile')}}">تکمیل اطلاعات</a>
                <br/>
                <br/>

            @elseif($user->email_verified ==false)

                <a class="btn btn-warning" href="{{route('user.email_verification')}}">تایید ایمیل</a>

                <br/>
                <br/>
            @elseif($user->status =="review_document")

                <span class="account-type btn btn-success">در انتظار تایید مدارک</span>


            @else
                <label class="label label-info">{{$user->name}} {{$user->last_name}}</label>
                <br/>
                <br/>

            @endif
            <div class="extra-info m-t-15">
                <ul>
                    <li>
                        <p>رزو باقیمانده</p>
                        <span >{{getUserSubscriptionDayRemaining($User->id)}}</span>
                    </li>
                    <li>
                        <p>سود شما</p>
                        <span >{{getUserSubscriptionUserProfit($User->id)}}%</span>
                    </li>
                    <li>
                        <p>سود سایت</p>
                        <span >{{getUserSubscriptionAdminProfit($User->id)}}%</span>
                    </li>
                </ul>
            </div>
        </div>

        <nav class="sidebar-nav nav navbar-expand-lg flex-column pr-4 pl-4 mt-3 nav-scroll">
            <button  class=" shadow navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav d-flex flex-column menu-items">
                    <li class="nav-item active">
                        <a href="{{route('user.dashboard')}}" class="nav-link">
                            <i class="fa fa-home" aria-hidden="true"></i>پیشخوان
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a  class="nav-link " href="{{route('user.profile')}}">
                            <i class="fa fa-user" aria-hidden="true"></i>اطلاعات حساب کاربری
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('robot.index')}}" class="nav-link">
                            <i class="fa fa-robot "  aria-hidden="true"></i>ربات
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{route('accountant.index')}}" class="nav-link">
                            <i class="fa fa-money-bill" aria-hidden="true"></i>حسابداری
                        </a>
                    </li>
             {{--       <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fa fa-money-bill-wave " aria-hidden="true"></i>کار بانکی
                        </a>
                    </li>--}}
                    <li class="nav-item">
                        <a href="{{route('subscription.list')}}" class="nav-link">
                            <i class="fa fa-user-plus " aria-hidden="true"></i>طرح عضویت
                        </a>
                    </li>
               {{--     <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fa fa-headset " aria-hidden="true"></i>پشتیبانی
                        </a>
                    </li>--}}
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fa fa-arrow-right " aria-hidden="true"></i>خروج
                        </a>
                    </li>
                </ul>
            </div>

        </nav>
    </aside>
    <div class="inner-content">
        <div class="container-fluid">
            <div class="top-bar feature-box">

                <div class="row">
                    <div class="col-lg-6 col-sm-12 d-flex justify-content-around">
                        <div class="breadcrumb">
                            <span><i class="fa fa-home"></i>پیشخوان</span>
                        </div>

                    </div>
                    <div class="col-lg-6 col-sm-12">

                        <div class="logo-box fa-pull-left">
                            <img src="/assets/user/images/logo.png">
                        </div>
                        <div class="notif-box fa-pull-left">
                            <a href="#">
                                <i class="fa fa-search"></i>
                            </a>
                            <a href="#">
                                <i class="far fa-bell"><strong class="tool-tip">0</strong></i>

                            </a>

                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-content">

            @yield('page')

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="/assets/user/js/less.js" type="text/javascript"></script>
<script src="/assets/user/js/chart.js"></script>
<script src="/assets/user/js/javascript.js" ></script>


</body>

</html>
