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
                                                >First Name
                                            </span>
                                        </th>
                                        <th
                                            scope="col"
                                            class="w-3/12 text-xs font-semibold tracking-wider text-left text-white uppercase"
                                        >
                                            <span
                                                class="inline-flex py-3 px-6 w-full justify-between"
                                                >Last Name
                                            </span>
                                        </th>

                                        <th
                                            scope="col"
                                            class="w-3/12 text-xs font-semibold tracking-wider text-left text-white uppercase"
                                        >
                                            <span
                                                class="inline-flex py-3 px-6 w-full justify-between"
                                                >Middle Initial
                                            </span>
                                        </th>

                                        <th
                                            scope="col"
                                            class="w-3/12 text-xs font-semibold tracking-wider text-left text-white uppercase"
                                        >
                                            <span
                                                class="inline-flex py-3 px-6 w-full justify-between"
                                                >Gender
                                            </span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody
                                    class="bg-white divide-y divide-gray-700"
                                >
                                    <tr
                                        v-for="patient in patients.data"
                                        :key="patient.id"
                                    >
                                        <td
                                            class="py-4 px-6 text-sm text-gray-800 whitespace-nowrap"
                                            v-text="patient.first_name"
                                        />
                                        <td
                                            class="py-4 px-6 text-sm text-gray-800 whitespace-nowrap"
                                            v-text="patient.last_name"
                                        />
                                        <td
                                            class="py-4 px-6 text-sm text-gray-800 whitespace-nowrap"
                                            v-text="patient.middle_initial"
                                        />

                                        <td
                                            class="py-4 px-6 text-sm text-gray-800 whitespace-nowrap"
                                        >
                                            <div class="flex justify-between">
                                                {{ patient.gender }}

                                                <small-button
                                                    class="ml-3"
                                                    color="blue"
                                                    icon="fas fa-eye fa-lg"
                                                    label="View"
                                                    type="button"
                                                    @click="
                                                        toggleInformationModal(
                                                            patient
                                                        )
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
        <pagination class="mt-10" :links="patients.links" />

        <information-modal
            v-if="showInformationModal"
            @toggle="toggleInformationModal"
        />
    </dashboard-layout>
</template>

<script>
import DashboardLayout from "@/Layouts/DashboardLayout";
import InformationModal from "@/Components/Common/InformationModal";
import useModal from "@/composables/useModal";
import Pagination from "@/Components/Common/Pagination";
import useFormatter from "@/Components/composables/useFormatter";
import BaseButton from "@/Components/Common/BaseButton";
import SmallButton from "@/Components/Common/SmallButton";
import StatusTag from "@/Components/Common/StatusTag";
import { provide, toRefs } from "vue";

export default {
    components: {
        InformationModal,
        DashboardLayout,
        Pagination,
        StatusTag,
        BaseButton,
        SmallButton,
    },
    props: {
        patients: Array,
    },
    setup(props) {
        const { formatDate } = useFormatter();
        const { showModal, toggleModal } = useModal();

        const {
            showModal: showInformationModal,
            toggleModal: toggleInformationModal,
            selectedValue: patient,
        } = useModal();
        provide("toggleInformationModal", toggleInformationModal);
        provide("patient", patient);

        return {
            formatDate,
            showModal,
            toggleModal,
            showInformationModal,
            toggleInformationModal,

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
