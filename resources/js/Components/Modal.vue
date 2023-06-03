<template>
    <div>
        <div v-if="showModal" class="
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
              ">
            <div class="relative w-auto my-6 mx-auto max-w-3xl">
                <!--content-->
                <div class="
                    border-0
                    rounded-lg
                    shadow-lg
                    relative
                    flex flex-col
                    w-full
                    bg-white
                    outline-none
                    focus:outline-none
                  ">
                    <!--header-->
                    <div class="
                      sm
                      flex
                      items-start
                      justify-between
                      p-5
                      border-b border-solid border-blueGray-200
                      rounded-t
                    ">
                        <h3 class="text-3xl font-semibold">
                            <slot name="title">Modal</slot>
                        </h3>
                        <button class="
                        p-1
                        ml-auto
                        bg-transparent
                        border-0
                        text-black
                        float-right
                        text-xl
                        leading-none
                        font-semibold
                        outline-none
                        focus:outline-none
                      " v-on:click="toggleModal()">
                            <span class="
                          bg-transparent
                          text-black
                          h-6
                          w-6
                          text-2xl
                          block
                          outline-none
                          focus:outline-none
                        ">
                                X
                            </span>
                        </button>
                    </div>
                    <div class="p-5">
                        <slot></slot>
                    </div>
                    <div class="
                      flex
                      items-center
                      justify-end
                      p-6
                      border-t border-solid border-blueGray-200
                      rounded-b
                    ">
                        <button class="
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
                      " type="button" v-on:click="toggleModal()">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="showModal" class="opacity-25 fixed inset-0 z-40 bg-black"></div>
    </div>
</template>

<script>
export default {
    name: "regular-modal",
    data() {
        return {
            showModal: this.showModalF,
        };
    },
    methods: {
        toggleModal: function () {
            this.showModal = !this.showModal;
        },
    },
    props: {
        showModalF: {
            type: Boolean,
            default: false
        }
    },
};
</script>
