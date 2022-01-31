@extends('layout.app')
@section('page-title') Patient  Anatomical location @endsection
@section('content')
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Patients</span> -  Anatomical location</h4>
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
                    <a href="/dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="#!" class="breadcrumb-item">Hospital Configuration</a>
                    <span class="breadcrumb-item active"> Anatomical location</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>


        </div>
    </div>
    <div class="content">

        <div class="card">
<table class="table table-striped">
    <thead>
    <tr>
        <td></td>
        <td width="90%">Name</td>
        <td>Action</td>
    </tr>
    </thead>
    <tbody>

    @if(isset($tooth_areas))
        @foreach($tooth_areas as $a)
            <tr>
                <td></td>
                <td>{!! $a->name !!}</td>

                <td>
                    <div class="ml-3">
                        <div class="list-icons tooth-area-action">
                            <div class="list-icons-item dropdown">
                                <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-menu7"></i></a>
                                <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">


                                    <a href="#!" class="dropdown-item edit" data-action="edit" data-id="{!! $a->id !!}"><i class="icon-pencil3"></i> Edit</a>
                                    <a href="#!" class="dropdown-item delete" data-action="" data-id="{!! $a->id !!}"><i class="icon-trash"></i> Delete</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach

    @endif
    </tbody>
</table>
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

    $("table").DataTable({
        "paging": false, "info":     false,"searching": false,
        dom: 'Bfrtip',
        buttons: [
            {
                text: '<i class="icon-plus2"></i>',
                className:"btn bg-danger-400 btn-icon rounded-round",
                action: function ( e, dt, node, config ) {
                    $(".success-message").hide();
                    $("#tooth-area-form").resetForm();
                    $('#add-new-tooth-area').modal();
                }
            }
        ]
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

    $(".save-tooth-area").click(function(){
        if($("#tooth-area-form").valid()){
            $("#tooth-area-form").ajaxForm(function(response){
                response = $.parseJSON(response);
                if(response.type=="success"){
                    $('.success-message').html(response.message);
                    $('.success-message').fadeIn();

                    setTimeout(function(){
                       location.reload();
                    }, 2500);
                }else{
                    $('.error-message').html(response.message);
                    $('.error-message').fadeIn();
                }
            }).submit();
        }
    });
})
    </script>
    @endsection


