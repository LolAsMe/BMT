<template>
  <app-layout title="Pembiayaan">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Pembiayaan
      </h2>
    </template>
    <add></add>
    <div class="py-2">
      <v-card>
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
                Nama
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
                Alamat
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
                Jumlah
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
            <tr v-for="pembiayaan in pembiayaans" :key="pembiayaan.id">
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="ml-0">
                    <div class="text-sm font-medium text-gray-900">
                      {{ pembiayaan.kode }}
                    </div>
                    <div class="text-sm text-black">
                      {{ pembiayaan.nomor }}
                    </div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">
                  {{ pembiayaan.simpanan_id }}
                </div>
                <div class="text-sm text-black">
                  {{ pembiayaan.jenis_pembiayaan_id }}
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">
                  {{ pembiayaan.total_pembiayaan }}
                </div>
                <div class="text-sm text-black">
                  {{ pembiayaan.angsuran_diterima }}
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
                  v-on:click="$refs.detailModal.show(pembiayaan)"
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
                  v-on:click="$refs.editModal.show(pembiayaan)"
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
                  @click="deletePembiayaan(pembiayaan)"
                  href="#"
                  class="text-indigo-600 hover:text-indigo-900"
                  >Delete</a
                >
              </td>
            </tr>
          </tbody>
        </table>
        <edit-modal ref="editModal"></edit-modal>
        <detail-modal ref="detailModal"></detail-modal>
      </v-card>
    </div>
  </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import VButton from "@/Components/Button.vue";
import VCard from "@/Components/Card.vue";
import VInput from "@/Components/Input.vue";
import VModal from "@/Components/Modal.vue";
import Add from "@/Pages/BMT/Partials/PembiayaanAdd.vue";
import EditModal from "@/Pages/BMT/Partials/PembiayaanEditModal.vue";
import DetailModal from "@/Pages/BMT/Partials/PembiayaanDetailModal.vue";

export default defineComponent({
  components: {
    AppLayout,
    VModal,
    Add,
    DetailModal,
    EditModal,
    VInput,
    VCard,
    VButton,
  },
  methods: {
    deletePembiayaan(pembiayaan) {
      this.$inertia.delete(route("pembiayaan.destroy", pembiayaan.id));
    },
  },
  props: {
    pembiayaans: Object,
  },
});
</script>
