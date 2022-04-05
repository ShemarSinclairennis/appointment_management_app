<template>
    <dashboard-layout :header-caption="Patients" header="Patients">
        <div class="flex justify-between mb-6">
            <div class="max-w-xs">
                <input
                    type="search"
                    v-model="params.search"
                    aria-label="Search"
                    placeholder="Search..."
                    class="block w-full rounded-md border-gray-700 shadow-sm focus:ring-blue-700 focus:border-blue-700 sm:text-sm"
                />
            </div>
        </div>

        <!-- <div class="overflow-hidden bg-white shadow-md sm:rounded-lg">
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
                                                >Status
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
                                                formatDate(
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
                                            <status-tag
                                                :status="appointment.status"
                                            />
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- <pagination class="mt-10" :links="appointments.links" /> -->
    </dashboard-layout>
</template>

<script>
import DashboardLayout from "@/Layouts/DashboardLayout";
import Pagination from "@/Components/Common/Pagination";
import useFormatter from "@/Components/composables/useFormatter";
import BaseButton from "@/Components/Common/BaseButton";
import StatusTag from "@/Components/Common/StatusTag";

export default {
    components: {
        DashboardLayout,
        Pagination,
        StatusTag,
        BaseButton,
    },
    props: {
        patients: Object,
    },
    setup(props) {
        const { formatDate } = useFormatter();

        return {
            formatDate,

            params: { search: null },
        };
    },

    watch: {
        params: {
            handler() {
                this.inertia.get(this.route("patients"), this.params, {
                    replace: true,
                    preserveState: true,
                });
            },
            deep: true,
        },
    },
};
</script>

<style></style>
