<template>
    <nav
        class="ltn-sidebar flex flex-col justify-between bg-blue-700 sticky z-20 bottom-0 left-0 h-16 w-full xl:pl-6 xl:w-64 md:h-screen md:w-32 md:py-6 md:pl-4 md:top-0"
    >
        <div class="flex flex-col">
            <div class="flex justify-center mb-4">
                <i class="fas fa-cube fa-3x text-white"></i>
            </div>

            <ul
                class="ltn-sidebar__links flex items-center w-full md:block md:mt-8"
            >
                <sidebar-link
                    :active="route().current('dashboard.index')"
                    :href="route('dashboard.index')"
                    icon="fas fa-list"
                    >Dashboard</sidebar-link
                >
                <sidebar-link
                    :active="route().current('appointments.index')"
                    :href="route('appointments.index')"
                    icon="fas fa-calendar-check"
                    >Appointments</sidebar-link
                >
                <sidebar-link
                    :active="route().current('information.index')"
                    :href="route('information.index')"
                    icon="fas fa-info-circle"
                    >Information</sidebar-link
                >
                <sidebar-link
                    :active="route().current('settings.index')"
                    :href="route('settings.index')"
                    icon="fas fa-cog"
                    >Settings</sidebar-link
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
