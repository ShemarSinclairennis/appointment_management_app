<template>
    <div>Upcoming Appointments</div>
    <table :class="{ empty: empty }" class="table-custom">
        <thead>
            <slot name="head" />
        </thead>

        <tbody>
            <slot name="body" />
        </tbody>
    </table>
</template>

<script>
export default {
    components: {},
    props: ["name", "email"],
};
</script>

<style></style>
