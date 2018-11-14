@extends('layouts.app')

@section('head')
    <title>Vanxa</title>
    <link href='{{ asset('css/fullcalendar.min.css') }}' rel='stylesheet' />
    <script src='{{ asset('js/moment.min.js')}}'></script>
    <script src='{{ asset('js/jquery.min.js')}}'></script>
    <script src='{{ asset('js/jquery-ui.min.js')}}'></script>
    <script src='{{ asset('js/fullcalendar.min.js')}}'></script>
@endsection


@section('content')
    <div id='calendar'></div>


    <script>
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,basicDay'
            },
            events: {
                url: '{{ route('pedidos.calendar') }}',
                type: 'GET',
                error: function() {
                    alert('there was an error while fetching events!');
                },
                cache: true,
            },
            eventDrop: function(event, delta, revertFunc) {

                $.get("/entregas/editar", { id: event.id, fechaEntrega: event.start.format() } );

            },
            themeSystem: 'bootstrap4',
            navLinks: true, // can click day/week names to navigate views
            editable: true,
            eventLimit: true, // allow "more" link when too many events

        });

    </script>
    <style>

        body {
            margin: 0;
            padding: 0;
            font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
            font-size: 14px;
        }

        #calendar {
            max-width: 900px;
            margin: 0 auto;
        }

    </style>

@endsection
