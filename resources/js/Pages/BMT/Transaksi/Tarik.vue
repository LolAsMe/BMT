<template>
    <div class="flex">
        Tarik
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
        };
    },
    methods: {
<<<<<<< HEAD
        filterAnggota() {
            this.$inertia.reload({ data: { nama: this.nama, alamat: this.alamat, kode: this.kode }, only: ['simpanans','pembiayaans'] })
        },
        applySimpanan(simpanan) {
            this.nama = simpanan.anggota.nama
            this.alamat = simpanan.anggota.alamat
            this.kode = simpanan.kode
            this.jumlah_simpanan = this.toRupiah(simpanan.jumlah)
            this.jenis_simpanan = simpanan.jenis_simpanan.nama
            this.jumlah_tarik = null
            this.$inertia.reload({ data: { nama: this.nama, alamat: this.alamat, kode: this.kode }, only: ['simpanans','pembiayaans'] })
            this.oneSimpanan = simpanan
        },
        reset() {
            this.nama = null,
                this.kode = null,
                this.alamat = null
            this.$inertia.reload({ data: { nama: this.nama, alamat: this.alamat, kode: this.kode }, only: ['simpanans','pembiayaans'] })

        },
        resetSimpanan() {
            this.nama = null,
                this.kode = null,
                this.alamat = null
            this.oneSimpanan = null,
                this.jumlah_simpanan = null,
                this.jenis_simpanan = null
            this.$inertia.reload({ data: { nama: this.nama, alamat: this.alamat, kode: this.kode }, only: ['simpanans','pembiayaans'] })
        },
        toRupiah(jumlah) {
            return "IDR " + jumlah.toString().replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g, "$1\.")
        },
        async tarik() {
            let form = this.$inertia.form({
                id: this.oneSimpanan.id,
                jumlah: this.jumlah_tarik,
                keterangan: this.keterangan,
            })
            await form.post(route("tarik", this.oneSimpanan.id), {
                preserveScroll: true,
                onSuccess: () => {
                    this.$inertia.reload({ data: { nama: this.nama, alamat: this.alamat, kode: this.kode }, only: ['simpanans','pembiayaans'] })
                    this.applySimpanan(this.$inertia.page.props.simpanans[0])
                    this.jumlah_tarik = null
                    console.log(this.$inertia.page.props.simpanans[0])

                },
            });

        },
    },
    computed: {
        total() {
            return this.oneSimpanan.jumlah - this.jumlah_tarik;
        },
        totalIDR() {
            return this.toRupiah(this.total)
        }
=======
>>>>>>> parent of b12393e (Penarikan)
    },
    mounted() {

    }
});
</script>
