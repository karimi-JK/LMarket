<!-- Publisher Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('publisher_id', 'Publisher Id:') !!}
	<!--
    {!! Form::text('publisher_id', null, ['class' => 'form-control']) !!}
	-->
	<select name="publisher_id" class="form-control">
		<option value="">Select Resaler...</option>
		@foreach($resaler as $resaler_list)	
			 <option value="{{$resaler_list->id}}">{{$resaler_list->name}}</option>
		@endforeach   
	</select>
</div>

<!-- Product Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('product_name', 'Product Name:') !!}
    {!! Form::text('product_name', null, ['class' => 'form-control']) !!}
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


<!-- Categories Field -->
<div class="form-group col-sm-6">
    {!! Form::label('categories', 'Categories:') !!}
    <!--
    {!! Form::text('categories', null, ['class' => 'form-control']) !!}
	-->	
	<select name="categories[]"  class="form-control chosen-select" multiple id="product_categories_choosen">
		@foreach($categories as $category)	
			 <option value="{{$category->id}}">{{$category->name}}</option>
		@endforeach   
	</select>
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

<!-- Product Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('product_price', 'Product Price:') !!}
    {!! Form::text('product_price', null, ['class' => 'form-control']) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-6">
	<!--
    {!! Form::label('image', 'Image:') !!}
    {!! Form::text('image', null, ['class' => 'form-control']) !!}
	-->	
 
		{!! Form::label('Change Image') !!}
		{!! Form::file('image', null , ['class' => 'form-control']) !!}	
 
</div>



<!-- Description Field -->
<div class="form-group col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control','id'=>'description_ck']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.products.index') !!}" class="btn btn-default">Cancel</a>
</div>
 
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}" ></script>
<script>
    CKEDITOR.replace( 'description_ck' );
</script>
