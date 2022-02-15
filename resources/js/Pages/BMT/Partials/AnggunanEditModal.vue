<template>
  <v-modal ref="editModal">
    <template #title> Edit Anggunan </template>
    <form @submit.prevent="edit">
      <v-input :name="'pembiayaan_id'" v-model="form.pembiayaan_id"></v-input>
      <v-input :name="'kode'" v-model="form.kode"></v-input>
      <v-input :name="'jenis_objek'" v-model="form.jenis_objek"></v-input>
      <v-input :name="'nomor_polisi'" v-model="form.nomor_polisi"></v-input>
      <v-input
        :type="'date'"
        :name="'tanggal_masuk'"
        v-model="form.tanggal_masuk"
      ></v-input>
      <v-input
        :type="'date'"
        :name="'tanggal_ambil'"
        v-model="form.tanggal_ambil"
      ></v-input>
      <v-input
        :name="'tahun_pembuatan'"
        v-model="form.tahun_pembuatan"
      ></v-input>
      <v-input :name="'luas_objek'" v-model="form.luas_objek"></v-input>
      <v-input :name="'letak_objek'" v-model="form.letak_objek"></v-input>
      <v-input :name="'nama_pemilik'" v-model="form.nama_pemilik"></v-input>
      <v-input :name="'alamat_pemilik'" v-model="form.alamat_pemilik"></v-input>
      <v-input :name="'karyawan_id'" v-model="form.karyawan_id"></v-input>
      <button
        type="submit"
        class="
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
        "
      >
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
        pembiayaan_id: "",
        kode: "",
        jenis_objek: "",
        nomor_polisi: "",
        tanggal_masuk: "",
        tanggal_ambil: "",
        tahun_pembuatan: "",
        luas_objek: "",
        letak_objek: "",
        nama_pemilik: "",
        alamat_pemilik: "",
        karyawan_id: "",
      }),
      anggunan: null,
    };
  },
  methods: {
    show(anggunan) {
      this.anggunan = anggunan;
      this.form.pembiayaan_id = anggunan.pembiayaan_id;
      this.form.kode = anggunan.kode;
      this.form.jenis_objek = anggunan.jenis_objek;
      this.form.nomor_polisi = anggunan.nomor_polisi;
      this.form.tanggal_masuk = anggunan.tanggal_masuk;
      this.form.tanggal_ambil = anggunan.tanggal_ambil;
      this.form.tahun_pembuatan = anggunan.tahun_pembuatan;
      this.form.luas_objek = anggunan.luas_objek;
      this.form.letak_objek = anggunan.letak_objek;
      this.form.nama_pemilik = anggunan.nama_pemilik;
      this.form.alamat_pemilik = anggunan.alamat_pemilik;
      this.form.karyawan_id = anggunan.karyawan_id;
      this.$refs.editModal.toggleModal();
    },
    edit() {
      this.form.put(route("anggunan.update", this.anggunan.id), {
        preserveScroll: true,
        onSuccess: () => {
          this.form.reset();
          this.$refs.editModal.toggleModal();
        },
      });
    },
  },
});
</script>
