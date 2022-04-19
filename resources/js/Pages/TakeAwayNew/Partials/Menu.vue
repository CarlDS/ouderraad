<template>
    <div class="border-2 p-3 mt-5 mx-0.5 md:mx-5 bg-white">
        <div class="flex flex-col md:flex-row mb-1">
            <img src="images/menu3.png" class="h-52 w-auto">
            <h1 class="text-7xl mx-auto my-auto font-bold">Menu</h1>
        </div>
        <hr>
        <h2 class="mt-5">Pizza <span class="text-xs">25cm</span></h2>
        <div v-for="article in products" :key="article" class="mb-4">
            <div v-if="article.category === 'Pizza'" class="mb-3">
                <div class="flex flex-col md:flex-row md:justify-between">
                    <div>{{article.name}}<img v-if="article.veggie===1" src="images/vegicon.png" alt="vegetarisch" class="inline h-10"></div>
                    <div>{{article.sell_price}} €<button type="button" @click="$emit('increase', article)" class="font-bold text-white bg-sjgreen ml-3 p-1 active:drop-shadow-2xl active:text-sjgreen">Toevoegen</button></div>
                </div>
                <div class="text-sm"> {{article.description}}</div>
            </div>
        </div>
        <h2 class="mt-5">Pastagerechten <span class="text-xs">kant en klaar</span></h2>
        <div v-for="article in products" :key="article">
            <div v-if="article.category === 'Pastagerechten'" class="mb-3">
                <div class="flex flex-col md:flex-row md:justify-between">
                    <div>{{article.name}}<img v-if="article.veggie===1" src="images/vegicon.png" alt="vegetarisch" class="inline h-10"></div>
                    <div>{{article.sell_price}} €<button type="button" @click="$emit('increase', article)" class="font-bold text-white bg-sjgreen ml-3 p-1 active:drop-shadow-2xl">Toevoegen</button></div>
                </div>
                <div class="text-sm"> {{article.description}}</div>
            </div>
        </div>
        <h2 class="mt-5">Sauzen <span class="text-xs">tip: om zelf pasta bij te koken of om in te vriezen voor later</span></h2>
        <div v-for="article in products" :key="article">
            <div v-if="article.category === 'Sauzen'" class="mb-3">
                <div class="flex flex-col md:flex-row md:justify-between">
                    <div>{{article.name}}<img v-if="article.veggie===1" src="images/vegicon.png" alt="vegetarisch" class="inline h-10"></div>
                    <div>{{article.sell_price}} €<button type="button"  @click="$emit('increase', article)" class="font-bold text-white bg-sjgreen ml-3 p-1 active:drop-shadow-2xl">Toevoegen</button></div>
                </div>
                <div class="text-sm"> {{article.description}}</div>
            </div>
        </div>
        <h2 class="mt-5">Desserts <span class="text-xs">i.s.m. De Werf</span></h2>
        <div v-for="article in products" :key="article">
            <div v-if="article.category === 'Desserts'" class="mb-3">
                <div class="flex flex-col md:flex-row md:justify-between"><div>{{article.name}}<img v-if="article.veggie===1" src="images/vegicon.png" alt="vegetarisch" class="inline h-10"></div> <div>{{article.sell_price}} €<button type="button" @click="$emit('increase', article)" class="font-bold text-white bg-sjgreen ml-3 p-1 active:drop-shadow-2xl">Toevoegen</button></div></div>
                <div class="text-sm"> {{article.description}}</div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    setup() {

    },
    props: [
        'products',
    ],
    methods: {
        add(article){

        }
    }
}
</script>
