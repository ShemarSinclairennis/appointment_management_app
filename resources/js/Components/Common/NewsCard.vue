<template>
    <base-card
        style="
            background-image: url(https://static.india.com/wp-content/uploads/2021/12/hospital-bed.jpeg?impolicy=Medium_Widthonly&w=700&h=467);
        "
        class="h-64 w-3/5"
    >
        <div class="w-2/5 m-4">
            <p class="font-bold text-5xl text-white">Are you insured?</p>
            <p class="text-white text-sm">Watch our video on Insurance Plan.</p>
        </div>
    </base-card>
</template>

<script>
import BaseCard from "@/Components/Common/BaseCard";
export default {
    components: {
        BaseCard,
    },
};
</script>

<style></style>
