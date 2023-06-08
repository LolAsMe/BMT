<template>
    <div class="flex flex-col gap-4 p-4">
        <div class="">
            <h3 class="font-bold border-b-2 mb-2 uppercase">{{ onePembiayaan ? 'Angsur Pembiayaan' : 'Cari Pembiayaan' }}
            </h3>
            <div class="table w-full" v-if="onePembiayaan">
                <div class="table-row-group">
                    <div class="table-row">
                        <div class="table-cell">ID</div>
                        <div class="table-cell">:</div>
                        <div class="table-cell">{{ onePembiayaan.id }}</div>
                    </div>
                    <div class="table-row">
                        <div class="table-cell">No Rekening</div>
                        <div class="table-cell">:</div>
                        <div class="table-cell">{{ onePembiayaan.kode }}</div>
                    </div>
                    <div class="table-row">
                        <div class="table-cell">Jenis Pembiayaan</div>
                        <div class="table-cell">:</div>
                        <div class="table-cell">Pembiayaan {{ onePembiayaan.jenis_pembiayaan.nama }}</div>
                    </div>
                    <div class="table-row">
                        <div class="table-cell">Tanggal Pinjam</div>
                        <div class="table-cell">:</div>
                        <div class="table-cell">{{ onePembiayaan.tanggal_pinjam }}</div>
                    </div>
                    <div class="table-row">
                        <div class="table-cell">Tanggal Jatuh Tempo</div>
                        <div class="table-cell">:</div>
                        <div class="table-cell">{{ onePembiayaan.tanggal_jatuh_tempo }}</div>
                    </div>
                    <div class="table-row">
                        <div class="table-cell">Jumlah Pinjaman</div>
                        <div class="table-cell">:</div>
                        <div class="table-cell">{{ toRupiah(onePembiayaan.jumlah) }}</div>
                    </div>
                    <div class="table-row">
                        <div class="table-cell">Pokok</div>
                        <div class="table-cell">:</div>
                        <div class="table-cell">{{ toRupiah(onePembiayaan.pokok) }}</div>
                    </div>
                    <div class="table-row">
                        <div class="table-cell">Jasa</div>
                        <div class="table-cell">:</div>
                        <div class="table-cell">{{ toRupiah(onePembiayaan.jasa) }}</div>
                    </div>
                    <div class="table-row">
                        <div class="table-cell">Potongan Pembiayaan</div>
                        <div class="table-cell">:</div>
                        <div class="table-cell">{{ toRupiah(onePembiayaan.potongan_pembiayaan) }}</div>
                    </div>
                    <div class="table-row">
                        <div class="table-cell">Total Pembiayaan</div>
                        <div class="table-cell">:</div>
                        <div class="table-cell">{{ toRupiah(onePembiayaan.total_pembiayaan) }}</div>
                    </div>
                    <div class="table-row">
                        <div class="table-cell">Frekuensi Angsuran</div>
                        <div class="table-cell">:</div>
                        <div class="table-cell">{{ onePembiayaan.frekuensi_angsuran }}</div>
                    </div>
                    <div class="table-row">
                        <div class="table-cell">Jumlah Angsuran</div>
                        <div class="table-cell">:</div>
                        <div class="table-cell">{{ toRupiah(onePembiayaan.jumlah_angsuran) }}</div>
                    </div>
                    <div class="table-row">
                        <div class="table-cell">Angsuran Diterima</div>
                        <div class="table-cell">:</div>
                        <div class="table-cell">{{ toRupiah(onePembiayaan.angsuran_diterima) }}</div>
                    </div>
                    <div class="table-row">
                        <div class="table-cell">Nama Anggota</div>
                        <div class="table-cell">:</div>
                        <div class="table-cell">{{ onePembiayaan.anggota.nama }}</div>
                    </div>
                    <div class="table-row">
                        <div class="table-cell">Nomer Anggota</div>
                        <div class="table-cell">:</div>
                        <div class="table-cell">{{ onePembiayaan.anggota.kode }}</div>
                    </div>
                    <div class="table-row">
                        <div class="table-cell">Jenis Kelamin</div>
                        <div class="table-cell">:</div>
                        <div class="table-cell">{{ onePembiayaan.anggota.jenis_kelamin }}</div>
                    </div>
                    <div class="table-row">
                        <div class="table-cell">Jumlah Pembiayaan</div>
                        <div class="table-cell">:</div>
                        <div class="table-cell">
                            {{ "IDR " + onePembiayaan.jumlah.toString().replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g, "$1\.") }}
                        </div>
                    </div>
                    <div class="table-row">
                        <div class="table-cell">Alamat</div>
                        <div class="table-cell">:</div>
                        <div class="table-cell">{{ onePembiayaan.anggota.alamat }}</div>
                    </div>
                    <div class="table-row">
                        <div class="table-cell">Status</div>
                        <div class="table-cell">:</div>
                        <div class="table-cell " v-if="onePembiayaan.status == 'ongoing'">
                            <span class="bg-red-400 text-white">{{ onePembiayaan.status }}</span>
                        </div>
                        <div v-else class="table-cell "><span class="bg-green-400 text-white">{{ onePembiayaan.status
                        }}</span>
                        </div>
                    </div>

                </div>
                <div class=" relative z-0 w-full group my-5" v-if="onePembiayaan && onePembiayaan.status == 'ongoing'">
                    <input
                        class="disabled:border-green-300 disabled:text-green-600 block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        type="text" v-model="keterangan">
                    <label for="floating_keterangan"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Keterangan</label>
                </div>
                <button
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                    @click="angsur" v-if="onePembiayaan && onePembiayaan.status == 'ongoing'">
                    ANGSUR
                </button>
                <button
                    class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900"
                    @click="resetPembiayaan" v-if="onePembiayaan">
                    RESET
                </button>
            </div>
            <form v-if="!onePembiayaan">
                <div class="relative z-0 w-full mb-6 group">
                    <input type="text" name="floating_nama" id="floating_nama"
                        class="disabled:border-green-300 disabled:text-green-600 block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required v-model="nama" @input="filterAnggota" :disabled="onePembiayaan" />
                    <label for="floating_nama"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama</label>
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <input type="text" name="floating_alamat" id="floating_alamat"
                        class="disabled:border-green-300 disabled:text-green-600 block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required v-model="alamat" @input="filterAnggota" :disabled="onePembiayaan" />
                    <label for="floating_alamat"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Alamat</label>
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <input type="text" name="floating_kode_pembiayaan" id="floating_kode_pembiayaan"
                        class=" disabled:border-green-300 disabled:text-green-600 block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required v-model="kode" @input="filterAnggota" :disabled="onePembiayaan" />
                    <label for="floating_kode_pembiayaan"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Kode
                        Pembiayaan</label>
                </div>
                <div class="relative z-0 w-full mb-6 group" v-if="onePembiayaan">
                    <input type="text" name="floating_jenis_pembiayaan" id="floating_jenis_pembiayaan"
                        class="disabled:border-green-300 disabled:text-green-600 block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required v-model="jenis_pembiayaan" :disabled="onePembiayaan" />
                    <label for="floating_jenis_pembiayaan"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Jenis
                        Pembiayaan</label>
                </div>
                <div class="relative z-0 w-full group mb-6" v-if="onePembiayaan">
                    <input type="text" name="floating_total_pembiayaan" id="floating_total_pembiayaan"
                        class="disabled:border-green-300 disabled:text-green-600 block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required v-model="onePembiayaan.total_pembiayaan" :disabled="onePembiayaan" />
                    <label for="floating_total_pembiayaan"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Angsuran</label>
                </div>
                <div class="relative z-0 w-full group mb-6" v-if="onePembiayaan">
                    <input type="text" name="floating_jumlah_angsuran" id="floating_jumlah_angsuran"
                        class="disabled:border-green-300 disabled:text-green-600 block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required v-model="onePembiayaan.jumlah_angsuran" :disabled="onePembiayaan" />
                    <label for="floating_jumlah_angsuran"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Angsuran</label>
                </div>
                <div class="relative z-0 w-full group mb-6" v-if="onePembiayaan">
                    <input type="text" name="floating_tanggal_pinjam" id="floating_tanggal_pinjam"
                        class="disabled:border-green-300 disabled:text-green-600 block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required v-model="onePembiayaan.tanggal_pinjam" :disabled="onePembiayaan" />
                    <label for="floating_tanggal_pinjam"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Tanggal
                        Pinjam</label>
                </div>
                <div class="relative z-0 w-full group mb-6" v-if="onePembiayaan">
                    <input type="text" name="floating_tanggal_jatuh_tempo" id="floating_tanggal_jatuh_tempo"
                        class="disabled:border-green-300 disabled:text-green-600 block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required v-model="onePembiayaan.tanggal_jatuh_tempo" :disabled="onePembiayaan" />
                    <label for="floating_tanggal_jatuh_tempo"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Tanggal
                        Jatuh Tempo</label>
                </div>
                <div class="relative z-0 w-full group mb-6" v-if="onePembiayaan">
                    <input type="text" name="floating_jumlah_angsuran" id="floating_jumlah_angsuran"
                        class="disabled:border-green-300 disabled:text-green-600 block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required v-model="jumlah_angsuran" :disabled="onePembiayaan" />
                    <label for="floating_jumlah_angsuran"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Angsuran</label>
                </div>
                <div class="relative z-0 w-full group mb-6" v-if="onePembiayaan">

                    <input
                        class="disabled:border-green-300 disabled:text-green-600 block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        type="text" v-model="keterangan">
                    <label for="floating_keterangan"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Keterangan</label>
                </div>
                <span class="relative float-right text-blue-400 cursor-pointer z-10" @click="resetPembiayaan"
                    v-if="onePembiayaan">
                    reset
                </span>
                <button v-if="onePembiayaan" type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">ANGSUR</button>
            </form>
        </div>
        <div class="" v-if="onePembiayaan">
            <table class="min-w-full divide-y divide-gray-200 mt-5">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="
                                            px-6
                                            py-3
                                            text-left text-xs
                                            font-medium
                                            text-gray-500
                                            uppercase
                                            tracking-wider
                                            ">
                            Angsuran_ke
                        </th>
                        <th scope="col" class="
                                            px-6
                                            py-3
                                            text-left text-xs
                                            font-medium
                                            text-gray-500
                                            uppercase
                                            tracking-wider
                                            ">
                            Tanggal Transaksi
                        </th>
                        <th scope="col" class="
                                            px-6
                                            py-3
                                            text-left text-xs
                                            font-medium
                                            text-gray-500
                                            uppercase
                                            tracking-wider
                                            ">
                            Jumlah Angsuran
                        </th>
                        <th scope="col" class="
                                            px-6
                                            py-3
                                            text-left text-xs
                                            font-medium
                                            text-gray-500
                                            uppercase
                                            tracking-wider
                                            ">
                            Akumulasi Angsuran
                        </th>
                        <th scope="col" class="
                                            px-6
                                            py-3
                                            text-left text-xs
                                            font-medium
                                            text-gray-500
                                            uppercase
                                            tracking-wider
                                            ">
                            Total Tanggungan
                        </th>
                        <th scope="col" class="
                                            px-6
                                            py-3
                                            text-left text-xs
                                            font-medium
                                            text-gray-500
                                            uppercase
                                            tracking-wider
                                            ">
                            keterangan
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr v-for="(detail, index) in onePembiayaan.detail" :key="detail.id" @dblclick="doFilter"
                        :class="index % 2 == 0 ? 'bg-white' : 'bg-gray-50'">
                        <td class="text-center">{{ detail.angsuran_ke }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="ml-0">
                                    <div class="text-sm text-black">
                                        {{ detail.tanggal_transaksi.substring(0, 10) }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="ml-0">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ toRupiah(detail.jumlah) }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="ml-0">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ toRupiah(detail.akumulasi_angsuran) }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="ml-0">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ toRupiah(detail.total_tanggungan) }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="ml-0">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ detail.keterangan }}
                                    </div>
                                    <div class="text-sm text-black">
                                        {{ detail.karyawan_id }}
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="" v-if="!onePembiayaan">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="
                                                                    px-6
                                                                    py-3
                                                                    text-left text-xs
                                                                    font-medium
                                                                    text-gray-500
                                                                    uppercase
                                                                    tracking-wider
                                                                    ">
                            No
                        </th>
                        <th scope="col" class="
                                                                    px-6
                                                                    py-3
                                                                    text-left text-xs
                                                                    font-medium
                                                                    text-gray-500
                                                                    uppercase
                                                                    tracking-wider
                                                                    ">
                            Anggota
                        </th>
                        <th scope="col" class="
                                                                    px-6
                                                                    py-3
                                                                    text-left text-xs
                                                                    font-medium
                                                                    text-gray-500
                                                                    uppercase
                                                                    tracking-wider
                                                                    ">
                            Jumlah
                        </th>
                        <th scope="col" class="
                                                                    px-6
                                                                    py-3
                                                                    text-left text-xs
                                                                    font-medium
                                                                    text-gray-500
                                                                    uppercase
                                                                    tracking-wider
                                                                    ">
                            Angsuran
                        </th>
                        <th scope="col" class="
                                                                    px-6
                                                                    py-3
                                                                    text-left text-xs
                                                                    font-medium
                                                                    text-gray-500
                                                                    uppercase
                                                                    tracking-wider
                                                                    ">
                            Keterangan
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr class="hover:bg-slate-100 cursor-pointer"
                        v-for="(pembiayaan, index) in $inertia.page.props.pembiayaans" :key="pembiayaan.id"
                        @dblclick="applyPembiayaan(pembiayaan)">
                        <td class="text-center">{{ index + 1 }}</td>
                        <td class="whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="ml-0">
                                    <div class="text-xs font-normal text-gray-900">
                                        {{ pembiayaan.anggota.nama }} <span
                                            class="bg-green-100 rounded-full border-2 border-green-100">
                                            {{ pembiayaan.anggota.kode
                                            }} </span>
                                    </div>
                                    <div class="text-xs text-black">
                                        {{ pembiayaan.anggota.alamat }}
                                    </div>
                                    <div class="text-sm font-normal text-gray-900">
                                        {{ pembiayaan.kode }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="ml-0">
                                    <div class="text-sm font-normal text-gray-900 border-b-2 border-red-200">
                                        Jumlah :{{ "IDR " +
                                            pembiayaan.jumlah.toString().replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g, "$1\.") }}
                                    </div>
                                    <div class="text-sm font-normal text-gray-900 border-t-2 border-red-200">
                                        Total :{{ "IDR " +
                                            pembiayaan.total_pembiayaan.toString().replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g,
                                                "$1\.") }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="ml-0">
                                    <div class="text-sm font-normal text-gray-900 border-b-2 border-red-200">
                                        Frekuensi :{{ pembiayaan.frekuensi_angsuran }}
                                    </div>
                                    <div class="text-sm font-normal text-gray-900 border-t-2 border-red-200">
                                        Angsuran :{{ "IDR " +
                                            pembiayaan.jumlah_angsuran.toString().replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g,
                                                "$1\.") }}
                                    </div>
                                    <div class="text-sm font-normal text-gray-900 border-t-2 border-red-200">
                                        Angsuran Diterima :{{ Math.ceil(pembiayaan.angsuran_diterima / pembiayaan.jumlah_angsuran)
                                        }}
                                    </div>
                                </div>
                            </div>
                        </td>

                        <td class="whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="ml-0">
                                    <div class="text-sm font-normal text-gray-900 border-b-2 border-red-200">
                                        Keterangan :{{ pembiayaan.keterangan }}
                                    </div>
                                    <div class="text-sm font-normal text-gray-900 border-t-2 border-red-200">
                                        Status :<span
                                            :class="pembiayaan.status == 'ongoing' ? 'bg-red-100  rounded-lg' : 'bg-green-100  rounded-lg'">{{
                                                pembiayaan.status }}</span>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
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
            onePembiayaan: null,
            nama: null,
            alamat: null,
            kode: null,
            keterangan: null

        };
    },
    methods: {
        filterAnggota() {
            this.$inertia.reload({ data: { nama: this.nama, alamat: this.alamat, kode: this.kode }, only: ['simpanans','pembiayaans'] })
        },
        applyPembiayaan(pembiayaan) {
            console.log('appy')
            this.nama = pembiayaan.anggota.nama
            this.alamat = pembiayaan.anggota.alamat
            this.kode = pembiayaan.kode
            this.keterangan = null
            this.$inertia.reload({ data: { nama: this.nama, alamat: this.alamat, kode: this.kode }, only: ['simpanans','pembiayaans'] })
            this.onePembiayaan = pembiayaan
        },
        reset() {
            this.nama = null,
                this.kode = null,
                this.alamat = null
            this.$inertia.reload({ data: { nama: this.nama, alamat: this.alamat, kode: this.kode }, only: ['simpanans','pembiayaans'] })

        },
        resetPembiayaan() {
            this.nama = null,
                this.kode = null,
                this.alamat = null
            this.onePembiayaan = null,
                this.jumlah_angsuran = null,
                this.jenis_pembiayaan = null
            this.$inertia.reload({ data: { nama: this.nama, alamat: this.alamat, kode: this.kode }, only: ['simpanans','pembiayaans'] })
        },
        toRupiah(jumlah) {
            return "IDR " + jumlah.toString().replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g, "$1\.")
        },
        async angsur() {
            let form = this.$inertia.form({
            })
            await form.post(route("angsur", this.onePembiayaan.id), {
                preserveScroll: true,
                onSuccess: () => {
                    this.$inertia.reload({ data: { nama: this.nama, alamat: this.alamat, kode: this.kode }, only: ['simpanans','pembiayaans'] })
                    this.applyPembiayaan(this.$inertia.page.props.pembiayaans[0])
                    this.$toast.success('Pembiayaan berhasil ditambahkan')
                    this.jumlah_angsur = null
                    console.log(this.$inertia.page.props.pembiayaans[0])

                },
            });

        },
    },
    computed: {
        total() {
            return this.onePembiayaan.jumlah - this.jumlah_angsur;
        },
        totalIDR() {
            return this.toRupiah(this.total)
        }
    },
    mounted() {

    }
});
</script>
