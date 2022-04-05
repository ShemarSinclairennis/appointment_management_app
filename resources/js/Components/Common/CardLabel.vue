<template>
    <label
        class="block tracking-wide text-gray-700 text-2xl mb-4 text-gray-400"
        v-if="label"
    >
        {{ label }}
    </label>
</template>
<script>
export default {
    props: {
        label: String,
    },
};
</script>
