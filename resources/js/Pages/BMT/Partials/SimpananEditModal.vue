<template>
  <v-modal ref="editModal">
    <template #title> Edit Simpanan </template>
    <form @submit.prevent="edit">
      <v-input :name="'kode'" v-model="form.kode"></v-input>
      <v-input :name="'anggota'" v-model="form.anggota_id"></v-input>
      <v-input :name="'jenis_simpanan'" v-model="form.jenis_simpanan_id"></v-input>
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
        anggota: "",
        jenis_simpanan_id: "",
        tanggal_pembuatan: "",
        keterangan: "",
      }),
      simpanan: null,
    };
  },
  methods: {
    show(simpanan) {
      this.simpanan = simpanan;
      this.form.kode = simpanan.kode;
      this.form.anggota_id = simpanan.anggota_id;
      this.form.jenis_simpanan_id = simpanan.jenis_simpanan_id;
      this.form.tanggal_pembuatan = simpanan.tanggal_pembuatan;
      this.form.keterangan = simpanan.keterangan;
      this.$refs.editModal.toggleModal();
    },
    edit() {
      this.form.put(route("simpanan.update", this.simpanan.id), {
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
