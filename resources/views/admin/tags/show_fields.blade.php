<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $tag->id !!}</p>
</div>

<!-- Tag Name Field -->
<div class="form-group">
    {!! Form::label('tag_name', 'Tag Name:') !!}
    <p>{!! $tag->tag_name !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $tag->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $tag->updated_at !!}</p>
</div>

