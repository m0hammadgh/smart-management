<!DOCTYPE html>
<html lang="fa" dir="rtl">

<!-- Mirrored from new-theme.ir/viho/theme/theme/login_two.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 26 Jun 2022 20:58:48 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="viho admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities." />
    <meta name="keywords" content="admin template, viho admin template, dashboard template, flat admin template, responsive admin template, web app" />
    <meta name="author" content="pixelstrap" />
    <link rel="icon" href="/assets/mirror/images/favicon.png" type="image/x-icon" />
    <link rel="shortcut icon" href="/assets/mirror/images/favicon.png" type="image/x-icon" />
    <title>ثبت نام </title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="/assets/mirror/css/fontawesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="/assets/mirror/css/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="/assets/mirror/css/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="/assets/mirror/css/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="/assets/mirror/css/feather-icon.css">
    <!-- Plugins css start-->
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="/assets/mirror/css/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="/assets/mirror/css/style.css">
    <link id="color" rel="stylesheet" href="/assets/mirror/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="/assets/mirror/css/responsive.css">
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
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-5"><img class="bg-img-cover bg-center" src="/assets/mirror/images/login/3.jpg" alt="صفحه ورود"></div>
            <div class="col-xl-7 p-0">
                <div class="login-card">
                    <form method="post" action="{{route('user.register.do')}}" class="theme-form login-form">
                        @csrf
                        <h6>یک حساب جدید ایجاد کنید</h6>
                        <div class="form-group">
                            <label>تلفن همراه </label>
                            <div class="input-group"><span class="input-group-text"><i class="icon-email"></i></span>
                                <input class="form-control" name="mobile_number" type="number" required="" placeholder="شماره تلفن همراه ">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>ایمیل </label>
                            <div class="input-group"><span class="input-group-text"><i class="icon-email"></i></span>
                                <input class="form-control" name="email" type="email" placeholder="ایمیل ">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>کلمه عبور</label>
                            <div class="input-group"><span class="input-group-text"><i class="icon-lock"></i></span>
                                <input class="form-control" type="password" name="password" required="" placeholder="*********">
                                <div class="show-hide"><span class="show">                         </span></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                            </div><a class="link" href="/user/login">حساب کاربری دارید ؟</a>

                        </div>

                        <div class="form-group"><input class="btn btn-primary btn-block"  type="submit" value="ثبت نام"></div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- page-wrapper end-->
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
<script src="/assets/mirror/js/notify/bootstrap-notify.min.js"></script>
<script src="/assets/mirror/js/notify/notify-script.js"></script>
<!-- Plugins JS start-->
<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="/assets/mirror/js/script.js"></script>
<!-- login js-->
<!-- Plugin used-->

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
</body>

<!-- Mirrored from new-theme.ir/viho/theme/theme/login_two.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 26 Jun 2022 20:58:54 GMT -->
</html>
