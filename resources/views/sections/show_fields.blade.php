<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $section->id !!}</p>
</div>

<!-- Id Story Field -->
<div class="form-group">
    {!! Form::label('Story', 'Story') !!}
    <p>{!! $section->story->name !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $section->name !!}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{!! $section->description !!}</p>
</div>

<!-- Url Field -->
<div class="form-group">
    {!! Form::label('Photo', 'Photo:') !!}
    <br>
    <img width='150px' width='150px' src='images/{!! $section->url !!}'>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $section->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $section->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $section->deleted_at !!}</p>
</div>

