
@if(isset($patients) && count($patients) > 0)
    @foreach($patients as $patient)
        <tr>
            <td>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="patient{!! $patient->id !!}"   value="{!! $patient->id !!}" >
                    <label class="custom-control-label" for="patient{!! $patient->id !!}"></label>
                </div>
               </td>
            <td>{!! $patient->patient_unique_id !!}</td>
            <td>


                            <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false">{!! ucwords($patient->patient_name) !!}</a>
                            <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">

                                <a href="/patient/view/{!! $patient->id !!}" class="dropdown-item"><i class="icon-profile"></i> Profile</a>
                                <a href="#!" class="dropdown-item delete-patient"  data-patient-id="{!! $patient->id !!}"><i class="icon-cancel-square2"></i> Delete Patient</a>
                                <div class="dropdown-divider"></div>
                                <a href="/view/treatment-cards/{!! $patient->id !!}" class="dropdown-item"><i class="icon-book2"></i> Treatment Record</a>
                                <a href="#!" class="dropdown-item patient-actions" data-action="sessions" data-patient-id="{!! $patient->id !!}"><i class="icon-history"></i> Past Sessions</a>
                                <div class="dropdown-divider"></div>
                                <a href="/calendar/appointment/{!! $patient->id !!}/{!! strtolower(str_slug($patient->patient_name)) !!}" class="dropdown-item"><i class="icon-plus-circle2"></i> Make Appointment</a>
                                <a href="#!" class="dropdown-item"><i class="icon-alarm"></i>  Pending Appointments</a>
                                <a href="#!" class="dropdown-item patient-actions"  data-action="add-form" data-patient-id="{!! $patient->id !!}"><i class="icon-file-text"></i> Add Form</a>
                                <a href="#!" class="dropdown-item get-media" data-action="media" data-appointment-id="" data-treatment-id="" data-patient-id="{!! $patient->id !!}"><i class="icon-file-media"></i> Add Media</a>
                                <a href="#!" class="dropdown-item patient-actions"  data-action="refer-a-patient" data-patient-id="{!! $patient->id !!}"><i class="icon-link2"></i> Refer Patient </a>
                                <a href="#!" class="dropdown-item patient-actions"  data-action="contact-patient" data-patient-id="{!! $patient->id !!}"><i class="icon-address-book3"></i> Contact Patient </a>

                            </div>





            </td>
            <td>{!! !empty($patient->date_of_birth)?date('d.m.Y',strtotime($patient->date_of_birth)):"" !!}</td>
            <td>{!! $patient->gender !!}</td>
            <td>
                @if(!empty($patient->medicals()->first()))
                    {!! is_array(json_decode($patient->medicals()->first()->illness))?str_replace('_',' ',implode(', ',json_decode($patient->medicals()->first()->illness))):"" !!}
                @endif
            </td>
            <td><div class="purple-text"><i class="icon-flag7"></i> </div> </td>
            <td >
                {!! !empty($patient->appointments()->first())? date('d.m.Y',strtotime($patient->appointments()->first()->booking_date)):"" !!}</a>
            </td>


            <td>{!! $patient->appointments()->count() !!}</td>
            <td>@if($patient->media_files()->count() > 0) <a href="#!" class="get-media" data-patient-id="{!! $patient->id !!}"><i class="icon-file-media"></i></a>   @endif</td>
            <td>{!! date('d.m.Y',strtotime($patient->created_at)) !!}</td>
            <td>
                <div class="ml-3">
                    <div class="list-icons">
                        <div class="list-icons-item dropdown">
                <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-menu7"></i></a>
                <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">

                    <a href="/patient/view/{!! $patient->id !!}" class="dropdown-item"><i class="icon-profile"></i> Profile</a>
                    <a href="#!" class="dropdown-item delete-patient"  data-patient-id="{!! $patient->id !!}"><i class="icon-cancel-square2"></i> Delete Patient</a>
                    <div class="dropdown-divider"></div>
                    <a href="/view/treatment-cards/{!! $patient->id !!}" class="dropdown-item"><i class="icon-book2"></i> Treatment Record</a>
                    <a href="#!" class="dropdown-item patient-actions" data-action="sessions" data-patient-id="{!! $patient->id !!}"><i class="icon-history"></i> Past Sessions</a>
                    <div class="dropdown-divider"></div>
                    <a href="/calendar/appointment/{!! $patient->id !!}/{!! strtolower(str_slug($patient->patient_name)) !!}" class="dropdown-item"><i class="icon-plus-circle2"></i> Make Appointment</a>
                    <a href="#!" class="dropdown-item"><i class="icon-alarm"></i>  Pending Appointments</a>
                    <a href="#!" class="dropdown-item patient-actions"  data-action="add-form" data-patient-id="{!! $patient->id !!}"><i class="icon-file-text"></i> Add Form</a>
                    <a href="#!" class="dropdown-item get-media" data-action="media" data-appointment-id="" data-treatment-id="" data-patient-id="{!! $patient->id !!}"><i class="icon-file-media"></i> Add Media</a>
                    <a href="#!" class="dropdown-item patient-actions"  data-action="refer-a-patient" data-patient-id="{!! $patient->id !!}"><i class="icon-link2"></i> Refer Patient </a>
                    <a href="#!" class="dropdown-item patient-actions"  data-action="contact-patient" data-patient-id="{!! $patient->id !!}"><i class="icon-address-book3"></i> Contact Patient </a>

                </div>
                    </div>
                </div>
                </div>

            </td>
        </tr>
    @endforeach




