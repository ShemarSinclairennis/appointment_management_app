<template>
    <base-modal>
        <template #heading
            ><h2 class="text-gray-500 font-medium">Add Doctor</h2></template
        >

        <div>
            <div class="grid grid-cols-2 gap-x-4">
                <base-input
                    v-model="form.first_name"
                    class="w-full"
                    label="First Name"
                    type="text"
                />
                <base-input
                    v-model="form.last_name"
                    class="w-full"
                    label="Last Name"
                    type="text"
                />
            </div>
            <base-input
                v-model="form.middle_initial"
                class="w-full"
                label="Middle Initial"
                type="text"
            />

            <base-input
                v-model="form.email"
                class="w-full"
                label="Email"
                type="text"
            />
            <base-input
                v-model="form.practice"
                class="w-full"
                label="Practice"
                type="text"
            />
            <base-input
                v-model="form.password"
                class="w-full"
                label="Password"
                type="text"
            />

            <div class="flex justify-end">
                <base-button
                    class="flex-shrink-0"
                    color="blue"
                    label="Submit"
                    type="submit"
                    @click="submit"
                />
            </div>
        </div>
    </base-modal>
</template>

<script>
import BaseModal from "@/Components/Common/BaseModal";
import BaseInput from "@/Components/Common/BaseInput";
import CardLabel from "@/Components/Common/CardLabel";
import BaseButton from "@/Components/Common/BaseButton";
import { useForm } from "@inertiajs/inertia-vue3";
import { inject, onMounted, ref } from "vue";

export default {
    components: {
        CardLabel,
        BaseModal,
        BaseInput,
        BaseButton,
    },

    setup() {
        const show = ref(false);
        const toggleModal = inject("toggleDoctorModal");
        const doctor = inject("doctor");
        const mode = inject("doctor");
        const user = inject("user");
        const form = useForm({
            first_name: doctor?.first_name,
            last_name: doctor?.last_name,
            middle_initial: doctor?.middle_initial,
            password: doctor?.password,
            email: doctor?.email,
            practice: doctor?.practice,
        });

        // onMounted(() => {
        //     if (mode.value.toLowerCase() === "edit") step.value = 2;
        // });

        function submit() {
            console.log("store");
            const options = {
                preserveState: true,
                preserveScroll: true,
                onSuccess: () => toggleModal(),
            };

            form.post(route("register.storeDoctor"), options);
        }

        return {
            mode,
            doctor,
            toggleModal,
            form,
            show,
            user,
            submit,
        };
    },
};
</script>
