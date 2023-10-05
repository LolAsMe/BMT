<template>
    <app-layout title="Dashboard">
        <div class="py-10 ">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid grid-cols-6 gap-5" v-if="groups.length != 0">
                    <div v-for="(group, index) in groups" :key="group.id"
                        class="col-span-6 h-full bg-white rounded-3xl drop-shadow-xl p-6 overscroll-auto overflow-y-scroll ">
                        <span class="font-bold border-b-2 ">
                            {{ group.nama }}
                        </span>
                        <div v-if="group.simpanan.length != 0">
                            {{ 'Simpanan' }}

                            <table class="table-auto block sm:hidden">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="
                                            mx-auto
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
                                            Data
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="hover:bg-slate-100 cursor-pointer odd:bg-white even:bg-slate-100"
                                        v-for="(simpanan, index) in group.simpanan" :key="simpanan.id"
                                        @dblclick="detail(simpanan.id, '')">
                                        <td>
                                            <div class="mb-2 mx-auto">{{ index + 1 }}</div>
                                        </td>
                                        <td class="px-4 py-2 flex flex-col">
                                            <div class="mb-2">Nama : {{ group.anggota.find(x => x.id ===
                                                simpanan.anggota_id).nama }}</div>
                                            <div class="mb-2">Kode Anggota : {{
                                                group.anggota.find(x => x.id === simpanan.anggota_id).kode }}</div>
                                            <div class="mb-2">Alamat : {{ group.anggota.find(x => x.id ===
                                                simpanan.anggota_id).alamat }}</div>
                                            <div class="mb-2">Rekening : {{ simpanan.kode }}</div>
                                            <div>Jumlah : {{
                                                "IDR " + simpanan.jumlah.toString().replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g,
                                                    "$1\.")
                                            }}</div>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                            <table class="hidden sm:table min-w-full divide-y divide-gray-200 ">
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
                                            Simpanan
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
                                            Jumlah Simpanan
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr class="hover:bg-slate-100 cursor-pointer"
                                        v-for="(simpanan, index) in group.simpanan" :key="simpanan.id"
                                        @dblclick="detail(simpanan.id, '')">
                                        <td class="text-center">{{ index + 1 }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="ml-0">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ group.anggota.find(x => x.id === simpanan.anggota_id).nama }}
                                                        <span class="bg-green-100 rounded-full border-2 border-green-100">
                                                            {{
                                                                group.anggota.find(x => x.id === simpanan.anggota_id).kode }}
                                                        </span>
                                                    </div>
                                                    <div class="text-sm text-black">
                                                        {{ group.anggota.find(x => x.id === simpanan.anggota_id).alamat }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="ml-0">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ simpanan.kode }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right">
                                            <span class="
                                                px-2
                                                inline-flex
                                                text-xs
                                                leading-5
                                                font-semibold
                                                rounded-full
                                                bg-green-100
                                                text-green-800
                                                ">
                                                {{
                                                    "IDR " + simpanan.jumlah.toString().replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g,
                                                        "$1\.")
                                                }}
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div v-if="group.pembiayaan.length != 0">
                            {{ 'Pembiayaan' }}
                            <table class="table-auto block sm:hidden">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="
                                            mx-auto
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
                                            Data
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="hover:bg-slate-100 cursor-pointer odd:bg-white even:bg-slate-100"
                                        v-for="(pembiayaan, index) in group.pembiayaan" :key="pembiayaan.id"
                                        @dblclick="this.$inertia.get(this.route('pembiayaan.show', pembiayaan.id))">
                                        <td>
                                            <div class="mb-2 mx-auto">{{ index + 1 }}</div>
                                        </td>
                                        <td class="px-4 py-2 flex flex-col">
                                            <div class="mb-2">Nama : {{ group.anggota.find(x => x.id ===
                                                pembiayaan.anggota_id).nama }}</div>
                                            <div class="mb-2">Kode Anggota : {{ group.anggota.find(x => x.id ===
                                                pembiayaan.anggota_id).kode
                                            }}</div>
                                            <div class="mb-2">Alamat : {{ group.anggota.find(x => x.id ===
                                                pembiayaan.anggota_id).alamat }}</div>
                                            <div class="mb-2">Pembiayaan Kode : {{ pembiayaan.kode }}</div>
                                            <div>Jumlah : {{ "IDR " +
                                                pembiayaan.total_pembiayaan.toString().replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g,
                                                    "$1\.") }}</div>
                                            <div>Angsuran :{{ "IDR " +
                                                    pembiayaan.jumlah_angsuran.toString().replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g,
                                                        "$1\.") }}</div>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                            <table class="hidden sm:table min-w-full divide-y divide-gray-200">
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
                                            Anggota
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
                                            Jumlah
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
                                            Angsuran
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
                                            Keterangan
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr class="hover:bg-slate-100 cursor-pointer"
                                        v-for="(pembiayaan, index) in group.pembiayaan" :key="pembiayaan.id"
                                        @dblclick="this.$inertia.get(this.route('pembiayaan.show', pembiayaan.id))">
                                        <td class="text-center">{{ index + 1 }}</td>
                                        <td class="whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="ml-0">
                                                    <div class="text-xs font-normal text-gray-900">
                                                        {{ group.anggota.find(x => x.id === pembiayaan.anggota_id).nama }}
                                                        <span class="bg-green-100 rounded-full border-2 border-green-100">
                                                            {{ group.anggota.find(x => x.id === pembiayaan.anggota_id).kode
                                                            }} </span>
                                                    </div>
                                                    <div class="text-xs text-black">
                                                        {{ group.anggota.find(x => x.id === pembiayaan.anggota_id).alamat }}
                                                    </div>
                                                    <div class="text-sm font-normal text-gray-900">
                                                        {{ pembiayaan.kode }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="ml-0">
                                                    <div
                                                        class="text-sm font-normal text-gray-900 border-b-2 border-red-200">
                                                        Jumlah :{{ "IDR " +
                                                            pembiayaan.jumlah.toString().replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g,
                                                                "$1\.") }}
                                                    </div>
                                                    <div
                                                        class="text-sm font-normal text-gray-900 border-t-2 border-red-200">
                                                        Total :{{ "IDR " +
                                                            pembiayaan.total_pembiayaan.toString().replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g,
                                                                "$1\.") }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="ml-0">
                                                    <div
                                                        class="text-sm font-normal text-gray-900 border-b-2 border-red-200">
                                                        Frekuensi :{{ pembiayaan.frekuensi_angsuran }}
                                                    </div>
                                                    <div
                                                        class="text-sm font-normal text-gray-900 border-t-2 border-red-200">
                                                        Angsuran :{{ "IDR " +
                                                            pembiayaan.jumlah_angsuran.toString().replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g,
                                                                "$1\.") }}
                                                    </div>
                                                    <div
                                                        class="text-sm font-normal text-gray-900 border-t-2 border-red-200">
                                                        Angsuran Diterima :{{ Math.round((pembiayaan.angsuran_diterima) /
                                                            pembiayaan.jumlah_angsuran)
                                                        }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="ml-0">
                                                    <div
                                                        class="text-sm font-normal text-gray-900 border-b-2 border-red-200">
                                                        Keterangan :{{ pembiayaan.keterangan }}
                                                    </div>
                                                    <div
                                                        class="text-sm font-normal text-gray-900 border-t-2 border-red-200">
                                                        Status :<span
                                                            :class="pembiayaan.status == 'ongoing' ? 'bg-red-100  rounded-lg' : 'bg-green-100  rounded-lg'">{{
                                                                pembiayaan.status }}</span>
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
                <div v-else class="h-screen bg-white rounded-3xl drop-shadow-xl p-6 flex items-center justify-center">
                    <p class="text-4xl font-bold">
                        Welcome
                    </p>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import Welcome from "@/Jetstream/Welcome.vue";
const axios = require('axios');
import {
    Chart as ChartJS,
    Title,
    Tooltip,
    Legend,
    BarElement,
    CategoryScale,
    LinearScale
} from 'chart.js'
import { Bar } from 'vue-chartjs'
ChartJS.register(CategoryScale, LinearScale, BarElement, Title, Tooltip, Legend)


import { Link } from "@inertiajs/inertia-vue3";
export default defineComponent({
    components: {
        AppLayout,
        Welcome,
        Link,
        Bar
        // Pie
    },
    props: {
        transaksiHarian: Object

    },
    data() {
        return {
            form: this.$inertia.form(),
            // chartData: {
            //     labels: [
            //         this.attribute.sum[0].date,
            //         this.attribute.sum[1].date,
            //         this.attribute.sum[2].date,
            //         this.attribute.sum[3].date,
            //         this.attribute.sum[4].date,
            //         this.attribute.sum[5].date,
            //         this.attribute.sum[6].date,
            //     ],
            //     datasets: [
            //         {
            //             label: 'Debit',
            //             backgroundColor: '#f87979',
            //             data: [
            //                 this.attribute.sum[0].debitTotal,
            //                 this.attribute.sum[1].debitTotal,
            //                 this.attribute.sum[2].debitTotal,
            //                 this.attribute.sum[3].debitTotal,
            //                 this.attribute.sum[4].debitTotal,
            //                 this.attribute.sum[5].debitTotal,
            //                 this.attribute.sum[6].debitTotal,
            //             ]
            //         }, {
            //             label: 'Kredit',
            //             backgroundColor: '#08ccc2',
            //             data: [
            //                 this.attribute.sum[0].kreditTotal,
            //                 this.attribute.sum[1].kreditTotal,
            //                 this.attribute.sum[2].kreditTotal,
            //                 this.attribute.sum[3].kreditTotal,
            //                 this.attribute.sum[4].kreditTotal,
            //                 this.attribute.sum[5].kreditTotal,
            //                 this.attribute.sum[6].kreditTotal,
            //             ]
            //         }
            //     ]
            // },
            // options: {
            //     responsive: true,
            //     maintainAspectRatio: false
            // }
        }
    },
    methods: {
        async makeHarian() {
            console.log('test')
            await this.form.post("harian");
        },
        toRupiah(jumlah) {
            return "IDR " + jumlah.toString().replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g, "$1\.")
        },
        detail(simpananId, nama) {

            if (this.$window.searchTipe == 'nisbah-create') {
                this.$window.simpanan_id = simpananId
                this.$window.anggota_nama = nama
                this.$window.showAddModal = 1
                this.$inertia.get(this.route('nisbah.index'))
            } else {
                this.$inertia.get(this.route('simpanan.show', simpananId))
            }

        },
    },
    props: {
        groups: Object,
    },

});
</script>
