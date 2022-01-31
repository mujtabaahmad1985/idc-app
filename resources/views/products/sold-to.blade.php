<table class="table table-striped patient-list-table">
    <thead>
        <tr>
            <th>Patient</th>
            <th>Appointment / Session </th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Date</th>
        </tr>
    </thead>

    <tbody>

    @if(isset($product->session_items) && $product->session_items->count() > 0)
        @foreach($product->session_items as $item)

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

</table>