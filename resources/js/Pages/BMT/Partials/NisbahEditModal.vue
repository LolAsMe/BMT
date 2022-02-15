<template>
  <v-modal ref="editModal">
    <template #title> Edit Karyawan </template>
    <form @submit.prevent="edit">
        <v-input :name="'kode'" v-model="form.kode"></v-input>
        <v-input :name="'bulan'" v-model="form.bulan"></v-input>
        <v-input :name="'simpanan_id'" v-model="form.simpanan_id"></v-input>
        <v-input :name="'pengendapan'" v-model="form.pengendapan"></v-input>
        <v-input :name="'tabungan'" v-model="form.tabungan"></v-input>
        <v-input :name="'nisbah'" v-model="form.nisbah"></v-input>
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
        bulan: "",
        simpanan_id: "",
        pengendapan: "",
        tabungan: "",
        nisbah: "",
      }),
      nisbah: null,
    };
  },
  methods: {
    show(nisbah) {
      this.nisbah = nisbah;
      this.form.kode = nisbah.kode;
      this.form.bulan = nisbah.bulan;
      this.form.simpanan_id = nisbah.simpanan_id;
      this.form.pengendapan = nisbah.pengendapan;
      this.form.tabungan = nisbah.tabungan;
      this.form.nisbah = nisbah.nisbah;
      this.$refs.editModal.toggleModal();
    },
    edit() {
      this.form.put(route("nisbah.update", this.nisbah.id), {
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
