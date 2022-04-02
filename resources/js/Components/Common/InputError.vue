<template>
    <div
        v-if="message"
        class="text-red mt-2 text-sm font-light"
        v-text="message"
    />
</template>

<script>
export default {
    name: "InputError",

    props: {
        message: String,
    },
};
</script>
