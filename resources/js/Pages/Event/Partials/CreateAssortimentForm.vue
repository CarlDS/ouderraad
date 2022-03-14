<template>
    <jet-form-section @submitted="storeEvent">
        <template #title>
            Nieuw Assortimentsartikel
        </template>

        <template #description>
            Maak een nieuw artikel aan.
        </template>

        <template #form>
            <!-- article -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="article" value="Artikel" />
                <jet-input id="article" type="text" class="mt-1 block w-full" v-model="form.article" autocomplete="article" />
                <jet-input-error :message="form.errors.article" class="mt-2" />
            </div>

            <!-- event -->
             <div class="col-span-6 sm:col-span-4">
                <jet-label for="event" value="event" />
                <jet-input id="event" type="text" class="mt-1 block w-full" v-model="form.event" autocomplete="event" />
                <jet-input-error :message="form.errors.event" class="mt-2" />
            </div>

            <!-- buy_price -->
             <div class="col-span-6 sm:col-span-4">
                <jet-label for="buy_price" value="Aankoopprijs" />
                <jet-input id="buy_price" type="text" class="mt-1 block w-full" v-model="form.buy_price" autocomplete="buy_price" />
                <jet-input-error :message="form.errors.buy_price" class="mt-2" />
            </div>

            <!-- sell_price -->
             <div class="col-span-6 sm:col-span-4">
                <jet-label for="sell_price" value="Verkoopprijs" />
                <jet-input id="sell_price" type="text" class="mt-1 block w-full" v-model="form.sell_price" autocomplete="sell_price" />
                <jet-input-error :message="form.errors.sell_price" class="mt-2" />
            </div>




        </template>

        <template #actions>
            <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                Saved.
            </jet-action-message>
            <button type="submit" class="btn btn-primary">Save changes</button>
            <jet-button data-bs-dismiss="modal" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Save
            </jet-button>
        </template>
    </jet-form-section>
</template>

<script>
    import { defineComponent } from 'vue'
    import JetButton from '@/Jetstream/Button.vue'
    import JetFormSection from '@/Jetstream/FormSection.vue'
    import JetInput from '@/Jetstream/Input.vue'
    import JetInputError from '@/Jetstream/InputError.vue'
    import JetLabel from '@/Jetstream/Label.vue'
    import JetActionMessage from '@/Jetstream/ActionMessage.vue'
    import JetSecondaryButton from '@/Jetstream/SecondaryButton.vue'

    export default defineComponent({
        components: {
            JetActionMessage,
            JetButton,
            JetFormSection,
            JetInput,
            JetInputError,
            JetLabel,
            JetSecondaryButton,
        },

        data() {
            return {
                form: this.$inertia.form({
                    _method: 'POST',
                    event: '',
                    article: '',
                    buy_price: '',
                    sell_price: '',

                }),



            }
        },

        methods: {
            storeEvent() {
                this.form.post(route('assortiment.store'), {
                    errorBag: 'storeEvent',
                    preserveScroll: true,

                });
            },

        },
    })
</script>
