<template>
    <div class="container">
        <img src="artiel.jpg" alt="artikel">
        <p class="title"></p>
        <p class="omschrijving"></p>
        <p class="prijs"></p>
    </div>
</template>
<script>
import { defineComponent } from 'vue'

export default defineComponent({
    setup() {

    },
    props: {
            artikel: Object,
    },


})
</script>
