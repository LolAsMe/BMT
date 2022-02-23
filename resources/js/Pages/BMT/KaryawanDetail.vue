<template>
  <app-layout title="Karyawan">
    <template #header>
      <div>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ karyawan.id }} - {{ karyawan.nama }}
        </h2>
      </div>
    </template>
    <div class="py-5">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <table class="m-5 min-w-full divide-y divide-gray-200">
            <tr>
              <th class="text-left">ID</th>
              <th>:</th>
              <td>{{ karyawan.id }}</td>
            </tr>
            <tr>
              <th class="text-left">Nama</th>
              <th>:</th>
              <td>{{ karyawan.nama }}</td>
            </tr>
            <tr>
              <th class="text-left">Alamat</th>
              <th>:</th>
              <td>{{ karyawan.alamat }}</td>
            </tr>
            <tr>
              <th class="text-left">No Telepon</th>
              <th>:</th>
              <td>{{ karyawan.no_telepon }}</td>
            </tr>
            <tr>
              <th class="text-left">Jabatan</th>
              <th>:</th>
              <td>{{ karyawan.jabatan.nama }}</td>
            </tr>
            <tr>
              <th class="text-left">Created At</th>
              <th>:</th>
              <td>{{ karyawan.created_at }}</td>
            </tr>
            <tr>
              <th class="text-left">Updated At</th>
              <th>:</th>
              <td>{{ karyawan.updated_at }}</td>
            </tr>
          </table>
        </div>
      </div>
    </div>

    <!-- <div class="py-5">
      <v-card>
        <h5
          class="
            text-2xl
            font-normal
            leading-normal
            mt-0
            p-2
            mb-2
            text-amber-800
          "
        >
          Nasabah
        </h5>
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th
                scope="col"
                class="
                  px-6
                  py-3
                  text-left text-xs
                  font-medium
                  text-gray-500
                  uppercase
                  tracking-wider
                "
              >
                Nama / Kode
              </th>
              <th
                scope="col"
                class="
                  px-6
                  py-3
                  text-left text-xs
                  font-medium
                  text-gray-500
                  uppercase
                  tracking-wider
                "
              >
                Alamat / No Telepon
              </th>
              <th
                scope="col"
                class="
                  px-6
                  py-3
                  text-left text-xs
                  font-medium
                  text-gray-500
                  uppercase
                  tracking-wider
                "
              >
                No Rekening / Jumlah
              </th>
              <th scope="col" class="relative px-6 py-3">
                <span
                  class="
                    px-6
                    py-3
                    text-left text-xs text-center
                    font-medium
                    text-gray-500
                    uppercase
                    tracking-wider
                  "
                  >Detail</span
                >
              </th>
              <th scope="col" class="relative px-6 py-3">
                <span
                  class="
                    px-6
                    py-3
                    text-left text-xs text-center
                    font-medium
                    text-gray-500
                    uppercase
                    tracking-wider
                  "
                  >Edit</span
                >
              </th>
              <th scope="col" class="relative px-6 py-3">
                <span
                  class="
                    px-6
                    py-3
                    text-left text-xs
                    font-medium
                    text-gray-500
                    uppercase
                    tracking-wider
                  "
                  >Delete</span
                >
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            <tr v-for="anggota in karyawan.anggota" :key="anggota.id">
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="ml-0">
                    <div class="text-sm font-medium text-gray-900">
                      {{ anggota.nama }}
                    </div>
                    <div class="text-sm text-black">
                      {{ anggota.kode }}
                    </div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="ml-0">
                    <div class="text-sm font-medium text-gray-900">
                      {{ anggota.alamat }}
                    </div>
                    <div class="text-sm text-black">
                      {{ anggota.telepon }}
                    </div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="ml-0">
                    <div class="text-sm font-medium text-gray-900">
                      {{ anggota.simpanan.kode }}
                    </div>
                    <div class="text-sm text-black">
                      {{ anggota.simpanan.jumlah }}
                    </div>
                  </div>
                </div>
              </td>
              <td
                class="
                  px-6
                  py-4
                  whitespace-nowrap
                  text-center text-sm
                  font-medium
                "
              >
                <a
                  v-on:click="$refs.detailModal.show(anggota)"
                  href="#"
                  class="text-indigo-600 hover:text-indigo-900"
                  >Detail</a
                >
              </td>
              <td
                class="
                  px-6
                  py-4
                  whitespace-nowrap
                  text-center text-sm
                  font-medium
                "
              >
                <a
                  v-on:click="$refs.editModal.show(anggota)"
                  href="#"
                  class="text-indigo-600 hover:text-indigo-900"
                  >Edit</a
                >
              </td>
              <td
                class="
                  px-6
                  py-4
                  whitespace-nowrap
                  text-center text-sm
                  font-medium
                "
              >
                <a
                  @click="deleteAnggota(anggota)"
                  href="#"
                  class="text-indigo-600 hover:text-indigo-900"
                  >Delete</a
                >
              </td>
            </tr>
          </tbody>
        </table>
      </v-card>
      <anggota-detail-modal ref="detailModal"></anggota-detail-modal>
    </div> -->
  </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import VCard from "@/Components/Card.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import Welcome from "@/Jetstream/Welcome.vue";
import AnggotaDetailModal from "@/Pages/BMT/Partials/AnggotaDetailModal.vue";

export default defineComponent({
  components: {
    AppLayout,
    Welcome,
    VCard,
    AnggotaDetailModal,
  },
  props: {
    karyawan: Object,
  },
});
</script>
