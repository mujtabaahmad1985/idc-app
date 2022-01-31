@extends('layout.app')
@section('page-title') Account Management - Expenses @endsection
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
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Sale</span> - New</h4>

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
                    <a href="/sales" class="breadcrumb-item"><i class="icon-barcode2 mr-2"></i> Sales</a>
                    <span class="breadcrumb-item active">New Sale</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>


        </div>
    </div>
    <div class="content">
        <div class="card col-sm-12 col-md-12">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">New Sale Transactions</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>


                    </div>
                </div>
            </div>


            {{--<div class="row">
                <div class="col-sm-12 text-right float-sm-right"><button class="btn btn-danger addroom">Add New Consent Form</button> </div>
            </div>--}}

            <div class="card-body">
                <form id="sale-form" action="/save/sale" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="person_id" id="person_id" />
                    <input type="hidden" name="type" value="{!! request()->get('type') !!}" />
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="row">
                                <div class="col-sm-12 col-xl-12">

                                    <div class="form-group">
                                        <label>Customer/Patient</label>
                                        <select class="form-control" name="person_name"></select>
                                    </div>

                                </div>
                            </div>
                            <div class="row">

                                <div class="col-sm-12 col-xl-12">

                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" />
                                        <a href="#!" class="text-danger">CC/BCC</a>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 col-xl-12">

                                    <div class="form-group">
                                        <label>Billing Addres</label>
                                        <textarea class="form-control" name="billing_address"></textarea>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-xl-6">
                                    <div class="form-group">
                                        <label>Invoice date</label>
                                        <input type="text" n class="form-control" value="{!! \App\Helpers\CommonMethods::formatDate() !!}" readonly="" />
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xl-6">
                                    <div class="form-group">
                                        <label>Due date</label>
                                        <input type="text" name="due_date" class="form-control date" value=""  />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <div class="row">
                                <table class="table table-striped order-list">
                                    <thead>
                                    <tr>
                                        <th class="text-center" width="20%">Product/Service<i class="text-danger">*</i></th>

                                        <th class="text-center">Description <i class="text-danger">*</i></th>

                                        <th class="text-center">Quantity <i class="text-danger">*</i></th>
                                        <th class="text-center">Price<i class="text-danger">*</i></th>
                                        <th class="text-center">Total</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="first-row">
                                        <td>
                                            <input  name="product_name[]" type="text" class="validate form-control product-name"  required data-error=".errorTxt1">
                                        </td>
                                        <td>
                                            <input  name="description[]" type="text" class="validate form-control expiry_date"  required data-error=".errorTxt1">
                                        </td>

                                        <td>
                                            <input  name="quantity[]" type="number" class="validate form-control quantity"  required data-error=".errorTxt1">
                                        </td>

                                        <td>
                                            <input  name="price[]" type="text" class="validate form-control price"  required data-error=".errorTxt1">
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
                                            <input type="text" id="grandTotal" class="text-right form-control" name="grand_total_price" value="0.00" readonly="readonly" autocomplete="off">
                                        </td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </form>


                <div class="row">
                    <div class="col-sm-12 text-right"><button class="btn btn-danger save-transaction">Save Transaction</button>
                        <button class="btn btn-danger print-pdf">Print as PDF</button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-success success-message mt-2"></div>
                        <div class="alert alert-danger error-message mt-2"></div>
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



            $("body").on("click",".save-transaction",function (e) {
                $("#sale-form").validate({ignore: [],

                });
                
                $("#sale-form").ajaxForm(function (response) {
                    response = $.parseJSON(response);

                    if(response.type=="success"){
                        $(".success-message").html(response.message);
                        $(".success-message").show();

                        setTimeout(function () {
                            window.location = "/sales";
                        },2500);
                    }
                }).submit();

                e.preventDefault();
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
                        if(isNaN(sum)) sum = 0;
                        return sum + parseFloat(element.value);
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
                    data.phrase = $(".product-name").val();
                    return data;
                },

                requestDelay: 400
            };

            $(".product-name").easyAutocomplete(options);

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

            $('select[name=person_name]').select2({
            placeholder: "Enter Name ",

                allowClear: true,
                tags: true,
                minimumInputLength: 3,

                templateResult:patient_result_template,

                dropdownAutoWidth : 'true',

                ajax: {

                url: function (params) {

                    return '/patients/get_all_patients/' + params.term;

                },

                dataType: 'json',

                    data: function (params) {

                    var query = {

                        search: params.term,

                        type: 'public'

                    }



                    // Query parameters will be ?search=[term]&type=public

                    return query;

                }

            }

        }).on('change',function () {
                var id = $(this).val();

                if(id > 0){
                        $.ajax({
                            url:"/get/patient/info/"+id,
                            success:function (response) {
                                response = $.parseJSON(response);
                               $("input[name=email]").val(response.patient_email);

                            }
                        });
                }
            });
        })
        function patient_result_template(patient){



            if(patient.id > 0)

                var $patient = $('<div class="patient-container">'+



                    '<div class="patient-info">'+

                    '<h5>'+patient.text+'</h5>'+

                    '<p class="inner-text"><i class="icon-key"></i> '+patient.patient_unique_id+'  '+

                    //'<i class="icon-phone2" style="margin-left: 20px"></i> '+patient.patient_phone+'</p>'+

                    '</div>'+

                    '</div>');

            else

                var $patient = patient.text;

            return $patient;

        }
    </script>
@endsection