<template>
    <v-modal ref="editModal">
        <template #title> Edit User </template>
        <form @submit.prevent="edit">
            <v-input :name="'username'" v-model="form.name"></v-input>
            <v-input type="email" :name="'email'" v-model="form.email"></v-input>
            <v-input :name="'password'" v-model="form.password"></v-input>
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
</template>

<script>
import { defineComponent } from "vue";
import VButton from "@/Components/Button.vue";
import VInput from "@/Components/Input.vue";
import VSelect from "@/Components/InputSelect.vue";
import VModal from "@/Components/Modal.vue";

export default defineComponent({
    components: {
        VModal,
        VInput,
        VSelect,
        VButton,
    },
    data() {
        return {
            form: this.$inertia.form({
                name: "",
                email: "",
                password: "",
            }),
            karyawan: null,
        };
    },
    methods: {
        show(karayawan) {
            this.user = karayawan.user;
            this.form.name = karayawan.user.name;
            this.form.email = karayawan.user.email;
            this.form.password = null;
            this.$refs.editModal.toggleModal();
        },
        edit() {

            console.log('tset')
            this.form.put(route("userupdate", this.user.id), {
                preserveScroll: true,
                onSuccess: () => {
                    this.$toast.success('Karyawan berhasil diedit')
                    this.form.reset();
                    this.$refs.editModal.toggleModal();
                },
            });
        },
    },
});
</script>
