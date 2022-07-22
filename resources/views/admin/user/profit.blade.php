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
                              action="@if(isset($edit)) {{route('tradeHistory.update',$edit->id)}} @else {{route('user.profit.store')}} @endif">

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



                            </div>

                            <div class="row g-3">

                                <br/>

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
