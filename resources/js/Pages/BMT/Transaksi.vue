<template>
    <app-layout title="Transaksi">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Transaksi
            </h2>
        </template>
        <div class="py-2">
            <div class="block">
                <div>

                    Kas BMT : {{ toRupiah(kasBMT.jumlah) }}
                </div>
                <div>

                    Kas Brankas : {{ toRupiah(kasBrankas.jumlah) }}
                </div>
                <div>

                    Jumlah Debit : {{ toRupiah(attribute.jumlahDebit) }}
                </div>
                <div>

                    Jumlah Kredit : {{ toRupiah(attribute.jumlahKredit) }}
                </div>
                <div>

                    Jumlah Selisih : {{ toRupiah(attribute.selisih) }}
                </div>
                <div>

                    Saldo Awal : {{ toRupiah(attribute.saldoAwal) }}
                </div>
                <div>

                    Check : {{ toRupiah(kasBMT.jumlah - attribute.selisih) }}
                </div>
                <div>
                    Healty : {{ kasBMT.jumlah - attribute.selisih == attribute.saldoAwal }}
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
                                Debit
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
                                Kredit
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
                                Tanggal
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
                                Log
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr v-for="(transaksi, index) in transaksis" :key="transaksi.id">
                            <td class="text-center">{{ index + 1 }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
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
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="ml-0">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ transaksi.debit }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="ml-0">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ transaksi.kredit }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="ml-0">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ transaksi.tanggal_transaksi }}
                                        </div>
                                        <div class="text-sm text-black">
                                            {{ transaksi.karyawan_id }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
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
import Add from "@/Pages/BMT/Partials/TransaksiAdd.vue";
import EditModal from "@/Pages/BMT/Partials/TransaksiEditModal.vue";

export default defineComponent({
    components: {
        AppLayout,
        VModal,
        Add,
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
        },
    },
    props: {
        transaksis: Object,
        kasBMT: Object,
        attribute: Object,
        kasBrankas: Object,
    },
});
</script>
