@extends('layout.app')
@section('page-title') Products : Setup @endsection
@section('css')
    {!! Html::style('public/material/js/plugins/dropify/css/dropify.min.css') !!}
@endsection

@section('content')
    <style type="text/css">
        .input-field div.error{
            position: relative;
            top: -1rem;
            left: 0rem;
            font-size: 0.8rem;
            color:#FF0000;
            -webkit-transform: translateY(0%);
            -ms-transform: translateY(0%);
            -o-transform: translateY(0%);
            transform: translateY(0%);
        }
        .input-field label.active{
            width:100%;
        }
        .left-alert input[type=text] + label:after,
        .left-alert input[type=password] + label:after,
        .left-alert input[type=email] + label:after,
        .left-alert input[type=url] + label:after,
        .left-alert input[type=time] + label:after,
        .left-alert input[type=date] + label:after,
        .left-alert input[type=datetime-local] + label:after,
        .left-alert input[type=tel] + label:after,
        .left-alert input[type=number] + label:after,
        .left-alert input[type=search] + label:after,
        .left-alert textarea.materialize-textarea + label:after{
            left:0px;
        }
        .right-alert input[type=text] + label:after,
        .right-alert input[type=password] + label:after,
        .right-alert input[type=email] + label:after,
        .right-alert input[type=url] + label:after,
        .right-alert input[type=time] + label:after,
        .right-alert input[type=date] + label:after,
        .right-alert input[type=datetime-local] + label:after,
        .right-alert input[type=tel] + label:after,
        .right-alert input[type=number] + label:after,
        .right-alert input[type=search] + label:after,
        .right-alert textarea.materialize-textarea + label:after{
            right:70px;
        }
        .dropdown-content{
            background: #f5f2f0 !important;;
        }
        .dropdown-content a{color:rgba(0,0,0,0.54) !important;}
        .dropdown-content li{
            padding:10px !important;}
        .card{
            overflow: visible;}
        .setup .card .card-action{width: 100%}
        .setup .card .card-content {
            min-height: auto;
            padding-bottom: 63px;
        }

    </style>
    <section id="content">

    @include('partials.breadcrumb')

    <!--start container-->
        <div class="container">
            <div class="row">
                <h4 class="header col s6">Products</h4>
                <div class="col s6 right-align" style="margin-top:20px">
                    <a href="javascript:;" class="btn-floating waves-effect waves-light  btn red m-10 add-product"><i class="material-icons">add</i> </a>
                </div>
                <div style="clear:clear"></div>


            </div>

            <div class="row setup">
                @if(isset($products) && count($products) > 0)
                        @foreach($products as $product)
                            <div class="col s4 m3 l3">
                    <div class="card hoverable">
                        <div class="card-image">
                            @if($product->featured_picture)
                            <img src="/public/uploads/products/{!! $product->featured_picture !!}" style="width: 100%">
                            @else
                                <img src="/public/img/no-image-available.jpg" style="width: 100%">
                                @endif
                            <span class="card-title red center">{!! $product->product_title !!}</span>

                        </div>
                        <div class="card-content">
                            <p>{!! str_limit($product->description,150,'...') !!}</p>
                            <div class="row">
                                <div class="col s6 m6 l6">{{number_format($product->price,2)}}SGD</div>
                                <div class="col s6 m6 l6 right-align"><span class="badge red white-text">{{$product->quantity}}</span></div>
                            </div>
                        </div>
                        <div class="card-action">
                            <a class="btn-floating grey left get" data-id="{!! $product->id !!}"><i class="material-icons">create</i></a>
                            <a class="btn-floating red right delete"  data-id="{!! $product->id !!}"><i class="material-icons">delete</i></a>
                            <div style="clear: both"></div>
                        </div>
                    </div>
                </div>
                         @endforeach
                @endif
            </div>


        </div>

    </section>
    <div id="modal-product" class="modal">
        <div class="modal-content">
            <div class="row">
                <h4>Add Product</h4>
            </div>
            <div class="row">
                <form class="col s12" id="form" method="post" action="/product/save" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">shop</i>
                            <input id="product_title" name="product_title" type="text" class="validate"  data-error=".errorTxt1">
                            <label for="product_title" class="">Product Name</label>
                            <div class="errorTxt1 error"></div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="input-field col s4">
                            <i class="material-icons prefix">link</i>
                            <input id="product_code" type="text" class="validate" name="product_code"  data-error=".errorTxt2">
                            <label for="product_code">Product Code</label>
                            <div class="errorTxt2 error"></div>
                        </div>
                        <div class="input-field col s4">
                            <i class="material-icons prefix">info</i>
                            <input id="quantity" type="number" class="validate" name="quantity"  data-error=".errorTx3">
                            <label for="quantity">Quantity</label>
                            <div class="errorTxt3 error"></div>
                        </div>
                        <div class="input-field col s4">
                            <i class="material-icons prefix">local_offer</i>
                            <input id="price" type="text" class="validate" name="price"  data-error=".errorTx4">
                            <label for="price">Price</label>
                            <div class="errorTxt4 error"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <p>Upload document here</p>
                            <input type="file" id="input-file-now" class="dropify" name="featured_image" data-default-file="" />

                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">create</i>
                            <textarea id="notes" name="description" class="materialize-textarea"></textarea>
                            <label for="notes" class="">Description</label>
                        </div>
                    </div>
                    <div class="card green success-message" style="display: none;">
                        <div class="card-content white-text">
                            <p>d</p>
                        </div>
                    </div>
                    <div class="card red error-message"  style="display: none;">
                        <div class="card-content white-text">
                            <p>d</p>
                        </div>
                    </div>
                </form>
            </div>

        </div>
        <div class="modal-footer">
            <a href="#" class="waves-effect waves-red btn-flat modal-action modal-close">Close</a>
            <a href="#" class="waves-effect waves-green btn-flat modal-action save-product">Add Product</a>
        </div>
    </div>
    <div id="edit-modal-product" class="modal">
        <div class="modal-content">
            <div class="row">
                <h4>Update Product</h4>
            </div>
            <div class="row">
                <form class="col s12" id="update-form" method="post" action="/product/update" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="product_id" />
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">shop</i>
                            <input id="product_title" name="product_title" type="text" class="validate"  data-error=".errorTxt1">
                            <label for="product_title" class="">Product Name</label>
                            <div class="errorTxt1 error"></div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="input-field col s4">
                            <i class="material-icons prefix">link</i>
                            <input id="product_code" type="text" class="validate" name="product_code"  data-error=".errorTxt2">
                            <label for="product_code">Product Code</label>
                            <div class="errorTxt2 error"></div>
                        </div>
                        <div class="input-field col s4">
                            <i class="material-icons prefix">info</i>
                            <input id="quantity" type="number" class="validate" name="quantity"  data-error=".errorTx3">
                            <label for="quantity">Quantity</label>
                            <div class="errorTxt3 error"></div>
                        </div>
                        <div class="input-field col s4">
                            <i class="material-icons prefix">local_offer</i>
                            <input id="price" type="text" class="validate" name="price"  data-error=".errorTx4">
                            <label for="price">Price</label>
                            <div class="errorTxt4 error"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <p>Upload document here</p>
                            <input type="file" id="input-file-now" class="dropify" name="featured_image" data-default-file="" />

                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">create</i>
                            <textarea id="notes" name="description" class="materialize-textarea"></textarea>
                            <label for="notes" class="">Description</label>
                        </div>
                    </div>
                    <div class="card green success-message" style="display: none;">
                        <div class="card-content white-text">
                            <p>d</p>
                        </div>
                    </div>
                    <div class="card red error-message"  style="display: none;">
                        <div class="card-content white-text">
                            <p>d</p>
                        </div>
                    </div>
                </form>
            </div>

        </div>
        <div class="modal-footer">
            <a href="#" class="waves-effect waves-red btn-flat modal-action modal-close">Close</a>
            <a href="#" class="waves-effect waves-green btn-flat modal-action update-product">Update Product</a>
        </div>
    </div>
