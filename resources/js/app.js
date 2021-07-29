import { Calendar } from '@fullcalendar/core'
import dayGridPlugin from '@fullcalendar/daygrid'
import timeGridPlugin from '@fullcalendar/timegrid'

const calendarEl = document.querySelector('.calendar-js')

const calendar = new Calendar(calendarEl, {
    plugins: [
        dayGridPlugin,
        timeGridPlugin,
    ],
    headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'timeGridDay,timeGridWeek,dayGridMonth'
    },
    weekends: false,
    eventColor: 'rgba(44, 62, 80, .65)',
    initialView: 'timeGridWeek',
    navLinks: true, // can click day/week names to navigate views
    editable: true,
    dayMaxEvents: true, // allow "more" link when too many events
    events: 'http://my-calendar.test/api/schedules',
})

calendar.render()
