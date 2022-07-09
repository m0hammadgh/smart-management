@extends('user.layout.layout')
@section('page')
    <div class="page-body">
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
                                            <th class="text-center" scope="col">نوع درخواست</th>
                                            <th class="text-center" scope="col">وضعیت</th>
                                            <th class="text-center" scope="col">توضیحات</th>
                                            <th class="text-center" scope="col">تاریخ</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($list as $item)
                                            <tr>
                                                <th scope="row">{{$loop->index +1}}</th>
                                                <td class="text-center">{!! getDocumentVerificationType($item->type) !!}</td>
                                                <td class="text-center">{!! getDocumentVerificationStatus($item->status) !!}</td>
                                                <td class="text-center">{{$item->note}}</td>
                                                <td class="text-center">{{$item->created_at}}</td>
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
        <!-- Container-fluid Ends-->
    </div>
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
    <!-- Plugins JS Ends-->
@endsection
