@extends('layout.app')
@section('page-title') Products - New Product @endsection
@section('css')
    {!! Html::style(url('/').'/bootstrap/js/plugins/easyautocomplete/easy-autocomplete.css') !!}
@endsection


@section('content')

    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Products</span> - New Product</h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none">
                <div class="d-flex justify-content-center">
                    <a href="#" class="btn btn-link btn-float text-body"><i class="icon-bars-alt text-primary"></i><span>Dashboard</span></a>
                    <a href="/pharmacy" class="btn btn-link btn-float text-body"><i class="icon-calculator text-primary"></i> <span>Products</span></a>
                </div>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="/dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Dashboards</a>
                    <a href="/pharmacy" class="breadcrumb-item">Products</a>
                    <span class="breadcrumb-item active">New Product</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>


        </div>
    </div>

    <div class="content container">
        <form class="" id="item-form" method="post" action="/save/item" enctype="multipart/form-data">
        <div class="card">

            <div class="card-header"><h4 class="card-title">Product Basic</h4> </div>

            <div class="card-body">

                    {{ csrf_field() }}
                    <input type="hidden" name="product_id" id="view_product_id" value="{!! isset($product)?$product->id:"" !!}" />
                    <input type="hidden" name="product_purchase_id" id="product_purchase_id" />
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <label for="product_title" class="">Name</label>
                                    <input  name="product_title" type="text" class="validate form-control"  id="product-remote" value="{!! isset($product)?$product->product_title:"" !!}" required data-error=".errorTxt1">


                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-5">
                                    <label for="brand_name" class="">Brand Name</label>
                                    <select name="brand_name" id="select_brand_name" required="" class="form-control">
                                        <option value="" selected disabled="">Select Brand</option>
                                        @if(isset($brands) && $brands->count() > 0)
                                            @foreach($brands as $brand)
                                                <option value="{!! $brand->id !!}"  @if(isset($product) && $product->brand_id==  $brand->id) selected @endif>{!! $brand->brand_name !!}</option>
                                            @endforeach
                                        @endif
                                    </select>



                                <div class="col-sm-12 text-right">
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item"><a href="#!" class="text-danger font-size-xs mt-1 add-new-brand"><i class="icon-plus-circle2 font-size-sm"></i> New Brand</a></li>
                                        <li class="list-inline-item"><a href="#!" class="text-danger font-size-xs mt-1 view-brands-list"><i class="icon-list2 font-size-xs"></i> Brands List</a></li>
                                    </ul>

                                </div>
                                </div>

                                <div class="form-group col-sm-12 col-md-7">
                                    <label>Product Serial</label>
                                    <input type="text" name="product_serial" class="form-control" value="{!! isset($product)?$product->product_serial:"" !!}" required />
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>

            <div class="card">
                <div class="card-header"><h4 class="card-title">Category</h4></div>
                <div class="card-body">
                    <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="category_select_list" class="">Category</label>
                        <select name="category" required="" id="category_select_list" class="form-control">
                            <option value="" selected disabled="">Select Category</option>
                            @if(isset($categories) && $categories->count() > 0)
                                @foreach($categories as $category)
                                    <option value="{!! $category->id !!}" @if(isset($product) && $product->category_id==  $category->id) selected @endif>{!! $category->name !!}</option>
                                @endforeach
                            @endif
                        </select>
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item"><a href="#!" class="text-danger font-size-xs mt-1 add-new-category"><i class="icon-plus-circle2 font-size-sm"></i> New  Category</a></li>
                            <li class="list-inline-item"><a href="#!" class="text-danger font-size-xs mt-1 categories-list"><i class="icon-list2 font-size-xs"></i>  Categories List</a></li>
                        </ul>


                    </div>


                    <div class="form-group col-sm-6">
                        <label for="category" class="">Sub Category</label>
                        <select name="sub_category" required=""  id="sub_category_select_list" class="form-control">
                            <option value="" selected disabled="">Select Sub Category</option>
                        </select>
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item"><a href="#!" class="text-danger font-size-xs mt-1 add-new-subcategory"><i class="icon-plus-circle2 font-size-sm"></i> New Sub Category</a></li>
                            <li class="list-inline-item"><a href="#!" class="text-danger font-size-xs mt-1"><i class="icon-list2 font-size-xs"></i> Sub Categories List</a></li>
                        </ul>

                    </div>

                </div>
                </div>
            </div>


