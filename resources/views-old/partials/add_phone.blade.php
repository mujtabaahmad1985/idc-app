<div class="row new-phone">
    @php
    $id = rand(1,1000);
    @endphp
    <div class="col-sm-2">
        <div class="form-group">

            <select class="icons country-code" name="country_code[]" id="country_code{!! $id !!}">
            <option value="">Choose Country</option>
            @foreach($countries as $country)
                <option  value="{!! $country->code !!}" data-code="{!! $country->code !!}" class="left circle">{!! $country->name !!} ( +{!! $country->code !!} )</option>
                @endforeach
                </select>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">

            <input id="new_contact_number{!! $id !!}" name="new_contact_number[]" data-length="20" maxlength="20"   value="" type="text" class="form-control validate contact_number long-value-restriction">
        </div>
    </div>
    <div class="col-sm-1">

        <a class="remove-button mt-1" href="#!"><i class="icon-trash text-danger"></i> </a>
    </div>


</div>

