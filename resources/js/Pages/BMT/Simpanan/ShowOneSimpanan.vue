<template>
    <app-layout title="Simpanan ">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                SIMPANAN {{ simpanan.anggota.nama }} {{ simpanan.kode }} {{ simpanan.jenis_simpanan.nama }}
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
                            <jet-nav-link :href="route('simpanan.index')" :active="route().current('simpanan.index')">
                                Simpanan
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
                            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Simpanan {{
                                simpanan.anggota.nama }}</span>

                        </div>
                    </li>
                </ol>
            </nav>
        </template>
        <div class="py-10">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                    <div class="flex flex-row-reverse">
                        <button v-if="simpanan.deleted_at == null"
                            @click="deleteSimpanan" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                            DEACTIVE</button>
                            <button v-else
                            @click="deleteSimpanan" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                            ACTIVE</button>
                        <button @click="$refs.editModal.show(simpanan)"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            EDIT</button>
                    </div>
                    <div class="table w-full">
                        <div class="table-row-group">
                            <div class="table-row">
                                <div class="table-cell">ID</div>
                                <div class="table-cell">:</div>
                                <div class="table-cell">{{ simpanan.id }}</div>
                            </div>
                            <div class="table-row">
                                <div class="table-cell">No Rekening</div>
                                <div class="table-cell">:</div>
                                <div class="table-cell">{{ simpanan.kode }}</div>
                            </div>
                            <div class="table-row">
                                <div class="table-cell">Jenis Simpanan</div>
                                <div class="table-cell">:</div>
                                <div class="table-cell">Simpanan {{ simpanan.jenis_simpanan.nama }}</div>
                            </div>
                            <div class="table-row">
                                <div class="table-cell">Nama Anggota</div>
                                <div class="table-cell">:</div>
                                <div class="table-cell">{{ simpanan.anggota.nama }}</div>
                            </div>
                            <div class="table-row">
                                <div class="table-cell">Nomer Anggota</div>
                                <div class="table-cell">:</div>
                                <div class="table-cell">{{ simpanan.anggota.kode }}</div>
                            </div>
                            <div class="table-row">
                                <div class="table-cell">Nomer KTP</div>
                                <div class="table-cell">:</div>
                                <div class="table-cell">{{ simpanan.anggota.no_ktp }}</div>
                            </div>
                            <div class="table-row">
                                <div class="table-cell">Jenis Kelamin</div>
                                <div class="table-cell">:</div>
                                <div class="table-cell">{{ simpanan.anggota.jenis_kelamin }}</div>
                            </div>
                            <div class="table-row">
                                <div class="table-cell">Jumlah Simpanan</div>
                                <div class="table-cell">:</div>
                                <div class="table-cell">{{
                                    "IDR " + simpanan.jumlah.toString().replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g, "$1\.")
                                }}</div>
                            </div>
                            <div class="table-row">
                                <div class="table-cell">Alamat</div>
                                <div class="table-cell">:</div>
                                <div class="table-cell">{{ simpanan.anggota.alamat }}</div>
                            </div>
                            <div class="table-row">
                                <div class="table-cell">Telepon</div>
                                <div class="table-cell">:</div>
                                <div class="table-cell">{{ simpanan.anggota.telepon ?? "-" }}</div>
                            </div>
                            <div class="table-row">
                                <div class="table-cell">Pekerjaan</div>
                                <div class="table-cell">:</div>
                                <div class="table-cell">{{ simpanan.anggota.pekerjaan ?? "-" }}</div>
                            </div>
                            <div class="table-row">
                                <div class="table-cell">Tempat Lahir</div>
                                <div class="table-cell">:</div>
                                <div class="table-cell">{{ simpanan.anggota.tempat_lahir ?? "-" }}</div>
                            </div>
                            <div class="table-row">
                                <div class="table-cell">Tanggal Lahir</div>
                                <div class="table-cell">:</div>
                                <div class="table-cell">{{ simpanan.anggota.tanggal_lahir }}</div>
                            </div>
                            <div class="table-row">
                                <div class="table-cell">Tanggal Masuk</div>
                                <div class="table-cell">:</div>
                                <div class="table-cell">{{ simpanan.anggota.tanggal_masuk }}</div>
                            </div>
                            <div class="table-row">
                                <div class="table-cell">Nama Ibu Kandung</div>
                                <div class="table-cell">:</div>
                                <div class="table-cell">{{ simpanan.anggota.nama_ibu_kandung }}</div>
                            </div>
                            <div class="table-row">
                                <div class="table-cell">Keterangan</div>
                                <div class="table-cell">:</div>
                                <div class="table-cell">{{ simpanan.keterangan }}</div>
                            </div>
                            <div class="table-row">
                                <div class="table-cell">Status</div>
                                <div class="table-cell">:</div>
                                <div class="table-cell bg-red-400 text-white" v-if="simpanan.deleted_at!=null">{{  "Tidak Aktif" }}</div>
                                <div v-else class="table-cell bg-green-400 text-white">{{  "Aktif" }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
    <edit-modal ref="editModal"></edit-modal>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import JetNavLink from '@/Jetstream/NavLink.vue'
import Welcome from "@/Jetstream/Welcome.vue";
import EditModal from "@/Pages/BMT/Partials/SimpananEditModal.vue";
import { Link } from "@inertiajs/inertia-vue3";
export default defineComponent({
    components: {
        AppLayout,
        Welcome,
        EditModal,
        Link, JetNavLink
    },
    props: {
        simpanan: Object
    },
    data() {
        return {
        }
    },
    methods: {
        deleteSimpanan(){
            console.log('test')
            this.$inertia.delete(
                route("simpanan.destroy", this.simpanan.id)
            );
        }
    }
});
</script>
