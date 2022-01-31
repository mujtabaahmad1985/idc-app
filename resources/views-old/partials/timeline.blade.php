<style>
    #patient-history .card i{ position: relative;
        top:5px; margin-right: 10px}
    #patient-history .card .profile{ padding-left:7px; font-size: 0.8rem}
    #patient-history .card .profile i{ font-size: 1.3rem}
    #patient-history .card{ padding-bottom: 10px;}
    #patient-history ul.treatment-record{ padding-left: 20px;}
    #patient-history ul.treatment-record li{ width: 45%; display: inline-block}

    #patient-history ul.extra-treatment-record{ padding-left: 20px;}
    #patient-history ul.extra-treatment-record li{ padding-right:20px; display: inline-block}
    #patient-history .dropdown-content{
        height:76px !important;    min-width: 57px !important; }
    #patient-history  .dropdown-content li{ height: 37px !important}
    .event ul.dropdown-content{ left:  auto !important; width:100px !important;}
    .event ul.dropdown-content i{ top:0 !important;}

</style>

<div class="row">
    <div class="col s6">
        <div class="card">

            <div class="card-content">
                <p class="card-title"> <i class="material-icons prefix">account_box</i> {!! $patient->patient_name !!}</p>
                <p class="profile"> <i class="material-icons prefix">fingerprint</i> idcsg-{!! $patient->patient_unique_id !!} </p>
                <p class="profile"> <i class="material-icons prefix">cake</i> {!! date('d.m.Y',strtotime($patient->date_of_birth)) !!} </p>
                <p class="profile"> <i class="material-icons prefix">security</i> {!! $patient->card_number !!} </p>
                <p class="profile"> <i class="material-icons prefix">local_post_office</i> {!! $address !!}
                </p>
            </div>

        </div>
    </div>
    <div class="col s6">
        <div class="card">

            <div class="card-content">
                <p class="profile m-top-10"> <i class="material-icons prefix">chevron_right</i> <strong> DA: </strong> Pennicilin </p>
                <p class="profile"> <i class="material-icons prefix">chevron_right</i> <strong>MH: </strong> Heart Attack</p>
                <p class="profile"> <i class="material-icons prefix">chevron_right</i> <strong>Medication: </strong> Blood  </p>
                <p class="profile"> <i class="material-icons prefix">chevron_right</i> <strong>Latest X-Rays: </strong> </p>
                <p class="profile"> <i class="material-icons prefix">chevron_right</i> <strong>Insurance: </strong> </p>
                <p class="profile"> <i class="material-icons prefix">chevron_right</i> <strong>Notes: </strong> </p>
            </div>

        </div>
    </div>

</div>

<div class="card">
    <div class="card-content">
