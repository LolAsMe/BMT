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
                    <div class="pt-4">
                        <button v-show="!addShow" @click="addShow = true"
                            class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">Add</button>
                        <button v-show="addShow" @click="addShow = false, $inertia.get(route('laba.index'))"
                            class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">Collapse</button>
                    </div>
                </div>
                <div v-if="addShow" class=" mb-2">
                    <v-card>
                        <div class="flex flex-row gap-4 p-4">
                            <div class="w-full">
                                <h3 class="font-bold border-b-2 mb-2 uppercase">{{ 'Laba' }}
                                </h3>
                                <div class="relative z-0 w-full mb-6 group">
                                    <input type="text" name="floating_keterangan" id="floating_keterangan"
                                        class="disabled:border-green-300 disabled:text-green-600 block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" " required v-model="form.keterangan" />
                                    <label for="floating_keterangan"
                                        class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Keterangan</label>
                                </div>
                                <div class="relative z-0 w-full mb-6 group">
                                    <input type="number" name="floating_tambah" id="floating_tambah"
                                        class="disabled:border-green-300 disabled:text-green-600 block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" " required v-model="form.jumlah" />
                                    <label for="floating_tambah"
                                        class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Laba</label>
                                </div>
                                <span class="block">
                                    Laba Bulan Ini : IDR {{ (paginate.data[paginate.data.length-1].jumlah).toString().replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g, "$1\.") }}
                                </span>
                                <span class="block" v-if="form.jumlah">
                                    IDR {{ (form.jumlah+paginate.data[paginate.data.length-1].jumlah).toString().replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g, "$1\.") }}
                                </span>
                                <button @click="tambah" type="submit"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Laba</button>
                            </div>
                        </div>
                    </v-card>
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
                        <tr v-for="(laba, index) in paginate.data" :key="laba.id" class="odd:bg-slate-50 cursor-pointer"
                            @dblclick="detail(laba.id)">
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
                                            {{ "IDR " + laba.jumlah.toString().replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g,
                                                "$1\.") }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
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
import JetNavLink from '@/Jetstream/NavLink.vue'

export default defineComponent({
    components: {
        AppLayout,
        VModal,
        VInput,
        VCard,
        VButton, JetNavLink
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
        },
        tambah() {
            console.log(this.form)
                this.form.jumlah =+ this.form.jumlah
                this.form.post(this.route('laba.tambah'), {
                    preserveScroll: true,
                    onSuccess: () => {
                        this.form.reset();
                        this.$toast.success('Laba berhasil ditambahkan')
                    },
                })
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
            form: this.$inertia.form({ keterangan: null, jumlah: null }),
            addShow: false
        };
    },
    props: {
        paginate: Object,
    },
    mounted() {
        console.log(this.paginate)
        let urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('nama') || urlParams.has('kodeSimpanan') || urlParams.has('kode') || urlParams.has('kodeAnggota')) {
            this.addShow = true
        }
        this.formSearch.nama = urlParams.get('nama')
        this.formSearch.kodeSimpanan = urlParams.get('kodeSimpanan')
        this.formSearch.kode = urlParams.get('kode')
        this.formSearch.kodeAnggota = urlParams.get('kodeAnggota')
    }
});
</script>
