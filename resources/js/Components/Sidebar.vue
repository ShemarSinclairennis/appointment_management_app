<template>
    <nav
        class="ltn-sidebar flex flex-col justify-between bg-black sticky z-20 bottom-0 left-0 h-16 w-full xl:px-6 xl:w-64 md:h-screen md:w-32 md:py-6 md:px-4 md:top-0"
    >
        <div class="flex flex-col">
            <Link
                :href="route('appointments.index')"
                class="hidden pb-5 text-center md:block"
            >
                <!-- <img
                    alt="LTN Express Logo"
                    class="inline-block h-6 xl:h-10"
                    src="img/logo-with-type-white.svg"
                /> -->
            </Link>

            <ul
                class="ltn-sidebar__links flex items-center w-full md:block md:mt-8"
            >
                <sidebar-link
                    :active="route().current('appointments.index')"
                    :href="route('appointments.index')"
                    icon="fas fa-cube"
                    >Appointments</sidebar-link
                >
            </ul>
        </div>

        <p class="hidden text-sm text-gray-200 text-center xl:block">
            Crafted by
            <a class="underline" href="https://niageo.com" target="_blank"
                >Niageo</a
            >
            💪🏽
        </p>
    </nav>
</template>

<script>
import SidebarLink from "@/Components/SidebarLink";
import { Link } from "@inertiajs/inertia-vue3";

export default {
    components: {
        Link,
        SidebarLink,
    },

    data() {
        return {
            isAdminUser: this.$page.props.auth.user.user_type === "admin",
            isRegularUser: this.$page.props.auth.user.user_type === "regular",
        };
    },
};
</script>
