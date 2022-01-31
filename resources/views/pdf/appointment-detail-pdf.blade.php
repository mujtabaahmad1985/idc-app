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
          width:708px;border-spacing: 2px; margin:0;
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
            border:0px solid; padding:1px 1px
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

    <table border="0" style="width:600px">
        <tr>
            <td width="200px">
                <img src="{!! env('APP_URL') !!}images/logo.png" alt="IDCSG" width="150px" style="margin-left: 0px" />
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


<hr style="margin-bottom: 10px" />

    <h2 style="margin: 30px 0 0 0;">{!! ucwords($patient->salutation.' '.$patient->patient_name)  !!} <small>( {!! $patient->patient_unique_id !!} )</small>
    </h2>
    <small>DOB: {!! \App\Helpers\CommonMethods::formatDate($patient->date_of_birth) !!}</small>
    <p>You have an appointment with following information: </p>

<table style="margin-top: 30px; margin-left: -15px">
    @php
        $appointment = $patient->appointments[0];
    @endphp
    <tr>
        <td  width="15%" align="left" style="text-align: left; margin: 0; padding: 0">
            @php
                $url = env('APP_URL')."appointment/update/status/checkin?q=".time().'a='.\Illuminate\Support\Str::uuid($appointment->id).'&appointment='.$appointment->id;
            @endphp
            {!! \Milon\Barcode\DNS2D::getBarcodeHTML($url, 'QRCODE',2,2); !!}
        </td>
        <td valign="top">
            <table style=" width: 100%" cellspacing="10" cellpadding="10" >

                <tr>
                    <td width="15%" style="height:13px; background-color:#eeeeee; padding: 2px" >Appointment: </td>
                    <td  width="60%" style="padding-left: 5px"> {!! $appointment->doctor_services->service_name !!}</td>

                </tr>
                <tr>
                    <td  style="height:13px; background-color:#eeeeee; padding: 2px">Doctor with: </td>
                    <td style="padding-left: 5px">Dr. {!! $appointment->doctors->fname !!} {!! $appointment->doctors->lname !!} </td>
                </tr>

                <tr>
                    <td  style="height:15px; background-color:#eeeeee; padding: 2px">Room: </td>
                    <td style="padding-left: 5px"> {!! $appointment->rooms->name !!}</td>
                </tr>
                <tr>
                    <td style="height:13px; background-color:#eeeeee; padding: 2px">Location: </td>
                    <td style="padding-left: 5px"> {!! $appointment->locations->name !!}</td>
                </tr>
                <tr>
                    <td  style="height:13px; background-color:#eeeeee; padding: 2px">DateTime: </td>
                    <td style="padding-left: 5px"> {!! \App\Helpers\CommonMethods::formatDate($appointment->booking_date) !!}  {!! date('H:i A',strtotime($appointment->start_time)) !!} - {!! date('H:i A',strtotime($appointment->end_time)) !!}</td>
                </tr>
            </table>
        </td>

    </tr>

</table>


</body>
</head>