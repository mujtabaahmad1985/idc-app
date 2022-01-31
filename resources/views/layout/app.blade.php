<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-TileColor" content="#00bcd4">
      <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
    <title>@yield('page-title') : IDC </title>
    {{--{!! Html::style('https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic') !!}--}}
    {!! Html::style('https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900') !!}
    {!! Html::style('/bootstrap/css/icons/icomoon/styles.min.css') !!}
    {!! Html::style('/bootstrap/css/icons/fontawesome/styles.min.css') !!}
    {!! Html::style('/bootstrap/assets/css/bootstrap.min.css') !!}
    {!! Html::style(url('/').'/bootstrap/assets/css/bootstrap_limitless.min.css') !!}
    {!! Html::style(url('/').'/bootstrap/assets/css/layout.min.css') !!}
    {!! Html::style(url('/').'/bootstrap/assets/css/components.min.css') !!}
    {!! Html::style(url('/').'/bootstrap/assets/css/colors.min.css') !!}

    {!! Html::style(url('/').'/material/js/plugins/sweetalert/sweetalert.css') !!}
    {!! Html::style(url('/').'/css/jquery.typeahead.css') !!}



    @yield('css')
    <style>
        .pagination{
            margin-bottom: 10px; margin-top: 10px; justify-content: center;
        }
        .js-typeahead{
            border-radius: 30px !important;
            background: #eee !important;
            border: #fafafa !important;
            padding-left: 20px !important;
            padding-top: 10px !important;
        }
        td.fc-day.fc-past {
            background-color: #EEEEEE;
        }
        #header input{ width: calc(100% - 17px) !important;}
        #header .collection .collection-item{ color: #eafaf9; line-height: 16px;}
        #header .collection .collection-item.avatar{ min-width: 50px; padding-left: 55px; padding-top: 10px; min-height: 40px}
        #header .collection .collection-item{ padding: 2px 10px; width: 100%;}
        #header .collection .collection-item.avatar .title{ font-size: 13px;}
        #header .circle{ width: 24px; height: 24px;}
        .header-search-wrapper{ margin: 4px auto 0 258px; !important;}
         .typeahead__container{background: #FFF; width: 100% !important; }
        #header .typeahead__container.result{height: 300px;
            max-height: 400px; overflow: auto;}
        #header .collection{ margin: 0px}
        #header .typeahead__item > a{ background: #FFF; padding: 0}
        #header .typeahead__list.collection{ border: 1px solid #F00}
        .content {
            padding: 18px 10px;
        }
        .card {
            margin-bottom: 0.70rem;
        }
        .navbar-brand img {
            height: 1.5rem;
            display: block;
        }
        *{ text-transform: capitalize}
        .nav-group-sub .nav-link {
            padding: .125rem 1.25rem .125rem 3.5rem;
        }
        .form-group {
            margin-bottom: .5rem !important;
        }
        .alert{ display: none}
        input[type=email],.email{ text-transform: lowercase !important;}
        label.error{     font-size: 0.7rem;
            color: #fd2802;}
        table.table-no-padding td,table.table-no-padding th{
            padding: 0 1.25rem !important;
        }
        .theme_radar .pace_activity {
            display: inline-block;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            border: 2px solid transparent;
            border-top-color: #F00;
            border-bottom-color: #F00;
        }
        .theme_radar {
            position: absolute;
            top: 50%;
            left: 50%;
            /* right: 0; */
            /* margin-top: -15px; */
            /* color: black; */
            z-index: 1234;
            display: none;
            /* background: red; */
        }
        label.error,div.error{ font-size: 12px;
            color: #ff0000;}
        .ui-datepicker .ui-datepicker-calendar td a, .ui-datepicker .ui-datepicker-calendar td span{
            min-width: 0.12503rem;
        }
        .sidebar:not(.bg-transparent) .card:not([class*=bg-]):not(.fixed-top){
            background:#FFF;
        }

        .table td, .table th{
            padding: 0.25rem 1.25rem;
        }

        @media (max-width: 1440px) and (min-width: 1281px){

            .sidebar {


                width: 14.875rem;

            }
        }

        @media (max-width: 1281px) and (min-width: 1024px){

            .sidebar {


                width: 13.875rem;

            }
        }
        @media (max-width: 1280px) {

            .ui-datepicker .ui-datepicker-calendar td {
                text-align: center;
                padding: 0px;
                font-size: 12px;
            }
        }

        #past-session-modal table td { vertical-align: top}

    </style>

</head>
<body class="@if(Route::currentRouteName() == 'messagess') sidebar-xs @else navbar-top @endif">
<div class="theme_radar">
    <div class="pace_progress" data-progress-text="60%" data-progress="60"></div>
    <div class="pace_activity"></div>
</div>
@include('partials.header')
@php
    if (getenv('HTTP_CLIENT_IP'))
             $ipaddress = getenv('HTTP_CLIENT_IP');
         else if(getenv('HTTP_X_FORWARDED_FOR'))
             $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
         else if(getenv('HTTP_X_FORWARDED'))
             $ipaddress = getenv('HTTP_X_FORWARDED');
         else if(getenv('HTTP_FORWARDED_FOR'))
             $ipaddress = getenv('HTTP_FORWARDED_FOR');
         else if(getenv('HTTP_FORWARDED'))
             $ipaddress = getenv('HTTP_FORWARDED');
         else if(getenv('REMOTE_ADDR'))
             $ipaddress = getenv('REMOTE_ADDR');
         else
             $ipaddress = 'UNKNOWN';
         $ch = curl_init();

         $ipaddress = "39.41.183.69";
         // set url
         curl_setopt($ch, CURLOPT_URL, "http://ip-api.com/json/".$ipaddress);

         //return the transfer as a string
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

         // $output contains the output string
         $output = curl_exec($ch);

         // close curl resource to free up system resources
         curl_close($ch);
        $data = json_decode($output);
        //dd($data);
        $timezone ="Asia/Karachi";
        if($data)
        $timezone =  $data->timezone;

$dateTimeZone = new DateTimeZone($timezone);
$dateTime = new DateTime("now", $dateTimeZone);
$offset = $dateTimeZone->getOffset($dateTime); //3600=1hr
 //global $offset;
$offset = $offset/3600;


date_default_timezone_set($timezone);


@endphp
<!-- Page content -->
<div class="page-content">

    @if(Auth::User()->role=='administrator' )
        @include('inc.super-admin-sidebar')
        @elseif(Auth::User()->role=='hospital' || Auth::User()->role=='staff' || Auth::user()->role=='receptionist'|| Auth::user()->role=='subadmin')
        @include('inc.sidebar')
    @elseif(Auth::User()->role=='doctor')
        @include('inc.doctor-sidebar')
    @elseif(Auth::User()->role=='patient')
        @include('inc.patient-sidebar')
    @else
        @include('inc.sidebar')
    @endif
    <div class="content-wrapper">

        @yield('content')
        @include('partials.footer')

    </div>
</div>
<style>
    .sidebar-xs card{
        display: none !important;
    }
</style>
<div id="get-media" class="modal fade">
    <div class="modal-dialog" style="max-width:90% !important;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Media Files</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body get-media-show">

            </div>


        </div>
    </div>
</div>

<div id="get-media" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Media Files</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h6 class="card-title">My Tasks</h6>

                        <div class="header-elements">
                            <span class="badge bg-indigo-400">43 new</span>
                        </div>
                    </div>

                    <div class="card-body">
                        <ul class="media-list mb-3">
                            <li class="media">
                                <div class="mr-3">
                                    <div class="uniform-checker" id="uniform-task1"><span class=""><input type="checkbox" class="form-input-styled" id="task1" checked="" data-fouc=""></span></div>
                                </div>

                                <div class="media-body">
                                    <h6 class="media-title">
                                        <label for="task1" class="font-weight-semibold cursor-pointer mb-0">Resplendent much during</label>
                                    </h6>

                                    Urchin that understood yikes special ladybug that
                                </div>
                            </li>

                            <li class="media">
                                <div class="mr-3">
                                    <div class="uniform-checker" id="uniform-task2"><span class="checked"><input type="checkbox" class="form-input-styled" id="task2" data-fouc=""></span></div>
                                </div>

                                <div class="media-body">
                                    <h6 class="media-title">
                                        <label for="task2" class="font-weight-semibold cursor-pointer mb-0">Insect far hound</label>
                                    </h6>

                                    Hey where more that much meanly shivered salamander
                                </div>
                            </li>

                            <li class="media">
                                <div class="mr-3">
                                    <div class="uniform-checker" id="uniform-task3"><span class=""><input type="checkbox" class="form-input-styled" id="task3" data-fouc=""></span></div>
                                </div>

                                <div class="media-body">
                                    <h6 class="media-title">
                                        <label for="task3" class="font-weight-semibold cursor-pointer mb-0">The him father parish</label>
                                    </h6>

                                    Reran sincere said monkey one slapped jeepers
                                </div>
                            </li>


                        </ul>


                    </div>
                </div>
            </div>


        </div>
    </div>
</div>



<div id="add-media" class="modal fade">
    <div class="modal-dialog" style="max-width:90% !important;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Media</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body show-media">

            </div>


        </div>
    </div>
</div>


<div id="patient-consent-modal" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Patient's Consent</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body" id="patient-consent-result">

            </div>


        </div>
    </div>
</div>

<div id="patient-consent-form" class="modal" style="width: 535px !important">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Patient's New Consent Form</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body" id="patient-consent-new-result">

            </div>


        </div>
    </div>
</div>

<div id="appointment-pending-detail" class="modal">
    <div class="modal-dialog modal-lg"  style="max-width: 75%" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pending Appointments </h5>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>

            <div class="modal-body">


            </div>
        </div>
    </div>

</div>


<div id="appointment-show-detail" class="modal fade">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Appointment's Detail</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div id="show-appointment">
                    <div class="progress"> <div class="indeterminate"></div></div>
                </div>
            </div>


        </div>
    </div>
</div>

<div id="past-session-modal" class="modal">
    <div class="modal-dialog" style="max-width: 75%">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Past Session </h5>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>

            <div class="modal-body"></div>


        </div>
    </div>
</div>

<div id="patient-contact-modal" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Patient Contacts </h5>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>

            <div class="modal-body">
                <ul class="list-group list-group-flush border-top">

                </ul>
            </div>


        </div>
    </div>
</div>

<div id="refer-patient-modal" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Refer a Patient </h5>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>

            <div class="modal-body">
                <form id="referral-form" method="POST" action="/refer/a/patient" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="referral_id" />
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="form-group">

                                <select class="patient validate form-control input-sm" autocomplete="off" name="patient_select" data-error=".errorTxt2"></select>
                            </div>
                        </div>


                        <div class="col-sm-3">
                            <div class="form-group">

                                <button class="btn btn-danger refer-patient" style="width:100%;">Refer Patient</button>
                            </div>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-12">
                            <div class="alert bg-success text-white alert-success-refer">

                                <p></p>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="alert bg-danger text-white alert-error-refer">

                                <p></p>
                            </div>
                        </div>

                    </div>
                </form>
            </div>


        </div>
    </div>
</div>



<input style="display: none;" type="file" name="profile_picture" id="profile_picture"/>

<div id="upload-profile-image-modal" class="modal fade" style="width:400px !important;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Profile Picture</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>

<div  class="modal "  >
    <div class="modal-content">
        <div class="row">

            <h4 class="left"> </h4>
            <div class="col s1 right-align no-padding right">
                <a href="#!" class="modal-action modal-close"><i class="material-icons">close</i></a>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <div id="image_profile" style="width:350px; margin-top:30px"></div>
            </div>
        </div>
        <div class="row">
            <div class="col s12 center">
                <button class="btn btn-success crop_image">Crop & Upload Image</button>
            </div>
        </div>


    </div>

</div>

</body>

{!! Html::script(url('/').'/bootstrap/js/main/jquery.min.js') !!}
{!! Html::script(url('/').'/bootstrap/js/main/bootstrap.bundle.min.js') !!}

{!! Html::script(url('/').'/bootstrap/js/plugins/loaders/blockui.min.js') !!}
{!! Html::script(url('/').'/bootstrap/js/plugins/visualization/d3/d3.min.js') !!}
{!! Html::script(url('/').'/bootstrap/js/plugins/visualization/d3/d3_tooltip.js') !!}
{!! Html::script(url('/').'/bootstrap/js/plugins/forms/styling/switchery.min.js') !!}
{!! Html::script(url('/').'/bootstrap/js/plugins/forms/selects/bootstrap_multiselect.js') !!}

{!! Html::script(url('/').'/bootstrap/js/plugins/ui/moment/moment.min.js') !!}
{!! Html::script(url('/').'/bootstrap/js/plugins/pickers/daterangepicker.js') !!}
{!! Html::script(url('/').'/bootstrap/js/plugins/forms/selects/select2.min.js') !!}
{!! Html::script(url('/').'/material/js/plugins/sweetalert/sweetalert.min.js') !!}
{!! Html::script(url('/').'/bootstrap/js//plugins/forms/styling/uniform.min.js') !!}
{!! Html::script(url('/').'/bootstrap/js/plugins/extensions/jquery_ui/widgets.min.js') !!}
{!! Html::script(url('/').'/bootstrap/js/plugins/notifications/bootbox.min.js') !!}
{!! Html::script(url('/').'/material/js/dropzone.js') !!}
{!! Html::script(url('/').'/bootstrap/assets/js/app.js') !!}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.3/perfect-scrollbar.min.js" integrity="sha512-X41/A5OSxoi5uqtS6Krhqz8QyyD8E/ZbN7B4IaBSgqPLRbWVuXJXr9UwOujstj71SoVxh5vxgy7kmtd17xrJRw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    console.log("{!! date('Y-m-d H:i:s') !!}");
    var my_permissions = $({{ $permissions_json}});

    var window_width = $(window).width();

    if(window_width < 1280){
        $(".navbar-top").addClass('sidebar-xs');
    }

    $(window).on('resize', function(){
        var win = $(this); //this = window

        if (win.width() < 1280) {
            $(".navbar-top").addClass('sidebar-xs');
        }else{
            $(".navbar-top").removeClass('sidebar-xs');
        }
    });

    $(function(){
       // swal("Here's a message!", "It's pretty, isn't it?")

        $("body").on('click','.print-form',function () {
            var id = $(this).data('id');

            window.location.href = "/consent/form/print/"+id;
        });


        $("body").on('click','.delete-form',function () {
            var id = $(this).data('id');

            bootbox.confirm({
                title: 'Confirmation',
                message: 'Do you want delete?.',
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-primary'
                    },
                    cancel: {
                        label: 'Cancel',
                        className: 'btn-link'
                    }
                },
                callback: function (result) {
                    if(result){
                        $.ajax({
                            url:"/delete/consent",
                            type:'POST',
                            data:{
                                id:id,
                                '_token':"{!! csrf_token() !!}"
                            },
                            success:function (response) {
                                $(".nav-link.active.show").parent().remove();
                                $("#bordered-tab1").html('');
                            }
                        });
                    }

                }
            });

        });

        $("body").on('click','.edit-form',function () {
            var id = $(this).data('id');

            $.ajax({
                url:"/edit/consent",
                type:'POST',
                data:{
                    id:id,
                    '_token':"{!! csrf_token() !!}"
                },
                success:function (response) {
                    $("#bordered-tab1").html(response);
                }
            });
        });

        $("body").on('click','.appointment-actions',function(){
            var action = $(this).data('action');
            var appointment_id = $(this).data('id');
            switch (action) {
                case "view":
                    $("#appointment-show-detail").modal();


                    $.ajax({
                        url:"/show/appointment/"+appointment_id+"?type=view",
                        success: function(doc){
                            $("#show-appointment").html(doc);
                            $("#show-appointment .list-icons").remove();


                        }
                    });
                    break;
                case "reschedule":

                    $("#appointment-edit-detail").modal();
                    $.ajax({
                        url:"/appointment/edit/"+appointment_id,
                        success:function(response){
                            $("#edit-appointment").html(response);
                            $("#edit-patient-name").html("Edit Appointment");
                        }
                    });
                    break;
            }
        });


        $("body").on('click','.patient-actions',function () {
            var action = $(this).data('action');
            var patient_id = $(this).data('patient-id');
            switch(action){
                case "sessions":
                    $.ajax({
                        url:"/past/session/"+patient_id,
                        success:function (response) {
                            $("#past-session-modal .modal-body").html(response);
                            $("#past-session-modal").modal();
                        }
                    });
                    break;
                case "pending-appointment":
                    $.ajax({
                        url:"/pending/appointments/"+patient_id,
                        success:function (response) {
                            $("#appointment-pending-detail .modal-body").html(response);
                            $("#appointment-pending-detail").modal();
                        }
                    });

                    break;
                case "add-form":
                    //    $(".patient-consent-show").html('<div class="progress"> <div class="indeterminate"></div></div>');
                    $("#patient-consent-modal").modal();

                    //   $("#patient-consent-form").modal('open');
                    $.ajax({
                        url:"/patient/lists/consent/"+patient_id+"/0",
                        success:function(response){
                            $("#patient-consent-result").html(response);

                            $(".add-new-consent-form").data('patient-id',patient_id);
                        }
                    });
                    break;
                case "refer-a-patient":
                    $("input[name=referral_id]").val(patient_id);
                    $("#refer-patient-modal").modal();
                    break;
                case "contact-patient":
                    $("#patient-contact-modal .modal-body ul").html('');
                    $.ajax({
                        url:"/patient/contact/"+patient_id,
                        success:function (response) {
                            $.each(response,function (i,v) {
                                if(i!='Address'){
                                    var str =" <li class=\"list-group-item\">\n" +
                                        "                            <span class=\"font-weight-semibold\">"+i+":</span>\n" +
                                        "                            <div class=\"ml-auto\">"+v+"</div>\n" +
                                        "                        </li>\n";
                                    $("#patient-contact-modal .modal-body ul").append(str);
                                }

                                if(i=="Address"){

                                    $.each(v,function (k,m) {

                                        var str =" <li class=\"list-group-item\">\n" +
                                            "                            <span class=\"font-weight-semibold\">Address:</span>\n" +
                                            "                            <div class=\"ml-auto\">"+m+"</div>\n" +
                                            "                        </li>\n";
                                        $("#patient-contact-modal .modal-body ul").append(str);
                                    })
                                }

                            });

                            $("#patient-contact-modal").modal();
                        }
                    });

                    break;
            }
        });

        $("body").on('click','.image-view',function (e) {
            e.preventDefault();
            var links = $('#attachments').find('.img-thumbnail');
            window.blueimpGallery(links, {
                container: '#blueimp-gallery-example-container',
                carousel: true,
                hidePageScrollbars: true,
                disableScroll: true,
                index: this
            });
        });
        $('.form-control-datepicker').datepicker({
            onSelect: function(dateText, inst) {
                $("#full-calendar").fadeOut('100');
                dateText = new Date(dateText);

                calendar.fullCalendar('changeView', 'agendaDay');
                calendar.fullCalendar('gotoDate',dateText);
                $("#full-calendar").fadeIn('100');

            }
        });


	     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

        $(".change-profile-picture").click(function(){
            $("#profile_picture").click();
        });

        $('#profile_picture').on('change', function(){
            var reader = new FileReader();
            reader.onload = function (event) {
                $image_crop.croppie('bind', {
                    url: event.target.result
                }).then(function(){
                    console.log('jQuery bind complete');
                });
            }
            reader.readAsDataURL(this.files[0]);
            $('#upload-profile-image-modal').modal();
        });

        $(".add-new-folder").click(function(){
            $("input[name=add_new_folder]").val('');
            $("#add-new-folder").modal();
        });

        $(".save-new-folder").click(function(e){
            var str = "";
            if($("#folder-form").valid()){
                $("#folder-form").ajaxForm(function (response) {
                    response = $.parseJSON(response);
                    console.log(response.data);
                    $.each(response.data,function(i,v){
                       str+='<li class="media folder" data-id="'+v.id+'">\n' +
                           '                            <div class="mr-3">\n' +
                           '                                <a href="#">\n' +
                           '                                    <img src="/bootstrap/images/folder.svg" class="" width="32" height="32" alt="">\n' +
                           '                                </a>\n' +
                           '                            </div>\n' +
                           '\n' +
                           '                            <div class="media-body">\n' +
                           '                                <p class="media-title font-size-md font-weight-bold">'+v.folder_name+'</p>\n' +
                           '</div>' +
                           '                               <div class="ml-3 mt-1 mr-1" >'+
                          ' <div class="list-icons">'+
                            '<a href="#" class="list-icons-item caret-0 edit-folder " data-id="'+v.id+'" data-toggle="dropdown" aria-expanded="false"><i class="icon-pencil font-size-xs"></i></a>'+
                        '<a href="#" class="list-icons-item caret-0 delete-folder" data-id="'+v.id+'" data-toggle="dropdown" aria-expanded="false"><i class="icon-trash  font-size-xs text-danger-600"></i></a>'+


                        '</div>'+
                       '</div>' +

                           '</li>';

                    });
                    $(".documents").html(str);
                    $("#add-new-folder").modal('hide');
                }).submit();
            }
            e.preventDefault();

        });


        /*$( "#datepicker_outside_calendar" ).datepicker({dateFormat: 'dd.mm.yy',
            onSelect: function(dateText, inst) {



            }
        }).datepicker("setDate", new Date());
        ;*/
      //$('.modal').modal();


        $("input[name=start_time]").focusout(function(){
                var its_time = $(this).val();

                //#9e9e9e
            if (its_time.indexOf(':') == -1) {
                // will not be triggered because str has _..
                var a = its_time.split('');
                var t = a[0]+a[1]+":"+a[2]+a[3];
                if (!/^\d{2}:\d{2}$/.test(t)) return false;
                var parts = t.split(':');
              //  alert(parts);
                if (parts[0] > 23 || parts[1] > 59) {
                    $(this).val('');
                    $(this).css({"border-bottom":"1px solid #e53935"});
                    return false;
                }
                $(this).css({"border-bottom":"1px solid #9e9e9e"});
                $(this).val(t);
            }
        });
        /*$('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 100, // Creates a dropdown of 15 years to control year,
            today: 'Today',
            format: 'dd.mm.yyyy',
            clear: 'Clear',
            close: 'Ok',
            closeOnSelect: false, // Close upon selecting a date,
            //min: [1930],
          //  max:[new Date().getFullYear()]
        });*/

      //  $('#slide-out').niceScroll({cursorcolor:"#F00"});

    })

