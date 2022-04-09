<template>
    <dashboard-layout :header-caption="Doctors" header="Doctors">
        <div class="flex justify-between mb-6">
            <div class="max-w-xs">
                <input
                    type="search"
                    v-model="term"
                    @keyup="search"
                    aria-label="Search"
                    placeholder="Search..."
                    class="block w-full rounded-md border-gray-700 shadow-sm focus:ring-blue-700 focus:border-blue-700 sm:text-sm"
                />
            </div>
            <base-button
                class="mb-4 mr-4"
                color="blue"
                icon="fas fa-plus"
                label="Add Doctor"
                @click="toggleDoctorModal()"
            />
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
                                                >Practice
                                            </span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody
                                    class="bg-white divide-y divide-gray-700"
                                >
                                    <tr
                                        v-for="doctor in doctors.data"
                                        :key="doctor.id"
                                    >
                                        <td
                                            class="py-4 px-6 text-sm text-gray-800 whitespace-nowrap"
                                            v-text="doctor.first_name"
                                        />
                                        <td
                                            class="py-4 px-6 text-sm text-gray-800 whitespace-nowrap"
                                            v-text="doctor.last_name"
                                        />
                                        <td
                                            class="py-4 px-6 text-sm text-gray-800 whitespace-nowrap"
                                            v-text="doctor.middle_initial"
                                        />

                                        <td
                                            class="py-4 px-6 text-sm text-gray-800 whitespace-nowrap"
                                        >
                                            <div class="flex justify-between">
                                                {{ doctor.practice }}

                                                <small-button
                                                    class="ml-3"
                                                    color="red"
                                                    icon="fas fa-trash-alt fa-lg"
                                                    label="Remove"
                                                    type="button"
                                                    @click="
                                                        deleteDoctor({
                                                            doctor,
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
            :pagination="doctors"
            item_name="Doctors"
        ></pagination>

        <doctor-modal v-if="showDoctorModal" @toggle="toggleDoctorModal" />
    </dashboard-layout>
</template>

<script>
import DashboardLayout from "@/Layouts/DashboardLayout";
import Pagination from "@/Components/Common/Pagination";
import SmallButton from "@/Components/Common/SmallButton";
import BaseButton from "@/Components/Common/BaseButton";
import StatusTag from "@/Components/Common/StatusTag";
import DoctorModal from "@/Components/DoctorModal";
import useModal from "@/composables/useModal";
import { Link } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import { provide, toRefs } from "vue";

export default {
    components: {
        Link,
        SmallButton,
        DashboardLayout,
        Pagination,
        StatusTag,
        BaseButton,
        DoctorModal,
    },
    props: {
        doctors: Array,
    },
    methods: {
        search() {
            Inertia.replace(route("doctors.index", { term: this.term }));
        },
    },

    data() {
        const { showModal, toggleModal } = useModal();

        const {
            showModal: showDoctorModal,
            toggleModal: toggleDoctorModal,
            selectedValue: doctor,

            mode,
        } = useModal();
        function deleteDoctor(doctor) {
            Inertia.visit("register/deleteDoctor", {
                method: "delete",
                data: { doctor: doctor },
            });
        }
        provide("toggleDoctorModal", toggleDoctorModal);
        provide("doctor", doctor);

        provide("mode", mode);

        return {
            deleteDoctor,
            showModal,
            toggleModal,
            showDoctorModal,
            toggleDoctorModal,
            term: "",
        };
    },
};
</script>

<style></style>
