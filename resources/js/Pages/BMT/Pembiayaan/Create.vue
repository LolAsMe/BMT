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
                            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Pembiayaan
                                Create</span>

                        </div>
                    </li>
                </ol>
            </nav>
        </template>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                <form @submit.prevent="create">
                    Pembiayaan
                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="relative z-0 w-full mb-6 group">
                            <label for="jenis_pembiayaan" class="">
                                Jenis Pembiayaan</label>
                            <select v-model="formCreate.jenis_pembiayaan_id" name="jenis_pembiayaan" id="jenis_pembiayaan">
                                <option v-for="jenis in jenisPembiayaan" :key="jenis.id" :value="jenis.id">{{ jenis.nama }}
                                </option>
                            </select>
                        </div>
                        <div @click="cariAnggota()"
                            class="  hover:cursor-pointer hover:text-blue-300 relative z-0 w-full mb-6 group">
                            Anggota : {{ anggota }}
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="relative z-0 w-full mb-6 group">
                            <input v-model="formCreate.tanggal_pinjam" type="date" name="floating_tanggal_pinjam"
                                id="floating_tanggal_pinjam"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required />
                            <label for="floating_tanggal_pinjam"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                Tanggal Pinjam</label>
                        </div>
                        <div class="relative z-0 w-full mb-6 group">
                            <input v-model="formCreate.tanggal_jatuh_tempo" type="date" name="floating_tanggal_jatuh_tempo"
                                id="floating_tanggal_jatuh_tempo"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required />
                            <label for="floating_tanggal_jatuh_tempo"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                Tanggal Jatuh Tempo</label>
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="relative z-0 w-full mb-6 group">
                            <input v-model="formCreate.jumlah" type="number" name="floating_jumlah" id="floating_jumlah"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required />
                            <label for="floating_jumlah"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                Jumlah</label>
                        </div>
                        <div class="relative z-0 w-full mb-6 group">
                            <input v-model="formCreate.pokok" type="text" name="floating_pokok" id="floating_pokok"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required />
                            <label for="floating_pokok"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                Pokok</label>
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="relative z-0 w-full mb-6 group">
                            <input v-model="formCreate.jasa" type="number" name="floating_jasa" id="floating_jasa"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required />
                            <label for="floating_jasa"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                Jasa</label>
                        </div>
                        <div class="relative z-0 w-full mb-6 group">
                            <input v-model="formCreate.potongan_pembiayaan" type="text" name="floating_potongan_pembiayaan"
                                id="floating_potongan_pembiayaan"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required />
                            <label for="floating_potongan_pembiayaan"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                Potongan Pembiayaan</label>
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="relative z-0 w-full mb-6 group">
                            <input v-model="total_pembiayaan" type="number" name="floating_total_pembiayaan"
                                id="floating_total_pembiayaan"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required disabled />
                            <label for="floating_total_pembiayaan"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                Total Pembiayaan</label>
                        </div>
                        <div class="relative z-0 w-full mb-6 group">
                            <input @change="gantiJumlahAngsuran()" v-model="formCreate.frekuensi_angsuran" type="text"
                                name="floating_frekuensi_angsuran" id="floating_frekuensi_angsuran"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required />
                            <label for="floating_frekuensi_angsuran"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                Frekuensi Angsuran</label>
                        </div>
                    </div>
                    {{ rupiah }}
                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="relative z-0 w-full mb-6 group">
                            <input v-model="formCreate.jumlah_angsuran" type="number" name="floating_jumlah_angsuran"
                                id="floating_jumlah_angsuran"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required />
                            <label for="floating_jumlah_angsuran"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                Jumlah Angsuran</label>
                        </div>
                        <div class="relative z-0 w-full mb-6 group">
                            <input v-model="formCreate.keterangan" type="text" name="floating_keterangan"
                                id="floating_keterangan"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required />
                            <label for="floating_keterangan"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                Keterangan</label>
                        </div>
                    </div>
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
                </form>
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
                anggota_id:null,
                jenis_pembiayaan_id: 1,
                tanggal_pinjam: null,
                jumlah: null,
                tanggal_jatuh_tempo: null,
                pokok: null,
                jasa: null,
                potongan_pembiayaan: 0,
                total_pembiayaan: null,
                frekuensi_angsuran: null,
                jumlah_angsuran: null,
                keterangan: null,
            }),
        };
    },
    methods: {
        create() {
            this.formCreate.total_pembiayaan = this.total_pembiayaan
            // this.formCreate.jumlah_angsuran = this.jumlah_angsuran
            this.formCreate.anggota_id = this.$window.anggota_id
            this.formCreate.post(route('pembiayaan.store', {
                preserveScroll: true,
                onSuccess: () => {
                    console.log('sdf')
                    this.$toast.success('Pembiayaan berhasil Ditambahkan')
                    this.form.reset();
                    this.$refs.editModal.toggleModal();
                },
            }))
        },
        cariAnggota() {
            this.$window.searchTipe = "pembiayaan-create"
            this.$inertia.get(route('anggota.index'))
        },
        gantiJumlahAngsuran() {
            let frekuensi = this.formCreate.frekuensi_angsuran ? parseInt(this.formCreate.frekuensi_angsuran) : 1
            this.formCreate.jumlah_angsuran = Math.ceil(this.total_pembiayaan / (frekuensi * 10000)) * 10000
            console.log('tes')
        }
    },
    props: {
        jenisPembiayaan: Object
    },
    computed: {
        total_pembiayaan() {
            let jumlah = this.formCreate.jumlah ? parseInt(this.formCreate.jumlah) : 0
            let pokok = this.formCreate.pokok ? parseInt(this.formCreate.pokok) : 0
            let jasa = this.formCreate.jasa ? parseInt(this.formCreate.jasa) : 0
            let potongan_pembiayaan = this.formCreate.potongan_pembiayaan ? parseInt(this.formCreate.potongan_pembiayaan) : 0
            return jumlah + pokok + jasa - potongan_pembiayaan
        },
        rupiah() {
            return "IDR " + this.total_pembiayaan.toString().replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g, "$1\.")
        },
        anggota() {
            return this.$window.anggota_nama ?? "Cari Anggota"
        }
    },
    mounted() {
        console.log(this.$window.anggota_id)
    }

});
</script>
