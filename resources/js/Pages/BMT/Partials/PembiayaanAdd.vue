<template>
  <div>
    <v-button
      class="block mr-4 sm:mr-10 ml-auto mt-4"
      v-on:click="$refs.addModal.toggleModal()"
      >Add</v-button
    >
    <v-modal ref="addModal">
      <template #title> Add Pembiayaan </template>
      <form @submit.prevent="createPembiayaan">
        <v-input :name="'kode'" v-model="form.kode"></v-input>
        <v-input :name="'nomor'" v-model="form.nomor"></v-input>
        <v-input
          :name="'jenis_pembiayaan_id'"
          v-model="form.jenis_pembiayaan_id"
        ></v-input>
        <v-input :name="'simpanan_id'" v-model="form.simpanan_id"></v-input>
        <v-input :name="'karyawan_id'" v-model="form.karyawan_id"></v-input>
        <v-input
          :type="'date'"
          :name="'tanggal_pinjam'"
          v-model="form.tanggal_pinjam"
        ></v-input>
        <v-input :name="'jumlah'" v-model="form.jumlah"></v-input>
        <v-input
          :type="'date'"
          :name="'tanggal_jatuh_tempo'"
          v-model="form.tanggal_jatuh_tempo"
        ></v-input>
        <v-input :name="'pokok'" v-model="form.pokok"></v-input>
        <v-input :name="'jasa'" v-model="form.jasa"></v-input>
        <v-input
          :name="'potongan_pembiayaan'"
          v-model="form.potongan_pembiayaan"
        ></v-input>
        <v-input
          :name="'total_pembiayaan'"
          v-model="form.total_pembiayaan"
        ></v-input>
        <v-input
          :name="'frekuensi_angsuran'"
          v-model="form.frekuensi_angsuran"
        ></v-input>
        <v-input
          :name="'jumlah_angsuran'"
          v-model="form.jumlah_angsuran"
        ></v-input>
        <v-input
          :name="'angsuran_diterima'"
          v-model="form.angsuran_diterima"
        ></v-input>
        <v-input :name="'keterangan'" v-model="form.keterangan"></v-input>
        <v-input :name="'status'" v-model="form.status"></v-input>
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
        kode: "",
        nomor: "",
        jenis_pembiayaan_id: "",
        simpanan_id: "",
        karyawan_id: "",
        tanggal_pinjam: "",
        jumlah: "",
        tanggal_jatuh_tempo: "",
        pokok: "",
        jasa: "",
        potongan_pembiayaan: "",
        total_pembiayaan: "",
        frekuensi_angsuran: "",
        jumlah_angsuran: "",
        angsuran_diterima: "",
        keterangan: "",
        status: "",
      }),
    };
  },
  methods: {
    async createPembiayaan() {
      await this.form.post(route("pembiayaan.store"), {
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
