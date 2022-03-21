<template>
    <form-section @submitted="storeOrder">
        <template #form>
            <h1>Bestelformulier</h1>
            <div class="w-full">
                <jet-label for="fname" value="Voornaam" />
                <jet-input id="fname" type="text" class="mt-1 block w-full sm:w-1/2 md:w-1/4" v-model="form.fname" autocomplete="name" required />
                <jet-input-error :message="form.errors.fname" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="lname" value="Familienaam" />
                <jet-input id="lname" type="text" class="mt-1 block w-full sm:w-1/2 md:w-1/4" v-model="form.lname" autocomplete="name" required />
                <jet-input-error :message="form.errors.lname" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="email" value="Email" />
                <jet-input id="email" type="text" class="mt-1 block w-full sm:w-1/2 md:w-1/4" v-model="form.email" autocomplete="email" required />
                <jet-input-error :message="form.errors.email" class="mt-2" />
            </div>
             <div class="col-span-6 sm:col-span-4">
                <jet-label for="contact_name" value="Bestellen via leerling/medewerker" />

                <jet-input id="contact_name" type="text" class="mt-1 block w-full sm:w-1/2 md:w-1/4" v-model="form.contact_name" required />
                <jet-input-error :message="form.errors.contact_name" class="mt-2" />
            </div>
             <div class="col-span-6 sm:col-span-4">
                <jet-label for="contact_grade" value="Klas" />
                <select id="contact_grade" name="contact_grade" v-model="form.contact_grade">
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
            <hr>
            <table class="w-full">
            <tr v-for="product in products" :key="product">


                        <td>{{product.name}}</td>
                        <td>{{product.quant}}</td>
                        <td> x {{product.price}} € </td>
                        <td>= {{product.quant*product.price}} €</td>

            </tr>
            </table>
        </template>
         <template #actions>
            <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                Besteld.
            </jet-action-message>

            <jet-button   :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Bestel
            </jet-button>
        </template>
    </form-section>




</template>

<script>
    import { defineComponent } from 'vue'
    import JetButton from '@/Jetstream/Button.vue'
    import JetInput from '@/Jetstream/Input.vue'
    import JetInputError from '@/Jetstream/InputError.vue'
    import JetLabel from '@/Jetstream/Label.vue'
    import JetActionMessage from '@/Jetstream/ActionMessage.vue'
    import JetSecondaryButton from '@/Jetstream/SecondaryButton.vue'
    import FormSection from './FormSection.vue'

    export default defineComponent({
        components: {
            JetActionMessage,
            JetButton,
            JetInput,
            JetInputError,
            JetLabel,
            JetSecondaryButton,
            FormSection
        },

        data() {
            return {
                form: this.$inertia.form({
                    _method: 'POST',
                    fname: '',
                    lname: '',
                    email: '',
                    contact_name: '',
                    contact_grade: '',
                    products: this.products,

                }),


            }
        },
        props: ['products'],

        methods: {
            storeOrder() {
                this.form.post(route('order'), {
                    errorBag: 'storOrder',
                    preserveScroll: true,
                    onSucces: () => form.reset(),
                });
            },
        },
    })
</script>
