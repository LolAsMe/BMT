<template>
  <app-layout title="Karyawan">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Karyawan
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
            <tr v-for="karyawan in karyawans" :key="karyawan.id">
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="ml-0">
                    <div class="text-sm font-medium text-gray-900">
                      {{ karyawan.nama }}
                    </div>
                    <div class="text-sm text-black">
                      {{ karyawan.kode }}
                    </div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">
                  {{ karyawan.alamat }}
                </div>
                <div class="text-sm text-black">{{ karyawan.no_telepon }}</div>
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
                {{ karyawan.jabatan.nama }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-black">
                <Link
                  :href="route('karyawan.show', karyawan.id)"
                  class="
                    text-blue-500
                    px-6
                    py-4
                    whitespace-nowrap
                    text-center text-sm
                    font-medium
                  "
                >
                  Detail
                </Link>
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
                  v-on:click="$refs.editModal.show(karyawan)"
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
                  @click="deleteKaryawan(karyawan)"
                  href="#"
                  class="text-indigo-600 hover:text-indigo-900"
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
import { Head, Link } from "@inertiajs/inertia-vue3";
import VModal from "@/Components/Modal.vue";
import Add from "@/Pages/BMT/Partials/KaryawanAdd.vue";
import EditModal from "@/Pages/BMT/Partials/KaryawanEditModal.vue";

export default defineComponent({
  components: {
    AppLayout,
    VModal,
    Add,
    EditModal,
    VInput,
    VCard,
    Link,
    VButton,
  },
  methods: {
    deleteKaryawan(karyawan) {
      this.$inertia.delete(route("karyawan.destroy", karyawan.id));
      console.log(this.$inertia);
    },
  },
  props: {
    karyawans: Object,
  },
});
</script>
