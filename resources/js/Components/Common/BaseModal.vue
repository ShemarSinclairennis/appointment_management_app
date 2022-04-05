<template>
    <base-backdrop
        class="transform left-1/2 bottom-0 -translate-x-1/2 md:top-1/2 md:-translate-y-1/2 h-screen w-screen overflow-y-auto"
        @click.self="emitToggleEvent"
    >
        <div
            class="ltn-modal__container bg-white p-8 mx-auto w-full min-h-full md:rounded-3xl md:my-8"
        >
            <div
                class="ltn-modal__heading flex justify-between items-center mb-6"
            >
                <div>
                    <slot name="heading" />
                </div>
                <close-button @click.stop="emitToggleEvent" />
            </div>

            <div class="ltn-modal__content">
                <slot />
            </div>
        </div>
    </base-backdrop>
</template>

<script>
import CloseButton from "@/Components/Common/CloseButton";
import BaseBackdrop from "@/Components/Common/BaseBackdrop";

export default {
    components: { BaseBackdrop, CloseButton },

    methods: {
        emitToggleEvent() {
            this.$emit("toggle");
        },
    },

    emits: ["toggle"],
};
</script>

<style lang="scss" scoped>
@media screen and (min-width: 768px) {
    .ltn-modal__container {
        width: 748px;
        min-height: auto;
    }
}
</style>
