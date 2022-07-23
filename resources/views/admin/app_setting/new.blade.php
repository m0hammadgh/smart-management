@extends('admin.layout.layout')
@section('title','تنظیمات اصلی')
@section('page')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>تنظمیات</h3>

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
                              action="{{route('settings.content.update',$edit->id)}} ">

                            @csrf


                            <div class="row g-3">
                                <div class="col-md-6 col-sm-12">
                                    <label class="col-form-label">شماره تلفن مدیریت </label>
                                    <div class="input-group">
                                        <input class="form-control" id="validationCustomUsername" type="text"
                                               name="admin_number" placeholder=""
                                               aria-describedby="inputGroupPrepend" required=""
                                               value=" {!! getValue('admin_number') ?? '' !!} "/>
                                        <div class="invalid-feedback">متن را مشخص کنید</div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <label class="col-form-label">متن علت تاخیر درگاه تتر</label>
                                    <div class="input-group">
                                        <input class="form-control" id="validationCustomUsername" type="text"
                                               name="tether_pay_reason" placeholder="خرید"
                                               aria-describedby="inputGroupPrepend" required=""
                                               value=" {!! getValue('tether_pay_reason') ?? '' !!} "/>
                                        <div class="invalid-feedback">متن را وارد کنید</div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <label class="col-form-label">متن علت تاخیر درگاه ریالی</label>
                                    <div class="input-group">
                                        <input class="form-control" id="validationCustomUsername" type="text"
                                               name="rial_pay_reason" placeholder="خرید"
                                               aria-describedby="inputGroupPrepend" required=""
                                               value=" {!! getValue('rial_pay_reason') ?? '' !!} "/>
                                        <div class="invalid-feedback">متن را وارد کنید</div>
                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-12">
                                    <label class="col-form-label">متن علت تاخیر انتقال حساب به حساب</label>
                                    <div class="input-group">
                                        <input class="form-control" id="validationCustomUsername" type="text"
                                               name="transfer_pay_reason" placeholder="خرید"
                                               aria-describedby="inputGroupPrepend" required=""
                                               value=" {!! getValue('transfer_pay_reason') ?? '' !!} "/>
                                        <div class="invalid-feedback">متن را وارد کنید</div>
                                    </div>
                                </div>

                            </div>

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
