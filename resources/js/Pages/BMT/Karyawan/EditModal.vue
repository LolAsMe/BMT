<template>
    <v-modal ref="editModal">
        <template #title> Edit Simpanan {{ pembiayaan.anggota.nama }}</template>
        {{ pembiayaan }}
        {{ this.form.alamat == pembiayaan.anggota.alamat }}
        <form @submit.prevent="edit">
            <v-input :name="'form.jenis_pembiayaan_id'" v-model="form.jenis_pembiayaan_id"></v-input>
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
                jenis_pembiayaan_id: "",
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
            pembiayaan: null,
        };
    },
    methods: {
        // jenis_pembiayaan: "",
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
        show(pembiayaan) {
            pembiayaan.anggota.tanggal_lahir = pembiayaan.anggota.tanggal_lahir.substring(0,10);
            this.pembiayaan=pembiayaan;
            this.form.jenis_pembiayaan_id = pembiayaan.jenis_pembiayaan_id;
            this.form.nama_anggota = pembiayaan.anggota.nama;
            this.form.no_ktp = pembiayaan.anggota.no_ktp;
            this.form.jenis_kelamin = pembiayaan.anggota.jenis_kelamin;
            this.form.alamat = pembiayaan.anggota.alamat;
            this.form.telepon = pembiayaan.anggota.telepon;
            this.form.pekerjaan = pembiayaan.anggota.pekerjaan;
            this.form.tempat_lahir = pembiayaan.anggota.tempat_lahir;
            this.form.tanggal_lahir = pembiayaan.anggota.tanggal_lahir;
            this.form.keterangan = pembiayaan.keterangan;
            this.form.nama_ibu_kandung = pembiayaan.anggota.nama_ibu_kandung;
            this.$refs.editModal.toggleModal();
        },
        edit() {
            this.form.jenis_pembiayaan_id == this.pembiayaan.jenis_pembiayaan_id ? delete this.form.jenis_pembiayaan_id : null;
            this.form.nama_anggota == this.pembiayaan.anggota.nama ? delete this.form.nama_anggota : null;
            this.form.no_ktp == this.pembiayaan.anggota.no_ktp ? delete this.form.no_ktp : null;
            this.form.jenis_kelamin == this.pembiayaan.anggota.jenis_kelamin ? delete this.form.jenis_kelamin : null;
            this.form.alamat == this.pembiayaan.anggota.alamat ? delete this.form.alamat : null;
            this.form.telepon == this.pembiayaan.anggota.telepon ? delete this.form.telepon : null;
            this.form.pekerjaan == this.pembiayaan.anggota.pekerjaan ? delete this.form.pekerjaan : null;
            this.form.tempat_lahir == this.pembiayaan.anggota.tempat_lahir ? delete this.form.tempat_lahir : null;
            this.form.tanggal_lahir == this.pembiayaan.anggota.tanggal_lahir ? delete this.form.tanggal_lahir : null;
            this.form.keterangan == this.pembiayaan.keterangan ? delete this.form.keterangan : null;
            this.form.nama_ibu_kandung == this.pembiayaan.anggota.nama_ibu_kandung ? delete this.form.nama_ibu_kandung : null;
            this.form.put(route("pembiayaan.update", this.pembiayaan.id), {
                preserveScroll: true,
                onSuccess: () => {
                    this.form.reset();
                },
            });
            this.$refs.editModal.toggleModal();
        },
    },
});
</script>
