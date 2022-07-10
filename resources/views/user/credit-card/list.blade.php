@extends('user.layout.layout')
@section('page')
    <div class="container-fluid topic">

        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="feature-box">
                    <div class="feature-title">
                        <i class="fa fa-square-full"></i>
                        <span> کارت های بانکی</span>
                    </div>
                    <div class="table-box">
                        <table border="0">
                            <tr>
                                <th class="text-center" scope="col">بانک</th>
                                <th class="text-center" scope="col">نام بانک</th>
                                <th class="text-center" scope="col">شماره شبا</th>
                                <th class="text-center" scope="col">شماره کارت</th>
                                <th class="text-center" scope="col">توضیحات</th>
                                <th class="text-center" scope="col">وضعیت</th>
                            </tr>
                            @foreach($list as $item)
                                <tr>
                                    <td class="text-center">{!! getBladeImage($item->bank->icon,'bank') !!}</td>
                                    <td class="text-center">{!! $item->bank->title !!}</td>
                                    <td class="text-center">{!! $item->IBAN??"" !!}</td>
                                    <td class="text-center">{!! $item->number??"" !!}</td>
                                    <td class="text-center">{!! $item->note??"" !!}</td>
                                    <td class="text-center">{!! getBankAccountStatus($item->status) !!}</td>
                                </tr>
                            @endforeach

                        </table>
                    </div>

                </div>
            </div>


        </div>
        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <div class="feature-box compare">
                    <form method="post" action="{{route('user.card.store')}}">
                        @csrf
                        <div class="float-left" style="margin-left: 10px;margin-right: 20px">
                            <span>شماره کارت</span>
                            <span><input name="number" required class="form-control" style="min-width: 250px"
                                         type="text"
                                         maxlength="16"></span>
                            <span>شماره شبا </span>
                            <span><input name="IBAN" required class="form-control" type="text" maxlength="24"></span>
                            <span>انتخاب بانک </span>
                            <span>   <select name="bank_id" required class="form-control">

                            @foreach($banks as $bank)
                                        <option value="{{$bank->id}}">
                                        {{$bank->title}}
                                    </option>
                                    @endforeach
                            </select>

                        </span>
                            <span>توضیحات </span>
                            <span><input name="note" required class="form-control" type="text"></span>
                        </div>

                        <div class="clearfix"></div>
                        <br/>
                        <input type="submit" value="افزودن کارت بانکی" class="btn btn-success ">
                    </form>

                </div>

            </div>

        </div>
    </div>
@endsection

@section('script')
    <!-- Plugins JS start-->
    <!-- Plugins JS start-->
    <script src="/assets/mirror/js/counter/jquery.waypoints.min.js"></script>
    <script src="/assets/mirror/js/counter/jquery.counterup.min.js"></script>
    <script src="/assets/mirror/js/counter/counter-custom.js"></script>
    <script src="/assets/mirror/js/photoswipe/photoswipe.min.js"></script>
    <script src="/assets/mirror/js/photoswipe/photoswipe-ui-default.min.js"></script>
    <script src="/assets/mirror/js/photoswipe/photoswipe.js"></script>
    <!-- Plugins JS Ends-->
    <!-- Plugins JS Ends-->
@endsection
