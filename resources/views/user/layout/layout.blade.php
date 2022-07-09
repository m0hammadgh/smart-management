<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description"
          content="viho admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities."/>
    <meta name="keywords"
          content="admin template, viho admin template, dashboard template, flat admin template, responsive admin template, web app"/>
    <meta name="author" content="pixelstrap"/>
    <link rel="icon" href="/assets/mirror/images/favicon.png" type="image/x-icon"/>
    <link rel="shortcut icon" href="/assets/mirror/images/favicon.png" type="image/x-icon"/>
    <title>پنل کاربری - @yield('title')</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.gstatic.com/"/>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet"/>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap"
        rel="stylesheet"/>
    <link
        href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet"/>
    <!-- Font Awesome-->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="/assets/mirror/css/fontawesome.css"/>
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="/assets/mirror/css/icofont.css"/>
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="/assets/mirror/css/themify.css"/>
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="/assets/mirror/css/flag-icon.css"/>
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="/assets/mirror/css/feather-icon.css"/>
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="/assets/mirror/css/select2.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/mirror/css/dropzone.css"/>
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="/assets/mirror/css/bootstrap.css"/>
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="/assets/mirror/css/style.css"/>
    <link id="color" rel="stylesheet" href="/assets/mirror/css/color-1.css" media="screen"/>
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="/assets/mirror/css/responsive.css"/>
</head>
<body class="rtl">
<!-- Loader starts-->
<div class="loader-wrapper">
    <div class="theme-loader">
        <div class="loader-p"></div>
    </div>