</script>
@yield('js')
{!! Html::script(url('/').'/material/js/plugins.min.js') !!}
{!! Html::script(url('/').'/js/jquery.typeahead.min.js') !!}
        <script>

            $(".datepicker").focusout(function(){
               var d = $(this).val().split('.');
               var new_date = new Date(d[1]+"."+d[0]+"."+d[2]);
                 //alert(new_date);

                $(this).datepicker("setDate",new Date(new_date));
            });
            $(".add-media").click(function(){

                var data = {
                    patient_id:$(this).attr('data-patient-id'),
                    appointment_id:$(this).attr('data-appointment-id'),
                    treatment_id:$(this).attr('data-treatment-id')
                };
                $("#add-media").modal();
                $.ajax({
                    url:'/add/media',
                    data:{"_token":"{!! csrf_token() !!}"},
                    type:"post",
                    success:function (response) {
                        $(".show-media").html(response);
                        $("#my-awesome-dropzone").dropzone({ url: "/upload/media",
                            maxFilesize: 1,

                            sending:function(file, xhr, formData){


                                formData.append('_token','{!! csrf_token() !!}' );
                                formData.append('patient_id',data.patient_id );
                                formData.append('appointment_id',data.appointment_id );
                                formData.append('treatment_id',data.treatment_id );

                            },});
                    }
                });
            });

            $("body").on("click",".get-media",function () {
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



            $(".change-password").click(function () {
                $("#change-password-panel").html('<div class="progress"> <div class="indeterminate"></div></div>');
                $("#change-password").modal();

                $.ajax({
                    url:"/user/password/change",
                    success:function (response) {
                        $("#change-password-panel").html(response);
                    }
                });
            });
            $.typeahead({
                input: ".js-typeahead",
                order: "asc",
                minLength: 3,
                maxItem: 20,
                dynamic: true,
                emptyTemplate: 'No result for "@{{query}}"',
                display:"display",
                template:search_template('icon-user-tie','@{{text}}','Patient'),
                source: {
                    patient: {
                        href:"/patient/view/@{{id}}" ,
                        ajax: function (query) {
                            return {
                                url: "/search/patient",
                                type:"get",
                                path: "data.patient",
                                data: {
                                    q: query,
                                    keyword:$(".js-typeahead").val()

                                }
                            }
                        },

                        // Ajax Request

                    },
                    doctors: {
                        display:"text",
                        template:search_template('icon-user-tie','@{{text}}','Doctor'),

                        ajax: function (query) {
                            return {
                                url: "/search/doctors",
                                type:"get",
                                path: "data.doctors",
                                data: {
                                    q: query,
                                    keyword:$(".js-typeahead").val()

                                }
                            }
                        },
                        // Ajax Request

                    },
                    services: {
                       // href:"http://google.com",
                        display:"text",
                        template:search_template('icon-database-upload','@{{text}}','Services'),
                        ajax: function (query) {
                            return {
                                url: "/search/services",
                                type:"get",
                                path: "data.services",
                                data: {
                                    q: query,
                                    keyword:$(".js-typeahead").val()

                                }
                            }
                        },
                        // Ajax Request

                    },
                    clinical: {
                        display:"text",
                        template:search_template('icon-database-upload','@{{text}}','Clinic'),
                        ajax: function (query) {
                            return {
                                url: "/search/clinical",
                                type:"get",
                                path: "data.clinical",
                                data: {
                                    q: query,
                                    keyword:$(".js-typeahead").val()

                                }
                            }
                        },
                        // Ajax Request

                    },
                    rooms: {
                        display:"text",
                        template:search_template('icon-database-upload','@{{text}}','Room'),
                        ajax: function (query) {
                            return {
                                url: "/search/rooms",
                                type:"get",
                                path: "data.rooms",
                                data: {
                                    q: query,
                                    keyword:$(".js-typeahead").val()

                                }
                            }
                        },
                        // Ajax Request

                    },
                    medicals: {
                        display:"text",
                        href:"/patient/view/@{{id}}" ,
                        template:search_template('icon-database-upload','@{{text}}','Medical'),
                        ajax: function (query) {
                            return {
                                url: "/search/medicals",
                                type:"get",
                                path: "data.medicals",
                                data: {
                                    q: query,
                                    keyword:$(".js-typeahead").val()

                                }
                            }
                        },
                        // Ajax Request


                    },
                },


                callback: {
                    onClickBefore: function (node, item, event) {
                        console.log(item);
                    },
                    onResult: function (node, query, result, resultCount) {
                     //   if (query === "") return;

                        var text = "";
                        if (result.length > 0 && result.length < resultCount) {
                            text = "Showing <strong>" + result.length + "</strong> of <strong>" + resultCount + '</strong> elements matching "' + query + '"';
                        } else if (result.length > 0) {
                            text = 'Showing <strong>' + result.length + '</strong> elements matching "' + query + '"';
                        } else {
                            text = 'No results matching "' + query + '"';
                        }
                        $('#result-container').html(text);

                    },
                }
            });
            $(".set-tool-tip").tooltip({
                enterDelay: 50,
                inDuration:50,
            });


            var $loading = $('.theme_radar').hide();
            //Attach the event handler to any element
            $(document)
                .ajaxStart(function () {
                    //ajax request went so show the loading image
                    $loading.show();
                })
                .ajaxStop(function () {
                    //got response so hide the loading image
                    $loading.hide();
                });

            function search_template(icon, text1,text2){
                var str =  '<div class="d-flex align-items-center">'+
                '<i class="'+icon+' mr-3 icon-2x"></i>'+
                '<div>'+text1+'<div class="opacity-50">'+text2+'</div></div>'+
                '</div>';

                return str;
            }
        </script>
</body>
</html>