<div class="panel-heading">
    <h3>{{ $heading }}</h3>
</div>

@if ($users->isEmpty())
    <p class="col-md-12"> There are no {{ $heading }} registered.</p>
@else
    <table class="table table-striped">
        <thead>
        <tr>
            <th class="col-md-3 text-left">email</th>
            <th class="col-md-3 text-left">Name</th>
            <th class="col-md-3 text-left">Role</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                {!! Form::open(['method' => 'PATCH', 'action' => ['RolesController@update', $user->id]]) !!}
                    <td class="col-md-3 text-left">{!! $user->email !!}</td>
                    <td class="col-md-3 text-left">{!! $user->name !!}</td>
                    <td class="col-md-3 text-left">{!! $user->role->name !!}</td>
                    <td class="col-md-3 text-left">
                        {!! Form::submit($submitButtonText, ['class' => 'btn btn-xs '.$buttonType] ) !!}
                    </td>
                {!! Form::close() !!}
            </tr>
        @endforeach
        </tbody>
    </table>
@endif