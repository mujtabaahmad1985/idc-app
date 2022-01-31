@extends('layout.app')
@section('page-title') Inventory Management @endsection
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
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Products</span> - Products List</h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none">
                <div class="d-flex justify-content-center">
                    <a href="#" class="btn btn-link btn-float text-body"><i class="icon-bars-alt text-primary"></i><span>Dashboard</span></a>
                    <a href="#" class="btn btn-link btn-float text-body"><i class="icon-calculator text-primary"></i> <span>Appointments</span></a>
                </div>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="/dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Dashboard</a>
                    <a href="/pharmacy" class="breadcrumb-item">Products</a>
                    <span class="breadcrumb-item active">Products List</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>


        </div>
    </div>
    <div class="content">
        <div class="card col-sm-12 col-md-12">


            <div class="d-md-flex align-items-md-start">
                {{--<div class="row">
                    <div class="col-sm-12 text-right float-sm-right"><button class="btn btn-danger addroom">Add New Consent Form</button> </div>
                </div>--}}
                <div class="sidebar sidebar-light bg-transparent sidebar-component sidebar-component-left border-0 shadow-0 sidebar-expand-md">

                    <!-- Sidebar content -->
                    <div class="sidebar-content">
<form id="search-products" action="/search/products" method="POST" enctype="multipart/form-data">
    {!! csrf_field() !!}
                        <!-- Filter -->
                        <div class="card">
                            <div class="card-header bg-transparent header-elements-inline">
                                <span class="text-uppercase font-size-sm font-weight-semibold">Filter</span>
                                <div class="header-elements">
                                    <div class="list-icons">
                                        <a class="list-icons-item" data-action="collapse"></a>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body" style="">

                                    <div class="form-group form-group-feedback form-group-feedback-left">
                                        <input type="text" class="form-control" name="product_title" placeholder="Product name">
                                        <div class="form-control-feedback">
                                            <i class="icon-reading text-muted"></i>
                                        </div>
                                    </div>







                            </div>
                        </div>
                        <!-- /stock -->

                        <!-- Filter -->
                        <div class="card">
                            <div class="card-header bg-transparent header-elements-inline">
                                <span class="text-uppercase font-size-sm font-weight-semibold">Stock</span>
                                <div class="header-elements">
                                    <div class="list-icons">
                                        <a class="list-icons-item" data-action="collapse"></a>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body" style="">

                                <div class="form-group form-group-feedback form-group-feedback-left">
                                    <input type="number" min="0" name="order_qty" class="form-control" placeholder="Minimum Stock">
                                    <div class="form-control-feedback">
                                        <i class="icon-hour-glass3 text-muted"></i>
                                    </div>
                                </div>
                                <div class="form-group form-group-feedback form-group-feedback-left">
                                    <input type="text" class="form-control" name="expiry_from" id="expiry_from" readonly placeholder="Expiry Date From">
                                    <div class="form-control-feedback">
                                        <i class="icon-calendar text-muted"></i>
                                    </div>
                                </div>
                                <div class="form-group form-group-feedback form-group-feedback-left">
                                    <input type="text" class="form-control"  name="expiry_to" id="expiry_to" readonly placeholder="Expiry Date To">
                                    <div class="form-control-feedback">
                                        <i class="icon-calendar text-muted"></i>
                                    </div>
                                </div>

                                <div class="form-group form-group-feedback form-group-feedback-left">
                                    <input type="text" class="form-control" name="purchase_from" id="purchase_from" readonly placeholder="Purchase Date From">
                                    <div class="form-control-feedback">
                                        <i class="icon-calendar text-muted"></i>
                                    </div>
                                </div>
                                <div class="form-group form-group-feedback form-group-feedback-left">
                                    <input type="text" class="form-control"  name="purchase_to" id="purchase_to" readonly placeholder="Purchase Date To">
                                    <div class="form-control-feedback">
                                        <i class="icon-calendar text-muted"></i>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- /stock -->

                        <!-- Location -->
                        <div class="card" >
                            <div class="card-header bg-transparent header-elements-inline">
                                <span class="text-uppercase font-size-sm font-weight-semibold">Brands</span>
                                <div class="header-elements">
                                    <div class="list-icons">
                                        <a class="list-icons-item" data-action="collapse"></a>
                                    </div>
                                </div>
                            </div>


                                    <div class="card-body">
                                        <div class="form-group">
                                            <div class="form-group form-group-feedback form-group-feedback-left">
                                                <input type="search" class="form-control" placeholder="Search brand">
                                                <div class="form-control-feedback">
                                                    <i class="icon-search4 font-size-base text-muted"></i>
                                                </div>
                                            </div>
                                            <div style="max-height: 250px; overflow: auto">
                                            @if(isset($brands) && $brands->count() > 0)
                                                @foreach($brands as $brand)
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-input-styled" name="brands[]" value="{!! $brand->id !!}" data-fouc>
                                                            {!! $brand->brand_name !!}
                                                        </label>

                                                    </div>
                                                @endforeach
                                            @endif
                                            </div>
                                        </div>




                            </div>

                        </div>
                        <!-- /location -->


                        <!-- Job title -->
                        <div class="card">
                            <div class="card-header bg-transparent header-elements-inline">
                                <span class="text-uppercase font-size-sm font-weight-semibold">Categories</span>
                                <div class="header-elements">
                                    <div class="list-icons">
                                        <a class="list-icons-item" data-action="collapse"></a>
                                    </div>
                                </div>
                            </div>


                                <div class="card-body">
                                    <div class="form-group">


                                        <div style="max-height: 250px; overflow: auto">
                                        @if(isset($categories) && $categories->count() > 0)
                                            @foreach($categories as $category)
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-input-styled search-categories" name="categories[]" value="{!! $category->id !!}" data-fouc>
                                                        {!! $category->name !!}
                                                    </label>

                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>


                        </div>
                        <!-- /caetgory title -->
                    <div class="card sub-category-panel" style="display: none">
                        <div class="card-header bg-transparent header-elements-inline">
                            <span class="text-uppercase font-size-sm font-weight-semibold">Sub Categories</span>
                            <div class="header-elements">
                                <div class="list-icons">
                                    <a class="list-icons-item" data-action="collapse"></a>
                                </div>
                            </div>
                        </div>


                        <div class="card-body">
                            <div class="form-group" id="show-subcategory">



                            </div>
                        </div>


                    </div>
                        <button class="btn btn-danger search-product" style="width: 100%">Search</button>
