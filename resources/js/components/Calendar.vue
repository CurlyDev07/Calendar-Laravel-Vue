<template>
    <div class="bg-white px-6 py-4 rounded-lg">
       <FullCalendar defaultView="dayGridMonth" :plugins="calendarPlugins" :events="events" />
    </div>
</template>

<script>
    import FullCalendar from '@fullcalendar/vue'
    import dayGridPlugin from '@fullcalendar/daygrid'

    export default {
        props: ['events'],
        components: {
            FullCalendar // make the <FullCalendar> tag available
        },
        data() {
            return {
                calendarPlugins: [ dayGridPlugin ],
            }
        }
    }
</script>


<style lang="stylus" scoped>

</style>