<template>
    <app-layout title="Pembiayaan">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create Pembiayaan
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
                            <jet-nav-link :href="route('pembiayaan.index')" :active="route().current('pembiayaan.index')">
                                Pembiayaan
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
                            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Pembiayaan
                                Create</span>

                        </div>
                    </li>
                </ol>
            </nav>
        </template>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">

            </div>
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
import Add from "@/Pages/BMT/Pembiayaan/AddPembiayaan.vue";
import EditModal from "@/Pages/BMT/Pembiayaan/EditModal.vue";
import JetNavLink from '@/Jetstream/NavLink.vue'

export default defineComponent({
    components: {
        AppLayout,
        VModal,
        Add,
        EditModal,
        VInput,
        VCard,
        VButton, JetNavLink
    },
    data() {
        return {
            formCreate: this.$inertia.form({
                nomor :null,
                jenis_pembiayaan_id:null,
                anggota_id:null,
                karyawan_id:null,
                tanggal_pinjam:null,
                jumlah:null,
                tanggal_jatuh_tempo:null,
                pokok:null,
                jasa:null,
                potongan_pembiayaan:null,
                total_pembiayaan:null,
                frekuensi_angsuran:null,
                jumlah_angsuran:null,
                angsuran_diterima:null,
                keterangan:null,
                kode: null,
                jenis_objek: null,
                nomor_polisi: null,
                tanggal_masuk: null,
                tanggal_ambil: null,
                tahun_pembuatan: null,
                luas_objek: null,
                letak_objek: null,
                nama_pemilik: null,
                alamat_pemilik: null,
            }),
        };
    },
    methods: {
        detail(pembiayaanId) {
        },
        search() {
        }
    },
    props: {
    },
    mounted() {
    }

});
</script>
