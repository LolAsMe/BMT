<template>
    <app-layout title="Group Detail">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Group {{ group.nama }} - {{ group.karyawan.nama }}
            </h2>
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <jet-nav-link :href="route('dashboard')" :active="route().current('dashboard')">
                            Dashboard
                        </jet-nav-link>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <jet-nav-link :href="route('group.index')" :active="route().current('group.index')">
                                Group
                            </jet-nav-link>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Group {{
                                group.nama
                            }}</span>

                        </div>
                    </li>
                </ol>
            </nav>
        </template>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex justify-end mt-4">
                <button v-show="!searchShow" @click="searchShow = true"
                    class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">Add</button>
                <button v-show="searchShow" @click="searchShow = false"
                    class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">Collapse</button>
                <button @click="$inertia.delete(route('group.destroy', group.id))" class="focus:outline-none text-white bg-red-400 hover:bg-red-500 focus:ring-4
                        focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2
                        dark:focus:ring-red-900">Delete</button>

            </div>
        </div>
        <v-card class="block mt-4">
            <add v-show="searchShow"></add>
        </v-card>

        <div class="py-5">
            <v-card>
                <h5 class="
                                                    text-2xl
                                                    font-normal
                                                    leading-normal
                                                    mt-0
                                                    p-5
                                                    mb-2
                                                    text-amber-800
                                                  ">
                    Nasabah
                </h5>

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
                                Nama / Kode Aggota
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
                                Alamat / No Telepon
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
                                No Rekening / Jumlah
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="
                                                            px-6
                                                            py-3
                                                            text-left text-xs
                                                            font-medium
                                                            text-gray-500
                                                            uppercase
                                                            tracking-wider
                                                          ">Delete</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr class="hover:bg-slate-100 cursor-pointer" v-for="(anggota, index) in group.anggota"
                            :key="anggota.id" @dblclick="$inertia.get(route('anggota.show', anggota.id))">
                            <td class="px-6 py-4 whitespace-nowrap">{{ index + 1 }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="ml-0">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ anggota.nama }}
                                        </div>
                                        <div class="text-sm text-black">
                                            {{ anggota ? anggota.kode : "-" }}
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
                                            {{ anggota.simpanan ? anggota.simpanan.kode : "-" }}
                                        </div>
                                        <div class="text-sm text-black">
                                            IDR {{
                                                anggota.simpanan.jumlah.toString().replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g,
                                                    "$1\.") }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="
                                                          px-6
                                                          py-4
                                                          whitespace-nowrap
                                                          text-center text-sm
                                                          font-medium
                                                          cursor-pointer
                                                        ">
                                <a @click="deleteAnggota(anggota)" class="text-indigo-600 hover:text-indigo-900">Delete</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </v-card>
            <!-- <anggota-detail-modal ref="detailModal"></anggota-detail-modal> -->
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
import Add from "@/Pages/BMT/Partials/GroupAnggotaAdd.vue";
import JetNavLink from '@/Jetstream/NavLink.vue'
// import EditModal from "@/Pages/BMT/Partials/GroupEditModal.vue";

export default defineComponent({
    components: {
        AppLayout,
        VModal,
        Link,
        Add,
        // EditModal,
        VInput, JetNavLink,
        VCard,
        VButton,
    },
    methods: {
        deleteAnggota(anggota) {
            this.$inertia.visit(
                route("group.anggota.remove", [this.group.id, anggota.id]),
                { method: "delete", preserveScroll: true }
            );
        },

    },
    props: {
        group: Object,
        anggotas: Object
    },
    data() {
        return {
            searchShow: false,
        };
    },
    mounted() {
        if (Object.keys(this.$inertia.page.props.parameter).length != 0) {
            this.searchShow = true
        }

    }
});
</script>
