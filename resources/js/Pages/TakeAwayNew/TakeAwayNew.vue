<template>
<sintjan-layout>
    <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Italiaanse Take Away Sint-Jansschool, 29 april 2022. Afhaalmoment tussen 15u en 18u in de Ridderstaat of Mechelsevest.
            </h2>
    </template>
    <div class="max-w-7xl mx-auto bg-white p-3">
       <div class="w-full sm:w-1/2 mx-auto">
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
    </div>
    <div class="flex flex-col md:flex-row max-w-7xl mx-auto">
        <div class="basis-full md:basis-3/4">
            <menu-take-away :products="articles" @increase="addToCart" />
        </div>
        <div class="basis-full md:basis-1/4">
            <cart :cart="cart" @decrease="decrease" :total="totalProducts"/>
        </div>
    </div>
</sintjan-layout>
</template>
<script>
import { defineComponent } from 'vue'
import SintjanLayout from '@/Layouts/SintjanLayout.vue'
import MenuTakeAway from './Partials/Menu.vue'
import Cart from './Partials/Cart.vue'

export default defineComponent({

    components: {
        SintjanLayout,
        MenuTakeAway,
        Cart,
    },

    props: [
        'articles',
    ],

    data() {
        return {
            totalProducts: 0,
            cart: {

            }
        }
    },
    methods: {

        addToCart(article){
            if (this.cart[article.id]){
                this.cart[article.id].quantity++;
                this.totalProducts++;
            }
            else{
                this.cart[article.id]= article;
                this.cart[article.id].quantity = 1;
                this.totalProducts++;
            }
        },
        decrease(article){
            if (this.cart[article.id].quantity>0) {
                this.cart[article.id].quantity--;
                this.totalProducts--;
            }
        }

    }
})
</script>
