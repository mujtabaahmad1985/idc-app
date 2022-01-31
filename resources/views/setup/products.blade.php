@extends('layout.app')
@section('page-title') Inventory Management @endsection
@section('css')

@endsection

@section('content')
    <div class="content">
        <div class="card col-sm-12 col-md-12">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Products</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>


                    </div>
                </div>
            </div>

            <div class="card-body">
                {{--<div class="row">
                    <div class="col-sm-12 text-right float-sm-right"><button class="btn btn-danger addroom">Add New Consent Form</button> </div>
                </div>--}}
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-striped product-list-table">
                            <thead>
                            <tr>
                                <th width="50px"><div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="all"  >
                                        <label class="custom-control-label" for="all"></label>
                                    </div></th>
                                <th>Name</th>
                                <th>Inv Date</th>
                                <th>Expiry Date</th>
                                <th>Brand Name</th>
                                <th>Category</th>
                                <th>Price SGD</th>
                                <th>Total Price (SGD) ($+7%GST)</th>
                                <th>Commission</th>

                                <th class="text-right">Actions</th>
                            </tr>
                            </thead>

                            <tbody>
                                    @if(isset($products) && $products->count() > 0)
                                        @foreach($products as $product)
                                            <tr>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="product{!! $product->id !!}"  >
                                                        <label class="custom-control-label" for="product{!! $product->id !!}"></label>
                                                    </div>
                                                </td>
                                                <td>{!! $product->product_title !!}</td>
                                                <td>@if(!empty($product->inv_date) && $product->inv_date!='N/A'){!! date('d.m.Y',strtotime($product->inv_date)) !!} @endif</td>
                                                <td>@if(!empty($product->expiry_date) && $product->expiry_date!='N/A'){!! date('d.m.Y',strtotime($product->expiry_date)) !!} @endif</td>
                                                <td>{!! $product->brand_name !!}</td>
                                                <td>{!! $product->category !!}</td>
                                                <td>{!! $product->price_unit !!}</td>
                                                <td>{!! $product->total_price_7_percent !!}</td>
                                                <td>{!! $product->commission !!}</td>
                                                <td></td>


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

    <div id="add-new-product" class="modal fade">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Medication</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form class="" id="user-form" method="post" action="/save/medication" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <label for="product_title" class="">Name</label>
                                    <input id="product_title" name="product_title" type="text" class="validate form-control"  required data-error=".errorTxt1">


                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <label for="brand_name" class="">Brand Name</label>
                                    <select name="brand_name" id="select_brand_name" required="" class="form-control">
                                        <option value="" selected disabled="">Select Brand</option>
                                        @if(isset($brands) && $brands->count() > 0)
                                            @foreach($brands as $brand)
                                                <option value="{!! $brand->id !!}">{!! $brand->brand_name !!}</option>
                                            @endforeach
                                        @endif
                                    </select>


                                </div>
                                <div class="col-sm-12 text-right">
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item"><a href="#!" class="text-danger font-size-xs mt-1 add-new-brand"><i class="icon-plus-circle2 font-size-sm"></i> New Brand</a></li>
                                        <li class="list-inline-item"><a href="#!" class="text-danger font-size-xs mt-1 view-brands-list"><i class="icon-list2 font-size-xs"></i> Brands List</a></li>
                                    </ul>

                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="first_name" class="">Category</label>
                                    <select name="category" required="" class="form-control">
                                        <option value="" selected disabled="">Select Category</option>
                                        @if(isset($categories) && $categories->count() > 0)
                                            @foreach($categories as $category)
                                                <option value="{!! $category->id !!}">{!! $category->name !!}</option>
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
                                    <select name="category" required="" class="form-control">
                                        <option value="" selected disabled="">Select Sub Category</option>
                                    </select>
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item"><a href="#!" class="text-danger font-size-xs mt-1 add-new-subcategory"><i class="icon-plus-circle2 font-size-sm"></i> New Sub Category</a></li>
                                        <li class="list-inline-item"><a href="#!" class="text-danger font-size-xs mt-1"><i class="icon-list2 font-size-xs"></i> Sub Categories List</a></li>
                                    </ul>

                                </div>

                            </div>

                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="inv_date" class="">Invt. Date</label>
                                    <input id="inv_date" name="inv_date" type="text" class="validate date form-control"  required data-error=".errorTxt1">


                                </div>

                                <div class="form-group col-sm-6">
                                    <label for="expiry_date" class="">Expiry Date</label>
                                    <input id="expiry_date" name="expiry_date" type="text" class="validate date form-control"  required data-error=".errorTxt1">


                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="price_unit" class="">Price</label>
                                    <input id="price_unit" name="price_unit" type="number" min="0" class="validate date form-control"  required data-error=".errorTxt1">


                                </div>

                                <div class="form-group col-sm-6">
                                    <label for="sgd_price_unit" class="">Singapore Price</label>
                                    <input id="sgd_price_unit" name="sgd_price_unit" readonly type="number" min="0" class="validate date form-control"  required data-error=".errorTxt1">


                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="total_price_with_gst" class="">Total Price <span class="text-muted font-size-xs font-italic">(include 7% GST)</span></label>
                                    <input id="total_price_with_gst" name="total_price_with_gst" readonly type="number" min="0" class="validate date form-control"   data-error=".errorTxt1">


                                </div>

                                <div class="form-group col-sm-6">
                                    <label for="total_price_with_gst_markup" class="">Total Price <span class="text-muted font-size-xs font-italic">(include 7% GST, Discount, Markup)</span></label>
                                    <input id="total_price_with_gst_markup" name="total_price_with_gst_markup" readonly type="number" min="0" class="validate date form-control"   data-error=".errorTxt1">


                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="quantity" class="">Quantity </label>
                                    <input id="quantity" name="quantity"  type="number" min="0" class="validate date form-control"  required data-error=".errorTxt1">


                                </div>

                                <div class="form-group col-sm-6">
                                    <label for="discount" class="">Discount </label>
                                    <input id="discount" name="discount"  value="0"  type="number" min="0" class="validate date form-control"   data-error=".errorTxt1">


                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="commission" class="">Commission </label>
                                    <input id="commission" name="commission"  value="0"  type="number" min="0" class="validate date form-control"   data-error=".errorTxt1">


                                </div>

                                <div class="form-group col-sm-6">
                                    <label for="used_for" class="">Used For </label>
                                    <input id="used_for" name="used_for"  value="0"  type="text"  class="validate date form-control"   data-error=".errorTxt1">


                                </div>
                            </div>
                        </div>


                </div>




                        <div class="card green success-message bg-green" style="display: none;">
                            <div class="card-content white-text">
                                <p>d</p>
                            </div>
                        </div>
                        <div class="card red error-message bg-danger"  style="display: none;">
                            <div class="card-content white-text">
                                <p>d</p>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">

                    <a href="#!" class="btn btn-danger update-form">Save Medication</a>
                </div>

            </div>
        </div>
    </div>


