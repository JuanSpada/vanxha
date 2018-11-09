@extends('layouts.app')

@section('head')
    <title>Vanxa</title>
    <link href='{{ asset('css/fullcalendar.min.css') }}' rel='stylesheet' />
    <script src='{{ asset('js/fullcalendar.min.js') }}'></script>
@endsection


@section('content')


        <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,basicDay'
            },
            defaultDate: '2018-10-12',
            navLinks: true, // can click day/week names to navigate views
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            events: [
                {
                title: 'All Day Event',
                start: '2018-10-01'
                },
                {
                title: 'Long Event',
                start: '2018-10-07',
                end: '2018-10-10'
                },
                {
                groupId: 999,
                title: 'Repeating Event',
                start: '2018-10-09T16:00:00'
                },
                {
                groupId: 999,
                title: 'Repeating Event',
                start: '2018-10-16T16:00:00'
                },
                {
                title: 'Conference',
                start: '2018-10-11',
                end: '2018-10-13'
                },
                {
                title: 'Meeting',
                start: '2018-10-12T10:30:00',
                end: '2018-10-12T12:30:00'
                },
                {
                title: 'Lunch',
                start: '2018-10-12T12:00:00'
                },
                {
                title: 'Meeting',
                start: '2018-10-12T14:30:00'
                },
                {
                title: 'Happy Hour',
                start: '2018-10-12T17:30:00'
                },
                {
                title: 'Dinner',
                start: '2018-10-12T20:00:00'
                },
                {
                title: 'Birthday Party',
                start: '2018-10-13T07:00:00'
                },
                {
                title: 'Click for Google',
                url: 'http://google.com/',
                start: '2018-10-28'
                }
            ]
            });

            calendar.render();
        });

        </script>
        <style>

        body {
            margin: 40px 10px;
            padding: 0;
            font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
            font-size: 14px;
        }

        #calendar {
            max-width: 900px;
            margin: 0 auto;
        }

        </style>




        <div id='calendar'></div>


        

    </div>
@endsection
