<template>
    <div style="background-color: #e9ebee">
        <app-header/>
        <div class="container mx-auto px-4 mt-5">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
    import Header from './Header';

    export default {
        components: {
            appHeader: Header
        }
    }
</script>
