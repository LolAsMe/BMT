<template>
    <app-layout title="Dashboard">
        <div class="py-9">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class=" block xl:grid-cols-6 sm:grid-cols-3 sm:grid gap-3">
                    <div class="block m-5 bg-white rounded-3xl drop-shadow-xl p-4 h-4/5" v-if="attribute.saldoAwal">
                        <svg class="mb-3" width="40px" height="40px" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path opacity="0.1" fill-rule="evenodd" clip-rule="evenodd"
                                    d="M20.4142 9.58579C19.8284 9 18.8856 9 17 9H11C9.11438 9 8.17157 9 7.58579 9.58579C7 10.1716 7 11.1144 7 13V15C7 16.8856 7 17.8284 7.58579 18.4142C8.17157 19 9.11438 19 11 19H17C18.8856 19 19.8284 19 20.4142 18.4142C21 17.8284 21 16.8856 21 15V13C21 11.1144 21 10.1716 20.4142 9.58579ZM14 16C15.1046 16 16 15.1046 16 14C16 12.8954 15.1046 12 14 12C12.8954 12 12 12.8954 12 14C12 15.1046 12.8954 16 14 16Z"
                                    fill="#323232"></path>
                                <path
                                    d="M7 13C7 11.1144 7 10.1716 7.58579 9.58579C8.17157 9 9.11438 9 11 9H14H17C18.8856 9 19.8284 9 20.4142 9.58579C21 10.1716 21 11.1144 21 13V14V15C21 16.8856 21 17.8284 20.4142 18.4142C19.8284 19 18.8856 19 17 19H14H11C9.11438 19 8.17157 19 7.58579 18.4142C7 17.8284 7 16.8856 7 15V14V13Z"
                                    stroke="#323232" stroke-width="2" stroke-linejoin="round"></path>
                                <path
                                    d="M7 15V15C5.11438 15 4.17157 15 3.58579 14.4142C3.58579 14.4142 3.58579 14.4142 3.58579 14.4142C3 13.8284 3 12.8856 3 11L3 9C3 7.11438 3 6.17157 3.58579 5.58579C4.17157 5 5.11438 5 7 5L13 5C14.8856 5 15.8284 5 16.4142 5.58579C17 6.17157 17 7.11438 17 9V9"
                                    stroke="#323232" stroke-width="2" stroke-linejoin="round"></path>
                                <path
                                    d="M16 14C16 15.1046 15.1046 16 14 16C12.8954 16 12 15.1046 12 14C12 12.8954 12.8954 12 14 12C15.1046 12 16 12.8954 16 14Z"
                                    stroke="#323232" stroke-width="2"></path>
                            </g>
                        </svg>
                        <span class="block font-bold">
                            Kas BMT
                        </span>
                        <span class="block font-bold">{{ toRupiah(attribute.kasBMT.jumlah) }}</span>
                    </div>
                    <div class="block m-5 bg-white rounded-3xl drop-shadow-xl p-6 h-4/5">
                        <svg width="35px" height="35px" viewBox="0 -96.5 950 1100" class="mb-3 " version="1.1"
                            xmlns="http://www.w3.org/2000/svg" fill="#000000">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path d="M23.001272 41.890909H919.001272v899.878788H23.001272z" fill="#CFDDEC">
                                </path>
                                <path
                                    d="M919.001272 957.284848H23.001272c-8.533333 0-15.515152-6.981818-15.515151-15.515151V41.890909c0-8.533333 6.981818-15.515152 15.515151-15.515151H919.001272c8.533333 0 15.515152 6.981818 15.515152 15.515151v899.878788c0 8.533333-6.981818 15.515152-15.515152 15.515151z m-880.484848-31.030303H903.486121V57.406061H38.516424v868.848484z"
                                    fill="#131313"></path>
                                <path
                                    d="M822.807333 864.969697h-716.024242c-8.533333 0-15.515152-6.981818-15.515152-15.515152V132.654545c0-8.533333 6.981818-15.515152 15.515152-15.515151h716.024242c8.533333 0 15.515152 6.981818 15.515152 15.515151v716.8c0 8.533333-6.981818 15.515152-15.515152 15.515152z m-700.509091-31.030303h684.99394V148.169697h-684.99394v685.769697z"
                                    fill="#131313"></path>
                                <path
                                    d="M686.274 272.290909c17.842424 0 33.357576 14.739394 33.357575 33.357576v373.915151c0 17.842424-14.739394 33.357576-33.357575 33.357576-17.842424 0-33.357576-14.739394-33.357576-33.357576V305.648485c0.775758-18.618182 15.515152-33.357576 33.357576-33.357576z"
                                    fill="#E1EFFF"></path>
                                <path
                                    d="M686.274 728.436364c-26.375758 0-48.872727-21.721212-48.872728-48.872728V305.648485c0-26.375758 21.721212-48.872727 48.872728-48.872727s48.872727 21.721212 48.872727 48.872727v374.690909c0 26.375758-22.49697 48.09697-48.872727 48.09697z m0-440.630303c-9.309091 0-17.842424 7.757576-17.842425 17.842424v374.690909c0 9.309091 7.757576 17.842424 17.842425 17.842424s17.842424-7.757576 17.842424-17.842424V305.648485c0-10.084848-8.533333-17.842424-17.842424-17.842424z"
                                    fill="#131313"></path>
                                <path
                                    d="M106.783091 255.224242c18.618182 0 34.133333 15.515152 34.133333 34.133334v71.369697c0 18.618182-15.515152 34.133333-34.133333 34.133333-18.618182 0-34.133333-15.515152-34.133334-34.133333v-71.369697c0-19.393939 15.515152-34.133333 34.133334-34.133334z"
                                    fill="#E1EFFF"></path>
                                <path
                                    d="M106.783091 410.375758c-27.151515 0-49.648485-22.49697-49.648485-49.648485v-71.369697c0-27.151515 22.49697-49.648485 49.648485-49.648485s49.648485 22.49697 49.648484 49.648485v71.369697c0 27.151515-21.721212 49.648485-49.648484 49.648485z m0-139.636364c-10.084848 0-18.618182 8.533333-18.618182 18.618182v71.369697c0 10.084848 8.533333 18.618182 18.618182 18.618182s18.618182-8.533333 18.618181-18.618182v-71.369697c0-10.084848-7.757576-18.618182-18.618181-18.618182z"
                                    fill="#131313"></path>
                                <path
                                    d="M106.783091 595.006061c18.618182 0 34.133333 15.515152 34.133333 34.133333v71.369697c0 18.618182-15.515152 34.133333-34.133333 34.133333-18.618182 0-34.133333-15.515152-34.133334-34.133333v-71.369697c0-18.618182 15.515152-34.133333 34.133334-34.133333z"
                                    fill="#E1EFFF"></path>
                                <path
                                    d="M106.783091 750.157576c-27.151515 0-49.648485-22.49697-49.648485-49.648485v-71.369697c0-27.151515 22.49697-49.648485 49.648485-49.648485s49.648485 22.49697 49.648484 49.648485v71.369697c0 27.151515-21.721212 49.648485-49.648484 49.648485z m0-139.636364c-10.084848 0-18.618182 8.533333-18.618182 18.618182v71.369697c0 10.084848 8.533333 18.618182 18.618182 18.618182s18.618182-8.533333 18.618181-18.618182v-71.369697c0-10.084848-7.757576-18.618182-18.618181-18.618182z"
                                    fill="#131313"></path>
                                <path
                                    d="M384.504303 495.709091m-161.357576 0a161.357576 161.357576 0 1 0 322.715152 0 161.357576 161.357576 0 1 0-322.715152 0Z"
                                    fill="#7D8792"></path>
                                <path
                                    d="M384.504303 672.581818c-97.745455 0-176.872727-79.127273-176.872728-176.872727S286.758848 318.060606 384.504303 318.060606c97.745455 0 176.872727 79.127273 176.872727 176.872727S482.249757 672.581818 384.504303 672.581818z m0-323.490909C303.825515 349.090909 237.886121 415.030303 237.886121 495.709091c0 80.678788 65.163636 145.842424 145.842424 145.842424s145.842424-65.163636 145.842424-145.842424C530.346727 415.030303 465.183091 349.090909 384.504303 349.090909z"
                                    fill="#131313"></path>
                                <path
                                    d="M106.783091 941.769697h96.969697v48.872727c0 10.084848-7.757576 17.842424-17.842425 17.842424h-61.284848c-10.084848 0-17.842424-7.757576-17.842424-17.842424v-48.872727z"
                                    fill="#CFDDEC"></path>
                                <path
                                    d="M186.686121 1024h-61.284849c-18.618182 0-33.357576-14.739394-33.357575-33.357576v-48.872727c0-8.533333 6.981818-15.515152 15.515151-15.515152h96.969697c8.533333 0 15.515152 6.981818 15.515152 15.515152v48.872727c0 18.618182-15.515152 33.357576-33.357576 33.357576z m-64.387879-66.715152v33.357576c0 1.551515 0.775758 2.327273 2.327273 2.327273h61.284848c1.551515 0 2.327273-0.775758 2.327273-2.327273v-33.357576h-65.939394z"
                                    fill="#131313"></path>
                                <path
                                    d="M732.819454 941.769697h96.969697v48.872727c0 10.084848-7.757576 17.842424-17.842424 17.842424h-61.284848c-10.084848 0-17.842424-7.757576-17.842425-17.842424v-48.872727z"
                                    fill="#CFDDEC"></path>
                                <path
                                    d="M811.946727 1024h-61.284848c-18.618182 0-33.357576-14.739394-33.357576-33.357576v-48.872727c0-8.533333 6.981818-15.515152 15.515151-15.515152h96.969697c8.533333 0 15.515152 6.981818 15.515152 15.515152v48.872727c0 18.618182-14.739394 33.357576-33.357576 33.357576z m-63.612121-66.715152v33.357576c0 1.551515 0.775758 2.327273 2.327273 2.327273h61.284848c1.551515 0 2.327273-0.775758 2.327273-2.327273v-33.357576H748.334606zM760.746727 213.333333h-591.127273c-8.533333 0-15.515152-6.981818-15.515151-15.515151s6.981818-15.515152 15.515151-15.515152h591.127273c8.533333 0 15.515152 6.981818 15.515152 15.515152s-6.981818 15.515152-15.515152 15.515151zM760.746727 806.012121h-591.127273c-8.533333 0-15.515152-6.981818-15.515151-15.515151s6.981818-15.515152 15.515151-15.515152h591.127273c8.533333 0 15.515152 6.981818 15.515152 15.515152s-6.981818 15.515152-15.515152 15.515151z"
                                    fill="#131313"></path>
                                <path
                                    d="M384.504303 672.581818c-8.533333 0-15.515152-6.981818-15.515152-15.515151V333.575758c0-8.533333 6.981818-15.515152 15.515152-15.515152s15.515152 6.981818 15.515151 15.515152v323.490909c0 8.533333-6.981818 15.515152-15.515151 15.515151z"
                                    fill="#131313"></path>
                                <path
                                    d="M545.861879 511.224242H222.370969c-8.533333 0-15.515152-6.981818-15.515151-15.515151s6.981818-15.515152 15.515151-15.515152h323.49091c8.533333 0 15.515152 6.981818 15.515151 15.515152s-6.981818 15.515152-15.515151 15.515151z"
                                    fill="#131313"></path>
                                <path
                                    d="M270.467939 625.260606c-3.878788 0-7.757576-1.551515-10.860606-4.654545-6.206061-6.206061-6.206061-15.515152 0-21.721213l228.848485-228.848484c6.206061-6.206061 15.515152-6.206061 21.721212 0 6.206061 6.206061 6.206061 15.515152 0 21.721212L281.328545 620.606061c-3.10303 3.10303-6.981818 4.654545-10.860606 4.654545z"
                                    fill="#131313"></path>
                                <path
                                    d="M498.540666 625.260606c-3.878788 0-7.757576-1.551515-10.860606-4.654545L258.831575 391.757576c-6.206061-6.206061-6.206061-15.515152 0-21.721212 6.206061-6.206061 15.515152-6.206061 21.721213 0l228.848484 228.848484c6.206061 6.206061 6.206061 15.515152 0 21.721213-3.10303 3.10303-6.981818 4.654545-10.860606 4.654545z"
                                    fill="#131313"></path>
                                <path
                                    d="M384.504303 495.709091m-89.212121 0a89.212121 89.212121 0 1 0 178.424242 0 89.212121 89.212121 0 1 0-178.424242 0Z"
                                    fill="#FFFFFF"></path>
                                <path
                                    d="M384.504303 600.436364c-57.406061 0-104.727273-47.321212-104.727273-104.727273s47.321212-104.727273 104.727273-104.727273 104.727273 47.321212 104.727272 104.727273-47.321212 104.727273-104.727272 104.727273z m0-178.424243c-40.339394 0-73.69697 33.357576-73.69697 73.69697s33.357576 73.69697 73.69697 73.69697 73.69697-33.357576 73.696969-73.69697c0-41.115152-33.357576-73.69697-73.696969-73.69697z"
                                    fill="#131313"></path>
                                <path
                                    d="M140.916424 680.339394h-68.266667c-8.533333 0-15.515152-6.981818-15.515151-15.515152s6.981818-15.515152 15.515151-15.515151h68.266667c8.533333 0 15.515152 6.981818 15.515151 15.515151s-6.206061 15.515152-15.515151 15.515152z"
                                    fill="#131313"></path>
                                <path
                                    d="M140.916424 340.557576h-68.266667c-8.533333 0-15.515152-6.981818-15.515151-15.515152s6.981818-15.515152 15.515151-15.515151h68.266667c8.533333 0 15.515152 6.981818 15.515151 15.515151s-6.206061 15.515152-15.515151 15.515152z"
                                    fill="#131313"></path>
                            </g>
                        </svg>
                        <span class="block font-bold">
                            Kas Brankas
                        </span>
                        <span class="block font-bold">{{ toRupiah(attribute.kasBrankas.jumlah) }}</span>
                    </div>
                    <div class="block m-5 bg-white rounded-3xl drop-shadow-xl p-6 h-4/5">
                        <svg fill="#000000" width="35px" height="35px" viewBox="0 0 24 24" id="debit-purchase-left"
                            data-name="Flat Line" xmlns="http://www.w3.org/2000/svg" class="mb-3">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path id="secondary"
                                    d="M3,9H21a0,0,0,0,1,0,0v9a1,1,0,0,1-1,1H4a1,1,0,0,1-1-1V9A0,0,0,0,1,3,9Z"
                                    style="fill: #2ca9bc; stroke-width: 2;"></path>
                                <path id="primary-upstroke" d="M7.45,14.5h.1m1.9,0h.1"
                                    style="fill: none; stroke: #000000; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2.5;">
                                </path>
                                <path id="primary"
                                    d="M21,9H3M3,6V18a1,1,0,0,0,1,1H20a1,1,0,0,0,1-1V6a1,1,0,0,0-1-1H4A1,1,0,0,0,3,6Z"
                                    style="fill: none; stroke: #000000; stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;">
                                </path>
                            </g>
                        </svg>
                        <span class="block font-bold">
                            Transaksi Debit
                        </span>
                        <span class="block font-bold">{{ toRupiah(attribute.jumlahDebit) }}</span>
                    </div>
                    <div class="block m-5 bg-white rounded-3xl drop-shadow-xl p-6 h-4/5">
                        <svg fill="#000000" width="35px" height="35px" viewBox="0 0 32 32" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" class="mb-3">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <title>credit-card</title>
                                <path
                                    d="M0 26.016q0 0.832 0.576 1.408t1.44 0.576h28q0.8 0 1.408-0.576t0.576-1.408v-20q0-0.832-0.576-1.408t-1.408-0.608h-28q-0.832 0-1.44 0.608t-0.576 1.408v20zM2.016 26.016v-14.016h28v14.016h-28zM2.016 8v-1.984h28v1.984h-28zM4 24h4v-1.984h-4v1.984zM4 20h6.016v-5.984h-6.016v5.984zM10.016 24h4v-1.984h-4v1.984zM16 24h4v-1.984h-4v1.984zM22.016 24h1.984v-1.984h-1.984v1.984zM26.016 24h1.984v-1.984h-1.984v1.984z">
                                </path>
                            </g>
                        </svg>
                        <span class="block font-bold">
                            Transaksi Kredit
                        </span>
                        <span class="block font-bold">{{ toRupiah(attribute.jumlahKredit) }}</span>
                    </div>
                    <div class="block m-5 bg-white rounded-3xl drop-shadow-xl p-6 h-4/5">
                        <svg class="mb-2" width="35px" height="35px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"
                            fill="#000000">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <g fill="none" fill-rule="evenodd">
                                    <path d="m0 0h32v32h-32z"></path>
                                    <path
                                        d="m17.0058746 2c.5522848 0 1 .44771525 1 1 0 .51283584-.3860402.93550716-.8833788.99327227l-.1166212.00672773h-10.0058746c-1.59768088 0-2.90366088 1.24891996-2.99490731 2.82372721l-.00509269.17627279v18c0 1.5976809 1.24891996 2.9036609 2.82372721 2.9949073l.17627279.0050927h18c1.5976809 0 2.9036609-1.24892 2.9949073-2.8237272l.0050927-.1762728v-9.9962769c0-.5522847.4477153-1 1-1 .5128358 0 .9355072.3860402.9932723.8833789l.0067277.1166211v9.9962769c0 2.6887547-2.1223067 4.8818181-4.7831104 4.9953805l-.2168896.0046195h-18c-2.6887547 0-4.88181811-2.1223067-4.99538049-4.7831104l-.00461951-.2168896v-18c0-2.6887547 2.12230671-4.88181811 4.78311038-4.99538049l.21688962-.00461951zm10.6509796 2.10050506c.3905243.3905243.3905243 1.02368927 0 1.41421357l-11.4841067 11.48528137h4.5846118c.5522848 0 1 .4477153 1 1s-.4477152 1-1 1h-7c-.5522847 0-1-.4477153-1-1v-7c0-.5522847.4477153-1 1-1 .5522848 0 1 .4477153 1 1l.0003882 4.586 11.4848932-11.48549494c.3905243-.39052429 1.0236893-.39052429 1.4142135 0z"
                                        fill="#000000" fill-rule="nonzero"></path>
                                </g>
                            </g>
                        </svg>
                        <span class="block font-bold">
                            Saldo Awal
                        </span>
                        <span class="block font-bold">{{ toRupiah(attribute.saldoAwal) }}</span>
                    </div>
                    <div class="block m-5 bg-white rounded-3xl drop-shadow-xl p-6 h-4/5">
                        <svg class="-mt-1 -ml-2 -mb-1" width="50px" height="50px" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M6 18.0037V6.00368H13V7.50368H7.5V16.5037H16.5V10.9964H18V18.0037H6Z" fill="#1F2328">
                                </path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M17.4377 5.50253L15 5.50253V4.00253L19.9984 4.00253V9H18.4984V6.56319L13.0005 12.061L11.9399 11.0004L17.4377 5.50253Z"
                                    fill="#1F2328"></path>
                            </g>
                        </svg>
                        <span class="block font-bold">
                            Saldo Akhir
                        </span>
                        <span class="block font-bold">{{
                            toRupiah(attribute.saldoAwal + attribute.jumlahDebit - attribute.jumlahKredit) }}</span>
                    </div>

                </div>
                <div class="flex mt-9">
                    <div class="h-96 w-7/12 mr-7 bg-white rounded-3xl drop-shadow-xl p-6">
                        <Bar :data="chartData" :options="options" />
                        <!-- <pie id="my-chart-id" :options="chartOptions" :data="chartData" /> -->
                    </div>
                    <div
                        class="h-96 mt-4 sm:mt-0 bg-white rounded-3xl drop-shadow-xl p-6 overscroll-auto overflow-y-scroll ">
                        <span class="font-bold border-2">
                            Pembiayaan Tertunggak
                        </span>
                        <table v-for="(pembiayaan) in attribute.pembiayaan_tertunggak" :key="pembiayaan.id"
                            class="m-5 divide-y divide-red-400">
                            <tr>
                                <th class="text-left w-1/2">ID</th>
                                <th>:</th>
                                <td>{{ pembiayaan.id }}</td>
                            </tr>
                            <tr>
                                <th class="text-left w-1/2">Jatuh Tempo</th>
                                <th>:</th>
                                <td>{{ pembiayaan.tanggal_jatuh_tempo }}</td>
                            </tr>
                            <tr>
                                <th class="text-left w-1/2">Total Pembiayaan</th>
                                <th>:</th>
                                <td>{{ toRupiah(pembiayaan.total_pembiayaan) }}</td>
                            </tr>
                            <tr>
                                <th class="text-left w-1/2">Angsuran Diterima</th>
                                <th>:</th>
                                <td>{{ toRupiah(pembiayaan.angsuran_diterima) }}</td>
                            </tr>
                            <tr>
                                <th class="text-left w-1/2">Kode Anggota</th>
                                <th>:</th>
                                <td>{{ pembiayaan.anggota.kode }}</td>
                            </tr>
                            <tr>
                                <th class="text-left w-1/2">Nama</th>
                                <th>:</th>
                                <td>{{ pembiayaan.anggota.nama }}</td>
                            </tr>
                            <tr>
                                <th class="text-left w-1/2">Alamat</th>
                                <th>:</th>
                                <td>{{ pembiayaan.anggota.alamat }}</td>
                            </tr>
                            <tr>
                                <th class="text-left w-1/2">Telepon</th>
                                <th>:</th>
                                <td>{{ pembiayaan.anggota.telepon }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import Welcome from "@/Jetstream/Welcome.vue";
const axios = require('axios');
import {
    Chart as ChartJS,
    Title,
    Tooltip,
    Legend,
    BarElement,
    CategoryScale,
    LinearScale
} from 'chart.js'
import { Bar } from 'vue-chartjs'
ChartJS.register(CategoryScale, LinearScale, BarElement, Title, Tooltip, Legend)


import { Link } from "@inertiajs/inertia-vue3";
export default defineComponent({
    components: {
        AppLayout,
        Welcome,
        Link,
        Bar
        // Pie
    },
    props: {
        transaksiHarian: Object

    },
    data() {
        return {
            form: this.$inertia.form(),
            chartData: {
                labels: [
                    this.attribute.sum[0].date,
                    this.attribute.sum[1].date,
                    this.attribute.sum[2].date,
                    this.attribute.sum[3].date,
                    this.attribute.sum[4].date,
                    this.attribute.sum[5].date,
                    this.attribute.sum[6].date,
                ],
                datasets: [
                    {
                        label: 'Debit',
                        backgroundColor: '#f87979',
                        data: [
                            this.attribute.sum[0].debitTotal,
                            this.attribute.sum[1].debitTotal,
                            this.attribute.sum[2].debitTotal,
                            this.attribute.sum[3].debitTotal,
                            this.attribute.sum[4].debitTotal,
                            this.attribute.sum[5].debitTotal,
                            this.attribute.sum[6].debitTotal,
                        ]
                    }, {
                        label: 'Kredit',
                        backgroundColor: '#08ccc2',
                        data: [
                            this.attribute.sum[0].kreditTotal,
                            this.attribute.sum[1].kreditTotal,
                            this.attribute.sum[2].kreditTotal,
                            this.attribute.sum[3].kreditTotal,
                            this.attribute.sum[4].kreditTotal,
                            this.attribute.sum[5].kreditTotal,
                            this.attribute.sum[6].kreditTotal,
                        ]
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        }
    },
    methods: {
        async makeHarian() {
            console.log('test')
            await this.form.post("harian");
        },
        toRupiah(jumlah) {
            return "IDR " + jumlah.toString().replace(/(\d)(?=(\d{3})+(?:\.\d+)?$)/g, "$1\.")
        }
    },
    props: {
        attribute: Object,
    },

});
</script>
