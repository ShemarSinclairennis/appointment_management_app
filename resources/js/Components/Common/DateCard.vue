<template>
    <base-card class="bg-green-50 h-28 w-72">
        <div class="flex">
            <div class="mt-2 mx-4 grid place-items-center">
                <div class="font-bold text-5xl text-gray-700">{{ day }}</div>
                <div class="font-light text-xl text-gray-700 capitalize">
                    {{ month }}
                </div>
            </div>
            <div class="mt-2 mx-4">
                <div class="text-gray-700">{{ reason }}</div>
                <div class="font-light text-lg text-gray-700">{{ time }}</div>
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
    props: ["day", "month", "time", "reason"],
};
</script>

<style></style>
