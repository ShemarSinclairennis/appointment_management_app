<template>
    <base-modal>
        <template #heading
            ><h2 class="text-gray-500 font-medium">
                Make Appointment
            </h2></template
        >

        <div>
            <div class="grid grid-cols-2 gap-x-4">
                <base-input
                    v-model="form.appointment_date"
                    :error="form.errors.appointment_date"
                    class="w-full"
                    label="Date"
                    type="date"
                />
                <base-input
                    v-model="form.appointment_time"
                    :error="form.errors.appointment_time"
                    class="w-full"
                    label="Time"
                    type="time"
                />
            </div>
            <base-input
                v-model="form.reason"
                :error="form.errors.reason"
                class="w-full"
                label="Reason"
                type="textarea"
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
        const toggleModal = inject("toggleAppointmentModal");
        const appointment = inject("appointment");
        const mode = inject("mode");
        const user = inject("user");
        const form = useForm({
            reason: appointment?.reason,
            appointment_date: appointment?.appointment_date,
            appointment_time: appointment?.appointment_time,
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

            form.post(route("appointments.store", user.id), options);
        }

        return {
            mode,
            appointment,
            toggleModal,
            form,
            show,
            user,
            submit,
        };
    },
};
</script>
