<template>
  <app-layout title="Dashboard">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Dashboard
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <div class="block">
            <div><Link :href="route('anggota.index')">Anggota</Link></div>
            <div><Link :href="route('anggunan.index')">Anggunan</Link></div>
            <div><Link :href="route('cetak.index')">Cetak</Link></div>
            <div><Link :href="route('group.index')">Group</Link></div>
            <div><Link :href="route('jabatan.index')">Jabatan</Link></div>
            <div>
              <Link :href="route('jenis-pembiayaan.index')"
                >Jenis pembiayaan</Link
              >
            </div>
            <div>
              <Link :href="route('jenis-simpanan.index')">Jenis Simpanan</Link>
            </div>
            <div><Link :href="route('karyawan.index')">Karyawan</Link></div>
            <div><Link :href="route('nisbah.index')">Nisbah</Link></div>
            <div><Link :href="route('pembiayaan.index')">Pembiayaan</Link></div>
            <div><Link :href="route('simpanan.index')">Simpanan</Link></div>
            <!-- <div><Link :href="route('transaksi.index')">Transaksi</Link></div> -->
            <!-- <div><Link :href="route('user.index')">User</Link></div> -->
          </div>
          <div>List Transaksi keuangan</div>
          <div class="simpanan">setoran simnpanan Penarikan</div>
          <div class="ansuran">Pinjaman Angsurn</div>
          <div class="pemasukan">Pemasukan Pengeluaran</div>
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
});
</script>
