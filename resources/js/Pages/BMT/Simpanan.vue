<template>
    <app-layout title="Simpanan">
        <template #header>
            <h2 class="font-bold border-b-2 mb-2 uppercase">{{ "SIMPANAN" }}
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
                            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Simpanan</span>

                        </div>
                    </li>
                </ol>
            </nav>
        </template>
        <div class="py-5">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex flex-row-reverse flex-nowrap">
                    <add v-show="isNotJabatan('Funding')" v-if="anggotaTanpaSimpanan.length != 0"
                        :anggotas="anggotaTanpaSimpanan" :jenisSimpanan="jenisSimpanan"></add>
                    <button v-show="!searchShow" @click="searchShow = true"
                        class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">Search</button>
                    <button v-show="searchShow" @click="searchShow = false, $inertia.get(route('simpanan.index'))"
                        class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">Collapse</button>
                </div>
                <v-card class="my-5 mb-5">
                    <div v-show="searchShow" class="grid grid-cols-4 p-6">
                        <h5 class="mt-0 mb-2 text-base py-2 font-medium leading-tight text-primary align-middle">
                            Nama
                        </h5>
                        <div class="flex justify-center col-span-3">
                            <div class="mb-3 xl:w-full">
                                <div class="relative mb-4 flex w-full flex-wrap items-stretch">
                                    <input type="search" v-model="formSearch.nama"
                                        class="relative m-0 -mr-px block w-[1%] min-w-0 flex-auto rounded-l border border-solid border-neutral-300 bg-clip-padding px-3 py-1.5 text-base font-normal text-black outline-none transition duration-300 ease-in-out focus:border-primary focus:text-black focus:shadow-te-primary focus:outline-none dark:text-black dark:placeholder:text-neutral-200"
                                        placeholder="Nama" aria-label="Search" aria-describedby="button-addon1" />
                                </div>
                            </div>
                        </div>
                        <h5 class="mt-0 mb-2 text-base py-2 font-medium leading-tight text-primary align-middle">
                            Alamat
                        </h5>
                        <div class="flex justify-center col-span-3">
                            <div class="mb-3 xl:w-full">
                                <div class="relative mb-4 flex w-full flex-wrap items-stretch">
                                    <input type="search" v-model="formSearch.alamat"
                                        class="relative m-0 -mr-px block w-[1%] min-w-0 flex-auto rounded-l border border-solid border-neutral-300 bg-clip-padding px-3 py-1.5 text-base font-normal text-black outline-none transition duration-300 ease-in-out focus:border-primary focus:text-black focus:shadow-te-primary focus:outline-none dark:text-black dark:placeholder:text-neutral-200"
                                        placeholder="Alamat" aria-label="Search" aria-describedby="button-addon1" />
                                </div>
                            </div>
                        </div>
                        <h5 class="mt-0 mb-2 text-base py-2 font-medium leading-tight text-primary align-middle">
                            Rekening
                        </h5>
                        <div class="flex justify-center col-span-3">
                            <div class="mb-3 xl:w-full">
                                <div class="relative mb-4 flex w-full flex-wrap items-stretch">
                                    <input type="search" v-model="formSearch.kode"
                                        class="relative m-0 -mr-px block w-[1%] min-w-0 flex-auto rounded-l border border-solid border-neutral-300 bg-clip-padding px-3 py-1.5 text-base font-normal text-black outline-none transition duration-300 ease-in-out focus:border-primary focus:text-black focus:shadow-te-primary focus:outline-none dark:text-black dark:placeholder:text-neutral-200"
                                        placeholder="Rekening" aria-label="Search" aria-describedby="button-addon1" />
                                </div>
                            </div>
                        </div>
                        <h5 class="mt-0 mb-2 text-base py-2 font-medium leading-tight text-primary align-middle">
                            Kode Anggota
                        </h5>
                        <div class="flex justify-center col-span-3">
                            <div class="mb-3 xl:w-full">
                                <div class="relative mb-4 flex w-full flex-wrap items-stretch">
                                    <input type="search" v-model="formSearch.kodeAnggota"
                                        class="relative m-0 -mr-px block w-[1%] min-w-0 flex-auto rounded-l border border-solid border-neutral-300 bg-clip-padding px-3 py-1.5 text-base font-normal text-black outline-none transition duration-300 ease-in-out focus:border-primary focus:text-black focus:shadow-te-primary focus:outline-none dark:text-black dark:placeholder:text-neutral-200"
                                        placeholder="kode Anggota" aria-label="Search" aria-describedby="button-addon1" />
                                </div>
                            </div>
                        </div>
                        <div class="mb-5">
                            <label for="jenis_simpanan">Jenis Simpanan: </label>
                            <select name="jenis_simpanan" id="jenis_simpanan" v-model="formSearch.jenis_id">
                                <option v-for="jenis in jenisSimpanan" :key="jenis.id" :value="jenis.id">{{ jenis.nama }}
                                </option>
                            </select>
                            </div>
                            <div class="col-end-2" @click="search"><button
                                    class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">Search</button>
                            </div>
                        </div>
                </v-card>
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
                        <tr class="hover:bg-slate-100 cursor-pointer odd:bg-white even:bg-slate-50" v-for="(simpanan, index) in paginate.data"
                            :key="simpanan.id" @dblclick="detail(simpanan.id, simpanan.anggota.nama)">
                            <td class="text-center">{{ index + 1 }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="ml-0">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ simpanan.anggota.nama }} <span
                                                class="bg-green-100 rounded-full border-2 border-green-100"> {{
                                                    simpanan.anggota.kode }} </span>
                                        </div>
                                        <div class="text-sm text-black">
                                            {{ simpanan.anggota.alamat }}
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
                                        <div class="text-sm text-black">
                                            Simpanan {{ simpanan.jenis_simpanan.nama }}
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
                                        "IDR " + simpanan.jumlah.toString().replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g, "$1\.")
                                    }}
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <nav aria-label="Page navigation example" class="mt-5 grid">
                    <ul class="inline-flex -space-x-px mb-4 place-self-center">
                        <li v-show="paginate.current_page != 1">
                            <a :href="paginate.prev_page_url"
                                class="px-3 py-2 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 ">Previous</a>
                        </li>
                        <li v-show="paginate.current_page != 1">
                            <a :href="paginate.first_page_url"
                                class="px-3 py-2 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 ">1</a>
                        </li>
                        <li v-show="paginate.current_page != 1">
                            <a
                                class="px-3 py-2 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 ">...</a>
                        </li>
                        <li>
                            <a href="#" aria-current="page"
                                class="px-3 py-2 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700">{{
                                    paginate.current_page }}</a>
                        </li>
                        <li v-show="paginate.current_page != paginate.last_page">
                            <a
                                class="px-3 py-2 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 ">...</a>
                        </li>
                        <li v-show="paginate.current_page != paginate.last_page">
                            <a :href="paginate.last_page_url"
                                class="px-3 py-2 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 ">{{
                                    paginate.last_page }}</a>
                        </li>
                        <li v-show="paginate.current_page != paginate.last_page">
                            <a :href="paginate.next_page_url"
                                class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700 ">Next</a>
                        </li>
                    </ul>
                </nav>
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
import Add from "@/Pages/BMT/Partials/SimpananAdd.vue";
import EditModal from "@/Pages/BMT/Partials/SimpananEditModal.vue";
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
            form: this.$inertia.form(),
            formSearch: this.$inertia.form({
                nama: null,
                alamat: null,
                kode: null,
                kodeAnggota: null,
                jenis_id: null
            }),
            searchShow: false
        };
    },
    methods: {
        Simpanan(simpanan) {
            this.$inertia.delete(
                route("simpanan.destroy", simpanan.id)
            );
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
        search() {
            console.log(this.formSearch)
            this.formSearch.nama == null ? delete this.formSearch.nama : null,
                this.formSearch.alamat == null ? delete this.formSearch.alamat : null,
                this.formSearch.kode == null ? delete this.formSearch.kode : null,
                this.formSearch.jenis_id == null ? delete this.formSearch.jenis_id : null,
                this.formSearch.kodeAnggota == null ? delete this.formSearch.kodeAnggota : null,
                this.formSearch.get(this.route('simpanan.search'));
        },
        isNotJabatan(jabatan) {
            return !(this.$page.props.user.karyawan.jabatan.nama == jabatan)
        },
    },
    props: {
        paginate: Object,
        anggotaTanpaSimpanan: Object,
        jenisSimpanan: Object
    },
    mounted() {
        console.log(this.paginate)
        let urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('nama') || urlParams.has('alamat') || urlParams.has('kode') || urlParams.has('kodeAnggota')) {
            this.searchShow = true
        }
        this.formSearch.nama = urlParams.get('nama')
        this.formSearch.alamat = urlParams.get('alamat')
        this.formSearch.kode = urlParams.get('kode')
        this.formSearch.kodeAnggota = urlParams.get('kodeAnggota')
        console.log(this.$window.searchTipe);
    }

});
</script>
