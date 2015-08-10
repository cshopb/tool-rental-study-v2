<script>
    $(function () {
        $("#time-range").slider({
            range: true,
            min: 540, // 9:00h * 60min
            max: 1020, // 17:00h * 60min
            values: [600, 660], // start values 10:00 - 11:00h
            step: 30,
            animate: 'slow',
            slide: function (event, ui) {
                $("#time").val(printTime(ui.values[0]) + '-' + printTime(ui.values[1]));

                $('#hiddenTime').val(ui.values[0] + '-' + ui.values[1]);
            }
        });
        $("#time").val(printTime($("#time-range").slider("values", 0)) +
        '-' + printTime($("#time-range").slider("values", 1)));

        $('#hiddenTime').val($("#time-range").slider("values", 0) +
        '-' + $("#time-range").slider("values", 1));
    }); // function for slider

    function printTime(value) {
        var min = value % 60;
        var hour = (value - min) / 60;

        if (min == 0) {
            min = '00'
        }

        if (hour < 10) {
            hour = '0' + hour;
        }

        return hour + ':' + min;
    } // function that takes the value and converts it to readable time formatted for 24h
</script>

{!! Form::open(['action' => ['RentingController@store', $tool->id]]) !!}
    <div class="row">
        <div class="col-md-offset-1 col-md-4">
            {!! Form::hidden('hiddenTime', null, ['id' => 'hiddenTime', 'class' => 'form-control']) !!}
            {!! Form::label('time-slider', 'Time: ') !!}
            {!! Form::text('time-slider', null, ['id' => 'time', 'style' => 'border: 0', 'disabled' => 'disabled']) !!}
        </div>
    </div>

    <div class="row">
        <div class="col-md-offset-1 col-md-10">
            <div id="time-range"></div>
        </div>
        <br/>

        <div class="col-md-offset-4 col-md-4">
            {!! Form::submit('Rent', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
{!! Form::close() !!}