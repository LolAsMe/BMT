<template>
  <v-modal ref="detailModal">
    <template #title> Detail Anggota </template>
    <table class="min-w-full divide-y divide-gray-200">
      <tr>
        <th class="text-left">ID</th>
        <th>:</th>
        <td>{{ anggota.id }}</td>
      </tr>
      <tr>
        <th class="text-left">Nama</th>
        <th>:</th>
        <td>{{ anggota.nama }}</td>
      </tr>
      <tr>
        <th class="text-left">No KTP</th>
        <th>:</th>
        <td>{{ anggota.no_ktp }}</td>
      </tr>
      <tr>
        <th class="text-left">Alamat</th>
        <th>:</th>
        <td>{{ anggota.alamat }}</td>
      </tr>
      <tr>
        <th class="text-left">Telepon</th>
        <th>:</th>
        <td>{{ anggota.telepon }}</td>
      </tr>
      <tr>
        <th class="text-left">Pekerjaan</th>
        <th>:</th>
        <td>{{ anggota.pekerjaan }}</td>
      </tr>
      <tr>
        <th class="text-left">Tanggal Lahir</th>
        <th>:</th>
        <td>{{ anggota.tanggal_lahir }}</td>
      </tr>
      <tr>
        <th class="text-left">Tanggal Masuk</th>
        <th>:</th>
        <td>{{ anggota.tanggal_masuk }}</td>
      </tr>
      <tr>
        <th class="text-left">Nama Ibu Kandung</th>
        <th>:</th>
        <td>{{ anggota.nama_ibu_kandung }}</td>
      </tr>
      <tr>
        <th class="text-left">Jenis Kelamin</th>
        <th>:</th>
        <td>{{ anggota.jenis_kelamin }}</td>
      </tr>
      <tr>
        <th class="text-left">Karyawan</th>
        <th>:</th>
        <td>{{ anggota.karyawan_id }}</td>
      </tr>
      <tr>
        <th class="text-left">Keterangan</th>
        <th>:</th>
        <td>{{ anggota.keterangan }}</td>
      </tr>
      <tr>
        <th class="text-left">Created At</th>
        <th>:</th>
        <td>{{ anggota.created_at }}</td>
      </tr>
      <tr>
        <th class="text-left">Updated At</th>
        <th>:</th>
        <td>{{ anggota.updated_at }}</td>
      </tr>
    </table>
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
      anggota: null,
    };
  },
  methods: {
    show(anggota) {
      this.anggota = anggota;
      this.$refs.detailModal.toggleModal();
    },
  },
});
</script>
