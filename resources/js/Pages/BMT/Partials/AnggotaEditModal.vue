<template>
  <v-modal ref="editModal">
    <template #title> Edit Anggota </template>
    <form @submit.prevent="edit">
      <v-input :name="'kode'" v-model="form.kode"></v-input>
      <v-input :name="'nama'" v-model="form.nama"></v-input>
      <v-input :name="'alamat'" v-model="form.alamat"></v-input>
      <v-input :name="'no_telepon'" v-model="form.no_telepon"></v-input>
      <v-input
        :name="'jabatan_id'"
        :type="'number'"
        v-model="form.jabatan_id"
      ></v-input>
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
        alamat: "",
        no_telepon: "",
        jabatan_id: "",
      }),
      anggota: null,
    };
  },
  methods: {
    show(anggota) {
      this.anggota = anggota;
      this.form.kode = anggota.kode;
      this.form.nama = anggota.nama;
      this.form.alamat = anggota.alamat;
      this.form.no_telepon = anggota.no_telepon;
      this.form.jabatan_id = anggota.jabatan_id;
      this.$refs.editModal.toggleModal();
    },
    edit() {
      this.form.put(route("anggota.update", this.anggota.id), {
        preserveScroll: true,
        onSuccess: () => {
          this.form.reset();
            this.$toast.success('Karyawan berhasil Diedit')
          this.$refs.editModal.toggleModal();
        },
      });
    },
  },
});
</script>
