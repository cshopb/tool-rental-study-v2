<div class="thumbnail">
    @if (Auth::user() != null && Auth::user()->isAManager())
        <div class="row">
            <div class="col-md-6 text-left">
                <a href="{{ action('ToolsController@edit', [$tool->id]) }}" role="button"
                   class="btn btn-md btn-warning">
                    Edit
                </a>
            </div>
            <div class="col-md-6 text-right">
                {!! Form::open(['method' => 'DELETE', 'action' => ['ToolsController@destroy', $tool->id]]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-md btn-danger']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    @endif

    @if ($tool->images->isEmpty())
        <a href="{{ action('ToolsController@show', [$tool->id]) }}">
            <img src="{{ url('/img/default.jpg') }}"
                 alt="{{$tool->name}}" class="img-responsive" />
        </a>
    @else
        @include('tools/partials/_carouselSlide')
    @endif

    <div class="caption">
        <h3>
            <a href="{{ action('ToolsController@show', [$tool->id]) }}">{{ $tool->name }}</a>
        </h3>
        <p {{($show == false) ? 'class=index-view' : ''}}>
            {{ $tool->description }}
        </p>
    </div>
</div>