<template>
  <app-layout title="Karyawan">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Karyawan
      </h2>
    </template>
    <v-button
      class="block mr-4 sm:mr-10 ml-auto mt-4"
      v-on:click="toggleModal()"
      >Add</v-button
    >
    <div
      v-if="showModal"
      class="
        overflow-y-auto overflow-x-hidden
        absolute
        right-0
        left-0
        top-4
        z-50
        justify-center
        items-center
        h-modal
        md:h-full md:inset-0
      "
    >
      <div class="relative w-auto my-6 mx-auto max-w-3xl">
        <!--content-->
        <div
          class="
            border-0
            rounded-lg
            shadow-lg
            relative
            flex flex-col
            w-full
            bg-white
            outline-none
            focus:outline-none
          "
        >
          <!--header-->
          <div
            class="
            sm
              flex
              items-start
              justify-between
              p-5
              border-b border-solid border-blueGray-200
              rounded-t
            "
          >
            <h3 class="text-3xl font-semibold">Add Anggota</h3>
            <button
              class="
                p-1
                ml-auto
                bg-transparent
                border-0
                text-black
                opacity-5
                float-right
                text-xl
                leading-none
                font-semibold
                outline-none
                focus:outline-none
              "
              v-on:click="toggleModal()"
            >
              <span
                class="
                  bg-transparent
                  text-black
                  opacity-5
                  h-6
                  w-6
                  text-2xl
                  block
                  outline-none
                  focus:outline-none
                "
              >
                ×
              </span>
            </button>
          </div>
          <!--body-->
          <div class="relative p-6 flex-auto">
              <form>
  <div class="relative z-0 mb-6 w-full group">
      <input type="email" name="floating_email" class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
      <label for="floating_email" class="absolute text-sm text-black dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email address</label>
  </div>
  <div class="relative z-0 mb-6 w-full group">
      <input type="password" name="floating_password" id="floating_password" class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
      <label for="floating_password" class="absolute text-sm text-black dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
  </div>
  <div class="relative z-0 mb-6 w-full group">
      <input type="password" name="repeat_password" id="floating_repeat_password" class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
      <label for="floating_repeat_password" class="absolute text-sm text-black dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Confirm password</label>
  </div>
  <div class="grid xl:grid-cols-2 xl:gap-6">
    <div class="relative z-0 mb-6 w-full group">
        <input type="text" name="floating_first_name" id="floating_first_name" class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
        <label for="floating_first_name" class="absolute text-sm text-black dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">First name</label>
    </div>
    <div class="relative z-0 mb-6 w-full group">
        <input type="text" name="floating_last_name" id="floating_last_name" class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
        <label for="floating_last_name" class="absolute text-sm text-black dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Last name</label>
    </div>
  </div>
  <div class="grid xl:grid-cols-2 xl:gap-6">
    <div class="relative z-0 mb-6 w-full group">
        <input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" name="floating_phone" id="floating_phone" class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
        <label for="floating_phone" class="absolute text-sm text-black dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Phone number (123-456-7890)</label>
    </div>
    <div class="relative z-0 mb-6 w-full group">
        <input type="text" name="floating_company" id="floating_company" class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
        <label for="floating_company" class="absolute text-sm text-black dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Company (Ex. Google)</label>
    </div>
  </div>
  <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
</form>
            <p class="my-4 text-blueGray-500 text-lg leading-relaxed">
              I always felt like I could do anything. That’s the main thing
              people are controlled by! Thoughts- their perception of
              themselves! They're slowed down by their perception of themselves.
              If you're taught you can’t do anything, you won’t do anything. I
              was taught I could do everything.
            </p>
          </div>
          <!--footer-->
          <div
            class="
              flex
              items-center
              justify-end
              p-6
              border-t border-solid border-blueGray-200
              rounded-b
            "
          >
            <button
              class="
                text-blue-500
                bg-transparent
                border border-solid border-blue-500
                hover:bg-red-500 hover:text-white
                active:bg-red-600
                font-bold
                uppercase
                text-sm
                px-6
                py-3
                rounded
                outline-none
                focus:outline-none
                mr-1
                mb-1
                ease-linear
                transition-all
                duration-150
              "
              type="button"
              v-on:click="toggleModal()"
            >
              Close
            </button>
            <button
              class="
                text-blue-500
                background-transparent
                font-bold
                uppercase
                px-6
                py-2
                text-sm
                outline-none
                focus:outline-none
                mr-1
                mb-1
                ease-linear
                transition-all
                duration-150
              "
              type="button"
              v-on:click="toggleModal()"
            >
              Save Changes
            </button>
          </div>
        </div>
      </div>
    </div>
    <div v-if="showModal" class="opacity-25 fixed inset-0 z-40 bg-black"></div>
    <div class="py-2">
      <v-card>
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
                Name
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
                Title
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
                Status
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
                Role
              </th>
              <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">Edit</span>
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            <tr>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="flex-shrink-0 h-10 w-10">
                    <img
                      class="h-10 w-10 rounded-full"
                      src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60"
                      alt=""
                    />
                  </div>
                  <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900">
                      Jane Cooper
                    </div>
                    <div class="text-sm text-black">
                      jane.cooper@example.com
                    </div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">
                  Regional Paradigm Technician
                </div>
                <div class="text-sm text-black">Optimization</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span
                  class="
                    px-2
                    inline-flex
                    text-xs
                    leading-5
                    font-semibold
                    rounded-full
                    bg-green-100
                    text-green-800
                  "
                >
                  Active
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-black">
                Admin
              </td>
              <td
                class="
                  px-6
                  py-4
                  whitespace-nowrap
                  text-right text-sm
                  font-medium
                "
              >
                <a href="#" class="text-indigo-600 hover:text-indigo-900"
                  >Edit</a
                >
              </td>
              <td
                class="
                  px-6
                  py-4
                  whitespace-nowrap
                  text-right text-sm
                  font-medium
                "
              >
                <a href="#" class="text-indigo-600 hover:text-indigo-900"
                  >Delete</a
                >
              </td>
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
import Welcome from "@/Jetstream/Welcome.vue";
import VButton from "@/Components/Button.vue";
import VCard from "@/Components/Card.vue";
import VModal from "@/Components/Modal.vue";

export default defineComponent({
  components: {
    AppLayout,
    Welcome,
    VModal,
    VCard,
    VButton,
  },
  data() {
    return {
      showModal: false,
    };
  },
  methods: {
    toggleModal: function () {
      this.showModal = !this.showModal;
    },
  },
});
</script>
