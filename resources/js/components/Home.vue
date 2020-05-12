<template>
    <div class="flex">
        <div class="w-4/12 mr-5">
            <app-form @afterSubmit="afterSubmit()"></app-form>
        </div>
        <div class="w-8/12">
            <app-calendar :events="events"></app-calendar>
        </div>
    </div>
</template>

<script>
    import Form from './Form'
    import Calendar from './Calendar'
    
    export default {
        data(){
            return {
                events: []
            }
        },
        components: {
            appForm: Form,
            appCalendar: Calendar,
        },
        methods: {
            afterSubmit(){
                axios.get('/api/get-events').then(response => {
                    this.events = response.data;
                });
            }
        },
        created(){
            axios.get('/api/get-events').then(response => {
                this.events = response.data;
            });
        }
    }
</script>