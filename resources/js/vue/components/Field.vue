<template>
    <div class="grid gap-2 w-full max-w-2xl">
        <label v-if="label" class="font-bold text-xs text-gray-500 uppercase tracking-widest">{{ label }}</label>
        <slot></slot>
    </div>
</template>

<script>
export default {
    props: ['label'],
};
</script>
