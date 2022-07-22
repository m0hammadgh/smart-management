@extends('admin.layout.layout')
@section('title','مقایسه')
@section('page')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>مقایسه قیمت جدید</h3>

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
                              action="@if(isset($edit)) {{route('compare.update',$edit->id)}} @else {{route('compare.store')}} @endif">

                            @csrf
                            <div class="row g-3">
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

                                <div class="col-md-6">
                                    <label class="col-form-label">درصد سود</label>
                                    <div class="input-group">
                                        <input class="form-control" id="validationCustomUsername" type="text"
                                               name="profit" placeholder="درصد سود(تنها عدد و بدون علامت درصد)"
                                               aria-describedby="inputGroupPrepend" required=""
                                               value="@if(isset($edit)) {!! $edit->profit ?? '' !!} @endif"/>
                                        <div class="invalid-feedback">درصد سود را مشخص کنید</div>
                                    </div>
                                </div>

                            </div>

                            <div class="row g-3">
                                <div class="col-md-6 col-sm-12">
                                    <label class="col-form-label">کمترین قیمت</label>
                                    <div class="input-group">
                                        <input class="form-control" id="validationCustomUsername" type="text"
                                               name="low_price"
                                               aria-describedby="inputGroupPrepend" required=""
                                               value="@if(isset($edit)) {!! $edit->low_price ?? '' !!} @endif"/>
                                        <div class="invalid-feedback">کمترین قیمت را مشخص کنید</div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <label class="col-form-label" for="users">کمترین قیمت در صرافی : </label>

                                    <select name="low_exchange_id" class="js-example-basic-multiple-limit col-sm-12"
                                    >
                                        @foreach($exchanges as $exchange)
                                            <option value="{{$exchange->id}}"
                                                    @if(isset($edit) && $edit->low_exchange_id==$exchange->id) selected @endif>{{$exchange->title ??""}}  </option>
                                        @endforeach

                                    </select>
                                </div>

                            </div>

                            <div class="row g-3">
                                <div class="col-md-6 col-sm-12">
                                    <label class="col-form-label">بیشترین قیمت</label>
                                    <div class="input-group">
                                        <input class="form-control" id="validationCustomUsername" type="text"
                                               name="top_price"
                                               aria-describedby="inputGroupPrepend" required=""
                                               value="@if(isset($edit)) {!! $edit->top_price ?? '' !!} @endif"/>
                                        <div class="invalid-feedback">بیشترین قیمت را مشخص کنید</div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <label class="col-form-label" for="users">بیشترین قیمت در صرافی : </label>

                                    <select name="top_exchange_id" class="js-example-basic-multiple-limit col-sm-12"
                                    >
                                        @foreach($exchanges as $exchange)
                                            <option value="{{$exchange->id}}"
                                                    @if(isset($edit) && $edit->top_exchange_id==$exchange->id) selected @endif>{{$exchange->title ??""}}  </option>
                                        @endforeach

                                    </select>
                                </div>

                            </div>

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
