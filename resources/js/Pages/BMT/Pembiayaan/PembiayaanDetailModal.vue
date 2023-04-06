<template>
  <v-modal ref="detailModal">
    <template #title> Detail Pembiayaan </template>
    <table class="min-w-full divide-y divide-gray-200">
      <tr>
        <th class="text-left">ID</th>
        <th>:</th>
        <td>{{ pembiayaan.id }}</td>
      </tr>
      <tr>
        <th class="text-left">Kode</th>
        <th>:</th>
        <td>{{ pembiayaan.kode }}</td>
      </tr>
      <tr>
        <th class="text-left">Nomor</th>
        <th>:</th>
        <td>{{ pembiayaan.nomor }}</td>
      </tr>
      <tr>
        <th class="text-left">Jenis Pembiayaan ID</th>
        <th>:</th>
        <td>{{ pembiayaan.jenis_pembiayaan_id }}</td>
      </tr>
      <tr>
        <th class="text-left">Simpanan ID</th>
        <th>:</th>
        <td>{{ pembiayaan.simpanan_id }}</td>
      </tr>
      <tr>
        <th class="text-left">Karyawan ID</th>
        <th>:</th>
        <td>{{ pembiayaan.simpanan_id }}</td>
      </tr>
      <tr>
        <th class="text-left">Tanggal Pinjam</th>
        <th>:</th>
        <td>{{ pembiayaan.tanggal_pinjam }}</td>
      </tr>
      <tr>
        <th class="text-left">Jumlah</th>
        <th>:</th>
        <td>{{ pembiayaan.jumlah }}</td>
      </tr>
      <tr>
        <th class="text-left">Tanggal Jatuh Tempo</th>
        <th>:</th>
        <td>{{ pembiayaan.tanggal_jatuh_tempo }}</td>
      </tr>
      <tr>
        <th class="text-left">Pokok</th>
        <th>:</th>
        <td>{{ pembiayaan.pokok }}</td>
      </tr>
      <tr>
        <th class="text-left">Jasa</th>
        <th>:</th>
        <td>{{ pembiayaan.jasa }}</td>
      </tr>
      <tr>
        <th class="text-left">Potongan Pembiayaan</th>
        <th>:</th>
        <td>{{ pembiayaan.potongan_pembiayaan }}</td>
      </tr>
      <tr>
        <th class="text-left">Total Pembiayaan</th>
        <th>:</th>
        <td>{{ pembiayaan.total_pembiayaan }}</td>
      </tr>
      <tr>
        <th class="text-left">Frekuensi Angsuran</th>
        <th>:</th>
        <td>{{ pembiayaan.frekuensi_angsuran }}</td>
      </tr>
      <tr>
        <th class="text-left">Jumlah Angsuran</th>
        <th>:</th>
        <td>{{ pembiayaan.jumlah_angsuran }}</td>
      </tr>
      <tr>
        <th class="text-left">Angsuran Diterima</th>
        <th>:</th>
        <td>{{ pembiayaan.angsuran_diterima }}</td>
      </tr>
      <tr>
        <th class="text-left">Status</th>
        <th>:</th>
        <td>{{ pembiayaan.status }}</td>
      </tr>
      <tr>
        <th class="text-left">Keterangan</th>
        <th>:</th>
        <td>{{ pembiayaan.keterangan }}</td>
      </tr>
      <tr>
        <th class="text-left">Created At</th>
        <th>:</th>
        <td>{{ pembiayaan.created_at }}</td>
      </tr>
      <tr>
        <th class="text-left">Updated At</th>
        <th>:</th>
        <td>{{ pembiayaan.updated_at }}</td>
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
      pembiayaan: null,
    };
  },
  methods: {
    show(pembiayaan) {
      this.pembiayaan = pembiayaan;
      this.$refs.detailModal.toggleModal();
    },
  },
});
</script>