{{--    ADD  MODALS --}}
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


{{--    END BRAND MODAL --}}

@endsection


@section('js')
    {!! Html::script('public/js/jquery.form.js') !!}
    {!! Html::script('public/plugins/jquery.validate/js/jquery.validate.min.js') !!}
    {!! Html::script(url('/').'/bootstrap/js/plugins/tables/datatables/datatables.min.js') !!}
    {!! Html::script(url('/').'/bootstrap/js/plugins/tables/datatables/dataTables.buttons.min.js') !!}
<script>
    $(function () {

        $("select").select2();
        $("#inv_date").datepicker({
            dateFormat: 'dd.mm.yy',
            maxDate: "today"
        });

        $("#expiry_date").datepicker({
            dateFormat: 'dd.mm.yy',
            minDate: "today"
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

        $(".save-brand").click(function(){
            if($("#brand-form").valid()){
                $("#brand-form").ajaxForm(function(response){
                    response = $.parseJSON(response);
                    if(response.type=='success'){
                        var newOption = new Option(response.name, response.id, true, true);
                        // Append it to the select
                        $('#select_brand_name').append(newOption).trigger('change');

                        $("#add-new-brand").find('.success-message').html(response.message);
                        $("#add-new-brand").find('.success-message').show();

                        setTimeout(function(){
                            $("#add-new-brand").modal('hide');
                            $("#add-new-brand").find('.success-message').hide();
                        },2000);

                    }
                }).submit();
            }
        });

        $(".product-list-table").DataTable({
            "paging": true, "info":     true,"searching": true,
            dom: 'Bfrtip',
            "lengthMenu": [ [100, 250, 500, -1], [100, 250, 500, "All"] ],
            buttons: [
                {
                    text: '<i class="icon-plus2"></i>',
                    className:"btn bg-danger-400 btn-icon rounded-round",

                    action: function ( e, dt, node, config ) {

                        $("#add-new-product").modal();
                    }
                }
            ]
        });
    })
</script>
@endsection