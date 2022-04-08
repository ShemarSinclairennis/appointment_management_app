<template>
    <div
        class="min-w-[170px] inline-flex justify-center items-center rounded-md text-white"
        :class="{
            'bg-green-300': color === 'green',
            'bg-purple-400': color === 'purple',
            'bg-gray-700': color === 'gray',
            'bg-red': color === 'red',
        }"
    >
        <i class="mr-2" :class="icon" v-if="icon"></i>
        <span v-text="label"></span>
    </div>
</template>

<script>
export default {
    props: {
        color: String,
        icon: String,
        label: String,
    },
};
</script>
