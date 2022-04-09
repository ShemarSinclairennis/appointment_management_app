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
            </div>
        </div>

        <div class="text-gray-500 text-3xl font-medium mb-4 mt-5">
            Appointments
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table
                class="w-full text-sm text-left text-gray-500 dark:text-gray-400"
            >
                <thead class="text-xs text-white uppercase bg-blue-700">
                    <tr>
                        <th scope="col" class="px-6 py-3">Reason</th>
                        <th scope="col" class="px-6 py-3">Date</th>
                        <th scope="col" class="px-6 py-3">Time</th>
                        <th scope="col" class="px-6 py-3">Status</th>

                        <!-- <th scope="col" class="px-6 py-3">
                            <span class="sr-only"></span>
                        </th> -->
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="appointment in appointments"
                        :key="appointment.id"
                        class="bg-white border-b"
                    >
                        <th
                            scope="row"
                            class="px-6 py-4 font-medium text-gray-700 whitespace-nowrap"
                            v-if="appointment.patient_id == patient.id"
                            v-text="appointment.reason"
                        />
                        <td
                            v-if="appointment.patient_id == patient.id"
                            class="px-6 py-4"
                            v-text="formatDate(appointment.appointment_date)"
                        />
                        <td
                            v-if="appointment.patient_id == patient.id"
                            class="px-6 py-4"
                            v-text="tConvert(appointment.appointment_time)"
                        />
                        <td
                            v-if="appointment.patient_id == patient.id"
                            class="px-6 py-4"
                            v-text="appointment.status"
                        />
                    </tr>
                </tbody>
            </table>
        </div>
    </base-modalex>
</template>

<script>
import BaseModalex from "@/Components/Common/BaseModalex";
import DataLabel from "@/Components/Common/DataLabel";
import useFormatter from "@/Components/composables/useFormatter";

import BaseButton from "@/Components/Common/BaseButton";
import { inject, onMounted, ref } from "vue";
import { Inertia } from "@inertiajs/inertia";
export default {
    components: {
        DataLabel,
        BaseModalex,
    },
    data() {
        const show = ref(false);
        const toggleModal = inject("togglePatientModal");
        const patient = inject("patient");
        const appointments = inject("appointments");

        const user = inject("user");

        const { formatDate } = useFormatter();

        function tConvert(time) {
            // Check correct time format and split into components
            time = time
                .toString()
                .match(/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [time];

            if (time.length > 1) {
                // If time format correct
                time = time.slice(1); // Remove full string match value
                time[5] = +time[0] < 12 ? "AM" : "PM"; // Set AM/PM
                time[0] = +time[0] % 12 || 12; // Adjust hours
            }
            return time.join(""); // return adjusted time or original string
        }

        return {
            formatDate,
            tConvert,
            appointments,
            patient,
            toggleModal,
            user,
            show,
        };
    },
};
</script>

<style></style>
