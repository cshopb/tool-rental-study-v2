@extends('app')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-offset-2 col-sm-8">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4 class="panel-title">@yield('title')</h4>
                    </div>
                    <div class="panel-body">
                        @yield('body')
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection