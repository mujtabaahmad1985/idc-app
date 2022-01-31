@extends('layout.app')
@section('page-title') Treatment Card Element Settings @endsection
@section('css')
<style>
    .sp-container.sp-light{
        z-index:99999;}

</style>
@endsection


@section('content')
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Treatment</span> - Settings</h4>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none">
                <div class="d-flex justify-content-center">
                    <a href="#" class="btn btn-link btn-float text-body"><i class="icon-bars-alt text-primary"></i><span>Dashboard</span></a>
                </div>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="/dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Dashboards</a>

                    <span class="breadcrumb-item active">Treatment Settings</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>


        </div>
    </div>
    <div class="content">
        <div class="card">


            <div class="card-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-3">

                    <ul class="nav nav-tabs nav-tabs-vertical flex-column mr-md-3 wmin-md-200 mb-md-0 border-bottom-0">
                        <li class="nav-item"><a href="#patient-flags" data-tab="flags" class="nav-link active show" data-toggle="tab"><i class="icon-flag7 mr-2"></i> Patient's Flags</a></li>
                        <li class="nav-item"><a href="#drug-allergies" data-tab="drug-allergies" class="nav-link" data-toggle="tab"><i class="icon-triangle2 mr-2"></i> Drug Allergies</a></li>
                        <li class="nav-item"><a href="#medications"  data-tab="medications" class="nav-link" data-toggle="tab"><i class="icon-box mr-2"></i> Medications</a></li>
                        <li class="nav-item"><a href="#tooth-area" data-tab="tooth-area" class="nav-link" data-toggle="tab"><i class="icon-microscope mr-2"></i> Anatomical location</a></li>
                    </ul>



                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane fade  active show"  id="patient-flags">



                            </div>

                            <div class="tab-pane fade" id="drug-allergies">

                            </div>

                            <div class="tab-pane fade" id="medications">

                            </div>

                            <div class="tab-pane fade" id="tooth-area">
                                Aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthet.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div id="add-new-drug-allergy" class="modal fade">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Drug Allergy</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form  id="drug-allergy-form" method="post" action="/save/allergy" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" id="drug-allergy-id" />

                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="name">Name</label>
                                <input id="drug-allergy-name" name="name" type="text" required class="validate form-control">
                            </div>
                        </div>





                        <div class="card green success-message bg-green" style="display: none;">
                            <div class="card-content white-text">
                                <p></p>
                            </div>
                        </div>
                        <div class="card red error-message bg-red"  style="display: none;">
                            <div class="card-content white-text">
                                <p></p>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">

                    <a href="#!" class="btn btn-danger save-drug-allergy">Save Drug Allergy</a>
                </div>


            </div>
        </div>
    </div>

    <div id="add-new-medications" class="modal fade">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Medication</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form  id="medications-form" method="post" action="/save/pre-medicals" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" id="medications-id" />

                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="name">Name</label>
                                <input id="medications-name" name="name" type="text" required class="validate form-control">
                            </div>
                        </div>





                        <div class="card green success-message bg-green" style="display: none;">
                            <div class="card-content white-text">
                                <p></p>
                            </div>
                        </div>
                        <div class="card red error-message bg-red"  style="display: none;">
                            <div class="card-content white-text">
                                <p></p>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">

                    <a href="#!" class="btn btn-danger save-medications">Save Medications</a>
                </div>


            </div>
        </div>
    </div>

    <div id="add-new-tooth-area" class="modal fade">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Tooth Area</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form  id="tooth-area-form" method="post" action="/save/tooth-areas" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" id="tooth-area-id" />

                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="name">Name</label>
                                <input id="tooth-area-name" name="name" type="text" required class="validate form-control">
                            </div>
                        </div>





                        <div class="card green success-message bg-green" style="display: none;">
                            <div class="card-content white-text">
                                <p></p>
                            </div>
                        </div>
                        <div class="card red error-message bg-red"  style="display: none;">
                            <div class="card-content white-text">
                                <p></p>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">

                    <a href="#!" class="btn btn-danger save-tooth-area">Save Tooth Area</a>
                </div>


            </div>
        </div>
    </div>
@endsection


