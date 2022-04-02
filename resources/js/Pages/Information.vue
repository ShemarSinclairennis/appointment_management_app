<template>
    <dashboard-layout :header-caption="Information" header="Information">
        <div class="flex justify-end">
            <Link :href="route('patient.create')">
                <base-button
                    v-if="!patient.id"
                    class="mb-4 mr-4"
                    color="blue"
                    icon="fas fa-plus"
                    label="Add Information"
                />
            </Link>
            <base-button
                v-if="patient.id"
                class="mb-4 mr-4"
                color="blue"
                icon="fas fa-edit"
                label="Edit Information"
            />
        </div>
        <div class="mb-8">
            <div class="mb-4">
                <label class="text-2xl text-gray-700 font-medium"
                    >General Information</label
                >
            </div>

            <base-card class="bg-gray-50">
                <div class="grid grid-cols-4 gap-x-4">
                    <information-label
                        title="First Name"
                        :data="patient.first_name"
                    />
                    <information-label
                        title="Last Name"
                        :data="patient.last_name"
                    />
                    <information-label
                        title="Middle Initial"
                        :data="patient.middle_initial"
                    />
                    <information-label title="Gender" :data="patient.gender" />
                </div>

                <div class="grid grid-cols-4 gap-x-4 mt-4">
                    <information-label
                        title="Date of Birth"
                        :data="patient.dob"
                    />
                    <information-label
                        title="Street Address"
                        :data="patient.street_address"
                    />
                    <information-label title="City" :data="patient.city" />
                    <information-label title="Parish" :data="patient.parish" />
                </div>
            </base-card>
        </div>
        <div class="mb-8">
            <div class="mb-4">
                <label class="text-2xl text-gray-700 font-medium"
                    >Contact Information</label
                >
            </div>
            <base-card class="bg-gray-50">
                <div class="grid grid-cols-4 gap-x-4 mt-4">
                    <information-label
                        title="Phone Number (Home)"
                        :data="patient.home_phone"
                    />
                    <information-label
                        title="Phone Number (Cell)"
                        :data="patient.cell_phone"
                    />
                    <information-label title="Email" :data="patient.email" />
                </div>
            </base-card>
        </div>
        <div class="mb-8">
            <div class="mb-4">
                <label class="text-2xl text-gray-700 font-medium"
                    >Employer Information</label
                >
            </div>
            <base-card class="bg-gray-50">
                <div class="grid grid-cols-4 gap-x-4 mt-4">
                    <information-label
                        title="Occupation"
                        :data="patient.occupation"
                    />
                    <information-label
                        title="Employer Contact Number"
                        :data="patient.employer_number"
                    />
                    <information-label
                        title="Employer"
                        :data="patient.employer"
                    />
                </div>
            </base-card>
        </div>
        <div class="mb-8">
            <div class="mb-4">
                <label class="text-2xl text-gray-700 font-medium"
                    >Emergency Contact Information</label
                >
            </div>
            <base-card class="bg-gray-50">
                <div class="grid grid-cols-4 gap-x-4 mt-4">
                    <information-label
                        title="Emergency"
                        :data="patient.emergency_name"
                    />
                    <information-label
                        title="Emergency Contact Number (Home)"
                        :data="patient.emergency_home_phone"
                    />
                    <information-label
                        title="Emergency Contact Number (Cell)"
                        :data="patient.emergency_cell_phone"
                    />
                </div>
            </base-card>
        </div>
    </dashboard-layout>
</template>

<script>
import DashboardLayout from "@/Layouts/DashboardLayout";
import BaseCard from "@/Components/Common/BaseCard";
import BaseButton from "@/Components/Common/BaseButton";
import InformationLabel from "@/Components/Common/InformationLabel";
import { Link } from "@inertiajs/inertia-vue3";
export default {
    components: {
        DashboardLayout,
        BaseCard,
        BaseButton,
        InformationLabel,
        Link,
    },
    props: {
        patient: Object,
    },
};
</script>

<style></style>
