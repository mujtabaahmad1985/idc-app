<table class="table table-striped category-list-table">
    <thead>
     <tr>

         <th width="80%">Name</th>
         <th></th>
     </tr>
    </thead>
    <tbody>
        @if(isset($categories) && $categories->count() > 0)

                @foreach($categories as $category)
                <tr>
                    <td  ><span class="category-name">{!! $category->name !!}</span>
                     @if(isset($category->sub_categories) && $category->sub_categories->count() > 0)
                    <table class="table table-striped">
                        @foreach($category->sub_categories as $sub)
                        <tr>
                            <td><span class="category-name">{!! $sub->name !!}</span></td>
                            <td>

                                <div class="ml-3">
                                    <div class="list-icons">
                                        <div class="list-icons-item dropdown">
                                            <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-menu7"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">
                                                <a href="#!" class="dropdown-item category-edit" data-id="{!! $sub->id !!}"><i class="icon-pencil ml-1"></i> Edit</a>
                                                <a href="#!" class="dropdown-item category-delete" data-action="" data-id="{!! $sub->id !!}"><i class="icon-trash ml-1"></i> Delete</a>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </td>
                        </tr>
                        @endforeach
                    </table>
                         @endif
                    </td>
                    <td>

                        <div class="ml-3">
                            <div class="list-icons">
                                <div class="list-icons-item dropdown">
                                    <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-menu7"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">
                                        <a href="#!" class="dropdown-item category-edit" data-id="{!! $category->id !!}"><i class="icon-pencil ml-1"></i> Edit</a>
                                        <a href="#!" class="dropdown-item category-delete" data-action="" data-id="{!! $category->id !!}"><i class="icon-trash ml-1"></i> Delete</a>

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