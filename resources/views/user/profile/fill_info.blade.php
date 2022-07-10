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
                            <form class="f1" method="post" action="{{route('user.submit_information')}}"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-6 text-start">
                                        <input class="form-control" id="f1-first-name" type="text" name="name"
                                               placeholder="نام..." required=""/>

                                    </div>
                                    <div class="col-6 ">
                                        <input class="f1-last-name form-control" id="f1-last-name" type="text"
                                               name="last_name" placeholder="نام خانوادگی..." required=""/>

                                    </div>
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="col-6 text-start">
                                        <input class="f1-last-name form-control" id="f1-last-name" type="number"
                                               name="national_id" placeholder="کد ملی ..." required=""/>


                                    </div>
                                    <div class="col-6 ">
                                        <input class="f1-last-name form-control" id="f1-last-name" type="text"
                                               name="email" placeholder="ایمیل" required=""/>

                                    </div>
                                </div>
                                <br/>

                                <div class="row">
                                    <div class="col-6 ">
                                        <input class="form-control" type="file" name="national_card_file"/>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 ">
                                        <label class="col-sm-3 col-form-label"> کارت ملی</label>


                                    </div>
                                </div>
                                <br/>
                                <input type="submit" class="btn btn-success" value="ذخیره">

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
