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
                    <label for="tether"> درگاه ارز های دیجیتال</label><br>
                    <br/>
                    <input type="radio" id="rial" name="fav_language" value="CSS">
                    <label for="rial"> با کارت های بانکی</label><br>
                    <br/>
                    <input type="radio" id="rial_direct" name="fav_language" value="JavaScript">
                    <label for="rial_direct"> انتقال به حساب</label>

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
                                <span class=" w-20">مبلغ واریزی  :</span>
                                <div class="d-flex w-100 align-items-center">
                                    <input type="number" name="number" class="form-control" required> ریال
                                </div>
                            </div>
                            <div class="d-flex pb-3 pt-2 justify-content-between align-items-center">
                                <span class=" w-20">نوع انتقال :</span>
                                <div class="d-flex w-75 align-items-center justify-content-around">
                                    <div class="form-check d-flex align-items-center">
                                        <input class="form-check-input" type="radio" name="transfer_type" value="0"
                                               id="flexRadioDefault1">
                                        <label class="form-check-label ps-2" for="flexRadioDefault1">
                                            کارت به کارت
                                        </label>
                                    </div>
                                    <div class="form-check  d-flex align-items-center">
                                        <input class="form-check-input" type="radio" name="transfer_type" value="1"
                                               id="flexRadioDefault2" checked>
                                        <label class="form-check-label ps-2" for="flexRadioDefault2">
                                            حساب
                                        </label>
                                    </div>
                                    <div class="form-check  d-flex align-items-center">
                                        <input class="form-check-input" type="radio" name="transfer_type" value="2"
                                               id="flexRadioDefault3" checked>
                                        <label class="form-check-label ps-2" for="flexRadioDefault3">
                                            پایا
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex pb-3 justify-content-between pt-3 align-items-center">
                                <span class=" w-25">بارگزاری فیش :</span>
                                <div class="d-flex w-75 align-items-center">
                                    <input type="file" name="image" required class="form-control">
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
        <hr/>
        <div class="d-flex align-items-center px-3 my-4">
            <div class=" shadow "></div>
            <h3 class="h3-font">برداشت از حساب</h3>
        </div>
        <div class="row">
            <div class="col-lg-4 col-sm-12">
                <div class="feature-box">
                    <div class="feature-title">
                        <i class="fa fa-square-full"></i>
                        <span>انتخاب روش برداشت  </span>
                    </div>
                    <br/>
                    <input name="withdraw" type="radio" checked id="withdraw_account">
                    <label for="withdraw_account">واریز به حساب</label><br>
                    <br/>
                    <input name="withdraw" type="radio" id="withdraw_wallet">
                    <label for="withdraw_wallet">واریز به کیف پول</label><br>
                    <br/>
                    <div class="clearfix"></div>

                    <br/>
                    @if(session('msg') != null && session('msg') != '')
                        <label class="badge badge-warning"> {!! session('msg') !!}</label>
                    @endif
                </div>
            </div>
            <div id="tether_withdraw_form" style="display: none" class="col-lg-8 col-sm-12">
                <div class="feature-box compare">
                    <form method="post" action="{{route('withdraw.tether')}}">
                        @csrf
                        <div class="float-left" style="margin-left: 10px;margin-right: 20px">
                            <span>برداشت آنلاین تتر</span>
                            <span><input name="amount" placeholder="مقدار تتر - USDT" required class="form-control"
                                         style="min-width: 250px"
                                         type="text"
                                         maxlength="16"></span>

                            <span><input name="wallet" placeholder="آدرس کیف پول" required class="form-control"
                                         style="min-width: 250px"
                                         type="text"
                                         maxlength="16"></span>
                            <span>
                               نوع شبکه :  <select name="network">
                                    <option value="BSC">BSC</option>
                                    <option value="Trc20">TRC20</option>
                                    <option value="Erc20">ERc20</option>
                                </select>
                            </span>
                            <h4>در صورت انتخاب شبکه اشتباه مبالغ واریزی قابل برگشت نمی باشند</h4>

                        </div>
                        <div class="clearfix"></div>
                        <br/>
                        <input type="submit" value="برداشت" class="btn btn-success ">
                    </form>

                </div>

            </div>
            <div id="rial_withdraw_form" style="display: block" class="col-lg-8 col-sm-12">
                <div class="feature-box compare">
                    <form method="post" action="{{route('withdraw.rial')}}">
                        @csrf
                        <div class="float-left" style="margin-left: 10px;margin-right: 20px">
                            <span>برداشت آنلاین به حساب بانکی </span>
                            <span><input name="amount" placeholder="مبلغ (ریال)" required class="form-control"
                                         style="min-width: 250px"
                                         type="text"
                                         maxlength="16"></span>

                            <span>
                               شماره کارت :
                                <select name="card_id">
                               @foreach($bankAccounts as $bankAccount)
                                        <option value=" {{$bankAccount->id}}">
                                            {{$bankAccount->number}}
                                        </option>

                                    @endforeach
                                </select>
                            </span>
                            <h4>با توجه به سیکل های پایا واریز به حساب انجام می شود.</h4>
                        </div>
                        <div class="clearfix"></div>
                        <br/>
                        <input type="submit" value="برداشت" class="btn btn-success ">
                    </form>

                </div>

            </div>

        </div>


        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <div class="sectoin-title">
                        <i class="fa fa-square-full"></i>
                        <span>لیست برداشت های من</span>
                    </div>
                </div>
                <div class="col-lg-12 col-sm-12">
                    <div class="table-box">
                        <table border="0">
                            <tr>
                                <th>شناسه</th>
                                <th>تاریخ</th>
                                <th>نوع برداشت</th>
                                <th>مقدار</th>
                                <th>وضعیت</th>
                            </tr>
                            @foreach($withdraws as $withdraw)
                                <tr class="@if($loop->index%2==0) light-color @else grey-color @endif">
                                    <td>#{{$withdraw->id}}</td>
                                    <td>{!! convertCreateAtToPersianDateTime($withdraw->created_at) !!}</td>
                                    <td>{!! getWithdrawType($withdraw->type) !!}</td>
                                    <td>{{$withdraw->amount}}</td>
                                    <td>{!! getWithdrawStatus($withdraw->status) !!}</td>

                                </tr>

                            @endforeach
                        </table>
                        {{ $withdraws->links('vendors.pagination.cutom_pagination') }}
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <div class="sectoin-title">
                        <i class="fa fa-square-full"></i>
                        <span>لیست واریز های من</span>
                    </div>
                </div>
                <div class="col-lg-12 col-sm-12">
                    <div class="table-box">
                        <table border="0">
                            <tr>
                                <th>شناسه</th>
                                <th>تاریخ</th>
                                <th>نوع واریز</th>
                                <th>مقدار</th>
                                <th>وضعیت انلاین</th>
                                <th>تایم</th>
                                <th>وضعیت</th>
                            </tr>
                            @foreach($variz as $item)
                                <tr class="@if($loop->index%2==0) light-color @else grey-color @endif">
                                    <td>#{{$item->id}}</td>
                                    <td>{!! convertCreateAtToPersianDateTime($item->created_at) !!}</td>
                                    <td>{!! getTypeOfFactor($item->mode) !!}</td>
                                    <td>{{$item->price}}</td>
                                    <td>{!! calculateOnlineTimeNote($item->mode) !!}</td>
                                    <td>
                                        @if($item->status=="paid" && $item->added_to_man_balance==0)
                                            {!! calculateOnlineTime($item->mode,$item->created_at) !!} ساعت باقی مانده
                                        @elseif($item->status=="paid" && $item->added_to_man_balance==1)
                                            وارد معامله شد
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        {!! getFactorStatus($item->status) !!}
                                    </td>
                                </tr>

                            @endforeach
                        </table>
                        {{ $variz->links('vendors.pagination.cutom_pagination') }}
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-sm-12">
                    <div class="feature-box">
                        <div class="feature-icon">
                            <i class="fa fa-dollar-sign  "></i>
                        </div>
                        <p>سود 24 ساعت
                            <span>
                                        <strong>0</strong> $

                                    </span>
                        </p>
                        <div class="clearfix"></div>


                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="feature-box">
                        <div class="feature-icon">
                            <i class="fa fa-hands-helping  "></i>
                        </div>
                        <p>سود یک ماه
                            <span>
                                        <strong>0</strong>$
                                    </span>

                        </p>
                        <div class="clearfix"></div>

                    </div>

                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="feature-box">
                        <div class="feature-icon">
                            <i class="fa fa-shopping-bag  "></i>
                        </div>
                        <p>موجودی ربات
                            <span>
                                        <strong>{{$User->active_balance}}</strong>
                                    </span>
                        </p>
                        <div class="clearfix"></div>

                    </div>
                </div>


            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <div class="sectoin-title">
                        <i class="fa fa-square-full"></i>
                        <span>لیست سود های روزانه</span>
                    </div>
                </div>
                <div class="col-lg-12 col-sm-12">
                    <div class="table-box">
                        <table border="0">
                            <tr>
                                <th>شناسه</th>
                                <th>تاریخ</th>
                                <th>مقدار کل</th>
                                <th>سهم شما</th>
                                <th>سهم سایت</th>
                                <th>درصد سود</th>
                                <th>موجودی جدید</th>
                                <th>وضعیت</th>
                            </tr>
                        </table>
{{--                        {{ $variz->links('vendors.pagination.cutom_pagination') }}--}}
                    </div>
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
        document.getElementById('withdraw_account').addEventListener('change', function () {
            if (document.getElementById("withdraw_account").checked) {
                document.getElementById("tether_withdraw_form").style.display = 'none';
                document.getElementById("rial_withdraw_form").style.display = 'block';

            }
        });
        document.getElementById('withdraw_wallet').addEventListener('change', function () {
            if (document.getElementById("withdraw_wallet").checked) {
                document.getElementById("tether_withdraw_form").style.display = 'block';
                document.getElementById("rial_withdraw_form").style.display = 'none';

            }
        });
    </script>
@endsection

