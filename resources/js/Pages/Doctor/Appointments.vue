<template>
    <dashboard-layout :header-caption="Appointments" header="Appointments">
        <div class="flex justify-between mb-6">
            <div class="max-w-xs">
                <input
                    id="search"
                    type="date"
                    v-model="term"
                    @keyup="search"
                    class="block w-full rounded-md border-gray-700 shadow-sm focus:ring-blue-700 focus:border-blue-700 sm:text-sm"
                />
            </div>
        </div>

        <div class="overflow-hidden bg-white shadow-md sm:rounded-lg">
            <div class="flex flex-col">
                <div class="overflow-x-auto -my-2 sm:-mx-6 lg:-mx-8">
                    <div
                        class="inline-block py-2 min-w-full align-middle sm:px-6 lg:px-8"
                    >
                        <div
                            class="overflow-hidden border-b border-gray-700 shadow sm:rounded-lg"
                        >
                            <table
                                class="min-w-full divide-y divide-gray-700 table-fixed"
                            >
                                <thead class="bg-blue-800">
                                    <tr>
                                        <th
                                            scope="col"
                                            class="w-3/12 text-xs font-semibold tracking-wider text-left text-white uppercase"
                                        >
                                            <span
                                                class="inline-flex py-3 px-6 w-full justify-between"
                                                >Reason
                                            </span>
                                        </th>
                                        <th
                                            scope="col"
                                            class="w-3/12 text-xs font-semibold tracking-wider text-left text-white uppercase"
                                        >
                                            <span
                                                class="inline-flex py-3 px-6 w-full justify-between"
                                                >Date
                                            </span>
                                        </th>

                                        <th
                                            scope="col"
                                            class="w-3/12 text-xs font-semibold tracking-wider text-left text-white uppercase"
                                        >
                                            <span
                                                class="inline-flex py-3 px-6 w-full justify-between"
                                                >Time
                                            </span>
                                        </th>
                                        <th
                                            scope="col"
                                            class="w-3/12 text-xs font-semibold tracking-wider text-left text-white uppercase"
                                        >
                                            <span
                                                class="inline-flex py-3 px-6 w-full justify-between"
                                                >Actions
                                            </span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody
                                    class="bg-white divide-y divide-gray-700"
                                >
                                    <tr
                                        v-for="appointment in appointments.data"
                                        :key="appointment.id"
                                    >
                                        <td
                                            class="py-4 px-6 text-sm text-gray-800 whitespace-nowrap"
                                            v-text="appointment.reason"
                                        />
                                        <td
                                            class="py-4 px-6 text-sm text-gray-800 whitespace-nowrap"
                                            v-text="
                                                dateConvert(
                                                    appointment.appointment_date
                                                )
                                            "
                                        />
                                        <td
                                            class="py-4 px-6 text-sm text-gray-800 whitespace-nowrap"
                                            v-text="
                                                tConvert(
                                                    appointment.appointment_time
                                                )
                                            "
                                        />
                                        <td>
                                            <div
                                                v-if="
                                                    appointment.status ==
                                                    'Confirmed'
                                                "
                                                class="flex"
                                            >
                                                <status-tag
                                                    :status="appointment.status"
                                                />
                                                <Link
                                                    method="delete"
                                                    :href="
                                                        route(
                                                            'appointments.destroy',
                                                            appointment
                                                        )
                                                    "
                                                >
                                                    <small-button
                                                        class="ml-3"
                                                        color="red"
                                                        icon="fas fa-trash-alt fa-lg"
                                                        label="Remove"
                                                        type="button"
                                                    />
                                                </Link>
                                            </div>
                                            <div
                                                v-else-if="
                                                    appointment.status ==
                                                    'Declined'
                                                "
                                                class="flex"
                                            >
                                                <status-tag
                                                    :status="appointment.status"
                                                />
                                                <Link
                                                    method="delete"
                                                    :href="
                                                        route(
                                                            'appointments.destroy',
                                                            appointment
                                                        )
                                                    "
                                                >
                                                    <small-button
                                                        class="ml-3"
                                                        color="red"
                                                        icon="fas fa-trash-alt fa-lg"
                                                        label="Remove"
                                                        type="button"
                                                    />
                                                </Link>
                                            </div>
                                            <div
                                                v-else
                                                class="flex justify-end mr-9"
                                            >
                                                <small-button
                                                    color="blue"
                                                    icon="fas fa-check-circle fa-lg"
                                                    label="Confirm"
                                                    type="button"
                                                    @click="
                                                        confirmAppointment({
                                                            appointment,
                                                        })
                                                    "
                                                />
                                                <!-- <small-button
                                                    class="ml-5"
                                                    color="purple"
                                                    icon="fas fa-clock fa-lg"
                                                    type="button"
                                                    label="Reschedule"
                                                /> -->

                                                <small-button
                                                    class="ml-5"
                                                    color="red"
                                                    icon="fas fa-times-circle fa-lg"
                                                    type="button"
                                                    label="Decline"
                                                    @click="
                                                        declineAppointment({
                                                            appointment,
                                                        })
                                                    "
                                                />
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <pagination
            class="mt-6"
            :pagination="appointments"
            item_name="Appointments"
        ></pagination>
        <appointment-modal
            v-if="showAppointmentModal"
            @toggle="toggleAppointmentModal"
        />
    </dashboard-layout>
</template>

<script>
import DashboardLayout from "@/Layouts/DashboardLayout";
import Pagination from "@/Components/Common/Pagination";
import useFormatter from "@/Components/composables/useFormatter";
import BaseButton from "@/Components/Common/BaseButton";
import SmallButton from "@/Components/Common/SmallButton";
import StatusTag from "@/Components/Common/StatusTag";
import { Link } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";

export default {
    components: {
        Link,
        DashboardLayout,
        Pagination,
        StatusTag,
        BaseButton,
        SmallButton,
    },
    props: {
        appointments: Object,
    },

    data() {
        const { formatDate } = useFormatter();
        function dateConvert(date) {
            let appointment_date = new Date(date);
            let result = formatDate(
                appointment_date.getFullYear() +
                    "-" +
                    (appointment_date.getMonth() + 1) +
                    "-" +
                    (appointment_date.getDate() + 1)
            );

            return result;
        }
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
                time[3] = " ";
            }
            return time.join(""); // return adjusted time or original string
        }

        function confirmAppointment(appointment) {
            Inertia.visit(route("appointment.confirm"), {
                method: "put",
                data: { appointment: appointment },
            });
        }

        function reschedule(appointment) {}
        function declineAppointment(appointment) {
            Inertia.visit(route("appointment.decline"), {
                method: "put",
                data: { appointment: appointment },
            });
        }

        return {
            declineAppointment,
            confirmAppointment,
            formatDate,
            dateConvert,
            tConvert,
            term: "",
        };
    },
    methods: {
        search() {
            Inertia.replace(route("appointments.index", { term: this.term }));
        },
    },
};
</script>

<style></style>
