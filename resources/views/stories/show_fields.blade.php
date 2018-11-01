<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $story->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $story->name !!}</p>
</div>

<!-- Id Category Field -->
<div class="form-group">
    {!! Form::label('Category', 'Category:') !!}
    <p>{!! $story->category->name !!}</p>
</div>
<!-- Url Field -->
<div class="form-group">
    {!! Form::label('Photo', 'Photo:') !!}
    <br>
    <img width='150px' width='150px' src= 'images/{!! $story->url !!}'>
</div>


<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $story->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $story->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $story->deleted_at !!}</p>
</div>

