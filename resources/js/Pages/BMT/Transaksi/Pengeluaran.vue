<template>
    <div class="flex ">
        <div class="w-full">
            <h3 class="font-bold border-b-2 mb-2 uppercase">{{ 'PENGELUARAN' }}
            </h3>
            <div class="relative z-0 w-full mb-6 group">
                <input type="text" name="floating_keterangan" id="floating_keterangan"
                    class="disabled:border-green-300 disabled:text-green-600 block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " required v-model="form.keterangan" />
                <label for="floating_keterangan"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Keterangan</label>
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <input type="number" name="floating_pengeluaran" id="floating_pengeluaran"
                    class="disabled:border-green-300 disabled:text-green-600 block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " required v-model="form.pengeluaran" />
                <label for="floating_pengeluaran"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Pemasukan</label>
            </div>
            <span class="block">
                IDR {{  form.pengeluaran.toString().replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g, "$1\.") }}
            </span>
            <button @click="pengeluaran" type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">PENGELUARAN</button>
        </div>
    </div>
</template>

<script>
import { defineComponent } from "vue";

export default defineComponent({
    components: {
    },
    props: {
    },
    data() {
        return {
            form: this.$inertia.form({ keterangan: null, pengeluaran: 0 })
        }
    },
    methods: {
        pengeluaran() {
            console.log(this.form)
            this.form.post(this.route('pengeluaran'))
        }
    },
    mounted() {

    }
});
</script>
