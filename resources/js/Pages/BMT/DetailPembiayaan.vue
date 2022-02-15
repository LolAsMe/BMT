<template>
  <app-layout title="Detail Pembiayaan">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Detail Pembiayaan
      </h2>
    </template>
    <add :pembiayaan_id="pembiayaan.id"></add>
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
                Angsuran
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
                Tanggungan
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
                Keterangan
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
            <tr
              v-for="detail in pembiayaan.detail"
              :key="detail.id"
            >
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="ml-0">
                    <div class="text-sm font-medium text-gray-900">
                      {{ detail.angsuran_ke }}
                    </div>
                    <div class="text-sm text-black">
                      {{ detail.jumlah }}
                    </div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">
                  {{ detail.akumulasi_angsuran }}
                </div>
                <div class="text-sm text-black">
                  {{ detail.total_tanggungan }}
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">
                  {{ detail.karyawan_id }}
                </div>
                <div class="text-sm text-black">
                  {{ detail.keterangan }}
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
                  v-on:click="$refs.editModal.show(detail)"
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
                  @click="deleteDetailPembiayaan(detail)"
                  href="#"
                  class="text-indigo-600 hover:text-indigo-900"
                  >Delete</a
                >
              </td>
            </tr>
          </tbody>
        </table>
        <edit-modal :pembiayaan_id="pembiayaan.id" ref="editModal"></edit-modal>
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
import Add from "@/Pages/BMT/Partials/DetailPembiayaanAdd.vue";
import EditModal from "@/Pages/BMT/Partials/DetailPembiayaanEditModal.vue";

export default defineComponent({
  components: {
    AppLayout,
    VModal,
    Add,
    EditModal,
    VInput,
    VCard,
    VButton,
  },
  methods: {
    deleteDetailPembiayaan(detailPembiayaan) {
      this.$inertia.delete(
        route("pembiayaan.detail.destroy", detailPembiayaan.id)
      );
    },
  },
  props: {
    pembiayaan: Object,
  },
});
</script>
