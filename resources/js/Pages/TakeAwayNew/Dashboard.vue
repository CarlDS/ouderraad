<template>
<sintjan-layout title="Beheer">
    <template #header>
        <h2>Beheerspagina Take Away 29 april 2022</h2>
    </template>
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8">
                <h3>Onbetaalde reservaties:</h3>
                <div v-for="order in orders" :key="order">
                    <div v-if="!order.payed_at" ref="{{order.id}}" class="grid grid-cols-5">
                        <button @click="function(){this.$refs[order.id].style.visibility='false'}">+</button>
                        <div>{{order.fname}} {{order.lname}}</div>
                        <div>{{order.reference}}</div>
                        <div> xxx</div>

                        <div aria-hidden="true">stuks</div>
                    </div>
                    <div :ref="order.id" >
                        <div v-for="orderline in order.orderlines" :key="orderline" class="pl-5 ml-5">
                            {{orderline.article.name}}:  {{orderline.quantity}} x {{orderline.article.sell_price}}€
                        </div>
                    </div>
                </div>
                <button @click="eventen($event)" toggle="false" >testbutton</button>
            </div>
        </div>
    </div>
</sintjan-layout>
</template>
<script>
import { defineComponent } from 'vue'
import SintjanLayout from '@/Layouts/SintjanLayout.vue'

export default defineComponent({
    setup() {

    },
    components: {
        SintjanLayout,
    },
    props: [
        'orders',

    ],
    methods: {
        eventen(eventen){
            console.log(eventen.currentTarget.getAttribute('toggle'));
            eventen.currentTarget.setAttribute('toggle', 'true');
            eventen.target.style.visibility ='hidden';
            console.log(eventen.currentTarget.getAttribute('toggle'));
            console.log(this.$refs)
        }
    },
})
</script>
