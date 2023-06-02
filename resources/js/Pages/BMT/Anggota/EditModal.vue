<template>
  <v-modal ref="editModal">
    <template #title> Edit Anggota </template>
    <form @submit.prevent="edit">
        <v-input :name="'nama'" v-model="form.nama"></v-input>
                <v-input :name="'alamat'" v-model="form.alamat"></v-input>
                <v-input :name="'telepon'" v-model="form.telepon"></v-input>
                <v-input :name="'pekerjaan'" v-model="form.pekerjaan"></v-input>
                <v-input :name="'tempat_lahir'" v-model="form.tempat_lahir"></v-input>
                <v-input :type="'date'" :name="'form.tanggal_lahir'" :modelValue="form.tanggal_lahir"
                    v-model="form.tanggal_lahir"></v-input>
                <v-input :name="'nama_ibu_kandung'" v-model="form.nama_ibu_kandung"></v-input>
                <label for="jenis_kelamin">Jenis Kelamin : </label>
                <select id="jenis_kelamin" v-model="form.jenis_kelamin" class="mb-4">
                    <option selected value="pria">Pria</option>
                    <option value="wanita">Wanita</option>
                </select>
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
        nama: "",
        alamat: "",
        telepon: "",
        tempat_lahir: "",
        tanggal_lahir: "",
        nama_ibu_kandung: "",
        pekerjaan: "",
        jenis_kelamin: "",
        keterangan: "",
      }),
      anggota: null,
    };
  },
  methods: {
    show(anggota) {
      this.anggota = anggota;
      this.form.kode = anggota.kode;
      this.form.nama = anggota.nama;
      this.form.no_ktp = anggota.no_ktp;
      this.form.pekerjaan = anggota.pekerjaan;
      this.form.alamat = anggota.alamat;
      this.form.telepon = anggota.telepon;
      this.form.tempat_lahir = anggota.tempat_lahir;
      this.form.tanggal_lahir = anggota.tanggal_lahir.substring(0, 10);
      this.form.nama_ibu_kandung = anggota.nama_ibu_kandung;
      this.form.jenis_kelamin = anggota.jenis_kelamin;
      this.form.keterangan = anggota.keterangan;
      this.$refs.editModal.toggleModal();
    },
    edit() {
      this.form.put(route("anggota.update", this.anggota.id), {
        preserveScroll: true,
        onSuccess: () => {
            this.$toast.success("Anggota berhasil diedit")
          this.form.reset();
          this.$refs.editModal.toggleModal();
        },
      });
    },
  },
});
</script>
