@extends('admin.layout.layout')
@section('title',' صرافی')
@section('page')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>@if(isset($edit))ویرایش صرافی @else صرافی جدید @endif </h3>

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
                              action="@if(isset($edit)) {{route('exchange.update',$edit->id)}} @else {{route('exchange.store')}} @endif">

                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label" for="validationCustom01">عنوان صرافی</label>
                                    <input class="form-control" id="validationCustom01" type="text" required
                                           name="title" value="@if(isset($edit)) {!! $edit->title ?? '' !!} @endif"/>
                                </div>
                            </div>
                            <div class="row g-3 m-t-5">
                                <div class="col-md-6">
                                    <label class="form-label" for="validationCustom01">آیکون </label>
                                    <input class="form-control" id="validationCustom01" type="file"
                                           name="image"/>
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
