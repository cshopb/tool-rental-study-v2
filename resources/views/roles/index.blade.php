@extends('app')

@section('table')
    <div class="container">
        <div class="panel panel-info">
            @include('roles.partials._table',['heading'          => 'Sudo users',
                                              'users'            => $sudos,
                                              'submitButtonText' => 'Remove Privileges',
                                              'buttonType'       => 'btn-danger',
                                              ])
        </div>
    </div>

    <br/>

    <div class="container">
        <div class="panel panel-default">
            @include('roles.partials._table', ['heading'    => 'Customers',
                                               'users'      => $customers,
                                               'submitButtonText' => 'Make Sudo',
                                               'buttonType'       => 'btn-info',
                                               ])
        </div>
    </div>
@endsection