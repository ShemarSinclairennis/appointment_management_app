<template>
    <div>
        <div class="text-md text-gray-700">{{ title }}</div>
        <div class="font-bold text-3x">{{ data }}</div>
    </div>
</template>

<script>
export default {
    props: {
        title: String,
        data: String,
    },
};
</script>

<style></style>
