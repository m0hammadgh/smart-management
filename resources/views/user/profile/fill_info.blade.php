@extends('user.layout.layout')
@section('page')
    <div class="page-body">

        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h5>تکمیل اطلاعات کاربری</h5>
                        </div>
                        <div class="card-body">
                            <form class="f1" method="post" action="{{route('user.submit_information')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="f1-steps">
                                    <div class="f1-progress">
                                        <div class="f1-progress-line" data-now-value="16.66" data-number-of-steps="2"></div>
                                    </div>
                                    <div class="f1-step active">
                                        <div class="f1-step-icon"><i class="fa fa-user"></i></div>
                                        <p>اطلاعات</p>
                                    </div>
                                    <div class="f1-step">
                                        <div class="f1-step-icon"><i class="fa fa-key"></i></div>
                                        <p>مدارک هویتی</p>
                                    </div>
                                </div>
                                <fieldset>
                                    <div class="form-group">
                                        <label for="f1-first-name">نام </label>
                                        <input class="form-control" id="f1-first-name" type="text" name="name" placeholder="نام..." required="" />
                                    </div>
                                    <div class="form-group">
                                        <label for="f1-last-name">نام خانوادگی</label>
                                        <input class="f1-last-name form-control" id="f1-last-name" type="text" name="last_name" placeholder="نام خانوادگی..." required="" />
                                    </div>
                                    <div class="form-group">
                                        <label for="f1-last-name">کد ملی </label>
                                        <input class="f1-last-name form-control" id="f1-last-name" type="number" name="national_id" placeholder="کد ملی ..." required="" />
                                    </div>
                                    <div class="form-group">
                                        <label for="f1-last-name">ایمیمل </label>
                                        <input class="f1-last-name form-control" id="f1-last-name" type="text" name="email" placeholder="ایمیل" required="" />
                                    </div>
                                    <div class="f1-buttons">
                                        <button class="btn btn-primary btn-next" type="button">بعد</button>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-3 col-form-label">آپلود کارت ملی</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="file" name="national_card_file" />
                                        </div>  </div>


                                    <div class="f1-buttons">
                                        <button class="btn btn-primary btn-previous" type="button">قبلی</button>
                                        <button class="btn btn-primary btn-submit" type="submit">ارسال</button>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
@endsection

@section('script')
    <!-- Plugins JS start-->
    <script src="/assets/mirror/js/form-wizard/form-wizard-three.js"></script>
    <script src="/assets/mirror/js/form-wizard/jquery.backstretch.min.js"></script>
    <!-- Plugins JS Ends-->
@endsection
