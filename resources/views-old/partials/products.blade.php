<style>

    #patient-product-modal .button-row a i{ position: relative;
        top:6px;}
    #patient-product-modal .button-row a{color: #FF0000; font-size: 0.8rem}
    #patient-product-modal .dynamic-field {height: 3rem !important;}
    #patient-product-modal .select2{ width: 330px !important; float: none;position: relative;
        top: 10px;}
    #patient-product-modal .select2-container--open.select2-dropdown--below{ width: 340px !important; font-size: 0.8rem;}
</style>
<div class="row button-row">
    <div id="treament_id_for_product"></div>
<div class="col s4">
    <select name="product_name">
        <option value="" selected disabled="disabled">Select Product</option>
        @if(isset($products[0]) && !empty($products))
            @foreach($products as $product)
                <option value="{!! $product->id !!}" data-code="{!! $product->product_code !!}" data-price="{!! number_format($product->price,2) !!}">{!! $product->product_title !!}</option>
            @endforeach
        @endif
    </select>
    <a href="#!" class="add-more-product"><i class="material-icons" style="margin-left:10px; top:20px">add_circle_outline</i></a>
</div>
    <form id="product_treatment_form" method="post" action="/treatment/product/update" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="col s12">
        <table class="highlight m-top-25" id="products-list">
            <thead>
            <tr>
                <th width="35%">Name</th>
                <th width="15%">Code</th>
                <th>Quantity</th>
                <th width="10%">Price</th>
                <th>Discount</th>

                <th>Total Price</th>
                <th width="5%">Action</th>
            </tr>
            </thead>
            <tbody>
@if(isset($treatment_product) && isset($treatment_product[0]))
    @foreach($treatment_product as $value)
        <input type="hidden" name="treatment_id[]" value="{!! $value->t_p_id !!}" />
        <tr>
            <td>
                {!! $value->product_title !!}
            </td>
            <td> {!! $value->product_code !!} </td>
            <td><input type="number" name="product_quantity[]" min="1"  value="{!! $value->quantity !!}" data-type="quantity"  class="dynamic-field"> </td>
            <td> {!! number_format($value->original_price,2) !!} </td>
            <td><input type="number" name="product_discount[]"  value="{!! $value->discount !!}"  data-type="discount"   class="dynamic-field"> </td>

            <td><input type="number" name="product_discount_price[]"  readonly="readonly" value="{!! number_format($value->price_charged,2) !!}" class="dynamic-field total-price"> </td>
            <td><a href="#!"><i class="material-icons">delete</i></a> </td>
        </tr>
    @endforeach
@endif
            </tbody>
        </table>
    </div>
    </form>
</div>
<div id="modal-product" class="modal">
    <div class="modal-content">
        <div class="row">
            <h4>Add New Product</h4>
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
<script>
    $(function () {

        $(".add-more-product").click(function(){
            $("#modal-product").modal('open');
        });

        $(".button-row select[name=product_name]").select2().on('change', function () {
            var treatment_id = $("#treament_id_for_product").attr('treatment-id');
            var product_id = $(this).val();

            $.ajax({
                url:"/treatment/save_product",
                type:"POST",
                data:{"_token":"{!! csrf_token() !!}",treatment_id:treatment_id,product_id:product_id},
                success:function (response) {
                    $("#products-list > tbody").html(response);


                    $(function(){
                        $(".dynamic-field").on('change', function(){
                            //alert($(this).val());
                        });
                    })

                    var timeoutId;
                    $('form#product_treatment_form input, form#product_treatment_form textarea').on('input propertychange change', function() {



                        clearTimeout(timeoutId);
                        timeoutId = setTimeout(function() {
// Runs 1 second (1000 ms) after the last change
//$(".progress").show();
                            $(".ajax-loading").hide();
                            $("#product_treatment_form").ajaxForm(function(response){
                                $(".progress").hide();
                                $(".ajax-loading").show();

                                setTimeout(function(){
                                    $(".ajax-loading").hide();
                                },1500);
                            }).submit();

                        }, 2000);
                    });

                }
            });
        });
        $("#quantity").on('change', function(){


            var price = $(this).parent().parent().find('.original-price').html();
            var discount = $(this).parent().parent().find(".discount").val();
            var quantity = $(this).val();
            var p = 0;
            p = (parseFloat(price)*parseFloat(quantity))-parseFloat(discount);


            $(this).parent().parent().find('.total-price').val(p);
        });

        $("#discount").on('change', function(){


            var price = $(this).parent().parent().find('.original-price').html();
            var discount = $(this).val();
            var quantity = $(this).parent().parent().find(".quantity").val();
            var p = 0;
            p = (parseFloat(price)*parseFloat(quantity))-parseFloat(discount);


            $(this).parent().parent().find('.total-price').val(p);
        });

        var timeoutId;
        $('form#product_treatment_form input, form#product_treatment_form textarea').on('input propertychange change', function() {



            clearTimeout(timeoutId);
            timeoutId = setTimeout(function() {
// Runs 1 second (1000 ms) after the last change
//$(".progress").show();
                $(".ajax-loading").hide();
                $("#product_treatment_form").ajaxForm(function(response){
                    $(".progress").hide();
                    $(".ajax-loading").show();

                    setTimeout(function(){
                        $(".ajax-loading").hide();
                    },1500);
                }).submit();

            }, 2000);
        });
    })
</script>