<div class="card card-body">
    <div class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">


        <div class="media-body">
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

            <div class="row">
                <div class="col-12">
                    <table class="table table-striped product-purchase-list-table">
                        <thead>
                            <tr>
                                <th colspan="6" style="padding-left: 0"><h5 class="text-danger">Purchase History</h5></th>
                            </tr>
                        <tr>
                            <th>#</th>
                            <th>Inv Date</th>
                            <th>Expiry Date</th>
                            <th>Order Qty</th>
                            <th>Previous Stock</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($product->product_purchases) && $product->product_purchases->count() > 0)
                            @foreach($product->product_purchases as $purchase)
                            <tr>
                                <td>
                                    {!! \Milon\Barcode\DNS2D::getBarcodeHTML("Name: ".$product->product_title.' Price:'.(!empty($purchase->price_unit) && $purchase->price_unit!='NA'?"$".$purchase->price_unit:"$0.0"), 'QRCODE',2,2); !!}
                                </td>
                                <td>@if(!empty($purchase->inv_date) && $purchase->inv_date!='N/A'){!! \App\Helpers\CommonMethods::formatDate($purchase->inv_date) !!} @endif</td>
                                <td>@if(!empty($purchase->expiry_date) && $purchase->expiry_date!='N/A'){!! \App\Helpers\CommonMethods::formatDate($purchase->expiry_date) !!} @endif</td>
                                <td>{!! $purchase->order_qty !!}</td>
                                <td>{!! $purchase->previous_stock !!}</td>
                                <td>@if( !empty($purchase->price_unit) && $purchase->price_unit!='NA') ${!! ($purchase->price_unit) !!} @else $0.0 @endif</td>
                                <td>{!! $purchase->discount !!}</td>
                                <td>{!! \App\Helpers\CommonMethods::formatDate($purchase->created_at) !!}</td>

                            </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <div class="mt-3 mt-lg-0 ml-lg-3 text-center">
            <h3 class="mb-0 font-weight-semibold">@if(isset($product->product_purchases) && !empty($product->product_purchases[0]->price_unit) && $product->product_purchases[0]->price_unit!='NA') ${!! ($product->product_purchases[0]->price_unit) !!} @else $0.0 @endif</h3>
</div>
    </div>
</div>