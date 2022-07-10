@extends('user.layout.layout')
@section('page')
    <div class="container-fluid topic">
        <div class="d-flex align-items-center px-3 my-4" >
            <div class=" shadow " ></div>
            <h3 class="h3-font" >واریز به حساب</h3>
        </div>
        <div class="row">
            <div class="col-lg-4 col-sm-12">
                <div class="feature-box">
                    <div class="feature-title">
                        <i class="fa fa-square-full"></i>
                        <span>انتخاب روش پرداخت</span>
                    </div>
                    <br/>
                    <input type="radio" id="tether" name="fav_language" value="HTML">
                    <label for="tether">تتر</label><br>
                    <br/>
                    <input type="radio" id="rial" name="fav_language" value="CSS">
                    <label for="rial">ریال</label><br>
                    <br/>
                    <input type="radio" id="rial_direct" name="fav_language" value="JavaScript">
                    <label for="rial_direct">واریز ریال انتقال به حساب</label>

                    <div class="clearfix"></div>

                </div>
            </div>

            <div id="tether_payment_form" style="display: none" class="col-lg-8 col-sm-12">
                <div class="feature-box compare">
                    <form method="post" >
                        @csrf
                        <div class="float-left" style="margin-left: 10px;margin-right: 20px">
                            <span>واریز آنلاین تتر</span>
                            <span><input name="number" placeholder="مقدار تتر - USDT" required class="form-control" style="min-width: 250px"
                                         type="text"
                                         maxlength="16"></span>
                        </div>

                        <div class="clearfix"></div>
                        <br/>
                        <input type="submit" value="واریز" class="btn btn-success ">
                    </form>

                </div>

            </div>
            <div id="rial_direct_payment_form" style="display: none"  class="col-lg-8 col-sm-12">
                <div class="feature-box compare">
                    <form method="post" >
                        @csrf
                        <div class="float-left" style="margin-left: 10px;margin-right: 20px">
                            <span>واریز آنلاین ریال : شبکه شتاب</span>
                            <span><input name="number" placeholder="ریال" required class="form-control" style="min-width: 250px"
                                         type="text"
                                         ></span>
                        </div>

                        <div class="clearfix"></div>
                        <br/>
                        <input type="submit" value="هم اکنون پرداخت کنید" class="btn btn-success ">
                    </form>

                </div>

            </div>
            <div id="rial_direct_payment_info_form" style="display: none"  class="col-lg-8 col-sm-12">
                <div class="feature-box compare">
                    <form method="post" >
                        @csrf
                        <div class="float-left" style="margin-left: 10px;margin-right: 20px">
                            <span>ثبت مشخصات واریزی</span>
                            <span><input name="number" placeholder="شناسه پرداخت" required class="form-control" style="min-width: 250px"
                                         type="text"
                                ></span>
                        </div>

                        <div class="clearfix"></div>
                        <br/>
                        <input type="submit" value="ثبت و تایید" class="btn btn-success ">
                    </form>

                </div>

            </div>

        </div>

        <div class="row" id="rial_hesab"  style="display: none">
            <div class="col-lg-6 col-sm-12">
                <div class="feature-box compare">
                    <h3>{!! getBladeImage('1657426244Xb9MO.png','bank') !!}</h3>

                    <div class="float-left" style="margin-left: 10px;margin-right: 20px">
                        <h4>ملت</h4>
                        <span>0022-128234</span>
                        <span>60379917831909834</span>
                        <span>کاربر</span>
                        <span>2345678976543456780000000004</span>

                    </div>

                    <div class="clearfix"></div>
                </div>

            </div>

        </div>


    </div>
    <script>
        document.getElementById('tether').addEventListener('change', function() {
           if(document.getElementById("tether").checked)
           {
               document.getElementById("tether_payment_form").style.display='block';
               document.getElementById("rial_direct_payment_form").style.display='none';
               document.getElementById("rial_hesab").style.display='none';
               document.getElementById("rial_direct_payment_info_form").style.display='none';


           }
        });

        document.getElementById('rial').addEventListener('change', function() {
            if(document.getElementById("rial").checked)
            {
                document.getElementById("tether_payment_form").style.display='none';
                document.getElementById("rial_hesab").style.display='none';
                document.getElementById("rial_direct_payment_info_form").style.display='none';
                document.getElementById("rial_direct_payment_form").style.display='block';

            }
        });
        document.getElementById('rial_direct').addEventListener('change', function() {
            if(document.getElementById("rial_direct").checked)
            {
                document.getElementById("tether_payment_form").style.display='none';
                document.getElementById("rial_direct_payment_form").style.display='none';
                document.getElementById("rial_hesab").style.display='block';
                document.getElementById("rial_direct_payment_info_form").style.display='block';

            }
        });
    </script>
@endsection

