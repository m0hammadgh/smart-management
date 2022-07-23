@extends('user.layout.layout')
@section('page')

    <div class="d-flex align-items-center px-3 my-4 ">
        <div class="squre shadow "></div>
        <h3 class="h3-font">طرح عضویت</h3>
    </div>
    <form method="post" action="{{route('subscription.buy')}}">
        @csrf
        <section>
            <div class="container ">
                <div class="row mt-3 text-center g-3 ">
                    @foreach($subscriptionPLan as $plan)
                        <div class="col-md-4 d-flex flex-column align-items-center justify-content-center">
                            <div for="radio-{{$plan->id}}" class="card text-bg-success mb-3 w-100 "
                                 style="max-width: 20rem;background: white">
                                <div style="background-color: #62a799;color: white"
                                     class="card-header text-center fs-3 py-4">{{$plan->title}}</div>
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
                                    <h5 class="card-title">{{$plan->charge_amount}} ریال </h5>
                                </div>
                                <div class="card-body d-flex justify-content-between ">
                                    <h5 class="card-title">حداکثر برداشت تتر</h5>
                                    <h5 class="card-title">{{$plan->withdraw_crypto}} تتر</h5>
                                </div>
                                <div class="card-body d-flex justify-content-between ">
                                    <h5 class="card-title">حداکثر برداشت ریال</h5>
                                    <h5 class="card-title">{{$plan->withdraw_rial}} </h5>
                                </div>
                            </div>

                            <div class="text-center">
                                @if($plan->id!=4)
                                    <input type="radio" @if($loop->index==0)  checked @endif id="radio-{{$plan->id}}"
                                           name="subscription" value="{{$plan->id}}">
                                @endif
                            </div>
                        </div>

                    @endforeach

                </div>
            </div>
        </section>
        @if(session('err') != null && session('err') != '')
            <br/>
            <br/>
            <label class="badge badge-danger"> {!! session('err') !!}</label>
        @endif
        <section class="col-12">
            <div class="d-flex justify-content-around   py-4 rounded-4">
                <input type="submit" value="پرداخت  با کارت بانکی" name="direct"
                       class="bg-info text-light rounded-3 border-0 py-3 px-md-5">
                <input type="submit" value="پرداخت با ارز دیجیتال" name="direct"
                       class="bg-info text-light rounded-3 border-0 py-3 px-md-5">
                <input type="submit" value="پرداخت از کیف پول" name="direct"
                       class="bg-info text-light rounded-3 border-0 py-3 px-md-5">
            </div>

        </section>

    </form>
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
