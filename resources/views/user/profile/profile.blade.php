@extends('user.layout.layout')
@section('page')
    <div class="page-body">
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="user-profile">
                <div class="row">
                    <!-- user profile header start-->
                    <div class="col-sm-12">
                        <div class="card profile-header">
                            <div class="profile-img-wrrap"><img class="img-fluid bg-img-cover" src="/assets/user/images/65-658471_happy-man-happy-man-face-png.png" alt="" /></div>
                            <div class="userpro-box">
                                <div class="img-wrraper">
                                    <div class="avatar"><img class="img-fluid" alt="" src="/assets/user/images/65-658471_happy-man-happy-man-face-png.png" /></div>
                                    <a class="icon-wrapper" href="edit-profile.html"><i class="fa fa-edit"></i></a>
                                </div>
                                <div class="user-designation">
                                    <div class="title">
                                        <a target="_blank" href="#">
                                            <h4>{{$User->name ?? ""}} {{$User->last_name}}</h4>
                                            <h6>{{$User->mobile_number ?? ""}}</h6>
                                        </a>
                                    </div>
                                    <div class="social-media">
                                        <ul class="user-list-social">
                                            <li>
                                                <a href="#"><i class="fa fa-facebook"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fa fa-twitter"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fa fa-instagram"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fa fa-rss"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="follow">
                                        <ul class="follow-list">
                                            <li>
                                                <div class="follow-num counter">18</div>
                                                <span>روز
                                                </span>
                                            </li>
                                            <li>
                                                <div class="follow-num counter">70%</div>
                                                <span>سود </span>
                                            </li>
                                            <li>
                                                <div class="follow-num counter">30%</div>
                                                <span>سود </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- user profile header end-->
                    <div class="col-xl-3 col-lg-12 col-md-5 xl-35">
                        <div class="default-according style-1 faq-accordion job-accordion">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="p-0">
                                                <button class="btn btn-link ps-0" data-bs-toggle="collapse" data-bs-target="#collapseicon2" aria-expanded="true" aria-controls="collapseicon2">حساب های من</button>
                                            </h5>
                                        </div>
                                        <div class="collapse show" id="collapseicon2" aria-labelledby="collapseicon2" data-parent="#accordion">
                                            <div class="card-body post-about">
                                                <ul>
                                                    <li>
                                                        <div class="icon"><i data-feather="briefcase"></i></div>
                                                        <div>
                                                            <h5>حساب بانکی</h5>
                                                            <p>بانک ملی</p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="icon"><i data-feather="book"></i></div>
                                                        <div>
                                                            <h5>حساب تتر </h5>
                                                            <p>USDT</p>
                                                        </div>
                                                    </li>

                                                </ul>
                                                <div class="social-network theme-form">
                                                    <span class="f-w-600">شبکه های اجتماعی</span>
                                                    <button class="btn social-btn btn-fb mb-2 text-center"><i class="fa fa-facebook m-r-5"></i>فیس بوک</button>
                                                    <button class="btn social-btn btn-twitter mb-2 text-center"><i class="fa fa-twitter m-r-5"></i>توییتر</button>
                                                    <button class="btn social-btn btn-google text-center"><i class="fa fa-dribbble m-r-5"></i>دریبل زدن</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
@endsection

@section('script')
    <!-- Plugins JS start-->
    <!-- Plugins JS start-->
    <script src="/assets/mirror/js/counter/jquery.waypoints.min.js"></script>
    <script src="/assets/mirror/js/counter/jquery.counterup.min.js"></script>
    <script src="/assets/mirror/js/counter/counter-custom.js"></script>
    <script src="/assets/mirror/js/photoswipe/photoswipe.min.js"></script>
    <script src="/assets/mirror/js/photoswipe/photoswipe-ui-default.min.js"></script>
    <script src="/assets/mirror/js/photoswipe/photoswipe.js"></script>
    <!-- Plugins JS Ends-->
    <!-- Plugins JS Ends-->
@endsection
