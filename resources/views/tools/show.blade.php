@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- SHOW variable adds controls for carousel if true -->
            @include('tools.partials._tool', ['show' => true])
        </div>
    </div>
@endsection