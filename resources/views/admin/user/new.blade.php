@extends('admin.layout.layout')
@section('title',' کاربر')
@section('page')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>@if(isset($edit)) ویرایش کاربر  @else  کاربر جدید @endif</h3>

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
                              action="@if(isset($edit)) {{route('user.update',$edit->id)}} @else {{route('user.store')}} @endif">

                            @csrf
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label class="form-label" for="validationCustom01">نام</label>
                                    <input class="form-control" id="validationCustom01" type="text" required=""
                                           name="name" value="@if(isset($edit)) {!! $edit->name ?? '' !!} @endif"/>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="validationCustom02">نام خانوادگی</label>
                                    <input class="form-control" id="validationCustom02" type="text" required=""
                                           name="last_name"
                                           value="@if(isset($edit)) {!! $edit->last_name ?? '' !!} @endif"/>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="validationCustom02">تلفن همراه</label>
                                    <input class="form-control" id="validationCustom02" type="text" required="" minlength="10"
                                           name="mobile_number"
                                           value="@if(isset($edit)) {!! $edit->mobile_number ?? '' !!} @endif"/>
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label" for="validationCustomUsername">نام کاربری</label>
                                    <div class="input-group">
                                        <input class="form-control" id="validationCustomUsername" type="text"
                                               name="user_name" placeholder="نام کاربری"
                                               aria-describedby="inputGroupPrepend" required=""
                                               value="@if(isset($edit)) {!! $edit->user_name ?? '' !!} @endif"/>
                                        <div class="invalid-feedback">لطفا یک نام کاربری انتخاب کنید</div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label" for="validationCustom03">رمز عبور</label>
                                    <input class="form-control" id="validationCustom03" type="password"
                                           placeholder="رمز" required="" name="password"
                                           value="@if(isset($edit)) {!! decrypt($edit->password) ?? '' !!} @endif"/>
                                    <div class="invalid-feedback">رمز عبور را انتخاب کنید</div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label" for="validationCustomUsername">ایمیل</label>
                                    <div class="input-group">
                                        <input class="form-control" id="validationCustomUsername" type="email"
                                               name="email" placeholder="ایمیل"
                                               aria-describedby="inputGroupPrepend"
                                               value="@if(isset($edit)) {!! $edit->email ?? '' !!} @endif"/>
                                    </div>
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
