<!-- Product Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('product_name', 'Product Name:') !!}
    {!! Form::text('product_name', $productName, ['class' => 'form-control' , 'disabled' => 'true'   ]) !!}
</div>

<!-- Product Id Field -->
<div class="form-group col-sm-6 hidden">
    {!! Form::label('product_id', 'Product Name:') !!}
    {!! Form::hidden('product_id', $version->product_id, ['class' => 'form-control' ]) !!}
</div>


<!-- Version Field -->
<div class="form-group col-sm-6">
    {!! Form::label('version', 'Version:') !!}
    {!! Form::text('version', null, ['class' => 'form-control']) !!}
</div>

 

<!-- Version Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('version_price', 'Version Price:') !!}
    {!! Form::text('version_price', null, ['class' => 'form-control']) !!}
</div>

<!-- Compony Field -->
<div class="form-group col-sm-6">
    {!! Form::label('compony', 'Compony:') !!}
    {!! Form::text('compony', null, ['class' => 'form-control']) !!}
</div>

<!-- Visited Field -->
<div class="form-group col-sm-6">
    {!! Form::label('visited', 'Visited:') !!}
    {!! Form::text('visited', null, ['class' => 'form-control']) !!}
</div>

<!-- Downloaded Field -->
<div class="form-group col-sm-6">
    {!! Form::label('downloaded', 'Downloaded:') !!}
    {!! Form::text('downloaded', null, ['class' => 'form-control']) !!}
</div>

<!-- Change Field -->
<div class="form-group col-sm-6">
    {!! Form::label('change', 'Change:') !!}
    {!! Form::text('change', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Requirements Field -->
<div class="form-group col-sm-6">
    {!! Form::label('requirements', 'Requirements:') !!}
	<!--
    {!! Form::text('requirements', null, ['class' => 'form-control']) !!}
	-->
	<select name="requirements[]" class="form-control chosen-select" multiple id="product_tag_choosen">
		@foreach($requirements as $requirement)	
			 <option value="{{$requirement->id}}">{{$requirement->name}}</option>
		@endforeach   
	</select>
</div>

<!-- State Field -->
<div class="form-group col-sm-12">
    {!! Form::label('state', 'State:') !!}
    <label class="radio-inline">
        {!! Form::radio('state', "active", null) !!} Active
    </label>

    <label class="radio-inline">
        {!! Form::radio('state', "inactive", null) !!} Inactive
    </label>

</div>

<!-- Status Field -->
<div class="form-group col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    <label class="radio-inline">
        {!! Form::radio('status', "false", null) !!} False
    </label>

    <label class="radio-inline">
        {!! Form::radio('status', "true", null) !!} True
    </label>

</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.versions.index',$version->product_id) !!}" class="btn btn-default">Cancel</a>
</div>

<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}" ></script>
<script>
    CKEDITOR.replace( 'description_ck' );
</script>
