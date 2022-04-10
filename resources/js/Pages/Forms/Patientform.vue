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
                <div v-if="mode == 'Add'">
                    <label class="input-label" v-text="'First Name'"></label>
                    {{ $page.props.auth.user.first_name }}
                    <!-- <base-input
                        v-model="form.first_name"
                        id="first_name"
                        class="invisible"
                    /> -->
                </div>

                <base-input
                    v-if="mode != 'Add'"
                    v-model="form.first_name"
                    :error="form.errors.first_name"
                    label="First Name"
                    id="first_name"
                    class="w-full"
                />

                <!-- Last Name Field-->
                <div v-if="mode == 'Add'">
                    <label class="input-label" v-text="'Last Name'"></label>
                    {{ $page.props.auth.user.last_name }}
                    <!-- <base-input
                        v-model="form.last_name"
                        id="last_name"
                        class="invisible"
                    /> -->
                </div>
                <base-input
                    v-if="mode != 'Add'"
                    v-model="form.last_name"
                    :error="form.errors.last_name"
                    label="Last Name"
                    id="last_name"
                    class="w-full"
                />
                <!-- Middle Initial  Field-->
                <base-input
                    v-model="form.middle_initial"
                    :error="form.errors.middle_initial"
                    label="Middle Initial"
                    id="middile_intial"
                    class="w-full"
                />
            </div>
            <div class="grid grid-cols-3 gap-x-4 pb-8">
                <!-- Gender Field-->
                <base-input
                    v-model="form.gender"
                    :error="form.errors.gender"
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
                    :error="form.errors.dob"
                    class="w-full"
                    label="Date of Birth"
                    type="date"
                />
            </div>

            <div class="grid grid-cols-3 gap-x-4 pb-8">
                <!-- Street Address Field-->
                <base-input
                    v-model="form.street_address"
                    :error="form.errors.street_address"
                    label="Street Address"
                    id="street_address"
                    class="w-full"
                />

                <!-- City Field-->
                <base-input
                    v-model="form.city"
                    :error="form.errors.city"
                    label="City"
                    id="city"
                    class="w-full"
                />
                <!-- Parish  Field-->
                <base-input
                    v-model="form.parish"
                    :error="form.errors.parish"
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
                    :error="form.errors.home_phone"
                    label="Home Phone Number"
                    id="home_phone"
                    class="w-full"
                />

                <!-- Cell Phone  Field-->
                <base-input
                    v-model="form.cell_phone"
                    :error="form.errors.cell_phone"
                    label="Cell Phone Number"
                    id="cell_phone"
                    class="w-full"
                />
                <!-- Email  Field-->
                <div v-if="mode == 'Add'">
                    <label class="input-label" v-text="'Email'"></label>
                    {{ $page.props.auth.user.email }}
                    <!-- <base-input
                        v-model="form.email"
                        id="email"
                        class="invisible"
                    /> -->
                </div>
                <base-input
                    v-if="mode != 'Add'"
                    v-model="form.email"
                    :error="form.errors.email"
                    label="Email"
                    id="email"
                    class="w-full"
                />
            </div>
            <div class="grid grid-cols-3 gap-x-4 pb-8">
                <!-- Occupation Field-->
                <base-input
                    v-model="form.occupation"
                    :error="form.errors.occupation"
                    label="Occupation"
                    id="occupation"
                    class="w-full"
                />

                <!-- Employer Field-->
                <base-input
                    v-model="form.employer"
                    :error="form.errors.employer"
                    label="Employer"
                    id="employer"
                    class="w-full"
                />
                <!-- Employer Number  Field-->
                <base-input
                    v-model="form.employer_number"
                    :error="form.errors.employer_number"
                    label="Employer Number"
                    id="employer_number"
                    class="w-full"
                />
            </div>
            <div class="grid grid-cols-3 gap-x-4 pb-8">
                <!-- Emergency Contact Name Field-->
                <base-input
                    v-model="form.emergency_name"
                    :error="form.errors.emergency_name"
                    label="Emergency Contact Name"
                    id="emergency_name"
                    class="w-full"
                />

                <!-- Emergency Home Phone Field-->
                <base-input
                    v-model="form.emergency_home_phone"
                    :error="form.errors.emergency_home_phone"
                    label="Emergency Home Phone"
                    id="emergency_home_phone"
                    class="w-full"
                />
                <!-- Emergency Cell Phone Field-->
                <base-input
                    v-model="form.emergency_cell_phone"
                    :error="form.errors.emergency_cell_phone"
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
        patient: Object,
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
            if (this.mode === "Edit") {
                this.form.put(route("patient.update", this.patient?.id));
                return;
            }
            this.form.post(route("patient.store"), {
                onSuccess: () => {
                    this.form.reset();
                },
            });
        },
    },
};
</script>

<style></style>
