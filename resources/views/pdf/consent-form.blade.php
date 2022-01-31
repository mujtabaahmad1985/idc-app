<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head><meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <meta name="x-apple-disable-message-reformatting" />

    <style>
        html {
            -webkit-text-size-adjust: none;
        }


        body {
            font-size:14px;
            font-family:Arial, Helvetica, sans-serif
        }
        @page {
            margin: 30px 60px;
            border-spacing:0;
        }
        table.main,table.inner{
            border-collapse:collapse;
            width:700px;
            border-spacing: 0;

            margin:0 auto;
        }
        h1{ font-size:18px; font-weight: normal}
        tr {
            border-spacing:0
        }
        table td {
            border-spacing:0;
            margin:0;
        }
        .text div{
            display: inline-block; font-weight: normal}
        </style>
</head>
            <body>
                <table border="0" class="main">
                    <tr>
                        <td>
                            <table border="0" class="inner">
                                <tr>
                                    <td style="text-align: center" align="center"><img src={{ url('/'). "/public/images/logo.png"}} height="60px"/> </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center">
                            <h1>Consent For {!! $array['consent_for'] !!}</h1>
                        </td>
                    </tr>
                    <tr>
                        <td class="text" style="font-size: 10px; height: 90px; text-align: justify; line-height: 20px" valign="bottom">
                            <div> I HEREBY GIVE PERMISSIONS TO</div> <div style="width: 380px; border-bottom: 1px solid; text-align: center"> Dr {!! $array['doctor_name'] !!} </div><div>B.D.S TO PERFORM</div><BR />
                            THE FOLLOWING PROCEDURES AND SUCH ADDITIONAL PROCEDURES AS PER CONSIDERED NECESSARY ON THE BASIS OF FINDING DURING THE PROCEDURE:
                        </td>
                    </tr>

                    <tr>
                        <td  style="font-size: 10px; height: 90px; text-align: justify;" >
                            <div style="border-bottom: 1px solid; padding:10px 0 5px 0">&nbsp;  {!! $array['procedures'] !!}</div>
                            <div style="border-bottom: 1px solid;   padding:10px 0 5px 0">AND/OR :  {!! !is_null($array['addtional_procedures'])&&is_array($array['addtional_procedures'])&&(count($array['addtional_procedures']) > 0)?implode(', ',$array['addtional_procedures']):$array['addtional_procedures'] !!}</div>
                            <div style="border-bottom: 1px solid;  padding:10px 0 5px 0">&nbsp;</div>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size: 10px; height: 30px; text-align: justify; line-height: 20px" valign="bottom">
                            I CONSENT FOR THIS TO BE DONE WITH LOCAL ANESTHESIA / INTRAVENOUS SEDATION AND OR RELATIVE ANELGESIA (nitro oxide gas) AND OTHER MEDICATIONS LISTED BELOW:
                        </td>
                    </tr>
                    <tr>
                        <td style="height: 100px" valign="bottom">
                            <table border="0" class="inner">
                                <tr>
                                    <td class="text" width="50%" style="height: 40px; font-size: 10px">
                                        <div >A. </div>
                                        <div style="width: 300px ;border-bottom: 1px solid; text-align: center">{!! $array['medications'][0] !!}</div>
                                    </td>
                                    <td class="text" width="50%" style=" font-size: 10px"> <div >B. </div>
                                        <div style="width: 300px ;border-bottom: 1px solid; text-align: center">{!! $array['medications'][1] !!}</div></td>
                                </tr>
                                <tr>
                                    <td class="text" width="50%" style="height: 40px; font-size: 10px">
                                        <div >C. </div>
                                        <div style="width: 300px ;border-bottom: 1px solid; text-align: center">{!! $array['medications'][2] !!}</div>
                                    </td>
                                    <td class="text" width="50%" style=" font-size: 10px"> <div >D. </div>
                                        <div style="width: 300px ;border-bottom: 1px solid; text-align: center">{!! $array['medications'][3] !!}</div></td>
                                </tr>
                                <tr>
                                    <td class="text" style=" font-size: 10px" colspan="2"><div >E. </div>
                                        <div style="width: 650px ;border-bottom: 1px solid; padding-left: 20px;"> {!! $array['medications'][4] !!}</div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr style="margin-top: 10px">
                        <td style="font-size: 10px">THE FOLLOWING ALTERNATIVE OPTIONS HAVE BEEN EXPLAINED TO ME: </td>
                    </tr>

                    <tr>
                    <td  style="font-size: 10px; height: 80px; text-align: justify;" >
                        <div style="border-bottom: 1px solid; padding:10px 0 5px 0"> &nbsp; {!! $array['alternative_options'] !!}</div>
                        <div style="border-bottom: 1px solid;  padding:10px 0 5px 0">&nbsp;</div>
                    </td>
                    </tr>
                    <tr>
                        <td style="font-size: 10px; height: 60px; text-align: justify; line-height: 20px" valign="bottom">
                            THESE ALTERNATIVE METHODS OF TREATMENT ARE PRACTICAL AND POSSIBLE. BUT I HAVE CHOSEN THE TREATMENT MENTIONED ABOVE. I ALSO
                            CERTIFY THE REASON WHY THE ABOVE NAME PROCEDURES CARRY CERTAIN COMMON INHERENT RISKS SUCH AS, BUT NOT LIMITED TO:
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <ol type="A" style="font-size: 10px; line-height: 20px">
                                <li>POST-OPERATIVE PAIN AND SENSITIVITY</li>
                                <li>TEMPOROMANDIBULAR JOINT PAIN AND TENDERNESS</li>
                                <li>THE PLACEMENT OF ANY CROWN / BRIDGE / VENEER DOES NOT PREVENT ANY FURTHER DECAY OR FURTHER TREATMENT AT A LATER STAGE.</li>
                                <li>THERE ARE RISKS INVOLVED IN ADMINISTRATION OF ANESTHETICS, ANALGESICS (PAIN MEDICATIONS) AND ANTIBIOTICS. THE ADMINISTRATION OF THESE DRUGS CAN BRING OUT AN ALLERGIC REACTION OR
                                TRIGGER THE ONSET OF A PREVIOUSLY UNDIAGNOSED UNDERLYING SYSTEM CONDITION. IN THIS INSTANCE, REFERRAL AND FURTHER TREATMENT MAY BE REQUIRED
                                BY A SEPARATE MEDICAL / DENTAL SPECIALIST OR EVEN HOSPITALIZATION.</li>
                            </ol>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size: 10px; height: 60px; text-align: justify; line-height: 20px" valign="bottom">
                            I AM AWARE THE PRACTICE  OF DENTISTRY IS A BIOLOGICAL PROCEDURE AND THEREFORE NOT EXACT SCIENCE. I ACKNOWLEDGE THAT NO GUARANTEES CAN BE GIVEN TO ME  AS TO THE RESULT
                             OF THE PROCEDURES AUTHORIZED ABOVE.
                        </td>
                    </tr>
                    <tr >
                        <td style="font-size: 10px;  text-align: justify; line-height: 20px">
                            <table border="0" class="inner" style="margin-top: 50px">
                                <tr>
                                    <td>{!! date('d.m.Y') !!}</td>
                                    <td>{!! $array['patient_name'] !!}</td>
                                    <td>@if(!empty($array['patient_signature']))<img src="{!! $array['patient_signature'] !!}" style="width: 150px" /> @endif </td>
                                </tr>
                                <tr>
                                    <td width="25%" style="border-top: 1px solid">DATE</td>
                                    <td width="50%" style="border-top: 1px solid">NAME</td>
                                    <td width="25%" style="border-top: 1px solid">SIGNATURE</td>
                                </tr>

                            </table>
                        </td>


                    </tr>
                </table>

            </body>
</html>


