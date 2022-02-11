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
        <v-input :name="'nama'" v-model="form.nama"></v-input>
        <v-input :name="'alamat'" v-model="form.alamat"></v-input>
        <v-input :name="'no_telepon'" v-model="form.no_telepon"></v-input>
        <v-input :name="'jabatan_id'" v-model="form.jabatan_id"></v-input>
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
        nama: "",
        alamat: "",
        no_telepon: "",
        jabatan_id: "",
      }),
    };
  },
  methods: {
    async createKaryawan() {
      await this.form.post(route("karyawan.store"), {
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
