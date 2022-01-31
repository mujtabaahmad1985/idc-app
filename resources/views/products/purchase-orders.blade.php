@extends('layout.app')
@section('page-title') Purchased Orders @endsection
@section('css')
    {!! Html::style(url('/').'/bootstrap/js/plugins/easyautocomplete/easy-autocomplete.css') !!}
    <style>
        .easy-autocomplete{ width: 100% !important;}
    </style>
@endsection

@section('content')
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Purchase Orders</span> - List</h4>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none">
                <div class="d-flex justify-content-center">
                    <a href="#" class="btn btn-link btn-float text-body"><i class="icon-bars-alt text-primary"></i><span>Dashboard</span></a>
                </div>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="/dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Dashboards</a>

                    <span class="breadcrumb-item active">Purchase Orders</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>


        </div>
    </div>
    <div class="content">
        <div class="card col-sm-12 col-md-12">

            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-striped purchase-order-list-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Invoice No</th>

                            <th>Manufacture Name</th>
                            <th>Purchase order date</th>
                            <th>Amount</th>
                            <td>Number of Items</td>
                            <th>Paid as</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                    @if(isset($orders) && $orders->count() > 0)
                        @foreach($orders as $order)
                            <tr>
                                <td> {!! $order->id !!} </td>
                                <td> {!! $order->invoice_no !!} </td>

                                <td>{!! isset($order->manufactures)?$order->manufactures->name:"" !!}</td>
                                <td>{!! \App\Helpers\CommonMethods::formatDate($order->purchase_date) !!}</td>
                                <td>{!! $order->total_price !!}</td>
                                <td> @if(isset($order->order_items) && $order->order_items->count() > 0) <a href="#!" class="badge badge-success" rel="item" data-id="{!! $order->id !!}">{!! $order->order_items->count() !!}</a>  @else <span class="badge badge-danger">0</span>  @endif </td>
                                <td>{!! $order->cash_type !!}</td>
                                <td>
                                    <div class="ml-3">
                                        <div class="list-icons">
                                            <div class="list-icons-item dropdown">
                                                <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-menu7"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">
                                                    <a href="/order/edit/{!! $order->id !!}" class="dropdown-item" data-id="{!! $order->id !!}"><i class="icon-pencil"></i> Edit</a>
                                                    <a href="#!" class="dropdown-item order-delete" data-action="" data-id="{!! $order->id !!}"><i class="icon-trash"></i> Delete</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="/download/purchase/order/{!! $order->id !!}" class="dropdown-item product-view" data-id="{!! $order->id !!}"><i class="icon-credit-card"></i> Download Order</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        @endif

                    </tbody>
                </table>
                </div>
            </div>
        </div>





    </div>
    <div id="order-items" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Order Items</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <table id="item-table" class="table table-striped">
                        <thead>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>


    {{--    END BRAND MODAL --}}

@endsection


@section('js')
    {!! Html::script('public/js/jquery.form.js') !!}
    {!! Html::script('public/plugins/jquery.validate/js/jquery.validate.min.js') !!}
    {!! Html::script(url('/').'/bootstrap/js/plugins/tables/datatables/datatables.min.js') !!}
    {!! Html::script(url('/').'/bootstrap/js/plugins/tables/datatables/dataTables.buttons.min.js') !!}
    {!! Html::script(url('/').'/bootstrap/js/plugins/forms/styling/uniform.min.js') !!}
    {!! Html::script(url('/').'/bootstrap/js/plugins/easyautocomplete/jquery.easy-autocomplete.min.js') !!}
<script>
    $(function () {

        $(".order-delete").click(function(){
            var id = $(this).attr('data-id');
            swal({    title: "Are you sure?",
                    text: "You will not be able to recover this detail!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it!",
                    closeOnConfirm: false },
                function(){

                    $.ajax({
                        url:"/order/delete/"+id,
                        success:function(){
                            swal("Deleted!", "Record has been deleted.", "success");
                            setTimeout(function(){location.reload()}, 2500);
                        }
                    });


                });
        });

        $("body").on("click","a[rel=item]",function () {
            var id = $(this).data('id');

            $.ajax({
                url:"/get/order/items",
                data:{
                    id:id,
                    "_token":'{!! csrf_token() !!}'
                },
                type:"POST",
                success:function (response) {
                    response = $.parseJSON(response);
                    $.each(response,function (i,v) {
                        var str ="<tr>";
                                str+="<td>"+v.item_name+"</td>";
                                str+="<td>"+v.quantity+"</td>";
                                str+="<td>"+v.price.toFixed(2)+"</td>";
                                str+="<td>"+v.total_price.toFixed(2)+"</td>";
                            str+="</tr>";

                         //   console.log(str);

                            $("#item-table > tbody").append(str);
                    });
                    $("#item-table").DataTable().destroy();
                    $("#item-table").DataTable({
                        "paging": true, "info":     true,"searching": false,
                        dom: 'Bfrtip',
                        "aaSorting": [],
                        "lengthMenu": [ [100, 250, 500, -1], [100, 250, 500, "All"] ],
                        buttons: [
                            {
                                text: '<i class="icon-plus2"></i> New Item',
                                className:"btn bg-danger-400 btn-icon rounded-round",

                                action: function ( e, dt, node, config ) {

                                }
                            },

                        ]
                    });

                    $("#order-items").modal();
                }
            });
        });

        $(".purchase-order-list-table").DataTable({
            "paging": true, "info":     true,"searching": false,
            dom: 'Bfrtip',
            "aaSorting": [],
            "lengthMenu": [ [100, 250, 500, -1], [100, 250, 500, "All"] ],
            buttons: [
                {
                    text: '<i class="icon-plus2"></i> New Purchase Order',
                    className:"btn bg-danger-400 btn-icon rounded-round",

                    action: function ( e, dt, node, config ) {
                       window.location = "/purchase/order/new";
                    }
                },

            ]
        });
    })
</script>
@endsection