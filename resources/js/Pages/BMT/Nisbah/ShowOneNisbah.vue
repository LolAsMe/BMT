<template>
    <app-layout title="Karyawan">
        <template #header>
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    NISBAH {{ nisbah.nama }} / {{ nisbah.simpanan.anggota.nama }} / {{ nisbah.kode }}
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
                                <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <jet-nav-link :href="route('nisbah.index')" :active="route().current('nisbah.index')">
                                    Nisbah
                                </jet-nav-link>
                            </div>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">{{
                                    nisbah.kode }}</span>

                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
        </template>
        <div class="py-5">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <!-- <div class="flex flex-row-reverse mt-4">
                        <button v-if="nisbah.deleted_at == null" @click="deleteKaryawan"
                            class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                            DEACTIVE</button>
                        <button v-else @click="activeKaryawan"
                            class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                            ACTIVE</button>
                        <button @click="$refs.editModal.show(nisbah)"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            EDIT</button>
                    </div> -->
                    <table class="m-5 min-w-full divide-y divide-gray-200">
                        <tr>
                            <th class="text-left">ID</th>
                            <th>:</th>
                            <td>{{ nisbah.id }}</td>
                        </tr>
                        <tr>
                            <th class="text-left">Kode</th>
                            <th>:</th>
                            <td>{{ nisbah.kode }}</td>
                        </tr>
                        <tr>
                            <th class="text-left">Rekening</th>
                            <th>:</th>
                            <td>{{ nisbah.simpanan.kode }}</td>
                        </tr>
                        <tr>
                            <th class="text-left">Nama</th>
                            <th>:</th>
                            <td>{{ nisbah.simpanan.anggota.nama }}</td>
                        </tr>
                        <tr>
                            <th class="text-left">Tanggal Awal</th>
                            <th>:</th>
                            <td>{{ nisbah.tanggal_awal.substring(0, 10) }}</td>
                        </tr>
                        <tr>
                            <th class="text-left">Tanggal Selesai</th>
                            <th>:</th>
                            <td>{{ nisbah.tanggal_selesai.substring(0, 10) }}</td>
                        </tr>
                        <tr>
                            <th class="text-left">Investasi</th>
                            <th>:</th>
                            <td>{{ "IDR " + nisbah.awal.toString().replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g, "$1\.")
                            }}</td>
                        </tr>
                        <tr>
                            <th class="text-left">Hasil</th>
                            <th>:</th>
                            <td>{{ "IDR " + nisbah.jumlah.toString().replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g, "$1\.")
                            }}</td>
                        </tr>
                        <tr>
                            <th class="text-left">Status</th>
                            <th>:</th>
                            <td v-show="nisbah.status=='ongoing'" class="text-sm font-medium bg-yellow-100 rounded-full border-2 border-yellow-1000">Ongoing</td>
                            <td v-show="nisbah.status=='selesai'" class="text-sm font-medium bg-green-100 rounded-full border-2 border-green-1000">Selesai</td>
                        </tr>
                    </table>
                    <table class="min-w-full divide-y divide-gray-200 mt-5">
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
                                    Pengendapan
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
                                    Bulan
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
                                    Saldo Rata Rata/Hari
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
                                    Hasil
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
                                    Status
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr v-for="(detail, index) in nisbah.detail" :key="detail.id"
                                :class="index % 2 == 0 ? 'bg-white' : 'bg-gray-50'">
                                <td class="text-center">{{ index + 1 }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-0">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ detail.pengendapan }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-0">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ detail.bulan }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-0">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ "IDR " + detail.saldo_rata_rata.toString().replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g,
                                                        "$1\.") }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-0">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ "IDR " +detail.hasil.toString().replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g,
                                                        "$1\.") }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-0">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ detail.status }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </app-layout>
    <edit-modal ref="editModal"></edit-modal>
</template>

<script>
import { defineComponent } from "vue";
import VCard from "@/Components/Card.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import Welcome from "@/Jetstream/Welcome.vue";
import JetNavLink from '@/Jetstream/NavLink.vue'
import EditModal from "@/Pages/BMT/Partials/KaryawanEditModal.vue";
import AnggotaDetailModal from "@/Pages/BMT/Partials/AnggotaDetailModal.vue";

export default defineComponent({
    components: {
        AppLayout,
        Welcome,
        VCard, EditModal,
        AnggotaDetailModal, JetNavLink
    },
    props: {
        nisbah: Object,
    },
    methods: {
        deleteKaryawan() {
            console.log('test')
            this.$inertia.delete(
                route("nisbah.destroy", this.nisbah.id)
            );
        },
        activeKaryawan() {
            console.log('test')
            this.$inertia.post(
                route("nisbah.active", this.nisbah.id)
            );
        },
    }
});
</script>
