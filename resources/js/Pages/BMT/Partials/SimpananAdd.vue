<template>
    <div class="flex">
        <v-button v-on:click="$refs.addModal.toggleModal()">Add</v-button>
        <v-modal ref="addModal">
            <template #title> Simpanan Baru </template>
            <form @submit.prevent="Simpanan">
                <v-input :name="'kode'" v-model="form.kode"></v-input>
                <div class="mb-5">
                    <label for="jenis_simpanan">Jenis Simpanan: </label>
                    <select name="jenis_simpanan" id="jenis_simpanan" v-model="form.jenis_simpanan_id">
                        <option v-for="jenis in jenisSimpanan" :key="jenis.id" :value="jenis.id">{{ jenis.nama }}
                        </option>
                    </select>
                </div>
                <div class="mb-5">
                    <label for="anggota">Pilih Anggota: </label>
                    <select name="anggota" id="anggota" v-model="form.anggota_id">
                        <option v-for="anggota in anggotas" :key="anggota.id" :value="anggota.id">{{ anggota.nama }}
                        </option>
                    </select>
                </div>
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
    props: {
        anggotas:Object,
        jenisSimpanan:Object,
    },
    data() {
        return {
            form: this.$inertia.form({
                kode: "",
                anggota_id: this.anggotas[0].id,
                jenis_simpanan_id: 1,
                tanggal_pembuatan: new Date().toJSON().substring(0, 10),
                keterangan: "",
            }),
            anggotaTanpaSimpanan: []
        };
    },
    methods: {
        async Simpanan() {
            await this.form.post(route("simpanan.store"), {
                preserveScroll: true,
                onSuccess: () => {
                    this.form.reset();
                    this.$refs.addModal.toggleModal();
                },
            });
        },
    },
    mounted() {

    }
});
</script>
