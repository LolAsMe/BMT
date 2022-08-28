<template>
  <app-layout title="Ini test">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Ini test
      </h2>
    </template>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          Transaksi
        </div>
        {{transaksi}}
        <div class="block">
            <button class="block">setoran</button>
            <button class="block">penarikan</button>
            <button class="block">pembiayaan</button>
            <button class="block">angsuran</button>
            <button class="block">pemasukan</button>
            <button class="block">pengeluaran</button>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import Welcome from "@/Jetstream/Welcome.vue";
import { Link } from "@inertiajs/inertia-vue3";
export default defineComponent({
  components: {
    AppLayout,
    Welcome,
    Link,
  },
  methods: {
  },
  props: {
    transaksi: Object,
  },
});
</script>
