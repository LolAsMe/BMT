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
                            <input v-model="formCreate.kode" type="text" name="floating_kode" id="floating_kode"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required />
                            <label for="floating_kode"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                Kode</label>
                        </div>
                        <div class="relative z-0 w-full mb-6 group">
                            <input v-model="formCreate.nomor" type="text" name="floating_nomor" id="floating_nomor"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required />
                            <label for="floating_nomor"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                Nomor</label>
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="relative z-0 w-full mb-6 group">
                            <label for="jenis_pembiayaan" class="">
                                Jenis Pembiayaan</label>
                            <select v-model="formCreate.jenis_pembiayaan_id" name="jenis_pembiayaan" id="jenis_pembiayaan">
                                <option v-for="jenis in jenisPembiayaan" :key="jenis.id" :value="jenis.id">{{ jenis.nama }}
                                </option>
                            </select>
                        </div>
                        <div class="relative z-0 w-full mb-6 group">
                            <input v-model="formCreate.anggota_id" type="text" name="floating_anggota" id="floating_anggota"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required />
                            <label for="floating_anggota"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                Anggota</label>
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
                            <input v-model="formCreate.frekuensi_angsuran" type="text" name="floating_frekuensi_angsuran"
                                id="floating_frekuensi_angsuran"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required />
                            <label for="floating_frekuensi_angsuran"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                Frekuensi Angsuran</label>
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="relative z-0 w-full mb-6 group">
                            <input v-model="jumlah_angsuran" type="number" name="floating_jumlah_angsuran"
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

                    Anggunan
                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="relative z-0 w-full mb-6 group">
                            <input v-model="formCreate.kode" type="text" name="floating_kode" id="floating_kode"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required />
                            <label for="floating_kode"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                Kode</label>
                        </div>
                        <div class="relative z-0 w-full mb-6 group">
                            <input v-model="formCreate.jenis_objek" type="text" name="floating_jenis_objek"
                                id="floating_jenis_objek"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required />
                            <label for="floating_jenis_objek"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                Jenis Objek</label>
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="relative z-0 w-full mb-6 group">
                            <input v-model="formCreate.nomor_polisi" type="text" name="floating_nomor_polisi"
                                id="floating_nomor_polisi"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required />
                            <label for="floating_nomor_polisi"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                Nomer Polisi</label>
                        </div>
                        <div class="relative z-0 w-full mb-6 group">
                            <input v-model="formCreate.tahun_pembuatan" type="text" name="floating_tahun_pembuatan"
                                id="floating_tahun_pembuatan"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required />
                            <label for="floating_tahun_pembuatan"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                Tahun Pembuatan</label>
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="relative z-0 w-full mb-6 group">
                            <input v-model="formCreate.luas_objek" type="textnumber" name="floating_luas_objek"
                                id="floating_luas_objek"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required />
                            <label for="floating_luas_objek"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                Luas Objek</label>
                        </div>
                        <div class="relative z-0 w-full mb-6 group">
                            <input v-model="formCreate.letak_objek" type="text" name="floating_letak_objek"
                                id="floating_letak_objek"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required />
                            <label for="floating_letak_objek"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                Letak Objek</label>
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="relative z-0 w-full mb-6 group">
                            <input v-model="formCreate.nama_pemilik" type="text" name="floating_namaa_pemilik"
                                id="floating_namaa_pemilik"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required />
                            <label for="floating_namaa_pemilik"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                Nama Pemilik</label>
                        </div>
                        <div class="relative z-0 w-full mb-6 group">
                            <input v-model="formCreate.alamat_pemilik" type="text" name="floating_alamat_pemilik"
                                id="floating_alamat_pemilik"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required />
                            <label for="floating_alamat_pemilik"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                Alamat Pemilik</label>
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
                kode: null,
                nomor: null,
                jenis_pembiayaan_id: 1,
                anggota_id: 1,
                tanggal_pinjam: null,
                jumlah: null,
                tanggal_jatuh_tempo: null,
                pokok: null,
                jasa: null,
                potongan_pembiayaan: null,
                total_pembiayaan: null,
                frekuensi_angsuran: null,
                jumlah_angsuran: null,
                keterangan: null,
                kode: null,
                jenis_objek: null,
                nomor_polisi: null,
                tahun_pembuatan: null,
                luas_objek: null,
                letak_objek: null,
                nama_pemilik: null,
                alamat_pemilik: null,
            }),
        };
    },
    methods: {
        create() {
            this.formCreate.total_pembiayaan = this.total_pembiayaan
            this.formCreate.jumlah_angsuran = this.jumlah_angsuran
            this.formCreate.post(route('pembiayaan.store', {
                preserveScroll: true,
                onSuccess: () => {
                    this.$toast.success('Pembiayaan berhasil Ditambahkan')
                    this.form.reset();
                    this.$refs.editModal.toggleModal();
                },
            }))
        },
        search() {
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
        jumlah_angsuran() {
            let frekuensi = this.formCreate.frekuensi_angsuran ? parseInt(this.formCreate.frekuensi_angsuran) : 1
            return Math.ceil(this.total_pembiayaan / frekuensi)
        }
    },
    mounted() {
    }

});
</script>
