<template>
  <app-layout title="Detail Nisbah">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Detail Nisbah
      </h2>
    </template>
    <add :nisbah_id="nisbah.id"></add>
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
                ID
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
                Hasil
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
            <tr v-for="detail in nisbah.detail" :key="detail.id">
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="ml-0">
                    <div class="text-sm font-medium text-gray-900">
                      {{ detail.pengendapan_id }}
                    </div>
                    <div class="text-sm text-black">
                      {{ detail.detail_simpanan_id }}
                    </div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">
                  {{ detail.pengendapan }}
                </div>
                <div class="text-sm text-black">{{ detail.hasil }}</div>
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
                  @click="deleteDetailNisbah(detail)"
                  href="#"
                  class="text-indigo-600 hover:text-indigo-900"
                  >Delete</a
                >
              </td>
            </tr>
          </tbody>
        </table>
        <edit-modal :nisbah_id="nisbah.id" ref="editModal"></edit-modal>
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
import Add from "@/Pages/BMT/Partials/DetailNisbahAdd.vue";
import EditModal from "@/Pages/BMT/Partials/DetailNisbahEditModal.vue";

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
    deleteDetailNisbah(detailNisbah) {
      this.$inertia.delete(route("nisbah.detail.destroy", detailNisbah.id));
    },
  },
  props: {
    nisbah: Object,
  },
});
</script>
