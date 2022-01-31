@extends('layout.app')
@section('page-title') Purchase Order @endsection
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
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Purchase Order</span> - New</h4>

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
                    <a href="/purchase/orders" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Purchase Orders</a>
                    <span class="breadcrumb-item active">New Purchase Order</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>


        </div>
    </div>
    <div class="content">
        <div class="card col-sm-12 col-md-12">

            <div class="card-body">
                <form id="purchase-order-form" action="/save/purchase/order"  autocomplete="off" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="{!! isset($order)?$order->id:""  !!}" />
                    @csrf
                    <div class="card card-body">
                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="manufacturer_id" class="">Manufacturer</label>
                                    <select name="manufacturer_id" id="manufacturer_id" required="" class="form-control">
                                        <option value="">Select Manufacture</option>
                                        @if(isset($manufactures) && $manufactures->count() > 0)
                                            @foreach($manufactures as $manufacture)
                                                <option value="{!! $manufacture->id !!}" @if(isset($order) && $order->manufacturer_id==$manufacture->id) selected @endif>{!! $manufacture->name !!}</option>
                                            @endforeach
                                        @endif
                                    </select>


                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="purchase_date" class="">Purchase Date</label>
                                    <input  name="purchase_date" type="text" value="{!! isset($order)?$order->purchase_date:"" !!}" class="validate form-control"  id="purchase_date" required data-error=".errorTxt1">


                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="cash_type" class="">Cash type</label>
                                    <select name="cash_type" id="cash_type" required="" class="form-control">
                                        <option value="">Select Cash type</option>
                                        <option value="Cash" @if(isset($order) && $order->cash_type=="Cash") selected @endif>Cash</option>
                                        <option value="Bank" @if(isset($order) && $order->cash_type=="Bank") selected @endif>Bank</option>
                                    </select>


                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <label for="purchase_date" class="">Remarks</label>
                                <input type="text" class="form-control" name="remarks" value="{!! isset($order)?$order->remarks:"" !!}" />
                            </div>
                        </div>
                    </div>
                    <div class="card card-body mt-2">
                        <div class="row ">
                            <table class="table table-striped order-list">
                                <thead>
                                <tr>
                                    <th class="text-center" width="20%">Item Information<i class="text-danger">*</i></th>
                                    <th class="text-center">Description</th>
                                    <th class="text-center">Expiry  date <i class="text-danger">*</i></th>

                                    <th class="text-center">Quantity <i class="text-danger">*</i></th>
                                    <th class="text-center">Manufacturer  Price<i class="text-danger">*</i></th>
                                    <th class="text-center">Discount</th>
                                    <th class="text-center">Total</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($order) && isset($order->order_items) && $order->order_items->count() > 0)
                                    @foreach($order->order_items as $item)
                                        <tr>
                                            <td>
                                                <input  name="product_name[]" type="text" class="validate form-control product-name " value="{!! $item->item_name !!}"  required data-error=".errorTxt1">
                                            </td>
                                            <td>
                                                <input  name="product_description[]" type="text" class="validate form-control " value="{!! $item->product_description !!}"  required data-error=".errorTxt1">
                                            </td>
                                            <td>
                                                <input  name="expiry_date[]" type="text" class="validate form-control date" value="{!! $item->expiry_date !!}"  required data-error=".errorTxt1">
                                            </td>

                                            <td>
                                                <input  name="quantity[]" type="number" class="validate form-control quantity" value="{!! $item->quantity !!}" required data-error=".errorTxt1">
                                            </td>

                                            <td>
                                                <input  name="price[]" type="number" class="validate form-control price" value="{!! ($item->price) !!}" required data-error=".errorTxt1">
                                            </td>
                                            <td>
                                                <input  name="discount[]" type="number" class="validate form-control discount" value="{!! ($item->discount) !!}" required data-error=".errorTxt1">
                                            </td>

                                            <td>
                                                <input  name="total[]" type="text" class="validate form-control total" value="{!! ($item->total_price) !!}"  readonly data-error=".errorTxt1">
                                            </td>
                                            <td>
                                                <button class="btn btn-danger btn-sm delete-row">Delete </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                <tr class="first-row">
                                    <td>
                                        <input  name="product_name[]" type="text" class="validate form-control product-name"  required data-error=".errorTxt1">
                                    </td>
                                    <td>
                                        <input  name="product_description[]" type="text" class="validate form-control"  required data-error=".errorTxt1">
                                    </td>
                                    <td>
                                        <input  name="expiry_date[]" type="text" class="validate form-control date"  required data-error=".errorTxt1">
                                    </td>

                                    <td>
                                        <input  name="quantity[]" type="number" class="validate form-control quantity"  required data-error=".errorTxt1">
                                    </td>

                                    <td>
                                        <input  name="price[]" type="number" class="validate form-control price"  required data-error=".errorTxt1">
                                    </td>
                                    <td>
                                        <input  name="discount[]" type="number" class="validate form-control discount"  required data-error=".errorTxt1">
                                    </td>
                                    <td>
                                        <input  name="total[]" type="number" class="validate form-control total"   readonly data-error=".errorTxt1">
                                    </td>
                                    <td>
                                        <button class="btn btn-danger btn-sm delete-row">Delete </button>
                                    </td>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="2">
                                        <button type="button" id="add_invoice_item" class="btn btn-danger">Add New Item</button>
                                    </td>
                                    <td style="text-align:right;" colspan="2"><b>Grand Total:</b></td>
                                    <td class="text-right">
                                        <input type="text" id="grandTotal" class="text-right form-control" name="grand_total_price" value="{!! isset($order)?($order->total_price):'0.00' !!}"  readonly="readonly" autocomplete="off">
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>



                </form>
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-success success-message mt-2"></div>
                        <div class="alert alert-danger error-message mt-2"></div>
                    </div>
                </div>

            </div>
            <div class="card-footer col-md-12">
                <a href="#" class="btn bg-danger save-order">Save Order</a>
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

        $(".save-order").click(function(){
            if($("#purchase-order-form").valid()){
                
                $("#purchase-order-form").ajaxForm(function (response) {
                    response = $.parseJSON(response);

                    if(response.type=="success"){
                        $(".success-message").html(response.message);
                        $(".success-message").show();

                        setTimeout(function () {
                            window.location = "/purchase/orders";
                        },2500);
                    }
                }).submit();

            }
        });


        $("body").on("keyup",".quantity",function (e) {
            var _quantity = $(this).val();
            var _price = $(this).parents('tr').find('.price').val();

            var _total =  $(this).parents('tr').find('.total');
            if(_price!=""){
                _total.val((parseInt(_quantity) * parseFloat(_price)).toFixed(2));

                var sum = $('.total').toArray().reduce(function(sum,element) {
                    if(isNaN(sum)) sum = 0;
                    return sum + parseFloat(element.value);
                }, 0);

                $("#grandTotal").val(sum.toFixed(2));
            }

        });

        $("body").on("keyup",".price",function (e) {
            var _price = $(this).val();
            var _quantity = $(this).parents('tr').find('.quantity').val();

            var _total =  $(this).parents('tr').find('.total');
            if(_price!=""){
                _total.val((parseInt(_quantity) * parseFloat(_price)).toFixed(2));
                var sum = $('.total').toArray().reduce(function(sum,element) {
                    if(element.value!=""){
                        if(isNaN(sum)) sum = 0;
                        return sum + parseFloat(element.value);
                    }

                }, 0);
                $("#grandTotal").val(sum.toFixed(2));
            }

        });


        var options = {

            url: function(phrase) {
                return "/get/products/json";
            },

            getValue: function(element) {
                return element.value;
            },
            list: {

                onClickEvent: function() {

                }
            },

            ajaxSettings: {
                dataType: "json",
                method: "GET",
                data: {
                    dataType: "json"
                }
            },

            preparePostData: function(data) {
                console.log(data);
                data.phrase = $(".product-name").val();
                return data;
            },

            requestDelay: 400
        };

        $(".product-name").easyAutocomplete(options);
        $("#purchase_date").datepicker({
            dateFormat: 'yy-mm-dd',
            minDate: "today"
        });

        $(".date").datepicker({
            dateFormat: 'yy-mm-dd',
            minDate: "today"
        });

        $("#add_invoice_item").click(function(e){
            var first_row = $(".first-row").clone();

            first_row.find('input').val('');
            first_row.find('.easy-autocomplete').removeClass('easy-autocomplete');
            first_row.find('.product-name').removeAttr('id');
            first_row.find(".date").removeClass('hasDatepicker');
            first_row.find('.date').removeAttr('id');
            first_row.find('.easy-autocomplete-container').remove();
            $(".order-list> tbody").append(first_row);
            first_row.removeClass('first-row');
            var options = {

                url: function(phrase) {
                    return "/get/products/json";
                },

                getValue: function(element) {
                    return element.value;
                },
                list: {

                    onClickEvent: function() {

                    }
                },

                ajaxSettings: {
                    dataType: "json",
                    method: "GET",
                    data: {
                        dataType: "json"
                    }
                },

                preparePostData: function(data) {
                    data.phrase = first_row.find(".product-name").val();
                    return data;
                },

                requestDelay: 400
            };
            first_row.find(".product-name").easyAutocomplete(options);

            first_row.find(".date").datepicker({
                dateFormat: 'dd.mm.yy',
                minDate: "today"
            });
            e.preventDefault();
        });

        $("body").on("click",".delete-row",function (e) {
            var _tr_length = $(".order-list >tbody tr").length;
            if(_tr_length==1){
                alert('There only one row you can\'t delete.');
                $(".order-list >tbody tr").addClass('first-row');
                return false;
            }
            $(this).parents('tr').remove();

            e.preventDefault();
        });
    })
</script>
@endsection