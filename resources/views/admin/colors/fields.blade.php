<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Color Field -->
<div class="form-group col-sm-6">
    {!! Form::label('color', 'Color:') !!}
    <div id="cp2" class="input-group colorpicker colorpicker-component"> 

      <input name="color" type="text" value="#00AABB" class="form-control" /> 

      <span class="input-group-addon"><i></i></span> 

    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.colors.index') !!}" class="btn btn-default">Cancel</a>
</div>
