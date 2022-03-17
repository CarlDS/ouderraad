<template>
 <app-layout title="Event dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{event.name}} - Assortiment
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                        <img :src="'/images/'+event.image" style="max-height: 20vh; margin-left:auto; margin-right:auto">
                        <h1 class="p-4">Assortiment</h1>
                        <p>{{event.name}}</p>
                    </div>
                    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                        <h2>Assortiment</h2>
                        <ul>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
 </app-layout>
</template>
<script>
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'



export default defineComponent({
    props: [
        'event',
        'assortiment',
    ],
    components: {
        AppLayout,

    }

})
</script>
