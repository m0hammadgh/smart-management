@extends('user.layout.layout')
@section('page')
    <div class="page-body">
        <div class="container-fluid">
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row text-center">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h5>کد ارسال شده به آدرس ایمیل  را وارد کنید</h5>
                        </div>

                        <form class="form theme-form" method="post" action="{{route('user.email_verify')}}">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <input class="form-control btn-pill" name="code" id="exampleFormControlInput5" type="text" placeholder="کد تایید" />
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer text-end">
                                <button class="btn btn-primary" type="submit">ارسال</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
@endsection
