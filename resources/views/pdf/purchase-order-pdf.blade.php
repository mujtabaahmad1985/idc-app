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
        @page { margin: 100px 50px 100px  ;border-spacing:0; }
        #header { position: fixed; left: 0px; top: -90px; right: 0px; height: auto;  text-align: center;  }
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
        th{ text-align: left !important;}
    </style>

<body>

<div id="header">

    <table border="0" style="width:700px">
        <tr>
            <td width="150px">
                <img src="images/logo.png" alt="IDCSG" width="150px" style="margin-left: 0px" />
            </td>
            <td width="200px" style="text-align: left; width: 200px"><h1 style="font-size: 20px">Tax Invoice&nbsp;</h1> </td>

        </tr>
    </table>

    <table border="0" style="width: 700px; margin-top: 10px">
        <tr>
            <td width="70%">
                <h3>{!! isset($order->manufactures)?$order->manufactures->name:"" !!}</h3>
                <p>{!! isset($order->manufactures)?nl2br($order->manufactures->address):"" !!}</p>

                <ul style="list-style: none; margin: 0; padding: 0; line-height: 15px">
                    <li>TEL : {!! isset($order->manufactures)?$order->manufactures->phone_number:"" !!}</li>
                    <li>Delivery Note No : 6372-0082</li>
                    <li>Remarks: {!! $order->remarks !!}</li>
                </ul>
            </td>
            <td width="30%" style="vertical-align: text-bottom; text-align: right">
                <h1 style="margin:0; padding:0; font-size: 15px">International Dental Centre.</h1>
                <p style="font-size:10px; text-align:right; margin:0; padding:0">
                    6 Gemmill Ln, Singapore 069249 <br/>
                    +65 6372 0082 <br/>
                </p>
                <ul style="list-style: none; margin: 0; padding: 0; line-height: 15px">
                    <li>Date : 6372-0082</li>
                    <li>Invoice No. : 6372-0082</li>
                    <li>Sale Rep. : 6372-0082</li>
                    <li>Customer No:  6372-0082</li>
                </ul>
            </td>
        </tr>
    </table>

    <table border="1" style="width: 700px; margin-top: 10px; border-collapse: collapse;">
        <tr style="background: #000; color:#FFF">
            <th style="padding: 3px">Item</th>
            <th style="padding: 3px">Description</th>
            <th style="padding: 3px">Expiry</th>
            <th style="padding: 3px">Qty</th>
            <th style="padding: 3px">M. Price</th>

            <th style="padding: 3px">Amt Before D/C</th>
            <th style="padding: 3px">Discount</th>
            <th style="padding: 3px">Amt after D/C</th>

        </tr>
        @if(isset($order) && isset($order->order_items) && $order->order_items->count() > 0)
            @foreach($order->order_items as $item)
            <tr>
                <td style="padding: 3px">{!! $item->item_name !!}</td>
                <td style="padding: 3px">{!! $item->product_description !!}</td>
                <td style="padding: 3px">{!! \App\Helpers\CommonMethods::formatDate($item->expiry_date) !!}</td>
                <td style="padding: 3px">{!! $item->quantity !!}</td>
                <td style="padding: 3px">{!! number_format($item->price,2) !!}</td>
                <td style="padding: 3px">{!! number_format($item->price,2) !!}</td>
                <td style="padding: 3px">{!! number_format($item->discount,2) !!}</td>
                <td style="padding: 3px">{!! number_format($item->price-$item->discount,2) !!}</td>
            </tr>
            @endforeach
            @endif
    </table>
</div>
<div id="footer" style="text-align: center">
    <hr />
    <p style="margin-bottom: 3px; font-size: 12px">Thank You For Visiting Our Clinic.</p>
    <p style="margin-top: 0px">International Dental Center,6 Gemmill Ln, Singapore 069249</p>
</div>



</table>
</body>
</head>