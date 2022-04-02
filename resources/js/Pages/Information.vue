<template>
    <dashboard-layout :header-caption="Information" header="Information">{{
        patient.first_name
    }}</dashboard-layout>
</template>

<script>
import DashboardLayout from "@/Layouts/DashboardLayout";
export default {
    components: {
        DashboardLayout,
    },
    props: {
        patient: Object,
    },
};
</script>

<style></style>
