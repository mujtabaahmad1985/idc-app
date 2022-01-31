@extends('layout.app')
@section('page-title') Booking Process : Setup @endsection
@section('css')

@endsection

@section('content')

    <div class="content">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Booking Process</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>


                    </div>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-striped patient-list-table">
                    <thead>
                    <tr>
                        <th><div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="all"  >
                                <label class="custom-control-label" for="all"></label>
                            </div></th>
                        <th>Title</th>
                        <th>Is Required?</th>


                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    @if(isset($booking_email_phone) && count($booking_email_phone) > 0)
                        @foreach($booking_email_phone as $p)
                            <tr>
                                <td><div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="process-{!! $p->id !!}"   value="{!! $p->id !!}" >
                                        <label class="custom-control-label" for="process-{!! $p->id !!}"></label>
                                    </div></td>
                                <td>{{$p->field_label}}</td>
                                <td>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input field" @if($p->status=="Yes") checked @endif  id="booking-process-{!! $p->id !!}"   value="{!! $p->id !!}" >
                                        <label class="custom-control-label" for="booking-process-{!! $p->id !!}"></label>
                                    </div>

                                </td>


                                <td>

                                    <div class="ml-3">
                                        <div class="list-icons">
                                            <div class="list-icons-item dropdown">
                                                <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-menu7"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">



                                                    <a href="#!" class="dropdown-item delete" data-action="" data-id="{!! $p->id !!}"><i class="icon-trash"></i> Delete</a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="4">
                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <input type="text" class="form-control text-field" />
                                    </div>
                                    <div class="col-sm-3">
                                        <select class="field_type form-control">
                                            <option value="text">Text</option>
                                            <option value="Yes/No">Yes/No</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <a href="javascript:;" class="save btn btn-danger"><i class="icon-floppy-disk"></i> </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Take Payment</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>


                    </div>
                </div>
            </div>
            <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <select class="payment-options form-control" multiple>
                                <option value="">Choose payment</option>
                                @if(isset($payments) && count($payments) > 0 && !is_null($payments))
                                    @foreach($payments as $payment)
                                        <option value="{!! $payment->payment_title !!}" @if(in_array($payment->payment_title,!is_null($booking_payments)?$booking_payments:array())) selected @endif>{!! $payment->payment_title !!}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">After The Booking</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>


                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <p class="strong">Approval of customer booking requests</p>
                        <p>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="approve-customer" name="booking_request"  @if(isset($booking_request) && $booking_request=="approve-customer") checked="" @endif   value="approve-customer" >
                            <label class="custom-control-label" for="approve-customer">Approve customer booking requests automatically</label>
                        </div>

                        </p>

                        <p>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="test5" name="booking_request"  @if(isset($booking_request) && $booking_request=="myself") checked @endif   value="myself" >
                            <label class="custom-control-label" for="test5">I want to approve new requests myself</label>
                        </div>


                        </p>
                        <hr />

                        <p class="strong">Approval of customer booking requests</p>
                        <p>

                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input approval-options" id="send_email" name="approval_request[]"  @if(isset($booking_options) && in_array('send_email',$booking_options)) checked @endif  value="send_email" >
                            <label class="custom-control-label" for="send_email">Send Email</label>
                        </div>

                        </p>
                        <p>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input approval-options" id="sms" name="approval_request[]" @if(isset($booking_options) && in_array('sms',$booking_options)) checked @endif    value="sms" >
                            <label class="custom-control-label" for="sms">SMS</label>
                        </div>
                        </p>
                        <p>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input approval-options" id="whatsapp"  name="approval_request[]"  @if(isset($booking_options) && in_array('whatsapp',$booking_options)) checked @endif   value="whatsapp" >
                            <label class="custom-control-label" for="whatsapp">WhatsApp</label>
                        </div>


                        </p>

                    </div>
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

            $("input[name=booking_request]").on('change', function(){
              //  alert($(this).val());
                var _value = $(this).val();
                $.ajax({
                    url:"/bookingprocess/booking_request",
                    type:"POST",
                    data:{value:_value,"_token":"{{csrf_token()}}"},
                    success:function (response) {
                        
                    }
                });
            });

            $(".approval-options").on('change', function(){
                var is_checked = false;
                var is_value = $(this).val();
               if($(this).is(":checked")){
                  is_checked = true;
               }else{
                   is_checked = false;
               }
                $.post("/bookingprocess/update_approval_options",{is_checked:is_checked,"_token":"{{csrf_token()}}", is_value:is_value}, function(response){

                });
            });

            $(".payment-options").select2().change(function(){
                var payments = [];
                var ths = $(this);
                ths.parents(".payment-field").find('.response').html('Saving...');
                $(".payment-options option:selected").each(function(){
                    var selected_payments = $(this).val();
                    payments.push(selected_payments);
                });
                $.post('/bookingprocess/payments',{"_token":"{{csrf_token()}}", payments:payments}, function(){
                    ths.parents(".payment-field").find('.response').html('Saved');

                    setTimeout(function(){
                        ths.parents(".payment-field").find('.response').html('');
                    },2000);
                });
            });

                $(".field").on('change', function(){
                    var status = "No"
                    if($(this).is(":checked")){
                        status = "Yes"
                    }
                    var ths = $(this);
                    var id = $(this).val();
                    ths.parents(".fields").find('.response').html('Saving...');
                   $.post("/bookingprocess/update",{"_token":"{{csrf_token()}}", status:status,id:id}, function(response){
                       ths.parents(".fields").find('.response').html('Saved');

                       setTimeout(function(){
                           ths.parents(".fields").find('.response').html('');
                       },2000);
                   });

                });

                $(".delete").click(function(){
                    var id = $(this).attr('data-id');
                    var ths = $(this);
                    ths.parents(".fields").find('.response').html('Deleting...');
                    $.post("/bookingprocess/delete",{"_token":"{{csrf_token()}}",id:id}, function(response){
                        ths.parents("tr").remove();


                    });

                });

                $(".save").click(function(){
                    var label = $(".text-field").val();
                    var type = $(".field_type option:selected").val();

                    if(label==""){
                        $(".text-field").focus();
                    }else{
                        $.post("/bookingprocess/add",{"_token":"{{csrf_token()}}",label:label,type:type}, function(){
                            location.reload();
                        });
                    }
                });
        })




    </script>
    {{--{!! Html::script('public/demo/demo-form-layouts.js') !!}--}}
@endsection