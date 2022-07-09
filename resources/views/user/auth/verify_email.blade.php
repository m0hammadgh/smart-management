@extends('user.layout.layout')
@section('page')
    <div class="page-body">
        <div class="container-fluid">
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h5>تایید ایمیل</h5>
                        </div>
                        <form class="form theme-form" method="post" action="{{route('user.email_verify')}}">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="exampleFormControlInput5">کد ارسال شده به آدرس ایمیل  را وارد کنید</label>
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
