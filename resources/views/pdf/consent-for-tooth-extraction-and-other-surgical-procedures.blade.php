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
                    <td style="text-align: center" align="center"><img src={{ url('/'). "/public/images/logo.png"}} height="30px"/> </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td style="text-align: center">
            <h1>Consent For Tooth Extraction And Other Surgical Procedures</h1>
        </td>
    </tr>
    <tr>
        <td class="text" style="padding-top:10px;font-size: 10px; height: 90px; text-align: justify; line-height: 15px" valign="bottom">
            <div> I HEREBY GIVE PERMISSIONS TO</div>
            <div style="width: 380px; border-bottom: 1px solid; text-align: center"> {!! isset($data)?"Dr. ".ucwords($data->doctors->fname.' '.$data->doctors->lname):"" !!}  </div>
            <div> TO PERFORM</div><br />
            THE FOLLOWING PROCEDURES AND SUCH ADDITIONAL PROCEDURES AS PER CONSIDERED NECESSARY ON THE BASIS OF FINDING DURING THE PROCEDURE:

        </td>

    </tr>
    <tr>
        <td  style="font-size: 10px; height: 90px; text-align: justify;" >
            <div style="border-bottom: 1px solid; padding:10px 0 5px 0">{!! isset($data)?$data->consent_forms->name:" " !!}  </div>
            <div style="border-bottom: 1px solid;   padding:10px 0 5px 0">AND/OR :  {!! isset($data)?str_replace(',',', ',$data->addtional_procedures):"" !!} </div>
            <div style="border-bottom: 1px solid;  padding:10px 0 5px 0">&nbsp;</div>
        </td>
    </tr>
    <tr>
        <td style="padding-top:20px;font-size: 10px; height: 30px; text-align: justify; line-height: 15px" valign="bottom">
            I CONSENT FOR THIS TO BE DONE WITH LOCAL ANESTHESIA / INTRAVENOUS SEDATION AND OR RELATIVE ANELGESIA (nitro oxide gas) AND OTHER MEDICATIONS LISTED BELOW:
        </td>
    </tr>
    @php
        $medications = NULL;
            if(isset($data)){
            $medications = explode(',',$data->medications);
            }
    @endphp
    <tr>
        <td style="height: 100px" valign="bottom">
            <table border="0" class="inner">
                <tr>
                    <td class="text" width="50%" style="height: 20px; font-size: 10px">
                        <div >A. </div>
                        <div style="width: 320px ;border-bottom: 1px solid; text-align: center">{!! isset($data) && isset($medications[0])?$medications[0]:"" !!}</div>
                    </td>
                    <td class="text" width="50%" style=" font-size: 10px"> <div >B. </div>
                        <div style="width: 320px ;border-bottom: 1px solid; text-align: center">{!! isset($data) && isset($medications[1])?$medications[1]:"" !!}</div></td>
                </tr>
                <tr>
                    <td class="text" width="50%" style="height: 40px; font-size: 10px">
                        <div >C. </div>
                        <div style="width: 320px ;border-bottom: 1px solid; text-align: center">{!! isset($data) && isset($medications[2])?$medications[2]:"" !!}</div>
                    </td>
                    <td class="text" width="50%" style=" font-size: 10px"> <div >D. </div>
                        <div style="width: 320px ;border-bottom: 1px solid; text-align: center">{!! isset($data) && isset($medications[3])?$medications[3]:"" !!}</div></td>
                </tr>
                <tr>
                    <td class="text" style=" font-size: 10px" colspan="2"><div >E. </div>
                        <div style="width: 650px ;border-bottom: 1px solid; padding-left: 20px;">{!! isset($data) && isset($medications[4])?$medications[4]:"" !!}</div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr style="">
        <td style="font-size: 10px; padding-top: 20px">THE FOLLOWING ALTERNATIVE OPTIONS HAVE BEEN EXPLAINED TO ME: </td>
    </tr>

    <tr>
        <td  style="font-size: 10px; height: 80px; text-align: justify;" >
            <div style="border-bottom: 1px solid; padding:10px 0 5px 0"> &nbsp; {!! isset($data)?str_replace(',',', ',$data->alternative_options):"" !!}</div>
            <div style="border-bottom: 1px solid;  padding:10px 0 5px 0">&nbsp;</div>
        </td>
    </tr>
    <tr>
        <td style="font-size: 10px; height: 60px; text-align: justify; line-height: 15px" valign="bottom">
            THESE ALTERNATIVE METHODS OF TREATMENT ARE PRACTICAL AND POSSIBLE. I AM AWARE THAT @if(isset($data)) <strong>Dr. {!! ucwords($data->doctors->fname.' '.$data->doctors->lname) !!} </strong>  @else  ____________________________ @endif DOES NOT ADVOCATES THE CHANGE OF AMALGAM FILLINGS IN THE ABSENCE OF ANY DENTAL CLINICAL FINDINGS.
            HOWEVER I HAVE CHOSEN THE TREATMENT MENTIONED ABOVE AS THE BEST COURSE OF ACTION FOLLOWING THE ASSESMENT AND RECOMMENDATION BY MY PHYSICIAN:  @if(isset($data)) <strong>Dr. {!! ucwords($data->doctors->fname.' '.$data->doctors->lname) !!} </strong> @else  ____________________________ @endif  I ALSO ACKNOWLEDGE THE ABOVE-NAMED PROCEDURES CARRY CERTAIN COMMON INHERENT RISKS SUCH AS, BUT NOT LIMITED TO:

        </td>
    </tr>

    <tr>
        <td>
            <ol type="A" style="font-size: 10px; line-height: 15px">
                <li>POST-OPERATIVE BLEEDING, INFECTION AND SWELLING.</li>
                <li>NECESSARY REMOVAL OF BONE DURING THE OPERATION WITH POSSIBLE WEAKENING OF THE JAW BONE.</li>
                <li>POSSIBLE INVOLVEMENT OF THE SINUS OF THE UPPER JAW DURING REMOVAL OF UPPER BACK TEETH REOUIRING POSSIBLE SURGERY FOR REPAIR AT A FUTURE DATE
                <li>POSSIBLE INVOLVEMENT OF THE NERVE WITHIN THE LOWER JAW DURING REMOVAL OF LOWER MOLAR TEETH, RESULTING IN USUALLY TEMPORARY BUT POSSIBLE PERMANENT NUMBNESS AND /OR TINGLING IN THE LOWER LIP/TONGUE ON THE RIGHT AND/OR LEFT SIDE. </li>
                <li>POSSIBLE DISLOCATION OF THE TEMPOROMANDIBULAR JOINT AND EVEN FRACTURES IN RARE CIRCUMSTANCES.</li>
                <li>ULCERATION AND BRUISING OF THE LIPS AND CHEEK ON THE SIDE OF THE OPERATION.</li>
                <li>THERE ARE RISKS INVOLVED IN ADMINISTRATION OF ANESTHETICS, ANALGESICS (PAIN MEDICATION) AND ANTIBIOTICS. THE ADMINISTRATION OF THESE DRUGS CAN BRING ABOUT AN ALLERGIC REACTION OR TRIGGER THE ONSET OF A PREVIOUSLY UNDIAGNOSED UNDERLYING SYSTEM CONDITION.
                    IN THIS INSTANCE, REFERRAL AND FURTHER TREATMENT MAY BE REQUIRED BY A SEPARATE MEDICAL DENTAL SPECIALIST OR EVEN HOSPITALIZATION.</li>
            </ol>
        </td>
    </tr>
    <tr>
        <td style="font-size: 10px; height: 60px; text-align: justify; line-height: 15px" valign="bottom">
            I AM AWARE THE PRACTICE OF DENTISTRY AND ORAL MAXILLOFACIAL SURGERY IS A BIOLOGICAL PROCEDURE AND THEREFORE NOT AN EXACT SCIENCE. I ACKNOWLEDGE THAT NO GUARANTEES CAN BE GIVEN TO ME AS TO THE RESULT OF THE PROCEDURES AUTHORIZED ABOVE.
            *I have read and understood the information given to me in the tooth extraction advice and post-operation precaution and advice
        </td>
    </tr>

    <tr >
        <td style="font-size: 10px;  text-align: justify; line-height: 20px">
            <table border="0" class="inner" style="margin-top: 50px">
                <tr>
                    <td>{!! date('d.m.Y') !!}</td>
                    <td></td>
                    <td></td>
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


