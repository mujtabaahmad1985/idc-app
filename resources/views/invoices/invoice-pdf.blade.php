<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <style>
        @font-face {
            font-family: 'Exo2-Regular';
            font-style: normal;
            font-weight: 300;
            src: local('Exo2-Regular'), local('Exo2-Regular'), url(fonts/Exo2-Regular.ttf) format('truetype');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215, U+E0FF, U+EFFD, U+F000;
        }
        body{
            font-family: 'Exo2-Regular', sans-serif !important;
            font-size:9px;
        }

        #pageFooter{
            font-size:14px;
        }
        #pageFooter:after {

            content: "Page " counter(page) ;
        }
        @page { margin: 90px 50px 100px  ;border-spacing:0; }
        #header { position: fixed; left: 0px; top: -45px; right: 0px; height: auto;  text-align: center;  }
        #footer { position: fixed; left: 0px; bottom: -10px; right: 0px; height: auto;  border:0px solid  }
        #footer .page:after {  }
        table{
            border-collapse:collapse; width:778px;border-spacing: 0; margin:0;
        }
        .innertable{

        }
        img {
            margin-left:10px
        }
        .innertable{
            border-collapse:collapse; }


        .innertable tr{
            border-spacing:0;;white-space:nowrap;}

        .innertable tr td{
            border:0px solid; height:20px; padding:1px 1px
        }

        .innertable-more tr td{
            border:1px solid; padding:5px
        }
        table tr td{ padding:0; margin:0}
        .item-table tr td{ padding:3px !important;}
    </style>
<body>

<div id="header">

    <table border="0" style="width:600px">
        <tr>
            <td width="200px">
                <img src="images/logo.png" alt="Sonomatic" width="150px" />
            </td>
            <td width="120px" style="width:120px">&nbsp;</td>
            <td valign="top" width="300px" style="width:300px; text-align:right;">
                <table border="0" class="innertable" width="300px" style="width:300px" >
                    <tr>
                        <td width="48%">&nbsp;</td>
                        <td width="52%" style="text-align:right"><h1 style="margin:0; padding:0">International Dental Centre.</h1></td>
                    </tr>
                    <tr>
                        <td width="48%">&nbsp;</td>
                        <td >
                            <p style="font-size:10px; text-align:right; margin:0; padding:0">
                                6 Gemmill Ln, Singapore 069249 <br/>
                                +65 6372 0082 <br/>
                            </p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
</div>
<div id="footer" style="text-align: center">
<hr />
    <p style="margin-bottom: 3px; font-size: 12px">Thank You For Visiting Our Clinic.</p>
    <p style="margin-top: 0px">International Dental Center,6 Gemmill Ln, Singapore 069249</p>
</div>
<table border="0" style="width:600px">


    <tr>
        <td>
            <table border="0" width="550" style="margin-top:10px; width: 600px">
                <tr>
                    <td style="border:0px solid; width:360px;padding:10px;" valign="top">
                        <table border="none" cellspacing="4px" cellpadding="4px" style="width:360px;">

                            <tr>
                                <td><strong>{!! $appointment->patients->patient_name !!}</strong> </td>

                            </tr>
                            @if(!empty($appointment->patients->patient_email))
                            <tr>

                                <td>{!! $appointment->patients->patient_email !!}</td>
                            </tr>
                            @endif

                            @if(isset($appointment->patients->phones) && $appointment->patients->phones->count() > 0)
                                <tr>

                                    <td>{!! isset($appointment->patients->phone)?$appointment->patients->phone->code.' '.$appointment->patients->contact_number:"" !!}</td>
                                </tr>
                            @endif
@php
$patient_address = "";
$address = [];
if(isset($appointment->patients->addresses) && $appointment->patients->addresses->count() > 0)




if(!empty( $appointment->patients->addresses[0]->house_no))
$address [] = "House ".$appointment->patients->addresses[0]->house_no;

if(!empty( $appointment->patients->addresses[0]->apartments_no))
$address [] = "Apartment ".$appointment->patients->addresses[0]->apartments_no;

if(!empty( $appointment->patients->addresses[0]->city))
$address [] = $appointment->patients->addresses[0]->city;

if(!empty( $appointment->patients->addresses[0]->country))
$address [] = $appointment->patients->addresses[0]->country;

if(!empty( $appointment->patients->addresses[0]->zipcode))
$address [] = "Zipcode #".$appointment->patients->addresses[0]->zipcode;
$patient_address = implode(', ',$address);
@endphp
                                <tr>

                                    <td>{!! $patient_address !!}</td>
                                </tr>



                        </table>
                    </td>

                    <td style="border:0px solid; width:305px; padding:10px;" valign="top">
                        <table border="none" style="width:305px;">

                            <tr>
                                <td align="right">Invoice No. #12304</td>

                            </tr>
                            <tr>
                                <td  align="right">{!! \App\Helpers\CommonMethods::formatDate() !!}</td>

                            </tr>
                            <tr>
                                <td  align="right">Submitted By: Mujtaba Ahmad</td>

                            </tr>

                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<table border="1"  style="width:695px; margin-top:60px; margin-left: 07px; border: 1px solid; border-collapse: collapse" cellspacing="3" class="item-table">
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
            <tr class="table-active table-border-double" style="background: #e2e3e3">
                <td colspan="5"><strong>Session #{!! $k+1 !!}</strong></td>
            </tr>
            @if(isset($session->session_items) && $session->count() > 0)
                @foreach($session->session_items as $item)
                    <tr>
                        <td>{!! $item->products->product_title !!}</td>
                        <td>{!! $item->item_quantity !!}</td>
                        <td>$ {!! is_numeric($item->products->product_purchases[0]->price_unit)?number_format($item->products->product_purchases[0]->price_unit,2):$item->products->product_purchases[0]->price_unit !!}</td>
                        <td>$ {!! number_format(trim( $item->item_discount),2 ) !!}</td>
                        <td>$ {!! number_format(trim($item->item_quantity ) * trim( $item->item_price),2 ) !!}</td>
                    </tr>
                    @php
                        $total_price += (trim($item->item_quantity ) * trim( $item->item_price));
 $discount +=trim( $item->item_discount);
                        $paid_price+=((trim($item->item_quantity ) * trim( $item->item_price)) - $item->item_discount);

                    @endphp
                @endforeach
            @else
                <tr class="">
                    <td colspan="5" class="text-danger">No item is added</td>
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
    @endif
    <tr>
        <td colspan="4"  style="text-align:right; padding: 3px"><strong>Total Discount&nbsp;</strong></td>
        <td colspan="1"  style="text-align:right; padding: 3px"><strong>$ {!! number_format($discount,2) !!}</strong></td>
    </tr>
    <tr>
        <td colspan="4"  style="text-align:right; padding: 3px"><strong>Total SGD Exlude VAT</strong></td>
        <td colspan="1"  style="text-align:right; padding: 3px"><strong>$ {!! number_format($total_price,2) !!}</strong></td>
    </tr>

    <tr>

        <td colspan="4"  style="text-align:right">VAT  20%</td>
        @php
        $t = $total_price * 0.20;
        $total_price = $total_price + $t;
        @endphp
        <td colspan="1"  style="text-align:right"><strong>$ {!! number_format($total_price,2) !!}</strong></td>
    </tr>

    <tr>
        <td colspan="4"  style="text-align:right"><strong>Total SGD Incl. VAT & Discount</strong></td>

        <td colspan="1"  style="text-align:right"><strong>$ {!! number_format($total_price-$discount,2) !!}</strong></td>
    </tr>
    </tbody>
</table>


</body>
</head>