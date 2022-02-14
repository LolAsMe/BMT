<template>
  <div>
    <v-button
      class="block mr-4 sm:mr-10 ml-auto mt-4"
      v-on:click="$refs.addModal.toggleModal()"
      >Add</v-button
    >
    <v-modal ref="addModal">
      <template #title> Add Simpanan </template>
      <form @submit.prevent="Simpanan">
        <v-input :name="'kode'" v-model="form.kode"></v-input>
        <v-input :name="'anggota'" v-model="form.anggota_id"></v-input>
        <v-input :name="'jenis_simpanan'" v-model="form.jenis_simpanan_id"></v-input>
        <v-input :name="'jumlah'" v-model="form.jumlah"></v-input>
        <v-input :type="'date'" :name="'tanggal_pembuatan'" v-model="form.tanggal_pembuatan"></v-input>
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
        anggota_id: "",
        jenis_simpanan_id: "",
        jumlah: "",
        tanggal_pembuatan: "",
        keterangan: "",
      }),
    };
  },
  methods: {
    async Simpanan() {
      await this.form.post(route("simpanan.store"), {
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
