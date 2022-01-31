<form action="/save/appointment/session" id="session-form" method="post" enctype="multipart/form-data">
    {!! csrf_field() !!}
    <input type="hidden" name="patient_id" value="{!! isset($appointment_session)?$appointment_session->patient_id:'' !!}" />
    <input type="hidden" name="appointment_id" value="{!! isset($appointment_session)?$appointment_session->appointment_id:'' !!}" />
    <input type="hidden" name="session_id" value="{!! isset($appointment_session)?$appointment_session->id:'' !!}" />
    <div class="row">
        <div class="float-left ml-2" style="margin-top:7px"><h6 class="mb-0 font-weight-semibold">
                Area:</h6></div>
        <div class="float-left">

            @php
            $teeth_array = [];
            if(isset($appointment_session)){
            if(!empty($appointment_session->tooth_area))
            $teeth_array = explode(',',$appointment_session->tooth_area);
            }
            @endphp

            <select class="form-control multiselect-link patient-teeth-area" name="tooth_area[]"
                    data-button-width="500" multiple="multiple" data-fouc>
                @if(isset($tooth_areas))
                    @foreach($tooth_areas as $t)
                        <option value="{!! $t->id !!}" @if(isset($appointment_session) && count($teeth_array) > 0 && in_array($t->id,$teeth_array)) selected @endif> {!! $t->name !!} </option>
                    @endforeach
                @endif

            </select>
        </div>
    </div>



    <div class="row">
        <div class="col-sm-12 col-md-6">
            <dl class="mb-0">

                <dt>Complaints</dt>
                <dd class="mb-1" style="text-transform: none">
                    <input type="text" class="form-control tokenfield" name="complaints" placeholder="Add  Complaints" value="{!! isset($appointment_session)?$appointment_session->complaints:'' !!}"/>
                </dd>
                <dt>Findings</dt>
                <dd class="mb-1" style="text-transform: none">
                    <input type="text" class="form-control tokenfield" name="findings" placeholder="Add Findings" value="{!! isset($appointment_session)?$appointment_session->findings:'' !!}"/>
                </dd>
                <dt>Radiographs</dt>
                <dd class="mb-1" style="text-transform: none">
                    <input type="text" class="form-control tokenfield" name="radiographs" value="{!! isset($appointment_session)?$appointment_session->radiographs:'' !!}"/>
                </dd>
                <dt>Pre-Medications</dt>

                <dd class="mb-1" style="text-transform: none">
                    <select class="select2 pre-medication" multiple name="pre_medications[]">
                        <option></option>

                    </select>
                </dd>

                <dt>Materials</dt>

                <dd class="mb-1" style="text-transform: none">
                    <select class="select2 materials" name="materials">
                        <option value="" selected disabled>Select Material</option>
                        @if(isset($materails) && $materails->count() > 0)
                            @foreach($materails as $materail)
                                <option value="{!! $materail->id !!}"  @if(isset($appointment_session)  && $materail->id ==$appointment_session->material_id) selected @endif>{!! $materail->name !!}</option>
                            @endforeach
                        @endif
                    </select>
                </dd>


                <dt>To Order</dt>
                <dd class="mb-1" style="text-transform: none">
                    <input type="text" class="form-control" name="to_order"  value="{!! isset($appointment_session)?$appointment_session->to_order:'' !!}"/>
                </dd>

            </dl>
        </div>
        <div class="col-sm-12 col-md-6">
            <dl class="mb-0">
                <dt>Pre Advice</dt>
                <dd class="mb-1" style="text-transform: none">
                    <input type="text" class="form-control tokenfield" name="pre_advice" placeholder="Add Pre Advice"  value="{!! isset($appointment_session)?$appointment_session->pre_advice:'' !!}"/>
                </dd>
                <dt>Post Treatment Advice</dt>
                <dd class="mb-1" style="text-transform: none">
                    <input type="text" class="form-control tokenfield" name="post_treatment_advice"  value="{!! isset($appointment_session)?$appointment_session->post_treatment_advice:'' !!}"/>
                </dd>
                <dt>Medications</dt>

                <dd class="mb-1" style="text-transform: none">
                    <select class="select2 medication" multiple name="medications[]" >
                        <option></option>

                    </select>
                </dd>
                <dt>Next Visit</dt>
                <dd class="mb-1" style="text-transform: none">
                    <input type="text" class="form-control date" name="next_visit"  value=""/>
                </dd>
                <dt>Lab</dt>
                <dd class="mb-1" style="text-transform: none">
                    <select class="select2 lab" name="lab">
                        <option value="" selected disabled>Select Lab</option>
                        @if(isset($labs) && $labs->count() > 0)
                            @foreach($labs as $lab)
                                <option value="{!! $lab->id !!}">{!! $lab->name !!}</option>
                            @endforeach
                        @endif
                    </select>
                </dd>
                <dt>Communications</dt>
                <dd class="mb-1" style="text-transform: none">
                    <div class="row">
                        <div class="col-sm-1">
                            <div class="form-group">
                                <label>POST</label>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="communication[]"
                                           value="email_receive"
                                           class="custom-control-input"
                                           id="email_receive1">
                                    <label class="custom-control-label"
                                           for="email_receive1"></label>
                                </div>
                            </div>

                        </div>

                        <div class="col-sm-1">
                            <div class="form-group">
                                <label>SMS</label>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="communication[]"
                                           value="sms_receive"
                                           class="custom-control-input"
                                           id="sms_receive1">
                                    <label class="custom-control-label"
                                           for="sms_receive1"></label>
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-1">
                            <div class="form-group">
                                <label>Email</label>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="communication[]"
                                           value="email_receive"
                                           class="custom-control-input"
                                           id="email_receive1">
                                    <label class="custom-control-label"
                                           for="email_receive1"></label>
                                </div>
                            </div>

                        </div>


                    </div>

                </dd>


            </dl>
        </div>



    </div>
    <div class="row">
        <div class="col-md-6">
            <dt>Treatment Done</dt>
            <textarea name="treatment_done" required class="form-control">{!! isset($appointment_session)?$appointment_session->treatment_done:'' !!}</textarea>
        </div>
        <div class="col-md-6">
            <dt>Notes</dt>
            <textarea name="notes" required class="form-control">{!! isset($appointment_session)?$appointment_session->notes:'' !!}</textarea>
        </div>
    </div>

