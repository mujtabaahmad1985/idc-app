@extends('layout.app')
@section('page-title') Hospitals @endsection
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
    <div class="content">
        <div class="card col-sm-12 col-md-12">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Hopsitals</h5>

            </div>
            {{--<div class="card-body">
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
            </div>--}}





            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-striped contact-list-table">
                        <thead>
                        <tr>
                            <td>Logo</td>
                          <th>Name</th>
                            <th>Email Address</th>
                            <th>Phone Number</th>
                            <th>Address</th>
                            <th>Total Patients</th>
                            <th>Total Sale</th>
                            <td>Date/Time</td>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($hospitals) && $hospitals->count() > 0)
                            @foreach($hospitals as $hospital)
                                <tr>
                                   <td><img width="50px" src="{!! \Illuminate\Support\Facades\Storage::disk('images')->url($hospital->logo) !!}" class="img-fluid img-circle"></td>
                                    <td>{!! $hospital->hospital_name !!}</td>
                                    <td><a href="mailto:{!! isset($hospital->users)?$hospital->users->email:'' !!}" class="email text-danger">{!! isset($hospital->users)?$hospital->users->email:'' !!}</a> </td>
                                    <td>{!! $hospital->phone !!}</td>
                                    <td>{!! $hospital->address !!}</td>
                                    <td>{!! isset($hospital->users->hospital_patients)?($hospital->users->hospital_patients[0]->patient_count):0 !!}</td>
                                    <td>{!! isset($hospital->users->total_sales)?number_format($hospital->users->total_sales[0]->grand_total,2):0 !!}</td>
                                    <td>{!! \App\Helpers\CommonMethods::formatDateTime($hospital->created_at) !!}</td>
                                    <td>
                                        <div class="ml-3">
                                            <div class="list-icons">
                                                <div class="list-icons-item dropdown">
                                                    <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-menu7"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">
                                                        <a href="/hospital/view/{!! $hospital->id !!}" class="dropdown-item " data-id="{!! $hospital->id !!}"><i class="icon-eye"></i> View</a>
                                                        <a href="/hospital/edit/{!! $hospital->id !!}" class="dropdown-item" data-id="{!! $hospital->id !!}"><i class="icon-pencil"></i> Edit</a>
                                                        <a href="#!" class="dropdown-item hospital-delete" data-action="" data-id="{!! $hospital->id !!}"><i class="icon-trash"></i> Delete</a>
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
                                {!! $hospitals->links() !!}
                            </td>
                        </tr>
                        </tfoot>
                    </table>
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

    <script>
        $(function () {


            $(".contact-list-table").DataTable({
                "paging": false,
                "info":false,
                "searching": false,
                dom: 'Bfrtip',
                buttons: [

                    {
                        text: '<i class="icon-plus2"></i> New Hospital',
                        className:"btn bg-danger-400 btn-icon rounded-round",

                        action: function ( e, dt, node, config ) {
                            window.location = "/new/hospital";
                        }
                    },
                    ]
            });
            
            $("body").on("click",".delete-hospital",function () {
                var id = $(this).data('id');
                
                $.ajax({
                    url:"/hospital/delete/"+id,
                    success:function () {
                        
                    }
                });
            });
        });
    </script>


@endsection