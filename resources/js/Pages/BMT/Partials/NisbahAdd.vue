<template>
    <div>

        <v-button class="block mr-4 sm:mr-10 ml-auto mt-4" v-on:click="$refs.addModal.toggleModal()">Add</v-button>
        <v-modal :showModalF="showModal" ref="addModal">
            <template #title> Add Nisbah </template>
            <form @submit.prevent="createNisbah">
                <div @click="cariSimpanan()" class="block hover:cursor-pointer hover:text-blue-200 p-2 mb-5">
                    {{ nama ?? "Cari Simpanan" }}
                </div>
                Tanggal
                <div date-rangepicker class="flex items-center mb-5">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input name="start" type="date" v-model="form.tanggal_awal"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                            placeholder="Select date start">
                    </div>
                    <span class="mx-4 text-gray-500">to</span>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input name="end" type="date" v-model="form.tanggal_selesai"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                            placeholder="Select date end">
                    </div>
                </div>
                {{ "IDR " + form.awal.toString().replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g, "$1\.")}}
                <v-input class="mt-2" :name="'awal'" v-model="form.awal"></v-input>
                <button type="submit" class="
                            text-white
                            bg-blue-700
                            hover:bg-blue-800
                            focus:ring-4 focus:ring-blue-300
                            font-medium
                            rounded-lg
                            text-sm
                            w-full
                            sm:w-auto
                            px-5
                            py-2.5
                            text-center
                            dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800
                          ">
                    Submit
                </button>


            </form>
        </v-modal>
    </div>
</template>

<script>
import { defineComponent } from "vue";
import VButton from "@/Components/Button.vue";
import VInput from "@/Components/Input.vue";
import VModal from "@/Components/Modal.vue";
export default defineComponent({
    components: {
        VModal,
        VInput,
        VButton,
    },
    data() {
        return {
            nama: this.$window.anggota_nama,
            simpanan_id: this.$window.simpanan_id,
            form: this.$inertia.form({
                simpanan_id: "",
                tanggal_awal: "",
                tanggal_selesai: "",
                awal: "",
            }),
        };
    },
    methods: {
        async createNisbah() {
            this.form.simpanan_id = this.simpanan_id
            await this.form.post(route("nisbah.store"), {
                preserveScroll: true,
                onSuccess: () => {
                    this.$toast.success('Nisbah berhasil Ditambahkan')
                    this.form.reset();
                    this.$refs.addModal.toggleModal();
                },
            });
        },
        cariSimpanan() {
            this.$window.searchTipe = "nisbah-create"
            this.$inertia.get(route('simpanan.search2'))
        },
    },

    props: {
        showModal: {
            type: Boolean,
            default: true
        }
    },
    mounted() {
    }

});
</script>
