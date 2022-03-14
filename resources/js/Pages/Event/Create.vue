<template>
    <app-layout title="Event dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Event Aanmaken
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <create-event-form />
                </div>
            </div>
        </div>
    </app-layout>
</template>
<script>
import { defineComponent } from 'vue'
import {Link} from '@inertiajs/inertia-vue3'
import AppLayout from '@/Layouts/AppLayout.vue'
import CreateEventForm from './Partials/CreateEventForm.vue'


export default defineComponent({
    props: [
        'events'
    ],
    components: {
        AppLayout,
        CreateEventForm,
        Link,
    },


})
</script>
