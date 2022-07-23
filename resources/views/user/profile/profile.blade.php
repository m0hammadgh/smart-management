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
                        <span>{{$user->name??"-"}} {{$user->last_name??""}} </span>
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

                        <span><input type="text" placeholder="رمز عبور جدید" class="form-control"> </span>

                        <span><input type="text" placeholder="تکرار رمز عبور" class="form-control"> </span>

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
                    <a href="{{route('user.card.list')}}" class="btn btn-success" style="margin-top: 10px">افزودن کارت
                        بانکی</a>

                </div>
            </div>
            <div class="col-lg-3 col-sm-12">
                <div class="feature-box">
                    <div class="feature-icon">
                        <i class="fa fa-hands-helping  "></i>
                    </div>
                    <p>وضعیت حساب
                        <span>
                                        <strong>{{$plan->plan->title ?? ""}}</strong>
                                    </span>

                    </p>
                    <div class="clearfix"></div>
                    <a href="/user/subscription" class="btn btn-success" style="margin-top: 10px">ارتقا حساب</a>

                </div>

            </div>
            <div class="col-lg-3 col-sm-12">
                <div class="feature-box">
                    <div class="feature-icon">
                        <i class="fa fa-shopping-bag  "></i>
                    </div>
                    <p>موجودی حساب
                        <span>
                                        <strong>{{$user->active_balance}}</strong>
                                    </span>
                    </p>
                    <div class="clearfix"></div>
                    <a href="/user/accountant" class="btn btn-success" style="margin-top: 10px">افزایش موجودی </a>

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
            <div class="col-lg-12 col-sm-12">
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
                            @foreach($bankAccounts as $account)
                                <tr class="light-color">
                                    <td>{{$account->bank->title}}</td>
                                    <td class="text-center">6037991783109876</td>

                                </tr>
                            @endforeach


                        </table>
                    </div>

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
