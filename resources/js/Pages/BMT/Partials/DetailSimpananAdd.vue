<template>
  <div>
    <v-button
      class="block mr-4 sm:mr-10 ml-auto mt-4"
      v-on:click="$refs.addModal.toggleModal()"
      >Add</v-button
    >
    <v-modal ref="addModal">
      <template #title> Add Karyawan </template>
      <form @submit.prevent="createKaryawan">
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
    };
  },
  props: {
    simpanan_id: {
      type: Number,
      default: "0",
    }
  },
  methods: {
    async createKaryawan() {
      await this.form.post(route("simpanan.detail.store",this.simpanan_id), {
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
