import { Calendar } from '@fullcalendar/core'
import dayGridPlugin from '@fullcalendar/daygrid'
import timeGridPlugin from '@fullcalendar/timegrid'
import rrulePlugin from '@fullcalendar/rrule'
import interactionPlugin from '@fullcalendar/interaction'

const calendarEl = document.querySelector('.calendar-js')

const calendarOpts = {
    selectable: true,
    selectConstraint: 'schedules',
    select(selection) {
        const nameOfPatient = window.prompt('The name of the patient: ')
        calendar.addEvent({
            start: selection.start,
            end: selection.end,
            title: nameOfPatient,
        })
        calendar.unselect()
    },
    plugins: [
        interactionPlugin,
        timeGridPlugin,
        rrulePlugin,
        dayGridPlugin,
    ],
    headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'timeGridDay,timeGridWeek,dayGridMonth'
    },
    selectMirror: true,
    initialView: 'timeGridWeek',
    navLinks: true, // can click day/week names to navigate views
    dayMaxEvents: true, // allow "more" link when too many events
    weekends: false,
    eventSources: [
        {
            // Schedule
            url: 'http://my-calendar.test/api/schedules',
        },
        {
            url: '',
        }
    ]
}

const calendar = new Calendar(calendarEl, calendarOpts)

calendar.render()
