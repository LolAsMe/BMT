<template>
    <app-layout title="Setor">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Setor
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    {{ kas }}
                    {{ brankas }}
                    <div>
                        Kas Tambah/kurang
                        Keterangan<input type="text" v-model="formTambah.keterangan">
                        jumlah<input type="number" v-model="formTambah.jumlah">
                        <!-- <input type="checkbox" id="checkbox" v-model="formTambah.checked" /> -->
                        <!-- <label for="checkbox">Masuk Laba?</label> -->
                        <button @click="tambahKas">submit</button>
                    </div>
                    <div>
                        Kas & Brankas
                        <!-- <form @submit.prevent="keBrankas">
                            Kas Ke Brankas
                            <Input :name="'jumlah'" v-model="form4.jumlah">Kas Brankas</Input>
                            <button type="submit">Submit</button>
                        </form> -->
                        <form @submit.prevent="keBrankas">
                            <v-input :name="'jumlah'" v-model="form4.jumlah"></v-input>
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
                        <form @submit.prevent="dariBrankas">
                            <v-input :name="'jumlah'" v-model="form5.jumlah"></v-input>
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
                        <!-- <form @submit.prevent="dariBrankas">
                            Ambil Brankas ke Kas
                            <Input v-model="form5.jumlah">Kas Brankas</Input>
                            <button type="submit">Submit</button>
                        </form> -->
                    </div>
                    <div>
                        Setor
                    </div>
                    <div>
                        <form @submit.prevent="submit">
                            <v-input :name="'id'" v-model="form.id"></v-input>
                            <v-input :name="'jumlah'" v-model="form.jumlah"></v-input>
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
                    <div>
                        Tarik
                    </div>
                    <div>
                        <form @submit.prevent="tarik">
                            <v-input :name="'id'" v-model="form2.id"></v-input>
                            <v-input :name="'jumlah'" v-model="form2.jumlah"></v-input>
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
                    <div>
                        <div>
                            {{ angsuran }}
                        </div>
                        <div>
                            <button @click="tambahPembiayaan">tambah anngsuran</button>
                        </div>
                        <div>
                            <button @click="angsur"> angsur</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import Welcome from "@/Jetstream/Welcome.vue";
import { Link } from "@inertiajs/inertia-vue3";
import VButton from "@/Components/Button.vue";
import VInput from "@/Components/Input.vue";
import VModal from "@/Components/Modal.vue";
import { ok } from "assert";
export default defineComponent({
    components: {
        AppLayout,
        Welcome,
        VModal,
        VInput,
        VButton,
        Link,
    },


    props: {
        angsuran: Object,
        kas: Object,
        brankas: Object,
    },
    data() {
        return {
            form: this.$inertia.form({
                id: "",
                jumlah: "",
            }),
            form2: this.$inertia.form({
                id: "",
                jumlah: "",
            }),
            form3: this.$inertia.form(),
            form4: this.$inertia.form({ jumlah: 0 }),
            form5: this.$inertia.form({ jumlah: 0 }),
            formTambah: this.$inertia.form({
                keterangan: null,
                checked: true,
                jumlah: 0
            }),
            anggota: null,
        };
    },
    methods: {
        submit() {
            this.form.post(route("setor.store", this.form.id), {
                preserveScroll: true,
                onSuccess: () => {
                    this.form.reset();
                },
            });
        },
        tarik() {
            this.form2.post(route("tarik", this.form2.id), {
                preserveScroll: true,
                onSuccess: () => {
                    this.form2.reset();
                },
            });
        },
        tambahPembiayaan() {
            this.form3.post(route("pembiayaan.store", {
                'kode': 'Pembiayaan5',
                'nomor': '2135',
                'jenis_pembiayaan_id': '1',
                'simpanan_id': '1',
                'karyawan_id': '8',
                'jumlah': 20000000,
                'tanggal_pinjam': '4/4/23',
                'tanggal_jatuh_tempo': '4/4/25',
                'pokok': '5000000',
                'jasa': '5000000',
                'potongan_pembiayaan': 0,
                'total_pembiayaan': '30000000',
                'frekuensi_angsuran': '3',
                'jumlah_angsuran': 10000000,
                'angsuran_diterima': 0,
                'keterangan': 'test2',
                'status': 'ongoing',
            }), {
                preserveScroll: true,
                onSuccess: () => {
                    this.form2.reset();
                },
            });
        },
        angsur() {
            this.form3.post(route("angsur", this.angsuran.id), {
                preserveScroll: true,
                onSuccess: () => {
                    this.form3.reset();
                },
            });
        },

        keBrankas() {
            console.log('test')
            this.form4.post(route("brankas.setor"), {
                preserveScroll: true,
                onSuccess: () => {
                    this.form4.reset();
                },
            });
        },
        dariBrankas() {
            this.form5.post(route("brankas.tarik"), {
                preserveScroll: true,
                onSuccess: () => {
                    this.form5.reset();
                },
            });
        }
        , tambahKas() {
            this.formTambah.post(route('kas.tambah'), {
                preserveScroll: true,
                onSuccess: () => {
                    this.formTambah.reset();
                },
            });
        }
    },
});
</script>