@section('js')
    {!! Html::script('public/js/jquery.form.js') !!}
    {!! Html::script('public/plugins/jquery.validate/js/jquery.validate.min.js') !!}
    {!! Html::script(url('/').'/bootstrap/js/plugins/tables/datatables/datatables.min.js') !!}
    {!! Html::script(url('/').'/bootstrap/js/plugins/tables/datatables/dataTables.buttons.min.js') !!}
    {!! Html::script(url('/').'/bootstrap/js/plugins/pickers/color/spectrum.js') !!}

    <script>
        $(function(){
// Setting datatable defaults
            $.extend( $.fn.dataTable.defaults, {
                autoWidth: false,
                columnDefs: [{
                    orderable: false,
                    width: 100,

                }],
                dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
                language: {
                    search: '<span>Filter:</span> _INPUT_',
                    searchPlaceholder: 'Type to filter...',
                    lengthMenu: '<span>Show:</span> _MENU_',
                    paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
                }
            });
            $('#color').spectrum({
                change: function(c) {
                    $("#color").val(c.toHexString());
                }
            });
            $.ajax({
                url:"/treatment-card-settings/load/flags",
                success:function(response){
                    $("#patient-flags").html(response);
                    $("table").DataTable({
                        "paging": false, "info":     false,"searching": false,
                        dom: 'Bfrtip',
                        buttons: [
                            {
                                text: '<i class="icon-plus2"></i>',
                                className:"btn bg-danger-400 btn-icon rounded-round",
                                action: function ( e, dt, node, config ) {

                                    $("#add-new-flag").modal();
                                }
                            }
                        ]
                    });
                }
            });



            $("body").on('click','.pagination a',function(e){
                var url  = $(this).attr('href');
                var _parent = $(this).parents(".tab-pane").attr('id');

                if(url){
                    $("table").DataTable().destroy();;
                    $(".overlay").show();
                    $(".overlay .progress").show();
                    $(".overlay .message").hide();
                    $.ajax({
                        url:url,
                        success:function(response){
                            $(".overlay .progress").hide();
                            $(".overlay").hide();
                            $('#'+_parent).html(response);
                            $("table").DataTable({
                                "paging": false, "info":     false,"searching": false,
                                dom: 'Bfrtip',
                                buttons: [
                                    {
                                        text: '<i class="icon-plus2"></i>',
                                        className:"btn bg-danger-400 btn-icon rounded-round",
                                        action: function ( e, dt, node, config ) {

                                            if(_parent=="drug-allergies"){
                                                $('#add-new-drug-allergy').modal();
                                            }

                                            //$("#add-new-flag").modal();
                                        }
                                    }
                                ]
                            });
                        }
                    });
                }

                e.stopPropagation();
                e.preventDefault();
            });




            $("body").on('click','.patient-flag-action .delete',function(){
                var id = $(this).attr('data-id');
                var _this = $(this);

                $.ajax({
                    url:"/patient-flags/delete/"+id,
                    success:function(response){
                        _this.parents('tr').remove()
                    }
                });
            });

            $("body").on('click','.drug-action .delete',function(){
                var id = $(this).attr('data-id');
                var _this = $(this);

                $.ajax({
                    url:"/delete/allergy/"+id,
                    success:function(response){
                        _this.parents('tr').remove()
                    }
                });
            });

            $("body").on('click','.medication-action .delete',function(){
                var id = $(this).attr('data-id');
                var _this = $(this);

                $.ajax({
                    url:"/delete/pre-medicals/"+id,
                    success:function(response){
                        _this.parents('tr').remove()
                    }
                });
            });

            $("body").on('click','.tooth-area-action .delete',function(){
                var id = $(this).attr('data-id');
                var _this = $(this);

                $.ajax({
                    url:"/delete/tooth-areas/"+id,
                    success:function(response){
                        _this.parents('tr').remove()
                    }
                });
            });



            $("body").on('click','.patient-flag-action .edit',function(){
                var id = $(this).attr('data-id');
                var _this = $(this);
                $(".success-message").hide();
                $.ajax({
                    url:"/patient-flags/get/"+id,
                    success:function(response){
                        response = $.parseJSON(response);
                      console.log(response.id);
                      $("#flag-id").val(response.id);
                        $("#flag-name").val(response.name);
                        $("#color").val(response.color);
                        $('#color').spectrum({
                            color:response.color,
                            change: function(c) {
                                $("#color").val(c.toHexString());
                            }
                        });
                        $("#add-new-flag").modal();
                    }
                });
            });

            $("body").on('click','.drug-action .edit',function(){
                var id = $(this).attr('data-id');
                var _this = $(this);
                $(".success-message").hide();
                $.ajax({
                    url:"/get/allergy/"+id,
                    success:function(response){
                        response = $.parseJSON(response);
                        console.log(response.id);
                        $("#drug-allergy-id").val(response.id);
                        $("#drug-allergy-name").val(response.name);

                        $('#add-new-drug-allergy').modal();
                    }
                });
            });



            $("body").on('click','.medication-action .edit',function(){
                var id = $(this).attr('data-id');
                var _this = $(this);
                $(".success-message").hide();
                $.ajax({
                    url:"/get/medications/"+id,
                    success:function(response){
                        response = $.parseJSON(response);
                        console.log(response.id);
                        $("#medications-id").val(response.id);
                        $("#medications-name").val(response.name);

                        $('#add-new-medications').modal();
                    }
                });
            });

            $("body").on('click','.tooth-area-action .edit',function(){
                var id = $(this).attr('data-id');
                var _this = $(this);
                $(".success-message").hide();
                $.ajax({
                    url:"/get/tooth-area/"+id,
                    success:function(response){
                        response = $.parseJSON(response);
                        console.log(response.id);
                        $("#tooth-area-id").val(response.id);
                        $("#tooth-area-name").val(response.name);

                        $('#add-new-tooth-area').modal();
                    }
                });
            });



            $(".save-flag").click(function(){
                if($("#flag-form").valid()){
                    $("#flag-form").ajaxForm(function(response){
                        response = $.parseJSON(response);
                        if(response.type=="success"){
                            $('.success-message').html(response.message);
                            $('.success-message').fadeIn();

                            setTimeout(function(){
                                $("#add-new-flag").modal('hide');
                                $.ajax({
                                    url:"/treatment-card-settings/load/flags",
                                    success:function(response){
                                        $("#patient-flags").html(response);
                                        $("table").DataTable({
                                            "paging": false, "info":     false,"searching": false,
                                            dom: 'Bfrtip',
                                            buttons: [
                                                {
                                                    text: '<i class="icon-plus2"></i>',
                                                    className:"btn bg-danger-400 btn-icon rounded-round",
                                                    action: function ( e, dt, node, config ) {
                                                        $(".success-message").hide();
                                                        $("#flag-form").resetForm();
                                                        $("#add-new-flag").modal();
                                                    }
                                                }
                                            ]
                                        });
                                    }
                                });
                            }, 2500);
                        }else{
                            $('.error-message').html(response.message);
                            $('.error-message').fadeIn();
                        }
                    }).submit();
                }
            });

            $(".save-drug-allergy").click(function(){
                if($("#drug-allergy-form").valid()){
                    $("#drug-allergy-form").ajaxForm(function(response){
                        response = $.parseJSON(response);
                        if(response.type=="success"){
                            $('.success-message').html(response.message);
                            $('.success-message').fadeIn();

                            setTimeout(function(){
                                $("#add-new-drug-allergy").modal('hide');
                                $("#drug-allergy-form").resetForm();
                                $('.success-message').fadeOut();
                                $.ajax({
                                    url:"/get/treatment/item/drug-allergies",
                                    success:function(response){

                                        $("#drug-allergies").html(response);
                                        $("table").DataTable().destroy();;

                                            $("table").DataTable({
                                                "paging": false, "info":     false,"searching": false,
                                                dom: 'Bfrtip',
                                                buttons: [
                                                    {
                                                        text: '<i class="icon-plus2"></i>',
                                                        className:"btn bg-danger-400 btn-icon rounded-round",
                                                        action: function ( e, dt, node, config ) {

                                                            //$("#add-new-flag").modal();

                                                            $('#add-new-drug-allergy').modal();


                                                        }
                                                    }
                                                ]
                                            });


                                    }
                                });
                            }, 2500);
                        }else{
                            $('.error-message').html(response.message);
                            $('.error-message').fadeIn();
                        }
                    }).submit();
                }
            });

            $(".save-medications").click(function(){
                if($("#medications-form").valid()){
                    $("#medications-form").ajaxForm(function(response){
                        response = $.parseJSON(response);
                        if(response.type=="success"){
                            $('.success-message').html(response.message);
                            $('.success-message').fadeIn();

                            setTimeout(function(){
                                $("#add-new-medications").modal('hide');
                                $("#medications-form").resetForm();
                                $('.success-message').fadeOut();
                                $.ajax({
                                    url:"/get/pre-medicals",
                                    success:function(response){

                                        $("#medications").html(response);
                                        $("table").DataTable().destroy();;

                                        $("table").DataTable({
                                            "paging": false, "info":     false,"searching": false,
                                            dom: 'Bfrtip',
                                            buttons: [
                                                {
                                                    text: '<i class="icon-plus2"></i>',
                                                    className:"btn bg-danger-400 btn-icon rounded-round",
                                                    action: function ( e, dt, node, config ) {

                                                        //$("#add-new-flag").modal();

                                                        $('#add-new-medications').modal();


                                                    }
                                                }
                                            ]
                                        });


                                    }
                                });
                            }, 2500);
                        }else{
                            $('.error-message').html(response.message);
                            $('.error-message').fadeIn();
                        }
                    }).submit();
                }
            });

            $(".save-tooth-area").click(function(){
                if($("#tooth-area-form").valid()){
                    $("#tooth-area-form").ajaxForm(function(response){
                        response = $.parseJSON(response);
                        if(response.type=="success"){
                            $('.success-message').html(response.message);
                            $('.success-message').fadeIn();

                            setTimeout(function(){
                                $("#add-new-tooth-area").modal('hide');
                                $("#tooth-area-form").resetForm();
                                $('.success-message').fadeOut();
                                $.ajax({
                                    url:"/get/treatment/item/tooth-area",
                                    success:function(response){

                                        $("#tooth-area").html(response);
                                        $("table").DataTable().destroy();;

                                        $("table").DataTable({
                                            "paging": false, "info":     false,"searching": false,
                                            dom: 'Bfrtip',
                                            buttons: [
                                                {
                                                    text: '<i class="icon-plus2"></i>',
                                                    className:"btn bg-danger-400 btn-icon rounded-round",
                                                    action: function ( e, dt, node, config ) {

                                                        //$("#add-new-flag").modal();

                                                        $('#add-new-tooth-area').modal();


                                                    }
                                                }
                                            ]
                                        });


                                    }
                                });
                            }, 2500);
                        }else{
                            $('.error-message').html(response.message);
                            $('.error-message').fadeIn();
                        }
                    }).submit();
                }
            });

            $(".nav-link").click(function(){
                var tab = $(this).attr('data-tab');

                if(tab!="flags"){
                    $("table").DataTable().destroy();;

                    $.ajax({
                        url:"/get/treatment/item/"+tab,
                        success:function(response){

                            $("#"+tab).html(response);

                            if(tab=="drug-allergies"){
                                $("table").DataTable({
                                    "paging": false, "info":     false,"searching": false,
                                    dom: 'Bfrtip',
                                    buttons: [
                                        {
                                            text: '<i class="icon-plus2"></i>',
                                            className:"btn bg-danger-400 btn-icon rounded-round",
                                            action: function ( e, dt, node, config ) {

                                                //$("#add-new-flag").modal();

                                                    $('#add-new-drug-allergy').modal();


                                            }
                                        }
                                    ]
                                });
                            }

                            if(tab=="medications"){
                                $("table").DataTable({
                                    "paging": false, "info":     false,"searching": false,
                                    dom: 'Bfrtip',
                                    buttons: [
                                        {
                                            text: '<i class="icon-plus2"></i>',
                                            className:"btn bg-danger-400 btn-icon rounded-round",
                                            action: function ( e, dt, node, config ) {

                                                //$("#add-new-flag").modal();

                                                $('#add-new-medications').modal();


                                            }
                                        }
                                    ]
                                });
                            }

                            if(tab=="tooth-area"){
                                $("table").DataTable({
                                    "paging": false, "info":     false,"searching": false,
                                    
                                    dom: 'Bfrtip',
                                    buttons: [
                                        {
                                            text: '<i class="icon-plus2"></i>',
                                            className:"btn bg-danger-400 btn-icon rounded-round",
                                            action: function ( e, dt, node, config ) {

                                                //$("#add-new-flag").modal();

                                                $('#add-new-tooth-area').modal();


                                            }
                                        }
                                    ]
                                });
                            }
                        }
                    });
                }



            });
        })
    </script>


@endsection