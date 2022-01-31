<form id="item-form" action="/sessions/items/save" method="POST" enctype="multipart/form-data">
<table class="table table-striped">
    <thead>
        <tr>
            <th>Item</th>
            <th>In Stock</th>
            <th>Quantity</th>
            <th>Purchase Price(SGD)</th>
            <th>Sold Price(SGD)</th>
            <th>Discount(SGD)</th>
            <th>Balance</th>

        </tr>
    </thead>
    <tbody>

            {{ csrf_field() }}
        <input type="hidden" name="patient_id"value="{!! $patient_id !!}" />
        <input type="hidden" name="session_id" value="{!! $session_id !!}" />
        <input type="hidden" name="appointment_id" value="{!! $appointment_id !!}" />
    @foreach($products as $product)
        <input type="hidden" name="product_id[]" value="{!! $product->id !!}" />
    <tr   @if(0 == $product->in_stock) class="bg-danger-300"  style="background-color: #e57373 !important;" @endif>
        <td width="25%">{!! $product->product_title !!}</td>
        <td width="10%">{!! $product->product_purchases[0]->order_qty !!}</td>
        <td width="15%"><input class="form-control item_quantity" name="item_quantity[]" @if(0 == $product->in_stock) disabled @endif autocomplete="none" value="{!! $product->in_stock==0?0:1 !!}" min="{!! $product->in_stock==0?0:1 !!}" max="{!! $product->in_stock !!}" type="number" /> </td>
        <td width="10%" class="price-unit" data-price="{!! $product->product_purchases[0]->price_unit !!}">${!! is_numeric($product->product_purchases[0]->price_unit)?number_format($product->product_purchases[0]->price_unit,2):$product->product_purchases[0]->price_unit !!}</td>
        <td width="10%">$<span class="sold-price">{!! is_numeric($product->product_purchases[0]->price_unit)?number_format($product->product_purchases[0]->price_unit,2):$product->product_purchases[0]->price_unit !!}</span></td>
        <td width="15%"><input class="form-control item_discount" @if(0 == $product->in_stock) disabled @endif name="item_discount[]" size="7" autocomplete="none" value="0" min="0" type="number" /></td>
        @if($product->in_stock>0)
        <td><span class="item-balance">${!! is_numeric($product->product_purchases[0]->price_unit)?number_format($product->product_purchases[0]->price_unit,2):$product->product_purchases[0]->price_unit !!}</span> </td>
            @else
            <td class=""><span class="item-balance">$0.00</span> </td>

        @endif

    </tr>
    @endforeach

    </tbody>
</table>

</form>

<div class="row">

    <div class="col-md-12">
        <div class="alert bg-success text-white alert-success-session-item-done">

            <p></p>
        </div>
    </div>

    <div class="col-md-12">
        <div class="alert bg-danger text-white alert-error-session-item-done">

            <p></p>
        </div>
    </div>

</div>