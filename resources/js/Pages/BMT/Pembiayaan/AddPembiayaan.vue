<template>
    <div class="flex flex-col gap-4 p-4">

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
            onePembiayaan: null,
            nama: null,
            alamat: null,
            kode: null,
            keterangan: null

        };
    },
    methods: {
        filterAnggota() {
            this.$inertia.reload({ data: { nama: this.nama, alamat: this.alamat, kode: this.kode }, only: ['simpanans','pembiayaans'] })
        },
        applyPembiayaan(pembiayaan) {
            console.log('appy')
            this.nama = pembiayaan.anggota.nama
            this.alamat = pembiayaan.anggota.alamat
            this.kode = pembiayaan.kode
            this.keterangan = null
            this.$inertia.reload({ data: { nama: this.nama, alamat: this.alamat, kode: this.kode }, only: ['simpanans','pembiayaans'] })
            this.onePembiayaan = pembiayaan
        },
        reset() {
            this.nama = null,
                this.kode = null,
                this.alamat = null
            this.$inertia.reload({ data: { nama: this.nama, alamat: this.alamat, kode: this.kode }, only: ['simpanans','pembiayaans'] })

        },
        resetPembiayaan() {
            this.nama = null,
                this.kode = null,
                this.alamat = null
            this.onePembiayaan = null,
                this.jumlah_angsuran = null,
                this.jenis_pembiayaan = null
            this.$inertia.reload({ data: { nama: this.nama, alamat: this.alamat, kode: this.kode }, only: ['simpanans','pembiayaans'] })
        },
        toRupiah(jumlah) {
            return "IDR " + jumlah.toString().replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g, "$1\.")
        },
        async angsur() {
            let form = this.$inertia.form({
            })
            await form.post(route("angsur", this.onePembiayaan.id), {
                preserveScroll: true,
                onSuccess: () => {
                    this.$inertia.reload({ data: { nama: this.nama, alamat: this.alamat, kode: this.kode }, only: ['simpanans','pembiayaans'] })
                    this.applyPembiayaan(this.$inertia.page.props.pembiayaans[0])
                    this.jumlah_angsur = null
                    console.log(this.$inertia.page.props.pembiayaans[0])

                },
            });

        },
    },
    computed: {
        total() {
            return this.onePembiayaan.jumlah - this.jumlah_angsur;
        },
        totalIDR() {
            return this.toRupiah(this.total)
        }
    },
    mounted() {

    }
});
</script>
