<template>
<sintjan-layout>
    <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                29 april 2022: Italiaanse Take Away Sint-Jansschool
            </h2>
    </template>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8">
                <div class="w-full sm:w-1/2 mx-auto">
                    <img src="images/rups_trans.png" class="d-block mx-auto my-3">
                    <img src="images/italban.png" class="my-3">

                    <img src="images/italfood.png" class="d-block mx-auto mb-3">
                    <h1 class="text-center">Take Away</h1>


                    <p class="text-center">De webpagina is beschikbaar vanaf maandag 21 maart.</p>

                    <img src="images/italban.png" class="mb-3">
                </div>


            </div>
        </div>
    </div>
</sintjan-layout>
</template>
<script>
import { defineComponent } from 'vue'
import SintjanLayout from '@/Layouts/SintjanLayout.vue'
export default defineComponent({
    components: {
        SintjanLayout,
    },
    props: [
        'articles',
    ],
    data() {
        return {
            form: {
                fname: null,
                lname: null,

            }
        }
    },
    methods: {
        submit() {
            this.$inertia.post('/order', this.form)
        },
    }
})
</script>
