<!-- Product Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('product_id', 'Product Id:') !!}
    {!! Form::text('product_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::text('price', null, ['class' => 'form-control']) !!}
</div>



<!-- Product Brands Field -->
<div class="form-group col-sm-6">
    {!! Form::label('brand_id', 'Brand:') !!}
    <!--
	{!! Form::text('product_tags', null, ['class' => 'form-control']) !!}
	-->
	<select name="brand" class="form-control chosen-select"   id="product_brand_choosen">
			 <option value="-1">Other</option>
		@foreach($brands as $brand)	
			 <option value="{{$brand->id}}">{{$brand->name}}</option>
		@endforeach   
	</select>
</div>

<!-- Brand Id Field -->
<div class="form-group col-sm-6">
    
</div>

<!-- Product Categories Field -->
<div class="form-group col-sm-6">
    
   {!! Form::label('product_categories', 'Product Categories:') !!}
    <select name="product_categories[]" class="form-control chosen-select" multiple id="product_category_choosen">
		@foreach($categories as $category)	
			 <option value="{{$category->id}}">{{$category->text}}</option>
		@endforeach   
	</select>
	 
</div>

<!-- Product Tags Field -->
<div class="form-group col-sm-6">
    {!! Form::label('product_tags', 'Product Tags:') !!}
    <!--
	{!! Form::text('product_tags', null, ['class' => 'form-control']) !!}
	-->
	<select name="product_tags[]" class="form-control chosen-select" multiple id="product_tag_choosen">
		@foreach($tags as $tag)	
			 <option value="{{$tag->id}}">{{$tag->tag_name}}</option>
		@endforeach   
	</select>
</div>


<!-- Product colors Field -->
<div class="form-group col-sm-6">
    {!! Form::label('color', 'Product Colors:') !!}
    <!--
	{!! Form::text('product_tags', null, ['class' => 'form-control']) !!}
	-->
	<select name="product_colors[]" class="form-control chosen-select" multiple id="product_color_choosen">
		@foreach($colors as $color)	
			 <option value="{{$color->id}}"  style="background-color:{{$color->color}}" > {{$color->name}}</option>
		@endforeach   
	</select>
</div>

 
<!-- Size Field -->
<div class="form-group col-sm-6">
    {!! Form::label('size', 'Size:') !!}
    <select name="product_size[]" class="form-control chosen-select" multiple id="product_size_choosen">
		 <option value="26">26</option>  
		 <option value="28">28</option>  
		 <option value="32">32</option>  
		 <option value="36">36</option>  
		 <option value="38">38</option>  
		 <option value="42">42</option>  
	</select>
</div>

<!-- Count Field -->
<div class="form-group col-sm-6">
    {!! Form::label('count', 'Count:') !!}
    {!! Form::text('count', null, ['class' => 'form-control']) !!}
</div>

<!-- Critical Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('critical_number', 'Critical Number:') !!}
    {!! Form::text('critical_number', null, ['class' => 'form-control']) !!}
</div>

 

<!-- Description Field -->
<div class="form-group col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control','id'=>'description_ck']) !!}
</div>

<!-- State Field -->
<div class="form-group col-sm-6">
    {!! Form::label('state', 'State:') !!}
    {!! Form::text('state', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::text('status', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.productPants.index') !!}" class="btn btn-default">Cancel</a>
</div>
 
 

<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}" ></script>
<script>    
	CKEDITOR.replace( 'description_ck' );	 	
</script>
 