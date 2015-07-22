@extends('app')

@section('content')
    <div class="row">
        <h1 class="col-md-2">Tools</h1>
        @if (Auth::user() != null && Auth::user()->isAManager())
           <h1 class="col-md-2">
               <a href="{{ action('ToolsController@create')}} " role="button" class="btn btn-info">New Tool</a>
           </h1>
        @endif
    </div>

    <hr/>

    <?php $pass = 1; ?>
    @foreach($tools as $tool)
        @if ($pass == 4)
            <?php
                $pass   = 1;
                $row    = "row";
            ?>
        @else
            <?php
                $pass++;
                $row    = "";
            ?>
        @endif

        <div class="{{ $row }}">
            <div class="col-md-3">
                @include('tools.partials._tool')
            </div>
        </div>
    @endforeach
@endsection