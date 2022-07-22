@extends('user.layout.layout')
@section('page')
    <div class="container-fluid topic">
        <div class="d-flex align-items-center px-3 my-4">
            <div class=" shadow "></div>
            <h3 class="h3-font">واریز به حساب</h3>
        </div>
        <div class="row">
            <div class="col-lg-4 col-sm-12">
                <div class="feature-box">
                    <div class="feature-title">
                        <i class="fa fa-square-full"></i>
                        <span>انتخاب روش پرداخت</span>
                    </div>
                    <br/>
                    <input type="radio" checked id="tether" name="fav_language" value="HTML">
                    <label for="tether">تتر</label><br>
                    <br/>
                    <input type="radio" id="rial" name="fav_language" value="CSS">
                    <label for="rial">ریال</label><br>
                    <br/>
                    <input type="radio" id="rial_direct" name="fav_language" value="JavaScript">
                    <label for="rial_direct">واریز ریال انتقال به حساب</label>

                    <div class="clearfix"></div>

                    <br/>
                    @if(session('msg') != null && session('msg') != '')
                        <label class="badge badge-warning"> {!! session('msg') !!}</label>
                    @endif
                </div>
            </div>

            <div id="tether_payment_form" style="display: block" class="col-lg-8 col-sm-12">
                <div class="feature-box compare">
                    <form method="post" action="{{route('pay.tether')}}">
                        @csrf
                        <div class="float-left" style="margin-left: 10px;margin-right: 20px">
                            <span>واریز آنلاین تتر</span>
                            <span><input name="number" placeholder="مقدار تتر - USDT" required class="form-control"
                                         style="min-width: 250px"
                                         type="text"
                                         maxlength="16"></span>

                            <h3>{{getValue('tether_pay_reason')}}</h3>

                        </div>
                        <div class="clearfix"></div>
                        <br/>
                        <input type="submit" value="واریز" class="btn btn-success ">
                    </form>

                </div>

            </div>
            <div id="rial_direct_payment_form" style="display: none" class="col-lg-8 col-sm-12">
                <div class="feature-box compare">
                    <form method="post" action="{{route('pay.rial')}}">
                        @csrf
                        <div class="float-left" style="margin-left: 10px;margin-right: 20px">
                            <span>واریز آنلاین ریال : شبکه شتاب</span>
                            <span><input name="number" placeholder="ریال" required class="form-control"
                                         style="min-width: 250px"
                                         type="text"
                                >

                            </span>
                            <h3>{{getValue('rial_pay_reason')}}</h3>

                        </div>

                        <div class="clearfix"></div>
                        <br/>
                        <input type="submit" value="هم اکنون پرداخت کنید" class="btn btn-success ">
                    </form>

                </div>

            </div>
            <div class="col-lg-8 col-sm-12" id="rial_hesab" style="display: none">
                <div class="col-lg-12s col-sm-12">
                    <div class="feature-box compare">
                        <h3>مبلغ مورد نظر را به حساب زیر انتقال داده و رسید را بارگزاری کید</h3>

                        <div class="float-left" style="margin-left: 10px;margin-right: 20px">
                            <h4>بانک : {{getOwnerBank()->bank}}</h4>
                            <span>شماره حساب :{{getOwnerBank()->account}}</span>
                            <span>شماره کارت : {{getOwnerBank()->card}}</span>
                            <span>شماره شبا:  {{getOwnerBank()->IBAN}}</span>
                            <span>به نام  :  {{getOwnerBank()->owner_name}}</span>

                        </div>

                        <div class="clearfix"></div>
                    </div>

                </div>

            </div>

            <div id="rial_direct_payment_info_form" style="display: none" class="col-lg-12 col-sm-12">
                <div class="feature-box compare">
                    <form method="post" enctype="multipart/form-data" action="{{route('pay.transfer')}}">
                        @csrf
                        <div class="float-left" style="margin-left: 10px;margin-right: 20px">
                            <span>ثبت مشخصات واریزی</span>

                            <div class="d-flex pb-3 justify-content-between pt-3 align-items-center">
                                <span class=" w-50" >مبلغ واریزی  :</span>
                                <div class="d-flex w-100 align-items-center">
                                    <input type="number" name="number" class="form-control" required > ریال
                                </div>
                            </div>
                            <div class="d-flex pb-3 pt-2 justify-content-between align-items-center">
                                <span class=" w-25" >نوع انتقال :</span>
                                <div class="d-flex w-75 align-items-center justify-content-around">
                                    <div class="form-check d-flex align-items-center">
                                        <input class="form-check-input" type="radio" name="transfer_type" value="0" id="flexRadioDefault1">
                                        <label class="form-check-label ps-2" for="flexRadioDefault1">
                                            کارت به کارت
                                        </label>
                                    </div>
                                    <div class="form-check  d-flex align-items-center">
                                        <input class="form-check-input" type="radio" name="transfer_type" value="1" id="flexRadioDefault2" checked>
                                        <label class="form-check-label ps-2" for="flexRadioDefault2">
                                            حساب
                                        </label>
                                    </div>
                                    <div class="form-check  d-flex align-items-center">
                                        <input class="form-check-input" type="radio" name="transfer_type" value="2" id="flexRadioDefault3" checked>
                                        <label class="form-check-label ps-2" for="flexRadioDefault3">
                                            پایا
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex pb-3 justify-content-between pt-3 align-items-center">
                                <span class=" w-25" >بارگزاری فیش :</span>
                                <div class="d-flex w-75 align-items-center">
                                    <input type="file" name="image" required class="form-control" >
                                </div>
                            </div>

                            <h3>{{getValue('transfer_pay_reason')}}</h3>

                        </div>

                        <div class="clearfix"></div>
                        <br/>
                        <input type="submit" value="ثبت و تایید" class="btn btn-success ">
                    </form>

                </div>

            </div>

        </div>



    </div>


    <script>
        document.getElementById('tether').addEventListener('change', function () {
            if (document.getElementById("tether").checked) {
                document.getElementById("tether_payment_form").style.display = 'block';
                document.getElementById("rial_direct_payment_form").style.display = 'none';
                document.getElementById("rial_hesab").style.display = 'none';
                document.getElementById("rial_direct_payment_info_form").style.display = 'none';


            }
        });

        document.getElementById('rial').addEventListener('change', function () {
            if (document.getElementById("rial").checked) {
                document.getElementById("tether_payment_form").style.display = 'none';
                document.getElementById("rial_hesab").style.display = 'none';
                document.getElementById("rial_direct_payment_info_form").style.display = 'none';
                document.getElementById("rial_direct_payment_form").style.display = 'block';

            }
        });
        document.getElementById('rial_direct').addEventListener('change', function () {
            if (document.getElementById("rial_direct").checked) {
                document.getElementById("tether_payment_form").style.display = 'none';
                document.getElementById("rial_direct_payment_form").style.display = 'none';
                document.getElementById("rial_hesab").style.display = 'block';
                document.getElementById("rial_direct_payment_info_form").style.display = 'block';

            }
        });
    </script>
@endsection

