@extends('layout.app')
@section('page-title') Account Management - customers @endsection
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
                <h5 class="card-title">Customers</h5>
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
                            <table class="table table-striped customer-list-table">
                                <thead>
                                <tr>

                                    <th>Customer Name</th>
                                    <th>Company</th>
                                    <th>Address</th>
                                    <th>Country</th>
                                    <th>Total Invoices</th>
                                    <th>Total Credit</th>




                                    <th class="text-right">Actions</th>
                                </tr>
                                </thead>

                                <tbody>
                                @if(isset($customers) && $customers->count() > 0)
                                    @foreach($customers as $customer)
                                        <tr>
                                            <td>{!! $customer->first_name.' '.$customer->last_name !!}</td>
                                            <td>{!! $customer->company_name !!}</td>
                                            <td>{!! $customer->address !!}</td>
                                            <td>{!! $customer->country !!}</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>
                                                <div class="ml-3">
                                                    <div class="list-icons">
                                                        <div class="list-icons-item dropdown">
                                                            <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-menu7"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">
                                                                <a href="#!" class="dropdown-item edit" data-id="{!! $customer->id !!}"><i class="icon-pencil"></i> Edit</a>
                                                                <a href="#!" class="dropdown-item delete" data-id="{!! $customer->id !!}"><i class="icon-trash"></i> Delete</a>

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

    @php
        $countries = \App\Countries::all();
    @endphp

    <div id="add-new-customer" class="modal fade">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New Customer</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form id="customer-form" method="POST" action="/save/customer" enctype="multipart/form-data">
                        @csrf
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
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" name="email" required />
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Phone No</label>
                                    <input type="text" class="form-control" name="phone_number" required />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Mobile No</label>
                                    <input type="text" class="form-control" name="mobile_number" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">


                                    <div class="card-body">
                                        <ul class="nav nav-tabs nav-tabs-highlight">
                                            <li class="nav-item"><a href="#right-icon-tab1" class="nav-link active" data-toggle="tab">Address <i class="icon-home ml-2"></i></a></li>
                                            <li class="nav-item"><a href="#right-icon-tab2" class="nav-link" data-toggle="tab">Notes <i class="icon-list ml-2"></i></a></li>
                                            <li class="nav-item"><a href="#right-icon-tab3" class="nav-link" data-toggle="tab">Payment and billing <i class="icon-cash2 ml-2"></i></a></li>

                                        </ul>

                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="right-icon-tab1">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="last_name">Block/House No</label>
                                                            <input id="company_name" name="house_no"   type="text"  placeholder="e.g. House No 123#" class="alphanumaric form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="last_name">Appartment/Unit No</label>
                                                            <input id="apartments_no" name="apartments_no" type="text" placeholder="e.g. Apartment No 123#" class="alphanumaric form-control">
                                                        </div>
                                                    </div>
                                                </div>



                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="last_name">Street</label>
                                                            <input id="street_no" name="street_no" type="text" placeholder="e.g. Jurong West, Hougang" class="alphanumaric form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="last_name">City</label>
                                                            <input id="city" name="city" type="text" placeholder="e.g. Singapore, Newyork, Islamabad" class="alphanumaric form-control">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="last_name">Country</label>
                                                            <select class="form-control country" name="country" >
                                                                <option value="">Choose Country</option>
                                                                @foreach($countries as $country)
                                                                    <option value="{!! $country->name !!}" data-icon="/public/flags/{!! strtolower($country->short_name) !!}.svg" class="left circle">{!! $country->name !!}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="last_name">Zipcode</label>
                                                            <input id="zipcode" name="zipcode" type="text" class="alphanumaric form-control" placeholder="e.g 408600, 560252">
                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label>Address</label>
                                                            <textarea id="address" name="address"  class="form-control" length="120"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="right-icon-tab2">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label>Notes</label>
                                                            <textarea id="address" name="notes"  class="form-control" length="120"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="right-icon-tab3">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Preferred Payment Method</label>
                                                            <select name="payment_type" class="form-control">
                                                                <option value="" disabled="">Choose</option>
                                                                <option value="cash">Cash</option>
                                                                <option value="cheque">Cheque</option>
                                                                <option value="credit-card">Credit Card</option>
                                                                <option value="direct-debit">Direct Debit</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
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
                </div>
                <div class="modal-footer">

                    <a href="#!" class="btn btn-danger save-customer">Save</a>
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

            $("body").on("click",".save-customer",function (e) {
                $(".alert").hide();
                if($("#customer-form").valid()){
                    $("#customer-form").ajaxForm(function (response) {

                        response = $.parseJSON(response);

                        if(response.type=="success"){

                            $("#add-new-customer .success-message").html(response.message);
                            $("#add-new-customer .success-message").show();

                            setTimeout(function () {
location.reload();
                            },1500);
                        }else{
                            $("#add-new-customer .error-message").html(response.message);
                            $("#add-new-customer .error-message").show();
                        }

                    }).submit();
                }

                e.preventDefault();
                e.stopPropagation();
            });



            $("body").on("click",".edit",function () {
                var id = $(this).data('id');

                $.ajax({
                    url:'/customer/edit/'+id,
                    success:function (response) {
                        response = $.parseJSON(response);
                        $.each(response,function(i,v){
                          $("input[name="+i+"]").val(v);
                            $("select[name="+i+"]").val(v);
                            $("textarea[name="+i+"]").val(v);
                            $("#add-new-customer").modal()
                        });
                    }
                });
            });


            $("body").on("click",".delete",function () {
                var id = $(this).data('id');

                $.ajax({
                    url:'/customer/delete/'+id,
                    success:function (response) {
                        location.reload();
                    }
                });
            });


            $(".customer-list-table").DataTable({
                "paging": false, "info":     false,"searching": false,
                dom: 'Bfrtip',
                "aaSorting": [],
                "lengthMenu": [ [100, 250, 500, -1], [100, 250, 500, "All"] ],
                buttons: [
                    {
                        text: '<i class="icon-plus2"></i> New customer',
                        className:"btn bg-danger-400 btn-icon rounded-round",

                        action: function ( e, dt, node, config ) {
                            $("#add-new-customer").modal()
                        }
                    },

                ]
            });

        })
    </script>
@endsection