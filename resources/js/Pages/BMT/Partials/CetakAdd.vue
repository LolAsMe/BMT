<template>
  <div>
    <v-button
      class="block mr-4 sm:mr-10 ml-auto mt-4"
      v-on:click="$refs.addModal.toggleModal()"
      >Add</v-button
    >
    <v-modal ref="addModal">
      <template #title> Add Cetak </template>
      <form @submit.prevent="createCetak">
        <v-input :name="'kode'" v-model="form.kode"></v-input>
        <v-input
          :type="'date'"
          :name="'tanggal'"
          v-model="form.tanggal"
        ></v-input>
        <v-input :name="'sandi'" v-model="form.sandi"></v-input>
        <v-input :name="'debit'" v-model="form.debit"></v-input>
        <v-input :name="'kredit'" v-model="form.kredit"></v-input>
        <v-input :name="'saldo'" v-model="form.saldo"></v-input>
        <v-input :name="'karyawan_id'" v-model="form.karyawan_id"></v-input>
        <v-input :name="'simpanan_id'" v-model="form.simpanan_id"></v-input>
        <v-input :name="'no_urut'" v-model="form.no_urut"></v-input>
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
        tanggal: "",
        sandi: "",
        debit: "",
        kredit: "",
        saldo: "",
        karyawan_id: "",
        simpanan_id: "",
        no_urut: "",
      }),
    };
  },
  methods: {
    async createCetak() {
      console.log(route());
    //   await this.form.post(route("cetak.store"), {
    //     preserveScroll: true,
    //     onSuccess: () => {
    //       this.form.reset();
    //       this.$refs.addModal.toggleModal();
    //     },
    //   });
    },
  },
});
</script>
