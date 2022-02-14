<template>
  <v-modal ref="editModal">
    <template #title> Edit Jenis Simpanan </template>
    <form @submit.prevent="edit">
      <v-input :name="'kode'" v-model="form.kode"></v-input>
      <v-input :name="'nama'" v-model="form.nama"></v-input>
      <v-input :name="'bahas'" v-model="form.bahas"></v-input>
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
        nama: "",
        bahas: "",
      }),
      jenisSimpanan: null,
    };
  },
  methods: {
    show(jenisSimpanan) {
      this.jenisSimpanan = jenisSimpanan;
      this.form.kode = jenisSimpanan.kode;
      this.form.nama = jenisSimpanan.nama;
      this.form.bahas = jenisSimpanan.bahas;
      this.$refs.editModal.toggleModal();
    },
    edit() {
      this.form.put(route("jenis-simpanan.update", this.jenisSimpanan.id), {
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
