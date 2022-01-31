@extends('layout.app')
@section('page-title') Payments : Setup @endsection
@section('css')

@endsection

@section('content')

    <div class="content">
        <div class="card col-sm-12 col-md-6">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Payment Methods</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>


                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 text-right float-sm-right"><button class="btn btn-danger addpayment">Add New Payment</button> </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-striped patient-list-table">
                            <thead>
                            <tr>
                                <th width="50px"><div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="all"  >
                                        <label class="custom-control-label" for="all"></label>
                                    </div></th>
                                <th width="85%">Payment Method</th>


                                <th>Actions</th>
                            </tr>
                            </thead>

                            <tbody>
                            @if(isset($payment) && count($payment) > 0)
                                @foreach($payment as $p)
                                    <tr>
                                        <td><div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="payment-{!! $p->id !!}"   value="{!! $p->id !!}" >
                                                <label class="custom-control-label" for="payment-{!! $p->id !!}"></label>
                                            </div></td>
                                        <td>{!! $p->payment_title !!}</td>


                                        <td>

                                            <div class="ml-3">
                                                <div class="list-icons">
                                                    <div class="list-icons-item dropdown">
                                                        <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-menu7"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">


                                                            <a href="#!" class="dropdown-item edit" data-action="edit" data-id="{!! $p->id !!}"><i class="icon-pencil3"></i> Edit</a>
                                                            <a href="#!" class="dropdown-item delete" data-action="" data-id="{!! $p->id !!}"><i class="icon-trash"></i> Delete</a>

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

    <div id="modal-payment" class="modal fade">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Location</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <form id="form" class="col s12" method="post" action="/payments/add" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="payment_title">Payment Title</label>
                                <input id="payment_title" name="payment_title" type="text" class="validate form-control">
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

                    <a href="#!" class="btn btn-danger save">Add Payment</a>
                </div>

            </div>
        </div>
    </div>



@endsection


@section('js')

    {!! Html::script('/public/js/jquery.form.js') !!}
    {!! Html::script('/public/plugins/jquery.validate/js/jquery.validate.min.js') !!}
    <script>
        $(function(){
            $(".addpayment").click(function(){
                $("#modal-payment").modal();;
            });
            $(".delete").click(function(){
                var id = $(this).attr('data-id');
                swal({    title: "Are you sure?",
                        text: "You will not be able to recover this information!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes, delete it!",
                        closeOnConfirm: false },
                    function(){
                        $.post("/payment/delete",{id:id,"_token":"{{ csrf_token() }}"}, function (response) {

                            swal("Deleted!", "Payment has been deleted.", "success");
                            setTimeout(function(){location.reload()}, 2500);
                        })

                    });
            });

            $(".save").click(function(e){
                //  alert();
                $(".alert").hide();
                $validation = $("#form").validate({
                    // Validation rules
                    // Selecting input by name attribute
                    rules: {


                        payment_title: {
                            required: true
                        },



                    },
                    // Error messages
                    messages: {
                        payment_title: "Enter Payment Title",


                    },
                    highlight: function(element, errorClass, validClass) {
                        $(element).closest('.form-group').addClass('has-error').find('label').addClass('control-label');
                    },
                    unhighlight: function(element, errorClass, validClass) {
                        $(element).closest('.form-group').removeClass('has-error');
                    },
                    // Class that wraps error message
                    errorClass: "help-block",
                    focusInvalid: true,
                    // Element that wraps error message
                    errorElement : 'div',
                    errorPlacement: function(error, element) {
                        var placement = $(element).data('error');
                        if (placement) {
                            $(placement).append(error)
                        } else {
                            error.insertAfter(element);
                        }
                    },
                    success: function(helpBlock) {
                        if( $(helpBlock).closest(".form-group").hasClass('has-error') ){
                            $(helpBlock).closest(".form-group").removeClass("has-error").addClass("has-success");
                        }
                    }
                });

                if($("#form").valid()){
                    $(".preloader").addClass('active');
                    $(".preloader").show();
                    $("#form").ajaxForm(function(response){
                        response = $.parseJSON(response);
                        if(response){
                            $('.success-message').html('Payment is added successfully');
                            $('.success-message').fadeIn();
                            $(".preloader").removeClass('active');
                            $(".preloader").hide();
                            var str = "";


                            if(response){


                                setTimeout(function(){ location.reload();}, 2500);
                            }


                        }
                    }).submit();
                }
                e.preventDefault();
            });
        })




    </script>
    {{--{!! Html::script('public/demo/demo-form-layouts.js') !!}--}}
@endsection