<template>
  <v-modal ref="editModal">
    <template #title> Edit Nisbah Detail </template>
    <form @submit.prevent="edit">
      <v-input :name="'pengendapan_id'" v-model="form.pengendapan_id"></v-input>
      <v-input
        :name="'detail_simpanan_id'"
        v-model="form.detail_simpanan_id"
      ></v-input>
      <v-input :name="'pengendapan'" v-model="form.pengendapan"></v-input>
      <v-input :name="'hasil'" v-model="form.hasil"></v-input>
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
        pengendapan_id: "",
        detail_simpanan_id: "",
        pengendapan: "",
        hasil: "",
      }),
      karyawan: null,
    };
  },
  props: {
    nisbah_id: {
      type: Number,
      default: "0",
    },
  },
  methods: {
    show(detail) {
      this.detail = detail;
      this.form.pengendapan_id = detail.pengendapan_id;
      this.form.detail_simpanan_id = detail.detail_simpanan_id;
      this.form.pengendapan = detail.pengendapan;
      this.form.hasil = detail.hasil;
      this.$refs.editModal.toggleModal();
    },
    edit() {
      this.form.put(route("nisbah.detail.update", this.detail.id), {
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
