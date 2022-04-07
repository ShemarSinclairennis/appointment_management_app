<template>
    <teleport to="body">
        <div>
            <base-backdrop tabindex="0" @keydown.esc="emitToggleEvent" />
            <div
                class="z-50 fixed transform left-1/2 bottom-0 -translate-x-1/2 md:top-1/2 md:-translate-y-1/2 h-screen w-screen overflow-y-auto"
            >
                <div
                    class="bg-white p-8 mx-auto w-10/12 min-h-10/12 md:rounded-3xl md:my-8"
                >
                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <slot name="heading" />
                        </div>
                        <close-button @click.stop="emitToggleEvent" />
                    </div>

                    <div>
                        <slot />
                    </div>
                </div>
            </div>
        </div>
    </teleport>
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
        width: 1200px;
        min-height: auto;
    }
}
</style>
