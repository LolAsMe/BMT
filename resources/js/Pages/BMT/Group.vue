<template>
    <app-layout title="Group">
        <template #header>
            <nav class="flex my-2" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <jet-nav-link :href="route('dashboard')" :active="route().current('dashboard')">
                            Dashboard
                        </jet-nav-link>
                    </li>

                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Group</span>

                        </div>
                    </li>
                </ol>
            </nav>

        </template>
        <div class="py-2">
            <v-card>
                <div class="flex flex-row-reverse">

                    <add :showModal="showAddModal"></add>
                </div>
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="
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
                                Karyawan
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr v-for="(group, index) in groups" :key="group.id" class="hover:bg-slate-100 cursor-pointer"
                            @dblclick="detail(group.id)">
                            <td class="px-6 py-4 whitespace-nowrap">{{ index + 1 }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="ml-0">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ group.nama }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <th class="
                              px-6
                              py-3
                              text-left text-xs
                              font-medium
                              text-gray-500
                              uppercase
                              tracking-wider
                            ">
                                {{ group.karyawan.nama }}
                            </th>
                        </tr>
                    </tbody>
                </table>
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
import JetNavLink from '@/Jetstream/NavLink.vue'
import VInput from "@/Components/Input.vue";
import VModal from "@/Components/Modal.vue";
import Add from "@/Pages/BMT/Partials/GroupAddModal.vue";
// import EditModal from "@/Pages/BMT/Partials/GroupEditModal.vue";

export default defineComponent({
    components: {
        AppLayout, JetNavLink,
        VModal,
        Link,
        Add,
        // EditModal,
        VInput,
        VCard,
        VButton,
    },
    computed: {
    },
    methods: {
        deleteGroup(group) {
            this.$inertia.delete(route("group.destroy", group.id));
        },
        assignAnggota() {
            this.$inertia.visit(
                route("group.anggota.remove", [2, 5]),
                { method: "delete", preserveScroll: true }
            );
        },
        detail(groupId) {
            console.log("ini Detail" + groupId)
            console.log(this.route('group.index'))
            window.location.href = this.route('group.show', groupId);
        },
    }, data() {
        return {
            showAddModal: false
        };
    },
    props: {
        groups: Object,
    },

});
</script>
