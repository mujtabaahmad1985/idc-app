<div style="max-height: 250px; overflow: auto">
    @if(isset($categories) && $categories->count() > 0)
        @foreach($categories as $category)
            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-input-styled search-categories" name="sub_categories[]" value="{!! $category->id !!}" data-fouc>
                    {!! $category->name !!}
                </label>

            </div>
        @endforeach
        @else
        <p class="text-danger">No Sub categories found!</p>
    @endif
</div>