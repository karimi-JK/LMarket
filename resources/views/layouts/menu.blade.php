<li class="{{ Request::is('resalers*') ? 'active' : '' }}">
    <a href="{!! route('admin.resalers.index') !!}"><i class="fa fa-edit"></i><span>Resalers</span></a>
</li>

<li class="{{ Request::is('products*') ? 'active' : '' }}">
    <a href="{!! route('admin.products.index') !!}"><i class="fa fa-edit"></i><span>Products</span></a>
</li>
<?php
/* 
<li class="{{ Request::is('versions*') ? 'active' : '' }}">
    <a href="{!! route('admin.versions.index') !!}"><i class="fa fa-edit"></i><span>Versions</span></a>
</li>
 */
?>
<li class="{{ Request::is('comments*') ? 'active' : '' }}">
    <a href="{!! route('admin.comments.index') !!}"><i class="fa fa-edit"></i><span>Comments</span></a>
</li>

<li class="{{ Request::is('requirements*') ? 'active' : '' }}">
    <a href="{!! route('admin.requirements.index') !!}"><i class="fa fa-edit"></i><span>Requirements</span></a>
</li>

<li class="{{ Request::is('tags*') ? 'active' : '' }}">
    <a href="{!! route('admin.tags.index') !!}"><i class="fa fa-edit"></i><span>Tags</span></a>
</li>

<li class="{{ Request::is('categories*') ? 'active' : '' }}">
    <a href="{!! route('admin.categories.index') !!}"><i class="fa fa-edit"></i><span>Categories</span></a>
</li>
 
<li class="{{ Request::is('colors*') ? 'active' : '' }}">
    <a href="{!! route('admin.colors.index') !!}"><i class="fa fa-edit"></i><span>Colors</span></a>
</li>



<li class="{{ Request::is('productPants*') ? 'active' : '' }}">
    <a href="{!! route('admin.productPants.index') !!}"><i class="fa fa-edit"></i><span>Product Pants</span></a>
</li>

<li class="{{ Request::is('productBrands*') ? 'active' : '' }}">
    <a href="{!! route('admin.productBrands.index') !!}"><i class="fa fa-edit"></i><span>Product Brands</span></a>
</li> 
 
<li class="{{ Request::is('productImages*') ? 'active' : '' }}">
    <a href="{!! route('admin.productImages.index') !!}"><i class="fa fa-edit"></i><span>Product Images</span></a>
</li>
 