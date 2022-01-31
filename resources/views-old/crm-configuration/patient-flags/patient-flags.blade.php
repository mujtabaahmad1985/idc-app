
<table class="table table-striped">
    <thead>
        <tr>
            <td width="5%">#</td>
            <td width="50%">Title</td>
            <td width="20%">Color</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>

    @foreach($flags as $f)
        <tr>
            <td><i class="icon-flag7" style="color:{!! $f->color !!}"></i> </td>
            <td>{!! $f->name !!}</td>
            <td><div style="width: 20px; height: 20px; background-color: {!! $f->color !!}"></div> </td>
            <td>
                <div class="ml-3">
                    <div class="list-icons patient-flag-action">
                        <div class="list-icons-item dropdown">
                            <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-menu7"></i></a>
                            <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">


                                <a href="#!" class="dropdown-item edit" data-action="edit" data-id="{!! $f->id !!}"><i class="icon-pencil3"></i> Edit</a>
                                <a href="#!" class="dropdown-item delete" data-action="" data-id="{!! $f->id !!}"><i class="icon-trash"></i> Delete</a>

                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>