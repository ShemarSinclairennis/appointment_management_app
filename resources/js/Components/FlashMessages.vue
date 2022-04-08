<template>
    <teleport to="body">
        <transition name="slide-down">
            <div
                class="py-4 px-6 rounded-lg bg-green-300 fixed top-10 right-1/2 transform translate-x-1/2 text-white flex justify-between"
                v-if="show"
            >
                <span class="mr-4">
                    {{ message }}
                </span>

                <close-button @click="show = false" />
            </div>
        </transition>
    </teleport>
</template>

<script>
import CloseButton from "@/Components/Common/CloseButton";

export default {
    components: { CloseButton },

    data() {
        return {
            show: false,
            message: null,
        };
    },

    watch: {
        "$page.props.flash.success": {
            handler: "showFlash",
            deep: true,
        },
    },

    methods: {
        showFlash() {
            const message = this.$page.props.flash.success;

            if (message) {
                this.show = true;
                this.message = message;

                setTimeout(() => {
                    this.show = false;
                    this.message = null;
                }, 5000);
            }
        },
    },
};
</script>
