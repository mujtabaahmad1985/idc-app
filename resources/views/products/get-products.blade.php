@if(isset($products) && $products->count() > 0)
    @foreach($products as $product)
        <tr  @if(0 == $product->in_stock) class="bg-danger-300"  style="background-color: #e57373 !important;" @endif>
            <td>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="product{{ $product->id }}"  >
                    <label class="custom-control-label" for="product{{ $product->id }}"></label>
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
                                <a href="#!" class="dropdown-item product-view" data-id="{{ $product->id }}"><i class="icon-eye"></i> View</a>
                                <a href="#!" class="dropdown-item product-edit" data-id="{{ $product->id }}"><i class="icon-pencil"></i> Edit</a>
                                <a href="#!" class="dropdown-item product-delete" data-action="" data-id="{{ $product->id }}"><i class="icon-trash"></i> Delete</a>
                                <div class="dropdown-divider"></div>
                                <a href="#!" class="dropdown-item product-view" data-id="{{ $product->id }}"><i class="icon-credit-card"></i> Invoice</a>
                            </div>
                        </div>
                    </div>
                </div>
            </td>


        </tr>
    @endforeach
@endif