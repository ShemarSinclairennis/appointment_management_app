<template>
    <li class="flex-grow">
        <Link
            :href="href"
            class="flex flex-col items-center px-0 w-full py-3 md:rounded-md md:mb-2 xl:flex-row xl:w-auto xl:px-6"
            :class="{ 'text-white bg-red': active, 'text-gray': !active }"
        >
            <i class="xl:mr-4 xl:mb-0 mb-1 mr-0" :class="icon"></i>
            <span class="xl:font-medium xl:text-base text-xs">
                <slot />
            </span>
        </Link>
    </li>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";

export default {
    components: {
        Link,
    },

    props: {
        active: Boolean,
        icon: String,
        href: String,
    },
};
</script>
