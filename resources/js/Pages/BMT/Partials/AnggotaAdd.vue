<template>
    <div>
        <v-button class="mt-4" v-on:click="$refs.addModal.toggleModal()">Add</v-button>
        <v-modal ref="addModal">
            <template #title> Add Anggota </template>
            <form @submit.prevent="createAnggota">
                <v-input :name="'kode'" v-model="form.kode"></v-input>
                <v-input :name="'nama'" v-model="form.nama"></v-input>
                <v-input :name="'alamat'" v-model="form.alamat"></v-input>
                <v-input :name="'telepon'" v-model="form.telepon"></v-input>
                <v-input :name="'pekerjaan'" v-model="form.pekerjaan"></v-input>
                <v-input :name="'tempat_lahir'" v-model="form.tempat_lahir"></v-input>
                <v-input :type="'date'" :name="'form.tanggal_lahir'" :modelValue="form.tanggal_lahir"
                    v-model="form.tanggal_lahir"></v-input>
                <v-input :name="'nama_ibu_kandung'" v-model="form.nama_ibu_kandung"></v-input>
                <label for="jenis_kelamin">Jenis Kelamin : </label>
                <select id="jenis_kelamin" v-model="form.jenis_kelamin" class="mb-4">
                    <option selected value="pria">Pria</option>
                    <option value="wanita">Wanita</option>
                </select>
                <v-input :name="'keterangan'" v-model="form.keterangan"></v-input>
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
                kode: "",
                nama: "",
                alamat: "",
                jenis_kelamin: "pria",
                telepon: "",
                pekerjaan: "",
                tempat_lahir: "",
                tanggal_lahir: "",
                nama_ibu_kandung: "",
                pekerjaan: "",
                keterangan: "",
            }),
        };
    },
    methods: {
        async createAnggota() {
            console.log('create anggota')
            console.log(route("anggota.store"))
            await this.form.post(route("anggota.store"), {
                preserveScroll: true,
                onSuccess: () => {
            this.$toast.success('Anggota berhasil Ditambahkan')
                    this.form.reset();
                    this.$refs.addModal.toggleModal();
                },
            });
        },
    },
});
</script>
