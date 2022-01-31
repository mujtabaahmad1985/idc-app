
<table class="highlight" id="products-list">
    <thead>
    <tr>
        <th width="35%">Name</th>
        <th width="15%">Code</th>
        <th>Quantity</th>
        <th width="10%">Price</th>
        <th>Discount</th>

        <th>Total Price</th>
    </tr>
    </thead>
    <tbody>
    @php
    $price = 0;
    $discount = 0;
    @endphp
@foreach($treatment_product as $value)

    <tr>
        <td>
            {!! $value->product_title !!}
        </td>
        <td> {!! $value->product_code !!} </td>
        <td>{!! $value->quantity !!}</td>
        <td> {!! number_format($value->original_price,2) !!} </td>
        <td>{!! number_format($value->discount,2) !!}</td>

        <td>{!! number_format($value->price_charged,2) !!}</td>
    </tr>
    @php
    $price+=$value->price_charged;
    $discount+=$value->discount;
    @endphp
@endforeach
    </tbody>
    <tfoot>
    <tr>
        <td colspan="3" align="right"></td>
        <td><strong>Total</strong></td>
        <td><strong>${!!  number_format($discount,2) !!}</strong></td>
        <td><strong>${!!  number_format($price,2) !!}</strong></td>
    </tr>
    </tfoot>
</table>