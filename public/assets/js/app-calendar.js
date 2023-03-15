$(function() {
    // array of events
    var events = [
      {
        title: 'Event 1',
        start: '2023-03-16T10:00:00',
        end: '2023-03-16T12:00:00',
        doctor_id: 1,
        client_id: 1,
        remarks: 'Lorem ipsum dolor sit amet',
      },
      {
        title: 'Event 2',
        start: '2023-03-18T14:00:00',
        end: '2023-03-18T16:00:00',
        doctor_id: 2,
        client_id: 1,
        remarks: 'Consectetur adipiscing elit',
      },
      {
        title: 'Event 3',
        start: '2023-03-20T10:00:00',
        end: '2023-03-20T12:00:00',
        doctor_id: 1,
        client_id: 2,
        remarks: 'Sed do eiusmod tempor incididunt',
      }
    ];

    // initialize FullCalendar with events source
    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listWeek'
      },
      navLinks: true,
      selectable: true,
      selectLongPressDelay: 100,
      editable: true,
      nowIndicator: true,
      defaultView: 'month',
      events: events, // add events source
      // other options...
      eventRender: function(event, element, view) {
        // modify event object to include doctor_name and client_name properties
        event.doctor_name = getDoctorName(event.doctor_id);
        event.client_name = getClientName(event.client_id);

        // display doctor_name, client_name, and remarks in the event title
        element.find('.fc-title').html(event.doctor_name + ', ' + event.client_name + ', ' + event.remarks);
      },
    });


        function getDoctorName(doctor_id) {
            return axios.get(`/doctor/${doctor_id}/name`)
              .then(response => response.data.name)
              .catch(error => console.error(error));
          }



    function getClientName(client_id) {
        return axios.get(`/client/${client_id}/name`)
        .then(response => response.data.name)
        .catch(error => console.error(error));
    }

    function filterEvents(doctor_id, client_id, remarks) {
      // filter events array based on desired criteria
      var filteredEvents = events.filter(function(event) {
        if (event.doctor_id == doctor_id && event.client_id == client_id && event.remarks == remarks) {
          return true;
        } else {
          return false;
        }
      });

      // return filtered events array
      return filteredEvents;
    }
  });
