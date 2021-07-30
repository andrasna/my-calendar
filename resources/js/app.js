import { Calendar } from '@fullcalendar/core'
import dayGridPlugin from '@fullcalendar/daygrid'
import timeGridPlugin from '@fullcalendar/timegrid'
import rrulePlugin from '@fullcalendar/rrule'
import interactionPlugin from '@fullcalendar/interaction'
import { fetcher } from './utils'

const calendarSchedulAPI = 'http://my-calendar.test/api/schedules'
const calendarAppointmentsAPI = 'http://my-calendar.test/api/appointments'

const calendarEl = document.querySelector('.calendar-js')

const calendarOpts = {
    selectable: true,
    selectConstraint: 'schedules',
    select(selection) {
        const nameOfPatient = window.prompt('The name of the patient: ')

        if (nameOfPatient === null) {
            /**
             * Unselect and return.
             *
             * The user has canceled.
             */
            calendar.unselect()
            return
        }

        if (nameOfPatient === '') {
            /**
             * Unselect and return.
             *
             * However, realistically, this should be handled differently than cancelation.
             * As an example, ask the user about the empty imput.
             */
            calendar.unselect()
            return
        }

        const dataToBeSaved = {
            title: nameOfPatient,
            start: selection.start,
            end: selection.end,
        }

        const requestOpts = {
            url: calendarAppointmentsAPI,
            method: 'POST',
            body: dataToBeSaved,
        }

        const askIfDateCanBeSaved = fetcher(requestOpts)

        askIfDateCanBeSaved.then(response => {
            if (response.isDateSaved) {
                calendar.addEvent(dataToBeSaved)
                calendar.unselect()
            } else {
                alert('Something went wrong, we could not save this date.')
                calendar.unselect()
                return
            }
        })
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
            url: calendarSchedulAPI,
        },
        {
            // url: calendarAppointmentsAPI,
        }
    ]
}

const calendar = new Calendar(calendarEl, calendarOpts)

calendar.render()
