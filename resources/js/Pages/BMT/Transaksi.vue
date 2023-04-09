<template>
    <app-layout title="Transaksi">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Transaksi
            </h2>
            <nav class="flex my-2" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <jet-nav-link :href="route('dashboard')" :active="route().current('dashboard')">
                            Dashboard
                        </jet-nav-link>
                    </li>

                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Transaksi</span>

                        </div>
                    </li>
                </ol>
            </nav>
            <div class="flex flex-row-reverse border-t-2 pt-4">
                <input type="date" name="tanggal" id="tanggal" v-model="tanggal" @change="changeTanggal">
                <div class="grow">
                    <button type="button"
                        class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                        @click="showOrder = 'setor'">Setoran</button>
                    <button type="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                        @click="showOrder = 'tarik'">Penarikan</button>
                    <button type="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                        @click="showOrder = 'pembiayaan'">Pembiayaan</button>
                    <button type="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                        @click="showOrder = 'angsur'">Angsuran</button>
                    <button type="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                        @click="showOrder = 'pemasukan'">Pemasukan</button>
                    <button type="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                        @click="showOrder = 'pengeluaran'">Pengeluaran</button>
                    <button type="button"
                        class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900"
                        @click="showOrder = false">Close</button>
                </div>

            </div>
        </template>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg  m-5 p-2 block">
                <angsur v-show="showOrder == 'angsur'"></angsur>
                <pemasukan v-show="showOrder == 'pemasukan'"></pemasukan>
                <pembiayaan v-show="showOrder == 'pembiayaan'"></pembiayaan>
                <pengeluaran v-show="showOrder == 'pengeluaran'"></pengeluaran>
                <setor v-show="showOrder == 'setor'"></setor>
                <tarik v-show="showOrder == 'tarik'"></tarik>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg  m-5 p-2 flex">
                <div>
                    Kas BMT : <span class="inline-block">{{ toRupiah(kasBMT.jumlah) }}</span>
                </div>
                <div>

                    Kas Brankas : <span class="inline-block">{{ toRupiah(kasBrankas.jumlah) }}</span>
                </div>
                <div>

                    Jumlah Debit : <span class="inline-block">{{ toRupiah(attribute.jumlahDebit) }}</span>
                </div>
                <div>

                    Jumlah Kredit : <span class="inline-block">{{ toRupiah(attribute.jumlahKredit) }}</span>
                </div>
                <div>

                    Selisih : <span class="inline-block">{{ toRupiah(attribute.selisih) }}</span>
                </div>
                <div>

                    Saldo Awal : <span class="inline-block">{{ toRupiah(attribute.saldoAwal) }}</span>
                </div>
                <div>

                    Check : <span class="inline-block">{{ toRupiah(kasBMT.jumlah - attribute.selisih) }}</span>
                </div>
                <div v-show="kasBMT.jumlah - attribute.selisih != attribute.saldoAwal">
                    Not Healty : <span class="inline-block">{{ kasBMT.jumlah - attribute.selisih == attribute.saldoAwal
                    }}</span>
                </div>
                <div v-show="kasBMT.jumlah - attribute.selisih == attribute.saldoAwal">
                    Healty : <span class="inline-block">{{ kasBMT.jumlah - attribute.selisih == attribute.saldoAwal
                    }}</span>
                </div>

            </div>
            <v-card>
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="
                                                              text-xs
                                                              font-medium
                                                              text-gray-500
                                                              uppercase
                                                              tracking-wider
                                                              text-center
                                                            ">
                                No
                            </th>
                            <th scope="col" class="
                                                              text-left text-xs
                                                              font-medium
                                                              text-gray-500
                                                              uppercase
                                                              tracking-wider
                                                            ">
                                Kode
                            </th>
                            <th scope="col" class="
                                                              text-left text-xs
                                                              font-medium
                                                              text-gray-500
                                                              uppercase
                                                              tracking-wider
                                                            ">
                                Nama Anggota
                            </th>
                            <th scope="col" class="
                                                              text-left text-xs
                                                              font-medium
                                                              text-gray-500
                                                              uppercase
                                                              tracking-wider
                                                            ">
                                Debit
                            </th>
                            <th scope="col" class="
                                                              text-left text-xs
                                                              font-medium
                                                              text-gray-500
                                                              uppercase
                                                              tracking-wider
                                                            ">
                                Kredit
                            </th>
                            <th scope="col" class="
                                                              text-xs
                                                              font-medium
                                                              text-gray-500 text-left
                                                              uppercase
                                                              tracking-wider
                                                            ">
                                Tanggal
                            </th>
                            <th scope="col" class="
                                                              text-xs
                                                              font-medium
                                                              text-gray-500
                                                              uppercase
                                                              tracking-wider
                                                              text-left
                                                            ">
                                Log
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr v-for="(transaksi, index) in transaksis" :key="transaksi.id">
                            <td class="text-center">{{ index + 1 }}</td>
                            <td class="">
                                <div class="flex items-center">
                                    <div class="ml-0">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ transaksi.nama }}
                                        </div>
                                        <div class="text-sm text-black">
                                            {{ transaksi.kode }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="">
                                <div class="flex items-center">
                                    <div class="ml-0" v-if="transaksi.log">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ transaksi.log.simpanan ? transaksi.log.simpanan.anggota.nama :
                                                transaksi.log.pembiayaan ? transaksi.log.pembiayaan.anggota.nama : '-' }}
                                        </div>
                                        <div class="text-sm text-black">
                                            {{ transaksi.log.simpanan ? transaksi.log.simpanan.anggota.alamat :
                                                transaksi.log.pembiayaan ? transaksi.log.pembiayaan.anggota.alamat : '-' }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="">
                                <div class="flex items-center">
                                    <div class="ml-0">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ toRupiah(transaksi.debit) }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="">
                                <div class="flex items-center">
                                    <div class="ml-0">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ toRupiah(transaksi.kredit) }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="">
                                <div class="">
                                    <div class="ml-0">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ transaksi.tanggal_transaksi }}
                                        </div>
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ transaksi.keterangan }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="">
                                <div class="flex justify-start">
                                    <div class="ml-0">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ transaksi.log_type }}
                                        </div>
                                        <div class="text-sm text-black">
                                            {{ transaksi.log_id }}
                                        </div>
                                    </div>
                                </div>
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
import VModal from "@/Components/Modal.vue";
import Angsur from "@/Pages/BMT/Transaksi/Angsur.vue";
import Pemasukan from "@/Pages/BMT/Transaksi/Pemasukan.vue";
import Pembiayaan from "@/Pages/BMT/Transaksi/Pembiayaan.vue";
import Pengeluaran from "@/Pages/BMT/Transaksi/Pengeluaran.vue";
import Setor from "@/Pages/BMT/Transaksi/Setor.vue";
import Tarik from "@/Pages/BMT/Transaksi/Tarik.vue";
import JetNavLink from '@/Jetstream/NavLink.vue'
import EditModal from "@/Pages/BMT/Partials/TransaksiEditModal.vue";

export default defineComponent({
    components: {
        AppLayout, JetNavLink,
        VModal,
        Angsur,
        Pemasukan,
        Pembiayaan,
        Pengeluaran,
        Setor,
        Tarik,
        EditModal,
        VInput,
        VCard,
        VButton,
    },
    methods: {
        deleteTransaksi(transaksi) {
            this.$inertia.delete(
                route("transaksi.destroy", transaksi.id)
            );
        },
        toRupiah(jumlah) {
            return "IDR " + jumlah.toString().replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g, "$1\.")
        }, changeTanggal() {
            console.log(this.tanggal)
            this.$inertia.get(this.route('transaksi.index'), { 'tanggal': this.tanggal })
        }
    },
    data() {
        return {
            tanggal: new Date().toJSON().substring(0, 10),
            showOrder: false

        };
    },
    props: {
        transaksis: Object,
        kasBMT: Object,
        attribute: Object,
        kasBrankas: Object,
    },
});
</script>