<div class="main-container">
    <section id="timeline" class="timeline-outer">
        <div class="container">
            <div class="row">
                <div class="col s12 m12 l12">

                    <ul class="timeline">
                        @if(isset($treatments) && !is_null($treatments) && isset($treatments[0]))
                            @foreach($treatments as $key=>$treatment)
                        <li class="event" data-date="{!! date('d.m.Y H:i',strtotime($treatment->created_at)) !!}">
                            <div class="col s2 right">
                                <a class='dropdown-button' href='#' data-activates='treatment-action-dropdown{!! $treatment->id !!}'> <i class="material-icons">more_vert</i></a>
                                <ul id='treatment-action-dropdown{!! $treatment->id !!}' class='dropdown-content' style="width: 43px !important; height: 76px !important; left: auto !important;">
                                    @if(in_array(15,$permissions_allowed) || Auth::user()->role=='administrator')
                                    <li><a href="#!" class="edit" data-treatment-id="{!! $treatment->id !!}"><i class="material-icons">create</i> &nbsp; Edit</a></li>
                                    @endif
                                    <li><a href="#!" class="delete"  data-treatment-id="{!! $treatment->id !!}"><i class="material-icons">delete</i> &nbsp; Delete</a></li>
                                </ul>
                            </div>
                            <div style="clear:both"></div>
                               <ul class="treatment-record">
                                @if($key==0)
                                <li><i class="material-icons prefix">chevron_right</i> <strong> Last Visit: </strong> {!! date('d.m.Y',strtotime($appointments->created_at)) !!}</li>
                                @endif
                                    <li><i class="material-icons prefix">chevron_right</i> <strong> Treatment Done: </strong> {!! $treatment->treatment_done !!}</li>
                                    @if(!empty($treatment->finding))
                                    <li><i class="material-icons prefix">chevron_right</i> <strong> Finding: </strong> {!! $treatment->finding !!}</li>
                                    @endif
                                    @if(!empty($treatment->x_rays))
                                    <li><i class="material-icons prefix">chevron_right</i> <strong> X-Rays: </strong> {!! $treatment->x_rays !!}</li>
                                    @endif
                                    @if(!empty($treatment->complaint))
                                    <li><i class="material-icons prefix">chevron_right</i> <strong> Complaint: </strong> {!! $treatment->complaint !!}</li>
                                    @endif
                                    @if(!empty($treatment->recall))
                                    <li><i class="material-icons prefix">chevron_right</i> <strong> Recall: </strong> {!! $treatment->recall !!}</li>
                                    @endif
                                    @if(!empty($treatment->advice))
                                    <li><i class="material-icons prefix">chevron_right</i> <strong> Advice: </strong> {!! $treatment->advice !!}</li>
                                    @endif
                                    @if(!empty($treatment->pre_med))
                                    <li><i class="material-icons prefix">chevron_right</i> <strong> Pre-Meds: </strong> {!! $treatment->pre_med !!}</li>
                                    @endif
                                    @if(!empty($treatment->post_treatment_advice))
                                        <li><i class="material-icons prefix">chevron_right</i> <strong> Post Treatment Advice: </strong> {!! $treatment->post_treatment_advice !!}</li>
                                    @endif
                                    @if(!empty($treatment->medication))
                                        <li><i class="material-icons prefix">chevron_right</i> <strong> Medicine: </strong> {!! $treatment->medication !!}</li>
                                    @endif
                            </ul>



                            <ul class="extra-treatment-record m-top-10">

                                <li><a href="#!"  class="consent" data-treatment-id="{!! $treatment->id !!}"><i class="material-icons prefix">description</i> Patient Consent</a> </li>
                                <li><a href="#!" class="product" data-treatment-id="{!! $treatment->id !!}"><i class="material-icons prefix">local_pharmacy</i> Products</a> </li>
                                @if($key==0)
                                <li><a href="#!" class="next-appointment"  data-treatment-id="{!! $treatment->id !!}"><i class="material-icons prefix">date_range</i> Next Appointment</a> </li>
                                @endif
                                <li>
                                    <p>
                                        <input type="checkbox" class="filled-in" id="filled-in-box{!! $treatment->id !!}" />
                                        <label for="filled-in-box{!! $treatment->id !!}">Dental Treatment Complete</label>
                                    </p>
                                </li>
                            </ul>

                        </li>
                            @endforeach
                    @endif
                    </ul>
                </div>
            </div>
        </div>
    </section>

</div>
    </div>
</div>

<script>
    $(function(){
        $('.dropdown-button').dropdown();

        $("#patient-history .edit").click(function () {
            var id = $(this).attr('data-treatment-id');
            $("#add-treatment-modal").modal('open');

            $.ajax({
                url:"/treatment/detail/"+id,
                success: function (response) {
                    $("#treatment-card").html(response);
                }
            });
        });

        $(".extra-treatment-record .product").click(function () {

            $("#saved-product-modal").modal('open');
            var id = $(this).attr('data-treatment-id');
            $.ajax({
                url:"/treatment/products/"+id,
                success: function (response) {
                    $("#product-saved").html(response);
                }
            });
        });

        $(".extra-treatment-record .consent").click(function () {

            $("#consent-modal").modal('open');
            var id = $(this).attr('data-treatment-id');
            $.ajax({
                url:"/treatment/consent/"+id,
                success: function (response) {
                    $("#consent-saved").html(response);
                }
            });
        });

    })
</script>