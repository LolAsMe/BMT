<template>
    <div class="flex flex-row gap-4 p-4">
        <div class="w-1/4">
            <h3 class="font-bold border-b-2 mb-2 uppercase">{{ oneSimpanan ? 'Setor Simpanan' : 'Cari Simpanan' }}</h3>
            <form @submit.prevent="setor" :key="render">
                <div class="relative z-0 w-full mb-6 group">
                    <input type="text" name="floating_nama" id="floating_nama"
                        class="disabled:border-green-300 disabled:text-green-600 block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required v-model="nama" @input="filterAnggota" :disabled="oneSimpanan" />
                    <label for="floating_nama"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama</label>
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <input type="text" name="floating_alamat" id="floating_alamat"
                        class="disabled:border-green-300 disabled:text-green-600 block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required v-model="alamat" @input="filterAnggota" :disabled="oneSimpanan" />
                    <label for="floating_alamat"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Alamat</label>
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <input type="text" name="floating_rekening" id="floating_rekening"
                        class=" disabled:border-green-300 disabled:text-green-600 block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required v-model="kode" @input="filterAnggota" :disabled="oneSimpanan" />
                    <label for="floating_rekening"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Rekening</label>
                </div>
                <div class="relative z-0 w-full mb-6 group" v-if="oneSimpanan">
                    <input type="text" name="floating_jenis_simpanan" id="floating_jenis_simpanan"
                        class="disabled:border-green-300 disabled:text-green-600 block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required v-model="jenis_simpanan" :disabled="oneSimpanan" />
                    <label for="floating_jenis_simpanan"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Jenis
                        Simpanan</label>
                </div>
                <div class="relative z-0 w-full group mb-6" v-if="oneSimpanan">
                    <input type="text" name="floating_jumlah_simpanan" id="floating_jumlah_simpanan"
                        class="disabled:border-green-300 disabled:text-green-600 block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required v-model="jumlah_simpanan" :disabled="oneSimpanan" />
                    <label for="floating_jumlah_simpanan"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Jumlah
                        Simpanan</label>
                </div>
                <span class="relative float-right text-blue-400 cursor-pointer z-10" @click="resetSimpanan"
                    v-if="oneSimpanan">
                    reset
                </span>
                <div class="relative z-0 w-full group mb-6" v-if="oneSimpanan">

                    <input
                        class="disabled:border-green-300 disabled:text-green-600 block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        type="text" v-model="keterangan">
                    <label for="floating_keterangan"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Keterangan</label>
                </div>
                <div class="relative z-0 w-full group mb-6" v-if="oneSimpanan">

                    <input
                        class="disabled:border-green-300 disabled:text-green-600 block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        type="number" v-model="jumlah_setor">
                    <label for="floating_jumlah_setor"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Jumlah
                        Setoran</label>
                </div>
                <div class="text-sm text-gray-500 my-2" v-if="oneSimpanan">

                    {{ jumlah_setor ? toRupiah(jumlah_setor) : '-' }}
                </div>
                <div class="relative z-0 w-full mb-6 group" v-if="oneSimpanan">
                    <input type="text" name="floating_total" id="floating_total"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required disabled v-model="totalIDR" />
                    <label for="floating_total"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Total</label>
                </div>
                <button v-if="oneSimpanan" type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">SETOR</button>
            </form>
            <button v-if="!oneSimpanan" @click="reset"
                class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">RESET</button>
        </div>
        <div class="w-3/4" v-if="oneSimpanan">
            <table class="min-w-full divide-y divide-gray-200 mt-5">
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
                        <th scope="col" class="
                    px-6
                    py-3
                    text-left text-xs
                    font-medium
                    text-gray-500
                    uppercase
                    tracking-wider
                    ">
                            Keterangan
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr v-for="(detail, index) in oneSimpanan.detail" :key="detail.id"
                        :class="index % 2 == 0 ? 'bg-white' : 'bg-gray-50'">
                        <td class="text-center">{{ index + 1 }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="ml-0">
                                    <div class="text-sm font-medium text-gray-900">
                                        Kode :{{ detail.kode }} <span
                                            class="bg-green-100 rounded-full border-2 border-green-100"> </span>
                                    </div>
                                    <div class="text-sm text-black">
                                        Tanggal :{{ detail.tanggal_transaksi.substring(0, 10) }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="ml-0">
                                    <div class="text-sm font-medium text-gray-900">
                                        Debit :{{ "IDR " +
                                            detail.debit.toString().replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g, "$1\.") }}
                                    </div>
                                    <div class="text-sm text-black text">
                                        Kredit :{{ "IDR " +
                                            detail.kredit.toString().replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g, "$1\.") }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="ml-0">
                                    <div class="text-sm font-medium text-gray-900">
                                        Saldo Awal :{{ "IDR " +
                                            detail.saldo_awal.toString().replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g, "$1\.")
                                        }}
                                    </div>
                                    <div class="text-sm text-black">
                                        Saldo Akhir :{{ "IDR " +
                                            detail.saldo_akhir.toString().replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g,
                                                "$1\.") }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="ml-0">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ detail.keterangan }}
                                    </div>
                                    <div class="text-sm text-black">
                                        {{ detail.karyawan_id }}
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="w-2/3" v-if="!oneSimpanan">
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
                    <tr class="hover:bg-slate-100 cursor-pointer" v-for="(simpanan, index) in $inertia.page.props.simpanans"
                        :key="simpanan.id" @dblclick="applySimpanan(simpanan)">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="ml-0">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ simpanan.anggota ? simpanan.anggota.nama : '-' }} <span
                                            class="bg-green-100 rounded-full border-2 border-green-100"> {{
                                                simpanan.anggota ? simpanan.anggota.kode : '-' }} </span>
                                    </div>
                                    <div class="text-sm text-black">
                                        {{ simpanan.anggota ? simpanan.anggota.alamat : '-' }}
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
                                        Simpanan {{ simpanan.anggota ? simpanan.jenis_simpanan.nama : '-' }}
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
        </div>
    </div>
