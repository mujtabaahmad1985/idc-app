<table class="table table-striped brand-list-table">
    <thead>
        <tr>
            <th>#</th>
            <th>Brand Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @if(isset($brands) && $brands->count() > 0)
        @foreach($brands as $k=>$brand)
    <tr>
        <td>{!! $k+1 !!}</td>
        <td class="brand-name">{!! $brand->brand_name !!}</td>
        <td>

            <div class="ml-3">
                <div class="list-icons">
                    <div class="list-icons-item dropdown">
                        <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-menu7"></i></a>
                        <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">
                            <a href="#!" class="dropdown-item edit" data-id="{!! $brand->id !!}"><i class="icon-pencil"></i> Edit</a>
                            <a href="#!" class="dropdown-item delete" data-action="" data-id="{!! $brand->id !!}"><i class="icon-trash"></i> Delete</a>

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