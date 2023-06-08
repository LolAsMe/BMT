<template>
    <app-layout title="Nisbah">
        <template #header>
            <h2 class="font-bold border-b-2 mb-2 uppercase">{{ "NISBAH" }}
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
                            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Nisbah</span>

                        </div>
                    </li>
                </ol>
            </nav>
        </template>
        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex flex-row-reverse flex-nowrap">
                    <add :showModal="showAddModal"></add>
                    <div class="pt-4">
                        <button v-show="!searchShow" @click="searchShow = true"
                            class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">Search</button>
                        <button v-show="searchShow" @click="searchShow = false, $inertia.get(route('nisbah.index'))"
                            class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">Collapse</button>
                    </div>
                    <div class="pt-4" v-if="this.$page.props.user.karyawan.jabatan.nama == 'Manajer'">
                        <button @click="$inertia.get(route('nisbah.hitung.index'))"
                            class="focus:outline-none text-white bg-blue-400 hover:bg-blue-500 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-blue-900">
                            Hitung</button>
                            <button @click="$inertia.post(this.route('nisbah.apply'))"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            Apply</button>
                    </div>
                </div>
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
                        Rekening Simpanan
                    </h5>
                    <div class="flex justify-center col-span-3">
                        <div class="mb-3 xl:w-full">
                            <div class="relative mb-4 flex w-full flex-wrap items-stretch">
                                <input type="search" v-model="formSearch.kodeSimpanan"
                                    class="relative m-0 -mr-px block w-[1%] min-w-0 flex-auto rounded-l border border-solid border-neutral-300 bg-clip-padding px-3 py-1.5 text-base font-normal text-black outline-none transition duration-300 ease-in-out focus:border-primary focus:text-black focus:shadow-te-primary focus:outline-none dark:text-black dark:placeholder:text-neutral-200"
                                    placeholder="Rekening" aria-label="Search" aria-describedby="button-addon1" />
                            </div>
                        </div>
                    </div>
                    <h5 class="mt-0 mb-2 text-base py-2 font-medium leading-tight text-primary align-middle">
                        Kode
                    </h5>
                    <div class="flex justify-center col-span-3">
                        <div class="mb-3 xl:w-full">
                            <div class="relative mb-4 flex w-full flex-wrap items-stretch">
                                <input type="search" v-model="formSearch.kode"
                                    class="relative m-0 -mr-px block w-[1%] min-w-0 flex-auto rounded-l border border-solid border-neutral-300 bg-clip-padding px-3 py-1.5 text-base font-normal text-black outline-none transition duration-300 ease-in-out focus:border-primary focus:text-black focus:shadow-te-primary focus:outline-none dark:text-black dark:placeholder:text-neutral-200"
                                    placeholder="Kode" aria-label="Search" aria-describedby="button-addon1" />
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
                    <div class="col-end-2" @click="search"><button
                            class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">Search</button>
                    </div>
                </div>
            </v-card>
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
                                Tanggal
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
                                Nisbah
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="
                                    px-6
                                    py-3
                                    text-xs text-center
                                    font-medium
                                    text-gray-500
                                    uppercase
                                    tracking-wider
                                  ">Status</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr v-for="(nisbah, index) in paginate.data" :key="nisbah.id" class="odd:bg-slate-50 cursor-pointer"
                            @dblclick="detail(nisbah.id)">
                            <td class="text-center">{{ index + 1 }}</td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="ml-0">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ nisbah.simpanan.anggota.nama }} / <span
                                                class="bg-green-100 rounded-full border-2 border-green-100"> {{
                                                    nisbah.kode }} </span>
                                        </div>
                                        <div class="text-sm text-black">
                                            {{ nisbah.simpanan.kode }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="ml-0">
                                        <div class="text-sm font-medium text-gray-900">
                                            Start : {{ nisbah.tanggal_awal.substring(0, 10) }}
                                        </div>
                                        <div class="text-sm font-medium text-gray-900">
                                            End : {{ nisbah.tanggal_selesai.substring(0, 10) }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="ml-0">
                                        <div class="text-sm font-medium text-gray-900">
                                            Investasi : {{ "IDR " +
                                                nisbah.awal.toString().replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g, "$1\.") }}
                                        </div>
                                        <div class="text-sm font-medium text-gray-900">
                                            Hasil : {{ "IDR " +
                                                nisbah.jumlah.toString().replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g, "$1\.") }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="ml-0">
                                        <div v-show="nisbah.status == 'ongoing'"
                                            class="text-sm font-medium bg-yellow-100 rounded-full border-2 border-yellow-1000">
                                            {{ nisbah.status }}
                                        </div>
                                        <div v-show="nisbah.status == 'selesai'"
                                            class="text-sm font-medium bg-green-100 rounded-full border-2 border-green-1000">
                                            {{ nisbah.status }}
                                        </div>
                                        <div v-show="nisbah.status == 'pending'"
                                            class="text-sm font-medium bg-red-100 rounded-full border-2 border-green-1000">
                                            {{ nisbah.status }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <edit-modal ref="editModal"></edit-modal>
                <nav v-show="paginate.current_page != 1" aria-label="Page navigation example" class="mt-5 grid">
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
import Add from "@/Pages/BMT/Partials/NisbahAdd.vue";
import EditModal from "@/Pages/BMT/Partials/NisbahEditModal.vue";
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
    methods: {
        deleteNisbah(nisbah) {
            this.$inertia.delete(
                route("nisbah.destroy", nisbah.id)
            );
        },
        detail(nisbahId) {
            console.log("ini Detail" + nisbahId)
            console.log(this.route('nisbah.index'))
            // window.location.href = this.route('nisbah.show', nisbahId);
            this.$inertia.get(this.route('nisbah.show', nisbahId))

        },
        search() {
            console.log("ewrw")
            this.formSearch.nama == null ? delete this.formSearch.nama : null,
                this.formSearch.kodeSimpanan == null ? delete this.formSearch.kodeSimpanan : null,
                this.formSearch.kodeAnggota == null ? delete this.formSearch.kodeAnggota : null,
                this.formSearch.get(this.route('nisbah.search'));
        }
    },
    data() {
        return {
            form: this.$inertia.form(),
            formSearch: this.$inertia.form({
                nama: null,
                kodeSimpanan: null,
                kode: null,
                kodeAnggota: null
            }),
            searchShow: false
        };
    },
    props: {
        paginate: Object,
    },
    computed: {
        showAddModal() {
            return !!this.$window.showAddModal
        },
        totalIDR() {
            return this.toRupiah(this.total)
        }
    },
    mounted() {
        console.log(this.paginate)
        let urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('nama') || urlParams.has('kodeSimpanan') || urlParams.has('kode') || urlParams.has('kodeAnggota')) {
            this.searchShow = true
        }
        this.formSearch.nama = urlParams.get('nama')
        this.formSearch.kodeSimpanan = urlParams.get('kodeSimpanan')
        this.formSearch.kode = urlParams.get('kode')
        this.formSearch.kodeAnggota = urlParams.get('kodeAnggota')
    },
    created() {
        console.log(this.$window.showAddModal);
        console.log(this.$window.simpanan_id);
    }
});
</script>
