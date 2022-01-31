<h5>Payment for <span class="badge badge-danger">Appointment: {!! $appointment->doctor_services->service_name !!} </span></h5>
<style>
    #other_payment_info-error{
        position: absolute;
        bottom: -28px;
    }
</style>
<form id="invoice-form" action="/save/invoice" enctype="multipart/form-data" method="POST">
    {!! csrf_field() !!}
    <input type="hidden" name="appointment_id" value="{!! $appointment->id !!}" />
    <input type="hidden" name="patient_id" value="{!! $appointment->patients->id !!}" />
    <input type="hidden" name="paymeny_via" value="Cash" />
<div class="row">
   <div class="col-12">
        <table class="table table-striped">
            <thead>
            <tr>
                <th width="60%" style="padding-left: 1px">Item Name </th>
                <th width="10%">Quantity</th>
                <th width="15%">Price</th>
                <th>Discount</th>
                <th width="15%">Paid Price</th>
            </tr>
            </thead>
            <tbody>

            @php
            $total_price = 0;
            $discount = 0;
            $paid_price = 0;
            @endphp
            @if(isset($appointment->appointment_sessions) && $appointment->appointment_sessions->count() > 0)
                <tr>
                    <td colspan="2">{!! $appointment->doctor_services->service_name !!}</td>
                    <td>$ {!! is_numeric($appointment->doctor_services->price)?number_format($appointment->doctor_services->price,2):$appointment->doctor_services->price !!}</td>
                    <td></td>
                    <td>$ {!! is_numeric($appointment->doctor_services->price)?number_format($appointment->doctor_services->price,2):$appointment->doctor_services->price !!}</td>
                </tr>
                @php
                    $total_price += $appointment->doctor_services->price;
                $paid_price+=$appointment->doctor_services->price;
                @endphp



                @foreach($appointment->appointment_sessions as $k=>$session)
                <tr class="table-active table-border-double">
                    <td colspan="5"><strong>Session #{!! $k+1 !!}</strong></td>
                </tr>
                @if(isset($session->session_items) && $session->count() > 0)
                    @foreach($session->session_items as $item)
                        <tr>
                            <td>{!! $item->products->product_title !!}</td>
                            <td>{!! $item->item_quantity !!}</td>
                            <td>$ {!! is_numeric($item->products->product_purchases[0]->price_unit)?number_format($item->products->product_purchases[0]->price_unit,2):$item->products->product_purchases[0]->price_unit !!}</td>
                            <td>$ {!! number_format(trim( $item->item_discount),2 ) !!}</td>
                           <td>$ {!! number_format(((trim($item->item_quantity ) * trim( $item->item_price)) - $item->item_discount),2 ) !!}</td>
                        </tr>
                        @php
                                $total_price += (trim($item->item_quantity ) * trim( $item->item_price));
                                 $discount +=trim( $item->item_discount);
                        $paid_price+=((trim($item->item_quantity ) * trim( $item->item_price)) - $item->item_discount);

                        @endphp

                        @endforeach

                @else
                    <tr class="">
                        <td colspan="4" class="text-danger">No item is added</td>
                    </tr>
                    @endif
                @if(isset($session->materials) && $session->materials->count() > 0)
                    <tr class="table-active table-border-double">
                        <td colspan="5"><strong>Material</strong></td>
                    </tr>
                    <tr>
                        <td colspan="2">{!! $session->materials->name!!}</td>
                        <td>$ {!! is_numeric($session->materials->price)?number_format($session->materials->price,2):$session->materials->price !!}</td>
                        <td></td>
                        <td>$ {!! is_numeric($session->materials->price)?number_format($session->materials->price,2):$session->materials->price !!}</td>
                    </tr>
                    @php
                        $total_price += $session->materials->price;
$paid_price+=$session->materials->price;

                    @endphp
                @endif
                @endforeach
                <tr>
                    <td class="text-right" colspan="2">
                        <div class="text-sm-right mb-0 mt-3 mt-sm-0 ml-auto">

                            <ul class="list list-unstyled mb-0">

                                <li class="dropdown">
                                    Paid By: &nbsp;
                                    <a href="#" class="badge bg-danger-400 align-top dropdown-toggle payment-name" data-toggle="dropdown" aria-expanded="false">Cash</a>
                                    <div class="dropdown-menu dropdown-menu-right payment-options" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(117px, 19px, 0px);">
                                        <a href="#!" class="dropdown-item" data-option="Cash"><i class="icon-cash2"></i> Cash</a>
                                        <a href="#!" class="dropdown-item" data-option="Insurance" data-value="{!! $appointment->patients->insurance_by.'-'.$appointment->patients->insurance_number !!}"><i class="icon-alert"></i> Insurance</a>
                                        <a href="#!" class="dropdown-item" data-option="Credit Card"><i class="icon-cash"></i> Credit Card</a>
                                        <a href="#!" class="dropdown-item" data-option="Bank Transfer"><i class="icon-barcode2"></i> Bank Transfer</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <input type="text" class="form-control col-6 float-right mt-1" name="other_payment_info" style="display: none" />
                    </td>
                    <td  class=" font-weight-bolder">$ {!! number_format($total_price,2) !!} </td>
                    <td class="text-right font-weight-bolder">$ {!! number_format($discount,2) !!} </td>
                    <td class="font-weight-bolder">$ {!! number_format($paid_price,2) !!} </td>
                </tr>
                @else
                <style>
                    .download-session-items,.save-invoice{ display: none}
                </style>
                <tr>
                    <td colspan="5" class="text-center text-danger">No session found!</td>
                </tr>
             @endif
            </tbody>


        </table>
    </div>

</div>
    <input name="total_amount" value="{!! $total_price !!}" type="hidden" />
</form>

<div class="row">

    <div class="col-md-12">
        <div class="alert bg-success text-white alert-success-invoice">

            <p></p>
        </div>
    </div>

    <div class="col-md-12">
        <div class="alert bg-danger text-white alert-error-invoice">

            <p></p>
        </div>
    </div>

</div>