<template>
    <app-layout title="Dashboard">


        <div class="py-10">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                    {{ transaksiHarian }}
                    tes
                    <div class="block">
                        <button
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                            v-if="transaksiHarian.length == 0" @click="makeHarian"> Start The Day</button>
                        <div>
                            <Link :href="route('anggota.index')">Anggota</Link>
                        </div>
                        <div>
                            <Link :href="route('anggunan.index')">Anggunan</Link>
                        </div>
                        <div>
                            <Link :href="route('cetak.index')">Cetak</Link>
                        </div>
                        <div>
                            <Link :href="route('group.index')">Group</Link>
                        </div>
                        <div>
                            <Link :href="route('jabatan.index')">Jabatan</Link>
                        </div>
                        <div>
                            <Link :href="route('jenis-pembiayaan.index')">Jenis pembiayaan</Link>
                        </div>
                        <div>
                            <Link :href="route('jenis-simpanan.index')">Jenis Simpanan</Link>
                        </div>
                        <div>
                            <Link :href="route('karyawan.index')">Karyawan</Link>
                        </div>
                        <div>
                            <Link :href="route('nisbah.index')">Nisbah</Link>
                        </div>
                        <div>
                            <Link :href="route('pembiayaan.index')">Pembiayaan</Link>
                        </div>
                        <div>
                            <Link :href="route('simpanan.index')">Simpanan</Link>
                        </div>
                        <!-- <div><Link :href="route('transaksi.index')">Transaksi</Link></div> -->
                        <!-- <div><Link :href="route('user.index')">User</Link></div> -->
                    </div>
                    <div>List Transaksi keuangan</div>
                    <div class="simpanan">setoran simnpanan Penarikan</div>
                    <div class="ansuran">Pinjaman Angsurn</div>
                    <div class="pemasukan">Pemasukan Pengeluaran</div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import Welcome from "@/Jetstream/Welcome.vue";
const axios = require('axios');
import { Link } from "@inertiajs/inertia-vue3";
export default defineComponent({
    components: {
        AppLayout,
        Welcome,
        Link,
    },
    props: {
        transaksiHarian: Object

    },
    data() {
        return {
            form: this.$inertia.form(),
        }
    },
    methods: {
        async makeHarian() {
            console.log('test')
            await this.form.post("harian");
        }
    }
});
</script>
