<style>

    .show-section-detail .card i, #patient-treatment-card .card i{
        position: relative;
        top: 5px;
        margin-right: 10px
    }

    #patient-treatment-card .card .card-content {
        padding: 15px !important;
    }

    .show-section-detail .card .profile,  #patient-treatment-card .card .profile{
        padding-left: 7px;
        font-size: 0.8rem
    }

    .show-section-detail .card .profile i,  #patient-treatment-card .card .profile i{
        font-size: 1.3rem
    }

    .show-section-detail .card, #patient-treatment-card .card{
        padding-bottom: 10px;
    }

    ul.treatment-record {
        padding-left: 20px;
    }

    ul.treatment-record li {
        width: 45%;
        display: inline-block
    }
    .patient-info .card{ min-height: 215px;}
</style>

        <div class="row patient-info">
            <div class="col s8">
                <div class="card">

                    <div class="card-content">
                        <div class="col s6">
                            <p class="card-title"> <i
                                        class="material-icons prefix">account_box</i> {!! $patient->patient_name !!}</p>
                            <p class="profile"> <i
                                        class="material-icons prefix">fingerprint</i> idcsg-{!! $patient->patient_unique_id !!} </p>
                            <p class="profile"> <i
                                        class="material-icons prefix">cake</i> {!! date('d.m.Y',strtotime($patient->date_of_birth)) !!} </p>
                            <p class="profile"> <i class="material-icons prefix">security</i> {!! $patient->card_number !!} </p>

                        </div>
                        @if(Auth::user()->role=='administrator')
                            @php
                                $numbers = "";
                                                               $more_numbers =  $patient->phones->pluck('contact_number')->all();

                                                            if(($more_numbers) ){
                                                           // dd($more_numbers);
                                                            $numbers = implode(', ',$more_numbers);

                                                            }

                            @endphp
                        <div class="col s6">
                            <p class="card-title"><i
                                        class="material-icons prefix">info</i> Contact Info</p>
                            <p class="profile"> <i
                                        class="material-icons prefix">call</i> {!! $patient->patient_phone !!} {!! $numbers !!}</p>

                            <p class="profile"> <i
                                        class="material-icons prefix">mail</i> {!! $patient->patient_email !!} </p>

                            <p class="profile"> <i class="material-icons prefix">location_on</i> {!! $address !!}
                            </p>
                        </div>
                            @endif

                    </div>

                </div>
            </div>
            <div class="col s4">
                <div class="card">

                    <div class="card-content" style="padding:22px 24px">
                        <p class="profile"> <i class="material-icons prefix">chevron_right</i> <strong> DA: </strong> Pennicilin </p>
                        <p class="profile"> <i class="material-icons prefix">chevron_right</i> <strong>MH: </strong> Heart Attack</p>
                        <p class="profile"> <i class="material-icons prefix">chevron_right</i> <strong>Medication: </strong> Blood  </p>
                        <p class="profile"> <i class="material-icons prefix">chevron_right</i> <strong>Latest X-Rays: </strong> </p>
                        <p class="profile"> <i class="material-icons prefix">chevron_right</i> <strong>Insurance: </strong> </p>
                        <p class="profile"> <i class="material-icons prefix">chevron_right</i> <strong>Notes: </strong> </p>
                    </div>

                </div>
            </div>


</div>


<script>
    $(function () {
        $('.collapsible').collapsible();

    })
</script>