<template>
    <app-layout title="Karyawan">
        <template #header>
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    KARYAWAN {{ karyawan.jabatan.nama }} / {{ karyawan.nama }} / {{ karyawan.kode }}
                </h2>
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <jet-nav-link :href="route('dashboard')" :active="route().current('dashboard')">
                                Dashboard
                            </jet-nav-link>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <jet-nav-link :href="route('karyawan.index')" :active="route().current('karyawan.index')">
                                    Karyawan
                                </jet-nav-link>
                            </div>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Karyawan {{
                                    karyawan.nama }}</span>

                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
        </template>
        <div class="py-5">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="flex flex-row-reverse mt-4">
                        <button v-if="karyawan.deleted_at == null" @click="deleteKaryawan"
                            class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                            DEACTIVE</button>
                        <button v-else @click="activeKaryawan"
                            class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                            ACTIVE</button>
                        <button @click="$refs.editModal.show(karyawan)"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            EDIT</button>
                    </div>
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
                      {{ anggota.karyawan.kode }}
                    </div>
                    <div class="text-sm text-black">
                      {{ anggota.karyawan.jumlah }}
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
    <edit-modal ref="editModal"></edit-modal>

</template>

<script>
import { defineComponent } from "vue";
import VCard from "@/Components/Card.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import Welcome from "@/Jetstream/Welcome.vue";
import JetNavLink from '@/Jetstream/NavLink.vue'
import EditModal from "@/Pages/BMT/Partials/KaryawanEditModal.vue";
import AnggotaDetailModal from "@/Pages/BMT/Partials/AnggotaDetailModal.vue";

export default defineComponent({
    components: {
        AppLayout,
        Welcome,
        VCard,EditModal,
        AnggotaDetailModal, JetNavLink
    },
    props: {
        karyawan: Object,
    },
    methods: {
        deleteKaryawan() {
            console.log('test')
            this.$inertia.delete(
                route("karyawan.destroy", this.karyawan.id)
            );
        },
        activeKaryawan() {
            console.log('test')
            this.$inertia.post(
                route("karyawan.active", this.karyawan.id)
            );
        },
    }
});
</script>
