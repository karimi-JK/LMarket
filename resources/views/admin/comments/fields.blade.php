<!-- Version Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('version_id', 'Version Id:') !!}
    {!! Form::text('version_id', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::text('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Rate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rate', 'Rate:') !!}
    {!! Form::text('rate', null, ['class' => 'form-control']) !!}
</div>

<!-- State Field -->
<div class="form-group col-sm-12">
    {!! Form::label('state', 'State:') !!}
    <label class="radio-inline">
        {!! Form::radio('state', "1", null) !!} Active
    </label>

    <label class="radio-inline">
        {!! Form::radio('state', "0", null) !!} Inactive
    </label>

</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.comments.index') !!}" class="btn btn-default">Cancel</a>
</div>
