<template>
<sintjan-layout title="Beheer">
    <template #header>
        <h2>Beheerspagina Take Away 29 april 2022</h2>
    </template>
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8">
                <h3 class="font-bold text-3xl">Overzicht gereserveerde items</h3>
                <div class="my-4">
                    <div class="grid grid-cols-6">
                        <div></div><div class="text-sm font-bold text-center">onbetaalde reservaties</div><div class="text-sm font-bold text-center">betaalde reservaties</div><div class="text-sm font-bold text-center">totaal reservaties</div><div class="text-sm font-bold text-center">effectieve omzet</div><div class="text-sm font-bold text-center">verwachte omzet</div>
                    </div>
                    <div v-for="article in this.articles" :key="article" class="grid grid-cols-6 border-b-2 border-gray-100">
                        <div class="font-bold">{{article.name}}</div>
                        <div class="text-center">{{onbetaald[article.id]}}</div>
                        <div class="text-center">{{betaald[article.id]}}</div>
                        <div class="text-center">{{onbetaald[article.id]+betaald[article.id]}}</div>
                        <div class="text-center">€ {{betaald[article.id]*article.sell_price}}</div>
                        <div class="text-center">€ {{(onbetaald[article.id]+betaald[article.id])*article.sell_price}}</div>
                    </div>
                </div>


                <h3 class="font-bold text-3xl mt-16 ">Overzicht reservaties:</h3>
                <div class="my-4">
                    <div class="grid grid-cols-7">
                        <div class="text-sm font-bold">Besteller</div><div class="text-sm font-bold">Leerling/Medewerker</div><div class="text-sm font-bold">klas</div><div class="text-sm font-bold">bedrag</div><div class="text-sm font-bold">referentie</div><div class="text-sm font-bold text-center">betaald</div>

                    </div>
                    <div v-for="order in orders" :key="order" class="grid grid-cols-7 my-3 border-b-2 border-gray-100">
                        <div>{{order.fname}} {{order.lname}}</div>
                        <div>{{order.contact_name}}</div>
                        <div>{{order.contact_grade}}</div>
                        <div>€ {{orderTotal(order.id)}}</div>
                        <div>{{order.reference}}</div>
                        <div class="text-center"><span v-if="order.payed_at" class="text-lg font-extrabold text-green-500">V</span><span v-if="!order.payed_at" class="text-xl font-extrabold text-red-500">X</span>       </div>
                        <div>
                            <button v-if="!order.payed_at" @click="setPayed(order.id,'pay')" class="text-green-500 text-xs border-2 border-green-500 rounded-lg px-1">Betaling Registreren</button>
                            <button v-if="order.payed_at" @click="setPayed(order.id,'cancel')" class="text-red-500 text-xs border-2 border-red-500 rounded-lg px-1">Betaling Annuleren</button>
                        </div>
                        <div class="col-span-7">
                            <div v-for="orderline in orderlines" :key="orderline">
                                <div v-if="orderline.order_id == order.id" class="ml-24 border-l-2 border-gray-100 px-4">
                                    {{displayLineName(orderline.article_id)}}   x {{orderline.quantity}}
                                </div>
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

import SintjanLayout from '@/Layouts/SintjanLayout.vue'

