
<table class="description-table">
    <tr>
        <td>{!! $title !!}</td>

    </tr>
    <tr>
        <td>
            @if($element=="textarea")
            <textarea rows="4" class="materialize-textarea">{!! isset($description)?$description:"" !!}</textarea>
            @endif
            @if($element=="dropdown")
                @php
                    $d = explode(', ',$description);
                @endphp
                <select id="{!! $type !!}" @if(strtolower($type)=="pre-meds" || strtolower($type)=="xrays" || strtolower($type)=="recall" || strtolower($type)=="saved-items" ) multiple @endif>
                    @if(count($d)>0)
                        @foreach($d as $a)
                            <option selected>{!! $a !!}</option>
                        @endforeach
                    @endif
                </select>
            @endif
        </td>
    </tr>
    <tr>

        <td style="text-align: center"><a href="#!" class="btn red white-text save-description" data-description="{!! $type !!}">Save </a> <a href="#!" class="btn red white-text cancel-description"  data-description="{!! $type !!}">Cancel</a> </td>

    </tr>
</table>

@if($element=="dropdown")

    <script>

        $(function(){
            var patient_id = "{!! $patient_id !!}";
            $("#{!! $type !!}").select2({
                placeholder: "Enter keyword ",
                allowClear: true,
                tags: true,
                minimumInputLength: 3,
                ajax: {
                    url: function (params) {
                        return '/search/treatment-card/data' ;
                    },
                    dataType: 'json',
                    delay: 150,
                    data: function (params) {
                        //   console.log(params);
                        var query = {
                            search: params.term,
                            type:"{!! strtolower($type) !!}",
                            patient_id:patient_id
                        }

                        // Query parameters will be ?search=[term]&type=public
                        return query;
                    },

                },
            });
        })

    </script>
    @endif