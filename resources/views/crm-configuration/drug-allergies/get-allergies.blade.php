

<table class="table table-striped">
    <thead>
    <tr>
<td></td>
        <td width="90%">Name</td>
        <td>Action</td>
    </tr>
    </thead>
    <tbody>

    @if(isset($drug_allergies))
        @foreach($drug_allergies as $a)
        <tr>
<td></td>
            <td>{!! $a->name !!}</td>

            <td>
                <div class="ml-3">
                    <div class="list-icons drug-action">
                        <div class="list-icons-item dropdown">
                            <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-menu7"></i></a>
                            <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">


                                <a href="#!" class="dropdown-item edit" data-action="edit" data-id="{!! $a->id !!}"><i class="icon-pencil3"></i> Edit</a>
                                <a href="#!" class="dropdown-item delete" data-action="" data-id="{!! $a->id !!}"><i class="icon-trash"></i> Delete</a>

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

<div class="row mt-2">
    <div class="col-sm-12 align-self-center">
        {!! $drug_allergies->links() !!}
    </div>
</div>




