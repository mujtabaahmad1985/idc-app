@extends('layout.app')
@section('page-title') Manage Manufacturer @endsection
@section('css')
    {!! Html::style(url('/').'/bootstrap/js/plugins/easyautocomplete/easy-autocomplete.css') !!}
    <style>
        .easy-autocomplete{ width: 100% !important;}
    </style>
@endsection

@section('content')

    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Manufactures</span> - List</h4>

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

                    <span class="breadcrumb-item active">Menufactures</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>


        </div>
    </div>
    <div class="content">
        <div class="card col-sm-12 col-md-12">

            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-striped manufactures-list-table">
                    <thead>
                    <tr>

                        <th width="200px">Logo</th>

                        <th>Manufacturer Name</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Phone/Mobile</th>
                        <th>Total Orders</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @if(isset($manufactures) && $manufactures->count() > 0)
                            @foreach($manufactures as $manufacture)
                                <tr>
                                    <td>
                                        @if(isset($manufacture->logo)  && file_exists(public_path('/uploads/manufactures/').$manufacture->logo))
                                            <img class="rounded-circle" style="width: 100px" src="/uploads/manufactures/{!! ''.$manufacture->logo !!}" alt="">

                                        @endif
                                    </td>
                                    <td>{!! $manufacture->name !!}</td>
                                    <td>{!! $manufacture->address !!}</td>
                                    <td>{!! $manufacture->email !!}</td>
                                    <td>{!! $manufacture->phone_number !!}</td>
                                    <td></td>
                                    <td>
                                        <div class="ml-3">
                                            <div class="list-icons">
                                                <div class="list-icons-item dropdown">
                                                    <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-menu7"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">

                                                        <a href="#!" class="dropdown-item manufacture-edit" data-id="{!! $manufacture->id !!}"><i class="icon-pencil"></i> Edit</a>
                                                        <a href="#!" class="dropdown-item manufacture-delete" data-action="" data-id="{!! $manufacture->id !!}"><i class="icon-trash"></i> Delete</a>

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
        </div>

        <div id="manufature-modal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add New Manufacturer</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">
                        <form class="" id="manufator-form" method="post" action="/save/manufactures" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            <input type="hidden" name="id" id="id" />

                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <label for="brand_name" class="">Manufacturer Name</label>
                                    <input id="name" name="name" type="text" class="validate form-control"  required data-error=".errorTxt1">


                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <label for="brand_name" class="">Email</label>
                                    <input id="email" name="email" type="email" class="validate form-control email"  required data-error=".errorTxt1">


                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <label for="phone" class="">Phone</label>
                                    <input id="phone" name="phone" type="text" class="validate form-control"  required data-error=".errorTxt1">


                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <label for="address" class="">Address</label>
                                    <textarea class="form-control" id="address" name="address" required></textarea>


                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <label for="address" class="">Logo</label>
                                    <input id="logo" name="logo" type="file" class="validate form-control"  data-error=".errorTxt1">


                                </div>
                            </div>


                        </form>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-success success-message mt-2"></div>
                                <div class="alert alert-danger error-message mt-2"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">

                        <a href="#!" class="btn btn-danger save-manufactor">Save</a>
                    </div>

                </div>
            </div>
        </div>



    </div>



    {{--    END BRAND MODAL --}}

@endsection


@section('js')
    {!! Html::script('public/js/jquery.form.js') !!}
    {!! Html::script('public/plugins/jquery.validate/js/jquery.validate.min.js') !!}
    {!! Html::script(url('/').'/bootstrap/js/plugins/tables/datatables/datatables.min.js') !!}
    {!! Html::script(url('/').'/bootstrap/js/plugins/tables/datatables/dataTables.buttons.min.js') !!}
    {!! Html::script(url('/').'/bootstrap/js/plugins/forms/styling/uniform.min.js') !!}
    {!! Html::script(url('/').'/bootstrap/js/plugins/easyautocomplete/jquery.easy-autocomplete.min.js') !!}
    <script>
        $(function () {

            $("body").on("click",".manufacture-edit",function () {
                var id = $(this).data('id');

                $.ajax({
                    url:"/manufature/edit/"+id,
                    success:function (response) {
                        response = $.parseJSON(response);
                        $("#name").val(response.name);
                        $("#id").val(id);
                        $("#phone").val(response.phone_number);
                        $("#email").val(response.email);
                        $("#address").val(response.address);

                        $("#manufature-modal").modal();
                    }
                });
            });


            $("body").on("click",".manufacture-delete",function () {
                var id = $(this).data('id');

                $.ajax({
                    url:"/manufature/delete/"+id,
                    success:function (response) {
                       location.reload();
                    }
                });
            });

            $(".manufactures-list-table").DataTable({
                "paging": true, "info":     true,"searching": false,
                dom: 'Bfrtip',
                "aaSorting": [],
                "lengthMenu": [ [100, 250, 500, -1], [100, 250, 500, "All"] ],
                buttons: [
                    {
                        text: '<i class="icon-plus2"></i> New Manufactures',
                        className:"btn bg-danger-400 btn-icon rounded-round",

                        action: function ( e, dt, node, config ) {
                        $("#manufature-modal").modal();
                        }
                    },

                ]
            });

            $("body").on("click",".save-manufactor",function () {
                if($("#manufator-form").valid()){
                    if($("#manufator-form").ajaxForm(function (response) {
                        response = $.parseJSON(response);

                        if(response.type=="success"){
                            $(".success-message").html(response.message);
                            $(".success-message").show();

                            setTimeout(function () {
                                location.reload();
                            },2500);
                        }
                    }).submit());
                }
            });
        })
    </script>
@endsection