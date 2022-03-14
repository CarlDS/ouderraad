<template>
    <app-layout title="Event dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Event Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <button type="button" class="d-block btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#createEventModal">
                        Nieuw event aanmaken
                    </button>

                    <div class="d-inline-block card m-2" style="width: 18rem;" v-for="event in events" :key="event.id">
                        <img :src="'/images/'+event.image" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ event.name}}</h5>
                            <p class="card-text">{{ event.slug}}<br>{{event.type}}<br>{{event.image}}--<br>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <Link :href="route('event.show', event.id)">
                                <p class="btn btn-primary">Details</p>
                            </Link>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="createEventModal" tabindex="-1" aria-labelledby="createEventModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="createEventModalLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <Link :href="route('event.create')"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Create</button></Link>
                                    <Link :href="route('events')"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Events</button></Link>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
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
import JetButton from '@/Jetstream/Button.vue'

export default defineComponent({
    props: [
        'events'
    ],
    components: {
        AppLayout,
        CreateEventForm,
        JetButton,
        Link,
    },


})
</script>
