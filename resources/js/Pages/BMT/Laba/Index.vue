<template>
    <app-layout title="Laba">
        <template #header>
            <h2 class="font-bold border-b-2 mb-2 uppercase">{{ "LABA" }}
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
                            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Laba</span>

                        </div>
                    </li>
                </ol>
            </nav>
        </template>
        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex flex-row-reverse flex-nowrap">
                    <!-- <add></add> -->
                    <div class="pt-4">
                        <button v-show="!searchShow" @click="searchShow = true"
                            class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">Search</button>
                        <button v-show="searchShow" @click="searchShow = false, $inertia.get(route('laba.index'))"
                            class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">Collapse</button>
                    </div>
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
                                BULAN
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
                                Laba
                            </th>

                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr v-for="(laba, index) in paginate.data" :key="laba.id" class="odd:bg-slate-50 cursor-pointer" @dblclick="detail(laba.id)">
                            <td class="text-left px-6 py-4">{{ index + 1 }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="ml-0">
                                        <div class="text-sm text-black">
                                            {{ laba.kode }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="ml-0">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ laba.bulan }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="ml-0">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ "IDR " + laba.jumlah.toString().replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g, "$1\.") }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <nav v-show="paginate.current_page!=1" aria-label="Page navigation example" class="mt-5 grid">
                    <ul class="inline-flex -space-x-px mb-4 place-self-center">
                        <li v-show="paginate.current_page!=1">
                            <a :href="paginate.prev_page_url"
                                class="px-3 py-2 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 ">Previous</a>
                        </li>
                        <li v-show="paginate.current_page!=1" >
                            <a :href="paginate.first_page_url"
                                class="px-3 py-2 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 ">1</a>
                        </li>
                        <li v-show="paginate.current_page!=1">
                            <a class="px-3 py-2 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 ">...</a>
                        </li>
                        <li>
                            <a href="#" aria-current="page"
                                class="px-3 py-2 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700">{{ paginate.current_page }}</a>
                        </li>
                        <li v-show="paginate.current_page!=paginate.last_page">
                            <a class="px-3 py-2 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 ">...</a>
                        </li>
                        <li v-show="paginate.current_page!=paginate.last_page">
                            <a :href="paginate.last_page_url"
                                class="px-3 py-2 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 ">{{ paginate.last_page }}</a>
                        </li>
                        <li v-show="paginate.current_page!=paginate.last_page">
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
// import Add from "@/Pages/BMT/Partials/LabaAdd.vue";
// import EditModal from "@/Pages/BMT/Partials/LabaEditModal.vue";
import JetNavLink from '@/Jetstream/NavLink.vue'

export default defineComponent({
    components: {
        AppLayout,
        VModal,
        VInput,
        VCard,
        VButton,JetNavLink
    },
    methods: {
        deleteLaba(laba) {
            this.$inertia.delete(
                route("laba.destroy", laba.id)
            );
        },
        detail(labaId) {
            console.log("ini Detail" + labaId)
            console.log(this.route('laba.index'))
            window.location.href = this.route('laba.show', labaId);

        },
        search() {
            console.log("ewrw")
            this.formSearch.nama == null ? delete this.formSearch.nama : null,
                this.formSearch.kodeSimpanan == null ? delete this.formSearch.kodeSimpanan : null,
                this.formSearch.kodeAnggota == null ? delete this.formSearch.kodeAnggota : null,
                this.formSearch.get(this.route('laba.search'));
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
    }
});
</script>
