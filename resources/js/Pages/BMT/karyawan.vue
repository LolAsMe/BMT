<template>
    <app-layout title="Karyawan">
        <template #header>
            <h2 class="font-bold border-b-2 mb-2 uppercase">{{ "KARYAWAN" }}
            </h2>
        </template>
        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex flex-row-reverse flex-nowrap">
                    <add></add>
                </div>
            </div>
            <v-card>
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="
                          px-6
                          py-3
                          text-left text-xs
                          font-medium
                          text-gray-500
                          uppercase
                          tracking-wider
                        ">
                                NO
                            </th>
                            <th scope="col" class="
                          px-6
                          py-3
                          text-left text-xs
                          font-medium
                          text-gray-500
                          uppercase
                          tracking-wider
                        ">
                                Nama
                            </th>
                            <th scope="col" class="
                          px-6
                          py-3
                          text-left text-xs
                          font-medium
                          text-gray-500
                          uppercase
                          tracking-wider
                        ">
                                Alamat
                            </th>
                            <th scope="col" class="
                          px-6
                          py-3
                           text-xs
                          font-medium
                          text-gray-500 text-center
                          uppercase
                          tracking-wider
                        ">
                                Jabatan
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr v-for="(karyawan, index) in karyawans" :key="karyawan.id" @dblclick="detail(karyawan.id)"
                            class="odd:bg-slate-50 hover:bg-blue-50 cursor-pointer">
                            <td class="text-center">{{ index + 1 }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="ml-0">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ karyawan.nama }}
                                        </div>
                                        <div class="text-sm text-black">
                                            {{ karyawan.kode }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">
                                    {{ karyawan.alamat }}
                                </div>
                                <div class="text-sm text-black">{{ karyawan.no_telepon }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-black">
                                {{ karyawan.jabatan.nama }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <edit-modal ref="editModal"></edit-modal>
            </v-card>
        </div>
    </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import VButton from "@/Components/Button.vue";
import VCard from "@/Components/Card.vue";
import VInput from "@/Components/Input.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import VModal from "@/Components/Modal.vue";
import Add from "@/Pages/BMT/Partials/KaryawanAdd.vue";
import EditModal from "@/Pages/BMT/Partials/KaryawanEditModal.vue";

export default defineComponent({
    components: {
        AppLayout,
        VModal,
        Add,
        EditModal,
        VInput,
        VCard,
        Link,
        VButton,
    },
    methods: {
        deleteKaryawan(karyawan) {
            this.$inertia.delete(route("karyawan.destroy", karyawan.id));
            console.log(this.$inertia);
        },
        detail(karyawanId) {
            console.log("ini Detail" + karyawanId)
            console.log(this.route('karyawan.index'))
            window.location.href = this.route('karyawan.show', karyawanId);
        },
    },
    props: {
        karyawans: Object,
    },
});
</script>
