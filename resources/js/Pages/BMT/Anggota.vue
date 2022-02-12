<template>
  <app-layout title="Anggota">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Anggota
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
                Status
              </th>
              <th
                scope="col"
                class="
                  px-6
                  py-3
                  text-left text-xs
                  font-medium
                  text-gray-500 text-center
                  uppercase
                  tracking-wider
                "
              >
                Jabatan
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
            <tr v-for="anggota in anggotas" :key="anggota.id">
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
                <div class="text-sm text-gray-900">
                  {{ anggota.alamat }}
                </div>
                <div class="text-sm text-black">{{ anggota.no_telepon }}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span
                  class="
                    px-2
                    inline-flex
                    text-xs
                    leading-5
                    font-semibold
                    rounded-full
                    bg-green-100
                    text-green-800
                  "
                >
                  Active
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-black">
                {{ anggota.jabatan_id }}
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
                <a  @click="deleteAnggota(anggota)" href="#" class="text-indigo-600 hover:text-indigo-900"
                  >Delete</a
                >
              </td>
            </tr>
          </tbody>
        </table>
        <edit-modal ref="editModal"></edit-modal>
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
import Add from "@/Pages/BMT/Partials/AnggotaAdd.vue";
import EditModal from "@/Pages/BMT/Partials/AnggotaEditModal.vue";

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
    deleteAnggota(anggota) {
      this.$inertia.delete(
        route("anggota.destroy", anggota.id)
      );
    },
  },
  props: {
    anggotas: Object,
  },
});
</script>
