<template>
    <base-modalex
        ><template #heading
            ><h2 class="text-gray-500 font-medium mb-8">
                {{ patient.first_name }} {{ patient.last_name }} Information
            </h2>
        </template>
        <div>
            <div class="grid grid-cols-4 gap-4 mb-6">
                <data-label title="First Name" :data="patient.first_name" />
                <data-label title="Last Name" :data="patient.last_name" />
                <data-label
                    title="Middle Initial"
                    :data="patient.middle_initial"
                />
                <data-label title="gender" :data="patient.gender" />
            </div>
            <div class="grid grid-cols-4 gap-4 mb-6">
                <data-label title="Date of Birth" :data="patient.dob" />
                <data-label
                    title="Street Address"
                    :data="patient.street_address"
                />
                <data-label title="City" :data="patient.city" />
                <data-label title="Parish" :data="patient.parish" />
            </div>
            <div class="grid grid-cols-4 gap-4 mb-6">
                <data-label
                    title="Contact Number (Home)"
                    :data="patient.home_phone"
                />
                <data-label
                    title="Contact Number (Cell)"
                    :data="patient.cell_phone"
                />
                <data-label title="Email" :data="patient.email" />
                <data-label title="Occupation" :data="patient.occupation" />
            </div>
            <div class="grid grid-cols-4 gap-4 mb-6">
                <data-label title="Employer" :data="patient.employer" />
                <data-label
                    title="Employer Number"
                    :data="patient.employer_number"
                />
                <data-label
                    title="Emergency Name"
                    :data="patient.emergency_name"
                />
                <data-label
                    title="Emergency Contact Number (Home)"
                    :data="patient.emergency_home_phone"
                />
            </div>
            <div>
                <data-label
                    title="Emergency Contact Number (Cell)"
                    :data="patient.emergency_cell_phone"
                />
            </div></div
    ></base-modalex>
</template>

<script>
import BaseModalex from "@/Components/Common/BaseModalex";
import DataLabel from "@/Components/Common/DataLabel";
import { inject, onMounted, ref } from "vue";
export default {
    components: {
        DataLabel,
        BaseModalex,
    },
    setup() {
        const show = ref(false);
        const toggleModal = inject("togglePatientModal");
        const patient = inject("patient");
        const user = inject("user");

        return {
            patient,
            toggleModal,
            user,
            show,
        };
    },
};
</script>

<style></style>
