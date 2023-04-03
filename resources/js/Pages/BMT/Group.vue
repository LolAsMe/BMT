<template>
  <app-layout title="Group">
    {{ group }}
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Group</h2>
    </template>
    <add></add>
    <div class="py-2">
      <v-card>
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th
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
                No
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
                Karyawan
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
            <tr v-for="(group, index) in groups" :key="group.id">
              <td class="px-6 py-4 whitespace-nowrap">{{ index + 1 }}</td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="ml-0">
                    <div class="text-sm font-medium text-gray-900">
                      <!-- {{ group.nama }} -->
                    </div>
                    <div class="text-sm text-black">
                      <!-- {{ group.kode }} -->
                    </div>
                  </div>
                </div>
              </td>
              <th
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
                {{ group.karyawan.nama }}
              </th>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-black">
                <Link
                  :href="route('group.show', group.id)"
                  class="
                    text-blue-500
                    px-6
                    py-4
                    whitespace-nowrap
                    text-left text-sm
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
                  text-left text-sm
                  font-medium
                "
              >
                <a
                  @click="deleteGroup(group)"
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
import { Link } from "@inertiajs/inertia-vue3";
import VInput from "@/Components/Input.vue";
import VModal from "@/Components/Modal.vue";
// import Add from "@/Pages/BMT/Partials/GroupAdd.vue";
// import EditModal from "@/Pages/BMT/Partials/GroupEditModal.vue";

export default defineComponent({
  components: {
    AppLayout,
    VModal,
    Link,
    // Add,
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
    groups: Object,
  },
});
</script>
