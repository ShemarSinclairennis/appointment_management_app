<template>
    <button
        :class="{
            'bg-blue-700': color === 'blue',
            'bg-red-400': color === 'red',
        }"
        class="hover:bg-green-300 text-white font-bold py-2 px-4 rounded-lg"
        :type="type"
    >
        {{ label }}
        <i :class="icon"></i>
    </button>
</template>
<script>
export default {
    props: {
        type: String,
        label: String,
        icon: String,
        color: String,
    },
};
</script>
