<template>
    <dashboard-layout :header-caption="Settings" header="Settings">
        <div class="mb-4">
            <div class="font-bold text-red text-3xl mb-2">Warning:</div>
            <div class="font-medium text-gray-700 text-xl">
                Before you begin, keep in mind that deleting a<br />
                profile is a permanent step. There is no undo and <br />
                the data cannot be restored.
            </div>
        </div>

        <base-button
            class="mb-4 mr-4"
            color="red"
            icon="fas fa-trash-alt"
            label="Delete Account"
            @click="deleteUser()"
    /></dashboard-layout>
</template>

<script>
import DashboardLayout from "@/Layouts/DashboardLayout";
import BaseButton from "@/Components/Common/BaseButton";
export default {
    components: {
        DashboardLayout,
        BaseButton,
    },
    setup() {
        function deleteUser() {
            console.log("delete user");
            window.location.href = route("register.deleteUser");
        }
        return {
            deleteUser,
        };
    },
};
</script>

<style></style>
