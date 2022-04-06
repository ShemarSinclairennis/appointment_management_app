<template>
    <button
        :class="{
            'text-green-300': color == 'green',
            'text-blue-700': color === 'blue',
            'text-purple-300': color == 'purple',
            'text-red-400': color === 'red',
        }"
        :type="type"
    >
        <i :class="icon" class="mr-2"></i>
    </button>
</template>
<script>
export default {
    props: {
        type: String,
        icon: String,
        color: String,
    },
};
</script>
