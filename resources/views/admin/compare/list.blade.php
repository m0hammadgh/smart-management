@extends('admin.layout.layout')
@section('title','مقایسه قیمت')
@section('page')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>لیست مقایسه قیمت رمز ارزها</h3>

                </div>
                <div class="col-sm-6 text-end">
                    <a class="btn btn-success" href="{{route('compare.add')}}">افزودن</a>

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
                                        <th class="text-center"  scope="col">رمز ارز</th>
                                        <th class="text-center"  scope="col">درصد سود</th>
                                        <th class="text-center"  scope="col"> بیشترین قیمت </th>
                                        <th class="text-center"  scope="col">بیشترین قیمت در صرافی</th>
                                        <th class="text-center"  scope="col"> کمترین قیمت </th>
                                        <th class="text-center"  scope="col">کمترین قیمت در صرافی</th>
                                        <th class="text-center"  scope="col">عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($list as $item)
                                        <tr>
                                            <th scope="row">{{$loop->index +1}}</th>
                                            <td class="text-center" >{{$item->currency->short_name ?? '' }} </td>
                                            <td class="text-center" >{{$item->profit ?? '' }}</td>
                                            <td class="text-center" >{{$item->top_price ?? '' }}</td>
                                            <td class="text-center" >{{$item->topPriceExchange->title ?? '' }}</td>
                                            <td class="text-center" >{{$item->low_price ?? '' }}</td>
                                            <td class="text-center" >{{$item->lowPriceExchange->title ?? '' }}</td>
                                            <td class="text-center">
                                                <a href="{{route('compare.edit',[$item->id])}}"><i class="fa fa-edit"></i></a>
                                                <a class="delete-item" href="{{route('compare.delete',[$item->id])}}"><i class="fa fa-remove"></i></a>
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
    <!-- Plugins JS Ends-->
@endsection
