<template>
    <div class="flex flex-row gap-4 p-4 ">
        <div class="w-full">
            <h3 class="font-bold border-b-2 mb-2 uppercase">{{ 'BRANKAS' }}
            </h3>
            <div class="relative z-0 w-full mb-6 group">
                <input type="text" name="floating_keterangan" id="floating_keterangan"
                    class="disabled:border-green-300 disabled:text-green-600 block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " required v-model="form.keterangan" />
                <label for="floating_keterangan"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Keterangan</label>
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <input type="number" name="floating_brankas" id="floating_brankas"
                    class="disabled:border-green-300 disabled:text-green-600 block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " required v-model="form.jumlah" />
                <label for="floating_brankas"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Ke
                    Brankas</label>
            </div>
            <span class="block">
                KasBRANKAS : IDR {{ (kasBrankas + form.jumlah).toString().replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g, "$1\.") }}
            </span>
            <span class="block">
                Kas BMT : IDR {{ (kasBMT - form.jumlah).toString().replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g, "$1\.") }}
            </span>
            <span class="block" v-if="form.jumlah">
                IDR {{ form.jumlah.toString().replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g, "$1\.") }}
            </span>
            <button @click="brankas" type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">BRANKAS</button>
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
            form: this.$inertia.form({ keterangan: null, jumlah: null })
        }
    },
    methods: {
        brankas() {
            console.log(this.form)
            if (this.form.jumlah < 0) {
                this.form.jumlah = - this.form.jumlah
                this.form.post(this.route('brankas.tarik'), {
                    preserveScroll: true,
                    onSuccess: () => {
                        this.form.reset();
                        this.$toast.success('Brangkas berhasil ditarik')
                    },
                })
            } else {
                this.form.post(this.route('brankas.setor'), {
                    preserveScroll: true,
                    onSuccess: () => {
                        this.form.reset();
                        this.$toast.success('Brangkas berhasil disetor')
                    },
                })
            }
        }
    },
    mounted() {
    },
    props: {
        kasBrankas: Number,
        kasBMT: Number,
    },
});
</script>
