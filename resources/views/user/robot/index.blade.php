@extends('user.layout.layout')
@section('page')
    <div class="container-fluid topic">
        <div class="row">
            <div class="col-lg-4 col-sm-12">
                <div class="feature-box">
                    <div class="feature-icon">
                        <i class="fa fa-dollar-sign  "></i>
                    </div>
                    <p>کیف پول ربات

                    </p>
                    <a href="#" class="btn btn-success" style="margin-top: 10px">کلیک کنید</a>


                    <div class="clearfix"></div>

                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
                <div class="feature-box">
                    <div class="feature-icon">
                        <i class="fa fa-hands-helping  "></i>
                    </div>
                    <p>اکانت فعال
                        <span>
                                        <strong>{{$plan->plan->title ?? ""}}</strong>
                                    </span>
                        <span>
{{getUserSubscriptionDayRemaining($user->id)}}  روز مانده                                    </span>
                    </p>
                    <div class="clearfix"></div>

                </div>

            </div>
            <div class="col-lg-4 col-sm-12">
                <div class="feature-box">
                    <div class="feature-icon">
                        <i class="fa fa-shopping-bag  "></i>
                    </div>
                    <p>موجودی فعال
                        <span>
                                        <strong>{{$User->active_balance}} تتر</strong>
                                    </span>
                    </p>
                    <div class="clearfix"></div>

                </div>
            </div>


        </div>
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="feature-box">
                    <div class="feature-title">
                        <i class="fa fa-square-full"></i>
                        <span>اطلاعات حساب معاملاتی</span>
                    </div>

                    <p> موجودی در حال فعال :<strong> {{$User->activating_balance??0}}  </strong> می باشد</p>
                    <br/>
                    <p> مجموع معاملات 24 ساعت گذشته ربات<strong> {{$todayTrades??0}}  </strong> می باشد</p>
                    <br/>
                    <p>تعداد صرافی های فعال : <strong>{{$exchanges}} صرافی </strong></p>
                    <br/>
                    <p>کل موجودی درگیر شده : <strong>{{$stackedAmount}} دلار </strong></p>
                    <br/>
                    <p>میانگین سود : <strong>{{$averageProfit??0}} دلار </strong></p>
                    <br/>
                    <p>کل سود : <strong>{{$totalProfit ?? 0}} دلار  </strong></p>
                    <br/>
                    <p>سهم شما : <strong>{{$userProfit ?? 0}} دلار  </strong></p>
                    <br/>
                    <p>سهم سایت : <strong>{{$siteProfit ?? 0}} دلار  </strong></p>


                </div>
            </div>


        </div>


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
