@extends('layout.app')
@section('page-title') Availability : Setup @endsection
@section('css')
    {!! Html::style('public/material/css/jquery.timepicker.min.css') !!}
<style>
    .add-availability-btn , .remove-availability-btn{ padding: 0 10px !important;}
</style>
@endsection

@section('content')

    @php
        $dateTimeZone = new DateTimeZone("Asia/Singapore");
    $dateTime = new DateTime("now", $dateTimeZone);
    $offset = $dateTimeZone->getOffset($dateTime); //3600=1hr

    @endphp
    <div class="content">
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Availability</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>


                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row ">
<div class="col-sm-12 col-md-12 col-lg-8">
                <div id="accordion-default">
                    @foreach($doctors as $doctor)
                <div class="card show-availability">
                    <div class="card-header">
                        <h6 class="card-title">
                            <a data-toggle="collapse" class="text-default choose-doctor" href="#doctor{!! $doctor->id !!}" data-doctor-id="{!! $doctor->id !!}">Dr. {{$doctor->fname.' '.$doctor->lname}}</a>
                        </h6>
                    </div>

                    <div id="doctor{!! $doctor->id !!}" class="collapse @if(Auth::User()->role=='doctor') show @endif" data-parent="#accordion-default">
                        <div class="card-body">

                        </div>
                    </div>
                </div>
                    @endforeach
                </div>
            </div>
            </div>
        </div>
    </div>
    </div>

    <section id="content">

    @include('partials.breadcrumb')

    <!--start container-->
        <div class="container">
            <div class="ajax-loading white-text green">Saved.</div>
            <div class="row">
                <h4 class="header col s6"></h4>



            </div>


        </div>


    </section>
@endsection


@section('js')

    {!! Html::script('/public/js/jquery.form.js') !!}
    {!! Html::script('/public/plugins/jquery.validate/js/jquery.validate.min.js') !!}
    {!! Html::script('public/js/jquery-ui.js') !!}
    {!! Html::script('public/material/js/jquery.timepicker.min.js') !!}
    {!! Html::script('public/material/plugins/select2/js/select2.min.js') !!}
    <script>
        @if(Auth::User()->role=='doctor')
        $.ajax({
            url:"/get/doctor/availability/{!! Auth::User()->doctors->id !!}",
            success:function (response) {
               $('div.show-availability').find('.card-body').html(response);
                $("#accordion-default").collapse('show');
            }
        });
        @endif
        $(function () {

            $(".choose-doctor").click(function () {
                var expand = $(this).attr('aria-expanded');
                if(expand=="false" || expand=="" || typeof (expand)=="undefined"){


                $(this).parents('div.show-availability').find('.card-body').html('');
               // return false;
                var doctor_id = $(this).attr('data-doctor-id');
                var ths = $(this);
                $.ajax({
                    url:"/get/doctor/availability/"+doctor_id,
                    success:function (response) {
                        ths.parents('div.show-availability').find('.card-body').html(response);
                    }
                });
                }
            });


            $("select.doctors").on('change', function () {
                var doctor_id = $(this).val();
                $(".preloader").addClass('active');
                $(".preloader").show();
                $.post("/availability/get_by_doctor", {
                    id: doctor_id,
                    "_token": "{!! csrf_token() !!}"
                }, function (response) {
                    $("#availability-response").html('');
                    $(".preloader").removeClass('active');
                    $(".preloader").hide();
                    var str = "";

                    response = $.parseJSON(response);
                    if (response) {
                        str = '<ul class="collection">';
                        $.each(response, function (i, v) {
                            str += '<li class="collection-item">';
                            str += ' <span class="title">' + v.day + '</span>';
                            str += ' <p><i class="material-icons">access_alarm</i> ' + v.slots + '</p>';
                            str += '</li>';
                        });
                        str += '</ul>';


                    }
                    $("#availability-response").html(str);
                });
            });


        })


    </script>
    {{--{!! Html::script('public/demo/demo-form-layouts.js') !!}--}}
@endsection