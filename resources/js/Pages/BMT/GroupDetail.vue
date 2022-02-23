<template>
  <app-layout title="Group Detail">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Group {{ group.nama }} - {{ group.karyawan.nama }}
      </h2>
    </template>
    <v-card class="mt-5">
      <add></add>
    </v-card>

    <div class="py-5">
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
            <tr v-for="anggota in group.anggota" :key="anggota.id">
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
      <!-- <anggota-detail-modal ref="detailModal"></anggota-detail-modal> -->
    </div>
  </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import VButton from "@/Components/Button.vue";
import VCard from "@/Components/Card.vue";
import { Link } from "@inertiajs/inertia-vue3";
import VInput from "@/Components/Input.vue";
import VModal from "@/Components/Modal.vue";
import Add from "@/Pages/BMT/Partials/GroupAnggotaAdd.vue";
// import EditModal from "@/Pages/BMT/Partials/GroupEditModal.vue";

export default defineComponent({
  components: {
    AppLayout,
    VModal,
    Link,
    Add,
    // EditModal,
    VInput,
    VCard,
    VButton,
  },
  methods: {
    deleteGroup(group) {
      this.$inertia.delete(route("group.destroy", group.id));
    },
  },
  props: {
    group: Object,
    anggotas: Object
  },
});
</script>