</form>


                    </div>
                    <!-- /sidebar content -->

                </div>

                <div class="flex-fill overflow-auto">
                    <div class="card card-body" id="searched-result">
                        <div class="table-responsive">
                        <table class="table table-striped product-list-table">
                            <thead>
                            <tr>
                                <th width="20px"><div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="all"  >
                                        <label class="custom-control-label" for="all"></label>
                                    </div></th>
                                <th>Name</th>
                                <th>Inv Date</th>
                                <th>Expiry Date</th>
                                <th>Brand Name</th>
                                <th>Category</th>
                                <th>In Stock</th>
                                <th>Price SGD</th>


                                <th class="text-right">Actions</th>
                            </tr>
                            </thead>

                            <tbody>
                                    @if(isset($products) && $products->count() > 0)
                                        @foreach($products as $product)
                                            <tr  @if(0 == $product->in_stock) class="bg-danger-300"  style="background-color: #e57373 !important;" @endif>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="product{!! $product->id !!}"  >
                                                        <label class="custom-control-label" for="product{!! $product->id !!}"></label>
                                                    </div>
                                                </td>

                                                <td>{!! $product->product_title !!}</td>
                                                <td>@if(isset($product->product_purchases) && !empty($product->product_purchases[0]->inv_date) && $product->product_purchases[0]->inv_date!='N/A'){!! \App\Helpers\CommonMethods::formatDate($product->product_purchases[0]->inv_date) !!} @endif</td>
                                                <td>@if(isset($product->product_purchases) && !empty($product->product_purchases[0]->expiry_date) && $product->product_purchases[0]->expiry_date!='N/A'){!! \App\Helpers\CommonMethods::formatDate($product->product_purchases[0]->expiry_date) !!} @endif</td>
                                                <td>{!! isset($product->medication_brands)?$product->medication_brands->brand_name:"" !!}</td>
                                                <td>{!! isset($product->medication_categories)?$product->medication_categories->name:"" !!}</td>
                                                <td>
                                                    @if($product->quantity_signal > $product->in_stock)
                                                        <span class="badge bg-danger-600" style="width: 30px"> {!! $product->in_stock !!}</span>
                                                    @else
                                                        <span class="badge bg-green-600"  style="width: 30px"> {!! $product->in_stock !!}</span>
                                                        @endif

                                                </td>
                                                <td>@if(isset($product->product_purchases) && !empty($product->product_purchases[0]->price_unit) && $product->product_purchases[0]->price_unit!='NA') ${!! $product->product_purchases[0]->price_unit !!} @else $0.0 @endif</td>

                                                <td>
                                                    <div class="ml-3">
                                                        <div class="list-icons">
                                                            <div class="list-icons-item dropdown">
                                                                <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-menu7"></i></a>
                                                                <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">
                                                                    <a href="/product/view/{!! $product->id !!}" class="dropdown-item" data-id="{!! $product->id !!}"><i class="icon-eye"></i> View</a>
                                                                    <a href="/product/edit/{!! $product->id !!}" class="dropdown-item" data-id="{!! $product->id !!}"><i class="icon-pencil"></i> Edit</a>
                                                                    <a href="#!" class="dropdown-item product-delete" data-action="" data-id="{!! $product->id !!}"><i class="icon-trash"></i> Delete</a>
                                                                    <div class="dropdown-divider"></div>
                                                                    <a href="#!" class="dropdown-item product-sold" data-id="{!! $product->id !!}"><i class="icon-cart2"></i> Sold To</a>

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

    <div id="add-new-product" class="modal fade">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Item</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form class="" id="item-form" method="post" action="/save/item" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="product_id" id="view_product_id" />
                        <input type="hidden" name="product_purchase_id" id="product_purchase_id" />
                        <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <label for="product_title" class="">Name</label>
                                    <input  name="product_title" type="text" class="validate form-control"  id="product-remote" required data-error=".errorTxt1">


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
                                    <label for="category_select_list" class="">Category</label>
                                    <select name="category" required="" id="category_select_list" class="form-control">
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
                                    <select name="sub_category" required=""  id="sub_category_select_list" class="form-control">
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
                                    <input id="inv_date" name="inv_date" type="text" class="validate  form-control"  required data-error=".errorTxt1">


                                </div>

                                <div class="form-group col-sm-6">
                                    <label for="expiry_date" class="">Expiry Date</label>
                                    <input id="expiry_date" name="expiry_date" type="text" class="validate  form-control"  required data-error=".errorTxt1">


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
                                <div class="form-group col-sm-3">
                                    <label for="quantity" class="">Quantity </label>
                                    <input id="quantity" name="quantity"  type="number" value="1" min="1" class="validate  form-control"  required data-error=".errorTxt1">


                                </div>

                                <div class="form-group col-sm-3">
                                    <label for="sgd_price_unit" class="">Shipping Cost</label>
                                    <input id="shipping_cost" name="shipping_cost" type="number" min="0" value="0" class="validate  form-control  price-calculate"  required data-error=".errorTxt1">


                                </div>

                                <div class="form-group col-sm-3">
                                    <label for="commission" class="">Commission </label>
                                    <input id="commission" name="commission"  value="0"  type="number" min="0" class="validate  form-control"   data-error=".errorTxt1">


                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="quantity_signal" class="">Quantity Signal </label>
                                    <input id="quantity_signal" name="quantity_signal"  value="3"  type="number" min="3" class="validate  form-control"   data-error=".errorTxt1">


                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <label for="used_for" class="">Used For </label>
                                    <textarea id="user_for" name="used_for" class="form-control"></textarea>



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

                    <a href="#!" class="btn btn-danger save-item">Save Item</a>
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
    <div id="view-product" class="modal fade" >
        <div class="modal-dialog modal-lg" style="max-width: 75%">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="view-product-title">Product's Detail</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">



                </div>


            </div>
        </div>
    </div>

    <div id="view-sold-to" class="modal fade" >
        <div class="modal-dialog modal-lg"  style="max-width: 75%">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="view-sold-to-title">Product Sold To</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">



                </div>


            </div>
        </div>
    </div>

    <div id="modal_form_csv" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Upload Donor CSV</h6>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>

                <div class="modal-body">
                    <h6 class="font-weight-semibold">Instructions</h6>
                    <p>If you have data for multiple items you upload them using csv. Only <span class="text-danger"><strong>formatted csv</strong></span>  uploads into database. <a href="/uploads/products.csv" download="products.csv" class="text-danger"><strong>Download</strong></a> as example. </p>
                    <hr>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="csv-upload">Upload csv file</label>
                                <form id="upload-csv" action="/upload/csv/products" method="post" enctype="multipart/form-data">
                                    {!! csrf_field() !!}
                                    <input type="file" id="csv-upload" name="upload-csv" pattern="*.csv" required />
                                </form>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="progress rounded-round" style="display:none">
                                <div class="progress-bar bg-danger" style="width: 0%">
                                    <span>0% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-12 col-md-12 col-lg-12 ">
                            <div class="alert alert-danger alert-styled-left alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                                <span class="font-weight-semibold">Oh snap!</span> <span id="danger">Change a few things up and <a href="#" class="alert-link">try submitting again</a></span>.
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 ">
                            <div class="alert alert-success alert-styled-left alert-arrow-left alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                                <span class="font-weight-semibold">Well done!</span> <span id="success">CSV is imported  <a href="#" class="alert-link">succesfully</a></span>.
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12 col-lg-12 " id="skipped_products" style="max-height: 150px; overflow: auto">


                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                    <button type="button" class="btn bg-danger upload-csv">Upload</button>
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
    {!! Html::script('https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js') !!}
    {!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js') !!}
    {!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js') !!}
    {!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js') !!}
    {!! Html::script('https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js') !!}
    {!! Html::script('https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js') !!}

<script>
    $(function () {
        $("form").attr('autocomplete', 'off');

        $("body").on('click','.product-sold',function(){
            var id = $(this).data('id');
            $("#view-sold-to").modal();

            $.ajax({
                url:"/get/sold/to/"+id,
                success:function(response){
                    $("#view-sold-to  .modal-body").html(response);
                }
            });
        });

        var progressbar = $(".progress-bar");
        $("body").on('click','.upload-csv',function(){
            if($("#upload-csv").valid()){
                $("#upload-csv").ajaxForm(
                    {


                        beforeSend: function() {
                            $(".progress").css("display","block");
                            progressbar.width('0%');
                            progressbar.text('0%');
                        },
                        uploadProgress: function (event, position, total, percentComplete) {
                            // alert(percentComplete);
                            progressbar.width(percentComplete + '%');
                            progressbar.text(percentComplete + '%');
                        },
                        success: function(response) {
                            $(".progress").css("display","none");
                            response = $.parseJSON(response);
                            if(response.type=="success" && response.skipped_data.length <= 0){
                                $('#modal_form_csv .alert-success').html(response.message);
                                $('#modal_form_csv .alert-success').fadeIn();

                                setTimeout(function(){location.reload()}, 2500);
                            }else if(response.skipped_data.length > 0){
                                $('#danger').html("CSV is imported but below product(s) are not imported, try again");
                                $('#modal_form_csv .alert-danger').fadeIn();
                              var ul = $("<ul>");
                                $.each(response.skipped_data, function(i,v){

                                    ul.append("<li class='text-danger'>"+v+"</li>");


                                });
                                $("#skipped_products").html(ul);
                            }else{

                                $('#danger').html(response.message);
                                $('#modal_form_csv .alert-danger').fadeIn();
                                setTimeout(function(){
                                    $("#upload-csv").resetForm();
                                    $('#modal_form_csv .alert-danger').fadeOut();
                                }, 2500);
                            }


                        }
                    })
                    .submit();
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



    /*    $("body").on('click','.product-view',function(){
            var product_id = $(this).data('id');

            $('#view-product').modal();

            $.ajax({
                url:"/product/detail/"+product_id,
                success:function (response) {
                    $("#view-product .modal-body").html(response);
                    var t = $(".product-purchase-list-table").DataTable({
                        "paging": false, "info":true,"searching": false,
                    });
                    t.columns.adjust();
                }
            })

        });

*/
        $("body").on('click','.product-view',function(){
            var product_id = $(this).data('id');

            $('#view-product').modal();

            $.ajax({
                url:"/product/detail/"+product_id,
                success:function (response) {
                    $("#view-product .modal-body").html(response);
                    var t = $(".product-purchase-list-table").DataTable({
                        "paging": false, "info":true,"searching": false,
                    });
                    t.columns.adjust();
                }
            })

        });

        $("body").on('click','.product-edit',function(){
            var product_id = $(this).data('id');

            $('#add-new-product').modal();

            $.ajax({
                url:"/product/get/"+product_id,
                success:function (response1) {
                    response1 = $.parseJSON(response1);
                    $("#view_product_id").val(response1.product_id);
                    $("#product_purchase_id").val(response1.product_purchase_id);
                    $("input[name=product_title]").val(response1.product_title);
                    if(response1.brand_id!="")
                    $("#select_brand_name").val(response1.brand_id).trigger('change');

//alert(response.price_unit);
                    $("input[name=inv_date]").val(response1.inv_date);
                    $("input[name=expiry_date]").val(response1.expiry_date);
                    $("input[name=price_unit]").val(response1.price_unit);
                    $(".price-calculate").trigger('keyup');
                    $("input[name=quantity_signal]").val(response1.quantity_signal);
                    $("input[name=quantity]").val(response1.quantity);

                    if(response1.category_id){
                        $("#category_select_list").val(response1.category_id).trigger('change');
                        setTimeout(function(){
                            $("#sub_category_select_list").val(response1.sub_category_id).trigger('change');

                        },1000);

                    }

                }
            })

        });


        $(".search-categories").on('change',function(){
           var selected_id =  $(".search-categories:checked").map(function() {return this.value;}).get().join(',');
           if(selected_id){

               $(".sub-category-panel").show();
               $.ajax({
                   url:"/search/get/subcategory",
                   data:{"_token":"{!! csrf_token() !!}",category_id:selected_id},
                   type:"POST",
                   success:function(response){
                    $("#show-subcategory").html(response);
                       $('.form-input-styled').uniform();
                   }
               });
           }else{
               $("#show-subcategory").html('');
            $(".sub-category-panel").hide();
           }

        });


        $(".search-product").click(function(){
            $(".product-list-table").DataTable().destroy();
            $("#search-products").ajaxForm(function (response) {

                $("#searched-result").html(response);
                $(".product-list-table").DataTable({
                    "paging": true, "info":     true,"searching": false,
                    dom: 'Bfrtip',
                    "lengthMenu": [ [100, 250, 500, -1], [100, 250, 500, "All"] ],
                    buttons: [
                        {
                            text: '<i class="icon-plus2"></i> New Product',
                            className:"btn bg-danger-400 btn-icon rounded-round",

                            action: function ( e, dt, node, config ) {
                                /*$("#item-form").resetForm();
                                $("#view_product_id").val('');
                                $("#product_purchase_id").val('');
                                $("#add-new-product").modal();*/
                                window.location.href = "/product/new";
                            }
                        },
                        {
                            text: '<i class="icon-plus2"></i> Upload CSV',
                            className:"btn bg-danger-400 btn-icon rounded-round ml-2",

                            action: function ( e, dt, node, config ) {

                                $("#modal_form_csv").modal();
                            }
                        }
                    ]
                });
            });
        });
        


        $(".product-list-table").DataTable({
            "paging": true, "info":     true,"searching": false,
            dom: 'Bfrtip',
            "aaSorting": [],
            "lengthMenu": [ [100, 250, 500, -1], [100, 250, 500, "All"] ],
            buttons: [

                {
                    extend: 'csvHtml5',
                    className:"btn bg-danger-400 btn-icon rounded-round mr-1",
                    text: '<i class="icon-file-download2 mr-2"></i> CSV',
                    titleAttr: 'CSV',
                    title: 'Products',
                    exportOptions: {
                        columns: ':not(:last-child)',
                    }
                },
                {
                    extend: 'pdfHtml5',
                    className:"btn bg-danger-400 btn-icon rounded-round mr-1",
                    text: '<i class="icon-file-download2 mr-2"></i> PDF',
                    titleAttr: 'PDF',
                    title: 'Products',
                    exportOptions: {
                        columns: ':not(:last-child)',
                    }
                },
                {
                    text: '<i class="icon-plus2"></i> New Product',
                    className:"btn bg-danger-400 btn-icon rounded-round",

                    action: function ( e, dt, node, config ) {
                        /*$("#item-form").resetForm();
                        $("#view_product_id").val('');
                        $("#product_purchase_id").val('');
                        $("#add-new-product").modal();*/
                        window.location.href = "/product/new";
                    }
                },
                {
                    text: '<i class="icon-plus2"></i> Upload CSV',
                    className:"btn bg-danger-400 btn-icon rounded-round ml-2",

                    action: function ( e, dt, node, config ) {

                        $("#modal_form_csv").modal();
                    }
                }
            ]
        });

        $(".save-item").click(function(){
            if($("#item-form").valid()){
                $("#item-form").ajaxForm(function (response) {
                    response = $.parseJSON(response);
                    if(response.type=='success' || response.type=='update'){

                        $("#item-form").find('.success-message').html(response.message);
                        $("#item-form").find('.success-message').show();

                        setTimeout(function(){
                            $("#add-new-product").modal('hide');
                           $.ajax({
                               url:"/get/products",
                               success:function(response){
                                   $(".product-list-table tbody").html(response);
                                 //  $(".product-list-table").DataTable().ajax.reload();
                               }
                           });
                        },2000);

                    }
                }).submit();
            }
        });
    })
</script>
@endsection