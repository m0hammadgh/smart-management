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
                                        <strong>{{$user->active_balance}}</strong>
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
        <div class="d-flex align-items-center px-3 my-4">
            <div class="squre shadow "></div>
            <h3 class="h3-font">طرح عضویت</h3>
        </div>

        <section>
            <div class="container">
                <div class="row mt-3 text-center g-3">
                    @foreach($subscriptionPLan as $plan)
                        <div class="col-md-4 d-flex flex-column align-items-center justify-content-center">
                            <div for="radio-{{$plan->id}}" class="card text-bg-success mb-3 w-100 "  style="max-width: 20rem;background: beige">
                                <div class="card-header text-center fs-3 py-4">{{$plan->title}}</div>
                                <div class="card-body d-flex justify-content-between ">
                                    <h5 class="card-title">سود سایت</h5>
                                    <h5 class="card-title">{{$plan->admin_profit}} درصد</h5>
                                </div>
                                <div class="card-body d-flex justify-content-between ">
                                    <h5 class="card-title">سود شما</h5>
                                    <h5 class="card-title">{{$plan->user_profit}} درصد</h5>
                                </div>
                                <div class="card-body d-flex justify-content-between ">
                                    <h5 class="card-title">مدت زمان</h5>
                                    <h5 class="card-title">{{$plan->duration}} روز</h5>
                                </div>
                                <div class="card-body d-flex justify-content-between ">
                                    <h5 class="card-title">قیمت</h5>
                                    <h5 class="card-title">  {{$plan->price}} $</h5>
                                </div>
                                <div class="card-body d-flex justify-content-between ">
                                    <h5 class="card-title">حداکثر واریز</h5>
                                    <h5 class="card-title"> ریال </h5>
                                </div>
                                <div class="card-body d-flex justify-content-between ">
                                    <h5 class="card-title">حداکثر برداشت تتر</h5>
                                    <h5 class="card-title">{{$plan->withdraw_cryto}} تتر</h5>
                                </div>
                                <div class="card-body d-flex justify-content-between ">
                                    <h5 class="card-title">حداکثر برداشت ریال</h5>
                                    <h5 class="card-title">{{$plan->withdraw_rial}} </h5>
                                </div>
                            </div>

                                <div class="text-center">
                                    @if($plan->id!=4)
                                    <input type="radio" id="radio-{{$plan->id}}" name="subscription" value="{{$plan->id}}">
                                    @endif
                                </div>
                        </div>

                    @endforeach

                </div>
            </div>
        </section>

        <section class="col-12">
            <div class="d-flex justify-content-around   py-4 rounded-4">
                <button class="bg-info text-light rounded-3 border-0 py-3 px-md-5">پرداخت مستقیم</button>
                <button class="bg-info text-light rounded-3 border-0 py-3 px-md-5">پرداخت از کیف پول</button>
            </div>

        </section>
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
