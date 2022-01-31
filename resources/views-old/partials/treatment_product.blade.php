@foreach($treatment_product as $value)
    <input type="hidden" name="treatment_id[]" value="{!! $value->t_p_id !!}" />
    <tr>
        <td>
            {!! $value->product_title !!}
        </td>
        <td> {!! $value->product_code !!} </td>
        <td><input type="number" name="product_quantity[]" min="1"  value="{!! $value->quantity !!}" data-type="quantity"  class="dynamic-field"> </td>
        <td> {!! number_format($value->original_price,2) !!} </td>
        <td><input type="number" name="product_discount[]"  value="{!! $value->discount !!}"  data-type="discount"   class="dynamic-field"> </td>

        <td><input type="number" name="product_discount_price[]"  readonly="readonly" value="{!! number_format($value->price_charged,2) !!}" class="dynamic-field total-price"> </td>
        <td><a href="#!"><i class="material-icons">delete</i></a> </td>
    </tr>
@endforeach
