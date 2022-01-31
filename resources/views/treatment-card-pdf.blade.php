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

    <table border="0" style="width:600px">
        <tr>
            <td width="200px">
                <img src="images/logo.png" alt="IDCSG" width="150px" style="margin-left: 0px" />
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

<table border="0" style="width:695px; margin-bottom: 2px; margin-top: -50px">


    <tr>
        <td width="300px" valign="top">
            <h2 style="margin: 30px 0 0 0;">{!! ucwords($patient->salutation.' '.$patient->patient_name)  !!} <small>( {!! $patient->patient_unique_id !!} )</small>
              </h2>
            <small>DOB: {!! \App\Helpers\CommonMethods::formatDate($patient->date_of_birth) !!}</small>
        </td>
        <td align="right" valign="top">
    @if(!empty($patient->addresses[0]))<p style="text-align: right; margin-top: 30px; margin-bottom: 1px;">
                    {!! $patient->addresses[0]->house_no !!},{!! $patient->addresses[0]->apartments_no !!},{!! $patient->addresses[0]->street_no !!},
                {!! $patient->city !!}, {!! $patient->addresses[0]->country !!},{!! $patient->addresses[0]->zipcode !!}</p>
        @endif
        <p style="margin-top: 2px; margin-bottom: 0">{!! $patient->patient_email !!}  {!! $patient->patient_phone !!}</p>

        </td>
    </tr>
</table>
<hr style="margin-bottom: 10px" />
@if(isset($patient_flags))
    <table style="width: auto !important">
        <tr>
            <th>Patient Type </th>
    @foreach($patient_flags as $f)
                <td style="padding: 3px;"> - {!! $f->name !!}</td>
    @endforeach
        </tr>
    </table>
@endif
<table style="width: auto !important; margin-top:10px">
@if(isset($patient->products) && $patient->products->count() > 0)

        <tr>
            <th valign="top">Current Medication </th>
            <td valign="top">
                <ul style="margin-top: 0">
                    @foreach($patient->products as $pre_medical)
                    <li>{!! $pre_medical->product_title !!}</li>
                    @endforeach
                </ul>
            </td>



        </tr>

@endif


@if(isset($patient_medical_history) && $patient_medical_history->count() > 0)

        <tr>
            <th valign="top">Medical History </th>
            <td valign="top">
                <ul style="margin-top: 0">
                    @foreach($patient_medical_history as $patient_history)
                        @php
                            $created_at = \Carbon\Carbon::parse($patient_history->created_at);
                               $created_at->diffForHumans(\Carbon\Carbon::now());
                        $illness_id = isset($patient_history->illness) && !empty($patient_history->illness)?explode(',',$patient_history->illness):NULL;
                       $illness = \App\MedicalConditions::whereIn('id',$illness_id)->pluck('name')->all();

                        @endphp
                        <li><span style="text-decoration: underline; margin-right: 5px">{!! implode(', ',$illness) !!} </span><span style="color: #333">{!! $patient_history->medical_history_text !!}</span></li>
                    @endforeach
                </ul>
            </td>



        </tr>

@endif

@if(isset($allergies_data))

        <tr>
            <th valign="top">Drug Allergy </th>
            <td valign="top">
                <ul style="margin-top: 0">
                    @foreach($allergies_data as $d)

                        <li>{!! \App\Helpers\CommonMethods::formatDate($d['created_at']) !!} - {!! $d['name'] !!}</li>
                    @endforeach
                </ul>
            </td>



        </tr>

