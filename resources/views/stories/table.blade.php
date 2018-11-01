<table class="table table-responsive" id="stories-table">
    <thead>
        <tr>
            <th>Name</th>
            <th> Category</th>
            <th> Photo</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($stories as $story)
        <tr>
            <td>{!! $story->name !!}</td>
            <td><img width='80px' width='80px' src= 'images/{!! $story->url !!}'> </td>

            <td>
                {!! Form::open(['route' => ['stories.destroy', $story->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('stories.show', [$story->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('stories.edit', [$story->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>