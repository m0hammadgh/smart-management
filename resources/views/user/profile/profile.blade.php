@extends('user.layout.layout')
@section('page')
    <div class="container-fluid topic">
        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <div class="feature-box compare">
                    <div class="float-left">
                        <h3>موبایل</h3>
                        <span>کد ملی</span>
                        <span>نام و نام خانوادگی </span>
                        <span>آدرس ایمیل </span>
                        <span>وضعیت حساب  </span>
                    </div>
                    <div class="float-left" style="margin-left: 10px;margin-right: 20px">
                        <h3>{{$user->mobile_number}}</h3>
                        <span>{{$user->national_id ??"-"}}</span>
                        <span>{{$user->name}} {{$user->last_name}} </span>
                        <span>{{$user->email ??"-"}}</span>
                        <span>{!! getUserStatus($user->status) !!}  </span>
                    </div>

                    <div class="clearfix"></div>
                </div>

            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="feature-box compare">
                    <div class="float-left">
                        <span><input type="text" placeholder="رمز عبور قدیم" class="form-control"> </span>

                        <span><input type="text"  placeholder="رمز عبور جدید" class="form-control"> </span>

                        <span><input type="text"  placeholder="تکرار رمز عبور" class="form-control"> </span>

                    </div>
                    <div class="float-right" style="margin-left: 10px;margin-right: 20px">
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                        <br/>

                        <input type="submit" value="تغییر رمز عبور" class="btn btn-danger">
                    </div>

                    <div class="clearfix"></div>
                </div>

            </div>

        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-12">
                <div class="feature-box">
                    <div class="feature-icon">
                        <i class="fa fa-dollar-sign  "></i>
                    </div>
                    <p>تعداد کارت های بانکی
                        <span>
                                        <strong>0</strong> کارت

                                    </span>
                    </p>
                    <div class="clearfix"></div>
                    <a href="{{route('user.card.list')}}" class="btn btn-success" style="margin-top: 10px">افزودن کارت بانکی</a>

                </div>
            </div>
            <div class="col-lg-3 col-sm-12">
                <div class="feature-box">
                    <div class="feature-icon">
                        <i class="fa fa-hands-helping  "></i>
                    </div>
                    <p>وضعیت حساب
                        <span>
                                        <strong>آزمایشی</strong>
                                    </span>

                    </p>
                    <div class="clearfix"></div>
                    <a class="btn btn-success" style="margin-top: 10px">ارتقا حساب</a>

                </div>

            </div>
            <div class="col-lg-3 col-sm-12">
                <div class="feature-box">
                    <div class="feature-icon">
                        <i class="fa fa-shopping-bag  "></i>
                    </div>
                    <p>موجودی حساب
                        <span>
                                        <strong>1500 تتر</strong>
                                    </span>
                    </p>
                    <div class="clearfix"></div>
                    <a class="btn btn-success" style="margin-top: 10px">افزایش موجودی </a>

                </div>
            </div>
            <div class="col-lg-3 col-sm-12">
                <div class="feature-box">
                    <div class="feature-icon">
                        <i class="fa fa-funnel-dollar  "></i>
                    </div>
                    <p> پیام خوانده نشده
                        <span>
                                        <strong>0</strong> پیام
                                    </span>
                    </p>
                    <div class="clearfix"></div>
                    <a class="btn btn-success" style="margin-top: 10px">ارسال تیکت پشتیبانی</a>

                </div>
            </div>


        </div>
        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <div class="feature-box">
                    <div class="feature-title">
                        <i class="fa fa-square-full"></i>
                        <span> کارت های بانکی</span>
                    </div>
                    <div class="table-box">
                        <table border="0">
                            <tr>
                                <th>بانک</th>
                                <th class="text-center">شماره کارت</th>
                            </tr>
                            <tr class="light-color">
                                <td>ملت</td>
                                <td class="text-center">6037991783109876</td>

                            </tr>

                        </table>
                    </div>

                </div>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="feature-box">
                    <div class="feature-title">
                        <i class="fa fa-square-full"></i>
                        <span>کیف های پول ثبت شده</span>
                    </div>
                    <div class="table-box">
                        <table border="0">
                            <tr>
                                <th>ارز</th>
                                <th class="text-center">نماد</th>
                                <th class="text-center">آدرس</th>
                            </tr>
                            <tr class="light-color">
                                <td>تتر</td>
                                <td class="text-center">USDT</td>
                                <td class="text-center">AI2345678909876543yis8822</td>

                            </tr>

                        </table>
                    </div>

                </div>
            </div>


        </div>
        <div class="d-flex align-items-center px-3 my-4" >
            <div class="squre shadow " ></div>
            <h3 class="h3-font" >طرح عضویت</h3>
        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-12">
                <div class="feature-box compare">
                    <div class="float-left">
                        <h3>طرح فعال شما</h3>
                        <h3>مدت زمان باقیمانده</h3>
                    </div>
                    <div class="float-left" style="margin-left: 10px;margin-right: 20px">
                        <h3>آزمایشی</h3>
                        <h3>13 روز</h3>
                    </div>

                    <div class="clearfix"></div>

                </div>

            </div>
            <div class="col-lg-6  col-sm-12">
                <div class="row">
                    @foreach($subscriptionPLan as $plan)
                        <div class="col-lg-6 col-sm-12">
                            <div class="feature-box compare">
                                <div class="float-left">
                                    <h3>{{$plan->title}}</h3>
                                    <span>سقف برداشت ریالی</span>
                                    <span class="highest"><strong>{{$plan->withdraw_rial}}</strong>ریال</span>
                                    <span>سقف برداشت کریپتو</span>
                                    <span class="lowest"><strong>{{$plan->withdraw_crypto}}</strong>USDT</span>
                                </div>
                                <div class="float-right">
                                    <p> درصد سود شما
                                        <span><i class="fa fa-sort-up"></i>{{$plan->user_profit}} %</span>
                                    </p>
                                    <p> درصد سود سایت
                                    </p>
                                    <span>{{$plan->admin_profit}} % </span>

                                    <span>{{$plan->duration}} ماهه</span>

                                    <span>قیمت : {{$plan->price}}$</span>
                                </div>
                                <div class="clearfix"></div>
                                <hr/>
                                <a class="btn-success btn " >خرید  </a>

                            </div>
                        </div>

                    @endforeach
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