<script>
    $('.dropdown-button').dropdown();
    total_patients = "{!! $all_patients !!}";
    $(function(){
       var lastScrollTop  = 0;

       var limit = 30;
        $(window).scroll(function(){
            if($(this).scrollTop()==$(document).height() - $(this).height()){



                var st = $(this).scrollTop();
                if (st > lastScrollTop){
                    var searhed_key = $("#search-keywords").val();
                    $.ajax({
                        url:'/get/all/patients?page='+page_number,

                     success:function(response){
                        if(response && response!=""){
                            $("table.patient-list-table > tbody").append(response);
                            page_number++;
                        }
                     }

                    });
                }
                lastScrollTop = st;


            }

        });


        $(".get-media").click(function(){

            var data = {
                patient_id:$(this).attr('data-patient-id'),
                appointment_id:$(this).attr('data-appointment-id'),
                treatment_id:$(this).attr('data-treatment-id')
            };
            $("#get-media").modal();
            $.ajax({
                url:'/get/media',
                data:{"_token":"{!! csrf_token() !!}",data:data},
                type:"post",
                success:function (response) {
                    $(".get-media-show").html(response);

                }
            });
        });

        $("table.patient-list-table .pagination a").click(function (e) {

            var url  = $(this).attr('href');

            if(url){
                $(".overlay").show();
                $(".overlay .progress").show();
                $(".overlay .message").hide();
                $.ajax({
                    url:url,
                    success:function(response){
                        $(".overlay .progress").hide();
                        $(".overlay").hide();
                        $('table.patient-list-table > tbody').html(response);
                    }
                });
            }

            e.stopPropagation();
            e.preventDefault();
        });


        $(".get-pending-appointments").click(function () {
            $("#show-pending-appointment").html('<div class="progress"> <div class="indeterminate"></div></div>');
            var patient_id = $(this).attr('data-patient-id');
            $("#appointment-pending-detail").modal('open');
            $.ajax({
                url: '/get/appointments/patient/' + patient_id,
                success: function (response) {
                    $("#show-pending-appointment").html(response);

                }
            });
        });

        $(".advance-search").click(function(){
            $("#advance-search").modal('open');
        });

        $(".delete-patient").click(function () {
            var ths = $(this);
            var patient_id = $(this).attr('data-patient-id');
            if (confirm('Do you want to delete?')) {
                $.ajax({
                    url: "/patient/delete/" + patient_id,
                    success: function (response) {
                        ths.parent().parent().parent().parent().remove();
                    }
                });
            }
        });


        $("#group-action").on('change', function () {

            if ($(this).val() == "delete-selected") {
                var selected_patient = $(".patient-list-table > tbody input[type=checkbox]:checked").map(function () {
                    return this.value;
                }).get().join(',');
                ;
                $.ajax({
                    url: '/delete/patients',
                    type: "POST",
                    data: {"_token": "{!! csrf_token() !!}", patients: selected_patient},
                    success: function (response) {
                        location.reload();
                    }
                });
            }

            if ($(this).val() == "delete-all") {
                //    var selected_patient = $(".patient-list-table > tbody input[type=checkbox]:checked").map(function() {return this.value;}).get().join(',');;
                $.ajax({
                    url: '/delete/patients',
                    type: "POST",
                    data: {"_token": "{!! csrf_token() !!}", patients: selected_patient},
                    success: function (response) {
                        location.reload();
                    }
                });
            }

        });

        $("#all").change(function () {
            /* if($(this).is(":checked"))
             $(".patient-list-table > tbody input[type=checkbox]").attr('checked','checked');
             else
             $(".patient-list-table > tbody input[type=checkbox]").removeAttr('checked');*/
            $(".patient-list-table > tbody input[type=checkbox]").prop('checked', this.checked);
        });
        $("select.patient_actions").change(function () {
            var ths = $(this);
            var actions = ($(this).val().split('-'));
            var action_type = actions[0];
            var action_id = actions[1];
            if (action_type == "edit") {
                window.location.href = "/patient/edit/" + action_id;
            }

            if (action_type == "delete") {
                if (confirm('Do you want to delete?')) {
                    $.ajax({
                        url: "/patient/delete/" + action_id,
                        success: function (response) {
                            ths.parent().parent().parent().remove();
                        }
                    });
                }

            }

            if (action == "appointment") {
                window.location.href = "/calendar/appointment/" + action_id;
            }
        });
        $("a[role=history]").click(function () {
            const patient_history = new PerfectScrollbar('#patient-history');
            patient_id = $(this).attr('data-patient-id');
            $(".patient-history").animate({right: '0'});
            $.ajax({
                url: "/patient/history/" + patient_id,
                success: function (response) {
                    $("#patient-history").html(response);
                    $(".close-task-panel").click(function () {
                        $("#patient-history").animate({right: '-360px'});

                    });
                }
            });
        });

        $("a.patient-actions").click(function(){
            var action = $(this).attr('data-action');
            patient_id = $(this).attr('data-patient-id');

            switch(action){
                case "treatment-card":
                    $("#patient-treatment-card").modal('open');
                    $.ajax({
                        url:"/patient/treatment-cards/"+patient_id,
                        success:function(response){
                            $(".overlay").hide();
                            $("#patient-treatment-card .modal-content .patient-result").html(response);
                        }
                    });
                    break;
                case "consent-form":
                    $(".patient-consent-show").html('<div class="progress"> <div class="indeterminate"></div></div>');
                    $("#patient-consent").modal('open');
                    //   $("#patient-consent-form").modal('open');
                    $.ajax({
                        url:"/patient/lists/consent/"+patient_id+"/0",
                        success:function(response){
                            $(".patient-consent-show").html(response);
                        }
                    });
                    break;
                case "sessions":
                    $("#sessions").modal('open');
                    $.ajax({
                        url:"/get/sessions/"+patient_id,
                        success:function (response) {
                            $(".patient-consent-show").html(response);
                        }
                    });
                    break;

            }
        });

        $(".add-treament-card").click(function(){
            $("#add-treatment-modal").modal({
                dismissible: true, // Modal can be dismissed by clicking outside of the modal
                opacity: .5, // Opacity of modal background
                inDuration: 300, // Transition in duration
                outDuration: 200, // Transition out duration
                startingTop: '4%', // Starting top style attribute
                endingTop: '10%', // Ending top style attribute

                complete: function() {
                    $(".overlay").show();
                    $("#patient-treatment-card .modal-content .patient-result").html('<div class="progress"> <div class="indeterminate"></div></div>');

                    $.ajax({
                        url:"/patient/treatment-cards/"+patient_id,
                        success:function(response){
                            $(".overlay").hide();
                            $("#patient-treatment-card .modal-content .patient-result").html(response);
                        }
                    });
                } // Callback for Modal close
            });
            $("#add-treatment-modal").modal('open');
            var appointment_id = null;
            $.ajax({
                url:"/treatment/card",
                success:function (response) {
                    $("#treatment-card").html(response);
                    $("#treatment-card input[name=patient_id]").val(patient_id);
                    $("#treatment-card input[name=appointment_id]").val(appointment_id);
                    $("#consent").attr('data-patient-id',patient_id);
                    $("#consent").attr('data-appointment-id',appointment_id);
                }
            });

        });
        $( "#from_date" ).datepicker({ dateFormat: 'dd.mm.yy',
            onSelect: function(dateText, inst) {
                var input_target = inst.input[0].name;

                var from_date = $("#from_date").val();

                var d = from_date.split('.');

                var f = new Date(d[2]+"-"+d[1]+"-"+d[0]);

                $("#to_date").val(from_date);

            }
        });
        function patient_result_template(patient){



            if(patient.id > 0)

                var $patient = $('<div class="patient-container">'+

                    '<div class="avatar"><img src="/public/img/user.svg" alt="user"></div>'+

                    '<div class="patient-info">'+

                    '<h4>'+patient.text+'</h4>'+

                    '<p class="inner-text"><i class="material-icons prefix">fingerprint</i> '+patient.patient_unique_id+'  '+

                    '<i class="material-icons prefix" style="margin-left: 20px">contact_phone</i> '+patient.patient_phone+'</p>'+

                    '</div>'+

                    '</div>');

            else

                var $patient = patient.text;

            return $patient;

        }

    })
</script>
@endif