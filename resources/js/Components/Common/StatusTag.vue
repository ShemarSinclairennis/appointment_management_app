<template>
    <base-tag :color="color" :icon="icon" :label="status ?? `Not Set`" />
</template>

<script>
import BaseTag from "@/Components/Common/BaseTag";

export default {
    props: {
        status: String,
    },

    components: {
        BaseTag,
    },

    computed: {
        statusRegularized() {
            return this.status?.toLowerCase();
        },

        icon() {
            if (this.statusRegularized === "confirmed") {
                return "fas fa-check-circle";
            }

            if (this.statusRegularized === "reschedule") {
                return "fas fa-calendar-alt";
            }

            if (this.statusRegularized === "waiting") {
                return "fas fa-clock";
            }
            if (this.statusRegularized === "declined") {
                return "fas fa-times-circle";
            }
        },

        color() {
            if (this.statusRegularized === "confirmed") {
                return "green";
            }

            if (this.statusRegularized === "reschedule") {
                return "purple";
            }

            if (this.statusRegularized === "waiting") {
                return "gray";
            }
            if (this.statusRegularized === "declined") {
                return "red";
            }
        },
    },
};
</script>
