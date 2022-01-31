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
                @if(in_array(44,$permissions_allowed) || Auth::user()->role=='administrator')
                <tr>
                    <td><strong>Email: </strong></td>
                    <td><a href="mailto:{!! $patient->patient_email !!}" class="text-danger email">{!! $patient->patient_email !!}</a> </td>
                </tr>

                <tr>
                    <td><strong>Phone: </strong></td>
                    <td>{!! $patient->patient_phone !!}</td>
                </tr>

                @if(isset($patient->addresses))
                    <tr>
                        <td><strong>Address: </strong></td>
                        <td>
                            <ul class=" m-0 mt-1 p-0" style="list-style: none">
                            @foreach($patient->addresses as $k=>$address)

                                  <li class="@if($k==0 && $patient->addresses->count() > 1)border-bottom @endif pb-1 pt-1">  {!! $address->house_no !!},{!! $address->apartments_no !!},{!! $address->street_no !!},
                                    {!!$address->city !!}, {!! $address->country !!},{!! $address->zipcode !!}</li>


                        @endforeach</ul>
                        </td>
                    </tr>
                @endif
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