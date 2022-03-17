<template>
<sintjan-layout>
    <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Italiaanse Take Away Sint-Jansschool
            </h2>
    </template>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8">
                <div class="w-50 mx-auto">
                    <img src="images/rups_trans.png" class="d-block mx-auto my-3">
                    <img src="images/italban.png" class="my-3">

                    <img src="images/italfood.png" class="d-block mx-auto mb-3">
                    <h1 class="text-center">Take Away</h1>


                    <p>Tadaaa ... op 29 april organiseren we onze eerste Italiaans getinte take away.</p>
                    <p>Knapperige pizza's, smeuïge lasagnes en handige sauzen, keuze genoeg dus! </p>
                    <p>Bestel nu via deze website, stuur hem door naar vrienden, familie en collega's.<br>
                        Met de opbrengst van deze actie sparen we verder voor een toffe boomhut in onze schooltuin.
                    </p>
                    <p> Alvast heel erg bedankt in naam van alle kinderen en leerkrachten van Sint-Jan!!</p>

                    <img src="images/italban.png" class="mb-3">
                    <div class="border-1">
                        <div class="flex">
                            <img src="images/menu3.png" class="h-52">
                            <h1 class="text-7xl mx-auto my-auto">Menu</h1>
                        </div>

                    </div>
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