@endif


    @if(isset($patient->appointments) && $patient->appointments->count()  > 0)
        <table style="width:695px; margin-bottom: 2px">
        @foreach($patient->appointments as $k=>$appointment)
            <tr>
                <th colspan="2" style="padding:4px 2px; background-color: #ECEEEC">
                    {!! $appointment->doctor_services->service_name !!} with Dr. {!! $appointment->doctors->fname !!} {!! $appointment->doctors->lname !!} {!! \App\Helpers\CommonMethods::formatDate($appointment->booking_date) !!}  {!! date('H:i A',strtotime($appointment->start_time)) !!} - {!! date('H:i A',strtotime($appointment->end_time)) !!}
                </th>
            </tr>
            <tr>
                <td valign="top" style="padding-top: 3px">Treatment Done</td>
                <td valign="top"  style="padding-top: 3px">  @if(isset($appointment->treatment_dones) && $appointment->treatment_dones->count() > 0)
                    <ul style="margin-top: 0">

                        @foreach($appointment->treatment_dones as $done)
                            <li> {!! $done->treatment_description !!}</li>
                        @endforeach
                    </ul>
                          @endif
                </td>
            </tr>
                @if(isset($appointment->appointment_sessions) && $appointment->appointment_sessions->count() > 0)
                    @foreach($appointment->appointment_sessions as $k=>$session)
            <tr>
                <td valign="top">
                    Session at {!! \App\Helpers\CommonMethods::formatDate($session->created_at) !!}
                </td>
                <td valign="top">


                            @php
                                $tooth_area_id = isset($session)?$session->tooth_area:"";

                                $ids = "";
                                $tooth_areas="";
                                if(!empty($tooth_area_id)){
                                    $ids = explode(',',$tooth_area_id);
                                    $t = \App\ToothAreas::whereIn('id',$ids)->pluck('name')->toArray();
                                    $tooth_areas = implode(', ',$t);
                                }

                            @endphp
                    <ul style="margin-top: 0">
                        <li>Teeth Area: {!! implode(', ',$t); !!}</li>
                        @if($session->complaints)
                        <li>Complaint: {!! $session->complaints !!}</li>
                        @endif
                        @if($session->findings)
                            <li>Finding: {!! $session->findings !!}</li>
                        @endif
                        @if($session->radiographs)
                            <li>Radiographs: {!! $session->radiographs !!}</li>
                        @endif
                        @if($session->pre_advice)
                            <li>Pre-Advice: {!! $session->pre_advice !!}</li>
                        @endif

                        @if($session->pre_medications)
                            @php
                                $pre_medications_id = isset($session)?$session->pre_medications:"";

                                $pre_medications = "";
                                if(!empty($pre_medications_id)){
                                    $ids = explode(',',$pre_medications_id);
                                    $p = \App\Products::whereIn('id',$ids)->pluck('product_title')->toArray();
                                  //  dd($p);

                                  //  dd($pre_medications);
                                }
                            @endphp
                            <li>Pre-Medications: {!! implode(',',$p) !!}</li>
                        @endif
                        @if($session->post_treatment_advice)
                            <li>Post Treatment Advice: {!! $session->post_treatment_advice !!}</li>
                        @endif

                        @if($session->medications)
                            @php
                                $pre_medications_id = isset($session)?$session->medications:"";

                                $medications = "";
                                if(!empty($pre_medications_id)){
                                    $ids = explode(',',$pre_medications_id);
                                    $p = \App\Products::whereIn('id',$ids)->pluck('product_title')->toArray();
                                  //  dd($p);
                                    $medications = implode(',',$p);
                                  //  dd($pre_medications);
                                }
                            @endphp
                            <li>Medications: {!! implode(',',$p); !!}</li>
                        @endif

                        @if($session->materials)
                            <li>Materials: {!! isset($session->materials)?$session->materials->name:"" !!}</li>
                        @endif

                        @if($session->labs)
                            <li>Labs: {!! isset($session->labs)?$session->labs->name:"" !!}</li>
                        @endif

                        @if($session->to_order)
                            <li>To Order: {!! $session->to_order !!}</li>
                        @endif
                        @if($session->next_visit)
                            <li>Next Visit: {!! \App\Helpers\CommonMethods::formatDate($session->next_visit) !!}</li>
                        @endif


                    </ul>
                    @if(isset($session->session_items) && $session->count() > 0)
                    <ul style="margin-top: 10px">
                        @foreach($session->session_items as $item)
                        <li>{!! $item->products->product_title !!} - ${!! is_numeric($item->products->product_purchases[0]->price_unit)?number_format($item->products->product_purchases[0]->price_unit,2):$item->products->product_purchases[0]->price_unit !!} </li>
                            @endforeach
                    </ul>
                        @endif


                </td>
            </tr>
                    @endforeach
                @endif
            @endforeach
    </table>
        @endif



</table>
</body>
</head>