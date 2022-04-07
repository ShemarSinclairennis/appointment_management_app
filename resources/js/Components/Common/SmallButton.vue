<template>
    <button
        :class="{
            'bg-green-300': color == 'green',
            'bg-blue-700': color === 'blue',
            'bg-purple-300': color == 'purple',
            'bg-red-400': color === 'red',
        }"
        class="hover:bg-green-300 text-white text-sm font-bold p-2 rounded-lg"
        :type="type"
    >
        <div class="flex">
            <div>
                <i :class="icon" class="mr-2"></i>
            </div>
            <div>{{ label }}</div>
        </div>
    </button>
</template>
<script>
export default {
    props: {
        type: String,
        icon: String,
        color: String,
        label: String,
    },
};
</script>
