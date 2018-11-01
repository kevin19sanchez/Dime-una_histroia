<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>


<!-- Id Category Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_category', 'Id Category:') !!}
    {!! Form::select('id_category', $categories, null, ['class' => 'form-control']) !!}
</div>



<!-- Photo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('url', 'Photo:') !!}
    {!! Form::file('url', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('stories.index') !!}" class="btn btn-default">Cancel</a>
</div>
