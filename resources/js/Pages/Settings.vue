<template>
    <dashboard-layout :header-caption="Settings" header="Settings">
        <base-button
            class="mb-4 mr-4"
            color="red"
            icon="fas fa-plus"
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