</form>

<script>
    $('.tokenfield').tokenfield();
    $("#current-medications").select2({
        minimumInputLength: 3,
        ajax: {
            url: function (params) {
                return '/get/medications/by/name/' + params.term;
            },
            dataType: 'json',
            delay: 150,
            data: function (params) {
                //   console.log(params);
                var query = {
                    search: params.term,
                }

                // Query parameters will be ?search=[term]&type=public
                return query;
            },

        },
    }).on('change',function(){
        var id  = $(this).val();
        $.ajax({
            url:"/save/current-medication/with/treatment-card",
            type:"POST",
            data:{patient_id:"{!! $patient->id !!}",'_token':"{!! csrf_token() !!}",id:id},
            success:function(response){
                var data = ($("#current-medications").select2('data'));
                var str = "";
                $.each(data,function(i,v){
                    str+='<li class="list-inline-item font-weight-semibold">'+v.text+'</li>';

                });
                $(".list-currnet-medication").html(str);
            }
        });
    });

    $('.illness-history').multiselect({
        buttonClass: 'btn btn-link',
        numberDisplayed: 30,



    });

    $(".date").datepicker({dateFormat: 'dd.mm.yy'});

    $(".referral").select2({
        placeholder: "Search Referral"
    });

    $(".lab").select2({
        placeholder: "Search Lab"
    }).on('change',function(){
        var patient_id = $("#session-form input[name=patient_id]").val();
        var appointment_id = $("#session-form input[name=appointment_id]").val();
        alert(patient_id+" - "+appointment_id);
        $("#add-lab-form").modal();
    });

    $(".materials").select2({
        //placeholder: "Search Materials"
    });

    $(".medication").select2({
        placeholder: "Search medications",

        minimumInputLength: 3,
        ajax: {
            url: function (params) {
                return '/get/medications/by/name/' + params.term;
            },
            dataType: 'json',
            delay: 150,
            data: function (params) {
                //   console.log(params);
                var query = {
                    search: params.term,
                }

                // Query parameters will be ?search=[term]&type=public
                return query;
            },

        },
    });
    $(".pre-medication").select2({
        placeholder: "Search medications",

        minimumInputLength: 3,
        ajax: {
            url: function (params) {
                return '/get/medications/by/name/' + params.term;
            },
            dataType: 'json',
            delay: 150,
            data: function (params) {
                //   console.log(params);
                var query = {
                    search: params.term,
                }

                // Query parameters will be ?search=[term]&type=public
                return query;
            },

        },
    });

    $(".consent").select2({
        placeholder: "Search consent form",
        minimumInputLength: 3,
        ajax: {
            url: function (params) {
                return '/get/consent/by/name/' + params.term;
            },
            dataType: 'json',
            delay: 150,
            data: function (params) {
                //   console.log(params);
                var query = {
                    search: params.term,
                    patient_id : patient_id
                }

                // Query parameters will be ?search=[term]&type=public
                return query;
            },

        },
    });

    $('.patient-flags').multiselect({
        buttonClass: 'btn btn-link',
        numberDisplayed: 8,
        onChange: function () {



            var selectedOptions = jQuery('.patient-flags option:selected');
            var _value = [];;

            var str = "";
            $.each(selectedOptions, function () {

                str += '<li><i class="icon-flag7" style="color: ' + $(this).attr('data-color') + '"></i> </li>';
                _value.push($(this).val());
            });

            $.ajax({
                url:"/save/patient/flags",
                data:{patient_id:patient_id,flags:_value,"_token":"{!! csrf_token() !!}"},
                type:"POST",
                success:function(response){

                }
            });

            $("#selected-flags").html(str);
        }


    });


    $('.patient-teeth-area').multiselect({
        buttonClass: 'btn btn-link',
        numberDisplayed: 8,
        onChange: function () {
            var selectedOptions = jQuery('.patient-teeth-area option:selected');
            var str = "";
            $.each(selectedOptions, function () {

                str += '<li><i class="icon-flag7" style="color: ' + $(this).attr('data-color') + '"></i> </li>';
            });


            $("#patient-teeth-area").html(str);
        }


    });
</script>