@endsection


@section('js')

    {!! Html::script('/public/js/jquery.form.js') !!}
    {!! Html::script('/public/plugins/jquery.validate/js/jquery.validate.min.js') !!}
    {!! Html::script('public/material/js/plugins/dropify/js/dropify.min.js') !!}
    <script>
        $(function(){
            var picture = $('.dropify').dropify();
            $(".add-product").click(function(){
                $("#modal-product").modal('open');
            });

            $(".delete").click(function () {
                var id = $(this).attr('data-id');
                swal({    title: "Are you sure?",
                        text: "You will not be able to recover this product!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes, delete it!",
                        closeOnConfirm: false },
                    function(){
                        $.post("/product/delete",{id:id,"_token":"{{ csrf_token() }}"}, function (response) {
                            //response  =$.parseJSON(response);
                            swal("Deleted!", "Product has been deleted.", "success");
                            setTimeout(function(){location.reload()}, 2500);
                        })

                    });
            });

            $(".get").click(function(){
                var id = $(this).attr('data-id');
                $.post("/product/get",{"_token":"{{csrf_token()}}", id:id}, function (response) {
                    response = $.parseJSON(response);
                    $("#product_id").val(id);
                    $("#edit-modal-product input[name=product_title]").val(response.product_title);
                    $("#edit-modal-product input[name=product_title]").focusin();
                    $("#edit-modal-product input[name=product_code]").val(response.product_code);
                    $("#edit-modal-product input[name=product_code]").focusin();

                    $("#edit-modal-product input[name=quantity]").val(response.quantity);
                    $("#edit-modal-product input[name=quantity]").focusin();

                    $("#edit-modal-product input[name=price]").val(response.price);
                    $("#edit-modal-product input[name=price]").focusin();

                      //  picture.dropify('destroy');
                    //$("#edit-modal-product input[type=file]").attr('data-default-file',response.picture);
                      //  picture.init();




                    $("#edit-modal-product textarea[name=description]").val(response.description);
                    $("#edit-modal-product textarea[name=description]").focusin();

                    $("#edit-modal-product").modal('open');
                });
        });

            $(".save-product").click(function(e){
                $(".alert").hide();
                $validation = $("#form").validate({
                    // Validation rules
                    // Selecting input by name attribute
                    rules: {

                        product_title: {
                            required: true
                        },
                        product_code: {
                            required: true
                        },
                        quantity: {
                            required: true
                        },
                        price: {
                            required: true
                        },

                    },
                    // Error messages
                    messages: {
                        product_title: "Please enter product title.",
                        product_code: "Please enter product code",
                        quantity: "Please enter quantity",
                        price:"Please enter price"

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

                    $("#form").ajaxForm(function(response){
                        response = $.parseJSON(response);
                        if(response.type=="success"){
                            $('.success-message').html(response.message);
                            $('.success-message').fadeIn();

                            setTimeout(function(){location.reload()}, 2500);
                        }else{
                            $('.error-message').html(response.message);
                            $('.error-message').fadeIn();
                        }
                    }).submit();
                }
                e.preventDefault();
            });
            $(".update-product").click(function(e){
                $(".alert").hide();
                $validation = $("#update-form").validate({
                    // Validation rules
                    // Selecting input by name attribute
                    rules: {

                        product_title: {
                            required: true
                        },
                        product_code: {
                            required: true
                        },
                        quantity: {
                            required: true
                        },
                        price: {
                            required: true
                        },

                    },
                    // Error messages
                    messages: {
                        product_title: "Please enter product title.",
                        product_code: "Please enter product code",
                        quantity: "Please enter quantity",
                        price:"Please enter price"

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

                if($("#update-form").valid()){

                    $("#update-form").ajaxForm(function(response){
                        response = $.parseJSON(response);
                        if(response.type=="success"){
                            $('.success-message').html(response.message);
                            $('.success-message').fadeIn();

                            setTimeout(function(){location.reload()}, 2500);
                        }else{
                            $('.error-message').html(response.message);
                            $('.error-message').fadeIn();
                        }
                    }).submit();
                }
                e.preventDefault();
            });
        })




    </script>
    {{--{!! Html::script('public/demo/demo-form-layouts.js') !!}--}}
@endsection