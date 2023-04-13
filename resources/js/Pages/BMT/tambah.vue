<template>
    <app-layout title="Tambah">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Tambah
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
                            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Tambah</span>

                        </div>
                    </li>
                </ol>
            </nav>
            </template>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 block m-5 bg-white rounded-3xl drop-shadow-xl p-6 h-4/5">
        <div class="font-bold text-lg mb-5"> Tambah FORM </div>
        <form @submit.prevent="createAnggota">
            <v-input :name="'kode'" v-model="form.kode"></v-input>
            <v-input :name="'nama'" v-model="form.nama"></v-input>
            <v-input :name="'alamat'" v-model="form.alamat"></v-input>
            <v-input :name="'telepon'" v-model="form.telepon"></v-input>
            <v-input :name="'pekerjaan'" v-model="form.pekerjaan"></v-input>
            <v-input :name="'tempat_lahir'" v-model="form.tempat_lahir"></v-input>
            <v-input :type="'date'" :name="'form.tanggal_lahir'" :modelValue="form.tanggal_lahir"
                v-model="form.tanggal_lahir"></v-input>
            <v-input :name="'nama_ibu_kandung'" v-model="form.nama_ibu_kandung"></v-input>
            <label for="jenis_kelamin">Jenis Kelamin : </label>
            <select id="jenis_kelamin" v-model="form.jenis_kelamin" class="mb-4">
                <option selected value="pria">Pria</option>
                <option value="wanita">Wanita</option>
            </select>
            <v-input :name="'keterangan'" v-model="form.keterangan"></v-input>
            <button type="submit" class="
                    text-white
                    bg-blue-700
                    hover:bg-blue-800
                    focus:ring-4 focus:ring-blue-300
                    font-medium
                    rounded-lg
                    text-sm
                    w-full
                    sm:w-auto
                    px-5
                    py-2.5
                    text-center
                    dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800
                  ">
                Submit
            </button>
        </form>
        </div>
    </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import VButton from "@/Components/Button.vue";
import VInput from "@/Components/Input.vue";
import JetNavLink from '@/Jetstream/NavLink.vue'
import VModal from "@/Components/Modal.vue";

export default defineComponent({
    components: {
        VModal,
        VInput,
        AppLayout, JetNavLink,
        VButton,
    },
    data() {
        return {
            form: this.$inertia.form({
                kode: "",
                nama: "",
                alamat: "",
                jenis_kelamin: "pria",
                telepon: "",
                pekerjaan: "",
                tempat_lahir: "",
                tanggal_lahir: "",
                nama_ibu_kandung: "",
                pekerjaan: "",
                keterangan: "",
            }),
        };
    },
    methods: {
        async createAnggota() {
            console.log('create anggota')
            console.log(route("anggota.store"))
            await this.form.post(route("anggota.store"), {
                preserveScroll: true,
                onSuccess: () => {
                    this.form.reset();
                    this.$refs.addModal.toggleModal();
                },
            });
        },
    },
});
</script>
