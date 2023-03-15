
$(document).ready(function() {
    // Retrieve the events data from the server using AJAX
    $.ajax({
        url: '/events',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            // Initialize the FullCalendar instance
            $('#calendar').fullCalendar({
                defaultView: 'month',
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                events: response.events.map(event => ({
                    title: ` ${event.client.client_name}`,
                    start: event.start_datetime,

                }))

            });
        },
        error: function() {
            alert('Error retrieving events.');
        }
    });
});
