<template>
    <app-layout title="Karyawan">
        <template #header>
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Kas
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
                                    Kas
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
                                    kas.nama }}</span>

                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
        </template>
        <div class="py-5">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                    <table class="m-5 min-w-full divide-y divide-gray-200">
                        <tr>
                            <th class="text-left">ID</th>
                            <th>:</th>
                            <td>{{ kas.id }}</td>
                        </tr>
                        <tr>
                            <th class="text-left">Kode</th>
                            <th>:</th>
                            <td>{{ kas.kode }}</td>
                        </tr>
                        <tr>
                            <th class="text-left">Nama</th>
                            <th>:</th>
                            <td>{{ kas.nama }}</td>
                        </tr>
                        <tr>
                            <th class="text-left">Jumlah</th>
                            <th>:</th>
                            <td> {{ "IDR " + kas.jumlah.toString().replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g,
                                "$1\.") }}</td>
                        </tr>
                    </table>
                    <div class="grid grid-cols-3 mt-3">
                        <button v-if="kas.id == 1" @click="$inertia.get(route('kas.index', 2))"
                            class="text-white col-span-3 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            Change KAS BMT</button>
                        <button v-else-if="kas.id == 2" @click="$inertia.get(route('kas.index', 3))"
                            class="text-white col-span-3 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            Change KAS Instansi</button>
                        <button v-else="kas.id == 3" @click="$inertia.get(route('kas.index', 1))"
                            class="text-white col-span-3 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            Change KAS Brankas</button>
                        <div>
                            <input type="checkbox" name="filter" id="filter" class="mr-1" :checked="checkedTanggal"
                                @change="checkedTanggal = !checkedTanggal; checkedBulan = false; checkedTahun = false; doFilter(); ">
                            <label for="tanggal">Tanggal : </label>
                            <input type="date" name="tanggal" id="tanggal"
                                @change="checkedTanggal = true; checkedBulan = false; checkedTahun = false; doFilter()"
                                v-model="tanggal">
                        </div>
                        <div>
                            <input type="checkbox" name="filter" id="filter" class="mr-1" :checked="checkedBulan"
                                @change="checkedBulan = !checkedBulan; doFilter()">
                            <label for="Bulan">Bulan : </label>
                            <select @change="checkedBulan = true; doFilter()" v-model="bulan" name="Bulan" id="Bulan">
                                <option disabled value>Bulan</option>
                                <option value="01">Januari</option>
                                <option value="02">Februari</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>
                        <div>
                            <input type="checkbox" name="filter" id="filter" class="mr-1" :checked="checkedTahun"
                                @change="checkedTahun = !checkedTahun; doFilter()">
                            <label for="tahun">Tahun: </label>
                            <select name="tahun" id="tahun" @change="checkedTahun = true; doFilter()" v-model="tahun">
                                <option v-for="n in 13" :key="n" :value="tahunSelect + 1 - n">{{ tahunSelect + 1 - n }}
                                </option>
                            </select>
                        </div>
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
                            <tr v-for="(detail, index) in kas.detail" :key="detail.id"
                                :class="target_id == detail.id ? 'bg-green-100' : 'odd:bg-slate-50'">
                                <td class="text-center">{{ index + 1 }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-0">
                                            <div class="text-sm font-medium text-gray-900">
                                                Kode :{{ detail.kode }} <span
                                                    class="bg-green-100 rounded-full border-2 border-green-100"> </span>
                                            </div>
                                            <div class="text-sm text-black">
                                                Tanggal :{{ detail.tanggal.substring(0, 10) }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-0">
                                            <div class="text-sm font-medium text-gray-900">
                                                Debit :{{ "IDR " +
                                                    detail.debit.toString().replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g, "$1\.") }}
                                            </div>
                                            <div class="text-sm text-black text">
                                                Kredit :{{ "IDR " +
                                                    detail.kredit.toString().replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g, "$1\.") }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-0">
                                            <div class="text-sm font-medium text-gray-900">
                                                Saldo Awal :{{ "IDR " +
                                                    detail.saldo_awal.toString().replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g, "$1\.")
                                                }}
                                            </div>
                                            <div class="text-sm text-black">
                                                Saldo Akhir :{{ "IDR " +
                                                    detail.saldo_akhir.toString().replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g,
                                                        "$1\.") }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-0">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ detail.keterangan }}
                                            </div>
                                            <div class="text-sm text-black">
                                                {{ detail.karyawan_id }}
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
        kas: Object,
        nisbah: Object,
        details: Object
    },
    data() {
        return {
            tanggal: this.kas.detail.length != 0 ? this.kas.detail[0].tanggal.substring(0, 10) : new Date().toJSON().substring(0, 10),
            tahunSelect: new Date().getFullYear(),
            tahun: new Date().getFullYear(),
            bulan: String(new Date().getMonth() + 1).padStart(2, '0'),
            day: new Date().getDay(),
            checkedTanggal: false,
            checkedBulan: false,
            checkedTahun: false,
            formSearch: this.$inertia.form({
                filter: null,
                filterValue: null
            }),
            target_id: 0
        }
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
        }, doFilter() {
            console.log('checked tahun' + this.checkedTahun)
            console.log('checked Bulan' + this.checkedBulan)
            if (this.checkedTahun == true && this.checkedBulan == true) {
                this.formSearch.filter = 'bulan_tahun'
                this.formSearch.filterValue = this.tahun + '-' + this.bulan
            } else
                if (this.checkedBulan == true) {
                    this.formSearch.filter = 'bulan'
                    this.formSearch.filterValue = this.bulan
                } else
                    if (this.checkedTahun == true) {
                        this.formSearch.filter = 'tahun'
                        this.formSearch.filterValue = this.tahun
                    } else if (this.checkedTanggal == true) {

                        this.formSearch.filter = 'tanggal'
                        this.formSearch.filterValue = this.tanggal
                    }
            console.log(this.formSearch.filter + this.formSearch.filterValue)
            this.formSearch.get(
                route("kas.index", this.kas.id),
            );
        },
    },
    mounted() {
        let urlParams = new URLSearchParams(window.location.search);
        this.target_id = urlParams.get('id')
        if (urlParams.get('filter') == 'tanggal') {
            this.tanggal = urlParams.get('filterValue')
            this.checkedTanggal = true
        }
        if (urlParams.get('filter') == 'bulan') {
            this.bulan = urlParams.get('filterValue')
            this.checkedBulan = true
        }
        if (urlParams.get('filter') == 'tahun') {
            this.tahun = urlParams.get('filterValue')
            this.checkedTahun = true
        }
        if (urlParams.get('filter') == 'bulan_tahun') {
            this.bulan = urlParams.get('filterValue').substring(5)
            this.tahun = urlParams.get('filterValue').substring(0, 4)
            this.checkedTahun = true
            this.checkedBulan = true
        }
    }
});
</script>
