
<template>
  <div class="relative z-0 mb-6 w-full group">
    <input
      :type="type"
      :name="name"
      :id="name"
      :value="modelValue"
    @input="$emit('update:modelValue', $event.target.value)"
      class="
        block
        py-2.5
        px-0
        w-full
        text-sm text-black
        bg-transparent
        border-0 border-b-2 border-gray-300
        appearance-none
        dark:text-black dark:border-gray-600 dark:focus:border-blue-500
        focus:outline-none focus:ring-0 focus:border-blue-600
        peer
      "
      placeholder=" "
    />
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
        top-3
        -z-10
        origin-[0]
        peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500
        peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0
        peer-focus:scale-75 peer-focus:-translate-y-6
      "
      >{{ Name }}</label
    >
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
  },
  emits: ['update:modelValue'],
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
