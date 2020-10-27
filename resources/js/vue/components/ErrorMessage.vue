<template>
    <div v-if="$slots.default" class="rounded-sm text-xs mb-8 px-4 py-2 bg-red-100 text-red-500">
        <slot />
    </div>
</template>

<script>
export default {};
</script>
