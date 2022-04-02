<template>
    <div>
        <div class="text-gray">{{ title }}</div>
        <div class="text-xl text-gray-700 font-bold">{{ data }}</div>
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
