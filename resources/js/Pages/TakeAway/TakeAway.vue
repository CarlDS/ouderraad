<template>
<sintjan-layout>
    <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Italiaanse Take Away Sint-Jansschool Italiaanse Take Away Sint-Jansschool
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
                </div>
                <div class="w-full sm:w-3/4  mx-auto">
                    <div class="border-2 p-3 mt-5">
                        <div class="flex mb-1">
                            <img src="images/menu3.png" class="h-52">
                            <h1 class="text-7xl mx-auto my-auto font-bold">Menu</h1>
                        </div>
                        <h2 class="mt-5">Pizza <span class="text-xs">25cm</span></h2>
                         <div v-for="article in $page.props.articles" :key="article" class="mb-4">
                             <div v-if="article.category === 'Pizza'" class="mb-3">
                                <span class="flex justify-between"><span>{{article.name}}</span> <span>{{article.sell_price}} €<button type="button" class="font-bold text-white bg-sjgreen ml-3 p-1">Toevoegen</button></span></span>
                                <span class="text-sm"> {{article.description}}</span>
                             </div>
                        </div>
                        <h2 class="mt-5">Pastagerechten <span class="text-xs">kant en klaar</span></h2>
                         <div v-for="article in $page.props.articles" :key="article">
                             <div v-if="article.category === 'Pastagerechten'" class="mb-3">
                                <span class="flex justify-between"><span>{{article.name}}</span> <span>{{article.sell_price}} €<button type="button" class="font-bold text-white bg-sjgreen ml-3 p-1">Toevoegen</button></span></span>
                                <span class="text-sm"> {{article.description}}</span>
                             </div>
                        </div>
                         <h2 class="mt-5">Sauzen <span class="text-xs">tip: om zelf pasta bij te koken of om in te vriezen voor later</span></h2>
                         <div v-for="article in $page.props.articles" :key="article">
                             <div v-if="article.category === 'Sauzen'" class="mb-3">
                                <span class="flex justify-between"><span>{{article.name}}</span> <span>{{article.sell_price}} €<button type="button" class="font-bold text-white bg-sjgreen ml-3 p-1">Toevoegen</button></span></span>
                                <span class="text-sm"> {{article.description}}</span>
                             </div>
                        </div>
                        <h2 class="mt-5">Desserts <span class="text-xs">i.s.m. De Werf</span></h2>
                        <div v-for="article in $page.props.articles" :key="article">
                            <div v-if="article.category === 'Desserts'" class="mb-3">
                                <span class="flex justify-between"><span>{{article.name}}</span> <span>{{article.sell_price}} €<button type="button" class="font-bold text-white bg-sjgreen ml-3 p-1">Toevoegen</button></span></span>
                                <span class="text-sm"> {{article.description}}</span>
                             </div>
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
