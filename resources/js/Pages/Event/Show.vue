<template>
 <app-layout title="Event dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{event.name}} - Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                        <img :src="'/images/'+event.image" style="max-height: 35vh; margin-left:auto; margin-right:auto">
                        <h1 class="p-4">{{event.name}}</h1>
                        <p>{{event.slug}}</p>
                        <p>Deze actie loopt van {{event.start}} tot en met {{event.end}}</p>
                    </div>
                    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                        <h2>Assortiment</h2>
                        <assortiment :assortiment="assortiment" />
                    </div>
                </div>
            </div>
        </div>
 </app-layout>
</template>
<script>
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import Assortiment from './Partials/Assortiment.vue'


export default defineComponent({
    props: [
        'event',
        'assortiment',
    ],
    components: {
        AppLayout,
        Assortiment,
    }

})
</script>
