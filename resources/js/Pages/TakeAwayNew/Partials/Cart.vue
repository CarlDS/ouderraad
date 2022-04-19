<template>
<div class="sticky bottom-0.5 md:sticky md:top-0.5 border-2 p-3 mt-5  md:mr-5  bg-white">
    <h2 class="">Bestelformulier <span class="text-sm">({{total}})</span></h2>
    <hr>
    <div v-if="total==0" class="font-medium text-sm text-gray-700">Er werden nog geen artikelen toegevoegd</div>
    <div v-for="article in cart" :key="article" class="my-2">
        <div v-if="article.quantity > 0" class="font-medium text-sm text-gray-700">
            <div><span v-if="article.category === 'Pizza'">Pizza </span>{{article.name}}</div>
            <div class="flex flex-row justify-between">
                <span>Aantal:  {{article.quantity}}</span>
                <span>(€{{article.quantity*article.sell_price}}) <button @click="$emit('decrease', article)"><img src="images/bin.png" class="h-6"></button></span>
            </div>
        </div>
    </div>
    <hr>
    <form @submit.prevent="order">
        <div class="w-full">
            <jet-label for="fname" value="Voornaam" />
            <jet-input id="fname" type="text" class="mt-1 block w-full" v-model="form.fname" autocomplete="name" required />
            <jet-input-error :message="form.errors.fname" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <jet-label for="lname" value="Familienaam" />
            <jet-input id="lname" type="text" class="mt-1 block w-full" v-model="form.lname" autocomplete="name" required />
            <jet-input-error :message="form.errors.lname" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <jet-label for="email" value="Email" />
            <jet-input id="email" type="text" class="mt-1 block w-full" v-model="form.email" autocomplete="email" required />
            <jet-input-error :message="form.errors.email" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <jet-label for="contact_name" value="Bestellen via leerling/medewerker" />
            <jet-input id="contact_name" type="text" class="mt-1 block w-full" v-model="form.contact_name" />
            <jet-input-error :message="form.errors.contact_name" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <jet-label for="contact_grade" value="Klas" />
            <select id="contact_grade" name="contact_grade" v-model="form.contact_grade" required>
                <option value="KK">Kikkertjes</option>
                <option value="K0K1A">Girafjes</option>
                <option value="K0K1B">Lieverheersbeestjes</option>
                <option value="K2">Rikki's</option>
                <option value="K2K3A">Bijtjes A</option>
                <option value="K2K3B">Bijtjes B</option>
                <option value="L1A">1ste leerjaar A</option>
                <option value="L1B">1ste leerjaar B</option>
                <option value="L2">2de leerjaar</option>
                <option value="L3">3de leerjaar</option>
                <option value="L4">4de leerjaar</option>
                <option value="L5">5de leerjaar</option>
                <option value="L6">6de leerjaar</option>
                <option value="MW">Medewerker</option>
            </select>
            <jet-input-error :message="form.errors.contact_grade" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <jet-label for="location" value="Ik haal mijn bestelling op in:" />
            <select id="location" name="location" v-model="form.location" required>
                <option value="" selected>-Kies een afhaalpunt-</option>
                <option value="KS">Kleuterschool, Ridderstraat 89</option>
                <option value="LS">Lagere school, Mechelsevest 2</option>
            </select>
        </div>
        <jet-button   :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
            Bestellen
        </jet-button>
    </form>
</div>
</template>
<script>
    import JetButton from '@/Jetstream/Button.vue'
    import JetInput from '@/Jetstream/Input.vue'
    import JetInputError from '@/Jetstream/InputError.vue'
    import JetLabel from '@/Jetstream/Label.vue'
    import JetActionMessage from '@/Jetstream/ActionMessage.vue'
    import JetSecondaryButton from '@/Jetstream/SecondaryButton.vue'

export default {
    setup() {

    },
    components: {
        JetButton,
        JetInput,
        JetInputError,
        JetLabel,
        JetActionMessage,
        JetSecondaryButton,
    },
    props: [
        'cart',
        'total',
    ],
    data() {
        return {
            form: this.$inertia.form({
                _method: 'POST',
                fname: '',
                lname: '',
                email: '',
                contact_name: '',
                contact_grade: '',
                location: '',
                products: this.cart,
            }),
        }
    },
    methods: {
        order() {
            this.form.post(route('ordernew'), {
                errorBag: 'order',
                preserveScroll: true,
                onSucces: () => form.reset(),
            });
        },
    }
}
</script>
