<template>
    <div>
        <v-button class="block mr-4 sm:mr-10 ml-auto mt-4" v-on:click="$refs.addModal.toggleModal()">Add</v-button>
        <v-modal ref="addModal" :showModalF="searchShow">
            <template #title> Add Group </template>
            <form @submit.prevent="createGroup">
                <div @click="cariKaryawan()" class="block hover:cursor-pointer hover:text-blue-200 p-2 mb-5">
                    {{ nama?"Karyawan : "+nama : "Cari Karyawan" }}
                </div>
                <v-input :name="'nama'" v-model="form.nama"></v-input>
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
            form: this.$inertia.form({
                karyawan_id: "",
                nama: "",
            }),
            searchShow: false,
            nama: this.$window.karyawan_nama,
            karyawan_id: this.$window.karyawan_id,
        };
    },
    methods: {
        async createGroup() {
            this.form.karyawan_id = this.karyawan_id
            await this.form.post(route("group.store"), {
                preserveScroll: true,
                onSuccess: () => {
                    this.form.reset();
                    this.$refs.addModal.toggleModal();
                },
            });
        },
        cariKaryawan() {
            this.$window.searchTipe = "karyawan-create"
            this.$inertia.get(route('karyawan.index'))
        },
    },
    props: {
        showModal: {
            type: Boolean,
            default: true
        }
    },
    mounted() {
        console.log(!!this.$window.showAddGroupModal);
        console.log(this.$window.anggota_nama);
        console.log(this.$window.karyawan_id);
        if(this.searchShow = !!this.$window.showAddGroupModal){
            this.$refs.addModal.toggleModal()
        };
    }
});
</script>
