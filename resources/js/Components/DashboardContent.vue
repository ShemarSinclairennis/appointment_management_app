<template>
    <div class="w-full pt-6 pb-3 container-min-h bg-white">
        <div
            class="ltn-topbar ltn-dashboard-container flex justify-between mb-5 ml-14 mr-14"
        >
            <div class="ltn-topbar__heading">
                <h1 v-if="header" class="text-4xl font-semi-bold text-gray-700">
                    <span>{{ header }}&nbsp;</span>
                </h1>
            </div>
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <div class="ml-3 relative">
                    <BreezeDropdown align="right" width="48">
                        <template #trigger>
                            <span class="inline-flex rounded-md">
                                <button
                                    type="button"
                                    class="inline-flex items-center px-3 py-2 border border-transparent leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
                                >
                                    {{ $page.props.auth.user.name }}

                                    <svg
                                        class="ml-2 -mr-0.5 h-4 w-4"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20"
                                        fill="currentColor"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                </button>
                            </span>
                        </template>

                        <template #content>
                            <BreezeDropdownLink
                                :href="route('logout')"
                                method="post"
                                as="button"
                            >
                                Log Out
                            </BreezeDropdownLink>
                        </template>
                    </BreezeDropdown>
                </div>
            </div>
        </div>
        <div class="ltn-dashboard-container pt-4 md:pt-6 ml-14 mr-14">
            <slot />
        </div>
    </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import { inject } from "vue";
import BreezeDropdown from "@/Components/Dropdown";
import BreezeDropdownLink from "@/Components/DropdownLink";

export default {
    components: {
        Link,
        BreezeDropdown,
        BreezeDropdownLink,
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
