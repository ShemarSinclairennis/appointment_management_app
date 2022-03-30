<template>
    <base-card class="bg-peach h-64 w-72"
        ><img class="h-36 rounded-xl w-full" src="/img/img.jpg" />
        <div class="mt-6">
            <div class="flex">
                <div class="font-semibold">Name</div>
                <div class="font-light">: {{ name }}</div>
            </div>
            <div class="flex text-sm text-gray-700">
                <div class="font-semibold">Email</div>
                <div class="font-light">: {{ email }}</div>
            </div>
        </div>
    </base-card>
</template>

<script>
import BaseCard from "@/Components/Common/BaseCard";
export default {
    components: {
        BaseCard,
    },
    props: ["name", "email"],
};
</script>

<style></style>
