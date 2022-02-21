
<template>
  <div class="flex justify-center">
    <div class="relative z-0 mb-6 w-full group">
      <label
        :for="name"
        class="
          absolute
          text-sm text-black
          dark:text-black
          duration-300
          transform
          -translate-y-6
          scale-75
          top-2
          -z-10
          origin-[0]
          peer-focus:left-0
          peer-focus:text-blue-600
          peer-focus:dark:text-blue-500
          peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0
          peer-focus:scale-75 peer-focus:-translate-y-6
        "
        >{{ Name }}</label
      >
      <select
        :name="name"
        :id="name"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        class="
          form-select
          appearance-none
          block
          w-full
          px-3
          py-1.5
          text-base
          font-normal
          text-gray-700
          bg-white bg-clip-padding bg-no-repeat
          border border-solid border-gray-300
          rounded
          transition
          ease-in-out
          m-0
          focus:text-gray-700
          focus:bg-white
          focus:border-blue-600
          focus:outline-none
          overflow-auto
        "
        aria-label="Default select example"
      >
        <option selected disabled class="bg-gray-100">{{ Name }}</option>
        <option
          v-for="option in options"
          :key="option.id"
          :value="option.id"
          :selected="option.id == modelValue"
        >
          {{ option.nama }}
        </option>
      </select>
    </div>
  </div>
</template>

<script>
import { defineComponent } from "vue";

export default defineComponent({
  props: {
    name: {
      type: String,
      default: "input",
    },
    type: {
      type: String,
      default: "text",
    },
    modelValue: {
      type: undefined,
    },
    options: {
      type: undefined,
    },
  },
  emits: ["update:modelValue"],
  computed: {
    // a computed getter
    Name() {
      // `this` points to the component instance
      let name = this.name.replace(/_/g, " ");
      return name.replace(/(^\w{1})|(\s+\w{1})/g, (letter) =>
        letter.toUpperCase()
      );
    },
  },
});
</script>
