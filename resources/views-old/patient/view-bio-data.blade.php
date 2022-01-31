<div class="row">
    <div class="col-sm-10">

        <div class="table-responsive">
            <table class="table table-borderless table-no-padding">

                <tbody>
                <tr>
                    <td width="160px"><strong>Name: </strong></td>
                    <td>{!! $patient->salutation !!} {!! $patient->first_name !!} {!! $patient->last_name !!}</td>
                </tr>

                <tr>
                    <td><strong>Date of birth: </strong></td>
                    <td> @if(!empty($patient->date_of_birth)){!! date('d.m.Y', strtotime($patient->date_of_birth)) !!}@endif</td>
                </tr>

                <tr>
                    <td><strong>Email: </strong></td>
                    <td><a href="mailto:{!! $patient->patient_email !!}" class="text-danger email">{!! $patient->patient_email !!}</a> </td>
                </tr>

                <tr>
                    <td><strong>Phone: </strong></td>
                    <td>{!! $patient->patient_phone !!}</td>
                </tr>

                @if(!empty($patient->addresses[0]))
                    <tr>
                        <td><strong>Address: </strong></td>
                        <td>{!! $patient->addresses[0]->house_no !!},{!! $patient->addresses[0]->apartments_no !!},{!! $patient->addresses[0]->street_no !!},
                            {!! $patient->city !!}, {!! $patient->addresses[0]->country !!},{!! $patient->addresses[0]->zipcode !!} @if(isset($patient->addresses[0]) && ($patient->addresses->count()) > 1) <a style=" height: 18px; line-height: 17px; font-size: 11px;
"  href="#!" class="btn red white-text view-all-address">Show all address</a>@endif </td>
                    </tr>
                @endif
                <tr>
                    <td><strong>Gender: </strong></td>
                    <td>{!! $patient->gender !!}</td>
                </tr>
                <tr>
                    <td><strong>Occupation: </strong></td>
                    <td>{!! $patient->occupation !!}</td>
                </tr>


                <tr>
                    <td><strong>Company: </strong></td>
                    <td>{!! $patient->comapny_name !!}</td>
                </tr>

                </tbody>

            </table>
        </div>



        <hr />
        <h5>Referral and Insurance Information</h5>
        <div class="table-responsive">
            <table class="table table-borderless table-no-padding">

                <tbody>
                <tr>
                    <td width="160px"><strong>Referral: </strong></td>

                    <td>@if((isset($referral) && !is_null($referral) && !empty($referral)) || !empty($patient->referral_name))
                            @if(isset($referral) && !is_null($referral) && !empty($referral))
                                {{ $referral->patient_unique_id}} - {{ $referral->patient_name}}
                            @endif
                            @if(!empty($patient->referral_name))
                                {{ $patient->referral_name}}
                            @endif
                        @else
                            <span class="red-text">Referral : No Information found</span>
                        @endif</td>
                </tr>
                <tr>
                    <td><strong>Insurance By: </strong></td>
                    <td> @if(!empty($patient->insurance_by) && !empty($patient->insurance_number))
                            {{ $patient->insurance_by }} - {{ $patient->insurance_number }}
                        @else
                            <span class="text-danger">No information found</span>
                        @endif</td>
                </tr>
                </tbody>
            </table>
        </div>

        <hr />
        <h5>Medical  Information</h5>
        @php
            $medi = '';
        if(isset($medical->illness) && !is_null($medical->illness)){
        $m = json_decode($medical->illness);
         if(is_array($m)){
       $medi = isset($medical->illness) && !is_null($medical->illness) && !empty($medical->illness)?implode(', ',json_decode($medical->illness)):'<span class="red-text">No disease found!</span>';


         }
         }



        @endphp
        <div class="table-responsive">
            <table class="table table-borderless table-no-padding">

                <tbody>
                <tr>
                    <td width="160px"><strong>Medications: </strong></td>

                    <td>{!! isset($medical->medication) && !is_null($medical->medication)?$medical->medication:'<span class="text-danger">None!</span>' !!}</td>
                </tr>
                <tr>
                    <td><strong>Allergies: </strong></td>
                    <td> {!! isset($medical->allegric) && !is_null($medical->allegric)?$medical->allegric:'<span class="text-danger">None!</span>' !!}</td>
                </tr>
                <tr>
                    <td><strong>Medical Conditions: </strong></td>
                    <td> @if(!empty($medi)) {!! str_replace('_',' ',$medi) !!} @else <span class="text-danger">None!</span> @endif</td>
                </tr>
                </tbody>
            </table>
        </div>


        <hr />
        <h5>Medical  History</h5>
        <div class="table-responsive">
            <table class="table table-borderless table-no-padding">

                <tbody>
                <tr>
                    <td width="160px"><strong>Medical History: </strong></td>

                    <td>{!! str_replace('_',' ',$history) !!}</td>
                </tr>

                </tbody>
            </table>
        </div>


    </div>
</div>
<script>

    $(".view-all-address").click(function(){
        $("#show-address").modal();
    });
    $("#get-medical-history").click(function(){
        if(!$(this).hasClass('active')) {
            var patient_id = "{!! $patient->id !!}";
            $(".overlay").show();
            $(".overlay .progress").show();
            $(".overlay .message").html('');
            $.ajax({
                url: "/show/profile/medical-history/" + patient_id,
                success: function (response) {
                    $(".overlay .progress").hide();
                    $(".overlay").hide();

                    $("#medical-history-section").html(response);
                }
            });
        }
    });
</script>