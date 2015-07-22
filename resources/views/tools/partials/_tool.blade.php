<div class="thumbnail">

    @if ($tool->images->isEmpty())
        <a href="{{ action('ToolsController@show', [$tool->id]) }}">
            <img src="{{ url('/img/default.jpg') }}"
                 alt="{{$tool->name}}" class="img-responsive" />
        </a>
    @else
        @foreach($tool->images as $image)
            <a href="{{ action('ToolsController@show', [$tool->id]) }}">
                <img src="{{ action('ToolsController@showImage', $image->id) }}"
                     alt="{{$tool->name}}" class="img-responsive" />
            </a>
        @endforeach
    @endif

    <div class="caption">
        <h3>
            <a href="{{ action('ToolsController@show', [$tool->id]) }}">{{ $tool->name }}</a>
        </h3>
        <p>{{ $tool->description }}<p>
            @if (Auth::user() != null && Auth::user()->isAManager())
        <p><a href="{{ action('ToolsController@edit', [$tool->id]) }}" role="button"
              class="btn btn-md btn-warning">
                Edit
            </a></p>
        @endif
    </div>
</div>