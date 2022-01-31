<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
    <title>@yield('page-title') : IDC </title>
    {{--{!! Html::style('https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic') !!}--}}
    {!! Html::style('https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900') !!}
    {!! Html::style('/bootstrap/css/icons/icomoon/styles.min.css') !!}
    {!! Html::style('/bootstrap/assets/css/bootstrap.min.css') !!}
    {!! Html::style(url('/').'/bootstrap/assets/css/bootstrap_limitless.min.css') !!}
    {!! Html::style(url('/').'/bootstrap/assets/css/layout.min.css') !!}
    {!! Html::style(url('/').'/bootstrap/assets/css/components.min.css') !!}
    {!! Html::style(url('/').'/bootstrap/assets/css/colors.min.css') !!}
    {!! Html::style(url('/').'/material/js/plugins/sweetalert/sweetalert.css') !!}


    @yield('css')
    <style>
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
    </style>

</head>
<body class="navbar-top">
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

    @include('partials.sidebar')
    <div class="content-wrapper">

        @yield('content')
        @include('partials.footer')

    </div>
</div>

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




<div id="add-new-folder" class="modal z-depth-1" style="width: 40% !important; min-height: 130px !important;">
    <div class="modal-content">
        <div class="row">

            <h4 class="left">Add New Folder</h4>
            <div class="col s1 right-align no-padding right">
                <a href="#!" class="modal-action modal-close close-media"><i class="material-icons">close</i></a>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <div class="input-field">
                    <input id="add_new_folder" name="add_new_folder" value="">
                </div>
                <a href="#!" class="save-new-folder red right white-text" style="padding: 5px 20px"><i class="material-icons" style="position: relative; top: 5px;  margin-right: 8px; line-height: 15px;">new_folder</i> Create new folder</a>
                <div style="clear:both"></div>
                <div class="row m-top-10">
                    <div class="col s12">
                        <div class="card green message success-message" style="display: none;">
                            <div class="card-content white-text">
                                <p></p>
                            </div>
                        </div>
                        <div class="card red message error-message"  style="display: none;">
                            <div class="card-content white-text">
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>
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
{!! Html::script(url('/').'/material/js/dropzone.js') !!}
{!! Html::script(url('/').'/bootstrap/assets/js/app.js') !!}
<script>
    var my_permissions = $({{ $permissions_json}});

    $(function(){
       // swal("Here's a message!", "It's pretty, isn't it?")

        $(".add-new-folder").click(function(){
            $("input[name=add_new_folder]").val('');
            $("#add-new-folder").modal('open');
        });

        $(".save-new-folder").click(function(){
            var add_new_folder = $("input[name=add_new_folder]").val();
            if(add_new_folder!=""){
            var staff_id = "{!! Auth::id() !!}";
$(".message").hide();
            $.ajax({
                url:'/create/folder',
                type:'post',
                data:{"_token":"{!! csrf_token() !!}",staff_id:staff_id,add_new_folder:add_new_folder},
                success:function (response) {
                    response = $.parseJSON(response);

                    if(response.type=="success"){
                        $(".success-message  p").html(response.message);
                        $(".success-message").show();
                        $(".add-new-folder").parent().before('<li><a href="/my-documents/'+add_new_folder.toLowerCase().replace(/\ /g, '-')+'">'+add_new_folder+'</a></li> ');
                        setTimeout(function(){
                            $(".success-message").hide();
                            $("#add-new-folder").modal('close');
                        },2000);
                    }else{
                        $(".error-message > p").html(response.message);
                        $(".error-message").show();
                    }
                }
            });
        }else{
                $("input[name=add_new_folder]").focus();
            }

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
                $("#add-media").modal('open');
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
            $(".get-media").click(function(){

                var data = {
                    patient_id:$(this).attr('data-patient-id'),
                    appointment_id:$(this).attr('data-appointment-id'),
                    treatment_id:$(this).attr('data-treatment-id')
                };
                $("#get-media").modal('open');
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
                $("#change-password").modal('open');

                $.ajax({
                    url:"/user/password/change",
                    success:function (response) {
                        $("#change-password-panel").html(response);
                    }
                });
            });
          /*  $.typeahead({
                input: ".js-typeahead",
                order: "asc",
                minLength: 3,
                maxItem: 20,
                dynamic: true,
                emptyTemplate: 'No result for "@{{query}}"',
                display:"display",
                template:
                '<i class="material-icons circle red" style="line-height:25px !important; top:8px; font-size:23px">account_circle</i>'+
                    '<span class="title">@{{text}}</span>'+
                '<p>'+

            '</p>',
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
                        template:
                        '<i class="material-icons circle red" style="line-height:25px !important; top:8px">account_circle</i>'+
                        '<span class="title">@{{text}}</span>',

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
                        template:
                        '<i class="material-icons circle red" style="line-height:25px !important; top:8px; font-size:24px">settings</i>'+
                        '<span class="title">@{{text}}</span>'
                        ,
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
                        template:
                        '<i class="material-icons circle red" style="line-height:33px !important; top:10px; font-size:24px">map</i>'+
                        '<span class="title">@{{text}}</span>',
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
                        template:
                        '<i class="material-icons circle red" style="line-height:33px !important; top:10px; font-size:24px">location_on</i>'+
                        '<span class="title">@{{text}} - @{{short_name}}</span>',
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
                        template:

                        '<i class="material-icons circle red" style="line-height:33px !important; top:10px; font-size:24px">location_on</i>'+
                        '<span class="title">@{{text}} </span>',
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
            });*/
            $(".set-tool-tip").tooltip({
                enterDelay: 50,
                inDuration:50,
            });
            /*$.typeahead({
                input: '#header input.js-typeahead',
                minLength: 1,
                maxItem: 20,
                order: "asc",
                href: "https://en.wikipedia.org/?title=",
                template: "<small style='color:#999;'></small>",
                source: {
                    patient: {
                        ajax: {
                            url: "/search/patient",
                            path: "data.patient"
                        }
                    },
                    capital: {
                        ajax: {
                            url: "/search/patient",
                            path: "data.patient"
                        }
                    }
                },
                callback: {
                    onNavigateAfter: function (node, lis, a, item, query, event) {
                        if (~[38,40].indexOf(event.keyCode)) {
                            var resultList = node.closest("form").find("ul.typeahead__list"),
                                activeLi = lis.filter("li.active"),
                                offsetTop = activeLi[0] && activeLi[0].offsetTop - (resultList.height() / 2) || 0;

                            resultList.scrollTop(offsetTop);
                        }

                    },
                    onClickAfter: function (node, a, item, event) {

                        event.preventDefault();

                        var r = confirm("You will be redirected to:\n" + item.href + "\n\nContinue?");
                        if (r == true) {
                            window.open(item.href);
                        }

                        $('#result-container').text('');

                    },
                    onResult: function (node, query, result, resultCount) {
                        if (query === "") return;

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
                    onMouseEnter: function (node, a, item, event) {

                        if (item.group === "country") {
                            $(a).append('<span class="flag-chart flag-' + item.display.replace(' ', '-').toLowerCase() + '"></span>')
                        }

                    },
                    onMouseLeave: function (node, a, item, event) {

                        $(a).find('.flag-chart').remove();

                    }
                }
            });*/

           /* $("#header input[name=Search]").keyup(function () {
                var _value = $(this).val();
                if(_value.length >=3){
                    $.ajax({
                        url:'/patients/get_all_patients/'+_value,
                        success:function(response) {

                            $('#header input.autocomplete').autocomplete({
                                data: response.results,
                                limit: 5, // The max amount of results that can be shown at once. Default: Infinity.
                            });
                        }
                    });
                }
            });*/

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

        </script>
</body>
</html>