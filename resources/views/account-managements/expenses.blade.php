@extends('layout.app')
@section('page-title') Account Management - expense @endsection
@section('css')
    {!! Html::style(url('/').'/bootstrap/js/plugins/easyautocomplete/easy-autocomplete.css') !!}
    <style>
        .easy-autocomplete{ width: 100% !important;}
    </style>
@endsection

@section('content')
    <div class="content">
        <div class="card col-sm-12 col-md-12">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">expenses Transactions</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>


                    </div>
                </div>
            </div>


            {{--<div class="row">
                <div class="col-sm-12 text-right float-sm-right"><button class="btn btn-danger addroom">Add New Consent Form</button> </div>
            </div>--}}
            <div class="row mb-2">
                <div class="col-md-10">
                    <div class="row">

                        <div class="col-sm-6 col-xl-3">

                            <!-- Area chart in colored card -->
                            <div class="card bg-indigo-400 has-bg-image">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <h3 class="font-weight-semibold mb-0">${!! \App\expenses::getTotalexpense() !!}</h3>

                                    </div>

                                    <div>
                                        Total expense till today

                                    </div>
                                </div>


                            </div>
                            <!-- /area chart in colored card -->

                        </div>
                        <div class="col-sm-6 col-xl-3">

                            <!-- Area chart in colored card -->
                            <div class="card bg-primary-400 has-bg-image">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <h3 class="font-weight-semibold mb-0">${!! \App\expenses::getCurrentMonthexpense() !!}</h3>

                                    </div>

                                    <div>
                                        Current Month expense

                                    </div>
                                </div>


                            </div>
                            <!-- /area chart in colored card -->

                        </div>
                        <div class="col-sm-6 col-xl-3">

                            <!-- Area chart in colored card -->
                            <div class="card bg-danger-400 has-bg-image">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <h3 class="font-weight-semibold mb-0">${!! \App\expenses::getTodayexpense() !!}</h3>

                                    </div>

                                    <div>
                                        Today's revenue

                                    </div>
                                </div>


                            </div>
                            <!-- /area chart in colored card -->

                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-sm-12 col-xl-12">

                    <div class="card card-body" id="searched-result">
                        <div class="row mb-2">

                            <div class="col col-12 align-self-right text-right">
                                <div class="btn-group justify-content-center">
                                    <a href="#" class="btn bg-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false">New expense Transactions</a>

                                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 36px, 0px);">
                                        <a href="/expense/new?type=invoice" class="dropdown-item">Invoice</a>
                                        <a href="/expense/new?type=payment" class="dropdown-item">Payment</a>
                                        <a href="/expense/new?type=estimate" class="dropdown-item">Estimate</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="/expense/new?type=expense-reciept" class="dropdown-item">expense Reciept</a>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped product-list-table">
                                <thead>
                                <tr>

                                    <th>Type</th>
                                    <th>No.</th>
                                    <th>Customer</th>
                                    <th>Category</th>
                                    <th>Date</th>
                                    <th>Paid Via</th>
                                    <th>Total</th>
                                    <th>Status</th>



                                    <th class="text-right">Actions</th>
                                </tr>
                                </thead>

                                <tbody>
                                @if(isset($expenses) && $expenses->count() > 0)
                                    @foreach($expenses as $expense)
                                        <tr>
                                            <td>Invoice</td>
                                            <td>{!! \App\Helpers\CommonMethods::invoiceFormatID($expense->id) !!}</td>
                                            <td>{!! $expense->person_name !!}</td>
                                            <td>{!! $expense->expense_categories->name !!}</td>
                                            <td>{!! \App\Helpers\CommonMethods::formatDate($expense->created_at) !!}</td>
                                            <td>{!! $expense->status !!}</td>
                                            <td>${!! number_format($expense->grand_total,2) !!}</td>
                                            <td><span class="badge badge-success">paid</span> </td>
                                            <td>
                                                <div class="ml-3">
                                                    <div class="list-icons">
                                                        <div class="list-icons-item dropdown">
                                                            <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-menu7"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">
                                                                <a href="#!" class="dropdown-item view-expense" data-id="{!! $expense->id !!}"><i class="icon-eye"></i> View Detail</a>
                                                                <a href="/download/expense/pdf/{!! $expense->id !!}" class="dropdown-item expense-print" data-id="{!! $expense->id !!}"><i class="icon-pencil"></i> Print</a>

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



        </div>
    </div>



    <div id="add-invoice" class="modal fade">
        <div class="modal-dialog modal-lg" style="width: 70%;max-width: 70%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Invoice</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">


                </div>

            </div>
        </div>
    </div>


    <div id="view-expense" class="modal fade">
        <div class="modal-dialog" style="max-width: 60%; width: 50%">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <h3 class="m-0 mb-1 text-right">Expense's Detail</h3>
                    <h5 class="m-0 mb-1 text-right">Invoice #<span id="invoice-number"></span></h5>
                    <hr class="m-0 mb-3" />
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-borderless">
                                <tr>
                                    <th width="30%" class="text-right">Customer Name</th>
                                    <td width="40%" id="customer-name"></td>
                                    <th  width="20%" class="text-right">Date</th>
                                    <td width="20%" class="invoice-date"></td>

                                </tr>
                                <tr>


                                    <th class="text-right">Address</th>
                                    <td id="customer-address"></td>
                                    <th class="text-right">Email</th>
                                    <td id="customer-email" class="email"></td>
                                </tr>
                                <tr>
                                    <th  class="text-right">Contact</th>
                                    <td id="customer-contact"></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <hr class="m-0 mb-3" />
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-striped" id="items-list">
                                    <thead>
                                    <tr>
                                        <th>Item</th>
                                        <th>Description</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Paid Price</th>
                                    </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>

                        </div>
                    </div>

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


            $("body").on('click','.view-expense',function(){
                $("#view-expense").modal();
                $("#items-list tbody").html('');
                var id = $(this).data('id');
                $.ajax({
                    url:"/view/expense/detail",
                    type:"POST",
                    data:{
                        id:id,

                        '_token':"{!! csrf_token() !!}",

                    },
                    success:function(response){
                        response = $.parseJSON(response);
                        $("#customer-name").text(response.person_name);
                        $("#customer-email").text(response.email);
                        $("#sale-type").text(response.type);
                        $("#customer-address").text(response.billing_address);

                        if(response.expense_items){
                            var str="";

                            $.each(response.expense_items,function (i,v) {
                                str+='<tr>';
                                str+='<td>'+v.item_name+'</td>';
                                str+='<td>'+v.item_description+'</td>';
                                str+='<td>'+v.quantity+'</td>';
                                str+='<td>'+v.price+'</td>';
                                str+='<td>'+v.total_price+'</td>';
                                str+='</tr>';
                            })

                            $("#items-list tbody").html(str);
                        }

                        // $("#view-sale").find(".modal-body").html(response);
                    }
                });
            });

            $("body").on('click','.make-payments',function(){
                var appointment_id = $(this).data('id');
                var patient_id =  $(this).data('patient-id');
                $("#add-invoice").find(".modal-body").html('');
                $("#add-invoice").modal();
                $.ajax({
                    url:"/generate/invoice",
                    type:"POST",
                    data:{
                        appointment_id:appointment_id,
                        patient_id: patient_id,
                        '_token':"{!! csrf_token() !!}",

                    },
                    success:function(response){
                        $("#add-invoice").find(".modal-body").html(response);
                        $("#add-invoice .list").remove();
                    }
                });
            });
        })
    </script>
@endsection