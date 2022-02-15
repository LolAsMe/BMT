<template>
  <v-modal ref="editModal">
    <template #title> Edit Pembiayaan Detail </template>
    <form @submit.prevent="edit">
      <v-input :name="'karyawan_id'" v-model="form.karyawan_id"></v-input>
      <v-input :name="'angsuran_ke'" v-model="form.angsuran_ke"></v-input>
      <v-input :name="'jumlah'" v-model="form.jumlah"></v-input>
      <v-input
        :name="'akumulasi_angsuran'"
        v-model="form.akumulasi_angsuran"
      ></v-input>
      <v-input
        :name="'total_tanggungan'"
        v-model="form.total_tanggungan"
      ></v-input>
      <v-input :name="'keterangan'" v-model="form.keterangan"></v-input>
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
        karyawan_id: "",
        angsuran_ke: "",
        jumlah: "",
        akumulasi_angsuran: "",
        total_tanggungan: "",
        keterangan: "",
      }),
      karyawan: null,
    };
  },
  props: {
    pembiayaan_id: {
      type: Number,
      default: "0",
    },
  },
  methods: {
    show(detail) {
      this.detail = detail;
      this.form.karyawan_id = detail.karyawan_id;
      this.form.angsuran_ke = detail.angsuran_ke;
      this.form.jumlah = detail.jumlah;
      this.form.akumulasi_angsuran = detail.akumulasi_angsuran;
      this.form.total_tanggungan = detail.total_tanggungan;
      this.form.keterangan = detail.keterangan;
      this.$refs.editModal.toggleModal();
    },
    edit() {
      this.form.put(route("pembiayaan.detail.update", this.detail.id), {
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
