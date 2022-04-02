<template>
    <dashboard-layout>
        <h1 class="text-4xl font-semi-bold text-gray-700 mb-8">
            <span>{{ mode }}&nbsp;Information</span>
        </h1>

        <!-- Customer Information Form-->
        <form @submit.prevent="submit">
            <!-- Name Fields-->
            <div class="grid grid-cols-3 gap-x-4 pb-8">
                <!-- First Name Field-->
                <base-input
                    v-model="form.first_name"
                    label="First Name"
                    id="first_name"
                    class="w-full"
                />

                <!-- Last Name Field-->
                <base-input
                    v-model="form.last_name"
                    label="Last Name"
                    id="last_name"
                    class="w-full"
                />
                <!-- Middle Initial  Field-->
                <base-input
                    v-model="form.middle_initial"
                    label="Middle Initial"
                    id="middile_intial"
                    class="w-full"
                />
            </div>
            <div class="grid grid-cols-3 gap-x-4 pb-8">
                <!-- Maritial Status Field-->
                <base-input
                    v-model="form.marital_status"
                    label="Marital Status"
                    id="marital_status"
                    class="w-full"
                />

                <!-- Gender Field-->
                <base-input
                    v-model="form.gender"
                    class="w-full"
                    label="Gender"
                    type="select"
                >
                    <option disabled hidden selected value="">
                        -- Select a Gender --
                    </option>
                    <option key="Male" value="Male">Male</option>
                    <option key="Female" value="Female">Female</option>
                </base-input>
                <!-- Date of Birth  Field-->
                <base-input
                    v-model="form.dob"
                    class="w-full"
                    label="Date of Birth"
                    type="date"
                />
            </div>

            <div class="grid grid-cols-3 gap-x-4 pb-8">
                <!-- Street Address Field-->
                <base-input
                    v-model="form.street_address"
                    label="Street Address"
                    id="street_address"
                    class="w-full"
                />

                <!-- City Field-->
                <base-input
                    v-model="form.city"
                    label="City"
                    id="city"
                    class="w-full"
                />
                <!-- Parish  Field-->
                <base-input
                    v-model="form.parish"
                    class="w-full"
                    label="Parish"
                    type="select"
                >
                    <option disabled hidden selected value="">
                        -- Select Parish --
                    </option>
                    <option
                        v-for="parish in parishes"
                        :key="parish"
                        :value="parish"
                    >
                        {{ parish }}
                    </option></base-input
                >
            </div>
            <div class="grid grid-cols-3 gap-x-4 pb-8">
                <!-- Home Phone Field-->
                <base-input
                    v-model="form.home_phone"
                    label="Home Phone Number"
                    id="home_phone"
                    class="w-full"
                />

                <!-- Cell Phone  Field-->
                <base-input
                    v-model="form.cell_phone"
                    label="Cell Phone Number"
                    id="cell_phone"
                    class="w-full"
                />
                <!-- Email  Field-->
                <base-input
                    v-model="form.email"
                    label="Email"
                    id="email"
                    class="w-full"
                />
            </div>
            <div class="grid grid-cols-3 gap-x-4 pb-8">
                <!-- Occupation Field-->
                <base-input
                    v-model="form.occupation"
                    label="Occupation"
                    id="occupation"
                    class="w-full"
                />

                <!-- Employer Field-->
                <base-input
                    v-model="form.employer"
                    label="Employer"
                    id="employer"
                    class="w-full"
                />
                <!-- Employer Number  Field-->
                <base-input
                    v-model="form.employer_number"
                    label="Employer Number"
                    id="employer_number"
                    class="w-full"
                />
            </div>
            <div class="grid grid-cols-3 gap-x-4 pb-8">
                <!-- Emergency Contact Name Field-->
                <base-input
                    v-model="form.emergency_name"
                    label="Emergency Contact Name"
                    id="emergency_name"
                    class="w-full"
                />

                <!-- Emergency Home Phone Field-->
                <base-input
                    v-model="form.emergency_home_phone"
                    label="Emergency Home Phone"
                    id="emergency_home_phone"
                    class="w-full"
                />
                <!-- Emergency Cell Phone Field-->
                <base-input
                    v-model="form.emergency_cell_phone"
                    label="Emergency Cell Phone"
                    id="'emergency_cell_phone"
                    class="w-full"
                />
            </div>

            <!-- Submit Button-->
            <div
                class="flex items-center justify-between pt-4"
                style="float: right"
            >
                <base-button
                    class="mb-4 mr-4"
                    color="blue"
                    label="Submit"
                    type="submit"
                />
            </div></form
    ></dashboard-layout>
</template>

<script>
import DashboardLayout from "@/Layouts/DashboardLayout";
import BaseInput from "@/Components/Common/BaseInput";
import BaseButton from "@/Components/Common/BaseButton";
import { useForm } from "@inertiajs/inertia-vue3";

export default {
    components: {
        DashboardLayout,
        BaseInput,
        BaseButton,
    },
    props: {
        mode: String,
    },
    data() {
        const parishes = [
            "St.Andrew",
            "Kingston",
            "St.Mary",
            "St.Ann",
            "St.Thomas",
            "St.Elizabeth",
            "Portland",
            "St.Catherine",
            "Manchester",
            "Clarendon",
            "Hanover",
            "Westmoreland",
            "St.James",
            "Trelawny",
        ];

        return {
            parishes,
            form: this.$inertia.form({
                first_name: this.patient?.first_name,
                last_name: this.patient?.last_name,
                middle_initial: this.patient?.middle_initial,
                marital_status: this.patient?.marital_status,
                gender: this.patient?.gender,
                dob: this.patient?.dob,
                street_address: this.patient?.street_address,
                city: this.patient?.city,
                parish: this.patient?.parish,
                home_phone: this.patient?.home_phone,
                cell_phone: this.patient?.cell_phone,
                email: this.patient?.email,
                occupation: this.patient?.occupation,
                employer: this.patient?.employer,
                employer_number: this.patient?.employer_number,
                emergency_name: this.patient?.emergency_name,
                emergency_home_phone: this.patient?.emergency_home_phone,
                emergency_cell_phone: this.patient?.emergency_cell_phone,
            }),
        };
    },
    methods: {
        submit() {
            this.form.post(route("patient.store"));
        },
    },
};
</script>

<style></style>
