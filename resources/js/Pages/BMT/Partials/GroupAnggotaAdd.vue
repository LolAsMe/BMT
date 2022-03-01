<template>
  <div>
    <v-button class="block mr-4 sm:mr-10 ml-auto mt-4" v-show="showAdd"
      >Add</v-button
    >
    <form @submit.prevent="searchAnggota()">
      <div class="flex pt-2 px-2">
        <v-input
          class="odd:bg-gray-100"
          :name="'ID'"
          v-model="form.id"
        ></v-input>
        <v-input
          class="odd:bg-gray-100"
          :name="'kode'"
          v-model="form.kode"
        ></v-input>
        <v-input
          class="odd:bg-gray-100"
          :name="'nama'"
          v-model="form.nama"
        ></v-input>
        <v-input
          class="odd:bg-gray-100"
          :name="'alamat'"
          v-model="form.alamat"
        ></v-input>
        <v-input
          class="odd:bg-gray-100"
          :name="'no_rekening'"
          v-model="form.no_rekening"
        ></v-input>
      </div>
      <button
        type="submit"
        class="
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
        "
      >
        Search
      </button>
    </form>
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
            No Rekening
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
            Alamat
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
              >Add</span
            >
          </th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y divide-gray-200">
        <tr v-for="anggota in $inertia.page.props.anggotas" :key="anggota.id">
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
          <td class="px-6 py-4 whitespace-nowrap text-sm text-black">
            {{ anggota.simpanan.kode }}
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-black">
            {{ anggota.alamat }}
          </td>
          <td
            class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium"
          >
            <button
              @click="addAnggota(anggota.id)"
              class="
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
              "
            >
              Add
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import { defineComponent } from "vue";
import VButton from "@/Components/Button.vue";
import VInput from "@/Components/Input.vue";
import VModal from "@/Components/Modal.vue";
import VCard from "@/Components/Card.vue";

export default defineComponent({
  components: {
    VModal,
    VCard,
    VInput,
    VButton,
  },
  data() {
    return {
      showAdd: false,
      form: this.$inertia.form({
        id: undefined,
        kode: undefined,
        nama: undefined,
        alamat: undefined,
        no_rekening: undefined,
      }),
    };
  },
  mounted() {
    //   console.log(this.$inertia.page.props.parameter)
    this.form.id = this.$inertia.page.props.parameter.id;
    this.form.kode = this.$inertia.page.props.parameter.kode;
    this.form.alamat = this.$inertia.page.props.parameter.alamat;
    this.form.nama = this.$inertia.page.props.parameter.nama;
    this.form.no_rekening = this.$inertia.page.props.parameter.no_rekening;
  },
  methods: {
    addAnggota(id) {
      //   this.form.viit(
      //     route("group.anggota.add", [this.$inertia.page.props.group, id]),
      //     {
      //       preserveScroll: true,
      //     }
      //   );
      //   this.$Inertia.reload({ only: ['anggotas'] })

      this.$inertia.visit(
        route("group.anggota.add", [this.$inertia.page.props.group, id]),
        { method: "post", preserveScroll: true }
      );
    },
    searchAnggota() {
      let parameter = {};
      parameter.id = this.form.id ? this.form.id : undefined;
      parameter.kode = this.form.kode ? this.form.kode : undefined;
      parameter.alamat = this.form.alamat ? this.form.alamat : undefined;
      parameter.nama = this.form.nama ? this.form.nama : undefined;
      parameter.no_rekening = this.form.no_rekening
        ? this.form.no_rekening
        : undefined;
      //   this.form.id ? this.parameter.id = this.form.id : this.parameter.id = undefined;
      this.$inertia.visit(
        route("group.show", [{ id: this.$inertia.page.props.group.id }]),
        {
          data: parameter,
          preserveScroll: true,
        }
      );
    },
    async createGroup() {
      await this.form.post(route("group.store"), {
        preserveScroll: true,
        onSuccess: () => {
          this.form.reset();
          this.$refs.addModal.toggleModal();
        },
      });
    },
  },
});
</script>
