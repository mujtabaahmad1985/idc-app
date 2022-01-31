@extends('layout.app')
@section('page-title') Contacts @endsection
@section('css')
    {!! Html::style(url('/').'/bootstrap/js/plugins/easyautocomplete/easy-autocomplete.css') !!}
    <style>
        .easy-autocomplete{ width: 100% !important;}
.pagination{ justify-content: center}
        .custom-switch .custom-control-label::after{
            background-color: #F00 !important;
        }
        .custom-switch .custom-control-input:checked~.custom-control-label::after{
            background-color: #FFF !important;
        }
    </style>
@endsection

@section('content')
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">My Contacts</span> - List</h4>
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
                    <a href="#" class="breadcrumb-item">Setup</a>
                    <span class="breadcrumb-item active">My Contacts</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>


        </div>
    </div>
    <div class="content">
        <div class="card col-sm-12 col-md-12">

            <div class="card-body">
                <form id="search-form" method="GET">
                    <div class="row">
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label>Contact Type</label>
                                <select class="form-control" name="contact_type">
                                    <option value="">Any</option>
                                    <option value="gmail">Gmail</option>
                                    <option value="outlook">Outlook</option>
                                    <option value="yahoo">Yahoo</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" />
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-2">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" />
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-2">
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="text" name="phone_number" class="form-control" />
                            </div>
                        </div>
                        <div class="col-sm-2 col-md-2 mt-4">
                            <div class="form-group">

                            <button class="btn btn-danger">Search</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>


        </div>
        <div class="card">
            <div class="card-header bg-transparent header-elements-sm-inline py-sm-0">
                <h6 class="card-title py-sm-3">Contacts</h6>
                <div class="header-elements">
                    <ul class="list-inline list-inline-condensed mb-0">
                        <li class="list-inline-item">
                            <p class="text-danger">Import contacts from above providers.</p>
                        </li>
                        <li class="list-inline-item">
                            <a href="#!" class="import-contact" data-vendor="google"> <img src="./public/images/gmail.png" class="rounded-circle" width="32" height="32" alt=""></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#!">  <img src="./public/images/outlook.png" class="rounded-circle" width="32" height="32" alt=""></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#!" class="import-contact" data-vendor="manual"><img src="./public/images/add.png" class="rounded-circle" width="32" height="32" alt=""></a>
                        </li>
                    </ul><br />


                </div>
            </div>

            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-striped contact-list-table">
                        <thead>
                        <tr>
                            <td>ID</td>
                          <th>Name</th>
                            <th>Email Address</th>
                            <th>Phone Number</th>
                            <th>Address</th>
                            <th>Imported From</th>
                            <td>Date/Time</td>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($contacts) && $contacts->count() > 0)
                            @foreach($contacts as $contact)
                                <tr>
                                   <td>{!! $contact->vendor_id !!}</td>
                                    <td>{!! $contact->name !!}</td>
                                    <td><a href="mailto:{!! $contact->email_address !!}" class="email text-danger">{!! $contact->email_address !!}</a> </td>
                                    <td>{!! $contact->phone_number !!}</td>
                                    <td>{!! $contact->address !!}</td>
                                    <td>{!! ucwords($contact->imported_from) !!}</td>
                                    <td>{!! \App\Helpers\CommonMethods::formatDateTime($contact->created_at) !!}</td>
                                    <td>
                                        <div class="ml-3">
                                            <div class="list-icons">
                                                <div class="list-icons-item dropdown">
                                                    <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-menu7"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">
                                                        <a href="#!" class="dropdown-item contact-edit" data-id="{!! $contact->id !!}"><i class="icon-pencil"></i> Edit</a>
                                                        <a href="#!" class="dropdown-item contact-delete" data-action="" data-id="{!! $contact->id !!}"><i class="icon-trash"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                         @endif
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="8">
                                {!! $contacts->links() !!}
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div id="add-contact" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add new contact</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form class="" id="contact-form" method="post" action="/save/contact" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <input type="hidden" name="id" />

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" required />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control"   />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="text" name="phone_number" class="form-control" required  />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea class="form-control" name="address"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <p class="font-weight-semibold">Save to</p>

                                    <div class="border p-3 rounded">
                                        <div class="custom-control custom-switch custom-control-inline">
                                            <input type="checkbox" class="custom-control-input" id="sc_li_c">
                                            <label class="custom-control-label" for="sc_li_c">Gmail</label>
                                        </div>

                                       {{-- <div class="custom-control custom-switch custom-control-inline">
                                            <input type="checkbox" class="custom-control-input" id="sc_li_u">
                                            <label class="custom-control-label" for="sc_li_u">Unchecked</label>
                                        </div>--}}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
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
                        </div>

                    </form>

                </div>
                <div class="modal-footer">

                    <a href="#!" class="btn btn-danger save-contact">Save Item</a>
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


    <script>
        $(function () {

            $("body").on("click",".contact-edit",function () {
               var id = $(this).data('id');
                $.ajax({
                    url:"/get/contact/json",
                    type:"POST",
                    data:{
                        id:id,
                        "_token":"{!! csrf_token() !!}"
                    },
                    success:function(response){

                       response = $.parseJSON(response);

                        $("input[name=id]").val(id);
                        $("input[name=name]").val(response.name);
                        $("input[name=email]").val(response.email_address);
                        $("input[name=phone_number]").val(response.phone_number);
                        $("textarea[name=address]").val(response.address);
                        $("#add-contact").modal();
                    }
                });
            });

            $("body").on("click",".contact-delete",function () {
                var _this = $(this);
                var id = $(this).data('id');
                $.ajax({
                    url:"/delete/contact",
                    type:"POST",
                    data:{
                        id:id,
                        "_token":"{!! csrf_token() !!}"
                    },
                    success:function(response){
                        _this.parents('tr').remove();

                    }
                });
            });

            $(".contact-list-table").DataTable({
                "paging": false, "info":false,"searching": false,
            });

            $("body").on("click",".save-contact",function () {
                if($("#contact-form").valid()){
                    $("#contact-form").ajaxForm(function(response){
                        response = $.parseJSON(response);
                        if(response.type=='success'){

                            $("#contact-form").find('.success-message').html(response.message);
                            $("#contact-form").find('.success-message').show();

                            setTimeout(function(){
                                location.reload();
                            },2000);

                        }
                    }).submit();
                }
            });


            $("body").on("click",".import-contact",function () {
                var _vendor = $(this).data("vendor");


                if(_vendor=="google"){
                    $.ajax({
                        url:"/get/google/authurl",
                        success:function (response) {
                           window.location.href=response;
                        }
                    });
                }

                if(_vendor=="manual"){
                    $("#add-contact").modal();
                }
            });
        })
    </script>


@endsection