<template>
    <app-layout title="Laba">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Laba</h2>
        </template>
        <div class="py-2">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div>
                    Laba
                </div>
                <div>
                    laba
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import VButton from "@/Components/Button.vue";
import VCard from "@/Components/Card.vue";
import { Link } from "@inertiajs/inertia-vue3";
import VInput from "@/Components/Input.vue";
import VModal from "@/Components/Modal.vue";
// import Add from "@/Pages/BMT/Partials/GroupAdd.vue";
// import EditModal from "@/Pages/BMT/Partials/GroupEditModal.vue";

export default defineComponent({
    components: {
        AppLayout,
    },
    methods: {

    },
    props: {
    },
});
</script>
