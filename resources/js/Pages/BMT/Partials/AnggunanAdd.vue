<template>
  <div>
    <v-button
      class="block mr-4 sm:mr-10 ml-auto mt-4"
      v-on:click="$refs.addModal.toggleModal()"
      >Add</v-button
    >
    <v-modal ref="addModal">
      <template #title> Add Anggunan </template>
      <form @submit.prevent="createAnggunan">
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
        <v-input
          :name="'alamat_pemilik'"
          v-model="form.alamat_pemilik"
        ></v-input>
        <v-input :name="'karyawan_id'" v-model="form.karyawan_id"></v-input
        ><button
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
  </div>
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
    };
  },
  methods: {
    async createAnggunan() {
      await this.form.post(route("anggunan.store"), {
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
