<template>
    <app-layout title="Anggota">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Anggota</h2>
        </template>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-row-reverse flex-nowrap">
                <add></add>
            </div>
        </div>

        <div class="py-2">
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
                                No
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
                                  text-left text-xs
                                  font-medium
                                  text-gray-500
                                  uppercase
                                  tracking-wider
                                ">
                                TTL
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

                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr class='hover:bg-slate-100 cursor-pointer' v-for="(anggota,
                            index) in anggotas.data" :key="anggota.id" @dblclick="detail(anggota.id)">
                            <td class="text-center">{{ index + 1 }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="ml-0">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ anggota.nama }} / <span
                                                class="bg-green-100 rounded-full border-2 border-green-100"> {{
                                                    anggota.kode }} </span>
                                        </div>
                                        <div class="text-sm text-black">
                                            No KTP : {{ anggota.no_ktp }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="ml-0">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ anggota.alamat }}
                                        </div>
                                        <div class="text-sm text-black">
                                            {{ anggota.telepon }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="ml-0">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ anggota.tempat_lahir }}
                                        </div>
                                        <div class="text-sm text-black">
                                            {{ anggota.tanggal_lahir }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="ml-0">
                                        <div class="text-sm font-medium text-gray-900">
                                            Nama Ibu Kandung : {{ anggota.nama_ibu_kandung }}
                                        </div>
                                        <div class="text-sm text-black">
                                            Masuk :{{ anggota.tanggal_masuk.substring(0, 10) }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
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
import VModal from "@/Components/Modal.vue";
import Add from "@/Pages/BMT/Partials/AnggotaAdd.vue";
import EditModal from "@/Pages/BMT/Partials/AnggotaEditModal.vue";
import DetailModal from "@/Pages/BMT/Partials/AnggotaDetailModal.vue";

export default defineComponent({
    components: {
        AppLayout,
        VModal,
        Add,
        EditModal,
        DetailModal,
        VInput,
        VCard,
        VButton,
    },
    methods: {
        deleteAnggota(anggota) {
            this.$inertia.delete(route("anggota.destroy", anggota.id));
        },
        detail(anggotaId) {
            console.log("ini Detail" + anggotaId)
            console.log(this.route('anggota.index'))
            window.location.href = this.route('anggota.show', anggotaId);
        }
    },
    props: {
        anggotas: Object,
    },
});
</script>
