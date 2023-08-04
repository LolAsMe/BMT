<template>
    <app-layout title="Karyawan">
        <template #header>
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    HITUNG NISBAH
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
                                    "Hitung Nisbah" }}</span>

                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
        </template>
        <div class="py-5">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-x-auto shadow-xl sm:rounded-lg">

                    <table class="m-5 min-w-full divide-y divide-gray-200">
                        <tr>
                            <th class="text-left">Bulan</th>
                            <th>:</th>
                            <td>{{ nisbah.bulan }}</td>
                        </tr>
                        <tr>
                            <th class="text-left">Total Nisbah</th>
                            <th>:</th>
                            <td>{{ "IDR " + nisbah.total.toString().replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g,
                                "$1\.") }}</td>
                        </tr>
                        <tr>
                            <th class="text-left">Laba</th>
                            <th>:</th>
                            <td>{{ "IDR " + nisbah.laba.toString().replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g,
                                "$1\.") }}</td>
                        </tr>
                        <tr>
                            <th class="text-left">Nisbah Rate</th>
                            <th>:</th>
                            <td> 50%</td>
                        </tr>
                    </table>
                    <div class="flex flex-row-reverse mt-4">
                        <button @click="hitung()"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            HITUNG</button>
                        <input type="date" name="tanggal" id="tanggal" v-model="tanggal" @change="changeTanggal"
                            class="mr-4">
                    </div>
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
                                    Kode
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
                                    Investasi
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
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr v-for="(detail, index) in details" :key="detail.id"
                                @dblclick="$inertia.get(route('nisbah.show', detail.nisbah_id))"
                                :class="'odd:bg-green-50 hover:cursor-pointer'">
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
                                                {{ detail.nisbah.simpanan.anggota.nama }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-0">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ detail.nisbah.kode }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-0">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ "IDR " +
                                                    detail.nisbah.awal.toString().replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g,
                                                        "$1\.") }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-0">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ "IDR " +
                                                    detail.saldo_rata_rata.toString().replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g,
                                                        "$1\.") }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-0">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ "IDR " + detail.hasil.toString().replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g,
                                                    "$1\.") }}
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
</template>

<script>
import { defineComponent } from "vue";
import VCard from "@/Components/Card.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import Welcome from "@/Jetstream/Welcome.vue";
import JetNavLink from '@/Jetstream/NavLink.vue'

export default defineComponent({
    components: {
        AppLayout,
        Welcome,
        VCard,
        JetNavLink
    },
    props: {
        nisbah: Object,
        details: Object
    },
    data() {
        return {
            tanggal: new Date().toJSON().substring(0, 10),
            bulan: String(new Date().getMonth() + 1).padStart(2, '0') + '-' + new Date().getFullYear(),
        };
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
        async hitung() {
            console.log('hitung')
            let pesan = !(this.bulan == this.nisbah.bulan) ? 'hitung nisbah?' : 'hitung nisbah bulan ini lagi?'
            if (confirm(pesan) == true) {
                console.log('hitung')
                this.$inertia.post(route("nisbah.hitung"));
            } else {
                this.$toast.success('Tidak Jadi dihitung')
            }
        }, changeTanggal() {
            console.log(this.tanggal)
            this.$inertia.get(this.route('nisbah.hitung.index'), { 'tanggal': this.tanggal })
        }
    },
    mounted() {
        let urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get('tanggal')) {
            this.tanggal = urlParams.get('tanggal')
        }
    }
});
</script>
