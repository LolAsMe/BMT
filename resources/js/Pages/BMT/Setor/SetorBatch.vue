<template>
    <app-layout title="Setor Batch">
        {{ groups }}
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Setor Batch
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div>
                        Setor Batch
                    </div>
                    <div>
                        pilih grup
                        <select @change="loadNewGroup" v-model="form.id" name="group" id="form.id">
                            <option v-for="group in groups" :key="group.id" :value="group.id">{{ group.nama }}</option>
                        </select>
                        {{ selectedGroup }}
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import { defineComponent } from "vue";
const axios = require('axios');
import AppLayout from "@/Layouts/AppLayout.vue";
import Welcome from "@/Jetstream/Welcome.vue";
import { Link } from "@inertiajs/inertia-vue3";
export default defineComponent({
    components: {
        AppLayout,
        Welcome,
        Link,
    },
    methods: {
        async loadNewGroup() {
            const res = await axios.get("/group/takeOne/" + this.form.id);
            this.selectedGroup = res.data
            // await this.form.get(route("group.takeOne", this.form.id), {
            //     preserveScroll: true,
            //     onSuccess: (res) => {
            //         console.log(res)
            //     },
            // })
        },
    },
    data() {
        return {
            form: this.$inertia.form({
                id: "1",
            }),
            selectedGroup: null,
        }
    },

    props: {
        groups: Object,
    },
    mounted() {
        this.loadNewGroup()
    }



});
</script>
