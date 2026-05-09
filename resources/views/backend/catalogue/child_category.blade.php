@php
    $value = null;
    for ($i=0; $i < $child_category->level; $i++){
        $value .= '--';
    }
@endphp
<option value="{{ $child_category->id }}" @if(isset($catalogue) && !empty($catalogue) && $catalogue !== NULL) @if(!empty($catalogue) && ($catalogue->category_id??0) == $child_category->id) {{ "selected" }} @endif @endif @if(isset($category) && $category->parent_id == $child_category->id) {{ "selected" }} @endif>{{ $value." ".$child_category->name }}</option>
@if ($child_category->categories)
    @foreach ($child_category->categories as $childCategory)
    @if(isset($catalogue) && !empty($catalogue) && $catalogue !== NULL) 
        @include('backend.product.category.child_category', ['child_category' => $childCategory, 'category' => (isset($category) ? $category : NULL ), 'catalogue' => (!empty($catalogue) ? $catalogue : NULL )])
        @else
        @include('backend.product.category.child_category', ['child_category' => $childCategory, 'category' => (isset($category) ? $category : NULL )])

        @endif
    @endforeach
@endif
