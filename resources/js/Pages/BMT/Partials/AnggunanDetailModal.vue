<template>
  <v-modal ref="detailModal">
    <template #title> Detail Anggunan </template>
    <table class="min-w-full divide-y divide-gray-200">
      <tr>
        <th class="text-left">ID</th>
        <th>:</th>
        <td>{{ anggunan.id }}</td>
      </tr>
      <tr>
        <th class="text-left">Pembiayaan ID</th>
        <th>:</th>
        <td>{{ anggunan.id }}</td>
      </tr>
      <tr>
        <th class="text-left">Kode</th>
        <th>:</th>
        <td>{{ anggunan.kode }}</td>
      </tr>
      <tr>
        <th class="text-left">Jenis Objek</th>
        <th>:</th>
        <td>{{ anggunan.jenis_objek }}</td>
      </tr>
      <tr>
        <th class="text-left">Nomor Polisi</th>
        <th>:</th>
        <td>{{ anggunan.nomor_polisi }}</td>
      </tr>
      <tr>
        <th class="text-left">Tanggal Masuk</th>
        <th>:</th>
        <td>{{ anggunan.tanggal_masuk }}</td>
      </tr>
      <tr>
        <th class="text-left">Tanggal Ambil</th>
        <th>:</th>
        <td>{{ anggunan.tanggal_ambil }}</td>
      </tr>
      <tr>
        <th class="text-left">Tahun Pembuatan</th>
        <th>:</th>
        <td>{{ anggunan.tahun_pembuatan }}</td>
      </tr>
      <tr>
        <th class="text-left">Luas Objek</th>
        <th>:</th>
        <td>{{ anggunan.luas_objek }}</td>
      </tr>
      <tr>
        <th class="text-left">Letak Objek</th>
        <th>:</th>
        <td>{{ anggunan.letak_objek }}</td>
      </tr>
      <tr>
        <th class="text-left">Nama Pemilik</th>
        <th>:</th>
        <td>{{ anggunan.nama_pemilik }}</td>
      </tr>
      <tr>
        <th class="text-left">Alamat Pemilik</th>
        <th>:</th>
        <td>{{ anggunan.alamat_pemilik }}</td>
      </tr>
      <tr>
        <th class="text-left">Karyawan</th>
        <th>:</th>
        <td>{{ anggunan.karyawan_id }}</td>
      </tr>
      <tr>
        <th class="text-left">Created At</th>
        <th>:</th>
        <td>{{ anggunan.created_at }}</td>
      </tr>
      <tr>
        <th class="text-left">Updated At</th>
        <th>:</th>
        <td>{{ anggunan.updated_at }}</td>
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
      anggunan: null,
    };
  },
  methods: {
    show(anggunan) {
      this.anggunan = anggunan;
      this.$refs.detailModal.toggleModal();
    },
  },
});
</script>
