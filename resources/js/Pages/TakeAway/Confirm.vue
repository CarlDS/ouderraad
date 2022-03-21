<template>
    <sintjan-layout title="Bevestiging bestelling">
         <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
               {{order.fname}}, dankjewel voor jouw bestelling.
            </h2>
         </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8">
                    <div class="w-full sm:w-1/2 mx-auto">
                        <img src="images/rups_trans.png" class="d-block mx-auto my-3">
                        <img src="images/italban.png" class="my-3">

                        <img src="images/takeaway.jpeg" class="d-block mx-auto mb-3">
                        <h1 class="text-center">Bevestiging van je bestelling</h1>
                        <p>Beste {{order.fname}},</p>
                        <p> Wij danken je van harte voor jouw bestelling. Deze bevestiging werd ook verstuurd naar {{order.email}}. Kijk zeker je spam-folder na wanneer je de mail niet onmiddelijk terugvindt. </p>
                        <p>Om je reservatie definitief te bevestigen vragen we om een bedrag van <strong> {{amount}} € </strong> over te schrijven op rekening van de school <strong>BE26 7343 5616 6629</strong>. Als mededeling geef je <strong>{{reference}}</strong>. Zo kunnen wij jouw bestelling vlot verwerken.</p>
                        <p>Je bestelling kan je ophalen op 29 april, tussen 15u en 18u in de lagere school, Mechelsevest 2.<br>
                        Denk eraan om op de dag van afhaling koeltassen mee te brengen!</p>
                        <p>Hieronder vind je jouw bestelling nogmaals opgelijst: </p>
                        <table class="w-full">
                            <tr v-for="product in order.products" :key="product">
                                <td>{{product.name}}</td>
                                <td>x {{product.quant}}</td>
                                <td>{{product.price}} €</td>
                                <td>= {{product.quant*product.price}} €</td>
                            </tr>
                        </table>
                        <img src="images/italban.png" class="my-3">
                    </div>
                </div>
            </div>
        </div>
    </sintjan-layout>
</template>
<script>
import SintjanLayout from '@/Layouts/SintjanLayout.vue'
export default {
    components: {
        SintjanLayout,
    },
    props: ['order', 'amount', 'reference'],

}
</script>
