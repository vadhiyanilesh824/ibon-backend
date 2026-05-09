@php
    $value = null;
    for ($i=0; $i < $child_category->level; $i++){
        $value .= '--';
    }
@endphp
<option value="{{ $child_category->id }}" @if(isset($category) && $category->parent_id == $child_category->id) {{ "selected" }} @endif>{{ $value." ".$child_category->name }}</option>
@if ($child_category->categories)
    @foreach ($child_category->categories as $childCategory)
        @include('backend.product.category.child_category', ['child_category' => $childCategory, 'category' => (isset($category) ? $category : NULL )])
    @endforeach
@endif
