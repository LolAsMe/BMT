<template>
    <v-modal ref="editModal">
        <template #title> Edit Simpanan {{ simpanan.anggota.nama }}</template>
        <form @submit.prevent="edit">
            <v-input :name="'form.jenis_simpanan_id'" v-model="form.jenis_simpanan_id"></v-input>
            <v-input :name="'form.nama_anggota'" v-model="form.nama_anggota"></v-input>
            <v-input :name="'form.no_ktp'" v-model="form.no_ktp"></v-input>
            <v-input :name="'form.jenis_kelamin'" v-model="form.jenis_kelamin"></v-input>
            <v-input :name="'form.alamat'" v-model="form.alamat"></v-input>
            <v-input :name="'form.telepon'" v-model="form.telepon"></v-input>
            <v-input :name="'form.pekerjaan'" v-model="form.pekerjaan"></v-input>
            <v-input :name="'form.tempat_lahir'" v-model="form.tempat_lahir"></v-input>
            <v-input :type="'date'"  :name="'form.tanggal_lahir'" :modelValue="form.tanggal_lahir" v-model="form.tanggal_lahir"></v-input>
            <v-input :name="'form.keterangan'" v-model="form.keterangan"></v-input>
            <v-input :name="'form.nama_ibu_kandung'" v-model="form.nama_ibu_kandung"></v-input>
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
    </v-modal>
</template>

<script>
import { defineComponent } from "vue";
import VButton from "@/Components/Button.vue";
import VInput from "@/Components/Input.vue";
import VModal from "@/Components/Modal.vue";

export default defineComponent({
    components: {
        VModal,
        VInput,
        VButton,
    },
    data() {
        return {
            form: this.$inertia.form({
                jenis_simpanan_id: "",
                nama_anggota: "",
                no_ktp: "",
                jenis_kelamin: "",
                alamat: "",
                telepon: "",
                pekerjaan: "",
                tempat_lahir: "",
                tanggal_lahir: "",
                keterangan: "",
                nama_ibu_kandung: ""
            }

            ),
            simpanan: null,
        };
    },
    methods: {
        // jenis_simpanan: "",
        //         nama_anggota: "",
        //         no_ktp: "",
        //         jenis_kelamin: "",
        //         alamat: "",
        //         telepon: "",
        //         pekerjaan: "",
        //         tempat_lahir: "",
        //         tanggal_lahir: "",
        //         keterangan: "",
        //         nama_ibu_kandung: ""
        show(simpanan) {
            simpanan.anggota.tanggal_lahir = simpanan.anggota.tanggal_lahir.substring(0,10);
            this.simpanan=simpanan;
            this.form.jenis_simpanan_id = simpanan.jenis_simpanan_id;
            this.form.nama_anggota = simpanan.anggota.nama;
            this.form.no_ktp = simpanan.anggota.no_ktp;
            this.form.jenis_kelamin = simpanan.anggota.jenis_kelamin;
            this.form.alamat = simpanan.anggota.alamat;
            this.form.telepon = simpanan.anggota.telepon;
            this.form.pekerjaan = simpanan.anggota.pekerjaan;
            this.form.tempat_lahir = simpanan.anggota.tempat_lahir;
            this.form.tanggal_lahir = simpanan.anggota.tanggal_lahir;
            this.form.keterangan = simpanan.keterangan;
            this.form.nama_ibu_kandung = simpanan.anggota.nama_ibu_kandung;
            this.$refs.editModal.toggleModal();
        },
        edit() {
            this.form.jenis_simpanan_id == this.simpanan.jenis_simpanan_id ? delete this.form.jenis_simpanan_id : null;
            this.form.nama_anggota == this.simpanan.anggota.nama ? delete this.form.nama_anggota : null;
            this.form.no_ktp == this.simpanan.anggota.no_ktp ? delete this.form.no_ktp : null;
            this.form.jenis_kelamin == this.simpanan.anggota.jenis_kelamin ? delete this.form.jenis_kelamin : null;
            this.form.alamat == this.simpanan.anggota.alamat ? delete this.form.alamat : null;
            this.form.telepon == this.simpanan.anggota.telepon ? delete this.form.telepon : null;
            this.form.pekerjaan == this.simpanan.anggota.pekerjaan ? delete this.form.pekerjaan : null;
            this.form.tempat_lahir == this.simpanan.anggota.tempat_lahir ? delete this.form.tempat_lahir : null;
            this.form.tanggal_lahir == this.simpanan.anggota.tanggal_lahir ? delete this.form.tanggal_lahir : null;
            this.form.keterangan == this.simpanan.keterangan ? delete this.form.keterangan : null;
            this.form.nama_ibu_kandung == this.simpanan.anggota.nama_ibu_kandung ? delete this.form.nama_ibu_kandung : null;
            this.form.put(route("simpanan.update", this.simpanan.id), {
                preserveScroll: true,
                onSuccess: () => {
                    this.$toast.success('Simpanan Berhasil DiEdit');
                    this.form.reset();
                },
            });
            this.$refs.editModal.toggleModal();
        },
    },
});
</script>
