<template>
    <nav
        class="flex flex-col justify-between bg-blue-800 sticky z-20 bottom-0 left-0 h-16 w-full xl:pl-6 xl:w-64 md:h-screen md:w-32 md:py-6 md:pl-4 md:top-0"
    >
        <div class="flex flex-col">
            <div class="flex justify-center mb-4">
                <i class="fas fa-feather-alt fa-3x text-white"></i>
            </div>

            <ul class="flex items-center w-full md:block md:mt-8">
                <sidebar-link
                    :active="route().current('dashboard.index')"
                    :href="route('dashboard.index')"
                    icon="fas fa-list"
                    >Dashboard</sidebar-link
                >
                <sidebar-link
                    v-if="isDoctorUser"
                    :active="route().current('patient.index')"
                    :href="route('patient.index')"
                    icon="fas fa-list"
                    >Patients</sidebar-link
                >
                <sidebar-link
                    v-if="isAdminUser"
                    :active="route().current('doctors.index')"
                    :href="route('doctors.index')"
                    icon="fas fa-list"
                    >Doctors</sidebar-link
                >
                <sidebar-link
                    v-if="isPatientUser"
                    :active="
                        route().current(
                            'appointments.show',
                            $page.props.auth.user.id
                        )
                    "
                    :href="route('appointments.show', $page.props.auth.user.id)"
                    icon="fas fa-calendar-check"
                    >Appointments</sidebar-link
                >
                <sidebar-link
                    v-if="isPatientUser"
                    :active="
                        route().current(
                            'patient.show',
                            $page.props.auth.user.id
                        )
                    "
                    :href="route('patient.show', $page.props.auth.user.id)"
                    icon="fas fa-info-circle"
                    >Information</sidebar-link
                >
                <sidebar-link
                    :active="route().current('settings.index')"
                    :href="route('settings.index')"
                    icon="fas fa-cog"
                    >Settings</sidebar-link
                >
                <sidebar-link
                    v-if="isPatientUser"
                    :active="route().current('patient.create')"
                    :href="route('patient.create')"
                    icon="fas fa-cog"
                    >Form</sidebar-link
                >
            </ul>
        </div>

        <p class="hidden text-sm text-white text-center xl:block">
            Made by
            <a
                class="underline text-white"
                href="https://github.com/ShemarSinclairennis"
                target="_blank"
                >Shemar Ennis</a
            >
            <i class="fab fa-github ml-2 text-white"></i>
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
            isPatientUser: this.$page.props.auth.user.user_type === "patient",
            isDoctorUser: this.$page.props.auth.user.user_type === "doctor",
        };
    },
};
</script>
