<template>
    <app-layout title="Simpanan">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Simpanan
            </h2>
        </template>
        <div class="py-5">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex flex-row-reverse flex-nowrap">
                    <add></add>
                </div>
            </div>
            <v-card>
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="
                                    px-6
                                    py-3
                                    text-left text-xs
                                    font-medium
                                    text-gray-500
                                    uppercase
                                    tracking-wider
                                    ">
                                No
                            </th>
                            <th scope="col" class="
                                    px-6
                                    py-3
                                    text-left text-xs
                                    font-medium
                                    text-gray-500
                                    uppercase
                                    tracking-wider
                                    ">
                                Nama
                            </th>
                            <th scope="col" class="
                                    px-6
                                    py-3
                                    text-left text-xs
                                    font-medium
                                    text-gray-500
                                    uppercase
                                    tracking-wider
                                    ">
                                Simpanan
                            </th>
                            <th scope="col" class="
                                    px-6
                                    py-3
                                    text-left text-xs
                                    font-medium
                                    text-gray-500
                                    uppercase
                                    tracking-wider
                                    ">
                                Jumlah Simpanan
                            </th>
                            <!-- <th scope="col" class="relative px-6 py-3">
<span class="
px-6
py-3
text-xs text-center
font-medium
text-gray-500
uppercase
tracking-wider
">Edit</span>
</th>
<th scope="col" class="relative px-6 py-3">
<span class="
px-6
py-3
text-left text-xs
font-medium
text-gray-500
uppercase
tracking-wider
">Delete</span>
</th> -->
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr v-for="(simpanan, index) in simpanans" :key="simpanan.id" @click="detail(simpanan.id)">
                            <td class="text-center">{{ index + 1 }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="ml-0">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ simpanan.anggota.nama }}
                                        </div>
                                        <div class="text-sm text-black">
                                            {{ simpanan.anggota.alamat }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="ml-0">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ simpanan.kode }}
                                        </div>
                                        <div class="text-sm text-black">
                                            Simpanan {{ simpanan.jenis_simpanan.nama }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right">
                                <span class="
                                    px-2
                                    inline-flex
                                    text-xs
                                    leading-5
                                    font-semibold
                                    rounded-full
                                    bg-green-100
                                    text-green-800
                                    ">
                                    {{
                                        "IDR " + simpanan.jumlah.toString().replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g, "$1\.")
                                    }}
                                </span>
                            </td>
                            <!-- <td class="
px-6
py-4
whitespace-nowrap
text-center text-sm
font-medium
">
<a v-on:click="$refs.editModal.show(simpanan)" href="#"
class="text-indigo-600 hover:text-indigo-900">Edit</a>
</td>
<td class="
px-6
py-4
whitespace-nowrap
text-center text-sm
font-medium
">
<a @click="Simpanan(simpanan)" href="#"
class="text-indigo-600 hover:text-indigo-900">Delete</a>
</td> -->
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
import Add from "@/Pages/BMT/Partials/SimpananAdd.vue";
import EditModal from "@/Pages/BMT/Partials/SimpananEditModal.vue";

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
    data() {
        return {
            form: this.$inertia.form(),
        };
    },
    methods: {
        Simpanan(simpanan) {
            this.$inertia.delete(
                route("simpanan.destroy", simpanan.id)
            );
        },
        detail(simpananId) {
            console.log("ini Detail" + simpananId)
            console.log(this.route('simpanan.index'))
            window.location.href = this.route('simpanan.show',simpananId);

        }
    },
    props: {
        simpanans: Object,
    },
});
</script>
