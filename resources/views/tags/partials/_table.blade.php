<div class="panel-heading">
    <h3>Tags</h3>
</div>

@if ($tags->isEmpty())
    <p class="col-md-12"> There are no tags registered.</p>
@else
    <table class="table table-striped">
        <thead>
        <tr>
            <th class="col-md-3 text-left">Name</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tags as $tag)
            <tr>
                <td class="col-md-9 text-left">{!! $tag->name !!}</td>
                {!! Form::open(['method' => 'PATCH', 'action' => ['TagsController@update', $tag->id]]) !!}
                <td class="col-md-2 text-right">
                    {!! Form::submit('Edit', ['class' => 'btn btn-xs btn-warning']) !!}
                </td>
                {!! Form::close() !!}
                {!! Form::open(['method' => 'DELETE', 'action' => ['TagsController@destroy', $tag->id]]) !!}
                <td class="col-md-1 text-left">
                    {!! Form::submit
                        ('Delete', ['class' => 'btn btn-xs btn-danger'])
                    !!}
                </td>
                {!! Form::close() !!}
            </tr>
        @endforeach
        </tbody>
    </table>
@endif