@extends('layout.app')
@section('page-title') {!! $product->product_title !!}'s Detail @endsection
@section('css')
<style>
    tr.shown, tr.hidden {
        background-color: #eee;

    }
    tr{
        display: table-row !important;
    }
    tr.hidden {
        display: none !important;

    }

</style>
@endsection


@section('content')

    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Products</span> - {!! $product->product_title !!}</h4>
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
                    <a href="/dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="/pharmacy" class="breadcrumb-item">Products</a>
                    <span class="breadcrumb-item active">{!! $product->product_title !!}</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>


        </div>
    </div>

    <div class="content">
        <div class="row">
            <div class="col-sm-12 col-md-8">
                <div class="card">


                    <div class="card-body">

                        <h6 class="media-title font-weight-semibold">
                            <a href="#" class="text-danger">{!! $product->product_title !!}t</a>
                        </h6>

                        <ul class="list-inline list-inline-dotted mb-3 mb-lg-2">
                            @if(isset($product->medication_brands))
                                <li class="list-inline-item"><a href="#" class="text-muted">{!! $product->medication_brands->brand_name !!}</a></li>
                            @endif
                            @if(isset($product->medication_categories))
                                <li class="list-inline-item"><a href="#" class="text-muted">{!! $product->medication_categories->name !!}</a></li>
                            @endif
                            @if(isset($product->medication_sub_categories))
                                <li class="list-inline-item"><a href="#" class="text-muted">{!! $product->medication_sub_categories->name !!}</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-2">
                <div class="card">


                    <div class="card-body">

                        <h6 class="media-title font-weight-semibold">
                            <a href="#" class="text-danger">{!! isset($product->product_purchases)?$product->product_purchases()->count():0 !!}</a>
                        </h6>

                        <ul class="list-inline list-inline-dotted mb-3 mb-lg-2">

                                <li class="list-inline-item"><a href="#" class="text-muted">Purchase History</a></li>

                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-2">
                <div class="card">


                    <div class="card-body">

                        <h6 class="media-title font-weight-semibold">
                            <a href="#" class="text-danger">{!!  isset($product->session_items)?$product->session_items()->count():0 !!}</a>
                        </h6>

                        <ul class="list-inline list-inline-dotted mb-3 mb-lg-2">

                            <li class="list-inline-item"><a href="#" class="text-muted">Sold to patients</a></li>

                        </ul>
                    </div>
            </div>
        </div>

        </div>

        <div class="card">


            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-borderless product-purchase-list-table">
                            <thead>
                            <tr>
                                <th colspan="10" style="padding-left: 0"><h5 class="text-danger">Purchase History</h5></th>
                            </tr>
                            <tr>
                                <th>#</th>
                                <th>Inv Date</th>
                                <th>Expiry Date</th>
                                <th>Order Qty</th>
                                <th>Supplier</th>
                                <th>Stock</th>
                                <th>Price</th>
                                <th>Discount</th>
                                <th>Payment</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $product_purchase = isset($product->product_purchases)?$product->product_purchases()->paginate(5,['*'],'purchase'):null;
                                //$product_purchase->links();
                            @endphp
                            @if(isset($product_purchase) )

                                @foreach($product_purchase as $purchase)
                                    <tr class="full-info">
                                        <td>
                                            @php
                                                $d = new \Milon\Barcode\DNS2D();
                                                $d->setStorPath(__DIR__."/cache/");
                                                echo $d->getBarcodeSVG("Name: ".$product->product_title.' Price:'.(!empty($purchase->price_unit) && $purchase->price_unit!='NA'?"$".$purchase->price_unit:"$0.0"), 'QRCODE',2,2);
                                            @endphp

                                        </td>
                                        <td>@if(!empty($purchase->inv_date) && $purchase->inv_date!='N/A'){!! \App\Helpers\CommonMethods::formatDate($purchase->inv_date) !!} @endif</td>
                                        <td>@if(!empty($purchase->expiry_date) && $purchase->expiry_date!='N/A'){!! \App\Helpers\CommonMethods::formatDate($purchase->expiry_date) !!} @endif</td>
                                        <td>{!! $purchase->order_qty !!}</td>
                                        <td>@if(!empty($purchase->supplier_name))<a href="#!" class="show-supplier">{!! $purchase->supplier_name !!}</a>  @endif</td>
                                        <td>{!! $purchase->previous_stock !!}</td>
                                        <td>@if( !empty($purchase->price_unit) && $purchase->price_unit!='NA') ${!! ($purchase->price_unit) !!} @else $0.0 @endif</td>
                                        <td>{!! $purchase->discount !!}</td>
                                        <td>@if(!empty($purchase->payment_mode))<a href="#!"  class="show-payment">{!! $purchase->payment_mode !!}</a>  @endif</td>
                                        <td>{!! \App\Helpers\CommonMethods::formatDate($purchase->created_at) !!}</td>

                                    </tr>

                                    <tr class="toggle-tr  hidden">
                                        <td colspan="10">

                                            <table class="table table-striped" style="width: 50%">
                                                <tr>
                                                    <th width="40%" class="text-right">Product Name</th>
                                                    <td width="60%">{!! $product->product_title !!}</td>
                                                </tr>
                                                <tr>
                                                    <th width="40%" class="text-right">Purchased At</th>
                                                    <td width="60%">{!! \App\Helpers\CommonMethods::formatDate($purchase->created_at) !!}</td>
                                                </tr>


                                                <tr>
                                                    <th width="40%" class="text-right">Supplier</th>
                                                    <td width="60%">{!! $purchase->supplier_name !!} @if(!empty($purchase->supplier_contact)) ({!! $purchase->supplier_contact !!}) @endif</td>
                                                </tr>

                                                <tr>
                                                    <th width="40%" class="text-right">Supplier  Invoice</th>
                                                    <td width="60%">{!! $purchase->supplier_invoice !!}</td>
                                                </tr>
                                                <tr>
                                                    <th width="40%" class="text-right">Product Code from supplier</th>
                                                    <td width="60%">{!! $purchase->product_code_from_supplier !!}</td>
                                                </tr>

                                                <tr>
                                                    <th width="40%" class="text-right">Previous Stock Balance</th>
                                                    <td width="60%">{!! $purchase->previous_stock_balance !!}</td>
                                                </tr>
                                                <tr>
                                                    <th width="40%" class="text-right">Total Stock <em>( previous + new order)</em></th>
                                                    <td width="60%">{!! $purchase->total_stock !!}</td>
                                                </tr>

                                                <tr>
                                                    <th width="40%" class="text-right">Stock Location</th>
                                                    <td width="60%">{!! $purchase->stock_location !!}</td>
                                                </tr>

                                                <tr>
                                                    <th width="40%" class="text-right">Packing Description (NOS)</th>
                                                    <td width="60%">{!! $purchase->packing_description !!}</td>
                                                </tr>

                                                <tr>
                                                    <th width="40%" class="text-right">Invt. Date</th>
                                                    <td width="60%">{!! $purchase->inv_date !!}</td>
                                                </tr>

                                                <tr>
                                                    <th width="40%" class="text-right">Expiry Date</th>
                                                    <td width="60%">{!! $purchase->expiry_date !!}</td>
                                                </tr>

                                                <tr>
                                                    <th width="40%" class="text-right">Price</th>
                                                    <td width="60%">{!! $purchase->price_unit !!}</td>
                                                </tr>

                                                <tr>
                                                    <th width="40%" class="text-right">Discount</th>
                                                    <td width="60%">{!! $purchase->discount !!}</td>
                                                </tr>

                                                <tr>
                                                    <th width="40%" class="text-right">Total Price <span class="text-muted font-size-xs font-italic">(include 7% GST)</span></th>
                                                    <td width="60%">{!! $purchase->total_price_with_gst !!}</td>
                                                </tr>

                                            </table>
                                        </td>
                                    </tr>
                                @endforeach

                            @endif
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="10">

                                    {!! $product_purchase->links() !!}
                                </td>
                            </tr>

                            </tfoot>
                        </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped patient-list-table">
                    <thead>

                    <tr>
                        <th colspan="5" style="padding-left: 0"><h5 class="text-danger">Sold to</h5></th>
                    </tr>
                    <tr>
                        <th>Patient</th>
                        <th>Appointment / Session </th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Date</th>
                    </tr>
                    </thead>

                    <tbody>
                    @php
                        $session_items = isset($product->session_items)?$product->session_items()->paginate(5,['*'],'sold-to'):null;
                    @endphp

                    @if(isset($session_items))
                        @foreach($session_items as $item)

                            @if(isset($item->patients))

                                <tr>
                                    <td><span class="badge badge-danger mr-2">{!! isset($item->patients)?$item->patients->patient_unique_id:"" !!}</span><a href="/patient/view/{!! $item->patients->id !!}" target="_blank">{!! ucwords($item->patients->patient_name) !!}  </a> </td>
                                    <td>{!! $item->appointments->doctor_services->service_name !!} with <span class="font-weight-semibold">Dr. {!! $item->appointments->doctors->fname !!} {!! $item->appointments->doctors->lname !!}</span>
                                        at {!! \App\Helpers\CommonMethods::formatDate($item->appointments->booking_date) !!}
                                    </td>
                                    <td>{!! $item->item_quantity !!}</td>
                                    <td>$ {!! ($item->item_price) !!}</td>
                                    <td>{!! \App\Helpers\CommonMethods::formatDate($item->created_at) !!}</td>
                                </tr>
                            @endif
                        @endforeach
                    @endif

                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="10">

                            {!! $session_items->links() !!}
                        </td>
                    </tr>

                    </tfoot>
                </table>
                </div>
            </div>
        </div>
    </div>


@endsection


@section('js')

    <script>
        $(function () {
            $("body").on("click",".full-info",function () {
                $(this).next(".toggle-tr").toggleClass('hidden');
            });
        })
    </script>

@endsection