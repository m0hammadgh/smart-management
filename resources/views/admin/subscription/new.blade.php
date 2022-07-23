@extends('admin.layout.layout')
@section('title','طرح عضویت')
@section('page')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>ایجاد طرح عضویت</h3>

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
                        <form class="needs-validation" novalidate="" method="post" enctype="multipart/form-data"
                              action="@if(isset($edit)) {{route('subscription.admin.update',$edit->id)}} @else {{route('subscription.admin.store')}} @endif">

                            @csrf
                            <div class="row g-3 m-t-5">
                                <div class="col-md-6">
                                    <label class="form-label" for="validationCustom01">عنوان</label>
                                    <input class="form-control" id="validationCustom01" type="text" required
                                           name="title" value="{!! $edit->title ?? '' !!}"/>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="validationCustom01">میزان واریز - دلار (0 =
                                        نامحدود)</label>
                                    <input class="form-control" id="validationCustom01" type="text" required
                                           name="charge_amount"
                                           value="@if(isset($edit)) {!! $edit->charge_amount ?? 0 !!} @else 0 @endif"/>
                                </div>

                            </div>

                            <div class="row g-3 m-t-5">
                                <div class="col-md-6">
                                    <label class="form-label" for="validationCustom01">حداکثر برداشت (ریال)</label>
                                    <input class="form-control" id="withdraw-rial" type="text" required
                                           name="withdraw_rial"
                                           value="@if(isset($edit)) {!! $edit->withdraw_rial ?? '' !!} @endif"/>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="validationCustom01">حداکثر برداشت رمر
                                        ارز(دلار)</label>
                                    <input class="form-control" id="withdraw_crypto" type="text" required
                                           name="withdraw_crypto"
                                           value="@if(isset($edit)) {!! $edit->withdraw_crypto ?? '' !!} @endif"/>
                                </div>

                            </div>

                            <div class="row g-3 m-t-5">
                                <div class="col-md-6">
                                    <label class="form-label" for="validationCustom01">درصد سود کاربر</label>
                                    <input class="form-control" id="validationCustom01" type="text" required
                                           name="user_profit"
                                           value="@if(isset($edit)) {!! $edit->user_profit ?? '' !!} @endif"/>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="validationCustom01">درصد سود سایت</label>
                                    <input class="form-control" id="validationCustom01" type="text" required
                                           name="admin_profit"
                                           value="@if(isset($edit)) {!! $edit->admin_profit ?? '' !!} @endif"/>
                                </div>

                            </div>


                            <div class="row g-3 m-t-5">
                                <div class="col-md-6">
                                    <label class="form-label" for="validationCustom01">مدت زمان ( روز )</label>
                                    <input class="form-control" id="validationCustom01" type="text"
                                           name="duration"
                                           value="@if(isset($edit)) {!! $edit->duration ?? '' !!} @endif"/>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="validationCustom01">قیمت (دلار)</label>
                                    <input class="form-control" id="price" type="text" required
                                           name="price" value="@if(isset($edit)) {!! $edit->price ?? '' !!} @endif"/>
                                </div>

                            </div>


                            <div class="row g-3 m-t-5">
                                <div class="col-md-12">
                                    <label class="form-label" for="validationCustom01">توضیحات</label>
                                    <input class="form-control" id="validationCustom01" type="text"
                                           name="description"
                                           value="@if(isset($edit)) {!! $edit->description ?? '' !!} @endif"/>
                                </div>

                            </div>

                            <div class="row g-3 m-t-5">
                                <div class="col-md-6">
                                    <input value="1" id="checkbox-primary-1" type="checkbox" name="all_features"/>
                                    <label for="checkbox-primary-1">دسترسی به تمام امکانات سایت</label>

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
    <script>
        document.getElementById('withdraw-rial').addEventListener(`keyup`, function (event) {
            const value = this.value;
            if (this.value === "") {
                this.value = "";
                return;
            }
            const decimalCount = value.split(`.`).length - 1;
            if (event.key === `.` && decimalCount === 1) return
            const numericVal = parseFloat(value.replace(/,/g, ''));
            const options = {
                style: `decimal`,
                maximumFractionDigits: 20,
            };
            this.value = new Intl.NumberFormat(`en-US`, options).format(numericVal);
        })
        document.getElementById('withdraw_crypto').addEventListener(`keyup`, function (event) {
            const value = this.value;
            if (this.value === "") {
                this.value = "";
                return;
            }
            const decimalCount = value.split(`.`).length - 1;
            if (event.key === `.` && decimalCount === 1) return
            const numericVal = parseFloat(value.replace(/,/g, ''));
            const options = {
                style: `decimal`,
                maximumFractionDigits: 20,
            };
            this.value = new Intl.NumberFormat(`en-US`, options).format(numericVal);
        })
        document.getElementById('price').addEventListener(`keyup`, function (event) {
            const value = this.value;
            if (this.value === "") {
                this.value = "";
                return;
            }
            const decimalCount = value.split(`.`).length - 1;
            if (event.key === `.` && decimalCount === 1) return
            const numericVal = parseFloat(value.replace(/,/g, ''));
            const options = {
                style: `decimal`,
                maximumFractionDigits: 20,
            };
            this.value = new Intl.NumberFormat(`en-US`, options).format(numericVal);
        })

        function getCommaFormattedPrice(value) {
            if (this.value == null || this.value === "") {
                return "";
            }
            const numericVal = parseFloat(value.replace(/,/g, ''));
            const options = {
                style: `decimal`,
                maximumFractionDigits: 20,
            };
            return new Intl.NumberFormat(`en-US`, options).format(numericVal);
        }
    </script>
@endsection
