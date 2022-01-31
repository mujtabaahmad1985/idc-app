@extends('layout.app')
@section('page-title') Account Management - Suppliers @endsection
@section('css')
    {!! Html::style(url('/').'/bootstrap/js/plugins/easyautocomplete/easy-autocomplete.css') !!}
    <style>
        .easy-autocomplete{ width: 100% !important;}
    </style>
@endsection

@section('content')
    <div class="content">
        <div class="card col-sm-12 col-md-12">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Suppliers</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>


                    </div>
                </div>
            </div>


            {{--<div class="row">
                <div class="col-sm-12 text-right float-sm-right"><button class="btn btn-danger addroom">Add New Consent Form</button> </div>
            </div>--}}

            <div class="row">
                <div class="col-sm-12 col-xl-12">

                    <div class="card card-body">

                        <div class="table-responsive">
                            <table class="table table-striped supplier-list-table">
                                <thead>
                                <tr>

                                    <th>Supplier Name</th>
                                    <th>Company</th>
                                    <th>Business ID</th>
                                    <th>Address</th>
                                    <th>Country</th>
                                    <th>Total Invoices</th>
                                    <th>Total Credit</th>




                                    <th class="text-right">Actions</th>
                                </tr>
                                </thead>

                                <tbody>
                                @if(isset($suppliers) && $suppliers->count() > 0)
                                    @foreach($suppliers as $supplier)
                                        <tr>
                                            <td>{!! $supplier->first_name.' '.$supplier->last_name !!}</td>
                                            <td>{!! $supplier->company_name !!}</td>
                                            <td>{!! $supplier->business_id !!}</td>
                                            <td>{!! $supplier->address !!}</td>
                                            <td>{!! $supplier->country !!}</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>
                                                <div class="ml-3">
                                                    <div class="list-icons">
                                                        <div class="list-icons-item dropdown">
                                                            <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-menu7"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">
                                                                <a href="#!" class="dropdown-item edit" data-id="{!! $supplier->id !!}"><i class="icon-pencil"></i> Edit</a>
                                                                <a href="#!" class="dropdown-item delete" data-id="{!! $supplier->id !!}"><i class="icon-trash"></i> Delete</a>

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
            </div>



        </div>
    </div>



    <div id="add-supplier" class="modal fade">
        <div class="modal-dialog modal-lg" >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Supplier Information</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">

                    <form id="supplier-form" method="POST" action="/save/supplier" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" />
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" class="form-control" name="first_name" required />
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" class="form-control" name="last_name" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Company Name</label>
                                                <input type="text" class="form-control" name="company_name" required />
                                            </div>
                                        </div>


                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Display Name</label>
                                                <input type="text" class="form-control" name="display_name" required />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <textarea class="form-control" name="address" required></textarea>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Notes</label>
                                                <textarea class="form-control" name="notes" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>City/Town</label>
                                                <input type="text" class="form-control" name="city"  />
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>State/Province</label>
                                                <input type="text" class="form-control" name="state"  />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Postal Code</label>
                                                <input type="text" class="form-control" name="postal_code" required />
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Country</label>
                                                <input type="text" class="form-control" name="country"  />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" class="form-control" name="postal_code" required />
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Web site</label>
                                                <input type="text" class="form-control" name="web_site"  />
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input type="text" class="form-control" name="phone"  />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Mobile</label>
                                                <input type="text" class="form-control" name="mobile"  />
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Fax</label>
                                                <input type="text" class="form-control" name="fax"  />
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" class="form-control" name="postal_code" required />
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Web site</label>
                                                <input type="text" class="form-control" name="web_site"  />
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Business ID</label>
                                                <input type="text" class="form-control" name="business_id" required />
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Account No.</label>
                                                <input type="text" class="form-control" name="account_no"  />
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>

                        </div>
                    </form>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-success success-message mt-2"></div>
                            <div class="alert alert-danger error-message mt-2"></div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-sm-12 text-right">
                            <button class="btn btn-danger save-supplier">Save Supplier</button>
                        </div>
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


            $("body").on("click",".save-supplier",function () {
                $(".alert").hide();
               if($("#supplier-form").valid()){
                   $("#supplier-form").ajaxForm(function (response) {

                       response = $.parseJSON(response);

                       if(response.type=="success"){

                           $("#add-supplier .success-message").html(response.message);
                           $("#add-supplier .success-message").show();

                           setTimeout(function () {
                               window.location = "/suppliers";
                           },1500);
                       }else{
                           $("#add-supplier .error-message").html(response.message);
                           $("#add-supplier .error-message").show();
                       }

                   }).submit();
               }
            });

            $("body").on("click",".edit",function () {
                var id = $(this).data('id');

                $.ajax({
                    url:'/supplier/edit/'+id,
                    success:function (response) {
                        response = $.parseJSON(response);
                        $.each(response,function(i,v){
                          $("input[name="+i+"]").val(v);
                            $("textarea[name="+i+"]").val(v);
                            $("#add-supplier").modal()
                        });
                    }
                });
            });


            $("body").on("click",".delete",function () {
                var id = $(this).data('id');

                $.ajax({
                    url:'/supplier/delete/'+id,
                    success:function (response) {
                        location.reload();
                    }
                });
            });


            $(".supplier-list-table").DataTable({
                "paging": false, "info":     false,"searching": false,
                dom: 'Bfrtip',
                "aaSorting": [],
                "lengthMenu": [ [100, 250, 500, -1], [100, 250, 500, "All"] ],
                buttons: [
                    {
                        text: '<i class="icon-plus2"></i> New Supplier',
                        className:"btn bg-danger-400 btn-icon rounded-round",

                        action: function ( e, dt, node, config ) {
                            $("#add-supplier").modal()
                        }
                    },

                ]
            });

        })
    </script>
@endsection