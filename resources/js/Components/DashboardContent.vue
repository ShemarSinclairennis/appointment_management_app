<template>
    <div class="w-full pt-6 pb-3 container-min-h pl-6 bg-gray-200">
        <div
            class="ltn-topbar ltn-dashboard-container flex justify-between mb-5"
        >
            <div class="ltn-topbar__heading">
                <h1 v-if="header" class="text-4xl font-semi-bold text-gray-400">
                    <span>{{ header }}&nbsp;</span>
                </h1>
            </div>

            <div class="ltn-topbar__actions flex items-center">
                <button class="focus:outline-none mr-6" type="button">
                    <i class="fas fa-bell text-lg"></i>
                </button>
                <button
                    class="focus:outline-none flex items-center mr-16"
                    type="button"
                >
                    <i
                        class="fa-solid fa-circle-user fa-xl text-purple-400"
                    ></i>

                    <span
                        class="mr-3 hidden md:block"
                        v-text="$page.props.auth.user.first_name"
                    ></span>

                    <i class="fas fa-chevron-down"></i>
                </button>
            </div>
        </div>
        <div class="ltn-dashboard-container pt-4 md:pt-6">
            <slot />
        </div>
    </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import { inject } from "vue";
export default {
    components: {
        Link,
    },
    setup: function () {
        return {
            header: inject("header"),
        };
    },
};
</script>

<style lang="scss" scoped>
.notification-min-h {
    min-height: calc(100vh - 210px);
}
.container-min-h {
    min-height: calc(100vh - 62px);
}
</style>
