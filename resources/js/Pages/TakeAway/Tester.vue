<template>
    <nav class="w-full px-3 flex justify-between bg-sjblue">
        <img src="images/rups_trans.png" class="h-20">
        <h1>Take Aways Sint-Jansschool Leuven</h1>
        <p>test</p>
    </nav>

    <div class="grid-cols-1 md:grid-cols-2">
    </div>
</template>

<script>
import { reactive } from 'vue'
import { Inertia } from '@inertiajs/inertia'

export default {
  setup () {
    const form = reactive({
      first_name: null,
      last_name: null,
      email: null,
    })

    function submit() {
      Inertia.post('/', form)
    }

    return { form, submit }
  },
}
</script>
