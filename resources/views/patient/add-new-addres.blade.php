
<div class="card-panel address-new">
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="house_no" class="">Block/House No </label>
            <input id="house_no" name="house_no[]" type="text" placeholder="e.g. House No 123#" class="alphanumaric form-control">

            </div>

        </div>

        <div class="col-md-3">
            <div class="form-group">
            <label for="apartments_no" class="">Appartment/Unit No </label>
            <input id="apartments_no" name="apartments_no[]" type="text" placeholder="e.g. Apartment No 123#" class="alphanumaric form-control">

</div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label for="last_name">Street</label>
                <input id="street_no" name="street_no[]" type="text" placeholder="e.g. Jurong West, Hougang" class="alphanumaric form-control">
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label for="last_name">City</label>
                <input id="city" name="city[]" type="text" placeholder="e.g. Singapore, Newyork, Islamabad" class="alphanumaric form-control">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <label for="last_name">Country</label>
                <select class="icons country" name="country[]" >
                    <option value="">Choose Country</option>
                    @foreach($countries as $country)
                        <option value="{!! $country->name !!}" data-icon="/public/flags/{!! strtolower($country->short_name) !!}.svg" class="left circle">{!! $country->name !!}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label for="last_name">Zipcode</label>
                <input id="zipcode" name="zipcode[]" type="text" class="alphanumaric form-control" placeholder="e.g 408600, 560252">
            </div>
        </div>


    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label>Address</label>
                <textarea id="address" name="address[]"  class="form-control" length="120"></textarea>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col s12 center">
            <a href="#!" class="btn btn-danger red white-text delete-address">Delete Address</a>
        </div>
    </div>
</div>
<script>
    $(function(){
        $(".country").select2();

        $(".delete-address").click(function(){
            $(this).parents('.address-new').remove();
        });
    })
</script>