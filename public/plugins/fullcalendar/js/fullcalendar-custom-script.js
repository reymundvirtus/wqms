$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#calendar').fullCalendar({
        editable: true,
        header: {
            left: 'prev, next today',
            center: 'title',
            right: 'month, agendaWeek, agendaDay'
        },

        events: 'full-calendar',

        // events: 'full-calendar', //? this will get the data from our database from this url to the web.php
        selectable: true, //? allow to click the cell of calendar
        selectHelper: true, //? it will draw placeholder while user dragging the events
        //! navLinks: true, //? can click day/week names to navigate views

        select: function(start, end, allDay) {

            var title = prompt('Event Title:');

            if (title) {

                var start = $.fullCalendar.formatDate(start, 'Y-MM-DD HH:mm:ss')
                var end = $.fullCalendar.formatDate(end, 'Y-MM-DD HH:mm:ss')

                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: 'full-calendar/action',
                    data: {
                        title: title,
                        start: start,
                        end: end,
                        type: 'add',
                    },
                    success: function(data) {
                        calendar.fullCalendar('refetchEvents')
                        alert('success')
                            // $('#successModal').modal('show');
                    },
                    error: function(data) {
                        alert('error')
                            // $('#errorModal').modal('show');
                    }
                })
            }
        },
        editable: true, //? drag and drop
        eventResize: function(event, delta) {

            var start = $.fullCalendar.formatDate(start, 'Y-MM-DD HH:mm:ss')
            var end = $.fullCalendar.formatDate(end, 'Y-MM-DD HH:mm:ss')
            var title = event.title
            var id = event.id
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: 'full-calendar/action',
                data: {
                    title: title,
                    start: start,
                    end: end,
                    id: id,
                    type: 'update',
                },
                success: function(response) {
                    calendar.fullCalendar('refetchEvents')
                    alert('success')
                },
                error: function(response) {
                    alert('error')
                },
            })
        },

        eventDrop: function(event, delta) {
            var start = $.fullCalendar.formatDate(start, 'Y-MM-DD HH:mm:ss')
            var end = $.fullCalendar.formatDate(end, 'Y-MM-DD HH:mm:ss')
            var title = event.title
            var id = event.id
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: 'full-calendar/action',
                data: {
                    title: title,
                    start: start,
                    end: end,
                    id: id,
                    type: 'update',
                },
                success: function(response) {
                    calendar.fullCalendar('refetchEvents')
                    alert('success')
                },
                error: function(response) {
                    alert('error')
                },
            })
        },

        eventLimit: true, //? allow "more" link when too many events
    });
})