<template>
    <app-layout title="Setor">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Setor
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div>
                        Setor
                    </div>
                    <div>
                        Batch Setor
                    </div>
                    <div>
                        <form @submit.prevent="submit">
                            <v-input :name="'id'" v-model="form.id"></v-input>
                            <v-input :name="'jumlah'" v-model="form.jumlah"></v-input>
                            <button type="submit" class="
                              text-white
                              bg-blue-700
                              hover:bg-blue-800
                              focus:ring-4 focus:ring-blue-300
                              font-medium
                              rounded-lg
                              text-sm
                              w-full
                              sm:w-auto
                              px-5
                              py-2.5
                              text-center
                              dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800
                            ">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import Welcome from "@/Jetstream/Welcome.vue";
import { Link } from "@inertiajs/inertia-vue3";
import VButton from "@/Components/Button.vue";
import VInput from "@/Components/Input.vue";
import VModal from "@/Components/Modal.vue";
export default defineComponent({
    components: {
        AppLayout,
        Welcome,
        VModal,
        VInput,
        VButton,
        Link,
    },
    data() {
        return {
            form: this.$inertia.form({
                id: "",
                jumlah: "",
            }),
            anggota: null,
        };
    },
    methods: {
        submit() {
            this.form.post(route("setor.store", this.form.id), {
                preserveScroll: true,
                onSuccess: () => {
                    this.form.reset();
                },
            });
        },
    },
});
</script>
