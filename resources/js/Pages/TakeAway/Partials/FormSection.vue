<template>
    <div class="mt-5">
        <form @submit.prevent="$emit('submitted')">
            <div class="p-4">
                <slot name="form"></slot>
            </div>
            <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md" v-if="hasActions">
                    <slot name="actions"></slot>
                </div>
        </form>
    </div>
</template>
<script>
    import { defineComponent } from 'vue'

    export default defineComponent({
        emits: ['submitted'],
        computed: {
            hasActions() {
                return !! this.$slots.actions
            }
        }
    })
</script>
