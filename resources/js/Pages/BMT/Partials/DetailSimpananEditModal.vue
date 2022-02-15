<template>
  <v-modal ref="editModal">
    <template #title> Edit Karyawan </template>
    <form @submit.prevent="edit">
        <v-input :name="'kode'" v-model="form.kode"></v-input>
        <v-input :name="'transaksi_id'" v-model="form.transaksi_id"></v-input>
        <v-input :type="'date'" :name="'tanggal_transaksi'" v-model="form.tanggal_transaksi"></v-input>
        <v-input :type="'date'" :name="'tanggal_slip'" v-model="form.tanggal_slip"></v-input>
        <v-input :name="'debit'" v-model="form.debit"></v-input>
        <v-input :name="'kredit'" v-model="form.kredit"></v-input>
        <v-input :name="'saldo_awal'" v-model="form.saldo_awal"></v-input>
        <v-input :name="'saldo_akhir'" v-model="form.saldo_akhir"></v-input>
        <v-input :name="'keterangan'" v-model="form.keterangan"></v-input>
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
        kode: "",
        transaksi_id: "",
        tanggal_transaksi: "",
        tanggal_slip: "",
        debit: "",
        kredit: "",
        saldo_awal: "",
        saldo_akhir: "",
        keterangan: "",
        karyawan_id: "",
      }),
      karyawan: null,
    };
  },
  props: {
    simpanan_id: {
      type: Number,
      default: "0",
    }
  },
  methods: {
    show(detail) {
      this.detail = detail;
      this.form.kode = detail.kode;
      this.form.transaksi_id = detail.transaksi_id;
      this.form.tanggal_transaksi = detail.tanggal_transaksi;
      this.form.tanggal_slip = detail.tanggal_slip;
      this.form.debit = detail.debit;
      this.form.kredit = detail.kredit;
      this.form.saldo_awal = detail.saldo_awal;
      this.form.saldo_akhir = detail.saldo_akhir;
      this.form.keterangan = detail.keterangan;
      this.form.karyawan_id = detail.karyawan_id;
      this.$refs.editModal.toggleModal();
    },
    edit() {
      this.form.put(route("simpanan.detail.update", this.detail.id), {
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
