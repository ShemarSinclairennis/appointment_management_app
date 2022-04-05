<template>
    <div
        :class="{ 'bg-opacity-0': transparent, 'bg-opacity-50': !transparent }"
        class="bg-black fixed z-30 inset-0"
    >
        <slot />
    </div>
</template>

<script>
export default {
    props: {
        transparent: Boolean,
    },
};
</script>
