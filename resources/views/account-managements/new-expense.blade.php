@extends('layout.app')
@section('page-title') Account Management - Expenses @endsection
@section('css')
    {!! Html::style(url('/').'/bootstrap/js/plugins/easyautocomplete/easy-autocomplete.css') !!}
    <style>
        .easy-autocomplete{ width: 100% !important;}
        #new-customer{
            height: auto;
            width: 100%;
            border: 1px solid #cacaca;
            position: absolute;
            background: #f9f9f9;
            z-index: 1;
            display: none;
            padding: 20px;
        }
    </style>
@endsection

@section('content')
    @php
    $countries = \App\Countries::all();
    @endphp
    <div class="content">
        <div class="card col-sm-12 col-md-12">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">New expense Transactions</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>


                    </div>
                </div>
            </div>


            {{--<div class="row">
                <div class="col-sm-12 text-right float-sm-right"><button class="btn btn-danger addroom">Add New Consent Form</button> </div>
            </div>--}}

            <div class="card-body">
                <form id="expense-form" action="/save/expense" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="person_id" id="person_id" />
                    <input type="hidden" name="type" value="{!! request()->get('type') !!}" />
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="row">
                                <div class="col-sm-12 col-xl-12">

                                    <div class="form-group">
                                        <label>Customer/Patient</label>
                                        <select class="form-control" name="person_name"></select>
                                    </div>
                                    <div id="new-customer">
                                        <h5 class="mb-3">New Customer</h5>
                                        <div class="form-group mb-2">
                                            <label>Name</label>
                                           <select id="customer-type" class="form-control">
                                               <option value="patient">Patient</option>
                                               <option value="customer">Customer</option>
                                               <option value="supplier">Supplier</option>
                                           </select>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label>Name</label>
                                            <input type="text" class="form-control mb-4 new-name" />
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <a href="#!" class="detail-customer float-left">+Detail</a>
                                                <a href="#!" class="btn btn-danger save-customer float-right">Save</a>
                                            </div>

                                        </div>


                                    </div>

                                </div>
                            </div>
                            <div class="row">

                                <div class="col-sm-12 col-xl-12">

                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" />
                                        <a href="#!" class="text-danger">CC/BCC</a>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 col-xl-12">
                                    <label>Expense Type</label>
                                    <select name="category_id" class="form-control" required>
                                        <option value="">Choose Expense Type</option>
                                        @foreach(\App\ExpenseCategories::all() as $category)
                                            <option value="{!! $category->id !!}">{!! $category->name !!}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 col-xl-12">

                                    <div class="form-group">
                                        <label>Billing Addres</label>
                                        <textarea class="form-control" name="billing_address"></textarea>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-xl-6">
                                    <div class="form-group">
                                        <label>Invoice date</label>
                                        <input type="text" n class="form-control" value="{!! \App\Helpers\CommonMethods::formatDate() !!}" readonly="" />
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xl-6">
                                    <div class="form-group">
                                        <label>Due date</label>
                                        <input type="text" name="due_date" class="form-control date" value=""  />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-9">
                            <div class="row">
                                <table class="table table-striped order-list">
                                    <thead>
                                    <tr>
                                        <th class="text-center" width="20%">Product/Service<i class="text-danger">*</i></th>

                                        <th class="text-center">Description <i class="text-danger">*</i></th>

                                        <th class="text-center">Quantity <i class="text-danger">*</i></th>
                                        <th class="text-center">Price<i class="text-danger">*</i></th>
                                        <th class="text-center">Total</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="first-row">
                                        <td>
                                            <input  name="product_name[]" type="text" class="validate form-control product-name"  required data-error=".errorTxt1">
                                        </td>
                                        <td>
                                            <input  name="description[]" type="text" class="validate form-control expiry_date"  required data-error=".errorTxt1">
                                        </td>

                                        <td>
                                            <input  name="quantity[]" type="number" class="validate form-control quantity"  required data-error=".errorTxt1">
                                        </td>

                                        <td>
                                            <input  name="price[]" type="text" class="validate form-control price"  required data-error=".errorTxt1">
                                        </td>

                                        <td>
                                            <input  name="total[]" type="number" class="validate form-control total"   readonly data-error=".errorTxt1">
                                        </td>
                                        <td>
                                            <button class="btn btn-danger btn-sm delete-row">Delete </button>
                                        </td>
                                    </tr>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td colspan="2">
                                            <button type="button" id="add_invoice_item" class="btn btn-danger">Add New Item</button>
                                        </td>
                                        <td style="text-align:right;" colspan="2"><b>Grand Total:</b></td>
                                        <td class="text-right">
                                            <input type="text" id="grandTotal" class="text-right form-control" name="grand_total_price" value="0.00" readonly="readonly" autocomplete="off">
                                        </td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </form>


                <div class="row">
                    <div class="col-sm-12 text-right"><button class="btn btn-danger save-transaction">Save Transaction</button>
                        <button class="btn btn-danger print-pdf">Print as PDF</button>
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

    <div id="add-new-patient" class="modal fade">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New Patient</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form id="patient-form" method="POST" action="/patient/save" enctype="multipart/form-data">
                        @php
                        $patient = \App\Patients::orderBy('id', 'desc')->first();
                         $uniqueId = isset($patient->patient_unique_id)?$patient->patient_unique_id+1:25082313;
                        @endphp
                        <input type="hidden" name="patient_unique_id" value="{!! $uniqueId !!}" />
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
                                    <input type="text" class="form-control email" name="patient_email" required />
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Phone No</label>
                                    <input type="text" class="form-control" name="contact_number[]" required />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Mobile No</label>
                                    <input type="text" class="form-control" name="contact_number[]" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="last_name">Block/House No</label>
                                    <input id="company_name" name="house_no[]"   type="text"  placeholder="e.g. House No 123#" class="alphanumaric form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="last_name">Appartment/Unit No</label>
                                    <input id="apartments_no" name="apartments_no[]" type="text" placeholder="e.g. Apartment No 123#" class="alphanumaric form-control">
                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="last_name">Street</label>
                                    <input id="street_no" name="street_no[]" type="text" placeholder="e.g. Jurong West, Hougang" class="alphanumaric form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="last_name">City</label>
                                    <input id="city" name="city[]" type="text" placeholder="e.g. Singapore, Newyork, Islamabad" class="alphanumaric form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="last_name">Country</label>
                                    <select class="form-control country" name="country[]" >
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
                                    <input id="zipcode" name="zipcode[]" type="text" class="alphanumaric form-control" placeholder="e.g 408600, 560252">
                                </div>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea id="address" name="address[]"  class="form-control" length="120"></textarea>
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

                    <a href="#!" class="btn btn-danger save-patient">Save</a>
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

            $(".country").select2();

            $("body").on("click",".detail-customer",function () {
                var type = $("#customer-type").val();

                if(type=="patient")
                    $("#add-new-patient").modal();
                if(type=="customer")
                    $("#add-new-customer").modal();

                if(type=="supplier")
                    $("#add-supplier").modal();
            });

            $("body").on("click",".save-supplier",function () {
                $(".alert").hide();
                if($("#supplier-form").valid()){
                    $("#supplier-form").ajaxForm(function (response) {

                        response = $.parseJSON(response);

                        if(response.type=="success"){

                            $("#add-new-patient .success-message").html(response.message);
                            $("#add-new-patient .success-message").show();

                            setTimeout(function () {

                            },1500);
                        }else{
                            $("#add-new-patient .error-message").html(response.message);
                            $("#add-new-patient .error-message").show();
                        }

                    }).submit();
                }
            });

            $("body").on("click",".save-customer",function () {
                $(".alert").hide();
                if($("#customer-form").valid()){
                    $("#customer-form").ajaxForm(function (response) {

                        response = $.parseJSON(response);

                        if(response.type=="success"){

                            $("#add-new-customer .success-message").html(response.message);
                            $("#add-new-customer .success-message").show();

                            setTimeout(function () {

                            },1500);
                        }else{
                            $("#add-new-customer .error-message").html(response.message);
                            $("#add-new-customer .error-message").show();
                        }

                    }).submit();
                }
            });

            $("body").on("click",".save-patient",function () {
                $(".alert").hide();
                if($("#patient-form").valid()){
                    $("#patient-form").ajaxForm(function (response) {

                        response = $.parseJSON(response);

                        if(response.type=="success"){

                            $("#add-supplier .success-message").html(response.message);
                            $("#add-supplier .success-message").show();

                            setTimeout(function () {

                            },1500);
                        }else{
                            $("#add-supplier .error-message").html(response.message);
                            $("#add-supplier .error-message").show();
                        }

                    }).submit();
                }
            });



            $("body").on("click",".save-customer",function () {
                var new_name = $(".new-name").val();
                var customer_type = $("#customer-type").val();
                if(new_name==""){
                    $(".new-name").focus();
                    return false;
                }

                $.ajax({

                });

            });



            $("body").on("click",".save-transaction",function (e) {
                $("#expense-form").validate({ignore: [],

                });
                
                $("#expense-form").ajaxForm(function (response) {
                    response = $.parseJSON(response);

                    if(response.type=="success"){
                        $(".success-message").html(response.message);
                        $(".success-message").show();

                        setTimeout(function () {
                            window.location = "/expenses";
                        },2500);
                    }
                }).submit();

                e.preventDefault();
            });

            $("body").on("keyup",".quantity",function (e) {
                var _quantity = $(this).val();
                var _price = $(this).parents('tr').find('.price').val();

                var _total =  $(this).parents('tr').find('.total');
                if(_price!=""){
                    _total.val((parseInt(_quantity) * parseFloat(_price)).toFixed(2));

                    var sum = $('.total').toArray().reduce(function(sum,element) {
                        if(isNaN(sum)) sum = 0;
                        return sum + parseFloat(element.value);
                    }, 0);

                    $("#grandTotal").val(sum.toFixed(2));
                }

            });

            $("body").on("keyup",".price",function (e) {
                var _price = $(this).val();
                var _quantity = $(this).parents('tr').find('.quantity').val();

                var _total =  $(this).parents('tr').find('.total');
                if(_price!=""){
                    _total.val((parseInt(_quantity) * parseFloat(_price)).toFixed(2));
                    var sum = $('.total').toArray().reduce(function(sum,element) {
                        if(isNaN(sum)) sum = 0;
                        return sum + parseFloat(element.value);
                    }, 0);

                    $("#grandTotal").val(sum.toFixed(2));
                }

            });

            var options = {

                url: function(phrase) {
                    return "/get/products/json";
                },

                getValue: function(element) {
                    return element.value;
                },
                list: {

                    onClickEvent: function() {

                    }
                },

                ajaxSettings: {
                    dataType: "json",
                    method: "GET",
                    data: {
                        dataType: "json"
                    }
                },

                preparePostData: function(data) {
                    data.phrase = $(".product-name").val();
                    return data;
                },

                requestDelay: 400
            };

            $(".product-name").easyAutocomplete(options);

            $(".date").datepicker({
                dateFormat: 'yy-mm-dd',
                minDate: "today"
            });

            $("#add_invoice_item").click(function(e){
                var first_row = $(".first-row").clone();

                first_row.find('input').val('');
                first_row.find('.easy-autocomplete').removeClass('easy-autocomplete');
                first_row.find('.product-name').removeAttr('id');
                first_row.find(".date").removeClass('hasDatepicker');
                first_row.find('.date').removeAttr('id');
                first_row.find('.easy-autocomplete-container').remove();
                $(".order-list> tbody").append(first_row);
                first_row.removeClass('first-row');
                var options = {

                    url: function(phrase) {
                        return "/get/products/json";
                    },

                    getValue: function(element) {
                        return element.value;
                    },
                    list: {

                        onClickEvent: function() {

                        }
                    },

                    ajaxSettings: {
                        dataType: "json",
                        method: "GET",
                        data: {
                            dataType: "json"
                        }
                    },

                    preparePostData: function(data) {
                        data.phrase = first_row.find(".product-name").val();
                        return data;
                    },

                    requestDelay: 400
                };
                first_row.find(".product-name").easyAutocomplete(options);

                first_row.find(".date").datepicker({
                    dateFormat: 'dd.mm.yy',
                    minDate: "today"
                });
                e.preventDefault();
            });

            $("body").on("click",".delete-row",function (e) {
                var _tr_length = $(".order-list >tbody tr").length;
                if(_tr_length==1){
                    alert('There only one row you can\'t delete.');
                    $(".order-list >tbody tr").addClass('first-row');
                    return false;
                }
                $(this).parents('tr').remove();

                e.preventDefault();
            });

            $('select[name=person_name]').select2({
            placeholder: "Enter Name ",

                allowClear: true,
                tags: true,
                minimumInputLength: 3,

                templateResult:patient_result_template,

                dropdownAutoWidth : 'true',

                ajax: {

                url: function (params) {

                    return '/patients/get_all_patients/' + params.term;

                },

                dataType: 'json',

                    data: function (params) {

                    var query = {

                        search: params.term,

                        type: 'public'

                    }



                    // Query parameters will be ?search=[term]&type=public

                    return query;

                }

            }

        }).on('change',function () {
                var id = $(this).val();

                if(id > 0){
                        $.ajax({
                            url:"/get/patient/info/"+id,
                            success:function (response) {
                                response = $.parseJSON(response);
                               $("input[name=email]").val(response.patient_email);

                            }
                        });
                }else{
                   $("#new-customer").show();
                }
            });
        })
        function patient_result_template(patient){



            if(patient.id > 0)

                var $patient = $('<div class="patient-container">'+



                    '<div class="patient-info">'+

                    '<h5>'+patient.text+'</h5>'+

                    '<p class="inner-text"><i class="icon-key"></i> '+patient.patient_unique_id+'  '+

                    //'<i class="icon-phone2" style="margin-left: 20px"></i> '+patient.patient_phone+'</p>'+

                    '</div>'+

                    '</div>');

            else

                var $patient = patient.text;

            return $patient;

        }
    </script>
@endsection