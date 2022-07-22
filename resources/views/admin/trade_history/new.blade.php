@extends('admin.layout.layout')
@section('title','خرید و فروش')
@section('page')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>خرید و فروش</h3>

                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form class="needs-validation" novalidate="" method="post"
                              action="@if(isset($edit)) {{route('tradeHistory.update',$edit->id)}} @else {{route('tradeHistory.store')}} @endif">

                            @csrf
                            <div class="row g-3">
                                @if(!isset($edit) )
                                    <div class="col-md-6">
                                        <label class="col-form-label" for="users">انتخاب کاربر</label>

                                        <select name="users[]" class="js-example-placeholder-users col-sm-12" id="users"
                                                multiple="multiple">
                                            @foreach($users as $user)
                                                <option
                                                    value="{{$user->id}}">{{$user->name ??""}} {{$user->last_name ??""}}
                                                    - {{$user->mobile_number ??""}}</option>

                                            @endforeach

                                        </select>
                                    </div>
                                @endif
                                <div class="col-md-6">
                                    <label class="col-form-label">رمز ارز را انتخاب کنید</label>
                                    <select class="form-control form-control-info btn-square col-sm-12 "
                                            name="currency_id">
                                        @foreach($currencies as $currency)
                                            <option @if(isset($edit) && $edit->currency_id==$currency->id) selected
                                                    @endif value="{{$currency->id}}">{{$currency->short_name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="row g-3">
                                <div class="col-md-4 col-sm-12">
                                    <label class="col-form-label">درصد سود</label>
                                    <div class="input-group">
                                        <input class="form-control" id="validationCustomUsername" type="text"
                                               name="profit" placeholder="درصد سود(تنها عدد و بدون علامت درصد)"
                                               aria-describedby="inputGroupPrepend" required=""
                                               value="@if(isset($edit)) {!! $edit->profit ?? '' !!} @endif"/>
                                        <div class="invalid-feedback">درصد سود را مشخص کنید</div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <label class="col-form-label">قیمت خرید</label>
                                    <div class="input-group">
                                        <input class="form-control" id="validationCustomUsername" type="text"
                                               name="buy_price" placeholder="خرید"
                                               aria-describedby="inputGroupPrepend" required=""
                                               value="@if(isset($edit)) {!! $edit->buy_price ?? '' !!} @endif"/>
                                        <div class="invalid-feedback">زمان معامله را مشخص کنید</div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <label class="col-form-label">قیمت فروش</label>
                                    <div class="input-group">
                                        <input class="form-control" id="validationCustomUsername" type="text"
                                               name="sell_price" placeholder="فروش"
                                               aria-describedby="inputGroupPrepend" required=""
                                               value="@if(isset($edit)) {!! $edit->sell_price ?? '' !!} @endif"/>
                                        <div class="invalid-feedback">قیمت فروش را مشخص کنید</div>
                                    </div>
                                </div>


                            </div>

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="col-form-label" for="users">خرید از صرافی</label>

                                    <select name="buy_exchange_id" class="js-example-basic-multiple-limit col-sm-12"
                                            id="users">
                                        @foreach($exchanges as $exchange)
                                            <option
                                                value="{{$exchange->id}}  @if(isset($edit) && $edit->buy_exchange_id==$exchange->id) selected @endif">{{$exchange->title ??""}}  </option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="col-form-label" for="users">فروش به صرافی</label>

                                    <select name="sell_exchange_id" class="js-example-basic-multiple-limit col-sm-12"
                                            id="users">
                                        @foreach($exchanges as $exchange)
                                            <option value="{{$exchange->id}}"
                                                    @if(isset($edit) && $edit->sell_exchange_id==$exchange->id) selected @endif>{{$exchange->title ??""}}  </option>
                                        @endforeach

                                    </select>
                                </div>

                            </div>
                            @if(!isset($edit) )

                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="form-label" for="validationCustom04">زمان معامله</label>
                                        <input class="form-control" id="validationCustomUsername" type="datetime-local"
                                               name="date" placeholder="زمان"
                                               aria-describedby="inputGroupPrepend" required=""
                                               value="@if(isset($edit)) {!! $edit->date ?? '' !!} @endif"/>
                                        <div class="invalid-feedback">زمان معامله را مشخص کنید</div>
                                    </div>

                                    <div class="col-md-3">
                                        <label class="form-label" for="validationCustom04">وضعیت</label>
                                        <select class="form-select" id="validationCustom04" name="success">
                                            <option @if(isset($edit) && $edit->success==1) selected @endif value="1">موفق
                                            </option>
                                            <option @if(isset($edit) && $edit->success==0) selected @endif value="0">عدم موفقیت
                                            </option>
                                        </select>
                                        <div class="invalid-feedback">لطفاً یک حالت معتبر انتخاب کنید.</div>
                                    </div>
                                </div>
                            @endif
                            <br/>
                            <button class="btn btn-primary" type="submit">@if(isset($edit)) به روز رسانی @else
                                    ایجاد@endif</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection
@section('script')
@endsection
