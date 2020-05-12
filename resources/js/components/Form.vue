<template>
    <div class="bg-white px-6 py-4 rounded-lg">
        

        <form>
            <div class="flex flex-col mb-3">
                <label for="" class="font-medium text-sm">Event</label>
                <input type="text" class="border border-gray-300 px-3 py-2 rounded" v-model="title">
            </div>
            <div class="flex">
                <div class="w-1/2 pr-1">
                    <label for="" class="font-medium text-sm">From</label>
                    <app-datepicker v-model="from" input-class="border w-full border-gray-300 px-3 py-2 rounded"></app-datepicker>
                </div>
                <div class="w-1/2 pl-1">
                    <label for="" class="font-medium text-sm">to</label>
                    <app-datepicker v-model="to" input-class="border w-full border-gray-300 px-3 py-2 rounded"></app-datepicker>
                </div>
            </div>
            <div class="flex items-center justify-between my-4">
                <div class="leading-tight">
                    <label class="select-none container block relative cursor-pointer text-sm pl-6">Mon
                        <input class="absolute opacity-0 left-0 top-0 cursor-pointer" type="checkbox" value="Mon" v-model="days">
                        <span class="h-4 w-4 checkmark absolute top-0 left-0 bg-gray-300"></span>
                    </label>
                </div>
                <div class="leading-tight">
                    <label class="select-none container block relative cursor-pointer text-sm pl-6">Tue
                        <input class="absolute opacity-0 left-0 top-0 cursor-pointer" type="checkbox" value="Tue" v-model="days">
                        <span class="h-4 w-4 checkmark absolute top-0 left-0 bg-gray-300"></span>
                    </label>
                </div>
                <div class="leading-tight">
                    <label class="select-none container block relative cursor-pointer text-sm pl-6">Wed
                        <input class="absolute opacity-0 left-0 top-0 cursor-pointer" type="checkbox" value="Wed" v-model="days">
                        <span class="h-4 w-4 checkmark absolute top-0 left-0 bg-gray-200"></span>
                    </label>
                </div>
                <div class="leading-tight">
                    <label class="select-none container block relative cursor-pointer text-sm pl-6">Thu
                        <input class="absolute opacity-0 left-0 top-0 cursor-pointer" type="checkbox" value="Thu" v-model="days">
                        <span class="h-4 w-4 checkmark absolute top-0 left-0 bg-gray-200"></span>
                    </label>
                </div>
                <div class="leading-tight">
                    <label class="select-none container block relative cursor-pointer text-sm pl-6">Fri
                        <input class="absolute opacity-0 left-0 top-0 cursor-pointer" type="checkbox" value="Fri" v-model="days">
                        <span class="h-4 w-4 checkmark absolute top-0 left-0 bg-gray-200"></span>
                    </label>
                </div>
                <div class="leading-tight">
                    <label class="select-none container block relative cursor-pointer text-sm pl-6">Sat
                        <input class="absolute opacity-0 left-0 top-0 cursor-pointer" type="checkbox" value="Sat" v-model="days">
                        <span class="h-4 w-4 checkmark absolute top-0 left-0 bg-gray-200"></span>
                    </label>
                </div>
                <div class="leading-tight">
                    <label class="select-none container block relative cursor-pointer text-sm pl-6">Sun
                        <input class="absolute opacity-0 left-0 top-0 cursor-pointer" type="checkbox" value="Sun" v-model="days">
                        <span class="h-4 w-4 checkmark absolute top-0 left-0 bg-gray-200"></span>
                    </label>
                </div>
            </div>
            <div class="flex justify-end">
                <button @click.prevent="save" class="tracking-wider focus:outline-none text-white px-4 py-1 text-sm rounded leading-loose font-semibold">
                    Save
                </button>
            </div>
        </form>
    </div>
</template>

<script>
    import Datepicker from 'vuejs-datepicker';
    // import VueToast from 'vue-toast-notification';
    // import 'vue-toast-notification/dist/theme-default.css';

    export default {
        components: {
            AppDatepicker: Datepicker
        },
        data(){
            return {
                title: '',
                from: '',
                to: '',
                days: []
            }
        },
        methods: {
            save(){
                axios.post('/api/store-event', {
                    title: this.title,
                    from: this.from,
                    to: this.to,
                    days: this.days
                }).then(response => {
                    this.$emit('afterSubmit');
                    this.$toast.open({
                        message: 'Event successfully saved',
                        type: 'success',
                        position: 'top-right',
                        duration: 1000
                    });
                })
            }
        }
    }
</script>

<style scoped>
    .container input:checked ~ .checkmark {
        background-color: #ff7058;
    }

    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }

    .container input:checked ~ .checkmark:after {
        display: block;
    }

    .container .checkmark:after {
        left: 7px;
        top: 3px;
        width: 5px;
        height: 10px;
        border: solid white;
        border-width: 0 3px 3px 0;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
    }

    button{
        background-color:#ff7058
    }
    button:hover{
        background-color:#f5624a
    }
</style>    