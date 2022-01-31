@extends('layout.app')
@section('page-title') Update Staff @endsection
@section('css')

@endsection

@section('content')
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">{!! $staffs->first_name.' '.$staffs->last_name !!}</span> -  Edit</h4>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none">
                <div class="d-flex justify-content-center">
                    <a href="#" class="btn btn-link btn-float text-body"><i class="icon-bars-alt text-primary"></i><span>Dashboard</span></a>
                    <a href="/staffs" class="btn btn-link btn-float text-body"><i class="icon-user text-primary"></i><span>Staffs</span></a>
                </div>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="/dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Dashboards</a>
                    <a href="/staffs" class="breadcrumb-item">Staffs</a>
                    <span class="breadcrumb-item active">{!! $staffs->first_name.' '.$staffs->last_name !!} -  Edit</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>


        </div>
    </div>

    <div class="content">
        <form id="form" method="post" action="/staff/save" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name="staff_id" id="staff_id"  value="{!! $staffs->id !!}" />

            <div class="card">


                <div class="card-body">
                    <div class="container">





                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <label>Salutation</label>
                                <select name="salutation" class="select2 form-control">
                                    <option value="Mr" {!! $staffs->salutation=="Mr"?"selected":"" !!}>Mr</option>
                                    <option value="Mrs"  {!! $staffs->salutation=="Mrs"?"selected":"" !!}>Mrs</option>
                                    <option value="Miss"  {!! $staffs->salutation=="Miss"?"selected":"" !!}>Miss</option>
                                    <option value="Dr" {!! $staffs->salutation=="Dr"?"selected":"" !!}>Dr</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="first_name">First Name</label>
                                    <input id="first_name" name="first_name" type="text"   value="{!! $staffs->first_name !!}"   required  class="alphanumaric long-value-restriction form-control">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <input id="last_name" name="last_name" type="text" value="{!! $staffs->last_name !!}"   required  class="alphanumaric long-value-restriction form-control">
                                </div>
                            </div>
                        </div>
                        @php
                            $year = $month = $day = "";
                            if(!empty($staffs->date_of_birth)){
                             $d = explode('-',$staffs->date_of_birth);

                            $year = $d[0];
                            $month = $d[1];
                            $day = $d[2];
                            }

                        @endphp
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="last_name">Date of Birth</label>
                                    <select name="day" id="day-date-of-birth" required>
                                        <option value=""> Day</option>
                                        @for($m=1; $m<=31; ++$m){
                                        <option  @if($m==$month) selected @endif value="{!! $m !!}">{!! $m !!}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="month-date-of-birth" style="visibility: hidden" class="">Date of Birth </label>
                                    <select name="month" id="month-date-of-birth" required>
                                        <option value=""> Month</option>
                                        @for($m=1; $m<=12; ++$m){
                                        <option @if($d==$day) selected @endif  value="{!! $m !!}">{!!  date('F', mktime(0, 0, 0, $m, 1)) !!}</option>
                                        @endfor
                                    </select>

                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="year-date-of-birth" style="visibility: hidden" class="">Date of Birth </label>
                                    <select name="year" id="year-date-of-birth" required>
                                        <option value="">Year</option>
                                        @for($i=2016; $i>=1910; $i--)
                                            <option @if($i==$year) selected @endif value="{!! $i !!}">{!! $i !!}</option>
                                        @endfor
                                    </select>

                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="last_name">Gender</label>
                                    <select name="gender" id="gender" class="gender">
                                        <option value="">Choose Gender</option>
                                        <option value="Male"  @if($staffs->gender=='Male') selected @endif>Male</option>
                                        <option value="Female" @if($staffs->gender=='Female') selected @endif>Female</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="last_name">User Role</label>
                                    <select name="role" id="role" class="role">
                                        <option value="">Choose Role</option>
                                        <option value="administrator"  @if($staffs->users->role=='administrator') selected @endif>Super Admin</option>
                                        <option value="subadmin"  @if($staffs->users->role=='sub-admin') selected @endif>Sub Admin</option>
                                        <option value="receptionist"  @if($staffs->users->role=='receptionist') selected @endif>Receptionist</option>
                                        <option value="staff"  @if($staffs->users->role=='staff') selected @endif>Staff</option>
                                        <option value="finance"  @if($staffs->users->role=='finance') selected @endif>Finance</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="last_name">Code</label>
                                    <select class="icons" name="country_area_code" id="country_area_code">
                                        <option value="">Choose Country</option>
                                        @foreach($countries as $country)
                                            <option @if($current_country==$country->name || $staffs->phone_code === $country->code) selected  @endif value="{!! $country->code !!}" data-code="{!! $country->code !!}" class="left circle">{!! $country->name !!} ( +{!! $country->code !!} )</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="last_name">Number</label>
                                    <input id="contact_number" name="contact_number" value="{!! $staffs->contact_number !!}"   type="text" class="alphanumaric long-value-restriction form-control">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="last_name">Email</label>
                                    <input id="email" name="email" type="email" value="{!! $staffs->users->email !!}" required  class="validate form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="last_name">Choose Nationality</label>
                                    <select class="icons" name="nationality" >
                                        <option value="">Choose Nationality</option>
                                        @foreach($countries as $country)
                                            <option value="{!! $country->name !!}" @if( $staffs->nationality === $country->name) selected  @endif data-icon="/public/flags/{!! strtolower($country->short_name) !!}.svg" class="left circle">{!! $country->name !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="last_name">ID No</label>
                                    <input id="id_no" name="id_no" type="text"  value="{!! $staffs->id_no !!}"  class="alphanumaric form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="last_name">Start Date</label>
                                    <input id="start_date" name="start_date" type="text" placeholder="dd.mm.YYYY" value="{!! !empty($staffs->start_date)?date('d.m.Y',strtotime($staffs->start_date)):"" !!}"   class="alphanumaric datetimepicker form-control">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="end_date">End Date</label>
                                    <input id="end_date" name="end_date" type="text" placeholder="dd.mm.YYYY"  value="{!! !empty($staffs->end_date)?date('d.m.Y',strtotime($staffs->end_date)):"" !!}"  class="alphanumaric datetimepicker form-control">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="last_name">City</label>
                                    <input id="city" name="city" type="text"  value="{!! $staffs->city !!}"   class="alphanumaric form-control">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="last_name">State</label>
                                    <input id="state" name="state" type="text" value="{!! $staffs->state !!}"  class="alphanumaric form-control">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="last_name">Zipcode</label>
                                    <input id="zipcode" name="zipcode"  value="{!! $staffs->zip_code !!}"    class="alphanumaric form-control" type="text" >
                                </div>
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-md-12 text-center">
                                <a class="btn btn-danger save-user red" href="#!" id="selenium-add-patient-save"><i class="icon-floppy-disk mr-1"></i> Save</a>
                                <a class="btn btn-danger cancel-user red" href="#!" id="selenium-add-patient-cancel"><i class="icon-undo mr-1"></i> Cancel</a>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-success success-message mt-2"></div>
                                <div class="alert alert-danger error-message mt-2"></div>
                            </div>
                        </div>

                    </div>
                </div>


            </div>


        </form>
    </div>



@endsection


@section('js')
    {!! Html::script('public/js/jquery.form.js') !!}
    {!! Html::script('public/js/jquery-ui.js') !!}
    {!! Html::script('public/plugins/jquery.validate/js/jquery.validate.min.js') !!}
    {!! Html::script('public/material/js/plugins/dropify/js/dropify.min.js') !!}
    {!! Html::script('public/material/plugins/select2/js/select2.min.js') !!}
    <script>

$(function(){

    $("#month-date-of-birth").select2().change(function(){
        var year = $("#year-date-of-birth").val();
        var days = new Date(year, $(this).val(), 0).getDate();
        // $("#day-date-of-birth").select2('destroy');
        $("#day-date-of-birth").html('');
        for(var i=1;i<=days;i++){
            var data = {
                id: i,
                text: i
            };

            var newOption = new Option(data.text, data.id, false, false);
            $('#day-date-of-birth').append(newOption).trigger('change');

        }
        //$("#day-date-of-birth").select2();
    });


    $("#country_area_code").select2();

    $( "#start_date" ).datepicker({ dateFormat: 'dd.mm.yy',

        changeMonth: true,
        changeYear: true,
        yearRange: '-100:+0',
        onSelect: function(dateText, inst){
            $("#end_date").datepicker("option","minDate",
                $("#start_date").datepicker("getDate"));
        }
    });

    $( "#end_date" ).datepicker({ dateFormat: 'dd.mm.yy',

        changeMonth: true,
        changeYear: true,
        yearRange: '-100:+0'
    });
    /*$("#date_of_birth").focusout(function(){
        var d = $(this).val().split('.');
        var new_date = new Date(d[1]+"."+d[0]+"."+d[2]);
        //alert(new_date);

        $(this).datepicker("setDate",new Date(new_date));
    });*/



    $("select").select2();

    $(".remove-file").click(function(e){
        var id = $(this).attr('data-id');
        var ths = $(this);
        $.ajax({
            url:"/document/delete/"+id,
            success:function () {
                ths.parents('.files').remove();
            }
        });

        e.preventDefault();
    });
    var _target = null;
    $(".upload-document").click(function () {
        $("input[name=document_type]").val($(this).attr('data-type'));
        _target = $(this).parent().parent().find('.add-file-here');
        $("input[name=document_file]").click();
    });

    $("input[name=document_file]").change(function () {
        //var file = $("input[name=document_file]")[0].files;
        //console.log(file[0].name);
        $("#upload-file").ajaxForm(function (response) {
            response = $.parseJSON(response);
            var str = '<div class="row files"><div class="col s11 m-top-5"><a class="truncate" href="/public/uploads/documents/'+response.document_name+'" download="'+response.document_name+'">' + response.document_name + '</a></div><div class="col s1 m-top-5"><button class="remove-file" data-id="' + response.id + '"><i class="material-icons">delete</i></button></div></div>';
            _target.html(str);
            $(".remove-file").click(function(e){
                var id = $(this).attr('data-id');
                var ths = $(this);
                $.ajax({
                    url:"/document/delete/"+id,
                    success:function () {
                        ths.parents('.files').remove();
                    }
                });

                e.preventDefault();
            });
        }).submit();


    });


    $("#country_area_code").on('change', function () {
        var val = $(this).val();

        $('#contact_number').val("+"+val);
    });



    $( ".datepicker" ).datepicker({ dateFormat: 'dd.mm.yy' });
var timeoutId;
   /* $('#form input, #form textarea,#form select').on('input propertychange change', function() {

        var first_name = $("#first_name").val();
        if(first_name=="") return false;

      //  var email = $("#email").val();
      //  if(email=="") return false;
        //if(!validateEmail(email)) return false;
        clearTimeout(timeoutId);
        timeoutId = setTimeout(function() {
            // Runs 1 second (1000 ms) after the last change
            //$(".progress").show();
            $(".ajax-loading").hide();
            if($("#form").valid()){
            $("#form").ajaxForm(function(response){
                $(".progress").hide();
                $(".ajax-loading").show();
                $("#staff_id").val(response);
                $("#document_staff_id").val(response);
                setTimeout(function(){
                    $(".ajax-loading").hide();
                },1000);
            }).submit();
        }
        }, 2000);
    });*/
    $(".save-user").click(function(e){
        $(".alert").hide();
        $(".message ").hide();
        $validation = $("#form").validate({
            // Validation rules
            // Selecting input by name attribute
            rules: {




            },
            // Error messages
            messages: {
                service_name: "Servoce name is required",
                description: "Description is required ",
                buffer_time: "Buffer time is required ",
                price: "Price is required ",
                duration: "Duration is required ",

            },
            highlight: function(element, errorClass, validClass) {
                $(element).closest('.form-group').addClass('has-error').find('label').addClass('control-label');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).closest('.form-group').removeClass('has-error');
            },
            // Class that wraps error message
            errorClass: "error",
            focusInvalid: true,
            // Element that wraps error message
            errorElement : 'label',
            errorPlacement: function(error, element) {
                var placement = $(element).data('error');
                if (placement) {
                    $(placement).append(error)
                } else {
                    error.insertAfter(element);
                }
            },
            success: function(helpBlock) {
                if( $(helpBlock).closest(".form-group").hasClass('has-error') ){
                    $(helpBlock).closest(".form-group").removeClass("has-error").addClass("has-success");
                }
            }
        });

        jQuery.validator.addMethod("alphanumeric", function(value, element) {
            return this.optional(element) || /^[a-z\d\+\-_.()\s]+$/i.test(value);
        }, "Letters, numbers, and underscores only please");

        jQuery.validator.addMethod("validate_date", function(value, element) {
            return this.optional(element) || /^(\d{1,2})(\.|-)(\d{1,2})(\.|-)(\d{4})$/i.test(value);
        }, "Enter date as dd.mm.yy or dd.mm.yyyy please");

        $('.alphanumaric').each(function() {
            $(this).rules('add', {
                alphanumeric: true,
                messages: {
                    alphanumeric:  "Letters, numbers, and underscores only please",
                }
            });
        });
        $('.date-validate').each(function() {
            $(this).rules('add', {
                validate_date: true,
                messages: {
                    alphanumeric:  "Enter date as  dd.mm.yyyy please",
                }
            });
        });

        if($("#form").valid()){

            if( $("#form").valid()) {
                // alert();
                $(".overlay").show();
                $("#form").ajaxForm(function (response) {
                    response = $.parseJSON(response);
                    $(".overlay").hide();
                    if(response.type=="success"){

                        $(".success-message").html('Saved . An email has been sent for verification');
                        $(".success-message").show();
                        setTimeout(function () {
                            $(".success-message").hide();
                            window.location='/staffs';
                        }, 2500);
                    }else if(response.type=="update"){
                        $(".success-message").html('Information is updated successfully.');
                        $(".success-message").show();
                        setTimeout(function () {
                            $(".success-message").hide();
                            window.location='/staffs';
                        }, 2500);
                    }else{
                        $(".error-message").html(response.message);
                        $(".error-message").show();
                    }

                }).submit();
            }
        }
        e.preventDefault();
    });
    $("input[name=contact_number],.contact_number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [187,107,46, 8, 9, 27, 13, 110, 190]) !== -1 ||
            // Allow: Ctrl+A, Command+A
            (e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) ||
            // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
            // let it happen, don't do anything
            return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
})


function validateEmail(sEmail) {

    var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

    if (filter.test(sEmail)) {
         return true;
    }

    else {
         return false;

    }
}

    </script>
    {{--{!! Html::script('public/demo/demo-form-layouts.js') !!}--}}
@endsection