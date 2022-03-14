<template>
    <jet-form-section @submitted="storeEvent">
        <template #title>
            Nieuw event
        </template>

        <template #description>
            Maak een nieuw event aan.
        </template>

        <template #form>
            <!-- Name -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="name" value="Naam" />
                <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" autocomplete="name" />
                <jet-input-error :message="form.errors.name" class="mt-2" />
            </div>

            <!-- Slug -->
             <div class="col-span-6 sm:col-span-4">
                <jet-label for="image" value="image" />
                <jet-input id="image" type="text" class="mt-1 block w-full" v-model="form.image" autocomplete="image" />
                <jet-input-error :message="form.errors.image" class="mt-2" />
            </div>

            <!-- start date -->
             <div class="col-span-6 sm:col-span-4">
                <jet-label for="start" value="Startdatum" />
                <jet-input id="start" type="date" class="mt-1 block w-full" v-model="form.start" autocomplete="start" />
                <jet-input-error :message="form.errors.start" class="mt-2" />
            </div>

            <!-- end date -->
             <div class="col-span-6 sm:col-span-4">
                <jet-label for="end" value="Einddatum" />
                <jet-input id="end" type="date" class="mt-1 block w-full" v-model="form.end" autocomplete="end" />
                <jet-input-error :message="form.errors.end" class="mt-2" />
            </div>

            <!-- Email -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="type" value="Type" />
                <jet-input id="type" type="text" class="mt-1 block w-full" v-model="form.type" />
                <jet-input-error :message="form.errors.type" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                Saved.
            </jet-action-message>

            <jet-button data-bs-dismiss="modal"  :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
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
                    name: '',
                    image: '',
                    start: '',
                    end: '',
                    type: '',
                }),


            }
        },

        methods: {
            storeEvent() {
                this.form.post(route('event.store'), {
                    errorBag: 'storeEvent',
                    preserveScroll: true,
                    onSucces: () => form.reset(),
                });
            },
        },
    })
</script>
