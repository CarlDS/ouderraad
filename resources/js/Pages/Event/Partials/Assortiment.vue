<template>
    <button type="button" class="d-block btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#createAssortimentModal">
       Assortimentslijn toevoegen
    </button>
    <ul>
        <li v-for="assortimentslijn in assortiment" :key="assortimentslijn.id">
            {{assortimentslijn.id}}
        </li>
    </ul>
    <!-- Modal -->
    <div class="modal fade" id="createAssortimentModal" tabindex="-1" aria-labelledby="createAssortimentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createAssortimentModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <create-assortiment-form />
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                        <div v-if="toggleme">
                dit is een test
            </div>
            <button @click="togglemenow">toggletest</button>
                    </div>
            </div>
        </div>
    </div>

</template>
<script>
import { defineComponent } from 'vue'
import CreateAssortimentForm from './CreateAssortimentForm.vue'

export default defineComponent({
    props: [
        'assortiment',
    ],
    components: {
        CreateAssortimentForm,
    },
    data() {
        return {
            toggleme : true,
        }
    },
    methods: {
        togglemenow() {
                if(this.toggleme){
                    this.toggleme = false;
                }
                else {
                    this.toggleme = true;
                }
            }
    }
})
</script>
