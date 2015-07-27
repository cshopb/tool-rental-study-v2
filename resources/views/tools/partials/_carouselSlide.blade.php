<div id="carousel{{$tool->id}}" class="carousel slide" data-ride="carousel">
    @if($show == true)
        <!-- indicators -->
        <ol class="carousel-indicators">
            <?php $i = 0; ?>
            @foreach($tool->images as $image)
                <li data-target="carousel{{$tool->id}}" data-slide-to="{{$i}}" {{($i == 0) ? 'class=active' : ''}}></li>
                <?php $i++; ?>
            @endforeach
        </ol>
    @endif

    <!-- wrapper for slides -->
    <div class="carousel-inner">
        <?php $i = 0; ?>
        @foreach($tool->images as $image)
            <div class="{{($i == 0) ? 'item active' : 'item'}}">
                <a href="{{ action('ToolsController@show', [$tool->id]) }}">
                    <img src="{{ action('ToolsController@showImage', $image->id) }}"
                         alt="{{$tool->id}}" class="img-responsive {{($show == false) ? 'index-view' : 'show-view'}}"/>
                </a>
            </div>
            <?php $i++; ?>
        @endforeach
    </div>

    @if($show == true)
    <!-- Controls -->
        <a class="left carousel-control" href="#carousel{{$tool->id}}" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel{{$tool->id}}" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    @endif
</div>