@if(!isset($product))
            <div class="card">
                <div class="card-header"><h4 class="card-title">Stock information</h4></div>
                <div class="card-body">


                    <div class="row">
                        <div class="col-sm-12 form-group col-md-4">
                            <label>Previous Stock Balance</label>
                            <input type="text" class="form-control" name="previous_stock_balance"  />
                        </div>
                        <div class="col-sm-12 form-group col-md-4">
                            <label>Total Stock <em>( previous + new order)</em></label>
                            <input type="text" class="form-control" name="total_stock"  />
                        </div>
                        <div class="col-sm-12 form-group col-md-4">
                            <label>Stock Location </label>
                            <input type="text" class="form-control" name="stock_location"  />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label>Packing Description (NOS)</label>
                            <textarea class="form-control" name="packing_description"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header"><h4 class="card-title">Products Date , Quantity & Prices</h4></div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="inv_date" class="">Invt. Date</label>
                            <input id="inv_date" name="inv_date" type="text" class="validate  form-control"  required data-error=".errorTxt1">


                        </div>

                        <div class="form-group col-sm-6">
                            <label for="expiry_date" class="">Expiry Date</label>
                            <input id="expiry_date" name="expiry_date" type="text"  class="validate  form-control"  required data-error=".errorTxt1">


                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="price_unit" class="">Price</label>
                            <input id="price_unit" name="price_unit" type="number" min="0" class="validate  form-control price-calculate"  required data-error=".errorTxt1">


                        </div>
                        <div class="form-group col-sm-6">
                            <label for="discount" class="">Discount </label>
                            <input id="discount" name="discount"  value="0"  type="number" min="0" class="validate  form-control  price-calculate"   data-error=".errorTxt1">


                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="total_price_with_gst" class="">Total Price <span class="text-muted font-size-xs font-italic">(include 7% GST)</span></label>
                            <input id="total_price_with_gst" name="total_price_with_gst" readonly type="number" min="0" class="validate  form-control"   data-error=".errorTxt1">


                        </div>

                        <div class="form-group col-sm-6">
                            <label for="total_price_with_gst_markup" class="">Total Price <span class="text-muted font-size-xs font-italic">(include 7% GST, Discount, Markup)</span></label>
                            <input id="total_price_with_gst_markup" name="total_price_with_gst_markup" readonly type="number" min="0" class="validate  form-control"   data-error=".errorTxt1">


                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="singapre_price_per_unit" class="">Singpore Price / Unit SGD </label>
                            <input id="singapre_price_per_unit" name="singapre_price_per_unit"  type="number" min="0" class="validate  form-control"   data-error=".errorTxt1">


                        </div>

                        <div class="form-group col-sm-6">
                            <label for="mm_price" class="">MM Price / UNIT SGD </label>
                            <input id="mm_price" name="mm_price"  type="number" min="0" class="validate  form-control"   data-error=".errorTxt1">


                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-2">
                            <label for="quantity" class="">Quantity FOC</label>
                            <input id="quantity" name="quantity"  type="number" value="1" min="1" class="validate  form-control"  required data-error=".errorTxt1">


                        </div>

                        <div class="form-group col-sm-2">
                            <label for="outstanding_quantity" class="">Outstanding Quantity </label>
                            <input id="outstanding_quantity" name="outstanding_quantity"  type="text"  class="validate  form-control"  required data-error=".errorTxt1">


                        </div>

                        <div class="form-group col-sm-2">
                            <label for="sgd_price_unit" class="">Shipping Cost</label>
                            <input id="shipping_cost" name="shipping_cost" type="number" min="0" value="0" class="validate  form-control  price-calculate"  required data-error=".errorTxt1">


                        </div>

                        <div class="form-group col-sm-3">
                            <label for="commission" class="">Commission </label>
                            <input id="commission" name="commission"  value="0"  type="number" min="0" class="validate  form-control"   data-error=".errorTxt1">


                        </div>
                        <div class="form-group col-sm-3">
                            <label for="quantity_signal" class="">Quantity Signal </label>
                            <input id="quantity_signal" name="quantity_signal"  value="3"  type="number" required min="3" class="validate  form-control"   data-error=".errorTxt1">


                        </div>
                    </div>
                </div>
            </div>


            <div class="card">
                <div class="card-header"><h4 class="card-title">Supplier Information</h4></div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-sm-8">
                            <label>Supplier Name</label>
                            <input type="text" name="supplier_name" required class="form-control" />
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Supplier Contact</label>
                            <input type="text" name="supplier_contact" class="form-control" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 form-group col-md-4">
                            <label>Supplier Invoice#</label>
                            <input type="text" class="form-control" required name="supplier_invoice"  />
                        </div>
                        <div class="col-sm-12 form-group col-md-4">
                            <label>Product Code from supplier</label>
                            <input type="text" class="form-control" name="product_code_from_supplier"  />
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header"><h4 class="card-title">Product Usage for</h4></div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label for="used_for" class="">Used For </label>
                            <textarea id="user_for" name="used_for" class="form-control"></textarea>



                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header"><h4 class="card-title">Payments</h4></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-4">
                            <label>Payment Date</label>
                            <input type="text" id="payment_date" name="payment_date" class="form-control" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="payment_mode" class="">Payment Mode </label>
                           <select name="payment_mode" class="form-control" required>
                               <option value="">Payment Mode</option>
                               <option value="cash">Cash</option>
                               <option value="cheque">Cheque</option>
                               <option value="giro">Giro</option>
                           </select>



                        </div>
                        <div class="form-group col-sm-8">
                            <label>Reciept / Cheque / Transaction No.</label>
                            <input type="text" name="payment_paid_transaction" required class="form-control" />
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <div class="card card-body">
                <div class="row">
                    <div class="col-sm-2">
                        <a href="#!" class="btn btn-danger save-item"><i class="icon-floppy-disk mr-2"></i> Save Item</a>
                    </div>
                    <div class="col-sm-10">
                        <div class="card alert green success-message bg-green" style="display: none;">
                            <div class="card-content white-text">
                                <p>d</p>
                            </div>
                        </div>
                        <div class="card alert red error-message bg-danger"  style="display: none;">
                            <div class="card-content white-text">
                                <p>d</p>
                            </div>
                        </div>
                    </div>
                </div>


            </div>













                </form>
            </div>
        </div>
    </div>

    <div id="view-brands" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Brands</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">

                </div>


            </div>
        </div>
    </div>

    <div id="view-categories" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Categories</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">

                </div>


            </div>
        </div>
    </div>

    <div id="add-new-brand" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Brand</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form class="" id="brand-form" method="post" action="/save/brand" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <input type="hidden" name="id" id="brand_id" />
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="brand_name" class="">Brand Name</label>
                                <input id="brand_name" name="brand_name" type="text" class="validate form-control"  required data-error=".errorTxt1">


                            </div>
                        </div>
                        <div class="row">
                            <div class="card green success-message bg-green" style="display: none;">
                                <div class="card-content white-text">
                                    <p></p>
                                </div>
                            </div>
                            <div class="card red error-message bg-red"  style="display: none;">
                                <div class="card-content white-text">
                                    <p></p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">

                    <a href="#!" class="btn btn-danger save-brand">Save Brand</a>
                </div>

            </div>
        </div>
    </div>

    <div id="edit-category-modal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Category</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form class="" id="edit-category-form" method="post" action="/save/category" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <input type="hidden" name="id" id="edit_category_id" />
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="brand_name" class="">Category Name</label>
                                <input id="edit-category-name" name="category_name" type="text" class="validate form-control"  required data-error=".errorTxt1">


                            </div>
                        </div>
                        <div class="row">
                            <div class="card green success-message bg-green" style="display: none;">
                                <div class="card-content white-text">
                                    <p></p>
                                </div>
                            </div>
                            <div class="card red error-message bg-red"  style="display: none;">
                                <div class="card-content white-text">
                                    <p></p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">

                    <a href="#!" class="btn btn-danger update-category">Update Category</a>
                </div>

            </div>
        </div>
    </div>

    <div id="add-new-category" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Categories</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">

                    <ul class="nav nav-tabs nav-tabs-highlight">
                        <li class="nav-item"><a href="#category-tab" class="nav-link active show" item="category" data-toggle="tab">Category</a></li>
                        <li class="nav-item"><a href="#subcategory-tab" class="nav-link" item="subcategory" data-toggle="tab">Sub Category</a></li>

                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade  active show" id="category-tab">

                            <form class="" id="category-form" method="post" action="/save/category" enctype="multipart/form-data">
                                {!! csrf_field() !!}
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                        <label for="category_name" class="">Category</label>
                                        <input id="category_name" name="category_name" type="text" class="validate form-control"  required data-error=".errorTxt1">


                                    </div>
                                </div>
                                <div class="row">
                                    <div class="card green success-message bg-green" style="display: none;">
                                        <div class="card-content white-text">
                                            <p></p>
                                        </div>
                                    </div>
                                    <div class="card red error-message bg-red"  style="display: none;">
                                        <div class="card-content white-text">
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-md-12"><a href="#!" class="btn btn-danger save-category">Save Category</a> </div>
                            </div>

                        </div>

                        <div class="tab-pane fade" id="subcategory-tab">
                            <form class="" id="sub-category-form" method="post" action="/save/category" enctype="multipart/form-data">
                                {!! csrf_field() !!}
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                        <label for="category_name" class="">Sub Category</label>
                                        <select name="category_id" id="category_id" required="" class="form-control">
                                            <option value="" selected disabled="">Select Category</option>
                                            @if(isset($categories) && $categories->count() > 0)
                                                @foreach($categories as $category)
                                                    <option value="{!! $category->id !!}">{!! $category->name !!}</option>
                                                @endforeach
                                            @endif
                                        </select>


                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                        <label for="category_name" class="">Sub Category</label>
                                        <input id="category_name" name="category_name" type="text" class="validate form-control"  required data-error=".errorTxt1">


                                    </div>
                                </div>
                                <div class="row">
                                    <div class="card green success-message bg-green" style="display: none;">
                                        <div class="card-content white-text">
                                            <p></p>
                                        </div>
                                    </div>
                                    <div class="card red error-message bg-red"  style="display: none;">
                                        <div class="card-content white-text">
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-md-12"><a href="#!" class="btn btn-danger save-category">Save Category</a> </div>
                            </div>
                        </div>


                    </div>

                </div>


            </div>
        </div>
    </div>
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
            $("form").attr('autocomplete', 'off');
            $("select").select2();
            var options = {

                url: function(phrase) {
                    return "/get/products/json";
                },

                getValue: function(element) {
                    return element.value;
                },
                list: {

                    onClickEvent: function() {
                        var id = $("#product-remote").getSelectedItemData().id;

                        $("#view_product_id").val(id);
                        $.ajax({
                            url:"/get/product/basic/"+id,
                            success:function(response2){
                                response2 = $.parseJSON(response2);

                                if(response2.brand_id!="")
                                    $("#select_brand_name").val(response2.brand_id).trigger('change');

//alert(response.price_unit);


                                if(response2.category_id){
                                    $("#category_select_list").val(response2.category_id).trigger('change');
                                    setTimeout(function(){
                                        $("#sub_category_select_list").val(response2.sub_category_id).trigger('change');

                                    },1000);

                                }
                            }
                        });
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
                    data.phrase = $("#product-remote").val();
                    return data;
                },

                requestDelay: 400
            };

            $("#product-remote").easyAutocomplete(options);

            $("#inv_date").datepicker({
                dateFormat: 'dd.mm.yy',
                maxDate: "today"
            });

            $("#payment_date").datepicker({
                dateFormat: 'dd.mm.yy',
                maxDate: "today"
            });

            $("#expiry_date").datepicker({
                dateFormat: 'dd.mm.yy',
                minDate: "today"
            });

            $("#expiry_from").datepicker({
                dateFormat: 'dd.mm.yy',

            });

            $("#expiry_to").datepicker({
                dateFormat: 'dd.mm.yy',

            });


            $("#purchase_from").datepicker({
                dateFormat: 'dd.mm.yy',
                maxDate: "today"
            });

            $("#purchase_to").datepicker({
                dateFormat: 'dd.mm.yy',
                maxDate: "today"
            });

            $(".price-calculate").keyup(function () {
                var seven_percent = 0.07;
                var price = parseFloat($("#price_unit").val());
                var discount = parseFloat($("#discount").val());
                var shipping_cost = parseFloat($("#shipping_cost").val());
                var total_price = 0.0;
                var price_seven_percent = 0.0;
                var price_seven_percent_discount = 0.0;
                if(price!=""){
                    price_seven_percent = price + (price*seven_percent);
                    price_seven_percent_discount = price_seven_percent-discount;
                    $("#total_price_with_gst").val(price_seven_percent.toFixed(2));
                    $("#total_price_with_gst_markup").val(price_seven_percent_discount.toFixed(2));
                }

            });

            $(".add-new-category").click(function(){
                $("#add-new-category .nav-link").removeClass('active');
                $("#add-new-category .nav-link").removeClass('show');
                $("#add-new-category .tab-pane").removeClass('show');
                $("#add-new-category .tab-pane").removeClass('active');
                $("a[item=category]").addClass('active show');
                $("#category-tab").addClass('active show');
                $("#add-new-category").modal();
            });

            $(".add-new-subcategory").click(function(){
                $("#add-new-category .nav-link").removeClass('active');
                $("#add-new-category .nav-link").removeClass('show');
                $("#add-new-category .tab-pane").removeClass('show');
                $("#add-new-category .tab-pane").removeClass('active');

                $("a[item=subcategory]").addClass('active show');
                $("#subcategory-tab").addClass('active show');
                $("#add-new-category").modal();
            });
            $("body").on('click','.edit',function(){
                var id = $(this).data('id');
                var name = $(this).parents('tr').find('.brand-name').text();
                var _this = $(this);
                $("#add-new-brand").modal();
                $("#brand_id").val(id)
                $("#brand_name").val(name);
            });

            $("body").on('click','.category-edit',function(){
                var id = $(this).data('id');
                var name = $(this).parent().parent().parent().parent().parent().parent().find('.category-name').first().text();
                var _this = $(this);
                $("#edit-category-modal").modal();
                $("#edit_category_id").val(id)
                $("#edit-category-name").val($.trim(name));
            });

            $(".add-new-brand").click(function(){
                $("#brand-form").resetForm();
                $("#add-new-brand").modal();
            });

            $(".view-brands-list").click(function(){
                $("#view-brands").modal();

                $.ajax({
                    url:"/view/brands",
                    success:function(response){
                        $("#view-brands  .modal-body").html(response);

                        $(".brand-list-table").DataTable({
                            "paging": true, "info":     false,"searching": false,



                        });
                    }
                });
            });


            $(".categories-list").click(function(){
                $("#view-categories").modal();

                $.ajax({
                    url:"/view/categories",
                    success:function(response){
                        $("#view-categories  .modal-body").html(response);

                        $(".category-list-table").DataTable({
                            "paging": true, "info":     false,"searching": false,



                        });
                    }
                });
            });


            $(".save-brand").click(function(){
                if($("#brand-form").valid()){
                    $("#brand-form").ajaxForm(function(response){
                        response = $.parseJSON(response);
                        if(response.type=='success' ||response.type=='update' ){
                            if(response.type=='success'){
                                var newOption = new Option(response.name, response.id, true, true);
                                // Append it to the select
                                $('#select_brand_name').append(newOption).trigger('change');
                            }


                            $("#add-new-brand").find('.success-message').html(response.message);
                            $("#add-new-brand").find('.success-message').show();

                            setTimeout(function(){
                                $("#add-new-brand").modal('hide');
                                $("#add-new-brand").find('.success-message').hide();
                                if(response.type=='update'){
                                    $.ajax({
                                        url:"/view/brands",
                                        success:function(response){
                                            $("#view-brands  .modal-body").html(response);

                                            $(".brand-list-table").DataTable({
                                                "paging": true, "info":     false,"searching": false,



                                            });
                                        }
                                    });
                                }

                            },2000);

                        }
                    }).submit();
                }
            });
            $(".update-category").click(function(){
                var _this = $(this);
                var _form = $("#edit-category-form");

                if(_form.valid()){
                    _form.ajaxForm(function(response){
                        response = $.parseJSON(response);
                        if(response.type=='update'){
                            $.ajax({
                                url:"/view/categories",
                                success:function(response){
                                    $("#view-categories  .modal-body").html(response);

                                    $(".category-list-table").DataTable({
                                        "paging": true, "info":     false,"searching": false,



                                    });
                                }
                            });
                            $(_form).find('.success-message').html(response.message);
                            $(_form).find('.success-message').show();

                            setTimeout(function(){
                                $("#edit-category-modal").modal('hide');
                                $("#edit-category-modal").find('.success-message').hide();
                            },2000);

                        }
                    }).submit();
                }
            });

            $(".save-category").click(function(){
                var _this = $(this);
                var _form = $(this).parents('.tab-pane.active').find('form')

                if(_form.valid()){
                    _form.ajaxForm(function(response){
                        response = $.parseJSON(response);
                        if(response.type=='success'){
                            var newOption = new Option(response.name, response.id, true, true);
                            // Append it to the select
                            if(_form.attr('id')=="category-form")
                                $('#category_select_list').append(newOption).trigger('change');
                            $('#category_id').append(newOption);
                            $(_form).find('.success-message').html(response.message);
                            $(_form).find('.success-message').show();

                            setTimeout(function(){
                                $("#add-new-category").modal('hide');
                                $("#add-new-category").find('.success-message').hide();
                            },2000);

                        }
                    }).submit();
                }
            });

            $("#category_select_list").select2().on('change',function () {
                $('#sub_category_select_list').empty().trigger('change');
                var newOption = new Option('Select Sub-category', 0, true, true);
                $('#sub_category_select_list').append(newOption);
                $.ajax({
                    url:"/get/subcategories/"+$(this).val(),
                    success:function(response){
                        if(response){
                            response = $.parseJSON(response);

                            $.each(response,function(i,v){
                                var newOption = new Option(v.name, v.id, true, true);
                                $('#sub_category_select_list').append(newOption);
                            });
                        }

                    }
                });
            });



            $(".save-item").click(function(){
                if($("#item-form").valid()){
                    $("#item-form").ajaxForm(function (response) {
                        response = $.parseJSON(response);
                        if(response.type=='success' || response.type=='update'){

                            $("#item-form").find('.success-message').html(response.message);
                            $("#item-form").find('.success-message').show();

                            setTimeout(function(){
                                window.location = "/pharmacy"
                            },2000);

                        }
                    }).submit();
                }
            });
        })



    </script>

@endsection