</div>
<!-- Loader ends-->
<!-- page-wrapper Start-->
<div class="page-wrapper" id="pageWrapper">
    <!-- Page Header Start-->
    <div class="page-main-header">
        <div class="main-header-right row m-0">
            <div class="main-header-left">

                <div class="logo-wrapper">
                    <a href="index.html"><img class="img-fluid" src="/assets/user/images/logo.png" alt=""/></a>
                </div>
                <div class="dark-logo-wrapper">
                    <a href="index.html"><img class="img-fluid" src="/assets/mirror/images/logo/dark-logo.png" alt=""/></a>
                </div>
                <div class="toggle-sidebar"><i class="status_toggle middle" data-feather="align-center"
                                               id="sidebar-toggle"></i></div>
            </div>
            <div class="left-menu-header col">
                <ul>
                    <li>
                        <form class="form-inline search-form">
                            <div class="search-bg">
                            </div>
                        </form>
                        <span class="d-sm-none mobile-search search-bg"><i class="fa fa-search"></i></span>
                    </li>
                </ul>
            </div>
            <div class="nav-right col pull-right right-menu p-0">
                <ul class="nav-menus">


                    <li class="onhover-dropdown">
                        <div class="notification-box"><i data-feather="bell"></i><span class="dot-animated"></span>
                        </div>
                        <ul class="notification-dropdown onhover-show-div">
                            <li>
                                <p class="f-w-700 mb-0 iran-yekan-font">شما 0 اعلان دارید <span
                                        class="pull-right badge badge-primary badge-pill">0</span></p>
                            </li>
                            {{-- <li class="noti-primary">
                                 <div class="media">
                                     <span class="notification-bg bg-light-primary"><i
                                             data-feather="activity"> </i></span>
                                     <div class="media-body">
                                         <p>پردازش تحویل</p>
                                         <span>10 دقیقه ی قبل</span>
                                     </div>
                                 </div>
                             </li>
                             <li class="noti-secondary">
                                 <div class="media">
                                     <span class="notification-bg bg-light-secondary"><i
                                             data-feather="check-circle"> </i></span>
                                     <div class="media-body">
                                         <p>سفارش کامل شد</p>
                                         <span>1 ساعت پیش</span>
                                     </div>
                                 </div>
                             </li>
                             <li class="noti-success">
                                 <div class="media">
                                     <span class="notification-bg bg-light-success"><i
                                             data-feather="file-text"> </i></span>
                                     <div class="media-body">
                                         <p>بلیط های تولید شده</p>
                                         <span>3 ساعت پیش</span>
                                     </div>
                                 </div>
                             </li>
                             <li class="noti-danger">
                                 <div class="media">
                                     <span class="notification-bg bg-light-danger"><i
                                             data-feather="user-check"> </i></span>
                                     <div class="media-body">
                                         <p>تحویل کامل</p>
                                         <span>6 ساعت پیش</span>
                                     </div>
                                 </div>
                             </li>--}}
                        </ul>
                    </li>
                    <li>
                        <div class="mode"><i class="fa fa-moon-o"></i></div>
                    </li>
                    <li class="onhover-dropdown p-0">
                        <button class="btn btn-primary-light" type="button">
                            <a href="login_two.html"><i data-feather="log-out"></i>خروج</a>
                        </button>
                    </li>
                </ul>
            </div>
            <div class="d-lg-none mobile-toggle pull-right w-auto"><i data-feather="more-horizontal"></i></div>
        </div>
    </div>
    <!-- Page Header Ends                              -->
    <!-- Page Body Start-->
    <div class="page-body-wrapper sidebar-icon">
        <!-- Page Sidebar Start-->
    @include('user.layout.sidebar')

    <!-- Page Sidebar Ends-->
    @yield('page')
    <!-- footer start-->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 footer-copyright">
                        <p class="mb-0">حق چاپ 2021-22 © ویحو کلیه حقوق محفوظ است.</p>
                    </div>
                    <div class="col-md-6">
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<!-- latest jquery-->
<script src="/assets/mirror/js/jquery-3.5.1.min.js"></script>
<!-- feather icon js-->
<script src="/assets/mirror/js/icons/feather-icon/feather.min.js"></script>
<script src="/assets/mirror/js/icons/feather-icon/feather-icon.js"></script>
<!-- Sidebar jquery-->
<script src="/assets/mirror/js/sidebar-menu.js"></script>
<script src="/assets/mirror/js/config.js"></script>
<!-- Bootstrap js-->
<script src="/assets/mirror/js/bootstrap/popper.min.js"></script>
<script src="/assets/mirror/js/bootstrap/bootstrap.min.js"></script>
<!-- Plugins JS start-->
<script src="/assets/mirror/js/editor/ckeditor/ckeditor.js"></script>
<script src="/assets/mirror/js/editor/ckeditor/adapters/jquery.js"></script>
<script src="/assets/mirror/js/dropzone/dropzone.js"></script>
<script src="/assets/mirror/js/dropzone/dropzone-script.js"></script>
<script src="/assets/mirror/js/select2/select2.full.min.js"></script>
<script src="/assets/mirror/js/select2/select2-custom.js"></script>
<script src="/assets/mirror/js/email-app.js"></script>
<script src="/assets/mirror/js/form-validation-custom.js"></script>
<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="/assets/mirror/js/script.js"></script>
<script src="https://kit.fontawesome.com/c923809309.js" crossorigin="anonymous"></script>
<script src="/assets/mirror/js/notify/bootstrap-notify.min.js"></script>
<script src="/assets/mirror/js/notify/notify-script.js"></script>
@yield('script')

@if(session('msg') != null && session('msg') != '')
    <script>
        $.notify({
                message: '{!! session('msg') !!}',
            },
            {
                type: 'info',
                allow_dismiss: true,
                newest_on_top: true,
                mouse_over: true,
                showProgressbar: false,
                clickToHide: true,
                autoHide: true,
                autoHideDelay: 1000,
                spacing: 10,
                timer: 2000,
                placement: {
                    from: 'top',
                    align: 'left'
                },
                offset: {
                    x: 30,
                    y: 30
                },
                delay: 100,
                z_index: 10000,
                animate: {
                    enter: 'animated bounce',
                    exit: 'animated bounce'
                }
            });
    </script>

@endif


@yield('script')

<!-- login js-->
<!-- Plugin used-->
</body>

</html>
