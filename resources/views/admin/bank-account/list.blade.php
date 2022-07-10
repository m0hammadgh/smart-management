@extends('admin.layout.layout')
@section('title',' حساب بانکی')
@section('page')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>لیست حساب های بانکی</h3>

                </div>

            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">

                    <div class="card-block row">
                        <div class="col-sm-12 col-lg-12 col-xl-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="bg-primary">

                                    <tr>
                                        <th scope="col">#</th>
                                        <th class="text-center"  scope="col">کاربر</th>
                                        <th class="text-center"  scope="col">بانک </th>
                                        <th class="text-center"  scope="col">شماره شبا</th>
                                        <th class="text-center"  scope="col">شماره کارت</th>
                                        <th class="text-center"  scope="col">وضعیت</th>
                                        <th class="text-center"  scope="col">نوع</th>
                                        <th class="text-center"  scope="col">عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($list as $item)
                                        <tr>
                                            <th scope="row">{{$loop->index +1}}</th>
                                            <td class="text-center" >{!! getUserInfo($item->user_id) !!}</td>
                                            <td class="text-center" >{!! getBankInfo($item->bank_id) !!}</td>
                                            <td class="text-center" >{!! $item->IBAN??"" !!}</td>
                                            <td class="text-center" >{!! $item->number??"" !!}</td>
                                            <td class="text-center" >{!! getBankAccountStatus($item->status) !!}</td>
                                            <td class="text-center" >{!! getBankAccountType($item->type) !!}</td>

                                            <td class="text-center">
                                                <a href="{{route('bankAccounts.accept',[$item->id])}}"><i class="fa fa-check"></i></a>
                                                <a class="reject-item" href="{{route('bankAccounts.reject',[$item->id])}}"><i class="fa fa-remove"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @if($list->hasPages())
                            <div class="widget-footer text-center">
                                {!! $list->links('pagination::bootstrap-4') !!}
                            </div>
                        @endif
                    </div>

                </div>
            </div>

        </div>
    </div>
    <div class="modal fade" id="exampleModalgetbootstrap" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">پیام جدید</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="لغو"></button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="col-form-label" for="recipient-name">علت رد درخواست</label>
                            <input class="form-control" name="not" type="text" value="" />
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">لغو</button>
                            <input class="btn btn-danger" type="submit"  value="رد درخواست"/>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
@endsection

@section('script')
    <!-- Plugins JS start-->
    <script src="/assets/mirror/js/datatable/datatables/jquery.dataTables.min.js"></script>
    <script src="/assets/mirror/js/datatable/datatable-extension/dataTables.buttons.min.js"></script>
    <script src="/assets/mirror/js/datatable/datatable-extension/jszip.min.js"></script>
    <script src="/assets/mirror/js/datatable/datatable-extension/buttons.colVis.min.js"></script>
    <script src="/assets/mirror/js/datatable/datatable-extension/pdfmake.min.js"></script>
    <script src="/assets/mirror/js/datatable/datatable-extension/vfs_fonts.js"></script>
    <script src="/assets/mirror/js/datatable/datatable-extension/dataTables.autoFill.min.js"></script>
    <script src="/assets/mirror/js/datatable/datatable-extension/dataTables.select.min.js"></script>
    <script src="/assets/mirror/js/datatable/datatable-extension/buttons.bootstrap4.min.js"></script>
    <script src="/assets/mirror/js/datatable/datatable-extension/buttons.html5.min.js"></script>
    <script src="/assets/mirror/js/datatable/datatable-extension/buttons.print.min.js"></script>
    <script src="/assets/mirror/js/datatable/datatable-extension/dataTables.bootstrap4.min.js"></script>
    <script src="/assets/mirror/js/datatable/datatable-extension/dataTables.responsive.min.js"></script>
    <script src="/assets/mirror/js/datatable/datatable-extension/responsive.bootstrap4.min.js"></script>
    <script src="/assets/mirror/js/datatable/datatable-extension/dataTables.keyTable.min.js"></script>
    <script src="/assets/mirror/js/datatable/datatable-extension/dataTables.colReorder.min.js"></script>
    <script src="/assets/mirror/js/datatable/datatable-extension/dataTables.fixedHeader.min.js"></script>
    <script src="/assets/mirror/js/datatable/datatable-extension/dataTables.rowReorder.min.js"></script>
    <script src="/assets/mirror/js/datatable/datatable-extension/dataTables.scroller.min.js"></script>
    <script src="/assets/mirror/js/datatable/datatable-extension/custom.js"></script>
    <script src="/assets/mirror/js/tooltip-init.js"></script>
    <script>
        $('.reject-item').click(function (e) {
            e.stopPropagation();
            e.preventDefault();
            $('#exampleModalgetbootstrap').modal('show');
            let url = $(this).attr('href');
            $('#exampleModalgetbootstrap').find('form').attr('action',url);
        })
    </script>
    <!-- Plugins JS Ends-->f
@endsection