export default({
    setup() {

    },
    components: {
        SintjanLayout,
    },
    props: [
        'orders',
        'articles',
        'orderlines',

    ],
    data() {
        return {
            onbetaald: {
                '1' : 0,
                '2' : 0,
                '3' : 0,
                '4' : 0,
                '5' : 0,
                '6' : 0,
                '7' : 0,
                '8' : 0,
                '9' : 0,
                '10' : 0,
                '11' : 0,
                '12' : 0,
                '13' : 0,
                '14' : 0,
                '15' : 0,
            },
            betaald: {
                '1' : 0,
                '2' : 0,
                '3' : 0,
                '4' : 0,
                '5' : 0,
                '6' : 0,
                '7' : 0,
                '8' : 0,
                '9' : 0,
                '10' : 0,
                '11' : 0,
                '12' : 0,
                '13' : 0,
                '14' : 0,
                '15' : 0,
            },

            totaalBestelling: null
        }
    },

    computed: {
        resItems(){
            var count = 0;
            /* this.orderlines.forEach(orderline => {
                this.orders.forEach(order => {
                    if(order.payed_at==null){
                        this.onbetaald[orderline['article_id']]++;
                    }
                    else{
                        this.betaald[orderline['article_id']]++;
                    }
                });
            }); */

            return count;
        }
    },
    methods: {
        orderTotal(orderId){
            var total = 0;
            this.articles.forEach(article => {
                this.orderlines.forEach(orderline => {
                    if(orderline.order_id == orderId && orderline.article_id == article.id){
                        total += orderline.quantity*article.sell_price;
                    }
                });
            });
            return total;
        },

        setPayed(orderId, action){
            this.$inertia.post('/payed', {'orderId':orderId, 'action':action}, {onSucces: this.refresh(), preserveScroll: true, preserveState: false});
            this.refresh()
        },
        refresh(){
            this.onbetaald['1'] = 0;
            this.onbetaald['2'] = 0;
            this.onbetaald['3'] = 0;
            this.onbetaald['4'] = 0;
            this.onbetaald['5'] = 0;
            this.onbetaald['6'] = 0;
            this.onbetaald['7'] = 0;
            this.onbetaald['8'] = 0;
            this.onbetaald['9'] = 0;
            this.onbetaald['10'] = 0;
            this.onbetaald['11'] = 0;
            this.onbetaald['12'] = 0;
            this.onbetaald['13'] = 0;
            this.onbetaald['14'] = 0;
            this.onbetaald['15'] = 0;

            this.betaald['1'] = 0;
            this.betaald['2'] = 0;
            this.betaald['3'] = 0;
            this.betaald['4'] = 0;
            this.betaald['5'] = 0;
            this.betaald['6'] = 0;
            this.betaald['7'] = 0;
            this.betaald['8'] = 0;
            this.betaald['9'] = 0;
            this.betaald['10'] = 0;
            this.betaald['11'] = 0;
            this.betaald['12'] = 0;
            this.betaald['13'] = 0;
            this.betaald['14'] = 0;
            this.betaald['15'] = 0;
            this.orders.forEach(order => {
                this.orderlines.forEach(orderline => {
                    if (order.payed_at == null && orderline.order_id == order.id){
                        this.onbetaald[orderline['article_id']]+= orderline['quantity'];
                    }
                    else if (orderline.order_id == order.id){
                        this.betaald[orderline['article_id']]++;
                    }

                });
            });
        },
        displayLineName(articleId){
            var el= '';
            this.articles.forEach(element => {
                if(element.id == articleId){
                    el = element.name
                }
            });
            return el;
        }

    },
    mounted() {
        this.onbetaald['1'] = 0;
        this.onbetaald['2'] = 0;
        this.onbetaald['3'] = 0;
        this.onbetaald['4'] = 0;
        this.onbetaald['5'] = 0;
        this.onbetaald['6'] = 0;
        this.onbetaald['7'] = 0;
        this.onbetaald['8'] = 0;
        this.onbetaald['9'] = 0;
        this.onbetaald['10'] = 0;
        this.onbetaald['11'] = 0;
        this.onbetaald['12'] = 0;
        this.onbetaald['13'] = 0;
        this.onbetaald['14'] = 0;
        this.onbetaald['15'] = 0;

        this.betaald['1'] = 0;
        this.betaald['2'] = 0;
        this.betaald['3'] = 0;
        this.betaald['4'] = 0;
        this.betaald['5'] = 0;
        this.betaald['6'] = 0;
        this.betaald['7'] = 0;
        this.betaald['8'] = 0;
        this.betaald['9'] = 0;
        this.betaald['10'] = 0;
        this.betaald['11'] = 0;
        this.betaald['12'] = 0;
        this.betaald['13'] = 0;
        this.betaald['14'] = 0;
        this.betaald['15'] = 0;
        this.orders.forEach(order => {
            this.orderlines.forEach(orderline => {
                if (order.payed_at == null && orderline.order_id == order.id){
                    this.onbetaald[orderline['article_id']]+= orderline['quantity'];
                }
                else if (orderline.order_id == order.id){
                    this.betaald[orderline['article_id']]++;
                }

            });
        });
    }
})
</script>