</template>

<script>
import { defineComponent } from "vue";

export default defineComponent({
    components: {
    },
    props: {
    },
    data() {
        return {
            oneSimpanan: null,
            nama: null,
            alamat: null,
            kode: null,
            render: 0,
            jumlah_setor: null,
            jumlah_simpanan: null,
            jenis_simpanan: null,
            keterangan:null

        };
    },
    methods: {
        filterAnggota() {
            this.$inertia.reload({ data: { nama: this.nama, alamat: this.alamat, kode: this.kode }, only: ['simpanans'] })
        },
        applySimpanan(simpanan) {
            this.nama = simpanan.anggota.nama
            this.alamat = simpanan.anggota.alamat
            this.kode = simpanan.kode
            this.jumlah_simpanan = this.toRupiah(simpanan.jumlah)
            this.jenis_simpanan = simpanan.jenis_simpanan.nama
            this.jumlah_setor = null
            this.$inertia.reload({ data: { nama: this.nama, alamat: this.alamat, kode: this.kode }, only: ['simpanans'] })
            this.oneSimpanan = simpanan
        },
        reset() {
            this.nama = null,
                this.kode = null,
                this.alamat = null
            this.$inertia.reload({ data: { nama: this.nama, alamat: this.alamat, kode: this.kode }, only: ['simpanans'] })

        },
        resetSimpanan() {
            this.nama = null,
                this.kode = null,
                this.alamat = null
            this.oneSimpanan = null,
                this.jumlah_simpanan = null,
                this.jenis_simpanan = null
            this.$inertia.reload({ data: { nama: this.nama, alamat: this.alamat, kode: this.kode }, only: ['simpanans'] })
        },
        toRupiah(jumlah) {
            return "IDR " + jumlah.toString().replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g, "$1\.")
        },
        async setor() {
            let form = this.$inertia.form({
                id: this.oneSimpanan.id,
                jumlah: this.jumlah_setor,
                keterangan: this.keterangan,
            })
            await form.post(route("setor", this.oneSimpanan.id), {
                preserveScroll: true,
                onSuccess: () => {
                    this.$inertia.reload({ data: { nama: this.nama, alamat: this.alamat, kode: this.kode }, only: ['simpanans'] })
                    this.applySimpanan(this.$inertia.page.props.simpanans[0])
                    this.jumlah_setor = null
                    console.log(this.$inertia.page.props.simpanans[0])

                },
            });

        },
    },
    computed: {
        total() {
            return this.oneSimpanan.jumlah + this.jumlah_setor;
        },
        totalIDR() {
            return this.toRupiah(this.total)
        }
    },
    mounted() {

    }
});
</script>
