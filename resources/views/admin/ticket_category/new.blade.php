@extends('admin.layout.layout')
@section('title',' گروه پشتیبانی')
@section('page')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>ایجاد گروه جدید</h3>

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
                              action="@if(isset($edit)) {{route('ticketCategory.update',$edit->id)}} @else {{route('ticketCategory.store')}} @endif">

                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label" for="validationCustom01">عنوان </label>
                                    <input class="form-control" id="validationCustom01" type="text" required
                                           name="title" value="@if(isset($edit)) {!! $edit->title ?? '' !!} @endif"/>
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
